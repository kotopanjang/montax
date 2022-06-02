<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SPT_1770S extends Model
{
    use HasFactory;

    // public static function hitung_PPH_Terutang($kode,$jumlah)
    // {
    //     $angka = $jumlah;
    //     $qry  = \DB::select("Select * from rumus_pph_terutang where kode = '".$kode."' ")
    //     $batas = array();
    //     $persen = array();
    //     for($i=0; $i<count($qry); $i++)
    //     {
    //         array_push($batas,$qry[$i]->batas);
    //         array_push($persen,$qry[$i]->prosentase);
    //     }
    //     $step   = 0;
    //     $pajak  = 0;

    //     while($angka>0)
    //     {
    //         if($step == count($batas)-1)
    //         {
    //             $pajak = $pajak + $persen[$step] * $angka;
    //             $angka = 0;
    //         }
    //         else
    //         {
    //             if($angka>$batas[$step])
    //             {
    //                 $pajak = $pajak + $persen[$step] * $batas[$step];
    //                 $angka -= $batas[$step];
    //             }
    //             else
    //             {
    //                 $pajak = $pajak + $persen[$step] * $angka;
    //                 $angka = 0;
    //             }
    //             $step+=1;
    //         }
    //     }

    //     $totalp2 = $pajak;
    //     return $totalp2;
    // }

    public static function hitung_PPH_Terutang($param_PKP)
    {
        // $batas  = array(50000000,200000000,250000000,500000000,5000000000,-1);
        // $batas  = array(50000000,200000000,250000000,500000000,-1);
        //baru
        $batas  = array(60000000,190000000,250000000,500000000,5000000000,-1);
        $persen = array(0.05,0.15,0.25,0.30,0.35);
        $angka  = $param_PKP;
        $step   = 0;
        $pajak  = 0;

        while($angka>0)
        {
            if($step == count($batas)-1)
            {
                $pajak = $pajak + $persen[$step] * $angka;
                $angka = 0;
            }
            else
            {
                if($angka>$batas[$step])
                {
                    $pajak = $pajak + $persen[$step] * $batas[$step];
                    $angka -= $batas[$step];
                }
                else
                {
                    $pajak = $pajak + $persen[$step] * $angka;
                    $angka = 0;
                }
                $step+=1;
            }
        }

        $totalp2 = $pajak;
        return $totalp2;
    }

    public static function a1_jumlah_bunga_deposito_tabungan_etc ($param_id_wp)
    {
        $jumlah = \DB::table('pemasukan')->where('ID_WP', '=', $param_id_wp)
                                        ->where('Nomor_Perkiraan','=',3001)
                                        ->where('show_status','=',1)
                                        ->sum('pemasukan.jumlah');
        return $jumlah;
    }
    public static function a1_tarif_pph_terutang_bunga_deposito_tabungan_etc ($param_id_wp,$param_jumlah)
    {
        $tarifpajak = 20/100;
        $pph_terutang = $param_jumlah * $tarifpajak;
        return $pph_terutang;
    }
    public static function a2_jumlah_bunga_diskonto_obligasi ($param_id_wp)
    {
        $jumlah = \DB::table('pemasukan')->where('ID_WP', '=', $param_id_wp)
                                        ->where('Nomor_Perkiraan','=',3002)
                                        ->where('show_status','=',1)
                                        ->sum('pemasukan.jumlah');
        return $jumlah;
    }
    public static function a2_tarif_pph_terutang_bunga_diskonto_obligasi ($param_id_wp,$param_jumlah)
    {
        $tarifpajak = 15/100;
        $pph_terutang = $param_jumlah * $tarifpajak;
        return $pph_terutang;
    }
    public static function a3_jumlah_penjualan_saham_di_bursa_efek ($param_id_wp)
    {
        $jumlah = \DB::table('pemasukan')->where('ID_WP', '=', $param_id_wp)
                                        ->where('Nomor_Perkiraan','=',3003)
                                        ->where('show_status','=',1)
                                        ->sum('pemasukan.jumlah');
        return $jumlah;
    }
    public static function a3_tarif_pph_terutang_penjualan_saham_di_bursa_efek ($param_id_wp,$param_jumlah)
    {
        $tarifpajak = 0.1/100;
        $pph_terutang = $param_jumlah * $tarifpajak;
        return $pph_terutang;
    }
    public static function a4_jumlah_hadiah_undian ($param_id_wp)
    {
        $jumlah = \DB::table('pemasukan')->where('ID_WP', '=', $param_id_wp)
                                        ->where('Nomor_Perkiraan','=',3004)
                                        ->where('show_status','=',1)
                                        ->sum('pemasukan.jumlah');
        return $jumlah;
    }
    public static function a4_tarif_pph_terutang_hadiah_undian ($param_id_wp,$param_jumlah)
    {
        $tarifpajak = 25/100;
        $pph_terutang = $param_jumlah * $tarifpajak;
        return $pph_terutang;
    }
    public static function a5_jumlah_pesangon_tunjangan_hari_tua_etc ($param_id_wp)
    {
        $jumlah = \DB::table('pemasukan')->where('ID_WP', '=', $param_id_wp)
                                        ->where('Nomor_Perkiraan','=',3005)
                                        ->where('show_status','=',1)
                                        ->sum('pemasukan.jumlah');
        return $jumlah;
    }

    public static function a5_tarif_pph_terutang_pesangon_tunjangan_hari_tua_etc ($param_id_wp)
    {
        $pph_terutang = 0;
        $pph_terutang_pesangon = 0;
        $pph_terutang_tebusan = 0;
        //Pesangon dan Tunjangan Hari Tua
        $tarif_pesangon = 0;
        $pesangon = \DB::table('pemasukan')->where('ID_WP', '=', $param_id_wp)
                                        ->where('Sub_Nomor_Perkiraan','=',3005001)
                                        ->where('show_status','=',1)
                                        ->sum('pemasukan.jumlah');

        $batas  = array(50000000,50000000,500000000,-1);
        $persen = array(0,0.05,0.15,0.25);
        $angka  = $pesangon;
        $step   = 0;
        $pajak  = 0;

        while($angka>0)
        {
            if($step == count($batas)-1)
            {
                $pajak = $pajak + $persen[$step] * $angka;
                $angka = 0;
            }
            else
            {
                if($angka>$batas[$step])
                {
                    $pajak = $pajak + $persen[$step] * $batas[$step];
                    $angka -= $batas[$step];
                }
                else
                {
                    $pajak = $pajak + $persen[$step] * $angka;
                    $angka = 0;
                }
                $step+=1;
            }
        }
        $totalp2 = $pajak;
        $pph_terutang_pesangon = $totalp2;

        //Tebusan Pensiun yang Dibayar Sekaligus
        $Total_Tebusan = 0;
        $tarif_tebusan = 0;
        $Total_JHT = \DB::table('pemasukan')->where('ID_WP', '=', $param_id_wp)
                                        ->where('Sub_Nomor_Perkiraan','=',3005002)
                                        ->where('show_status','=',1)
                                        ->sum('pemasukan.jumlah');
        $Total_THT = \DB::table('pemasukan')->where('ID_WP', '=', $param_id_wp)
                                        ->where('Sub_Nomor_Perkiraan','=',3005003)
                                        ->where('show_status','=',1)
                                        ->sum('pemasukan.jumlah');
        $Manfaat_Pensiun = \DB::table('pemasukan')->where('ID_WP', '=', $param_id_wp)
                                        ->where('Sub_Nomor_Perkiraan','=',3005004)
                                        ->where('show_status','=',1)
                                        ->sum('pemasukan.jumlah');
        $Total_Tebusan = $Total_JHT + $Total_THT + $Manfaat_Pensiun;
        
        $batas  = array(50000000,50000000,-1);
        $persen = array(0,0.05,);
        $angka  = $Total_Tebusan;
        $step   = 0;
        $pajak  = 0;

        while($angka>0)
        {
            if($step == count($batas)-1)
            {
                $pajak = $pajak + $persen[$step] * $angka;
                $angka = 0;
            }
            else
            {
                if($angka>$batas[$step])
                {
                    $pajak = $pajak + $persen[$step] * $batas[$step];
                    $angka -= $batas[$step];
                }
                else
                {
                    $pajak = $pajak + $persen[$step] * $angka;
                    $angka = 0;
                }
                $step+=1;
            }
        }
        $totalp2 = $pajak;
        $pph_terutang_tebusan = $totalp2;

        $pph_terutang = $pph_terutang_pesangon + $pph_terutang_tebusan;

        return $pph_terutang;
    }
    public static function a6_jumlah_honorarium_atas_beban_apbd ($param_id_wp)
    {
        $jumlah = \DB::table('pemasukan')->where('ID_WP', '=', $param_id_wp)
                                        ->where('Nomor_Perkiraan','=',3006)
                                        ->where('show_status','=',1)
                                        ->sum('pemasukan.jumlah');
        return $jumlah;
    }
    public static function a6_tarif_pph_terutang_honorarium_atas_beban_apbd ($param_id_wp,$param_jumlah)
    {
        $tarifpajak = 15/100;
        $pph_terutang = $param_jumlah * $tarifpajak;
        return $pph_terutang;
    }
    public static function a7_jumlah_pengalihan_hak_atas_tanah_dan_atau_bangunan ($param_id_wp)
    {
        $jumlah = \DB::table('pemasukan')->where('ID_WP', '=', $param_id_wp)
                                        ->where('Nomor_Perkiraan','=',3007)
                                        ->where('show_status','=',1)
                                        ->sum('pemasukan.jumlah');
        return $jumlah;
    }
    public static function a7_tarif_pph_terutang_pengalihan_hak_atas_tanah_dan_atau_bangunan ($param_id_wp,$param_jumlah)
    {
        return 1;
    }
    public static function a8_jumlah_sewa_atas_tanah_dan_atau_bangunan ($param_id_wp)
    {
        $jumlah = \DB::table('pemasukan')->where('ID_WP', '=', $param_id_wp)
                                        ->where('Nomor_Perkiraan','=',3008)
                                        ->where('show_status','=',1)
                                        ->sum('pemasukan.jumlah');
        return $jumlah;
    }
    public static function a8_tarif_pph_terutang_sewa_atas_tanah_dan_atau_bangunan ($param_id_wp,$param_jumlah)
    {
        $tarifpajak = 10/100;
        $pph_terutang = $param_jumlah * $tarifpajak;
        return $pph_terutang;
    }
    public static function a9_jumlah_bangunan_yang_diterima_dalam_rangka_bangun_guna_serah ($param_id_wp)
    {
        $jumlah = \DB::table('pemasukan')->where('ID_WP', '=', $param_id_wp)
                                        ->where('Nomor_Perkiraan','=',3009)
                                        ->where('show_status','=',1)
                                        ->sum('pemasukan.jumlah');
        return $jumlah;
    }
    public static function a9_tarif_pph_terutang_bangunan_yang_diterima_dalam_rangka_bangun_guna_serah ($param_id_wp,$param_jumlah)
    {
        $tarifpajak = 15/100;
        $pph_terutang = $param_jumlah * $tarifpajak;
        return $pph_terutang;
    }
    public static function a10_jumlah_bunga_simpanan_koperasi ($param_id_wp)
    {
        $jumlah = \DB::table('pemasukan')->where('ID_WP', '=', $param_id_wp)
                                        ->where('Nomor_Perkiraan','=',3010)
                                        ->where('show_status','=',1)
                                        ->sum('pemasukan.jumlah');
        return $jumlah;
    }
    public static function a10_tarif_pph_terutang_bunga_simpanan_koperasi ($param_id_wp,$param_jumlah)
    {
        $tarifpajak = 0;
        $bulanannya = $param_jumlah/12;
        if($bulanannya <= 240000)
        {
            $tarifpajak = 0;
        }
        else if ($bulanannya >240000)
        {
            $tarifpajak = 10/100;
        }
        $pph_terutang = $param_jumlah * $tarifpajak;
        return $pph_terutang;
    }


    public static function a11_jumlah_penghasilan_dari_transaksi_derivatif ($param_id_wp)
    {
        //INI DISABLED
        return 0;
    }
    public static function a11_tarif_pph_terutang_penghasilan_dari_transaksi_derivatif ($param_id_wp,$param_jumlah)
    {
        //INI DISABLED
        return 0;
    }


    public static function a12_jumlah_deviden ($param_id_wp)
    {
        $jumlah = \DB::table('pemasukan')->where('ID_WP', '=', $param_id_wp)
                                        ->where('Nomor_Perkiraan','=',3012)
                                        ->where('show_status','=',1)
                                        ->sum('pemasukan.jumlah');
        return $jumlah;
    }
    public static function a12_tarif_pph_terutang_deviden ($param_id_wp,$param_jumlah)
    {
        $tarifpajak = 10/100;
        $pph_terutang = $param_jumlah * $tarifpajak;
        return $pph_terutang;
    }
    public static function a13_jumlah_penghasilan_isteri_dari_satu_pemberi_kerja ($param_id_wp)
    {
        $jumlah = \DB::table('pemasukan')->where('ID_WP', '=', $param_id_wp)
                                        ->where('Nomor_Perkiraan','=',3013)
                                        ->where('show_status','=',1)
                                        ->sum('pemasukan.jumlah');
        return $jumlah;
    }
    public static function a13_tarif_pph_terutang_penghasilan_isteri_dari_satu_pemberi_kerja ($param_id_wp,$param_jumlah)
    {
        //ambil dari bupot istri
        return 1;
    }
    public static function a14_jumlah_penghasilan_lain_yang_dikenakan_pajak_final ($param_id_wp)
    {
        $jumlah = \DB::table('pemasukan')->where('ID_WP', '=', $param_id_wp)
                                        ->where('Nomor_Perkiraan','=',3014)
                                        ->where('show_status','=',1)
                                        ->sum('pemasukan.jumlah');
        return $jumlah;
    }
    public static function a14_tarif_pph_terutang_penghasilan_lain_yang_dikenakan_pajak_final ($param_id_wp,$param_jumlah)
    {
        //ambil dari bupot lain
        return 1;
    }
}



