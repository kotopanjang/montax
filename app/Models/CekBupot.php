<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CekBupot extends Model
{
    use HasFactory;

    public static function cek_count_bupot21($paramid,$paramtahun)
    {
        $id_wp = $paramid;
        // $count_bupot           = \DB::select("SELECT count(Tanggal_Bukti_Pemotongan) FROM `bukti_potong` where ID_WP = '".$id_wp."' and YEAR(Tanggal_Bukti_Pemotongan) = '".$paramtahun."' and Jenis_Pajak = '1721-A1' or Jenis_Pajak = '1721-A2' and show_status = 1");

        $count_bupot =    \DB::table('bukti_potong')->where('ID_WP', '=', $id_wp)
                                                            ->where(\DB::raw('YEAR(Tanggal_Bukti_Pemotongan)'),'=',$paramtahun)
                                                            ->where('show_status','=',1)
                                                            ->where('Jenis_Pajak','=','1721-A1')
                                                            ->orwhere('Jenis_Pajak','=','1721-A2')
                                                            ->sum('show_status');
        return $count_bupot;
    }
    
    public static function cek_count_notbupot21($paramid,$paramtahun)
    {
        $id_wp = $paramid;
        // $count_bupot           = \DB::select("SELECT count(Tanggal_Bukti_Pemotongan) FROM `bukti_potong` where ID_WP = '".$id_wp."' and YEAR(Tanggal_Bukti_Pemotongan) = '".$paramtahun."' and Jenis_Pajak = '1721-A1' or Jenis_Pajak = '1721-A2' and show_status = 1");

        $count_bupot =    \DB::table('bukti_potong')->where('ID_WP', '=', $id_wp)
                                                            ->where(\DB::raw('YEAR(Tanggal_Bukti_Pemotongan)'),'=',$paramtahun)
                                                            ->where('show_status','=',1)
                                                            ->where('Jenis_Pajak','!=','1721-A1')
                                                            ->where('Jenis_Pajak','!=','1721-A2')
                                                            ->sum('show_status');
        return $count_bupot;
    }
}
