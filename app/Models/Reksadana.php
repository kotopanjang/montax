<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reksadana extends Model
{
    use HasFactory;

    public $table = "reksadana";

    protected $fillable=[
        'ID_Record',
        'ID_WP',
        'Action',
        'Tanggal_Transaksi',
        'Nama',
        'Jenis',
        'NAB_UP',
        'Jumlah',
        'Harga_Total',
        'Created_at',
        'Updated_at',
        'Show_Status',
    ];
}
