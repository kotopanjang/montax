<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use PDF;
use Session;
use App\Models\User;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\Hutang;
use App\Models\Budgeting;
use App\Models\Dana_Impian;
use App\Models\Harta;
use App\Models\Harta_Sub;
use App\Models\Saham;
use App\Models\Reksadana;
use App\Models\Bukti_Potong;
use App\Models\SPT_1770SS;
use App\Models\SPT_1770S;
use App\Models\CekBupot;

class ControllerWP extends Controller
{
    public function Post_Tabungan(Request $request)
    {
        $id_wp = Auth::user()->id;
        $inisial = $request->txtInisial;
        if($inisial == "")
        {
            $inisial = "-";
        }
        if($request->pilJenisSumber == 1)
        {
            $jenis = "KAS";
            $norek = "-";
            $namabank = "-";
            $pemilik = "-";

            \DB::table('sumber_dana')->insert(
                [
                    'ID_WP' => $id_wp,
                    'Jenis' => $jenis,
                    'Inisial' => $inisial,
                    'No_Rekening' => $norek,
                    'Nama_Bank' => $namabank,
                    'Pemilik_Rekening' => $pemilik,
                    'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
                    // 'show_status' => 1
                ]
            );
        }
        else if($request->pilJenisSumber == 2)
        {
            $jenis = "BANK";
            $norek = $request->txtNoRekening;
            $namabank = $request->pilRekening;
            $pemilik = $request->txtPemilikRekening;

            \DB::table('sumber_dana')->insert(
                [
                    'ID_WP' => $id_wp,
                    'Jenis' => $jenis,
                    'Inisial' => $inisial,
                    'No_Rekening' => $norek,
                    'Nama_Bank' => $namabank,
                    'Pemilik_Rekening' => $pemilik,
                    'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
                    // 'show_status' => 1
                ]
            );
        }
        else if($request->pilJenisSumber == 3)
        {
            $jenis = "RDN";
            $norek = $request->txtNoRekening;
            $namasekuritas = $request->pilSekuritas;
            $pemilik = $request->txtPemilikRekening;

            \DB::table('sumber_rdn')->insert(
                [
                    'ID_WP' => $id_wp,
                    'Inisial_RDN' => $inisial,
                    'No_Rekening' => $norek,
                    'Kode_Sekuritas' => $namasekuritas,
                    'Pemilik_Rekening' => $pemilik,
                    'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                    'show_status' => 1
                ]
            );
        }
        return redirect()->route('dashboard');
    }

    public function Show_Pemasukan()
    {
        $id_wp = Auth::user()->id;
        // $param['pemasukan']          = \DB::select("select * from pemasukan where ID_WP ='".$id_wp."'");
        $param['pemasukan']             = Pemasukan::select_pemasukan($id_wp);
        $param['sub_coa']               = \DB::select("select * from coa_sub where Nomor_Perkiraan != 4001 AND Nomor_Perkiraan <6000");
        $param['sumberdana_wp']         = \DB::select("select * from sumber_dana where ID_WP ='".$id_wp."'");
        return view('WP.pemasukan')->with($param);
        // return view('WP.pemasukan');
    }

    public function Post_Pemasukan(Request $request)
    {
        $id_wp = Auth::user()->id;
        if($request->pilJenis == 1 )//Pemasukan Utama
        {
            $Nomor_Perkiraan = 4001;
            $Sub_Nomor_Perkiraan = 400101;
        }
        else if($request->pilJenis == 2 )//Pemasukan Tambahan
        {
            $Nomor_Perkiraan = substr($request->pilJenisPT,0,4);
            $Sub_Nomor_Perkiraan = $request->pilJenisPT;
        }
        $tanggal = $request->pilTanggal;
        $jumlah = $request->txtJumlah;
        $masuk_ke = $request->pilSumberDana;
        $keterangan = $request->txt_Keterangan;

        if($keterangan==""){$keterangan = "-";}
        $simpan_pemasukan = new Pemasukan;
        $simpan_pemasukan->ID_WP = $id_wp;
        $simpan_pemasukan->Nomor_Perkiraan = $Nomor_Perkiraan;
        $simpan_pemasukan->Sub_Nomor_Perkiraan = $Sub_Nomor_Perkiraan;
        $simpan_pemasukan->Tanggal = $tanggal;
        $simpan_pemasukan->Jumlah = (int)str_replace('.', '', $jumlah);
        $simpan_pemasukan->Keterangan = $keterangan;
        $simpan_pemasukan->Masuk_Ke = $masuk_ke;
        $simpan_pemasukan->created_at = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        $simpan_pemasukan->updated_at = NULL;
        $simpan_pemasukan->show_status = 1;
        $simpan_pemasukan->save();
        // \DB::table('pemasukan')->insert(
        //     [
        //         'ID_WP' => $id_wp,
        //         'Nomor_Perkiraan' => $Nomor_Perkiraan,
        //         'Sub_Nomor_Perkiraan' => $Sub_Nomor_Perkiraan,
        //         'Tanggal' => $tanggal,
        //         'Jumlah' => $jumlah,
        //         'Keterangan' => $keterangan,
        //         'Masuk_Ke' => $masuk_ke,
        //         'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        //         'show_status' => 1
        //     ]
        // );
        return redirect()->route('pemasukan_WP');
    }

    public function Pemasukan_Showdatable()
    {
        $id_wp = Auth::user()->id;;
        $data = array();
        $pemasukan    =\DB::select("SELECT *, coa_sub.nama as jenis from pemasukan LEFT JOIN coa_sub on coa_sub.id = pemasukan.Sub_Nomor_Perkiraan where ID_WP ='".$id_wp."' and pemasukan.show_status = 1 order by pemasukan.Tanggal");

        $kal_button_toggle_1 ="<div class='dropdown'>
                                <button type='button' class='btn btn-sm dropdown-toggle hide-arrow py-0' data-bs-toggle='dropdown'>
                                    <i data-feather='more-vertical'></i>
                                </button>
                                <div class='dropdown-menu dropdown-menu-end'>
                                    <a class='dropdown-item' onclick='EditPemasukan(";
        $kal_button_toggle_2 =")'>
                                        <i data-feather='edit-2' class='me-50'></i>
                                        <span>Edit</span>
                                    </a>
                                    <a class='dropdown-item' onclick='DeletePemasukan(";
        $kal_button_toggle_3  =")'>
                                        <i data-feather='trash' class='me-50'></i>
                                        <span>Delete</span>
                                    </a>
                                </div>
                            </div>";
        foreach($pemasukan as $rowpemasukan)
        {
            $record     = array();
            // $record[]   = date("d F Y", strtotime($rowpemasukan->Tanggal));
            $record[]   = $rowpemasukan->Tanggal;
            if($rowpemasukan->jenis != "")
            {
                if($rowpemasukan->jenis == "Gaji")
                {
                    $record[]   = "<span class='badge rounded-pill badge-light-success me-1'>" . $rowpemasukan->jenis. "</span>";
                }
                else
                {
                    $record[]   = "<span class='badge rounded-pill badge-light-primary me-1'>" . $rowpemasukan->jenis. "</span>";
                }
            }


            $record[]   = $rowpemasukan->Jumlah;
            $record[]   = $rowpemasukan->Keterangan;
            $record[]   = $kal_button_toggle_1 . $rowpemasukan->ID_Record .$kal_button_toggle_2 . $rowpemasukan->ID_Record . $kal_button_toggle_3;
            $data[]     = $record;
        }

        $callback = array(
            'data'=>$data
        );

        header('Content-Type: application/json');
        echo json_encode($callback);
    }

    public function cek()
    {
        echo "cek <br>";
        if(Session::has('tgl_start'))
        {
            echo "Ada sesi";
        }
        else
        {
            echo "tidak ada sesi";
        }
        // if ($request->session()->has('tgl_start')) {
        //     echo "Ada";
        // }
        // else
        // {
        //     echo "no";
        // }
    }

    public function Pemasukan_Showdatable_Param($param1,$param2)
    {
        $id_wp = Auth::user()->id;
        $data = array();

        $tgl_start = $param1;
        $tgl_end = $param2;

        // $tgl_start = $_POST['ptgl_start'];
        // $tgl_end = $_POST['ptgl_end'];

        // session()->forget('tgl_start');
        // session()->forget('tgl_end');

        $pemasukan    =\DB::select("SELECT *, coa_sub.nama as jenis from pemasukan LEFT JOIN coa_sub on coa_sub.id = pemasukan.Sub_Nomor_Perkiraan where pemasukan.Tanggal BETWEEN '".$tgl_start."' AND '".$tgl_end."' and ID_WP ='".$id_wp."' and pemasukan.show_status = 1 order by pemasukan.Tanggal");

        // $pemasukan    =\DB::select("SELECT *, coa_sub.nama as jenis from pemasukan LEFT JOIN coa_sub on coa_sub.id = pemasukan.Sub_Nomor_Perkiraan where pemasukan.Tanggal BETWEEN '2020-01-01' AND '2021-06-30' and ID_WP ='".$id_wp."' and pemasukan.show_status = 1 order by pemasukan.Tanggal");

        $kal_button_toggle_1 ="<div class='dropdown'>
                                <button type='button' class='btn btn-sm dropdown-toggle hide-arrow py-0' data-bs-toggle='dropdown'>
                                    <i data-feather='more-vertical'></i>
                                </button>
                                <div class='dropdown-menu dropdown-menu-end'>
                                    <a class='dropdown-item' onclick='EditPemasukan(";
        $kal_button_toggle_2 =")'>
                                        <i data-feather='edit-2' class='me-50'></i>
                                        <span>Edit</span>
                                    </a>
                                    <a class='dropdown-item' onclick='DeletePemasukan(";
        $kal_button_toggle_3  =")'>
                                        <i data-feather='trash' class='me-50'></i>
                                        <span>Delete</span>
                                    </a>
                                </div>
                            </div>";
        foreach($pemasukan as $rowpemasukan)
        {
            $record     = array();
            // $record[]   = date("d F Y", strtotime($rowpemasukan->Tanggal));
            $record[]   = $rowpemasukan->Tanggal;
            if($rowpemasukan->jenis != "")
            {
                if($rowpemasukan->jenis == "Gaji")
                {
                    $record[]   = "<span class='badge rounded-pill badge-light-success me-1'>" . $rowpemasukan->jenis. "</span>";
                }
                else
                {
                    $record[]   = "<span class='badge rounded-pill badge-light-primary me-1'>" . $rowpemasukan->jenis. "</span>";
                }
            }


            $record[]   = $rowpemasukan->Jumlah;
            $record[]   = $rowpemasukan->Keterangan;
            $record[]   = $kal_button_toggle_1 . $rowpemasukan->ID_Record .$kal_button_toggle_2 . $rowpemasukan->ID_Record . $kal_button_toggle_3;
            $data[]     = $record;
        }

        $callback = array(
            'data'=>$data
        );

        header('Content-Type: application/json');
        echo json_encode($callback);
    }

    public function Show_Edit_Pemasukan(Request $request)
    {
        $idparam = $_POST['idparam'];
        // $kalimat = "paramnya adalah " . $idparam;
        $param['id']            = $idparam;
        $param['Kategori']      = 1;
        $param['JenisSumber']   = 1;
        $json_tanggal           = \DB::select("select * from Pemasukan where ID_Record = '".$idparam."'");
        foreach($json_tanggal as $rowjson_tanggal)
        {
            $param['NomorPerkiraan']        = $rowjson_tanggal->Nomor_Perkiraan;
            $param['SubNomorPerkiraan']     = $rowjson_tanggal->Sub_Nomor_Perkiraan;
            $param['Tanggal']               = $rowjson_tanggal->Tanggal;
            $param['Jumlah']                = number_format($rowjson_tanggal->Jumlah, 0, ',', '.');
            $param['Keterangan']            = $rowjson_tanggal->Keterangan;
            $param['Masuk_Ke']              = $rowjson_tanggal->Masuk_Ke;
        }
        if($param['Masuk_Ke'] > 1)
        {
            $param['JenisSumber'] = 2;
        }
        if($param['NomorPerkiraan'] != 4001)
        {
            $param['Kategori'] = 2;
        }
        return $param;
    }

    public function Post_Edit_Pemasukan(Request $request)
    {
        $id_wp = Auth::user()->id;

        $id_records = $_POST['param_txt_paramID'];
        $tanggal = $_POST['param_edt_pilTanggal'];
        $edt_pilJenis = $_POST['param_edt_pilJenis'];
        $edt_pilJenisPT = $_POST['param_edt_pilJenisPT'];
        $jumlah = $_POST['param_edt_txtJumlah'];
        $keterangan = $_POST['param_edt_txt_Keterangan'];
        $masuk_ke = $_POST['param_edt_pilSumberDana'];

        // $kalimat = "a = " . $a . " | b = " . $b . " | c = " . $c . " | d = " . $d . " | e = " . $e . " | f = " . $f . " | g = " . $g . " | " ;
        // return $kalimat;
        if($edt_pilJenis == 1 )//Pemasukan Utama
        {
            $Nomor_Perkiraan = 4001;
            $Sub_Nomor_Perkiraan = 400101;
        }
        else if($edt_pilJenis == 2 )//Pemasukan Tambahan
        {
            $Nomor_Perkiraan = substr($edt_pilJenisPT,0,4);
            $Sub_Nomor_Perkiraan = $edt_pilJenisPT;
        }

        if($keterangan==""){$keterangan = "-";}

        Pemasukan::where('ID_WP',$id_wp)
                    ->where('ID_Record',$id_records)
                    ->update(
                                [
                                    'Nomor_Perkiraan' => $Nomor_Perkiraan,
                                    'Sub_Nomor_Perkiraan' => $Sub_Nomor_Perkiraan,
                                    'Tanggal' => $tanggal,
                                    'Jumlah' => (int)str_replace('.', '', $jumlah),
                                    'Keterangan' => $keterangan,
                                    'Masuk_Ke' => $masuk_ke,
                                    'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
                                ]
                            );
        // return redirect()->route('pemasukan_WP');
    }

    public function Post_Delete_Pemasukan(Request $request)
    {
        $id_wp = Auth::user()->id;
        $id_records = $request->idparam;
        // \DB::table('pemasukan')
        //     ->where('ID_Record',$id_records)
        //     ->where('ID_WP',$id_wp)
        //     ->delete();
        Pemasukan::where('ID_WP',$id_wp)
                    ->where('ID_Record',$id_records)
                    ->update(
                                [
                                    'show_status' => 0,
                                    'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
                                ]
                            );
        return redirect()->route('pemasukan_WP');
    }

    public function Show_Pengeluaran()
    {
        // return view('WP.pengeluaran');
        $id_wp = Auth::user()->id;
        $param['pengeluaran']              =\DB::select("SELECT *, coa_sub.nama as jenis from pengeluaran LEFT JOIN coa_sub on coa_sub.id = pengeluaran.Sub_Nomor_Perkiraan where ID_WP ='".$id_wp."' order by pengeluaran.Tanggal");
        $param['coa']                      = \DB::select("select * from coa where Nomor_Perkiraan >= 6001 AND Nomor_Perkiraan <7000");
        // $param['sub_coa']               = \DB::select("select * from coa_sub where Nomor_Perkiraan >= 6001 AND Nomor_Perkiraan <7000");
        $param['sub_coa']                 = \DB::select("select * from coa_sub where Nomor_Perkiraan >= 6001 AND Nomor_Perkiraan <7000 and (Created_by = ".$id_wp." or Created_by is NULL)");
        $param['sumberdana_wp']                   =\DB::select("SELECT *, bank.nama_bank as namabank from sumber_dana LEFT JOIN bank on bank.kode_bank = sumber_dana.Nama_Bank where ID_WP ='".$id_wp."' order by sumber_dana.ID_Record");
        return view('WP.pengeluaran')->with($param);
    }

    public function Combobox_Sub_Pengeluaran(Request $request)
    {
        $id_wp = Auth::user()->id;
        $param_pengeluaran      = $_POST['COA_Pengeluaran'];
        $kalimat                = "<option value=''> Pilih Sub Kategori </option>";
        // $data_sub_pengeluaran   = \DB::table('coa_sub')
        //                             ->where('Nomor_Perkiraan',$param_pengeluaran)
        //                             ->where()
        //                             ->get();
        $data_sub_pengeluaran   = \DB::select("select * from coa_sub where Nomor_Perkiraan = '".$param_pengeluaran."' and (Created_by = ".$id_wp." or Created_by is NULL)");
        foreach($data_sub_pengeluaran as $dt_sub_pengeluaran)
        {
            $id         = $dt_sub_pengeluaran->ID;
            $nama       = $dt_sub_pengeluaran->Nama;
            $kalimat    = $kalimat . "<option value='".$id."'> ".$nama." </option>";
        }
        // $kalimat                = $kalimat . "<option value=''> Pilih Sub Kategori </option>";
        return $kalimat;
    }

    public function Post_Pengeluaran(Request $request){
        $id_wp = Auth::user()->id;

        $tanggal = $request->pilTanggal;
        $jenis = $request->pilJenisPengeluaran;
        $nomor_Perkiraan = substr($request->pilJenisSubPengeluaran,0,4);
        $sub_jenis = $request->pilJenisSubPengeluaran;
        $jumlah = $request->txtJumlah;
        $keterangan = $request->txt_Keterangan;
        $sumber_dana = $request->pilSumberDana;

        if($keterangan==""){$keterangan = "-";}
        $simpan_pengeluaran = new Pengeluaran;

        $simpan_pengeluaran->ID_WP = $id_wp;
        $simpan_pengeluaran->Nomor_Perkiraan = $nomor_Perkiraan;
        $simpan_pengeluaran->Sub_Nomor_Perkiraan = $sub_jenis;
        $simpan_pengeluaran->Tanggal = $tanggal;
        $simpan_pengeluaran->Jumlah = (int)str_replace('.', '', $jumlah);
        $simpan_pengeluaran->Keterangan = $keterangan;
        $simpan_pengeluaran->Sumber_Dana = $sumber_dana;
        $simpan_pengeluaran->created_at = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        $simpan_pengeluaran->updated_at = NULL;
        $simpan_pengeluaran->Show_Status = 1;
        $simpan_pengeluaran->save();
        return redirect()->route('pengeluaran_WP');
    }


