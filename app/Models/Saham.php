<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saham extends Model
{
    use HasFactory;

    public $table = "saham";

    protected $fillable=[
        'ID_Record',
        'ID_WP',
        'Action',
        'Tanggal_Transaksi',
        'Product',
        'Jumlah',
        'Harga_Satuan',
        'Harga_Total',
        'Masuk_Ke',
        'Created_at',
        'Updated_at',
        'Show_Status',
    ];
}
