<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Harta extends Model
{
    use HasFactory;

    public $table = "harta";

    protected $fillable = [
        'ID_Record',
        'ID_WP',
        'Kategori_Harta',
        'Kategori_Sub_Harta',
        'Tanggal',
        'Nilai',
        'Keterangan',
        'created_at',
        'updated_at',
        'show_status',
    ];

    public static function insert_harta($lemp_id_wp,$lemp_Kategori_Harta,$lemp_Kategori_SubHarta,$lemp_tanggal,$lemp_nilai,$lemp_keterangan)
    {
        $simpan_harta = new Harta;
        $simpan_harta->ID_WP = $lemp_id_wp;
        $simpan_harta->Kategori_Harta = $lemp_Kategori_Harta;
        $simpan_harta->Kategori_Sub_Harta = $lemp_Kategori_SubHarta;
        $simpan_harta->Tanggal = $lemp_tanggal;
        $simpan_harta->Nilai = (int)str_replace('.', '', $lemp_nilai);
        $simpan_harta->Keterangan = $lemp_keterangan;
        $simpan_harta->created_at = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        $simpan_harta->updated_at = null;
        $simpan_harta->show_status = 1;
        $simpan_harta->save();
    }

    public static function update_harta($lemp_id_wp,$lemp_id_records,$lemp_Kategori_Harta,$lemp_Kategori_SubHarta,$lemp_tanggal,$lemp_nilai,$lemp_keterangan)
    {
        Harta::where('ID_WP',$lemp_id_wp)
                    ->where('ID_Record',$lemp_id_records)
                    ->update(
                                [
                                    'Kategori_Harta' => $lemp_Kategori_Harta,
                                    'Kategori_Sub_Harta' => $lemp_Kategori_SubHarta,
                                    'Tanggal' => $lemp_tanggal,
                                    'Nilai' => (int)str_replace('.', '', $lemp_nilai),
                                    'Keterangan' => $lemp_keterangan,
                                    'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
                                ]
                            );
    }

    public static function delete_harta($lemp_id_wp,$lemp_id_records)
    {
        Harta::where('ID_WP',$lemp_id_wp)
                    ->where('ID_Record',$lemp_id_records)
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
