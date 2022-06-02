<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    public $table = "Pengeluaran";

    protected $fillable=[
        'ID_Record',
        'ID_WP',
        'Nomor_Perkiraan',
        'Sub_Nomor_Perkiraan',
        'Tanggal',
        'Jumlah',
        'Keterangan',
        'Sumber_Dana',
        'Created_at',
        'Updated_at',
        'Show_Status',
    ];

    // FINANCIAL CHECKUP
    public static function sum_pengeluaran_tahun($paramid,$paramtahun)
    {
        $id_wp = $paramid;
        $param_pengeluaran =    \DB::table('pengeluaran')->where('ID_WP', '=', $id_wp)
                                                            ->where(\DB::raw('YEAR(Tanggal)'),'=',$paramtahun)
                                                            ->where('show_status','=',1)
                                                            ->sum('pengeluaran.jumlah');
        // $param_pemasukan_utama        =\DB::select("SELECT SUM(Jumlah) from pemasukan where ID_WP ='".$id_wp."' and Nomor_Perkiraan = 4001 and pemasukan.show_status = 1 ");
        return $param_pengeluaran;
    }
}
