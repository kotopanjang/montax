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

}
