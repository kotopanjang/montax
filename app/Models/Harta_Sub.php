<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Harta_Sub extends Model
{
    use HasFactory;

    public $table = "harta_sub";

    protected $fillable = [
        'ID_Record',
        'ID_Parent',
        'ID_WP',
        'Jenis',
        'Deskripsi',
        'created_at',
        'updated_at',
        'show_status',
    ];

    public static function insert_harta_sub($lemp_temp,$lemp_id_wp,$lemp_jenis,$lemp_deskripsi)
    {
        $simpan_harta_sub = new Harta_Sub;
        $simpan_harta_sub->ID_Parent    = $lemp_temp;
        $simpan_harta_sub->ID_WP        = $lemp_id_wp;
        $simpan_harta_sub->Jenis        = $lemp_jenis;
        $simpan_harta_sub->Deskripsi    = $lemp_deskripsi;
        $simpan_harta_sub->created_at   = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        $simpan_harta_sub->updated_at   = null;
        $simpan_harta_sub->show_status  = 1;
        $simpan_harta_sub->save();
    }

    public static function update_harta_sub($id_wp,$id_records,$jenis,$isian_update)
    {
        Harta_Sub::where('ID_WP',$id_wp)
                    ->where('ID_Parent',$id_records)
                    ->where('Jenis',$jenis)
                    ->update(
                                [
                                    'Deskripsi' => $isian_update,
                                    'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
                                ]
                            );
    }

    public static function delete_harta_sub($lemp_id_wp,$lemp_id_records)
    {
        Harta_Sub::where('ID_WP',$lemp_id_wp)
        ->where('ID_Parent',$lemp_id_records)
        ->update(
                    [
                        'show_status' => 0,
                        'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
                    ]
                );
    }

    public $incrementing = false;
    public $timestamps = false;
}
