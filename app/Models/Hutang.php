<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hutang extends Model
{
    use HasFactory;

    public $table = "hutang";

    protected $fillable = [
        'ID_Record',
        'ID_WP',
        'Tanggal',
        'Tanggal_JatuhTempo',
        'Jumlah',
        'Pemberi_Pinjaman',
        'Keterangan',
        'Masuk_Ke',
        'created_at',
        'updated_at',
        'show_status',
    ];

    public static function select_hutang($paramid)
    {
        $id_wp = $paramid;
        $param['hutang']         = \DB::table('hutang')->where('ID_WP', '=', $id_wp)
                                                        ->where('show_status','=',1)
                                                        ->get();
        return $param['hutang'];
    }
}
