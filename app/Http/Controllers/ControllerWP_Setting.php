<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Kartu_Keluarga;
use App\Models\WP;

class ControllerWP_Setting extends Controller
{
    //
    public function Show_Settings()
    {
        $id_wp = Auth::user()->id;
        // $param['pemasukan']          = \DB::select("select * from pemasukan where ID_WP ='".$id_wp."'");
        $data             = WP::get_current_user($id_wp);
        $param["data"] = $data[0];
        return view('WP.settings_account')->with($param);
    }

    public function Post_Data_WP(Request $request)
    {
        $id_wp  = Auth::user()->id;

        $txtNamaWP = $request->txtNamaWP;
        $txt_NIK = $request->txt_NIK;
        $txt_NPWP = $request->txt_NPWP;
        $txtEmail = $request->txtEmail;
        $pekerjaan = $request->pekerjaan;
        $address = $request->address;
        $pil_tanggal_lahir = $request->pil_tanggal_lahir;
        $pil_status = $request->pil_status;
        $txtcreated_at = $request->txtcreated_at;
        $txtID_Record = $request->txtID_Record;
        $txtshow_Status = $request->txtshow_Status;

        WP::where('ID_WP',$id_wp)
                    ->where('ID_Record',$txtID_Record)
                    ->update(
                                [
                                    'Nama_Lengkap' => $txtNamaWP,
                                    'NIK' => $txt_NIK,
                                    'NPWP' => $txt_NPWP,
                                    'Status' => $pil_status,
                                    'Pekerjaan' => $pekerjaan,
                                    'Email' => $txtEmail,
                                    'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                                    'Alamat' => $address,
                                    'Tanggal_Lahir' => $pil_tanggal_lahir
                                ]
                            );

        return redirect()->route('setting');
    }

    public function Show_Settings_KK(Request $request)
    {
        $id_wp = Auth::user()->id;
        $editData["param"] = $request->recid;
        $editData["Nama"] = null;
        $editData["Hubungan_Keluarga"] = null;
        $editData["NIK"] = null;
        $editData["Tanggal_Lahir"] = null;
        $editData["Pekerjaan"] = null;
        $editData["Alamat"] = null;
        $editData["Tanggungan"] = null;

        if ($request->recid != null) {
            $kkData    =\DB::select("SELECT * from kartu_keluarga where ID_WP ='".$id_wp."' and ID_Records='".$request->recid."'");
            foreach ($kkData as $row) {
                $editData["Nama"] = $row->Nama;
                $editData["Hubungan_Keluarga"] = $row->Hubungan_Keluarga;
                $editData["NIK"] = $row->NIK;
                $editData["Tanggal_Lahir"] = $row->Tanggal_Lahir;
                $editData["Pekerjaan"] = $row->Pekerjaan;
                $editData["Alamat"] = $row->Alamat;
                $editData["Tanggungan"] = $row->Tanggungan;
            }
        }
        // $param['pemasukan']          = \DB::select("select * from pemasukan where ID_WP ='".$id_wp."'");
        // $param['pemasukan']             = Pemasukan::select_pemasukan($id_wp);
        // return view('WP.pemasukan')->with($param);
        // return view('WP.settings_kk');
        $pemasukan['data']    =\DB::select("SELECT * from kartu_keluarga where ID_WP ='".$id_wp."' and show_status = 1");
        return view('WP.settings_KK')->with($pemasukan)->with($editData);
    }

    public function Post_Data_KK(Request $request)
    {
        $id_wp              = Auth::user()->id;
        $recordId           = $request->ID_Records;
        $nama               = $request->txtNama;
        $hubungan_keluarga  = $request->hubungan_keluarga;
        $NIK                = $request->txt_NIK;
        $Ttl                = $request->pil_tanggal_lahir;
        $Pekerjaan          = $request->pekerjaan;
        $Tanggungan          = $request->tanggungan;
        $Alamat             = $request->txtAlamat;

        if ($recordId == "" || $recordId == null) {
            if($Alamat == ""){$Alamat = "-";}
            if($Pekerjaan == ""){$Pekerjaan = "-";}
            // echo "data : ". $id_wp . " | " . $nama . " | " . $hubungan_keluarga . " | " . $NIK . " | " . $Ttl . " | " . $Alamat . " | " . $Alamat ." || " ;   
            $simpan_data_kk = new Kartu_Keluarga;
            $simpan_data_kk->ID_WP              = $id_wp;
            $simpan_data_kk->Nama               = $nama;
            $simpan_data_kk->NIK                = $NIK;
            $simpan_data_kk->Tanggal_Lahir      = $Ttl;
            $simpan_data_kk->Hubungan_Keluarga  = $hubungan_keluarga;
            $simpan_data_kk->Pekerjaan          = $Pekerjaan;
            $simpan_data_kk->Alamat          = $Alamat;
            $simpan_data_kk->Tanggungan          = $Tanggungan;
            $simpan_data_kk->created_at	        = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
            $simpan_data_kk->show_status	    = 1;
            $simpan_data_kk->save();
        } else {
            Kartu_Keluarga::where('ID_WP',$id_wp)
                    ->where('ID_Records',$recordId)
                    ->update(
                                [
                                    'Nama' => $nama,
                                    'NIK' => $NIK,
                                    'Tanggal_Lahir' => $Ttl,
                                    'Hubungan_Keluarga' => $hubungan_keluarga,
                                    'Pekerjaan' => $Pekerjaan,
                                    'Alamat' => $Alamat,
                                    'Tanggungan' => $Tanggungan,
                                    'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
                                ]
                            );
        }

        return redirect()->route('setting_kk');
    }

