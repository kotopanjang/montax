<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WP extends Model
{
    use HasFactory;
    public $table = "data_wp";

    protected $fillable=[
        'ID_Record',
        'ID_WP',
        'Nama_Lengkap',
        'NIK',
        'NPWP',
        'Status',
        'Pekerjaan',
        'Email',
        'created_at',
        'updated_at',
        'show_Status',
        'Alamat',
        'Tanggal_Lahir'
    ];

    public static function get_current_user($paramid)
    {
        $id_wp = $paramid;
        $data =    \DB::table('data_wp')->where('ID_WP', '=', $id_wp)->get();
        // error_log($data); 
        // $param_pemasukan_utama        =\DB::select("SELECT SUM(Jumlah) from pemasukan where ID_WP ='".$id_wp."' and Nomor_Perkiraan = 4001 and pemasukan.show_status = 1 ");
        return $data;
    }
}
