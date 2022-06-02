<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;

    public $table = "Pemasukan";

    protected $fillable=[
        'ID_Record',
        'ID_WP',
        'Nomor_Perkiraan',
        'Sub_Nomor_Perkiraan',
        'Tanggal',
        'Jumlah',
        'Keterangan',
        'Masuk_Ke',
        'Created_at',
        'Updated_at',
        'Show_Status',
    ];

    public static function select_pemasukan($paramid)
    {
        $id_wp = $paramid;
        $param['pemasukan']         =\DB::select("SELECT *, coa_sub.nama as jenis from pemasukan LEFT JOIN coa_sub on coa_sub.id = pemasukan.Sub_Nomor_Perkiraan where ID_WP ='".$id_wp."' and pemasukan.show_status = 1 order by pemasukan.Tanggal DESC");
        return $param['pemasukan'];
    }

    public static function count_pemasukan_utama($paramid)
    {
        $id_wp = $paramid;
        $param_pemasukan_utama =    \DB::table('pemasukan')->where('ID_WP', '=', $id_wp)
                                                            ->where('Nomor_Perkiraan','=',4001)
                                                            ->where('show_status','=',1)
                                                            ->sum('pemasukan.jumlah');
        // $param_pemasukan_utama        =\DB::select("SELECT SUM(Jumlah) from pemasukan where ID_WP ='".$id_wp."' and Nomor_Perkiraan = 4001 and pemasukan.show_status = 1 ");
        return $param_pemasukan_utama;
    }

    public static function count_pemasukan_non_utama($paramid)
    {
        $id_wp = $paramid;
        $param_pemasukan_non_utama =    \DB::table('pemasukan')->where('ID_WP', '=', $id_wp)
                                                            ->where('Nomor_Perkiraan','<=',4000)
                                                            ->where('show_status','=',1)
                                                            ->sum('pemasukan.jumlah');
        // $param_pemasukan_utama        =\DB::select("SELECT SUM(Jumlah) from pemasukan where ID_WP ='".$id_wp."' and Nomor_Perkiraan = 4001 and pemasukan.show_status = 1 ");
        // $param_pemasukan_non_utama = 100000;
        return $param_pemasukan_non_utama;
    }

    // FINANCIAL CHECKUP
    public static function count_pemasukan_utama_tahun($paramid,$paramtahun)
    {
        $id_wp = $paramid;
        $param_pemasukan_utama =    \DB::table('pemasukan')->where('ID_WP', '=', $id_wp)
                                                            ->where('Nomor_Perkiraan','=',4001)
                                                            ->where(\DB::raw('YEAR(Tanggal)'),'=',$paramtahun)
                                                            ->where('show_status','=',1)
                                                            ->sum('pemasukan.jumlah');
        // $param_pemasukan_utama        =\DB::select("SELECT SUM(Jumlah) from pemasukan where ID_WP ='".$id_wp."' and Nomor_Perkiraan = 4001 and pemasukan.show_status = 1 ");
        return $param_pemasukan_utama;
    }

    public static function count_pemasukan_non_utama_tahun($paramid,$paramtahun)
    {
        $id_wp = $paramid;
        $param_pemasukan_non_utama =    \DB::table('pemasukan')->where('ID_WP', '=', $id_wp)
                                                            ->where('Nomor_Perkiraan','<=',4000)
                                                            ->where(\DB::raw('YEAR(Tanggal)'),'=',$paramtahun)
                                                            ->where('show_status','=',1)
                                                            ->sum('pemasukan.jumlah');
        // $param_pemasukan_utama        =\DB::select("SELECT SUM(Jumlah) from pemasukan where ID_WP ='".$id_wp."' and Nomor_Perkiraan = 4001 and pemasukan.show_status = 1 ");
        // $param_pemasukan_non_utama = 100000;
        return $param_pemasukan_non_utama;
    }

    // FINANCIAL CHECKUP
    public static function sum_pemasukan_tahun($paramid,$paramtahun)
    {
        $id_wp = $paramid;
        $param_pemasukan_utama =    \DB::table('pemasukan')->where('ID_WP', '=', $id_wp)
                                                            ->where(\DB::raw('YEAR(Tanggal)'),'=',$paramtahun)
                                                            ->where('show_status','=',1)
                                                            ->sum('pemasukan.jumlah');
        // $param_pemasukan_utama        =\DB::select("SELECT SUM(Jumlah) from pemasukan where ID_WP ='".$id_wp."' and Nomor_Perkiraan = 4001 and pemasukan.show_status = 1 ");
        return $param_pemasukan_utama;
    }
}
