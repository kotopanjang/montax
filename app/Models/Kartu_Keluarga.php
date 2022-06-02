<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kartu_Keluarga extends Model
{
    use HasFactory;

    public $table = "kartu_keluarga";

    protected $fillable=[
        'ID_Records',
        'ID_WP',
        'Nama',
        'NIK',
        'Tanggal_Lahir',
        'Hubungan_Keluarga',
        'Pekerjaan',
        'created_at',
        'updated_at',
        'show_status',
        'tanggungan'
    ];
}