    public function CustomCategory_Sub_Pengeluaran(Request $request)
    {
        $id_wp = Auth::user()->id;
        $param_pengeluaran      = $_POST['COA_Pengeluaran'];
        $kalimat                = "<table class='table'>";
        $data_sub_pengeluaran   = \DB::table('coa_sub')
                                    ->where('Nomor_Perkiraan',$param_pengeluaran)
                                    ->where('Created_by','=',NULL)
                                    ->get();

        $data_sub_pengeluaran_custom   = \DB::table('coa_sub')
                                            ->where('Nomor_Perkiraan','=',$param_pengeluaran)
                                            ->where('Created_by','=',$id_wp)
                                            ->get();

        foreach($data_sub_pengeluaran as $dt_sub_pengeluaran)
        {
            $id         = $dt_sub_pengeluaran->ID;
            $nama       = $dt_sub_pengeluaran->Nama;
            $kalimat    = $kalimat . "<tr> <td> ".$id."</td> <td>".$nama." </td> </tr>";
        }

        foreach($data_sub_pengeluaran_custom as $dt_sub_pengeluaran_custom)
        {
            $id         = $dt_sub_pengeluaran_custom->ID;
            $nama       = $dt_sub_pengeluaran_custom->Nama;
            $kalimat    = $kalimat . "<tr> <td> ".$id."</td> <td>".$nama." </td> </tr>";
        }
        $kalimat                = $kalimat . "</table>";
        return $kalimat;
    }

