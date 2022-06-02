<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use App\Models\Pemasukan;
use App\Models\Hutang;
use App\Models\Pengeluaran;
use App\Models\Harta;
use App\Models\Harta_Sub;

class FinancialCheckUpController extends Controller
{
    //
    public function showgauge()
    {
        return view('WP.financial_check_upp');
    }

    public function Show_Financial_Check_Up()
    {
        $id_wp = Auth::user()->id;
        $pemasukan_utama    = Pemasukan::count_pemasukan_utama($id_wp);
        $pemasukan_non_utama = Pemasukan::count_pemasukan_non_utama($id_wp);
        $array_tahun        = array();
        array_push($array_tahun, 2019);
        array_push($array_tahun, 2020);
        array_push($array_tahun, 2021);
        array_push($array_tahun, 2022);
        // $tahun_ini          = date('Y');
        // error_log($tahun_ini);
        $tahun_distict      = \DB::select("SELECT DISTINCT YEAR(Tanggal) as Tahun from pemasukan WHERE ID_WP = '".$id_wp."' ");
        foreach($tahun_distict as $row_tahun_distict)
        {
            array_push($array_tahun,$row_tahun_distict->Tahun);
        }
        $sort_tahun = array_unique($array_tahun);
        asort($sort_tahun);

        return view('WP.financial_check_up')->with('pemasukan_utama',number_format($pemasukan_utama,2,',','.'))
                                            ->with('pemasukan_non_utama',number_format($pemasukan_non_utama,2,',','.'))
                                            ->with('tahun_wp',$sort_tahun);
    }

    public function Show_Financial_Check_Up_Chart_FinancialOverview(Request $request)
    {
        $id_wp = Auth::user()->id;
        $piltahun = $_POST['idparamth'];
        // $param['kalimat'] = ["haiiii","alooooo","hayyyyy"];
        // $param['kalimat'] = $olah_daftar_harta;

        $pemasukan = array();
        $pengeluaran = array();
        $dataWp = array();

        $valuePemasukan = 0;
        $valuePengeluaran = 0;
        $tanggungan = 0;
        $statusWP = "";

        //Select db ---- ini ada pengaturan di config/database --> mysql strict true change to false
        $pemasukan             = \DB::select("select sum(pemasukan.Jumlah) as msum from `pemasukan` where year(pemasukan.Tanggal) = '".$piltahun."' and ID_WP = '".$id_wp."'");
        foreach($pemasukan as $rowpemasukan)
        {
            $valuePemasukan = $rowpemasukan->msum;
        }

        $pengeluaran             = \DB::select("select sum(pengeluaran.Jumlah) as msum from `pengeluaran` where year(pengeluaran.Tanggal) = '".$piltahun."' and ID_WP = '".$id_wp."'");
        foreach($pengeluaran as $rowpengeluaran)
        {
            $valuePengeluaran = $rowpengeluaran->msum;
        }

        $dataWp             = \DB::select("select Status as status from `data_wp` where ID_WP = '".$id_wp."'");
        foreach($dataWp as $rowWp)
        {
            $statusWP = $rowWp->status;
        }

        $countTanggungan             = \DB::select("select count(ID_Records) as cnt from `kartu_keluarga` where tanggungan = 1 and show_status = 1 and ID_WP = '".$id_wp."'");
        foreach($countTanggungan as $rowWp)
        {
            $tanggungan = $rowWp->cnt;
        }

        $avgPemasukan = $valuePemasukan / 12;
        $avgPengeluaran = $valuePengeluaran / 12;
        $perhigungan = 0;
        if ($statusWP == "" || $valuePemasukan == 0) {
            $perhigungan = 0;
        } else if ($statusWP == "single" || $statusWP == "cerai") {
            $perhigungan = (($avgPengeluaran * 3) / $valuePemasukan)*100;
        } else if ($statusWP == "kawin" && $tanggungan == 1) {
            $perhigungan = (($avgPengeluaran * 6) / $valuePemasukan)*100;
        } else if ($statusWP == "kawin" && $tanggungan == 2) {
            $perhigungan = (($avgPengeluaran * 9) / $valuePemasukan)*100;
        } else if ($statusWP == "kawin" && $tanggungan == 3) {
            $perhigungan = (($avgPengeluaran * 12) / $valuePemasukan)*100;
        } else {
            $perhigungan = (($avgPengeluaran * 3) / $valuePemasukan)*100;
        }
        
        // $param['pemasukan']     = $pemasukan;
        // $param['pengeluaran']   = $dataWp;

        return $perhigungan;
    }