// INSERT INTO `rumus_pph_terutang`(`kode`, `nama`, `prosentase`, `batas`) VALUES ('3001','Bunga Deposito, Tabungan, Diskonto SBI, Surat Berharga',0.2,-1);
// INSERT INTO `rumus_pph_terutang`(`kode`, `nama`, `prosentase`, `batas`) VALUES ('3002','Bunga/Diskonto Obligasi',0.15,-1);
// INSERT INTO `rumus_pph_terutang`(`kode`, `nama`, `prosentase`, `batas`) VALUES ('3003','Penjualan Saham',0.1,-1);
// INSERT INTO `rumus_pph_terutang`(`kode`, `nama`, `prosentase`, `batas`) VALUES ('3004','Dividen',0.1,-1);
// INSERT INTO `rumus_pph_terutang`(`kode`, `nama`, `prosentase`, `batas`) VALUES ('3005','Hadiah Undian',0.25,-1);
// INSERT INTO `rumus_pph_terutang`(`kode`, `nama`, `prosentase`, `batas`) VALUES ('3006','Pesangon, Tunjangan Hari Tua, Tebusan Pensiun',0.05,50000000);
// INSERT INTO `rumus_pph_terutang`(`kode`, `nama`, `prosentase`, `batas`) VALUES ('3006','Pesangon, Tunjangan Hari Tua, Tebusan Pensiun',0.15,100000000);
// INSERT INTO `rumus_pph_terutang`(`kode`, `nama`, `prosentase`, `batas`) VALUES ('3006','Pesangon, Tunjangan Hari Tua, Tebusan Pensiun',0.25,500000000);
// INSERT INTO `rumus_pph_terutang`(`kode`, `nama`, `prosentase`, `batas`) VALUES ('3007','Honorarium Atas Beban APBN/APBD',0.15,-1);
// INSERT INTO `rumus_pph_terutang`(`kode`, `nama`, `prosentase`, `batas`) VALUES ('3008','Pengalihan Hak Atas Tanah dan/atau Bangunan',0.05,-1);
// INSERT INTO `rumus_pph_terutang`(`kode`, `nama`, `prosentase`, `batas`) VALUES ('3009','Sewa Tanah dan atau Bangunan',0.1,-1);
// INSERT INTO `rumus_pph_terutang`(`kode`, `nama`, `prosentase`, `batas`) VALUES ('3010','Bangunan yang diterima dalam Rangka Bangun Guna Serah',0.15,-1);
// INSERT INTO `rumus_pph_terutang`(`kode`, `nama`, `prosentase`, `batas`) VALUES ('3011','Bunga Simpanan yang dibayarkan oleh Koperasi',0.1,-1);
// INSERT INTO `rumus_pph_terutang`(`kode`, `nama`, `prosentase`, `batas`) VALUES ('3012','Penghasilan dari Transaksi Derivatif',0.025,-1);

// INSERT INTO `rumus_pph_terutang`(`kode`, `nama`, `prosentase`, `batas`) VALUES ('3013','Penghasilan Isteri dari Satu Pemberi Kerja',,);


// INSERT INTO `rumus_pph_terutang`(`kode`, `nama`, `prosentase`, `batas`) VALUES ('4001','Penghasilan Utama',0.05,60000000);
// INSERT INTO `rumus_pph_terutang`(`kode`, `nama`, `prosentase`, `batas`) VALUES ('4001','Penghasilan Utama',0.15,250000000);
// INSERT INTO `rumus_pph_terutang`(`kode`, `nama`, `prosentase`, `batas`) VALUES ('4001','Penghasilan Utama',0.25,500000000);
// INSERT INTO `rumus_pph_terutang`(`kode`, `nama`, `prosentase`, `batas`) VALUES ('4001','Penghasilan Utama',0.30,5000000000);
// INSERT INTO `rumus_pph_terutang`(`kode`, `nama`, `prosentase`, `batas`) VALUES ('4001','Penghasilan Utama',0.35,-1);
