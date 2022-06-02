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

    // FINANCIAL CHECKUP
    public static function sum_hutang($paramid,$paramtahun)
    {
        $id_wp = $paramid;
        $hutang =    \DB::table('hutang')->where('ID_WP', '=', $id_wp)
                                                            ->where(\DB::raw('YEAR(Tanggal)'),'=',$paramtahun)
                                                            ->sum('hutang.jumlah');
        // $param_pemasukan_utama        =\DB::select("SELECT SUM(Jumlah) from pemasukan where ID_WP ='".$id_wp."' and Nomor_Perkiraan = 4001 and pemasukan.show_status = 1 ");
        return $hutang;
    }
}