    public function Show_Financial_Check_Up_Chart_IncomeOverview(Request $request)
    {
        // $total_pendapatan_bulanan = \DB::select("SELECT pemasukan.Tanggal, SUM(Jumlah)
        //                                             FROM `pemasukan`
        //                                             GROUP BY YEAR(Tanggal), MONTH(Tanggal)
        //                                             WHERE YEAR(Tanggal) = 2021;");
        $id_wp = Auth::user()->id;
        $piltahun = $_POST['idparamth'];
        $prosentase_pemasukan_utama = 0;
        $prosentase_pemasukan_tambahan = 0;
        $prosentase_chart_penghasilan = array();
        $pemasukan_utama        = Pemasukan::count_pemasukan_utama_tahun($id_wp,$piltahun);
        $pemasukan_non_utama    = Pemasukan::count_pemasukan_non_utama_tahun($id_wp,$piltahun);
        $pemasukan_total        = $pemasukan_utama + $pemasukan_non_utama;

        $prosentase_pemasukan_utama = $pemasukan_total == 0 ? 0 : (($pemasukan_utama/$pemasukan_total) * 100);
        $prosentase_pemasukan_tambahan = $pemasukan_total == 0 ? 0 :  (($pemasukan_non_utama/$pemasukan_total) * 100);

        // $prosentase_pemasukan_utama = round((($pemasukan_utama/$pemasukan_total) * 100));
        // $prosentase_pemasukan_tambahan = round((($pemasukan_non_utama/$pemasukan_total) * 100));

        array_push($prosentase_chart_penghasilan,$prosentase_pemasukan_utama);
        array_push($prosentase_chart_penghasilan,$prosentase_pemasukan_tambahan);

        // $kalimat = "haiii";
        // return $kalimat;
        $param['utama'] = number_format($pemasukan_utama, 0, ',', '.');
        $param['non_utama'] = number_format($pemasukan_non_utama, 0, ',', '.');
        $param['prosentase'] = $prosentase_chart_penghasilan;
        return $param;
    }

    public function Show_Financial_Check_Up_Chart_RasioPenghasilanDanPengeluaran(Request $request)
    {
        $id_wp = Auth::user()->id;
        $piltahun = $_POST['idparamth'];
        // $param['kalimat'] = ["haiiii","alooooo","hayyyyy"];
        // $param['kalimat'] = $olah_daftar_harta;

        $arr_pemasukan = array();
        $arr_tanggal_pemasukan = array();
        $arr_pengeluaran = array();
        $arr_tanggal_pengeluaran = array();

        //Select db ---- ini ada pengaturan di config/database --> mysql strict true change to false
        $parampemasukan             = \DB::select("select month(pemasukan.Tanggal) as tanggal, sum(pemasukan.Jumlah) as msum from `pemasukan` where year(pemasukan.Tanggal) = '".$piltahun."' and ID_WP = '".$id_wp."' group by year(pemasukan.Tanggal), month(pemasukan.Tanggal)");
        $parampengeluaran           = \DB::select("select month(pengeluaran.Tanggal) as tanggal, sum(pengeluaran.Jumlah) as msum from `pengeluaran` where year(pengeluaran.Tanggal) = '".$piltahun."' and ID_WP = '".$id_wp."' group by year(pengeluaran.Tanggal), month(pengeluaran.Tanggal)");
        foreach($parampemasukan as $rowpemasukan)
        {
            array_push($arr_pemasukan,$rowpemasukan->msum);
            array_push($arr_tanggal_pemasukan,$rowpemasukan->tanggal);
        }
        foreach($parampengeluaran as $rowpengeluaran)
        {
            array_push($arr_pengeluaran,$rowpengeluaran->msum);
            array_push($arr_tanggal_pengeluaran,$rowpengeluaran->tanggal);
        }

        $arr_pemasukan_bulanan      = [0,0,0,0,0,0,0,0,0,0,0,0];
        $arr_pengeluaran_bulanan    = [0,0,0,0,0,0,0,0,0,0,0,0];

        for($i=0; $i<12; $i++)
        {
            $counter = $i + 1;
            for($j=0; $j<count($arr_pemasukan); $j++)
            {
                if($counter == $arr_tanggal_pemasukan[$j])
                {
                    $arr_pemasukan_bulanan[$i] = $arr_pemasukan[$j];
                }
            }
        }

        for($i=0; $i<12; $i++)
        {
            $counter = $i + 1;
            for($j=0; $j<count($arr_pengeluaran); $j++)
            {
                if($counter == $arr_tanggal_pengeluaran[$j])
                {
                    $arr_pengeluaran_bulanan[$i] = $arr_pengeluaran[$j];
                }
            }
        }

        $param['pemasukan']     = $arr_pemasukan_bulanan;
        $param['pengeluaran']   = $arr_pengeluaran_bulanan;

        return $param;
    }

