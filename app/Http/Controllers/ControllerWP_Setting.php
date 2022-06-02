<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Kartu_Keluarga;

class ControllerWP_Setting extends Controller
{
    //
    public function Show_Settings()
    {
        $id_wp = Auth::user()->id;
        // $param['pemasukan']          = \DB::select("select * from pemasukan where ID_WP ='".$id_wp."'");
        // $param['pemasukan']             = Pemasukan::select_pemasukan($id_wp);
        // return view('WP.pemasukan')->with($param);
        return view('WP.settings_account');
    }

    public function Post_Data_WP()
    {

    }

    public function Show_Settings_KK()
    {
        $id_wp = Auth::user()->id;
        // $param['pemasukan']          = \DB::select("select * from pemasukan where ID_WP ='".$id_wp."'");
        // $param['pemasukan']             = Pemasukan::select_pemasukan($id_wp);
        // return view('WP.pemasukan')->with($param);
        // return view('WP.settings_kk');
        $pemasukan['data']    =\DB::select("SELECT * from kartu_keluarga where ID_WP ='".$id_wp."' and show_status = 1");
        return view('WP.settings_KK')->with($pemasukan);
    }

    public function Post_Data_KK(Request $request)
    {
        $id_wp              = Auth::user()->id;
        $nama               = $request->txtNama;
        $hubungan_keluarga  = $request->hubungan_keluarga;
        $NIK                = $request->txt_NIK;
        $Ttl                = $request->pil_tanggal_lahir;
        $Pekerjaan          = $request->pekerjaan;
        $Alamat             = $request->txtAlamat;

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
        $simpan_data_kk->created_at	        = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        $simpan_data_kk->show_status	    = 1;
        $simpan_data_kk->save();
        return redirect()->route('setting_kk');
    }

    public function Show_Data_KK()
    {
        $id_wp = Auth::user()->id;
        $pemasukan['data']    =\DB::select("SELECT * from kartu_keluarga where ID_WP ='".$id_wp."' and show_status = 1");
        return view('WP.settings_KK')->with($pemasukan);
    }
}