    public function Pengeluaran_Showdatable() {
        $id_wp = Auth::user()->id;;
        $data = array();
        // $pengeluaran    =\DB::select("SELECT *, coa_sub.nama as jenis, sumber_dana.jenis as jenis_sumber_dana, sumber_dana.Inisial as inisial_sumber_dana
        //                             from pengeluaran
        //                             LEFT JOIN coa_sub on coa_sub.id = pengeluaran.Sub_Nomor_Perkiraan
        //                             LEFT JOIN sumber_dana on sumber_dana.ID_Record = pengeluaran.Sumber_Dana
        //                             where pengeluaran.ID_WP = '".$id_wp."' and sumber_dana.ID_WP = '".$id_wp."'
        //                             order by pengeluaran.Tanggal;");

        $pengeluaran            =\DB::select("SELECT pengeluaran.* , sumber_dana.Jenis as sdj, sumber_dana.Inisial as sdi, coa.Nama as cn, coa_sub.Nama as scn
                                                FROM pengeluaran, sumber_dana, coa, coa_sub
                                                WHERE pengeluaran.ID_WP = '".$id_wp."' and
                                                pengeluaran.Sumber_Dana = Sumber_Dana.ID_Record and
                                                pengeluaran.Nomor_Perkiraan = coa.Nomor_Perkiraan and
                                                pengeluaran.Sub_Nomor_Perkiraan = coa_sub.ID and pengeluaran.show_status = 1");

        $kal_button_toggle_1 ="<div class='dropdown'>
                                <button type='button' class='btn btn-sm dropdown-toggle hide-arrow py-0' data-bs-toggle='dropdown'>
                                    <i data-feather='more-vertical'></i>
                                </button>
                                <div class='dropdown-menu dropdown-menu-end'>
                                    <a class='dropdown-item' onclick='EditPengeluaran(";
        $kal_button_toggle_2 =")'>
                                        <i data-feather='edit-2' class='me-50'></i>
                                        <span>Edit</span>
                                    </a>
                                    <a class='dropdown-item' onclick='DeletePengeluaran(";
        $kal_button_toggle_3  =")'>
                                        <i data-feather='trash' class='me-50'></i>
                                        <span>Delete</span>
                                    </a>
                                </div>
                            </div>";
        foreach($pengeluaran as $rowpengeluaran)
        {
            $record     = array();
            // $record[]   = date("d F Y", strtotime($rowpengeluaran->Tanggal));
            $record[]   = $rowpengeluaran->Tanggal;
            $record[]   = $rowpengeluaran->cn;
            $record[]   = $rowpengeluaran->scn;
            $record[]   = $rowpengeluaran->Jumlah;
            $record[]   = $rowpengeluaran->sdj . " - " . $rowpengeluaran->sdi;
            $record[]   = $rowpengeluaran->Keterangan;
            $record[]   = $kal_button_toggle_1 . $rowpengeluaran->ID_Record . $kal_button_toggle_2 . $rowpengeluaran->ID_Record . $kal_button_toggle_3;
            $data[]     = $record;
        }

        $callback = array(
            'data'=>$data
        );

        header('Content-Type: application/json');
        echo json_encode($callback);
    }


    public function Pengeluaran_Showdatable_Param($param1,$param2)
    {
        $id_wp = Auth::user()->id;
        $data = array();

        $tgl_start = $param1;
        $tgl_end = $param2;

        $pengeluaran            =\DB::select("SELECT pengeluaran.* , sumber_dana.Jenis as sdj, sumber_dana.Inisial as sdi, coa.Nama as cn, coa_sub.Nama as scn
                                                FROM pengeluaran, sumber_dana, coa, coa_sub
                                                WHERE pengeluaran.ID_WP = '".$id_wp."' and
                                                pengeluaran.Tanggal BETWEEN '".$tgl_start."' AND '".$tgl_end."' and
                                                pengeluaran.Sumber_Dana = Sumber_Dana.ID_Record and
                                                pengeluaran.Nomor_Perkiraan = coa.Nomor_Perkiraan and
                                                pengeluaran.Sub_Nomor_Perkiraan = coa_sub.ID and pengeluaran.show_status = 1");

        $kal_button_toggle_1 ="<div class='dropdown'>
                                <button type='button' class='btn btn-sm dropdown-toggle hide-arrow py-0' data-bs-toggle='dropdown'>
                                    <i data-feather='more-vertical'></i>
                                </button>
                                <div class='dropdown-menu dropdown-menu-end'>
                                    <a class='dropdown-item' onclick='EditPengeluaran(";
        $kal_button_toggle_2 =")'>
                                        <i data-feather='edit-2' class='me-50'></i>
                                        <span>Edit</span>
                                    </a>
                                    <a class='dropdown-item' onclick='DeletePengeluaran(";
        $kal_button_toggle_3  =")'>
                                        <i data-feather='trash' class='me-50'></i>
                                        <span>Delete</span>
                                    </a>
                                </div>
                            </div>";
        foreach($pengeluaran as $rowpengeluaran)
        {
            $record     = array();
            // $record[]   = date("d F Y", strtotime($rowpengeluaran->Tanggal));
            $record[]   = $rowpengeluaran->Tanggal;
            $record[]   = $rowpengeluaran->cn;
            $record[]   = $rowpengeluaran->scn;
            $record[]   = $rowpengeluaran->Jumlah;
            $record[]   = $rowpengeluaran->sdj . " - " . $rowpengeluaran->sdi;
            $record[]   = $rowpengeluaran->Keterangan;
            $record[]   = $kal_button_toggle_1 . $rowpengeluaran->ID_Record . $kal_button_toggle_2 . $rowpengeluaran->ID_Record . $kal_button_toggle_3;
            $data[]     = $record;
        }

        $callback = array(
            'data'=>$data
        );

        header('Content-Type: application/json');
        echo json_encode($callback);
    }

    public function Show_Edit_Pengeluaran(Request $request)
    {
        $idparam = $_POST['idparam'];
        // $kalimat = "paramnya adalah " . $idparam;
        $param['id']            = $idparam;
        $json_tanggal           = \DB::select("select * from Pengeluaran where ID_Record = '".$idparam."'");
        foreach($json_tanggal as $rowjson_tanggal)
        {
            $param['NomorPerkiraan']        = $rowjson_tanggal->Nomor_Perkiraan;
            $param['SubNomorPerkiraan']     = $rowjson_tanggal->Sub_Nomor_Perkiraan;
            $param['Tanggal']               = $rowjson_tanggal->Tanggal;
            $param['Jumlah']                = number_format($rowjson_tanggal->Jumlah, 0, ',', '.');
            $param['Keterangan']            = $rowjson_tanggal->Keterangan;
            $param['Sumber_Dana']           = $rowjson_tanggal->Sumber_Dana;
        }
        return $param;
    }

    public function Post_Edit_Pengeluaran(Request $request)
    {
        $id_wp = Auth::user()->id;

        $id_records = $_POST['param_txt_paramID'];
        $tanggal = $_POST['param_edt_pilTanggal'];
        $edt_pilJenis = $_POST['param_edt_pilJenis'];
        $edt_pilSubJenis = $_POST['param_edt_pilSubJenis'];
        $jumlah = $_POST['param_edt_Jumlah'];
        $keterangan = $_POST['param_edt_Keterangan'];
        $masuk_ke = $_POST['param_edt_SumberDana'];

        // $kalimat = "a = " . $a . " | b = " . $b . " | c = " . $c . " | d = " . $d . " | e = " . $e . " | f = " . $f . " | g = " . $g . " | " ;
        // return $kalimat;


        if($keterangan==""){$keterangan = "-";}

        Pengeluaran::where('ID_WP',$id_wp)
                    ->where('ID_Record',$id_records)
                    ->update(
                                [
                                    'Nomor_Perkiraan' => $edt_pilJenis,
                                    'Sub_Nomor_Perkiraan' => $edt_pilSubJenis,
                                    'Tanggal' => $tanggal,
                                    'Jumlah' => (int)str_replace('.', '', $jumlah),
                                    'Keterangan' => $keterangan,
                                    'Sumber_Dana' => $masuk_ke,
                                    'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
                                ]
                            );
    }

    public function Post_Delete_Pengeluaran(Request $request)
    {
        $id_wp = Auth::user()->id;
        $id_records = $request->idparam;
        \DB::table('pengeluaran')
            ->where('ID_Record',$id_records)
            ->where('ID_WP',$id_wp)
            ->update(
                [
                    'show_status' => 0,
                ]
            );
    }

    public function Show_Hutang()
    {
        $id_wp = Auth::user()->id;
        $param['hutang']                = Hutang::select_hutang($id_wp);
        $param['sumberdana_wp']         = \DB::select("select * from sumber_dana where ID_WP ='".$id_wp."' ");
        return view('WP.hutang')->with($param);
    }

    public function Post_Hutang(Request $request)
    {
        $id_wp = Auth::user()->id;

        $tanggal = $request->pilTanggal;
        $tanggal_exp = $request->pilTanggal_exp;
        $jumlah = $request->txtJumlah;
        $pemberi_pinjaman = $request->txt_pemberi_pinjaman;
        $masuk_ke = $request->pilSumberDana;
        $keterangan = $request->txt_Keterangan;

        if($keterangan==""){$keterangan = "-";}
        $simpan_hutang = new Hutang;
        $simpan_hutang->ID_WP = $id_wp;
        $simpan_hutang->Tanggal = $tanggal;
        $simpan_hutang->Tanggal_JatuhTempo = $tanggal_exp;
        $simpan_hutang->Jumlah = (int)str_replace('.', '', $jumlah);
        $simpan_hutang->Pemberi_Pinjaman = $pemberi_pinjaman;
        $simpan_hutang->Keterangan = $keterangan;
        $simpan_hutang->Masuk_Ke = $masuk_ke;
        $simpan_hutang->created_at = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        $simpan_hutang->updated_at = NULL;
        $simpan_hutang->show_status = 1;
        $simpan_hutang->save();
        return redirect()->route('hutang_WP');
    }

    public function Hutang_Showdatable()
    {
        $id_wp = Auth::user()->id;;
        $data = array();
        $hutang    =\DB::select("SELECT * from hutang where ID_WP ='".$id_wp."' and show_status = '1' order by hutang.Tanggal");

        $kal_button_toggle_1 ="<div class='dropdown'>
                                <button type='button' class='btn btn-sm dropdown-toggle hide-arrow py-0' data-bs-toggle='dropdown'>
                                    <i data-feather='more-vertical'></i>
                                </button>
                                <div class='dropdown-menu dropdown-menu-end'>
                                    <a class='dropdown-item' onclick='EditHutang(";
        $kal_button_toggle_2 =")'>
                                        <i data-feather='edit-2' class='me-50'></i>
                                        <span>Edit</span>
                                    </a>
                                    <a class='dropdown-item' onclick='DeleteHutang(";
        $kal_button_toggle_3  =")'>
                                        <i data-feather='trash' class='me-50'></i>
                                        <span>Delete</span>
                                    </a>
                                </div>
                            </div>";
        foreach($hutang as $row_hutang)
        {
            $record     = array();
            // $record[]   = date("d F Y", strtotime($row_hutang->Tanggal));
            $record[]   = $row_hutang->Tanggal;
            // if($row_hutang->jenis != "")
            // {
            //     if($row_hutang->jenis == "Gaji")
            //     {
            //         $record[]   = "<span class='badge rounded-pill badge-light-success me-1'>" . $row_hutang->jenis. "</span>";
            //     }
            //     else
            //     {
            //         $record[]   = "<span class='badge rounded-pill badge-light-primary me-1'>" . $row_hutang->jenis. "</span>";
            //     }
            // }


            $record[]   = $row_hutang->Tanggal_JatuhTempo;
            $record[]   = $row_hutang->Jumlah;
            $record[]   = $row_hutang->Pemberi_Pinjaman;
            $record[]   = $row_hutang->Keterangan;
            $record[]   = $row_hutang->Masuk_Ke;
            $record[]   = $kal_button_toggle_1 . $row_hutang->ID_Record .$kal_button_toggle_2 . $row_hutang->ID_Record . $kal_button_toggle_3;
            $data[]     = $record;
        }

        $callback = array(
            'data'=>$data
        );

        header('Content-Type: application/json');
        echo json_encode($callback);
    }


    public function Hutang_Showdatable_Param($param1,$param2)
    {
        $id_wp = Auth::user()->id;
        $data = array();

        $tgl_start = $param1;
        $tgl_end = $param2;

        $hutang    =\DB::select("SELECT * from hutang where ID_WP ='".$id_wp."' and hutang.Tanggal BETWEEN '".$tgl_start."' AND '".$tgl_end."' and show_status = '1' order by hutang.Tanggal");

        $kal_button_toggle_1 ="<div class='dropdown'>
                                <button type='button' class='btn btn-sm dropdown-toggle hide-arrow py-0' data-bs-toggle='dropdown'>
                                    <i data-feather='more-vertical'></i>
                                </button>
                                <div class='dropdown-menu dropdown-menu-end'>
                                    <a class='dropdown-item' onclick='EditHutang(";
        $kal_button_toggle_2 =")'>
                                        <i data-feather='edit-2' class='me-50'></i>
                                        <span>Edit</span>
                                    </a>
                                    <a class='dropdown-item' onclick='DeleteHutang(";
        $kal_button_toggle_3  =")'>
                                        <i data-feather='trash' class='me-50'></i>
                                        <span>Delete</span>
                                    </a>
                                </div>
                            </div>";
        foreach($hutang as $row_hutang)
        {
            $record     = array();
            // $record[]   = date("d F Y", strtotime($row_hutang->Tanggal));
            $record[]   = $row_hutang->Tanggal;
            // if($row_hutang->jenis != "")
            // {
            //     if($row_hutang->jenis == "Gaji")
            //     {
            //         $record[]   = "<span class='badge rounded-pill badge-light-success me-1'>" . $row_hutang->jenis. "</span>";
            //     }
            //     else
            //     {
            //         $record[]   = "<span class='badge rounded-pill badge-light-primary me-1'>" . $row_hutang->jenis. "</span>";
            //     }
            // }


            $record[]   = $row_hutang->Tanggal_JatuhTempo;
            $record[]   = $row_hutang->Jumlah;
            $record[]   = $row_hutang->Pemberi_Pinjaman;
            $record[]   = $row_hutang->Keterangan;
            $record[]   = $row_hutang->Masuk_Ke;
            $record[]   = $kal_button_toggle_1 . $row_hutang->ID_Record .$kal_button_toggle_2 . $row_hutang->ID_Record . $kal_button_toggle_3;
            $data[]     = $record;
        }

        $callback = array(
            'data'=>$data
        );

        header('Content-Type: application/json');
        echo json_encode($callback);
    }

    public function Show_Edit_Hutang(Request $request)
    {
        $idparam = $_POST['idparam'];
        // $kalimat = "paramnya adalah " . $idparam;
        // return $kalimat;
        $param['id']            = $idparam;
        // $id_wp = Auth::user()->id;

        $json_hutang           = \DB::select("select * from hutang where ID_Record = '".$idparam."'");
        foreach($json_hutang as $rowjson_hutang)
        {
            $param['Tanggal']                   = $rowjson_hutang->Tanggal;
            $param['Tanggal_JatuhTempo']        = $rowjson_hutang->Tanggal_JatuhTempo;
            $param['Jumlah']                    = number_format($rowjson_hutang->Jumlah, 0, ',', '.');
            $param['Pemberi_Pinjaman']          = $rowjson_hutang->Pemberi_Pinjaman;
            $param['Keterangan']                = $rowjson_hutang->Keterangan;
            $param['Masuk_Ke']                  = $rowjson_hutang->Masuk_Ke;
        }
        return $param;
    }

    public function Post_Edit_Hutang(Request $request)
    {
        $id_wp = Auth::user()->id;

        $id_records = $_POST['param_paramID'];
        $tanggal = $_POST['param_tanggal'];
        $tanggalExp = $_POST['param_tanggalExp'];
        $jumlah = $_POST['param_jumlah'];
        $pemberi_pinjaman = $_POST['param_pemberi_pinjaman'];
        $sumber_dana = $_POST['param_sumber_dana'];
        $keterangan = $_POST['param_keterangan'];

        if($keterangan==""){$keterangan = "-";}
        if($tanggal == "") {$tanggal = NULL;}
        if($tanggalExp == "") {$tanggalExp = NULL;}
        // $kalimat = $id_records . " | " . $tanggal . " | " . $tanggalExp . " | " . $jumlah . " | " . $pemberi_pinjaman . " | " . $sumber_dana . " | ". $keterangan;
        // return $kalimat;

        Hutang::where('ID_WP',$id_wp)
                    ->where('ID_Record',$id_records)
                    ->update(
                                [
                                    'Tanggal' => $tanggal,
                                    'Tanggal_JatuhTempo' => $tanggalExp,
                                    'Jumlah' => (int)str_replace('.', '', $jumlah),
                                    'Pemberi_Pinjaman' => $pemberi_pinjaman,
                                    'Keterangan' => $keterangan,
                                    'Masuk_Ke' => $sumber_dana,
                                    'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
                                ]
                            );
    }

    public function Post_Delete_Hutang(Request $request)
    {
        $id_wp = Auth::user()->id;
        $id_records = $request->idparam;
        \DB::table('hutang')
            ->where('ID_Record',$id_records)
            ->where('ID_WP',$id_wp)
            ->update(
                [
                    'show_status' => 0,
                ]
            );
    }

    public function Show_Budgeting()
    {
        $id_wp = Auth::user()->id;
        $param['pengeluaran']              =\DB::select("SELECT *, coa_sub.nama as jenis from pengeluaran LEFT JOIN coa_sub on coa_sub.id = pengeluaran.Sub_Nomor_Perkiraan where ID_WP ='".$id_wp."' order by pengeluaran.Tanggal");
        $param['coa']                      = \DB::select("select * from coa where Nomor_Perkiraan >= 6001 AND Nomor_Perkiraan <7000");
        // $param['sub_coa']               = \DB::select("select * from coa_sub where Nomor_Perkiraan >= 6001 AND Nomor_Perkiraan <7000");
        $param['sub_coa']                 = \DB::select("select * from coa_sub where Nomor_Perkiraan >= 6001 AND Nomor_Perkiraan <7000 and (Created_by = ".$id_wp." or Created_by is NULL)");
        return view('WP.budgeting')->with($param);
    }

    public function Post_Budgeting(Request $request)
    {
        $id_wp = Auth::user()->id;

        $tanggal = $request->pilTanggal;
        $tanggal_exp = $request->pilTanggal_exp;
        $jenis = $request->pilJenisPengeluaran;
        $nomor_Perkiraan = substr($request->pilJenisSubPengeluaran,0,4);
        $sub_jenis = $request->pilJenisSubPengeluaran;
        $jumlah = $request->txtJumlah;

        $simpan_budgeting = new Budgeting;
        $simpan_budgeting->ID_WP = $id_wp;
        $simpan_budgeting->Nomor_Perkiraan = $nomor_Perkiraan;
        $simpan_budgeting->Sub_Nomor_Perkiraan = $sub_jenis;
        $simpan_budgeting->Start_Berlaku = $tanggal;
        $simpan_budgeting->Exp_Berlaku = $tanggal_exp;
        $simpan_budgeting->Jumlah_Budget = (int)str_replace('.', '', $jumlah);
        // $simpan_budgeting->Keterangan = $keterangan;

        $simpan_budgeting->created_at = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        $simpan_budgeting->show_status = 1;
        $simpan_budgeting->save();
        return redirect()->route('budgeting_WP');
    }

    public function Budgeting_Showdatable() {
        $id_wp = Auth::user()->id;;
        $data = array();

        $budgeting  =\DB::select("SELECT budgeting.* , coa.Nama as cn, coa_sub.Nama as scn
                                                FROM budgeting, coa, coa_sub
                                                WHERE budgeting.ID_WP = '".$id_wp."' and
                                                budgeting.Nomor_Perkiraan = coa.Nomor_Perkiraan and
                                                budgeting.Sub_Nomor_Perkiraan = coa_sub.ID and budgeting.show_status = 1");

        $kal_button_toggle_1 ="<div class='dropdown'>
                                <button type='button' class='btn btn-sm dropdown-toggle hide-arrow py-0' data-bs-toggle='dropdown'>
                                    <i data-feather='more-vertical'></i>
                                </button>
                                <div class='dropdown-menu dropdown-menu-end'>
                                    <a class='dropdown-item' onclick='EditBudgeting(";
        $kal_button_toggle_2 =")'>
                                        <i data-feather='edit-2' class='me-50'></i>
                                        <span>Edit</span>
                                    </a>
                                    <a class='dropdown-item' onclick='DeleteBudgeting(";
        $kal_button_toggle_3  =")'>
                                        <i data-feather='trash' class='me-50'></i>
                                        <span>Delete</span>
                                    </a>
                                </div>
                            </div>";
        foreach($budgeting as $row_budgeting)
        {
            $record     = array();
            // $record[]   = date("d F Y", strtotime($rowpengeluaran->Tanggal));
            $record[]   = $row_budgeting->Start_Berlaku;
            $record[]   = $row_budgeting->Exp_Berlaku;
            $record[]   = $row_budgeting->cn;
            $record[]   = $row_budgeting->scn;
            $record[]   = $row_budgeting->Jumlah_Budget;
            // $record[]   = $row_budgeting->sdj . " - " . $row_budgeting->sdi;
            // $record[]   = $row_budgeting->Keterangan;
            $record[]   = $kal_button_toggle_1 . $row_budgeting->ID_Record . $kal_button_toggle_2 . $row_budgeting->ID_Record . $kal_button_toggle_3;
            $data[]     = $record;
        }

        $callback = array(
            'data'=>$data
        );

        header('Content-Type: application/json');
        echo json_encode($callback);
    }

    public function Show_Edit_Budgeting(Request $request)
    {
        $idparam = $_POST['idparam'];
        // $kalimat = "paramnya adalah " . $idparam;
        $param['id']            = $idparam;
        $json_budgeting           = \DB::select("select * from budgeting where ID_Record = '".$idparam."' and show_status = 1;");

        foreach($json_budgeting as $rowjson_budgeting)
        {
            $param['Nomor_Perkiraan']       = $rowjson_budgeting->Nomor_Perkiraan;
            $param['Sub_Nomor_Perkiraan']   = $rowjson_budgeting->Sub_Nomor_Perkiraan;
            $param['Start_Berlaku']         = $rowjson_budgeting->Start_Berlaku;
            $param['Exp_Berlaku']           = $rowjson_budgeting->Exp_Berlaku;
            $param['Jumlah_Budget']         = number_format($rowjson_budgeting->Jumlah_Budget, 0, ',', '.');
        }
        return $param;
    }


    public function Post_Edit_Budgeting(Request $request)
    {
        $id_wp = Auth::user()->id;

        $id_records             = $_POST['param_new_paramID'];
        $new_tanggal            = $_POST['param_new_pilTanggal'];
        $new_tanggal_exp        = $_POST['param_new_pilTanggal_exp'];
        $new_jenis              = $_POST['param_new_pilJenisPengeluaran'];
        $new_sub_jenis          = $_POST['param_new_pilJenisSubPengeluaran'];
        $new_jumlah             = $_POST['param_new_txtJumlah'];

        if($new_tanggal == "") {$new_tanggal = null;}
        if($new_tanggal_exp == "") {$new_tanggal_exp = null;}
        // $kalimat = "a = " . $a . " | b = " . $b . " | c = " . $c . " | d = " . $d . " | e = " . $e . " | f = " . $f . " | g = " . $g . " | " ;
        // return $kalimat;
        // return "Apa : " . $id_records . " | " . $new_tanggal . " | " . $new_tanggal_exp . " | " . $new_jenis . " | " . $new_sub_jenis . " | " . $new_jumlah . " | ";

        Budgeting::where('ID_WP',$id_wp)
                    ->where('ID_Record',$id_records)
                    ->update(
                                [
                                    'Nomor_Perkiraan' => $new_jenis,
                                    'Sub_Nomor_Perkiraan' => $new_sub_jenis,
                                    'Start_Berlaku'	=> $new_tanggal,
                                    'Exp_Berlaku'	=> $new_tanggal_exp,
                                    'Jumlah_Budget'	=> (int)str_replace('.', '',$new_jumlah),
                                    'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                                ]
                            );
        // return redirect()->route('budgeting_WP');
    }

    public function Post_Delete_Budgeting(Request $request)
    {
        $id_wp = Auth::user()->id;
        $id_records = $request->idparam;
        Budgeting::where('ID_WP',$id_wp)
                    ->where('ID_Record',$id_records)
                    ->update(
                                [
                                    'show_status' => 0,
                                    'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
                                ]
                            );
        // return redirect()->route('budgeting_WP');
    }

    public function Show_Dana_Impian()
    {
        $id_wp = Auth::user()->id;
        $param['sumberdana_wp']                   = \DB::select("SELECT *, bank.nama_bank as namabank from sumber_dana LEFT JOIN bank on bank.kode_bank = sumber_dana.Nama_Bank where ID_WP ='".$id_wp."' and sumber_dana.Jenis != 'RDN' order by sumber_dana.ID_Record");
        return view('WP.dana_impian')->with($param);
    }

    public function Post_Dana_Impian(Request $request)
    {
        $id_wp = Auth::user()->id;

        $judul = $request->txt_Judul;
        $keterangan = $request->txt_Keterangan;
        $tanggal = $request->pilTanggal;
        $tanggalpencapaian = $request->pilTanggalPencapaian;
        $jumlah = $request->txtJumlah;
        $sumberdana = $request->pilSumberDana;

        if($keterangan==""){$keterangan = "-";}
        $simpan_dana_impian = new Dana_Impian;
        $simpan_dana_impian->ID_WP = $id_wp;
        $simpan_dana_impian->Judul = $judul;
        $simpan_dana_impian->Tanggal = $tanggal;
        $simpan_dana_impian->Tanggal_Pencapaian = $tanggalpencapaian;
        $simpan_dana_impian->Jumlah = (int)str_replace('.', '', $jumlah);
        $simpan_dana_impian->Keterangan = $keterangan;
        $simpan_dana_impian->Masuk_Ke = $sumberdana;
        $simpan_dana_impian->created_at = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        $simpan_dana_impian->updated_at = NULL;
        $simpan_dana_impian->Show_status = 1;
        $simpan_dana_impian->save();
        return redirect()->route('dana_impian_WP');
    }


    public function Dana_Impian_Showdatable() {
        $id_wp = Auth::user()->id;;
        $data = array();
        $dana_impian            =\DB::select("SELECT *, sumber_dana.Jenis as sdjenis, sumber_dana.Inisial as sdinit, dana_impian.Masuk_Ke as dimk, sumber_dana.No_Rekening as sdnorek, dana_impian.ID_Record as diid
                                                from dana_impian
                                                LEFT JOIN sumber_dana on dana_impian.Masuk_Ke = sumber_dana.ID_Record
                                                LEFT JOIN bank on bank.kode_bank = sumber_dana.Nama_Bank
                                                where dana_impian.ID_WP ='".$id_wp."' and dana_impian.Show_status = 1
                                                order by dana_impian.ID_Record");

        $kal_button_toggle_1 ="<div class='dropdown'>
                                <button type='button' class='btn btn-sm dropdown-toggle hide-arrow py-0' data-bs-toggle='dropdown'>
                                    <i data-feather='more-vertical'></i>
                                </button>
                                <div class='dropdown-menu dropdown-menu-end'>
                                    <a class='dropdown-item' onclick='EditDanaImpian(";
        $kal_button_toggle_2 =")'>
                                        <i data-feather='edit-2' class='me-50'></i>
                                        <span>Edit</span>
                                    </a>
                                    <a class='dropdown-item' onclick='DeleteDanaImpian(";
        $kal_button_toggle_3  =")'>
                                        <i data-feather='trash' class='me-50'></i>
                                        <span>Delete</span>
                                    </a>
                                </div>
                            </div>";
        foreach($dana_impian as $rowdana_impian)
        {
            $record     = array();
            // $record[]   = date("d F Y", strtotime($rowpengeluaran->Tanggal));
            $record[]   = $rowdana_impian->Tanggal;
            $record[]   = $rowdana_impian->Judul;
            $record[]   = $rowdana_impian->Keterangan;
            $record[]   = $rowdana_impian->Jumlah;
            $record[]   = $rowdana_impian->Tanggal_Pencapaian;
            if($rowdana_impian->dimk == 0)
            {
                $record[]   = "Semua dana";
                $record[]   = "-";
            }
            else if($rowdana_impian->dimk != 0)
            {
                if($rowdana_impian->sdjenis == "KAS")
                {
                    $record[]   = $rowdana_impian->sdjenis;
                    $record[]   = $rowdana_impian->sdinit;
                }
                else if($rowdana_impian->sdjenis == "BANK")
                {
                    $record[]   = $rowdana_impian->sdjenis ;
                    $record[]   = $rowdana_impian->sdinit . " | " . $rowdana_impian->sdnorek;
                }
            }
            $record[]   = $kal_button_toggle_1 . $rowdana_impian->diid . $kal_button_toggle_2 . $rowdana_impian->diid . $kal_button_toggle_3;
            $data[]     = $record;
        }

        $callback = array(
            'data'=>$data
        );

        header('Content-Type: application/json');
        echo json_encode($callback);
    }

    public function Show_Edit_Dana_Impian(Request $request)
    {
        $idparam = $_POST['idparam'];
        // $kalimat = "paramnya adalah " . $idparam;
        $param['id']            = $idparam;
        $json_tanggal           = \DB::select("select * from dana_impian where ID_Record = '".$idparam."'");
        foreach($json_tanggal as $rowjson_tanggal)
        {
            $param['Judul']                     = $rowjson_tanggal->Judul;
            $param['Tanggal']                   = $rowjson_tanggal->Tanggal;
            $param['Tanggal_Pencapaian']        = $rowjson_tanggal->Tanggal_Pencapaian;
            $param['Jumlah']                    = number_format($rowjson_tanggal->Jumlah, 0, ',', '.');
            $param['Keterangan']                = $rowjson_tanggal->Keterangan;
            $param['Masuk_Ke']                  = $rowjson_tanggal->Masuk_Ke;
        }
        return $param;
    }

    public function Post_Edit_Dana_Impian(Request $request)
    {
        $id_wp = Auth::user()->id;
        $id_records = $_POST['param_paramID'];
        $judulbaru = $_POST['param_judul'];
        $keterangan = $_POST['param_keterangan'];
        $tanggal = $_POST['param_tanggal'];
        $tanggal_pencapaian = $_POST['param_tanggalpencapaian'];
        $jumlah = $_POST['param_jumlah'];
        $masuk_ke = $_POST['param_sumberdana'];

        if($keterangan==""){$keterangan = "-";}
        if($tanggal == "") {$tanggal = NULL;}
        if($tanggal_pencapaian == "") {$tanggal_pencapaian = NULL;}
        // $kalimat = "Kalimat : " . $id_wp . "|" .$id_records . "|" . $judulbaru . "|" . $keterangan . "|" . $tanggal . "|" . $tanggal_pencapaian . "|" . $jumlah . "|" . $masuk_ke . "|" ;
        // return $kalimat;


        Dana_Impian::where('ID_WP',$id_wp)
                    ->where('ID_Record',$id_records)
                    ->update(
                                [
                                    'Judul' => $judulbaru,
                                    'Tanggal' => $tanggal,
                                    'Tanggal_Pencapaian' => $tanggal_pencapaian,
                                    'Jumlah' => (int)str_replace('.', '', $jumlah),
                                    'Keterangan' => $keterangan,
                                    'Masuk_Ke' => $masuk_ke,
                                    'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                                ]
                            );

    }

    public function Post_Delete_Dana_Impian(Request $request)
    {
        $id_wp = Auth::user()->id;
        $id_records = $request->idparam;
        \DB::table('dana_impian')
            ->where('ID_Record',$id_records)
            ->where('ID_WP',$id_wp)
            ->update(
                [
                    'Show_status' => 0,
                ]
            );
    }




    public function Show_Aset()
    {
        // return view('WP.aset');
        $id_wp = Auth::user()->id;
        $param['kategori_harta']                 = \DB::select("select * from coa where Nomor_Perkiraan >= 8001 AND Nomor_Perkiraan <9000");
        $param['sub_kategori_harta']             = \DB::select("select * from coa_sub where Nomor_Perkiraan >= 8001 AND Nomor_Perkiraan <9000");
        $param['aset_wp']                        = \DB::select("select harta.*, coa_sub.nama as jenis, coa.Nama as nama_katbesar from harta LEFT JOIN coa_sub on coa_sub.id = harta.Kategori_Sub_Harta LEFT JOIN coa on coa.Nomor_Perkiraan = harta.Kategori_Harta where harta.ID_WP ='".$id_wp."' order by harta.Tanggal");

        return view('WP.aset')->with($param);
    }

    public function Combobox_Sub_Aset(Request $request)
    {
        $param_harta            = $_POST['Sub_Harta'];
        $kalimat                = "<option value='--'> Pilih Sub Kategori </option>";
        $data_sub_harta         = \DB::table('coa_sub')
                                    ->where('Nomor_Perkiraan',$param_harta)
                                    ->get();

        foreach($data_sub_harta as $dt_sub_harta)
        {
            $id         = $dt_sub_harta->ID;
            $nama       = $dt_sub_harta->Nama;
            $kalimat    = $kalimat . "<option value='".$id."'> ".$nama." </option>";
        }
        return $kalimat;
    }


    public function Aset_Showdatable() {
        $id_wp = Auth::user()->id;;
        $data = array();

        $aset               =\DB::select("select harta.*, coa_sub.nama as jenis, coa.Nama as nama_katbesar from harta LEFT JOIN coa_sub on coa_sub.id = harta.Kategori_Sub_Harta LEFT JOIN coa on coa.Nomor_Perkiraan = harta.Kategori_Harta where harta.ID_WP ='".$id_wp."' and harta.show_status=1 order by harta.Tanggal");

        $kal_button_toggle_1 ="<div class='dropdown'>
                                <button type='button' class='btn btn-sm dropdown-toggle hide-arrow py-0' data-bs-toggle='dropdown'>
                                    <i data-feather='more-vertical'></i>
                                </button>
                                <div class='dropdown-menu dropdown-menu-end'>
                                    <a class='dropdown-item' onclick='EditAset(";
        $kal_button_toggle_2 =")'>
                                        <i data-feather='edit-2' class='me-50'></i>
                                        <span>Edit</span>
                                    </a>
                                    <a class='dropdown-item' onclick='DeleteAset(";
        $kal_button_toggle_3  =")'>
                                        <i data-feather='trash' class='me-50'></i>
                                        <span>Delete</span>
                                    </a>
                                </div>
                            </div>";

        foreach($aset as $rowaset)
        {
            $record     = array();
            // $record[]   = date("d F Y", strtotime($rowpengeluaran->Tanggal));
            $record[]   = $rowaset->Tanggal;
            $record[]   = $rowaset->jenis;
            $record[]   = $rowaset->nama_katbesar;
            $record[]   = $rowaset->Nilai;
            // $record[]   = date('Y', strtotime($rowaset->Tanggal));
            $detail_aset = \DB::select("select * from harta_sub where ID_Parent = '". $rowaset ->ID_Record."' and ID_WP ='".$id_wp."' ");
            foreach($detail_aset as $rowdetail_aset)
            {
                if($rowdetail_aset->Jenis == "Tahun")
                {$record[]   = $rowdetail_aset->Deskripsi;}
            }
            $record[]   = $rowaset->Keterangan;
            $record[]   = $kal_button_toggle_1 . $rowaset->ID_Record . $kal_button_toggle_2 . $rowaset->ID_Record . $kal_button_toggle_3;
            $data[]     = $record;
        }

        $callback = array(
            'data'=>$data
        );

        header('Content-Type: application/json');
        echo json_encode($callback);
    }

    public function Aset_Showdatable_Param($param1,$param2)
    {
        $id_wp = Auth::user()->id;
        $data = array();

        $tgl_start = $param1;
        $tgl_end = $param2;

        $aset               =\DB::select("select harta.*, coa_sub.nama as jenis, coa.Nama as nama_katbesar from harta LEFT JOIN coa_sub on coa_sub.id = harta.Kategori_Sub_Harta LEFT JOIN coa on coa.Nomor_Perkiraan = harta.Kategori_Harta where harta.Tanggal BETWEEN '".$tgl_start."' AND '".$tgl_end."' and harta.ID_WP ='".$id_wp."' and harta.show_status=1 order by harta.Tanggal");

        $kal_button_toggle_1 ="<div class='dropdown'>
                                <button type='button' class='btn btn-sm dropdown-toggle hide-arrow py-0' data-bs-toggle='dropdown'>
                                    <i data-feather='more-vertical'></i>
                                </button>
                                <div class='dropdown-menu dropdown-menu-end'>
                                    <a class='dropdown-item' onclick='EditAset(";
        $kal_button_toggle_2 =")'>
                                        <i data-feather='edit-2' class='me-50'></i>
                                        <span>Edit</span>
                                    </a>
                                    <a class='dropdown-item' onclick='DeleteAset(";
        $kal_button_toggle_3  =")'>
                                        <i data-feather='trash' class='me-50'></i>
                                        <span>Delete</span>
                                    </a>
                                </div>
                            </div>";

        foreach($aset as $rowaset)
        {
            $record     = array();
            // $record[]   = date("d F Y", strtotime($rowpengeluaran->Tanggal));
            $record[]   = $rowaset->Tanggal;
            $record[]   = $rowaset->jenis;
            $record[]   = $rowaset->nama_katbesar;
            $record[]   = $rowaset->Nilai;
            // $record[]   = date('Y', strtotime($rowaset->Tanggal));
            $detail_aset = \DB::select("select * from harta_sub where ID_Parent = '". $rowaset ->ID_Record."' and ID_WP ='".$id_wp."' ");
            foreach($detail_aset as $rowdetail_aset)
            {
                if($rowdetail_aset->Jenis == "Tahun")
                {$record[]   = $rowdetail_aset->Deskripsi;}
            }
            $record[]   = $rowaset->Keterangan;
            $record[]   = $kal_button_toggle_1 . $rowaset->ID_Record . $kal_button_toggle_2 . $rowaset->ID_Record . $kal_button_toggle_3;
            $data[]     = $record;
        }

        $callback = array(
            'data'=>$data
        );

        header('Content-Type: application/json');
        echo json_encode($callback);
    }

    public function Post_Aset(Request $request)
    {
        $id_wp = Auth::user()->id;
        $tanggal = $request->pilTanggal;
        $Kategori_Harta = $request->pilJenis;
        $Kategori_SubHarta = $request->pilJenisPT;
        $Substr_KategoriSubHarta = substr($Kategori_SubHarta,5,3);
        $nilai = $request->txtNilai;
        $keterangan = $request->txt_Keterangan;
        // $sumber_dana = $request->pilSumberDana;

        //section additional field
        $A1_Penerbit        = $request->txt_Penerbit;
        $A2_Jumlah          = $request->txt_Jumlah;
        $A3_Luas            = $request->txt_Luas;
        $A4_Lokasi          = $request->txt_Lokasi;
        $A5_Merek           = $request->txt_Merek;
        $A6_Jenis           = $request->txt_Jenis;
        $A7_Tahun           = $request->txt_Tahun;
        $A8_Negara          = $request->txt_Negara;
        $A9_NamaBank        = $request->txt_NamaBank;
        $A10_NomorRekening  = $request->txt_NomorRekening;
        $A11_IdentitasPenerima = $request->txt_IdentitasPenerima;

        if($keterangan==""){$keterangan = "-";}
        if($A1_Penerbit == ""){$A1_Penerbit = "-"; }
        if($A2_Jumlah == ""){$A2_Jumlah = "-"; }
        if($A3_Luas == ""){$A3_Luas = "-"; }
        if($A4_Lokasi == ""){$A4_Lokasi = "-"; }
        if($A5_Merek == ""){$A5_Merek = "-"; }
        if($A6_Jenis == ""){$A6_Jenis = "-"; }
        if($A7_Tahun == ""){$A7_Tahun = "-"; }
        if($A8_Negara == ""){$A8_Negara = "-"; }
        if($A9_NamaBank == ""){$A9_NamaBank = "-"; }
        if($A10_NomorRekening == ""){$A10_NomorRekening = "-"; }
        if($A11_IdentitasPenerima == ""){$A11_IdentitasPenerima = "-"; }

        // echo "ID WP : ".$id_wp ." | Kategori harta : " . $Kategori_Harta . " | Sub Jenis : " . $Kategori_SubHarta . " | Nilai : " . $nilai . " | Substr : " . $Substr_KategoriSubHarta;
        // echo "<br>";
        // echo "Penerbit :" . $A1_Penerbit . "Jumlah :" . $A2_Jumlah;
        // echo "<br>";
        // echo "Luas :" . $A3_Luas . "Lokasi :" . $A4_Lokasi;
        // echo "<br>";
        // echo "Tahun :" . $A7_Tahun;

        // Masukkin Head Harta
        Harta::insert_harta($id_wp,$Kategori_Harta,$Kategori_SubHarta,$tanggal,$nilai,$keterangan);

        // Ambil Last ID dari Head Harta
        $result      = \DB::table('harta')
                        ->where('ID_WP', '=', $id_wp)
                        ->orderby('ID_Record','DESC')
                        ->first();
        $temp       = $result->ID_Record;

        // echo print_r($result); echo "-------------"; echo "hasil : " . $temp;

        // Masukkin Detail Harta
        //Uang Tunai
        if($Substr_KategoriSubHarta == 11)
        {
            Harta_Sub::insert_harta_sub($temp,$id_wp,"Tahun",$A7_Tahun);
        }
        //Tabungan, Giro, Deposito
        else if($Substr_KategoriSubHarta == 12 || $Substr_KategoriSubHarta == 13 || $Substr_KategoriSubHarta == 14)
        {
            Harta_Sub::insert_harta_sub($temp,$id_wp,"Tahun",$A7_Tahun);
            Harta_Sub::insert_harta_sub($temp,$id_wp,"Negara",$A8_Negara);
            Harta_Sub::insert_harta_sub($temp,$id_wp,"Nama Bank",$A9_NamaBank);
            Harta_Sub::insert_harta_sub($temp,$id_wp,"Nomor Rekening",$A10_NomorRekening);
        }
        // PIUTANG
        else if($Substr_KategoriSubHarta == 21 || $Substr_KategoriSubHarta == 22 || $Substr_KategoriSubHarta == 29)
        {
            Harta_Sub::insert_harta_sub($temp,$id_wp,"Tahun",$A7_Tahun);
            Harta_Sub::insert_harta_sub($temp,$id_wp,"Identitas Penerima",$A11_IdentitasPenerima);
        }
        // INVESTASI
        else if($Substr_KategoriSubHarta == 31 || $Substr_KategoriSubHarta == 32 || $Substr_KategoriSubHarta == 33 || $Substr_KategoriSubHarta == 34 || $Substr_KategoriSubHarta == 35 || $Substr_KategoriSubHarta == 36)
        {
            Harta_Sub::insert_harta_sub($temp,$id_wp,"Tahun",$A7_Tahun);
            Harta_Sub::insert_harta_sub($temp,$id_wp,"Penerbit",$A1_Penerbit);
            Harta_Sub::insert_harta_sub($temp,$id_wp,"Jumlah",$A2_Jumlah);
        }
        // ALAT TRANSPORTASI
        else if($Substr_KategoriSubHarta == 41 || $Substr_KategoriSubHarta == 42 || $Substr_KategoriSubHarta == 43 || $Substr_KategoriSubHarta == 49)
        {
            Harta_Sub::insert_harta_sub($temp,$id_wp,"Tahun",$A7_Tahun);
            Harta_Sub::insert_harta_sub($temp,$id_wp,"Merek",$A5_Merek);
            Harta_Sub::insert_harta_sub($temp,$id_wp,"Jenis",$A6_Jenis);
        }
        // HARTA BERGERAK LAINNYA
        else if($Substr_KategoriSubHarta == 54)
        {
            Harta_Sub::insert_harta_sub($temp,$id_wp,"Tahun",$A7_Tahun);
            Harta_Sub::insert_harta_sub($temp,$id_wp,"Merek",$A5_Merek);
            Harta_Sub::insert_harta_sub($temp,$id_wp,"Jenis",$A6_Jenis);
        }
        // HARTA TIDAK BERGERAK
        else if($Substr_KategoriSubHarta == 61 || $Substr_KategoriSubHarta == 62 || $Substr_KategoriSubHarta == 63)
        {
            Harta_Sub::insert_harta_sub($temp,$id_wp,"Tahun",$A7_Tahun);
            Harta_Sub::insert_harta_sub($temp,$id_wp,"Luas",$A3_Luas);
            Harta_Sub::insert_harta_sub($temp,$id_wp,"Lokasi",$A4_Lokasi);
        }
        else if($Substr_KategoriSubHarta == 39 || $Substr_KategoriSubHarta == 51 || $Substr_KategoriSubHarta == 52 || $Substr_KategoriSubHarta == 53 || $Substr_KategoriSubHarta == 55 || $Substr_KategoriSubHarta == 59 || $Substr_KategoriSubHarta == 69)
        {
            Harta_Sub::insert_harta_sub($temp,$id_wp,"Tahun",$A7_Tahun);
        }

        return redirect()->route('aset_WP');
    }


    // lalalalallalallalalalalalallalalalallalalalalallalalalala
    public function Show_Edit_Aset(Request $request)
    {
        $idparam = $_POST['idparam'];
        // $kalimat = "paramnya adalah " . $idparam;
        // return $kalimat;

        $param['id']            = $idparam;
        $json_tanggal           = \DB::select("select * from harta where ID_Record = '".$idparam."'");
        foreach($json_tanggal as $rowjson_tanggal)
        {
            $param['KategoriHarta']        = $rowjson_tanggal->Kategori_Harta;
            $param['KategoriSubHarta']    = $rowjson_tanggal->Kategori_Sub_Harta;
            $param['Tanggal']               = $rowjson_tanggal->Tanggal;
            $param['Nilai']                 = number_format($rowjson_tanggal->Nilai, 0, ',', '.');
            $param['Keterangan']            = $rowjson_tanggal->Keterangan;
        }

        $param['lemp_AF7'] = "";
        $param['lemp_AF1'] = "";
        $param['lemp_AF2'] = "";
        $param['lemp_AF3'] = "";
        $param['lemp_AF4'] = "";
        $param['lemp_AF5'] = "";
        $param['lemp_AF6'] = "";
        $param['lemp_AF8'] = "";
        $param['lemp_AF9'] = "";
        $param['lemp_AF10'] = "";
        $param['lemp_AF11'] = "";

        $json_detail           = \DB::select("select * from harta_sub where ID_Parent = '".$idparam."'");
        foreach($json_detail as $rowjson_detail)
        {
            if($rowjson_detail->Jenis == "Tahun") {$param['lemp_AF7'] = $rowjson_detail->Deskripsi; }
            if($rowjson_detail->Jenis == "Penerbit") {$param['lemp_AF1'] = $rowjson_detail->Deskripsi; }
            if($rowjson_detail->Jenis == "Jumlah") {$param['lemp_AF2'] = $rowjson_detail->Deskripsi; }
            if($rowjson_detail->Jenis == "Luas") {$param['lemp_AF3'] = $rowjson_detail->Deskripsi; }
            if($rowjson_detail->Jenis == "Lokasi") {$param['lemp_AF4'] = $rowjson_detail->Deskripsi; }
            if($rowjson_detail->Jenis == "Merek") {$param['lemp_AF5'] = $rowjson_detail->Deskripsi; }
            if($rowjson_detail->Jenis == "Jenis") {$param['lemp_AF6'] = $rowjson_detail->Deskripsi; }
            if($rowjson_detail->Jenis == "Negara") {$param['lemp_AF8'] = $rowjson_detail->Deskripsi; }
            if($rowjson_detail->Jenis == "Nama Bank") {$param['lemp_AF9'] = $rowjson_detail->Deskripsi; }
            if($rowjson_detail->Jenis == "Nomor Rekening") {$param['lemp_AF10'] = $rowjson_detail->Deskripsi; }
            if($rowjson_detail->Jenis == "Identitas Penerima") {$param['lemp_AF11'] = $rowjson_detail->Deskripsi; }
        }
        return $param;
    }

    public function Post_Edit_Aset(Request $request)
    {
        $id_wp = Auth::user()->id;
        $id_records = $_POST['param_new_paramID'];


        $tanggal = $_POST['param_new_tanggal'];
        $Kategori_Harta = $_POST['param_new_piljenis'];
        $Kategori_SubHarta = $_POST['param_new_piljenispt'];
        $Substr_KategoriSubHarta = substr($Kategori_SubHarta,5,3);
        $nilai = $_POST['param_new_nilai'];
        $keterangan = $_POST['param_new_keterangan'];


        //section additional field
        $A1_Penerbit        = $_POST['param_new_penerbit'];
        $A2_Jumlah          = $_POST['param_new_jumlah'];
        $A3_Luas            = $_POST['param_new_luas'];
        $A4_Lokasi          = $_POST['param_new_lokasi'];
        $A5_Merek           = $_POST['param_new_merek'];
        $A6_Jenis           = $_POST['param_new_jenis'];
        $A7_Tahun           = $_POST['param_new_tahun'];
        $A8_Negara          = $_POST['param_new_negara'];
        $A9_NamaBank        = $_POST['param_new_namabank'];
        $A10_NomorRekening  = $_POST['param_new_nomorrekening'];
        $A11_IdentitasPenerima = $_POST['param_new_identitaspenerima'];

        if($keterangan==""){$keterangan = "-";}
        if($A1_Penerbit == ""){$A1_Penerbit = "-"; }
        if($A2_Jumlah == ""){$A2_Jumlah = "-"; }
        if($A3_Luas == ""){$A3_Luas = "-"; }
        if($A4_Lokasi == ""){$A4_Lokasi = "-"; }
        if($A5_Merek == ""){$A5_Merek = "-"; }
        if($A6_Jenis == ""){$A6_Jenis = "-"; }
        if($A7_Tahun == ""){$A7_Tahun = "-"; }
        if($A8_Negara == ""){$A8_Negara = "-"; }
        if($A9_NamaBank == ""){$A9_NamaBank = "-"; }
        if($A10_NomorRekening == ""){$A10_NomorRekening = "-"; }
        if($A11_IdentitasPenerima == ""){$A11_IdentitasPenerima = "-"; }

        // Update Head Harta
        Harta::update_harta($id_wp,$id_records,$Kategori_Harta,$Kategori_SubHarta,$tanggal,$nilai,$keterangan);

        // Update Detail Harta
        //Uang Tunai
        if($Substr_KategoriSubHarta == 11)
        {
            Harta_Sub::update_harta_sub($id_wp,$id_records,"Tahun",$A7_Tahun);
        }
        //Tabungan, Giro, Deposito
        else if($Substr_KategoriSubHarta == 12 || $Substr_KategoriSubHarta == 13 || $Substr_KategoriSubHarta == 14)
        {
            Harta_Sub::update_harta_sub($id_wp,$id_records,"Tahun",$A7_Tahun);
            Harta_Sub::update_harta_sub($id_wp,$id_records,"Negara",$A8_Negara);
            Harta_Sub::update_harta_sub($id_wp,$id_records,"Nama Bank",$A9_NamaBank);
            Harta_Sub::update_harta_sub($id_wp,$id_records,"Nomor Rekening",$A10_NomorRekening);
        }
        // PIUTANG
        else if($Substr_KategoriSubHarta == 21 || $Substr_KategoriSubHarta == 22 || $Substr_KategoriSubHarta == 29)
        {
            Harta_Sub::update_harta_sub($id_wp,$id_records,"Tahun",$A7_Tahun);
            Harta_Sub::update_harta_sub($id_wp,$id_records,"Identitas Penerima",$A11_IdentitasPenerima);
        }
        // INVESTASI
        else if($Substr_KategoriSubHarta == 31 || $Substr_KategoriSubHarta == 32 || $Substr_KategoriSubHarta == 33 || $Substr_KategoriSubHarta == 34 || $Substr_KategoriSubHarta == 35 || $Substr_KategoriSubHarta == 36)
        {
            Harta_Sub::update_harta_sub($id_wp,$id_records,"Tahun",$A7_Tahun);
            Harta_Sub::update_harta_sub($id_wp,$id_records,"Penerbit",$A1_Penerbit);
            Harta_Sub::update_harta_sub($id_wp,$id_records,"Jumlah",$A2_Jumlah);
        }
        // ALAT TRANSPORTASI
        else if($Substr_KategoriSubHarta == 41 || $Substr_KategoriSubHarta == 42 || $Substr_KategoriSubHarta == 43 || $Substr_KategoriSubHarta == 49)
        {
            Harta_Sub::update_harta_sub($id_wp,$id_records,"Tahun",$A7_Tahun);
            Harta_Sub::update_harta_sub($id_wp,$id_records,"Merek",$A5_Merek);
            Harta_Sub::update_harta_sub($id_wp,$id_records,"Jenis",$A6_Jenis);
        }
        // HARTA BERGERAK LAINNYA
        else if($Substr_KategoriSubHarta == 54)
        {
            Harta_Sub::update_harta_sub($id_wp,$id_records,"Tahun",$A7_Tahun);
            Harta_Sub::update_harta_sub($id_wp,$id_records,"Merek",$A5_Merek);
            Harta_Sub::update_harta_sub($id_wp,$id_records,"Jenis",$A6_Jenis);
        }
        // HARTA TIDAK BERGERAK
        else if($Substr_KategoriSubHarta == 61 || $Substr_KategoriSubHarta == 62 || $Substr_KategoriSubHarta == 63)
        {
            Harta_Sub::update_harta_sub($id_wp,$id_records,"Tahun",$A7_Tahun);
            Harta_Sub::update_harta_sub($id_wp,$id_records,"Luas",$A3_Luas);
            Harta_Sub::update_harta_sub($id_wp,$id_records,"Lokasi",$A4_Lokasi);
        }
        //
        //LAINNYA
        else if($Substr_KategoriSubHarta == 39 || $Substr_KategoriSubHarta == 51 || $Substr_KategoriSubHarta == 52 || $Substr_KategoriSubHarta == 53 || $Substr_KategoriSubHarta == 55 || $Substr_KategoriSubHarta == 59 || $Substr_KategoriSubHarta == 69)
        {
            Harta_Sub::update_harta_sub($id_wp,$id_records,"Tahun",$A7_Tahun);
        }
    }

    public function Post_Delete_Aset(Request $request)
    {
        $id_wp = Auth::user()->id;
        $id_records = $request->idparam;
        Harta::delete_harta($id_wp,$id_records);
        Harta_Sub::delete_harta_sub($id_wp,$id_records);
    }

    public function Post_Deposit(Request $request)
    {
        $id_wp = Auth::user()->id;
        $tanggal    = $request->pilTanggal;
        $jumlah    = $request->txtJumlah;
        $keterangan    = $request->txt_Keterangan;
        $sumber_dana    = $request->pilSumberDana;
        $transfer_ke    = $request->pilTransferKe;
        if($keterangan==""){$keterangan = "-";}
        \DB::table('mutasi_rdn')->insert(
                [
                    'ID_WP' => $id_wp,
                    'Tipe' => 'DEPOSIT',
                    'Transfer_Dari' => $sumber_dana,
                    'Transfer_Ke' => $transfer_ke,
                    'Jumlah' => (int)str_replace('.', '', $jumlah),
                    'Keterangan' => $keterangan,
                    'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                    'show_status' => 1
                ]
            );

        $simpan_pengeluaran = new Pengeluaran;
        $simpan_pengeluaran->ID_WP = $id_wp;
        $simpan_pengeluaran->Nomor_Perkiraan = '6009';
        $simpan_pengeluaran->Sub_Nomor_Perkiraan = '6009001';
        $simpan_pengeluaran->Tanggal = $tanggal;
        $simpan_pengeluaran->Jumlah = (int)str_replace('.', '', $jumlah);
        $simpan_pengeluaran->Keterangan = $keterangan;
        $simpan_pengeluaran->Sumber_Dana = $sumber_dana;
        $simpan_pengeluaran->created_at = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        $simpan_pengeluaran->updated_at = NULL;
        $simpan_pengeluaran->Show_Status = 1;
        $simpan_pengeluaran->save();

        return redirect()->route('saham_WP');
    }

    public function Post_Withdraw(Request $request)
    {
        $id_wp = Auth::user()->id;
        $tanggal    = $request->pilTanggal;
        $jumlah    = $request->txtJumlah;
        $keterangan    = $request->txt_Keterangan;
        $sumber_dana    = $request->pilSumberDana;
        $transfer_ke    = $request->pilTransferKe;
        if($keterangan==""){$keterangan = "-";}
        \DB::table('mutasi_rdn')->insert(
                [
                    'ID_WP' => $id_wp,
                    'Tipe' => 'WITHDRAW',
                    'Transfer_Dari' => $sumber_dana,
                    'Transfer_Ke' => $transfer_ke,
                    'Jumlah' => (int)str_replace('.', '', $jumlah),
                    'Keterangan' => $keterangan,
                    'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                    'show_status' => 1
                ]
            );

        $simpan_pemasukan = new Pemasukan;
        $simpan_pemasukan->ID_WP = $id_wp;
        $simpan_pemasukan->Nomor_Perkiraan = '5001';
        $simpan_pemasukan->Sub_Nomor_Perkiraan = '5001001';
        $simpan_pemasukan->Tanggal = $tanggal;
        $simpan_pemasukan->Jumlah = (int)str_replace('.', '', $jumlah);
        $simpan_pemasukan->Keterangan = $keterangan;
        $simpan_pemasukan->Masuk_Ke = $transfer_ke;
        $simpan_pemasukan->created_at = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        $simpan_pemasukan->updated_at = NULL;
        $simpan_pemasukan->show_status = 1;
        $simpan_pemasukan->save();
        return redirect()->route('saham_WP');
    }


    public function Show_Saham()
    {
        $id_wp = Auth::user()->id;
        $param['sumberdana_wp']         = \DB::select("select * from sumber_dana where ID_WP ='".$id_wp."' and sumber_dana.Jenis != 'KAS' ");
        $param['sumberrdn_wp']          = \DB::select("SELECT *, sekuritas.Nama as namasekuritas from sumber_rdn LEFT JOIN sekuritas on sekuritas.Kode_Sekuritas = sumber_rdn.Kode_Sekuritas where ID_WP ='".$id_wp."' order by sumber_rdn.ID_Record");
        $param['saham_dipunyai']        = \DB::select("SELECT distinct(product) as Product from saham where ID_WP ='".$id_wp."' and show_status = 1; ");
        return view('WP.saham')->with($param);
    }

    public function Custom_Combobox_Stock_Sell()
    {
        $id_wp = Auth::user()->id;
        $param_rdn      = $_POST['param_rdn'];
        // $kalimat = "apa : " . $param_rdn;
        $kalimat = "";
        // $kalimat        = "<option value='---'>Pilih</option>";
        $qry_stock      = \DB::select("SELECT DISTINCT(saham.Product) as ps  FROM saham
                                        LEFT JOIN sumber_rdn on saham.Masuk_Ke = sumber_rdn.ID_Record
                                        where saham.ID_WP = '".$id_wp."' and saham.show_status = 1 and saham.Masuk_Ke = '".$param_rdn."' ");

        foreach($qry_stock as $row_qry_stock)
        {
            $id         = $row_qry_stock->ps;
            $nama       = $row_qry_stock->ps;
            $kalimat    = $kalimat . "<option value='".$id."'>".$nama."</option>";
        }
        return $kalimat;
    }


    public function Post_Buy_Saham(Request $request)
    {
        $id_wp = Auth::user()->id;
        $pilAction = $request->pilAction;
        $tanggal_transaksi = $request->pilTanggal;
        $product = $request->pilProduct;
        $jumlah_lot = $request->txtJumlah;
        $hargasatuan = $request->txtHargaSatuan;
        $hargatotal = $request->txtHargaTotal;
        $sumber_dana_rdn = $request->pilSumberDana;

        // if($keterangan==""){$keterangan = "-";}
        $simpan_saham = new Saham;
        $simpan_saham->ID_WP = $id_wp;
        $simpan_saham->Action = $pilAction;
        $simpan_saham->Tanggal_Transaksi = $tanggal_transaksi;
        $simpan_saham->Product = $product;
        $simpan_saham->Jumlah = (int)str_replace('.', '', $jumlah_lot);
        $simpan_saham->Harga_Satuan = (int)str_replace('.', '', $hargasatuan);
        $simpan_saham->Harga_Total = (int)str_replace('.', '', $hargatotal);
        // $simpan_saham->Keterangan = $keterangan;
        $simpan_saham->Masuk_Ke = $sumber_dana_rdn;
        $simpan_saham->created_at = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        $simpan_saham->updated_at = NULL;
        $simpan_saham->show_status = 1;
        $simpan_saham->save();
        return redirect()->route('saham_WP');
    }
    public function Stock_Saham_Showdatatable()
    {
        $id_wp = Auth::user()->id;
        $data = array();
        $qry_distinct_saham             = \DB::select("SELECT distinct(product) as Product from saham where ID_WP ='".$id_wp."' and show_status = 1; ");
        $qry_daftar_saham               = \DB::select("SELECT * from saham where ID_WP ='".$id_wp."' and show_status = 1; ");
        $olah_daftar_saham              = array();
        foreach($qry_distinct_saham as $row_distinct)
        {
            $Nama_saham = $row_distinct->Product;
            // $daftar_per_saham = \DB::select("Select product, jumlah, sum(jumlah*100) as jum, sum(Harga_Total) as harsat from saham where saham.Product = '".$Nama_saham."' ");
            $daftar_per_saham = \DB::select("SELECT product, jumlah, sum(jumlah*100) as jum, sum(Harga_Total) as harsat, sekuritas.Nama as ns, sumber_rdn.Inisial_RDN inisial, sumber_rdn.No_Rekening norek from saham
                                                LEFT JOIN sumber_rdn on saham.Masuk_Ke = sumber_rdn.ID_Record
                                                LEFT JOIN sekuritas on sekuritas.Kode_Sekuritas = sumber_rdn.Kode_Sekuritas
                                                where saham.ID_WP ='".$id_wp."' and saham.Product = '".$Nama_saham."' and saham.show_status = 1 order by saham.ID_Record");
            foreach($daftar_per_saham as $row_dps)
            {
                $harga_avg = $row_dps->harsat / ($row_dps->jum);
                $harga_total = $row_dps->harsat;
                $rdnnya = $row_dps->ns;
                array_push($olah_daftar_saham,array('Product' => $row_dps->product, 'Lot' => $row_dps->jumlah, 'AVG' => $harga_avg, 'Hartot' => $harga_total, 'RDN' => $rdnnya));
            }
        }
        // $param['sahaaam'] = $olah_daftar_saham;

        foreach($olah_daftar_saham as $row_olah_daftar_saham)
        {
            $record     = array();
            // $record[]   = date("d F Y", strtotime($rowsaham->Tanggal));
            $record[]   = $row_olah_daftar_saham['Product'];
            $record[]   = $row_olah_daftar_saham['Lot'];
            $record[]   = $row_olah_daftar_saham['AVG'];
            $record[]   = $row_olah_daftar_saham['Hartot'];
            $record[]   = $row_olah_daftar_saham['RDN'];
            $data[]     = $record;
        }

        $callback = array(
            'data'=>$data
        );

        header('Content-Type: application/json');
        echo json_encode($callback);
    }

    public function Saham_Showdatable()
    {
        $id_wp = Auth::user()->id;;
        $data = array();
        // $saham    =\DB::select("SELECT * from saham where ID_WP ='".$id_wp."' and saham.show_status = 1 order by saham.Tanggal_Transaksi DESC");
        $saham = \DB::select("SELECT *, sekuritas.Nama as ns, sumber_rdn.Inisial_RDN inisial, sumber_rdn.No_Rekening norek from saham
                                LEFT JOIN sumber_rdn on saham.Masuk_Ke = sumber_rdn.ID_Record
                                LEFT JOIN sekuritas on sekuritas.Kode_Sekuritas = sumber_rdn.Kode_Sekuritas
                                where saham.ID_WP ='".$id_wp."' order by saham.ID_Record");

        $kal_button_toggle_1 ="<div class='dropdown'>
                                <button type='button' class='btn btn-sm dropdown-toggle hide-arrow py-0' data-bs-toggle='dropdown'>
                                    <i data-feather='more-vertical'></i>
                                </button>
                                <div class='dropdown-menu dropdown-menu-end'>
                                    <a class='dropdown-item' onclick='EditSaham(";
        $kal_button_toggle_2 =")'>
                                        <i data-feather='edit-2' class='me-50'></i>
                                        <span>Edit</span>
                                    </a>
                                    <a class='dropdown-item' onclick='DeleteSaham(";
        $kal_button_toggle_3  =")'>
                                        <i data-feather='trash' class='me-50'></i>
                                        <span>Delete</span>
                                    </a>
                                </div>
                            </div>";
        foreach($saham as $rowsaham)
        {
            $record     = array();
            // $record[]   = date("d F Y", strtotime($rowsaham->Tanggal));
            $record[]   = $rowsaham->Tanggal_Transaksi;
            if($rowsaham->Action != "")
            {
                if($rowsaham->Action == "BUY")
                {
                    $record[]   = "<span class='badge rounded-pill badge-light-success me-1'>" . $rowsaham->Action. "</span>";
                }
                else
                {
                    $record[]   = "<span class='badge rounded-pill badge-light-warning me-1'>" . $rowsaham->Action. "</span>";
                }
            }


            $record[]   = $rowsaham->Product;
            $record[]   = $rowsaham->Jumlah;
            $record[]   = $rowsaham->Harga_Satuan;
            $record[]   = $rowsaham->Harga_Total;
            $record[]   = $rowsaham->ns;
            // $record[]   = $rowsaham->ns . " (" . $rowsaham->inisial . " - " . $rowsaham->norek . ")";
            $record[]   = $kal_button_toggle_1 . $rowsaham->ID_Record .$kal_button_toggle_2 . $rowsaham->ID_Record . $kal_button_toggle_3;
            $data[]     = $record;
        }

        $callback = array(
            'data'=>$data
        );

        header('Content-Type: application/json');
        echo json_encode($callback);
    }

    public function Post_Delete_Saham(Request $request)
    {
        $id_wp = Auth::user()->id;
        $id_records = $request->idparam;
        // \DB::table('pemasukan')
        //     ->where('ID_Record',$id_records)
        //     ->where('ID_WP',$id_wp)
        //     ->delete();
        Saham::where('ID_WP',$id_wp)
                    ->where('ID_Record',$id_records)
                    ->update(
                                [
                                    'Show_Status' => 0,
                                    'Updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
                                ]
                            );
        return redirect()->route('saham_WP');
    }

    // public function Show_SPT()
    // {
    //     return view('WP.spt');
    // }

    public function Show_BuktiPotong_SPT()
    {
        return view('WP.spt_bukti_potong');
    }

    public function Show_Dashboard_Panduan()
    {
        $id_wp = Auth::user()->id;
        $array_tahun                = array();
        $array_pemasukan_utama      = array();
        $array_pemasukan_non_utama  = array();
        $array_bupot_21               = array();
        $tahun_distict      = \DB::select("SELECT DISTINCT YEAR(Tanggal) as Tahun from pemasukan WHERE ID_WP = '".$id_wp."' order by pemasukan.Tanggal ASC");
        foreach($tahun_distict as $row_tahun_distict)
        {
            $tahun = $row_tahun_distict->Tahun;
            $pemasukan_utama        = Pemasukan::count_pemasukan_utama_tahun($id_wp,$tahun);
            $pemasukan_non_utama    = Pemasukan::count_pemasukan_non_utama_tahun($id_wp,$tahun);

            $qry_cek_notbupot_21           = CekBupot::cek_count_notbupot21($id_wp,$tahun);
            $qry_cek_bupot_21           = CekBupot::cek_count_bupot21($id_wp,$tahun);
            // $qry_cek_bupot_21           = \DB::select("SELECT count(Tanggal_Bukti_Pemotongan) as ctrbupot FROM `bukti_potong` where ID_WP = '".$id_wp."' and YEAR(Tanggal_Bukti_Pemotongan) = '".$tahun."' and Jenis_Pajak = '1721-A1' or Jenis_Pajak = '1721-A2' and show_status = 1");
            // $qry_cek_bupot_21           = collect($qry_cek_bupot_21)->map(function($x){ return (array) $x; })->toArray();
            array_push($array_tahun,[
                'year'=>$tahun,
                'pemasukan'=>$pemasukan_utama + $pemasukan_non_utama,
                'buktiselainpph21'=>$qry_cek_notbupot_21,
                'bupotpph21'=>$qry_cek_bupot_21
            ]);
            array_push($array_pemasukan_utama,$pemasukan_utama);
            array_push($array_pemasukan_non_utama,$pemasukan_non_utama);
            array_push($array_bupot_21,$qry_cek_bupot_21);
        }
        // $sort_tahun = array_unique($array_tahun);
        // asort($sort_tahun);

        return view('WP.dashboard_panduan')->with('tahun_wp',$array_tahun)
                                            ->with('utama',$array_pemasukan_utama)
                                            ->with('non_utama',$array_pemasukan_non_utama)
                                            ->with('bupot',$array_bupot_21);
    }

    public function Show_Panduan_SPT_PDF($tahun)
    {
        $html = $this->Show_Panduan_SPT($tahun,true);
        $pdf = PDF::loadHtml($html);

        return $pdf->download('Panduan_SPT_'.$tahun.'.pdf');
    }

    public function Show_Panduan_SPT($tahun,$pdf = false)
    {
        if(!$tahun)
            $tahun = date('Y');
        $id_wp = Auth::user()->id;
        // $jumlah = Pemasukan::count_pemasukan_utama($id_wp);
        $jumlah = \DB::table('pemasukan')->where('ID_WP', '=', $id_wp)->where('Nomor_Perkiraan','=',4001)->WhereYear('tanggal',$tahun)->sum('pemasukan.jumlah');
        $tipe_form = "1770SS";
        if($jumlah <= 60000000)
        {
            $tipe_form = "1770SS";
        }
        if($jumlah > 60000000)
        {
            $tipe_form = "1770S";
        }
        $statkawin = 'K';
        $belumkawin = \DB::table('data_wp')->where('ID_WP', '=', $id_wp)->first();
        if($belumkawin->Status != 'Kawin'){
            $statkawin = 'TK';
        }
        $tanggungan = \DB::table('kartu_keluarga')->where('ID_WP', '=', $id_wp)->where('Tanggungan', '=', 1)->count();

        if($tipe_form == "1770SS")
        {
            $tahun          = 2021;
            $status_PTKP    = $statkawin."/".$tanggungan;

            $penghasilan_bruto_dalam_negeri_sehubungan_dengan_pekerjaan =0;
            $penghasilan_bruto_dalam_negeri_lainnya = 0;
            // $penghasilan_bruto_dalam_negeri_sehubungan_dengan_pekerjaan  = \DB::table('pemasukan')->where('ID_WP', '=', $id_wp)->where('Nomor_Perkiraan','=',4001)->WhereYear('tanggal',$tahun)->sum('pemasukan.jumlah');
            $penghasilan_bruto_dalam_negeri_sehubungan_dengan_pekerjaan = \DB::table('bukti_potong')->where('ID_WP', '=', $id_wp)->where('Jenis_Pajak', '=', '1721-A1')->WhereYear('Tanggal_Bukti_Pemotongan',$tahun)->sum('bukti_potong.bruto');
            $penghasilan_bruto_dalam_negeri_lainnya                      = \DB::table('pemasukan')->where('ID_WP', '=', $id_wp)
                                                                                                ->where('Nomor_Perkiraan','=',1001)
                                                                                                ->orWhere('Nomor_Perkiraan','=',1002)
                                                                                                ->orWhere('Nomor_Perkiraan','=',1003)
                                                                                                ->orWhere('Nomor_Perkiraan','=',1004)
                                                                                                ->orWhere('Nomor_Perkiraan','=',1005)
                                                                                                ->orWhere('Nomor_Perkiraan','=',1006)
                                                                                                ->sum('pemasukan.jumlah');
            // $jumlah_penghasilan_bruto = $penghasilan_bruto_dalam_negeri_sehubungan_dengan_pekerjaan + $penghasilan_bruto_dalam_negeri_lainnya;
            $jumlah_penghasilan_bruto = $penghasilan_bruto_dalam_negeri_sehubungan_dengan_pekerjaan;
            $pengurangan = \DB::table('bukti_potong')->where('ID_WP', '=', $id_wp)->where('Jenis_Pajak', '=', '1721-A1')->WhereYear('Tanggal_Bukti_Pemotongan',$tahun)->sum('bukti_potong.pengurangan');
            // $tarif_PTKP                                                     = \DB::table('pajak_tarif_ptkp')->where('Kode', '=', $status_PTKP)->sum('pajak_tarif_ptkp.Jumlah');
            $tarif_PTKP                                                     = \DB::table('pajak_tarif_ptkp')->where('Tahun_Berlaku', '<=', $tahun)
                                                                                ->where('Kode', '=', $status_PTKP)
                                                                                ->OrderBy('Tahun_Berlaku','desc')
                                                                                ->take(1)
                                                                                ->value('pajak_tarif_ptkp.Jumlah');
            $tot_penghasilan_kena_pajak                                     = $penghasilan_bruto_dalam_negeri_sehubungan_dengan_pekerjaan - $pengurangan - $tarif_PTKP;
            $penghasilan_kena_pajak                                         = max($tot_penghasilan_kena_pajak,0);
            $pph_terutang                                                   = SPT_1770SS::hitung_PPH_Terutang($penghasilan_kena_pajak);
            $pajak_penghasilan_dipotong_pihak_lain                          = \DB::table('bukti_potong')->where('ID_WP', '<=', $id_wp)
                                                                                                        ->where('show_status', '=', '1')
                                                                                                        ->sum('Jumlah');;
            $pph_yang_harus_dibayar_sendiri                                 = 0;
            $pph_yang_lebih_dipotong_atau_dipungut                          = 0;

            $dasar_pengenaan_pajak_atau_penghasilan_bruto_penghasilan_final = 0;
            $pajak_penghasilan_final_terutang                               = 0;

            $ss2_a1_jumlah_bunga_deposito_tabungan_etc                                              = SPT_1770SS::a1_jumlah_bunga_deposito_tabungan_etc($id_wp);
            $ss2_a1_tarif_pph_terutang_bunga_deposito_tabungan_etc                                  = SPT_1770SS::a1_tarif_pph_terutang_bunga_deposito_tabungan_etc($id_wp,$ss2_a1_jumlah_bunga_deposito_tabungan_etc);
            $ss2_a2_jumlah_bunga_diskonto_obligasi                                                  = SPT_1770SS::a2_jumlah_bunga_diskonto_obligasi($id_wp);
            $ss2_a2_tarif_pph_terutang_bunga_diskonto_obligasi                                      = SPT_1770SS::a2_tarif_pph_terutang_bunga_diskonto_obligasi($id_wp,$ss2_a2_jumlah_bunga_diskonto_obligasi);
            $ss2_a3_jumlah_penjualan_saham_di_bursa_efek                                            = SPT_1770SS::a3_jumlah_penjualan_saham_di_bursa_efek($id_wp);
            $ss2_a3_tarif_pph_terutang_penjualan_saham_di_bursa_efek                                = SPT_1770SS::a3_tarif_pph_terutang_penjualan_saham_di_bursa_efek($id_wp,$ss2_a3_jumlah_penjualan_saham_di_bursa_efek);
            $ss2_a4_jumlah_hadiah_undian                                                            = SPT_1770SS::a4_jumlah_hadiah_undian($id_wp);
            $ss2_a4_tarif_pph_terutang_hadiah_undian                                                = SPT_1770SS::a4_tarif_pph_terutang_hadiah_undian($id_wp,$ss2_a4_jumlah_hadiah_undian);
            $ss2_a5_jumlah_pesangon_tunjangan_hari_tua_etc                                          = SPT_1770SS::a5_jumlah_pesangon_tunjangan_hari_tua_etc($id_wp);
            $ss2_a5_tarif_pph_terutang_pesangon_tunjangan_hari_tua_etc                              = SPT_1770SS::a5_tarif_pph_terutang_pesangon_tunjangan_hari_tua_etc($id_wp);
            $ss2_a6_jumlah_honorarium_atas_beban_apbd                                               = SPT_1770SS::a6_jumlah_honorarium_atas_beban_apbd($id_wp);
            $ss2_a6_tarif_pph_terutang_honorarium_atas_beban_apbd                                   = SPT_1770SS::a6_tarif_pph_terutang_honorarium_atas_beban_apbd($id_wp,$ss2_a6_jumlah_honorarium_atas_beban_apbd);
            $ss2_a7_jumlah_pengalihan_hak_atas_tanah_dan_atau_bangunan                              = SPT_1770SS::a7_jumlah_pengalihan_hak_atas_tanah_dan_atau_bangunan($id_wp);
            $ss2_a7_tarif_pph_terutang_pengalihan_hak_atas_tanah_dan_atau_bangunan                  = SPT_1770SS::a7_tarif_pph_terutang_pengalihan_hak_atas_tanah_dan_atau_bangunan($id_wp,$ss2_a7_jumlah_pengalihan_hak_atas_tanah_dan_atau_bangunan);
            $ss2_a8_jumlah_sewa_atas_tanah_dan_atau_bangunan                                        = SPT_1770SS::a8_jumlah_sewa_atas_tanah_dan_atau_bangunan($id_wp);
            $ss2_a8_tarif_pph_terutang_sewa_atas_tanah_dan_atau_bangunan                            = SPT_1770SS::a8_tarif_pph_terutang_sewa_atas_tanah_dan_atau_bangunan($id_wp,$ss2_a8_jumlah_sewa_atas_tanah_dan_atau_bangunan);
            $ss2_a9_jumlah_bangunan_yang_diterima_dalam_rangka_bangun_guna_serah                    = SPT_1770SS::a9_jumlah_bangunan_yang_diterima_dalam_rangka_bangun_guna_serah($id_wp);
            $ss2_a9_tarif_pph_terutang_bangunan_yang_diterima_dalam_rangka_bangun_guna_serah        = SPT_1770SS::a9_tarif_pph_terutang_bangunan_yang_diterima_dalam_rangka_bangun_guna_serah($id_wp,$ss2_a9_jumlah_bangunan_yang_diterima_dalam_rangka_bangun_guna_serah);
            $ss2_a10_jumlah_bunga_simpanan_koperasi                                                 = SPT_1770SS::a10_jumlah_bunga_simpanan_koperasi($id_wp);
            $ss2_a10_tarif_pph_terutang_bunga_simpanan_koperasi                                     = SPT_1770SS::a10_tarif_pph_terutang_bunga_simpanan_koperasi($id_wp,$ss2_a10_jumlah_bunga_simpanan_koperasi);
            $ss2_a11_jumlah_penghasilan_dari_transaksi_derivatif                                    = SPT_1770SS::a11_jumlah_penghasilan_dari_transaksi_derivatif($id_wp);
            $ss2_a11_tarif_pph_terutang_penghasilan_dari_transaksi_derivatif                        = SPT_1770SS::a11_tarif_pph_terutang_penghasilan_dari_transaksi_derivatif($id_wp,$ss2_a11_jumlah_penghasilan_dari_transaksi_derivatif);
            $ss2_a12_jumlah_deviden                                                                 = SPT_1770SS::a12_jumlah_deviden($id_wp);
            $ss2_a12_tarif_pph_terutang_deviden                                                     = SPT_1770SS::a12_tarif_pph_terutang_deviden($id_wp,$ss2_a12_jumlah_deviden);
            $ss2_a13_jumlah_penghasilan_isteri_dari_satu_pemberi_kerja                              = SPT_1770SS::a13_jumlah_penghasilan_isteri_dari_satu_pemberi_kerja($id_wp);
            $ss2_a13_tarif_pph_terutang_penghasilan_isteri_dari_satu_pemberi_kerja                  = SPT_1770SS::a13_tarif_pph_terutang_penghasilan_isteri_dari_satu_pemberi_kerja($id_wp,$ss2_a13_jumlah_penghasilan_isteri_dari_satu_pemberi_kerja);
            $ss2_a14_jumlah_penghasilan_lain_yang_dikenakan_pajak_final                             = SPT_1770SS::a14_jumlah_penghasilan_lain_yang_dikenakan_pajak_final($id_wp);
            $ss2_a14_tarif_pph_terutang_penghasilan_lain_yang_dikenakan_pajak_final                 = SPT_1770SS::a14_tarif_pph_terutang_penghasilan_lain_yang_dikenakan_pajak_final($id_wp,$ss2_a14_jumlah_penghasilan_lain_yang_dikenakan_pajak_final);

            $dasar_pengenaan_pajak_atau_penghasilan_bruto_penghasilan_final = $ss2_a1_jumlah_bunga_deposito_tabungan_etc + $ss2_a2_jumlah_bunga_diskonto_obligasi + $ss2_a3_jumlah_penjualan_saham_di_bursa_efek + $ss2_a4_jumlah_hadiah_undian + $ss2_a5_jumlah_pesangon_tunjangan_hari_tua_etc + $ss2_a6_jumlah_honorarium_atas_beban_apbd + $ss2_a7_jumlah_pengalihan_hak_atas_tanah_dan_atau_bangunan + $ss2_a8_jumlah_sewa_atas_tanah_dan_atau_bangunan + $ss2_a9_jumlah_bangunan_yang_diterima_dalam_rangka_bangun_guna_serah + $ss2_a10_jumlah_bunga_simpanan_koperasi + $ss2_a11_jumlah_penghasilan_dari_transaksi_derivatif + $ss2_a12_jumlah_deviden;
            $pajak_penghasilan_final_terutang                               = $ss2_a1_tarif_pph_terutang_bunga_deposito_tabungan_etc + $ss2_a2_tarif_pph_terutang_bunga_diskonto_obligasi + $ss2_a3_tarif_pph_terutang_penjualan_saham_di_bursa_efek + $ss2_a4_tarif_pph_terutang_hadiah_undian + $ss2_a5_tarif_pph_terutang_pesangon_tunjangan_hari_tua_etc + $ss2_a6_tarif_pph_terutang_honorarium_atas_beban_apbd + $ss2_a7_tarif_pph_terutang_pengalihan_hak_atas_tanah_dan_atau_bangunan + $ss2_a8_tarif_pph_terutang_sewa_atas_tanah_dan_atau_bangunan + $ss2_a9_tarif_pph_terutang_bangunan_yang_diterima_dalam_rangka_bangun_guna_serah + $ss2_a10_tarif_pph_terutang_bunga_simpanan_koperasi + $ss2_a11_tarif_pph_terutang_penghasilan_dari_transaksi_derivatif + $ss2_a12_tarif_pph_terutang_deviden + $ss2_a13_tarif_pph_terutang_penghasilan_isteri_dari_satu_pemberi_kerja + $ss2_a14_tarif_pph_terutang_penghasilan_lain_yang_dikenakan_pajak_final;

            $penghasilan_dikecualikan_oleh_objek_pajak                      = 0;
            $bantuan_sumbangan_hibah                                        = \DB::table('pemasukan')->where('ID_WP', '=', $id_wp)->where('Nomor_Perkiraan','=',2001)->sum('pemasukan.jumlah');
            $warisan                                                        = \DB::table('pemasukan')->where('ID_WP', '=', $id_wp)->where('Nomor_Perkiraan','=',2002)->sum('pemasukan.jumlah');
            $bagian_laba_anggota_cv_tidak_atas_saham_etc                    = \DB::table('pemasukan')->where('ID_WP', '=', $id_wp)->where('Nomor_Perkiraan','=',2003)->sum('pemasukan.jumlah');
            $klaim_asuransi_kesehatan_etc                                   = \DB::table('pemasukan')->where('ID_WP', '=', $id_wp)->where('Nomor_Perkiraan','=',2004)->sum('pemasukan.jumlah');
            $beasiswa                                                       = \DB::table('pemasukan')->where('ID_WP', '=', $id_wp)->where('Nomor_Perkiraan','=',2005)->sum('pemasukan.jumlah');
            $penghasilan_lainnya_yang_tidak_termasuk_objek_pajak            = \DB::table('pemasukan')->where('ID_WP', '=', $id_wp)->where('Nomor_Perkiraan','=',2006)->sum('pemasukan.jumlah');
            $penghasilan_dikecualikan_oleh_objek_pajak                      = $bantuan_sumbangan_hibah + $warisan + $bagian_laba_anggota_cv_tidak_atas_saham_etc + $klaim_asuransi_kesehatan_etc + $beasiswa + $penghasilan_lainnya_yang_tidak_termasuk_objek_pajak;

            $harta                                                          = \DB::table('harta')->where('ID_WP', '=', $id_wp)->sum('harta.Nilai');
            $hutang                                                         = \DB::table('hutang')->where('ID_WP', '=', $id_wp)->where('show_status', '=', 1)->sum('hutang.Jumlah');
            return view(($pdf ? 'WP.PDF.Spt_Panduan_1770SS_PDF' : 'WP.spt_panduan_1770SS'))
            ->with('jumlah_penghasilan_bruto',number_format($jumlah_penghasilan_bruto, 2, ',', '.'))
            ->with('pengurangan',number_format($pengurangan, 2, ',', '.'))
            ->with('status_PTKP',$status_PTKP)
            ->with('tarif_PTKP',number_format($tarif_PTKP, 2, ',', '.'))
            ->with('penghasilan_kena_pajak',number_format($penghasilan_kena_pajak, 2, ',', '.'))
            ->with('pph_terutang',number_format($pph_terutang, 2, ',', '.'))
            ->with('pajak_penghasilan_dipotong_pihak_lain',number_format($pajak_penghasilan_dipotong_pihak_lain, 2, ',', '.'))
            ->with('pph_yang_harus_dibayar_sendiri',number_format($pph_yang_harus_dibayar_sendiri, 2, ',', '.'))
            ->with('pph_yang_lebih_dipotong_atau_dipungut',number_format($pph_yang_lebih_dipotong_atau_dipungut, 2, ',', '.'))
            ->with('dasar_pengenaan_pajak_atau_penghasilan_bruto_penghasilan_final',number_format($dasar_pengenaan_pajak_atau_penghasilan_bruto_penghasilan_final, 2, ',', '.'))
            ->with('pajak_penghasilan_final_terutang',number_format($pajak_penghasilan_final_terutang, 2, ',', '.'))
            ->with('penghasilan_dikecualikan_oleh_objek_pajak',number_format($penghasilan_dikecualikan_oleh_objek_pajak, 2, ',', '.'))
            ->with('harta',number_format($harta, 2, ',', '.'))
            ->with('hutang',number_format($hutang, 2, ',', '.'))
            ->with('tahun',$tahun)
            ->with('tipe_form',$tipe_form);
        }
        if($tipe_form == "1770S")
        {
            // $tahun          = 2022;
            $status_PTKP    = $statkawin."/".$tanggungan;
            //1770S
            /*  ----------------------------
                        LEMBAR 1
                ----------------------------  */
            //Bagian A
            $penghasilan_neto_dalam_negeri_sehubungan_dengan_pekerjaan  = \DB::table('pemasukan')->where('ID_WP', '=', $id_wp)
                                                                                                ->where('Nomor_Perkiraan','=',4001)
                                                                                                ->where('show_status','=',1)
                                                                                                ->WhereYear('tanggal',$tahun)
                                                                                                ->sum('pemasukan.jumlah');
            $penghasilan_neto_dalam_negeri_lainnya                      = \DB::table('pemasukan')->where('ID_WP', '=', $id_wp)
                                                                                                ->where('show_status','=',1)
                                                                                                ->WhereYear('tanggal',$tahun)
                                                                                                ->where('Nomor_Perkiraan','=',1001)
                                                                                                ->orWhere('Nomor_Perkiraan','=',1002)
                                                                                                ->orWhere('Nomor_Perkiraan','=',1003)
                                                                                                ->orWhere('Nomor_Perkiraan','=',1004)
                                                                                                ->orWhere('Nomor_Perkiraan','=',1005)
                                                                                                ->orWhere('Nomor_Perkiraan','=',1006)
                                                                                                ->sum('pemasukan.jumlah');
            $penghasilan_neto_luar_negeri                               = 0;
            $jumlah_penghasilan_neto                                    = $penghasilan_neto_dalam_negeri_sehubungan_dengan_pekerjaan + $penghasilan_neto_dalam_negeri_lainnya + $penghasilan_neto_luar_negeri;
            $zakat_sumbangan_keagamaan_yang_sifatnya_wajib              = 0;
            $jumlah_penghasilan_neto_setelah_pengurangan                = $jumlah_penghasilan_neto - $zakat_sumbangan_keagamaan_yang_sifatnya_wajib;
            //Bagian B
            $tarif_PTKP                                                 = \DB::table('pajak_tarif_ptkp')->where('Tahun_Berlaku', '<=', $tahun)
                                                                                                        ->where('Kode', '=', $status_PTKP)
                                                                                                        ->OrderBy('Tahun_Berlaku','desc')
                                                                                                        ->take(1)
                                                                                                        ->value('pajak_tarif_ptkp.Jumlah');
            // $tarif_PTKP                                                 = \DB::select("SELECT jumlah FROM `pajak_tarif_ptkp` WHERE kode = '".$status_PTKP."' and Tahun_Berlaku <= '".$tahun."' order by Tahun_Berlaku desc limit 1;");
            $penghasilan_kena_pajak                                     = $jumlah_penghasilan_neto_setelah_pengurangan - $tarif_PTKP;
            //Bagian C
            $pph_terutang                                               = SPT_1770S::hitung_PPH_Terutang($penghasilan_kena_pajak);
            $pengembalian_pengurangan_pph_24_yang_dikreditkan           = 0;
            $jumlah_pph_terutang                                        = $pph_terutang + $pengembalian_pengurangan_pph_24_yang_dikreditkan;
            //Bagian D ---------------- INI LUPA CARANYAAA GIMANAAA LALALALALAA
            $pph_yang_dipotong_atau_dipungut_pihak_lain_atau_pemerintah_etc             =  \DB::table('bukti_potong')->where('ID_WP', '<=', $id_wp)
                                                                                                                        ->where('show_status', '=', '1')
                                                                                                                        ->sum('Jumlah');
            $pph_yang_harus_dibayar_sendiri                                             = 0;
            $pph_yang_lebih_dipotong_atau_dipungut                                      = 0;
            $pph_yang_dibayar_sendiri_pph_pasal_25                                      = 0;
            $pph_yang_dibayar_sendiri_stp_pph_pasal_25                                  = 0;
            $pph_yang_dibayar_sendiri_fiskal_luar_negeri                                = 0;
            $jumlah_kredit_pajak                                                        = 0;
            //Bagian E
            $pph_kurang_dibayar                                                         = 0;
            $pph_lebih_dibayar                                                          = 0;
            //Bagian F
            $angsuran_pph_pasal_25_tahun_pajak_berikutnya                               = 0;
            /*  ----------------------------
                        LEMBAR 2
                ----------------------------  */
            //Bagian A
            $bunga                                                  = \DB::table('pemasukan')->where('ID_WP', '=', $id_wp)->where('Nomor_Perkiraan','=',1001)->sum('pemasukan.jumlah');
            $royalti                                                = \DB::table('pemasukan')->where('ID_WP', '=', $id_wp)->where('Nomor_Perkiraan','=',1002)->sum('pemasukan.jumlah');
            $sewa                                                   = \DB::table('pemasukan')->where('ID_WP', '=', $id_wp)->where('Nomor_Perkiraan','=',1003)->sum('pemasukan.jumlah');
            $penghargaan_dan_hadiah                                 = \DB::table('pemasukan')->where('ID_WP', '=', $id_wp)->where('Nomor_Perkiraan','=',1004)->sum('pemasukan.jumlah');
            $keuntungan_dari_penjualan_penghalihan_harta            = \DB::table('pemasukan')->where('ID_WP', '=', $id_wp)->where('Nomor_Perkiraan','=',1005)->sum('pemasukan.jumlah');
            $penghasilan_lainnya                                    = \DB::table('pemasukan')->where('ID_WP', '=', $id_wp)->where('Nomor_Perkiraan','=',1006)->sum('pemasukan.jumlah');
            $jumlah_penghasilan_neto_dalam_negeri_lainnya           = $bunga + $royalti + $sewa + $penghargaan_dan_hadiah + $keuntungan_dari_penjualan_penghalihan_harta + $penghasilan_lainnya;
            //Bagian B
            $bantuan_sumbangan_hibah                                = \DB::table('pemasukan')->where('ID_WP', '=', $id_wp)->where('Nomor_Perkiraan','=',2001)->sum('pemasukan.jumlah');
            $warisan                                                = \DB::table('pemasukan')->where('ID_WP', '=', $id_wp)->where('Nomor_Perkiraan','=',2002)->sum('pemasukan.jumlah');
            $bagian_laba_anggota_cv_tidak_atas_saham_etc            = \DB::table('pemasukan')->where('ID_WP', '=', $id_wp)->where('Nomor_Perkiraan','=',2003)->sum('pemasukan.jumlah');
            $klaim_asuransi_kesehatan_etc                           = \DB::table('pemasukan')->where('ID_WP', '=', $id_wp)->where('Nomor_Perkiraan','=',2004)->sum('pemasukan.jumlah');
            $beasiswa                                               = \DB::table('pemasukan')->where('ID_WP', '=', $id_wp)->where('Nomor_Perkiraan','=',2005)->sum('pemasukan.jumlah');
            $penghasilan_lainnya_yang_tidak_termasuk_objek_pajak    = \DB::table('pemasukan')->where('ID_WP', '=', $id_wp)->where('Nomor_Perkiraan','=',2006)->sum('pemasukan.jumlah');
            //Bagian C : DAFTAR PEMOTONGAN/PEMUNGUTAN PPH OLEH PIHAK LAIN DAN PPH YANG DITANGGUNG PEMERINTAH
            $daftar_bupot = \DB::select("SELECT * from bukti_potong where ID_WP ='".$id_wp."' and show_status = 1");
            /*  ----------------------------
                        LEMBAR 3
                ----------------------------  */
            //Bagian A
            $s2_a1_jumlah_bunga_deposito_tabungan_etc                                              = SPT_1770S::a1_jumlah_bunga_deposito_tabungan_etc($id_wp);
            $s2_a1_tarif_pph_terutang_bunga_deposito_tabungan_etc                                  = SPT_1770S::a1_tarif_pph_terutang_bunga_deposito_tabungan_etc($id_wp,$s2_a1_jumlah_bunga_deposito_tabungan_etc);
            $s2_a2_jumlah_bunga_diskonto_obligasi                                                  = SPT_1770S::a2_jumlah_bunga_diskonto_obligasi($id_wp);
            $s2_a2_tarif_pph_terutang_bunga_diskonto_obligasi                                      = SPT_1770S::a2_tarif_pph_terutang_bunga_diskonto_obligasi($id_wp,$s2_a2_jumlah_bunga_diskonto_obligasi);
            $s2_a3_jumlah_penjualan_saham_di_bursa_efek                                            = SPT_1770S::a3_jumlah_penjualan_saham_di_bursa_efek($id_wp);
            $s2_a3_tarif_pph_terutang_penjualan_saham_di_bursa_efek                                = SPT_1770S::a3_tarif_pph_terutang_penjualan_saham_di_bursa_efek($id_wp,$s2_a3_jumlah_penjualan_saham_di_bursa_efek);
            $s2_a4_jumlah_hadiah_undian                                                            = SPT_1770S::a4_jumlah_hadiah_undian($id_wp);
            $s2_a4_tarif_pph_terutang_hadiah_undian                                                = SPT_1770S::a4_tarif_pph_terutang_hadiah_undian($id_wp,$s2_a4_jumlah_hadiah_undian);
            $s2_a5_jumlah_pesangon_tunjangan_hari_tua_etc                                          = SPT_1770S::a5_jumlah_pesangon_tunjangan_hari_tua_etc($id_wp);
            $s2_a5_tarif_pph_terutang_pesangon_tunjangan_hari_tua_etc                              = SPT_1770S::a5_tarif_pph_terutang_pesangon_tunjangan_hari_tua_etc($id_wp);
            $s2_a6_jumlah_honorarium_atas_beban_apbd                                               = SPT_1770S::a6_jumlah_honorarium_atas_beban_apbd($id_wp);
            $s2_a6_tarif_pph_terutang_honorarium_atas_beban_apbd                                   = SPT_1770S::a6_tarif_pph_terutang_honorarium_atas_beban_apbd($id_wp,$s2_a6_jumlah_honorarium_atas_beban_apbd);
            $s2_a7_jumlah_pengalihan_hak_atas_tanah_dan_atau_bangunan                              = SPT_1770S::a7_jumlah_pengalihan_hak_atas_tanah_dan_atau_bangunan($id_wp);
            $s2_a7_tarif_pph_terutang_pengalihan_hak_atas_tanah_dan_atau_bangunan                  = SPT_1770S::a7_tarif_pph_terutang_pengalihan_hak_atas_tanah_dan_atau_bangunan($id_wp,$s2_a7_jumlah_pengalihan_hak_atas_tanah_dan_atau_bangunan);
            $s2_a8_jumlah_sewa_atas_tanah_dan_atau_bangunan                                        = SPT_1770S::a8_jumlah_sewa_atas_tanah_dan_atau_bangunan($id_wp);
            $s2_a8_tarif_pph_terutang_sewa_atas_tanah_dan_atau_bangunan                            = SPT_1770S::a8_tarif_pph_terutang_sewa_atas_tanah_dan_atau_bangunan($id_wp,$s2_a8_jumlah_sewa_atas_tanah_dan_atau_bangunan);
            $s2_a9_jumlah_bangunan_yang_diterima_dalam_rangka_bangun_guna_serah                    = SPT_1770S::a9_jumlah_bangunan_yang_diterima_dalam_rangka_bangun_guna_serah($id_wp);
            $s2_a9_tarif_pph_terutang_bangunan_yang_diterima_dalam_rangka_bangun_guna_serah        = SPT_1770S::a9_tarif_pph_terutang_bangunan_yang_diterima_dalam_rangka_bangun_guna_serah($id_wp,$s2_a9_jumlah_bangunan_yang_diterima_dalam_rangka_bangun_guna_serah);
            $s2_a10_jumlah_bunga_simpanan_koperasi                                                 = SPT_1770S::a10_jumlah_bunga_simpanan_koperasi($id_wp);
            $s2_a10_tarif_pph_terutang_bunga_simpanan_koperasi                                     = SPT_1770S::a10_tarif_pph_terutang_bunga_simpanan_koperasi($id_wp,$s2_a10_jumlah_bunga_simpanan_koperasi);
            $s2_a11_jumlah_penghasilan_dari_transaksi_derivatif                                    = SPT_1770S::a11_jumlah_penghasilan_dari_transaksi_derivatif($id_wp);
            $s2_a11_tarif_pph_terutang_penghasilan_dari_transaksi_derivatif                        = SPT_1770S::a11_tarif_pph_terutang_penghasilan_dari_transaksi_derivatif($id_wp,$s2_a11_jumlah_penghasilan_dari_transaksi_derivatif);
            $s2_a12_jumlah_deviden                                                                 = SPT_1770S::a12_jumlah_deviden($id_wp);
            $s2_a12_tarif_pph_terutang_deviden                                                     = SPT_1770S::a12_tarif_pph_terutang_deviden($id_wp,$s2_a12_jumlah_deviden);
            $s2_a13_jumlah_penghasilan_isteri_dari_satu_pemberi_kerja                              = SPT_1770S::a13_jumlah_penghasilan_isteri_dari_satu_pemberi_kerja($id_wp);
            $s2_a13_tarif_pph_terutang_penghasilan_isteri_dari_satu_pemberi_kerja                  = SPT_1770S::a13_tarif_pph_terutang_penghasilan_isteri_dari_satu_pemberi_kerja($id_wp,$s2_a13_jumlah_penghasilan_isteri_dari_satu_pemberi_kerja);
            $s2_a14_jumlah_penghasilan_lain_yang_dikenakan_pajak_final                             = SPT_1770S::a14_jumlah_penghasilan_lain_yang_dikenakan_pajak_final($id_wp);
            $s2_a14_tarif_pph_terutang_penghasilan_lain_yang_dikenakan_pajak_final                 = SPT_1770S::a14_tarif_pph_terutang_penghasilan_lain_yang_dikenakan_pajak_final($id_wp,$s2_a14_jumlah_penghasilan_lain_yang_dikenakan_pajak_final);
            //Bagian B : HARTA PADA AKHIR TAHUN
            $daftar_harta = \DB::select("SELECT *, coa_sub.nama from harta LEFT JOIN coa_sub on coa_sub.id = harta.Kategori_Sub_Harta where ID_WP ='".$id_wp."' ");
            $olah_daftar_harta = array();
            foreach($daftar_harta as $row_dh)
            {
                $ID_Harta = $row_dh->ID_Record;
                $daftar_harta = \DB::select("Select harta.ID_Record, coa_sub.Nama, harta.Nilai, harta_sub.Deskripsi, harta.Keterangan from harta, coa_sub, harta_sub
                where harta.Kategori_Sub_Harta = coa_sub.ID and harta.ID_Record = harta_sub.ID_Parent and harta_sub.jenis = 'Tahun' and harta.ID_Record = '".$ID_Harta."' ");
                array_push($olah_daftar_harta,$daftar_harta);
            }
            //Bagian C : HUTANG PADA AKHIR TAHUN
            $daftar_hutang = \DB::select("SELECT * from hutang where ID_WP ='".$id_wp."' and hutang.show_status = 1 ");
            $olah_daftar_hutang = array();
            foreach($daftar_hutang as $row_dd)
            {
                $ID_Hutang = $row_dd->ID_Record;
                $daftar_hutang= \DB::select("Select hutang.Pemberi_Pinjaman as Nama, hutang.Alamat as Alamat, YEAR(hutang.Tanggal) as Tahun, hutang.Jumlah as Jumlah from hutang where hutang.ID_Record = '".$ID_Hutang."' and ID_WP ='".$id_wp."' ");
                array_push($olah_daftar_hutang,$daftar_hutang);
            }
            //Bagian D : Daftar Susunan Anggota Keluarga
            $kartu_keluarga = \DB::select("SELECT * from kartu_keluarga where ID_WP ='".$id_wp."' and show_status = 1");

            return view(($pdf ? 'WP.PDF.Spt_Panduan_PDF' : 'WP.spt_panduan_1770S'))->with('tipe_form',$tipe_form)
            ->with('penghasilan_neto_dalam_negeri_sehubungan_dengan_pekerjaan',number_format($penghasilan_neto_dalam_negeri_sehubungan_dengan_pekerjaan, 2, ',', '.'))
            ->with('penghasilan_neto_dalam_negeri_lainnya',number_format($penghasilan_neto_dalam_negeri_lainnya, 2, ',', '.'))
            ->with('penghasilan_neto_luar_negeri',number_format($penghasilan_neto_luar_negeri, 2, ',', '.'))
            ->with('jumlah_penghasilan_neto',number_format($jumlah_penghasilan_neto, 2, ',', '.'))
            ->with('zakat_sumbangan_keagamaan_yang_sifatnya_wajib',number_format($zakat_sumbangan_keagamaan_yang_sifatnya_wajib, 2, ',', '.'))
            ->with('jumlah_penghasilan_neto_setelah_pengurangan',number_format($jumlah_penghasilan_neto_setelah_pengurangan, 2, ',', '.'))
            ->with('status_PTKP',$status_PTKP)
            ->with('tarif_PTKP',number_format($tarif_PTKP, 2, ',', '.'))
            ->with('penghasilan_kena_pajak',number_format($penghasilan_kena_pajak, 2, ',', '.'))
            ->with('pph_terutang',number_format($pph_terutang, 2, ',', '.'))
            ->with('pengembalian_pengurangan_pph_24_yang_dikreditkan',number_format($pengembalian_pengurangan_pph_24_yang_dikreditkan, 2, ',', '.'))
            ->with('jumlah_pph_terutang',number_format($jumlah_pph_terutang, 2, ',', '.'))
            ->with('pph_yang_dipotong_atau_dipungut_pihak_lain_atau_pemerintah_etc',number_format($pph_yang_dipotong_atau_dipungut_pihak_lain_atau_pemerintah_etc, 2, ',', '.'))
            ->with('pph_yang_harus_dibayar_sendiri',number_format($pph_yang_harus_dibayar_sendiri, 2, ',', '.'))
            ->with('pph_yang_lebih_dipotong_atau_dipungut',number_format($pph_yang_lebih_dipotong_atau_dipungut, 2, ',', '.'))
            ->with('pph_yang_dibayar_sendiri_pph_pasal_25',number_format($pph_yang_dibayar_sendiri_pph_pasal_25, 2, ',', '.'))
            ->with('pph_yang_dibayar_sendiri_stp_pph_pasal_25',number_format($pph_yang_dibayar_sendiri_stp_pph_pasal_25, 2, ',', '.'))
            ->with('pph_yang_dibayar_sendiri_fiskal_luar_negeri',number_format($pph_yang_dibayar_sendiri_fiskal_luar_negeri, 2, ',', '.'))
            ->with('jumlah_kredit_pajak',number_format($jumlah_kredit_pajak, 2, ',', '.'))
            ->with('pph_kurang_dibayar',number_format($pph_kurang_dibayar, 2, ',', '.'))
            ->with('pph_lebih_dibayar',number_format($pph_lebih_dibayar, 2, ',', '.'))
            ->with('angsuran_pph_pasal_25_tahun_pajak_berikutnya',number_format($angsuran_pph_pasal_25_tahun_pajak_berikutnya, 2, ',', '.'))
            ->with('bunga',number_format($bunga, 2, ',', '.'))
            ->with('royalti',number_format($royalti, 2, ',', '.'))
            ->with('sewa',number_format($sewa, 2, ',', '.'))
            ->with('penghargaan_dan_hadiah',number_format($penghargaan_dan_hadiah, 2, ',', '.'))
            ->with('keuntungan_dari_penjualan_pengalihan_harta',number_format($keuntungan_dari_penjualan_penghalihan_harta, 2, ',', '.'))
            ->with('penghasilan_lainnya',number_format($penghasilan_lainnya, 2, ',', '.'))
            ->with('jumlah_penghasilan_neto_dalam_negeri_lainnya',number_format($jumlah_penghasilan_neto_dalam_negeri_lainnya, 2, ',', '.'))
            ->with('bantuan_sumbangan_hibah',number_format($bantuan_sumbangan_hibah, 2, ',', '.'))
            ->with('warisan',number_format($warisan, 2, ',', '.'))
            ->with('bagian_laba_anggota_cv_tidak_atas_saham_etc',number_format($bagian_laba_anggota_cv_tidak_atas_saham_etc, 2, ',', '.'))
            ->with('klaim_asuransi_kesehatan_etc',number_format($klaim_asuransi_kesehatan_etc, 2, ',', '.'))
            ->with('beasiswa',number_format($beasiswa, 2, ',', '.'))
            ->with('penghasilan_lainnya_yang_tidak_termasuk_objek_pajak',number_format($penghasilan_lainnya_yang_tidak_termasuk_objek_pajak, 2, ',', '.'))
            ->with('daftar_bupot',$daftar_bupot)
            ->with('jumlah_bunga_deposito_tabungan_etc',number_format($s2_a1_jumlah_bunga_deposito_tabungan_etc, 2, ',', '.'))
            ->with('tarif_pph_terutang_bunga_deposito_tabungan_etc',number_format($s2_a1_tarif_pph_terutang_bunga_deposito_tabungan_etc, 2, ',', '.'))
            ->with('jumlah_bunga_diskonto_obligasi',number_format($s2_a2_jumlah_bunga_diskonto_obligasi, 2, ',', '.'))
            ->with('tarif_pph_terutang_bunga_diskonto_obligasi',number_format($s2_a2_tarif_pph_terutang_bunga_diskonto_obligasi, 2, ',', '.'))
            ->with('jumlah_penjualan_saham_di_bursa_efek',number_format($s2_a3_jumlah_penjualan_saham_di_bursa_efek, 2, ',', '.'))
            ->with('tarif_pph_terutang_penjualan_saham_di_bursa_efek',number_format($s2_a3_tarif_pph_terutang_penjualan_saham_di_bursa_efek, 2, ',', '.'))
            ->with('jumlah_hadiah_undian',number_format($s2_a4_jumlah_hadiah_undian, 2, ',', '.'))
            ->with('tarif_pph_terutang_hadiah_undian',number_format($s2_a4_tarif_pph_terutang_hadiah_undian, 2, ',', '.'))
            ->with('jumlah_pesangon_tunjangan_hari_tua_etc',number_format($s2_a5_jumlah_pesangon_tunjangan_hari_tua_etc, 2, ',', '.'))
            ->with('tarif_pph_terutang_pesangon_tunjangan_hari_tua_etc',number_format($s2_a5_tarif_pph_terutang_pesangon_tunjangan_hari_tua_etc, 2, ',', '.'))
            ->with('jumlah_honorarium_atas_beban_apbd',number_format($s2_a6_jumlah_honorarium_atas_beban_apbd, 2, ',', '.'))
            ->with('tarif_pph_terutang_honorarium_atas_beban_apbd',number_format($s2_a6_tarif_pph_terutang_honorarium_atas_beban_apbd, 2, ',', '.'))
            ->with('jumlah_pengalihan_hak_atas_tanah_dan_atau_bangunan',number_format($s2_a7_jumlah_pengalihan_hak_atas_tanah_dan_atau_bangunan, 2, ',', '.'))
            ->with('tarif_pph_terutang_pengalihan_hak_atas_tanah_dan_atau_bangunan',number_format($s2_a7_tarif_pph_terutang_pengalihan_hak_atas_tanah_dan_atau_bangunan, 2, ',', '.'))
            ->with('jumlah_sewa_atas_tanah_dan_atau_bangunan',number_format($s2_a8_jumlah_sewa_atas_tanah_dan_atau_bangunan, 2, ',', '.'))
            ->with('tarif_pph_terutang_sewa_atas_tanah_dan_atau_bangunan',number_format($s2_a8_tarif_pph_terutang_sewa_atas_tanah_dan_atau_bangunan, 2, ',', '.'))
            ->with('jumlah_bangunan_yang_diterima_dalam_rangka_bangun_guna_serah',number_format($s2_a9_jumlah_bangunan_yang_diterima_dalam_rangka_bangun_guna_serah, 2, ',', '.'))
            ->with('tarif_pph_terutang_bangunan_yang_diterima_dalam_rangka_bangun_guna_serah',number_format($s2_a9_tarif_pph_terutang_bangunan_yang_diterima_dalam_rangka_bangun_guna_serah, 2, ',', '.'))
            ->with('jumlah_bunga_simpanan_koperasi',number_format($s2_a10_jumlah_bunga_simpanan_koperasi, 2, ',', '.'))
            ->with('tarif_pph_terutang_bunga_simpanan_koperasi',number_format($s2_a10_tarif_pph_terutang_bunga_simpanan_koperasi, 2, ',', '.'))
            ->with('jumlah_penghasilan_dari_transaksi_derivatif',number_format($s2_a11_jumlah_penghasilan_dari_transaksi_derivatif, 2, ',', '.'))
            ->with('tarif_pph_terutang_penghasilan_dari_transaksi_derivatif',number_format($s2_a11_tarif_pph_terutang_penghasilan_dari_transaksi_derivatif, 2, ',', '.'))
            ->with('jumlah_deviden',number_format($s2_a12_jumlah_deviden, 2, ',', '.'))
            ->with('tarif_pph_terutang_deviden',number_format($s2_a12_tarif_pph_terutang_deviden, 2, ',', '.'))
            ->with('jumlah_penghasilan_isteri_dari_satu_pemberi_kerja',number_format($s2_a13_jumlah_penghasilan_isteri_dari_satu_pemberi_kerja, 2, ',', '.'))
            ->with('tarif_pph_terutang_penghasilan_isteri_dari_satu_pemberi_kerja',number_format($s2_a13_tarif_pph_terutang_penghasilan_isteri_dari_satu_pemberi_kerja, 2, ',', '.'))
            ->with('jumlah_penghasilan_lain_yang_dikenakan_pajak_final',number_format($s2_a14_jumlah_penghasilan_lain_yang_dikenakan_pajak_final, 2, ',', '.'))
            ->with('tarif_pph_terutang_penghasilan_lain_yang_dikenakan_pajak_final',number_format($s2_a14_tarif_pph_terutang_penghasilan_lain_yang_dikenakan_pajak_final, 2, ',', '.'))
            ->with('daftar_hutang',$olah_daftar_hutang)
            ->with('daftar_harta',$olah_daftar_harta)
            ->with('tahun',$tahun)
            ->with('kartu_keluarga',$kartu_keluarga);
        }
    }

    public function rumus_pph()
    {
        // $angka = 40000000;
        // $pph = SPT_1770S::manual_hitung_PPH_Terutang($angka);
        // echo number_format($pph,2,',','.')." | 2.000.000| <br>";

        // $angka = 210000000;
        // $pph = SPT_1770S::manual_hitung_PPH_Terutang($angka);
        // echo number_format($pph,2,',','.')." | 26.500.000|<br>";

        // $angka = 460000000;
        // $pph = SPT_1770S::manual_hitung_PPH_Terutang($angka);
        // echo number_format($pph,2,',','.')." | 85.000.000|<br>";

        // $angka = 600000000;
        // $pph = SPT_1770S::manual_hitung_PPH_Terutang($angka);
        // echo number_format($pph,2,',','.')." | 125.000.000|<br>";

        // $angka = 5000000000;
        // $pph = SPT_1770S::manual_hitung_PPH_Terutang($angka);
        // echo number_format($pph,2,',','.')."<br>";

        //baru
        $angka = 5000000000;
        $pph = SPT_1770S::manual_hitung_PPH_Terutang($angka);
        echo number_format($pph,2,',','.')."<br>";
    }
    public function Post_Bukti_Potong(Request $request)
    {
        $id_wp = Auth::user()->id;
        $tanggal = $request->pilTanggal;
        $jumlah = $request->txtJumlah;
        $jenis_pajak = $request->pilJenis;
        if($jenis_pajak == "1721-A1" || $jenis_pajak == "1721-A2")
        {
            $jumlah = 0;
        }
        else
        {
            $jumlah_bruto = 0;
            $jumlah_pengurangan = 0;
            $jumlah_netto = 0;
        }
        $npwp_pemotong = $request->txt_NPWP_Pemotong;
        $nama_pemotong  = $request->txt_Nama_Pemotong;
        $nomor_bupot  = $request->txt_Nomor_Bukti_Potongan;
        $jumlah_bruto = $request->txtBruto;
        $jumlah_pengurangan = $request->txtPengurangan;
        $jumlah_netto = $jumlah_bruto - $jumlah_pengurangan;

        $simpan_bupot = new Bukti_Potong;
        $simpan_bupot->ID_WP = $id_wp;
        $simpan_bupot->Jenis_Pajak = $jenis_pajak;
        $simpan_bupot->NPWP_Pemotong = $npwp_pemotong;
        $simpan_bupot->Nama_Pemotong = $nama_pemotong;
        $simpan_bupot->Nomor_Bukti_Pemotongan = $nomor_bupot;
        $simpan_bupot->Tanggal_Bukti_Pemotongan = $tanggal;
        $simpan_bupot->Jumlah = $jumlah;
        $simpan_bupot->Bruto = $jumlah_bruto;
        $simpan_bupot->Pengurangan = $jumlah_pengurangan;
        $simpan_bupot->Netto = $jumlah_netto;
        $simpan_bupot->created_at = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        $simpan_bupot->updated_at = NULL;
        $simpan_bupot->show_status = 1;
        $simpan_bupot->save();

        return redirect()->route('SPT_BuktiPotong_WP');
    }


    public function Bukti_Potong_Showdatable()
    {
        $id_wp  = Auth::user()->id;;
        $data   = array();
        $bupot  =\DB::select("SELECT * from bukti_potong where ID_WP ='".$id_wp."' and show_status = 1 order by Tanggal_Bukti_Pemotongan");

        $kal_button_toggle_1 ="<div class='dropdown'>
                                <button type='button' class='btn btn-sm dropdown-toggle hide-arrow py-0' data-bs-toggle='dropdown'>
                                    <i data-feather='more-vertical'></i>
                                </button>
                                <div class='dropdown-menu dropdown-menu-end'>
                                    <a class='dropdown-item' onclick='EditBupot(";
        $kal_button_toggle_2 =")'>
                                        <i data-feather='edit-2' class='me-50'></i>
                                        <span>Edit</span>
                                    </a>
                                    <a class='dropdown-item' onclick='DeleteBupot(";
        $kal_button_toggle_3  =")'>
                                        <i data-feather='trash' class='me-50'></i>
                                        <span>Delete</span>
                                    </a>
                                </div>
                            </div>";
        foreach($bupot as $rowbupot)
        {
            $record     = array();
            // $record[]   = date("d F Y", strtotime($rowbupot->Tanggal));
            $record[]   = $rowbupot->Tanggal_Bukti_Pemotongan;
            if($rowbupot->Jenis_Pajak != "")
            {
                if($rowbupot->Jenis_Pajak == "1721-A1" || $rowbupot->Jenis_Pajak == "1721-A2")
                {
                    $record[]   = "<span class='badge rounded-pill badge-light-primary me-1'>" . $rowbupot->Jenis_Pajak. "</span>";
                }
                else if($rowbupot->Jenis_Pajak == "Pasal 22")
                {
                    $record[]   = "<span class='badge rounded-pill badge-light-info me-1'>" . $rowbupot->Jenis_Pajak. "</span>";
                }
                else if($rowbupot->Jenis_Pajak == "Pasal 23/26")
                {
                    $record[]   = "<span class='badge rounded-pill badge-light-success me-1'>" . $rowbupot->Jenis_Pajak. "</span>";
                }
                else if($rowbupot->Jenis_Pajak == "Pasal 15")
                {
                    $record[]   = "<span class='badge rounded-pill badge-light-warning me-1'>" . $rowbupot->Jenis_Pajak. "</span>";
                }
                else
                {
                    $record[]   = "<span class='badge rounded-pill badge-light-danger me-1'>" . $rowbupot->Jenis_Pajak. "</span>";
                }
            }
            $record[]   = $rowbupot->Nama_Pemotong;
            $record[]   = $rowbupot->NPWP_Pemotong;
            $record[]   = $rowbupot->Nomor_Bukti_Pemotongan;
            if($rowbupot->Jenis_Pajak != "")
            {
                if($rowbupot->Jenis_Pajak == "1721-A1" || $rowbupot->Jenis_Pajak == "1721-A2")
                {
                    $record[]   = $rowbupot->Bruto;
                }
                else
                {
                    $record[]   = $rowbupot->Jumlah;
                }
            }
            $record[]   = $kal_button_toggle_1 . $rowbupot->ID_Record .$kal_button_toggle_2 . $rowbupot->ID_Record . $kal_button_toggle_3;
            $data[]     = $record;
        }

        $callback = array(
            'data'=>$data
        );

        header('Content-Type: application/json');
        echo json_encode($callback);
    }

    public function Show_Edit_Bukti_Potong(Request $request)
    {
        $id_wp                  = Auth::user()->id;
        $idparam                = $_POST['idparam'];
        $param['id']            = $idparam;
        // $kalimat = "paramnya adalah " . $idparam . " WP : " . $id_wp;
        // echo $kalimat;
        // $param['idparam']      = $idparam;
        $json_bupot             = \DB::select("select * from bukti_potong where ID_Record = '".$idparam."' ");
        foreach($json_bupot as $rowjson_bupot)
        {
            $param['Jenis_Pajak']               = $rowjson_bupot->Jenis_Pajak;
            $param['NPWP_Pemotong']             = $rowjson_bupot->NPWP_Pemotong;
            $param['Nama_Pemotong']             = $rowjson_bupot->Nama_Pemotong;
            $param['Nomor_Bukti_Pemotongan']    = $rowjson_bupot->Nomor_Bukti_Pemotongan;
            $param['Tanggal_Bukti_Pemotongan']  = $rowjson_bupot->Tanggal_Bukti_Pemotongan;
            $param['Jumlah']                    = $rowjson_bupot->Jumlah;
            $param['Bruto']                     = $rowjson_bupot->Bruto;
            $param['Pengurangan']               = $rowjson_bupot->Pengurangan;
            $param['Netto']                     = $rowjson_bupot->Netto;
        }
        return $param;
    }


    public function Post_Edit_Bukti_Potong()
    {
        $id_wp              = Auth::user()->id;
        $id_records         = $_POST['param_txt_paramID'];
        $new_jenis_pajak    = $_POST['param_edt_jenis_pajak'];
        $new_NPWP_Pemotong  = $_POST['param_edt_NPWP_Pemotong'];
        $new_Nama_Pemotong  = $_POST['param_edt_Nama_Pemotong'];
        $new_Nomor_Bupot    = $_POST['param_edt_Nomor_Bupot'];
        $new_Tanggal_Bupot  = $_POST['param_edt_Tanggal_Bupot'];
        $new_Jumlah         = $_POST['param_edt_Jumlah'];
        $new_Bruto          = $_POST['param_edt_Bruto'];
        $new_Pengurangan    = $_POST['param_edt_pengurangan'];
        $new_Netto          = $new_Bruto - $new_Pengurangan;
        Bukti_Potong::where('ID_WP',$id_wp)
                    ->where('ID_Record',$id_records)
                    ->update(
                                [
                                    'Jenis_Pajak' => $new_jenis_pajak,
                                    'NPWP_Pemotong' => $new_NPWP_Pemotong,
                                    'Nama_Pemotong' => $new_Nama_Pemotong,
                                    'Nomor_Bukti_Pemotongan' => $new_Nomor_Bupot,
                                    'Tanggal_Bukti_Pemotongan' => $new_Tanggal_Bupot,
                                    'Jumlah' => (int)str_replace('.', '', $new_Jumlah),
                                    'Bruto' => (int)str_replace('.', '', $new_Bruto),
                                    'Pengurangan' => (int)str_replace('.', '', $new_Pengurangan),
                                    'Netto' => (int)str_replace('.', '', $new_Netto),
                                    'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
                                ]
                            );
    }

    public function Post_Delete_Bukti_Potong()
    {
        $id_wp              = Auth::user()->id;
        $id_records         = $_POST['idparam'];
        // $kalimat = $id_wp . " | " . $id_records;
        // echo $kalimat;
        Bukti_Potong::where('ID_WP',$id_wp)
                    ->where('ID_Record',$id_records)
                    ->update(
                                [
                                    'show_status' => 0,
                                    'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
                                ]
                            );
    }

}