    public function Show_Financial_Check_Up_Chart_RasioTabungan(Request $request)
    {
        $id_wp = Auth::user()->id;
        $piltahun = $_POST['idparamth'];
        // $param['kalimat'] = ["haiiii","alooooo","hayyyyy"];
        // $param['kalimat'] = $olah_daftar_harta;

        $arr_pemasukan = array();
        $arr_tanggal_pemasukan = array();
        $arr_pengeluaran = array();
        $arr_tanggal_pengeluaran = array();

        //Select db ---- ini ada pengaturan di config/database --> mysql strict true change to false
        $parampemasukan             = \DB::select("select month(pemasukan.Tanggal) as tanggal, sum(pemasukan.Jumlah) as msum from `pemasukan` where year(pemasukan.Tanggal) = '".$piltahun."' and ID_WP = '".$id_wp."' group by year(pemasukan.Tanggal), month(pemasukan.Tanggal)");
        $parampengeluaran           = \DB::select("select month(pengeluaran.Tanggal) as tanggal, sum(pengeluaran.Jumlah) as msum from `pengeluaran` where year(pengeluaran.Tanggal) = '".$piltahun."' and ID_WP = '".$id_wp."' group by year(pengeluaran.Tanggal), month(pengeluaran.Tanggal)");
        foreach($parampemasukan as $rowpemasukan)
        {
            array_push($arr_pemasukan,$rowpemasukan->msum);
            array_push($arr_tanggal_pemasukan,$rowpemasukan->tanggal);
        }
        foreach($parampengeluaran as $rowpengeluaran)
        {
            array_push($arr_pengeluaran,$rowpengeluaran->msum);
            array_push($arr_tanggal_pengeluaran,$rowpengeluaran->tanggal);
        }

        $arr_pemasukan_bulanan      = [0,0,0,0,0,0,0,0,0,0,0,0];
        $arr_pengeluaran_bulanan    = [0,0,0,0,0,0,0,0,0,0,0,0];
        $arr_tabungan    = [0,0,0,0,0,0,0,0,0,0,0,0];

        for($i=0; $i<12; $i++)
        {
            $counter = $i + 1;
            for($j=0; $j<count($arr_pemasukan); $j++)
            {
                if($counter == $arr_tanggal_pemasukan[$j])
                {
                    $arr_pemasukan_bulanan[$i] = $arr_pemasukan[$j];
                }
            }
        }

        for($i=0; $i<12; $i++)
        {
            $counter = $i + 1;
            for($j=0; $j<count($arr_pengeluaran); $j++)
            {
                if($counter == $arr_tanggal_pengeluaran[$j])
                {
                    $arr_pengeluaran_bulanan[$i] = $arr_pengeluaran[$j];
                }
            }
        }

        for($i=0; $i<12; $i++)
        {
            $arr_tabungan[$i] = $arr_pemasukan_bulanan[$i] - $arr_pengeluaran_bulanan[$i];
        }

        $param['tabungan'] = $arr_tabungan;

        return $param;
    }