    public function Delete_KK(Request $request)
    {
        $id_wp = Auth::user()->id;
        $id_records = $request->idparam;
        Kartu_Keluarga::where('ID_WP',$id_wp)
                    ->where('ID_Records',$id_records)
                    ->update(
                                [
                                    'show_status' => 0,
                                    'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
                                ]
                            );
        // return redirect()->route('budgeting_WP');
    }

    public function Show_Data_KK()
    {
        $id_wp = Auth::user()->id;
        $pemasukan['data']    =\DB::select("SELECT * from kartu_keluarga where ID_WP ='".$id_wp."' and show_status = 1");
        return view('WP.settings_KK')->with($pemasukan);
    }

    public function Get_KK()
    {
        $kal_button_toggle_1 ="<div class='dropdown'>
                            <button type='button' class='btn btn-sm dropdown-toggle hide-arrow py-0' data-bs-toggle='dropdown'>
                                <i data-feather='more-vertical'></i>
                            </button>
                            <div class='dropdown-menu dropdown-menu-end'>
                                <a class='dropdown-item' onclick='EditKK(";
        $kal_button_toggle_2 =")'>
                                        <i data-feather='edit-2' class='me-50'></i>
                                        <span>Edit</span>
                                    </a>
                                    <a class='dropdown-item' onclick='DeleteKK(";
        $kal_button_toggle_3  =")'>
                                        <i data-feather='trash' class='me-50'></i>
                                        <span>Delete</span>
                                    </a>
                                </div>
                            </div>";

        $id_wp = Auth::user()->id;
        $data    =\DB::select("SELECT * from kartu_keluarga where ID_WP ='".$id_wp."' and show_status = 1");
        $ret = array();
        foreach($data as $row)
        {
            $myArr = array();
            array_push($myArr,$row->Nama);
            array_push($myArr,$row->Hubungan_Keluarga);
            array_push($myArr,$row->NIK);
            array_push($myArr,$row->Tanggal_Lahir);
            array_push($myArr,$row->Pekerjaan);
            array_push($myArr,$row->Alamat);
            array_push($myArr,$row->Tanggungan);
            array_push($myArr,$kal_button_toggle_1 . $row->ID_Records . $kal_button_toggle_2 . $row->ID_Records . $kal_button_toggle_3);
            
            array_push($ret,$myArr);
        }
        
        $callback = array(
            'data'=>$ret
        );

        header('Content-Type: application/json');
        echo json_encode($callback);
        // return $data;
    }

    public function Show_Edit_Data_KK(Request $request)
    {
        $idparam = $_POST['idparam'];
        // $kalimat = "paramnya adalah " . $idparam;
        $param['id']            = $idparam;
        $data =    \DB::table('kartu_keluarga')->where('ID_Records', '=', $idparam)->get();
        return $data[0];
    }

    public function Edit_Data_KK(Request $request)
    {
        $id_wp  = Auth::user()->id;

        $txtNamaWP = $request->txtNamaWP;
        $txt_NIK = $request->txt_NIK;
        $txt_NPWP = $request->txt_NPWP;
        $txtEmail = $request->txtEmail;
        $pekerjaan = $request->pekerjaan;
        $address = $request->address;
        $pil_tanggal_lahir = $request->pil_tanggal_lahir;
        $pil_status = $request->pil_status;
        $txtcreated_at = $request->txtcreated_at;
        $txtID_Record = $request->txtID_Record;
        $txtshow_Status = $request->txtshow_Status;
        $tanggungan = $request->tanggungan;

        WP::where('ID_WP',$id_wp)
                    ->where('ID_Record',$txtID_Record)
                    ->update(
                                [
                                    'Nama_Lengkap' => $txtNamaWP,
                                    'NIK' => $txt_NIK,
                                    'NPWP' => $txt_NPWP,
                                    'Status' => $pil_status,
                                    'Pekerjaan' => $pekerjaan,
                                    'Email' => $txtEmail,
                                    'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                                    'Alamat' => $address,
                                    'Tanggungan' => $tanggungan,
                                    'Tanggal_Lahir' => $pil_tanggal_lahir
                                ]
                            );

        return redirect()->route('setting');
    }
}
