<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dana_Impian extends Model
{
    use HasFactory;

    public $table = "dana_impian";

    protected $fillable=[
        'ID_Record',
        'ID_WP',
        'Judul',
        'Tanggal',
        'Tanggal_Pencapaian',
        'Jumlah',
        'Keterangan',
        'Masuk_Ke',
        'Created_at',
        'Updated_at',
        'Show_status',
    ];
}