    public function Show_Financial_Check_Up_Chart_RasioPassiveIncome(Request $request)
    {
        $id_wp = Auth::user()->id;
        $piltahun = $_POST['idparamth'];
        // $param['kalimat'] = ["haiiii","alooooo","hayyyyy"];
        // $param['kalimat'] = $olah_daftar_harta;

        $arr_pemasukan_utama = array();
        $arr_tanggal_pemasukan_utama = array();
        $arr_pemasukan_tambahan = array();
        $arr_tanggal_pemasukan_tambahan = array();

        //Select db ---- ini ada pengaturan di config/database --> mysql strict true change to false
        $parampemasukan_utama       = \DB::select("select month(pemasukan.Tanggal) as tanggal, sum(pemasukan.Jumlah) as msum from `pemasukan` where pemasukan.Nomor_Perkiraan = 4001 and year(pemasukan.Tanggal) = '".$piltahun."' and ID_WP = '".$id_wp."' group by year(pemasukan.Tanggal), month(pemasukan.Tanggal)");
        $parampemasukan_tambahan  = \DB::select("select month(pemasukan.Tanggal) as tanggal, sum(pemasukan.Jumlah) as msum from `pemasukan` where pemasukan.Nomor_Perkiraan < 4001 and year(pemasukan.Tanggal) = '".$piltahun."' and ID_WP = '".$id_wp."' group by year(pemasukan.Tanggal), month(pemasukan.Tanggal)");

        foreach($parampemasukan_utama as $rowpemasukanutama)
        {
            array_push($arr_pemasukan_utama,$rowpemasukanutama->msum);
            array_push($arr_tanggal_pemasukan_utama,$rowpemasukanutama->tanggal);
        }
        foreach($parampemasukan_tambahan as $rowpemasukantambahan)
        {
            array_push($arr_pemasukan_tambahan,$rowpemasukantambahan->msum);
            array_push($arr_tanggal_pemasukan_tambahan,$rowpemasukantambahan->tanggal);
        }

        $arr_utama_bulanan      = [0,0,0,0,0,0,0,0,0,0,0,0];
        $arr_tambahan_bulanan    = [0,0,0,0,0,0,0,0,0,0,0,0];

        for($i=0; $i<12; $i++)
        {
            $counter = $i + 1;
            for($j=0; $j<count($arr_pemasukan_utama); $j++)
            {
                if($counter == $arr_tanggal_pemasukan_utama[$j])
                {
                    $arr_utama_bulanan[$i] = $arr_pemasukan_utama[$j];
                }
            }
        }

        for($i=0; $i<12; $i++)
        {
            $counter = $i + 1;
            for($j=0; $j<count($arr_pemasukan_tambahan); $j++)
            {
                if($counter == $arr_tanggal_pemasukan_tambahan[$j])
                {
                    $arr_tambahan_bulanan[$i] = $arr_pemasukan_tambahan[$j];
                }
            }
        }

        $param['utama']         = $arr_utama_bulanan;
        $param['tambahan']      = $arr_tambahan_bulanan;
        return $param;
    }

