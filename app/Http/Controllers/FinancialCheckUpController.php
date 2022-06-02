<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use App\Models\Pemasukan;
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
        $tahun_ini          = date('Y');
        array_push($array_tahun,$tahun_ini);
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

    public function Show_Financial_Check_Up_Chart_2(Request $request)
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

        $prosentase_pemasukan_utama = (($pemasukan_utama/$pemasukan_total) * 100);
        $prosentase_pemasukan_tambahan = (($pemasukan_non_utama/$pemasukan_total) * 100);

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

    public function Show_Financial_Check_Up_Chart_3(Request $request)
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

    public function Show_Financial_Check_Up_Chart_4(Request $request)
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

    public function Show_Financial_Check_Up_Chart_5()
    {
        $id_wp = Auth::user()->id;
        // $piltahun = $_POST['idparamth'];
        $piltahun = 2022;

        $array_jenis_penghasilan = array();
        $array_jum_penghasilan = array();

        $qry = \DB::select("SELECT DISTINCT (coa_sub.nama) as jenis, (coa_sub.Nomor_Perkiraan) as noper
                            from pemasukan LEFT JOIN coa_sub on coa_sub.id = pemasukan.Sub_Nomor_Perkiraan
                            where ID_WP ='".$id_wp."' and pemasukan.show_status = 1 and YEAR(Tanggal) = '".$piltahun."' order by pemasukan.Tanggal");
        foreach($qry as $row_qry)
        {
            $nama = $row_qry->jenis;
            array_push($array_jenis_penghasilan,$nama);
            $qry_sub= \DB::select("SELECT sum(jumlah) as jumlah from pemasukan LEFT JOIN coa_sub on coa_sub.id = pemasukan.Sub_Nomor_Perkiraan where ID_WP ='".$id_wp."' and pemasukan.show_status = 1 and pemasukan.Nomor_Perkiraan = '".$row_qry->noper."' and YEAR(Tanggal) = 2022 order by pemasukan.Tanggal");
            foreach($qry_sub as $row_qry_sub)
            {
                $jumlah = $row_qry_sub->jumlah;
                array_push($array_jum_penghasilan,$jumlah);
            }
        }

        $param['jenis'] = $array_jenis_penghasilan;
        $param['jumlah'] = $array_jum_penghasilan;
        return $param;



        // $param['utama'] = number_format($pemasukan_utama, 0, ',', '.');
        // $param['non_utama'] = number_format($pemasukan_non_utama, 0, ',', '.');
        // $param['prosentase'] = $prosentase_chart_penghasilan;
        // return $param;
    }


    public function Show_Financial_Check_Up_Chart_6()
    {
        $id_wp = Auth::user()->id;
        // $piltahun = $_POST['idparamth'];
        $piltahun = 2022;

        $array_jenis_pengeluaran = array();
        $array_jum_pengeluaran = array();

        $qry = \DB::select("SELECT DISTINCT (coa_sub.nama) as jenis, (coa_sub.Nomor_Perkiraan) as noper
                            from pengeluaran LEFT JOIN coa_sub on coa_sub.id = pengeluaran.Sub_Nomor_Perkiraan
                            where ID_WP = '".$id_wp."' and pengeluaran.show_status = 1 and coa_sub.Nomor_Perkiraan is not null and YEAR(Tanggal) = '".$piltahun."' order by pengeluaran.Tanggal");
        foreach($qry as $row_qry)
        {
            $nama = $row_qry->jenis;
            array_push($array_jenis_pengeluaran,$nama);
            $qry_sub= \DB::select("SELECT sum(jumlah) as jumlah from pengeluaran LEFT JOIN coa_sub on coa_sub.id = pengeluaran.Sub_Nomor_Perkiraan where ID_WP = '".$id_wp."' and pengeluaran.show_status = 1 and pengeluaran.Nomor_Perkiraan = '".$row_qry->noper."' and YEAR(Tanggal) = 2022 order by pengeluaran.Tanggal");
            foreach($qry_sub as $row_qry_sub)
            {
                $jumlah = $row_qry_sub->jumlah;
                array_push($array_jum_pengeluaran,$jumlah);
            }
        }

        $param['jenis'] = $array_jenis_pengeluaran;
        $param['jumlah'] = $array_jum_pengeluaran;
        return $param;



        // $param['utama'] = number_format($pemasukan_utama, 0, ',', '.');
        // $param['non_utama'] = number_format($pemasukan_non_utama, 0, ',', '.');
        // $param['prosentase'] = $prosentase_chart_penghasilan;
        // return $param;
    }
}