    public function Show_Financial_Check_Up_Chart_DistribusiPemasukan()
    {
        $id_wp = Auth::user()->id;
        $piltahun = $_POST['idparamth'];
        // $piltahun = 2022;

        $array_jenis_penghasilan = array();
        $array_jum_penghasilan = array();
        $count = 1;

        $qry = \DB::select("select * from 
        (
        SELECT (coa_sub.nama) as jenis, (coa_sub.Nomor_Perkiraan) as noper, sum(pemasukan.jumlah) jumlah
        from pemasukan LEFT JOIN coa_sub on coa_sub.id = pemasukan.Sub_Nomor_Perkiraan
        where 
        ID_WP = '".$id_wp."' AND 
        pemasukan.show_status = 1 and 
        coa_sub.Nomor_Perkiraan is not null and
        YEAR(Tanggal) = '".$piltahun."'
        group by coa_sub.nama, coa_sub.Nomor_Perkiraan
        ) as tbl order by jumlah desc limit 4");
        foreach($qry as $row_qry)
        {
            $nama = $row_qry->jenis;
            $jml = $row_qry->jumlah;
            array_push($array_jenis_penghasilan,$nama);
            array_push($array_jum_penghasilan,$jml);
        }

        $param['jenis'] = $array_jenis_penghasilan;
        $param['jumlah'] = $array_jum_penghasilan;
        return $param;

    }


    public function Show_Financial_Check_Up_Chart_DistribusiPengeluaran()
    {
        $id_wp = Auth::user()->id;
        $piltahun = $_POST['idparamth'];
        // $piltahun = 2022;

        $array_jenis_penghasilan = array();
        $array_jum_penghasilan = array();
        $count = 1;

        $qry = \DB::select("select * from 
        (
        SELECT (coa_sub.nama) as jenis, (coa_sub.Nomor_Perkiraan) as noper, sum(pengeluaran.jumlah) jumlah
        from pengeluaran LEFT JOIN coa_sub on coa_sub.id = pengeluaran.Sub_Nomor_Perkiraan
        where 
        ID_WP = '".$id_wp."' AND 
        pengeluaran.show_status = 1 and 
        coa_sub.Nomor_Perkiraan is not null and
        YEAR(Tanggal) = '".$piltahun."'
        group by coa_sub.nama, coa_sub.Nomor_Perkiraan
        ) as tbl order by jumlah desc limit 4");
        foreach($qry as $row_qry)
        {
            $nama = $row_qry->jenis;
            $jml = $row_qry->jumlah;
            array_push($array_jenis_penghasilan,$nama);
            array_push($array_jum_penghasilan,$jml);
        }

        $param['jenis'] = $array_jenis_penghasilan;
        $param['jumlah'] = $array_jum_penghasilan;
        return $param;
    }

    public function Show_Financial_Check_Up_Chart_DanaImpian()
    {
        $id_wp = Auth::user()->id;
        $piltahun = $_POST['idparamth'];
        // $piltahun = 2022;

        $dataDanaImpian = array();
        $pemasukan = array();
        $pengeluaran = array();
        $labelDanaImpian = array();
        $valueDanaImpian = array();
        $valueTabungan = array();
        $valuePemasukan = 0;
        $valuePengeluaran = 0;


        $dataDanaImpian = \DB::select("select * from dana_impian
        where 
        ID_WP = '".$id_wp."' AND 
        YEAR(Tanggal) = '".$piltahun."'
        ");
        
        $pemasukan             = \DB::select("select sum(pemasukan.Jumlah) as msum from `pemasukan` where year(pemasukan.Tanggal) = '".$piltahun."' and ID_WP = '".$id_wp."'");
        foreach($pemasukan as $rowpemasukan)
        {
            $valuePemasukan = $rowpemasukan->msum;
        }

        $pengeluaran             = \DB::select("select sum(pengeluaran.Jumlah) as msum from `pengeluaran` where year(pengeluaran.Tanggal) = '".$piltahun."' and ID_WP = '".$id_wp."'");
        foreach($pengeluaran as $rowpengeluaran)
        {
            $valuePengeluaran = $rowpengeluaran->msum;
        }

        $tabungan = $valuePemasukan - $valuePengeluaran;


        foreach($dataDanaImpian as $row)
        {
            $nama = $row->Judul;
            $jml = $row->Jumlah;
            array_push($labelDanaImpian,$nama);
            array_push($valueDanaImpian,$jml);
            if ($tabungan >= $jml) {
                array_push($valueTabungan,$jml);
                $tabungan = $tabungan - $jml;
            } else {
                array_push($valueTabungan,$tabungan);
                $tabungan = 0;
            }

        }

        $param['labels'] = $labelDanaImpian;
        $param['value_danaImpian'] = $valueDanaImpian;
        $param['value_tabungan'] = $valueTabungan;
        $param['sisa_tabungan'] = $tabungan;
        return $param;
    }

    public function Show_Financial_Check_Up_SaranRasio()
    {
        $id_wp = Auth::user()->id;
        $piltahun = $_POST['idparamth'];
        // $piltahun = 2022;

        $pemasukan = array();
        $valuePemasukan = 0;

        $pemasukan             = \DB::select("select sum(pemasukan.Jumlah) as msum from `pemasukan` where year(pemasukan.Tanggal) = '".$piltahun."' and ID_WP = '".$id_wp."'");
        foreach($pemasukan as $rowpemasukan)
        {
            $valuePemasukan = $rowpemasukan->msum;
        }

        $pemasukan_1 = $valuePemasukan * 0.05;
        $pemasukan_2 = $valuePemasukan * 0.1;
        $pemasukan_3 = $valuePemasukan * 0.4;
        $pemasukan_4 = $valuePemasukan * 0.3;
        $pemasukan_5 = $valuePemasukan * 0.15;

        $param['labels'] = array("Dana Sosial", "Dana Darurat & Asuransi", "Biaya Hidup", "Tabungan/Investasi", "Biaya Lain");
        $param['value'] = array($pemasukan_1, $pemasukan_2, $pemasukan_3, $pemasukan_4, $pemasukan_5);
        return $param;
    }

    public function Show_Financial_Check_Up_Chart_Perbandingan_Hutang_Asset(Request $request)
    {
        
        $id_wp = Auth::user()->id;
        $piltahun = $_POST['idparamth'];
        
        $hutang        = Hutang::sum_hutang($id_wp,$piltahun);
        $asset        = Harta::sum_harta($id_wp,$piltahun);
        $tambah = $hutang + $asset;

        $prosentaseHutang = $tambah == 0 ? 0 : (($hutang/$tambah));
        $prosentaseAsset = $tambah == 0 ? 0 :  (($asset/$tambah));

        $param['persentase'] = array($hutang, $asset);
        $param['hutang'] = number_format($hutang, 0, ',', '.');
        $param['harta'] = number_format($asset, 0, ',', '.');
        return $param;
    }

    public function Show_Financial_Check_Up_Chart_Rasio_Pelunasan_Hutang(Request $request)
    {
        
        $id_wp = Auth::user()->id;
        $piltahun = $_POST['idparamth'];
        
        $hutang        = Hutang::sum_hutang($id_wp,$piltahun);
        $pemasukan        = Pemasukan::sum_pemasukan_tahun($id_wp,$piltahun);
        $pengeluaran        = Pengeluaran::sum_pengeluaran_tahun($id_wp,$piltahun);
        $tabungan = $pemasukan - $pengeluaran;
        $tambah = $hutang + $tabungan;

        $prosentaseHutang = $tambah == 0 ? 0 : (($hutang/$tambah));
        $prosentaseTabungan = $tambah == 0 ? 0 :  (($tabungan/$tambah));

        $param['persentase'] = array($hutang, $tabungan);
        $param['hutang'] = number_format($hutang, 0, ',', '.');
        $param['harta'] = number_format($tabungan, 0, ',', '.');
        return $param;
    }

    public function Show_Financial_Check_Up_Chart_Rasio_Perbandingan_Aset_Investasi_vs_Nilai_Bersih_Kekayaan(Request $request)
    {
        
        $id_wp = Auth::user()->id;
        $piltahun = $_POST['idparamth'];
        
        $harta        = Harta::sum_harta_investasi($id_wp,$piltahun);
        $pemasukan        = Pemasukan::sum_pemasukan_tahun($id_wp,$piltahun);
        
        $tambah = $harta + $pemasukan;

        $prosentaseHarta = $tambah == 0 ? 0 : (($harta/$tambah));
        $prosentasePemasukan = $tambah == 0 ? 0 :  (($pemasukan/$tambah));

        $param['persentase'] = array($harta, $pemasukan);
        $param['harta'] = number_format($harta, 0, ',', '.');
        $param['pemasukan'] = number_format($pemasukan, 0, ',', '.');
        return $param;
    }

    public function Show_Financial_Check_Up_Chart_Rasio_Perbandingan_Nilai_Bersih_Aset_vs_Nilai_Bersih_Kekayaan(Request $request)
    {
        
        $id_wp = Auth::user()->id;
        $piltahun = $_POST['idparamth'];
        
        $harta        = Harta::sum_harta($id_wp,$piltahun);
        $pemasukan        = Pemasukan::sum_pemasukan_tahun($id_wp,$piltahun);
        
        $tambah = $harta + $pemasukan;

        $prosentaseHarta = $tambah == 0 ? 0 : (($harta/$tambah));
        $prosentasePemasukan = $tambah == 0 ? 0 :  (($pemasukan/$tambah));

        $param['persentase'] = array($harta, $pemasukan);
        $param['harta'] = number_format($harta, 0, ',', '.');
        $param['pemasukan'] = number_format($pemasukan, 0, ',', '.');
        return $param;
    }

    public function Show_Financial_Check_Up_Chart_Budgeting()
    {
        $id_wp = Auth::user()->id;
        $piltahun = $_POST['idparamth'];
        // $piltahun = 2022;

        
        $labels = array();
        $valueBudget = array();
        $valuePengeluaran = array();
        // $valuePemasukan = 0;
        // $valuePengeluaran = 0;


        $data = \DB::select("select budget.Sub_Nomor_Perkiraan, budget.nama as nama, budget.budget as budget, pengeluaran.pengeluaran as pengeluaran from 
        (SELECT budgeting.Sub_Nomor_Perkiraan, coa_sub.Nama, sum(budgeting.Jumlah_Budget) as budget from budgeting
        join coa_sub on coa_sub.id = budgeting.Sub_Nomor_Perkiraan 
        where Year(budgeting.Exp_Berlaku) = '".$piltahun."'
        group by budgeting.Sub_Nomor_Perkiraan, coa_sub.Nama) budget
        left join (select Sub_Nomor_Perkiraan , sum(Jumlah) pengeluaran from pengeluaran p where Year(p.Tanggal) = '".$piltahun."' and ID_WP = '".$id_wp."'
        group by Sub_Nomor_Perkiraan) pengeluaran on pengeluaran.Sub_Nomor_Perkiraan = budget.Sub_Nomor_Perkiraan");
        
        // $pemasukan             = \DB::select("select sum(pemasukan.Jumlah) as msum from `pemasukan` where year(pemasukan.Tanggal) = '".$piltahun."' and ID_WP = '".$id_wp."'");
        foreach($data as $row)
        {
            array_push($labels,$row->nama);
            
            if ($row->budget != null) {
                array_push($valueBudget,$row->budget);
            } else {
                array_push($valueBudget,0);
            }

            if ($row->pengeluaran != null) {
                array_push($valuePengeluaran,$row->pengeluaran);
            } else {
                array_push($valuePengeluaran,0);
            }
            
            
        }


        

        $param['labels'] = $labels;
        $param['value_budget'] = $valueBudget;
        $param['value_pengeluaran'] = $valuePengeluaran;
        // $param['sisa_tabungan'] = $tabungan;
        return $param;
    }
}


// select budget.Sub_Nomor_Perkiraan, budget.nama, budget.budget, pengeluaran.pengeluaran from 
// (SELECT budgeting.Sub_Nomor_Perkiraan, coa_sub.Nama, sum(budgeting.Jumlah_Budget) as budget from budgeting
// join coa_sub on coa_sub.id = budgeting.Sub_Nomor_Perkiraan 
// where Year(budgeting.Exp_Berlaku) = 2022
// group by budgeting.Sub_Nomor_Perkiraan, coa_sub.Nama) budget
// left join (select Sub_Nomor_Perkiraan , sum(Jumlah) pengeluaran from pengeluaran p where Year(p.Tanggal) = 2022 and ID_WP = 6
// group by Sub_Nomor_Perkiraan) pengeluaran on pengeluaran.Sub_Nomor_Perkiraan = budget.Sub_Nomor_Perkiraan
