Tipe Form {{$tipe_form}}
<hr>
<h3 class="text-light bg-primary text-center">FORM INDUK</h3>
<hr>
<table class="table table-bordered">
    <tr>
        <td class="col-10">PENGHASILAN NETO DALAM NEGERI SEHUBUNGAN DENGAN PEKERJAAN</td>
        <td class="col-2">{{$penghasilan_neto_dalam_negeri_sehubungan_dengan_pekerjaan}}</td>
    </tr>
    <tr>
        <td>PENGHASILAN NETO DALAM NEGERI LAINNYA</td>
        <td>{{$penghasilan_neto_dalam_negeri_lainnya}}</td>
    </tr>
    <tr>
        <td>PENGHASILAN LUAR NEGERI</td>
        <td>{{$penghasilan_neto_luar_negeri}}</td>
    </tr>
    <tr>
        <td>JUMLAH PENGHASILAN NETO</td>
        <td>{{$jumlah_penghasilan_neto}}</td>
    </tr>
    <tr>
        <td>ZAKAT/SUMBANGAN KEAGAMAAN YANG SIFATNYA WAJIB</td>
        <td>{{$zakat_sumbangan_keagamaan_yang_sifatnya_wajib}}</td>
    </tr>
    <tr>
        <td>JUMLAH PENGHASILAN NETO SETELAH PENGURANGAN ZAKAT/SUMBANGAN KEAMGAAN YANG SIFATNYA WAJIB</td>
        <td>{{$jumlah_penghasilan_neto_setelah_pengurangan}}</td>
    </tr>
    <tr>
        <td>PENGHASILAN TIDAK KENA PAJAK</td>
        <td>{{$status_PTKP}} - {{$tarif_PTKP}}</td>
    </tr>
    <tr>
        <td>PENGHASILAN KENA PAJAK</td>
        <td>{{$penghasilan_kena_pajak}}</td>
    </tr>
    <tr>
        <td>PPH TERUTANG</td>
        <td>{{$pph_terutang}}</td>
    </tr>
    <tr>
        <td>PENGEMBALIAN/PENGURANGAN PPH PASAL 24 YANG TELAH DIKREDITKAN</td>
        <td>{{$pengembalian_pengurangan_pph_24_yang_dikreditkan}}</td>
    </tr>
    <tr>
        <td>JUMLAH PPH TERUTANG</td>
        <td>{{$jumlah_pph_terutang}}</td>
    </tr>
    <tr>
        <td>PPH YANG DIPOTONG/DIPUNGUT PIHAK LAIN/DITANGGUNG PEMERINTAH DAN/ATAU KREDIT PAJAK LUAR NEGERI DAN/ATAU TERUTANG DI LUAR NEGERI</td>
        <td>{{$pph_yang_dipotong_atau_dipungut_pihak_lain_atau_pemerintah_etc}}</td>
    </tr>
    <tr>
        <td>PPH YANG HARUS DIBAYAR SENDIRI</td>
        <td>{{$pph_yang_harus_dibayar_sendiri}}</td>
    </tr>
    <tr>
        <td>PPH YANG LEBIH DIPOTONG/DIPUNGUT</td>
        <td>{{$pph_yang_lebih_dipotong_atau_dipungut}}</td>
    </tr>
    <tr>
        <td>PPH YANG DIBAYAR SENDIRI PPH PASAL 25</td>
        <td>{{$pph_yang_dibayar_sendiri_pph_pasal_25}}</td>
    </tr>
    <tr>
        <td>STP PPH PASAL 25 (Hanya Pokok Pajak)</td>
        <td>{{$pph_yang_dibayar_sendiri_stp_pph_pasal_25}}</td>
    </tr>
    <tr>
        <td>FISKAL LUAR NEGERI</td>
        <td>{{$pph_yang_dibayar_sendiri_fiskal_luar_negeri}}</td>
    </tr>
    <tr>
        <td>JUMLAH KREDIT PAJAK</td>
        <td>{{$jumlah_kredit_pajak}}</td>
    </tr>
    <tr>
        <td>PPH YANG KURANG DIBAYAR</td>
        <td>{{$pph_kurang_dibayar}}</td>
    </tr>
    <tr>
        <td>PPH YANG LEBIH DIBAYAR</td>
        <td>{{$pph_lebih_dibayar}}</td>
    </tr>
    <tr>
        <td>ANGSURAN PPH PASAL 25 TAHUN PAJAK BERIKUTNYA</td>
        <td>{{$angsuran_pph_pasal_25_tahun_pajak_berikutnya}}</td>
    </tr>
</table>
<hr>
<h3 class="text-light bg-success text-center">FORM 1770S-I</h3>
<hr>
PENGHASILAN NETO DALAM NEGERI LAINNYA
<table class="table table-bordered">
    <thead class="thead-primary">
        <tr>
            <th>JENIS PENGHASILAN</th>
            <th>JUMLAH PENGHASILAN</th>
        </tr>
    </thead>
    <tr>
        <td>BUNGA</td>
        <td>{{$bunga}}</td>
    </tr>
    <tr>
        <td>ROYALTI</td>
        <td>{{$royalti}}</td>
    </tr>
    <tr>
        <td>SEWA</td>
        <td>{{$sewa}}</td>
    </tr>
    <tr>
        <td>PENGHARGAAN DAN HADIAH</td>
        <td>{{$penghargaan_dan_hadiah}}</td>
    </tr>
    <tr>
        <td>KEUNTUNGAN DARI PENJUALAN/PENGHALIHAN HARTA</td>
        <td>{{$keuntungan_dari_penjualan_pengalihan_harta}}</td>
    </tr>
    <tr>
        <td>PENGHASILAN LAINNYA</td>
        <td>{{$penghasilan_lainnya}}</td>
    </tr>
    <tr>
        <td>Jumlah</td>
        <td>{{$jumlah_penghasilan_neto_dalam_negeri_lainnya}}</td>
    </tr>
</table>
<hr>
PENGHASILAN YANG TIDAK TERMASUK OBJEK PAJAK
<table class="table table-bordered">
    <thead class="thead-primary">
        <tr>
            <th>JENIS PENGHASILAN</th>
            <th>JUMLAH PENGHASILAN</th>
        </tr>
    </thead>
    <tr>
        <td>BANTUAN/SUMBANGAN/HIBAH</td>
        <td>{{$bantuan_sumbangan_hibah}}</td>
    </tr>
    <tr>
        <td>WARISAN</td>
        <td>{{$warisan}}</td>
    </tr>
    <tr>
        <td>BAGIAN LABA ANGGOTA PERSEROAN KOMANDITER TIDAK ATAS SAHAM, PERSEKUTUAN, PERKUMPULAN, FIRMA, KONGSI</td>
        <td>{{$bagian_laba_anggota_cv_tidak_atas_saham_etc}}</td>
    </tr>
    <tr>
        <td>KLAIM ASURANSI KESEHATAN, KECELAKAAN, JIWA, DWIGUNA, BEASISWA</td>
        <td>{{$klaim_asuransi_kesehatan_etc}}</td>
    </tr>
    <tr>
        <td>BEASISWA</td>
        <td>{{$beasiswa}}</td>
    </tr>
    <tr>
        <td>PENGHASILAN LAINNYA YANG TIDAK TERMASUK OBJEK PAJAK</td>
        <td>{{$penghasilan_lainnya_yang_tidak_termasuk_objek_pajak}}</td>
    </tr>
</table>
<hr>
DAFTAR PEMOTONGAN/PEMUNGUTAN PPH OLEH PIHAK LAIN DAN PPH YANG DITANGGUNG PEMERINTAH
<table class="table table-bordered">
    <thead class="thead-primary">
        <tr>
            <th>NAMA PEMOTONG/ PEMUNGUT PAJAK</th>
            <th>NPWP PEMOTONG/ PEMUNGUT PAJAK</th>
            <th>NOMOR BUPOT</th>
            <th>TANGGAL BUPOT</th>
            <th>JENIS PAJAK</th>
            <th>JUMLAH PPH YANG DIPOTONG/DIPUNGUT</th>
        </tr>
    </thead>
    @foreach ($daftar_bupot as $row_daftar_bupot)
    <tr>
        <td>{{$row_daftar_bupot->Nama_Pemotong}}</td>
        <td>{{$row_daftar_bupot->NPWP_Pemotong}}</td>
        <td>{{$row_daftar_bupot->Nomor_Bukti_Pemotongan}}</td>
        <td>{{$row_daftar_bupot->Tanggal_Bukti_Pemotongan}}</td>
        <td>{{$row_daftar_bupot->Jenis_Pajak}}</td>
        <td>{{$row_daftar_bupot->Jumlah}}</td>
    </tr>
    @endforeach
</table>
<hr>
<h3 class="text-light bg-primary text-center">FORM 1770S-II</h3>
<hr>
PENGHASILAN YANG DIKENAKAN PPH FINAL DAN/ATAU BERSIFAT FINAL
<table class="table table-bordered">
    <thead class="thead-primary">
        <tr>
            <th>SUMBER/JENIS PENGHASILAN</th>
            <th>DASAR PENGENAAN PAJAK/ PENGHASILAN BRUTO</th>
            <th>PPH TERUTANG</th>
        </tr>
        <tr>
            <td>BUNGA DEPOSITO, TABUNGAN, DISKONTO, SBI, SURAT BERHARGA NEGARA</td>
            <td>{{$jumlah_bunga_deposito_tabungan_etc}}</td>
            <td>{{$tarif_pph_terutang_bunga_deposito_tabungan_etc}}</td>
        </tr>
        <tr>
            <td>BUNGA/DISKONTO OBLIGASI</td>
            <td> {{$jumlah_bunga_diskonto_obligasi}} </td>
            <td> {{$tarif_pph_terutang_bunga_diskonto_obligasi}} </td>
        </tr>
        <tr>
            <td>PENJUALAN SAHAM DI BURSA EFEK</td>
            <td> {{$jumlah_penjualan_saham_di_bursa_efek}} </td>
            <td> {{$tarif_pph_terutang_penjualan_saham_di_bursa_efek}} </td>
        </tr>
        <tr>
            <td>HADIAH UNDIAN</td>
            <td> {{$jumlah_hadiah_undian}} </td>
            <td> {{$tarif_pph_terutang_hadiah_undian}} </td>
        </tr>
        <tr>
            <td>PESANGON, TUNJANGAN HARI TUA DAN TEBUSAN PENSIUN YANG DIBAYARKAN SEKALIGUS</td>
            <td> {{$jumlah_pesangon_tunjangan_hari_tua_etc}} </td>
            <td> {{$tarif_pph_terutang_pesangon_tunjangan_hari_tua_etc}} </td>
        </tr>
        <tr>
            <td>HONORARIUM ATAS BEBAN APBN/APBD</td>
            <td> {{$jumlah_honorarium_atas_beban_apbd}} </td>
            <td> {{$tarif_pph_terutang_honorarium_atas_beban_apbd}} </td>
        </tr>
        <tr>
            <td>PENGALIHAN HAK ATAS TANAH DAN/ATAU BANGUNAN</td>
            <td> {{$jumlah_pengalihan_hak_atas_tanah_dan_atau_bangunan}} </td>
            <td> {{$tarif_pph_terutang_pengalihan_hak_atas_tanah_dan_atau_bangunan}} </td>
        </tr>
        <tr>
            <td>SEWA ATAS TANAH DAN/ATAU BANGUNAN</td>
            <td> {{$jumlah_sewa_atas_tanah_dan_atau_bangunan}} </td>
            <td> {{$tarif_pph_terutang_sewa_atas_tanah_dan_atau_bangunan}} </td>
        </tr>
        <tr>
            <td>BANGUNAN YANG DITERIMA DALAM RANGKA BANGUN GUNA SERAH</td>
            <td> {{$jumlah_bangunan_yang_diterima_dalam_rangka_bangun_guna_serah}} </td>
            <td> {{$tarif_pph_terutang_bangunan_yang_diterima_dalam_rangka_bangun_guna_serah}} </td>
        </tr>
        <tr>
            <td>BUNGA SIMPANAN YANG DIBAYARKAN OLEH KOPERASI KEPADA ANGGOTA KOPERASI</td>
            <td> {{$jumlah_bunga_simpanan_koperasi}} </td>
            <td> {{$tarif_pph_terutang_bunga_simpanan_koperasi}} </td>
        </tr>
        <tr>
            <td>PENGHASILAN DARI TRANSAKSI DERIVATIF</td>
            <td> {{$jumlah_penghasilan_dari_transaksi_derivatif}} </td>
            <td> {{$tarif_pph_terutang_penghasilan_dari_transaksi_derivatif}} </td>
        </tr>
        <tr>
            <td>DEVIDEN</td>
            <td> {{$jumlah_deviden}} </td>
            <td> {{$tarif_pph_terutang_deviden}} </td>
        </tr>
        <tr>
            <td>PENGHASILAN ISTERI DARI SATU PEMBERI KERJA</td>
            <td> {{$jumlah_penghasilan_isteri_dari_satu_pemberi_kerja}} </td>
            <td> {{$tarif_pph_terutang_penghasilan_isteri_dari_satu_pemberi_kerja}} </td>
        </tr>
        <tr>
            <td>PENGHASILAN LAIN YANG DIKENAKAN PAJAK FINAL DAN/ATAU BERSIFAT FINAL</td>
            <td> {{$jumlah_penghasilan_lain_yang_dikenakan_pajak_final}} </td>
            <td> {{$tarif_pph_terutang_penghasilan_lain_yang_dikenakan_pajak_final}} </td>
        </tr>
    </thead>
    
</table>
<hr>
Harta Pada Akhir Tahun
<table class="table table-bordered">
    <thead class="thead-primary">
        <tr>
            <th>JENIS HARTA</th>
            <th>TAHUN PEROLEHAN</th>
            <th>HARGA PEROLEHAN</th>
            <th>KETERANGAN</th>
        </tr>
    </thead>
    <?php
    for ($i=0; $i < count($daftar_harta) ; $i++) { 
        echo "<tr>";
            echo "<td>".$daftar_harta[$i][0]->Nama."</td>";
            echo "<td>".$daftar_harta[$i][0]->Deskripsi."</td>";
            echo "<td>".number_format($daftar_harta[$i][0]->Nilai, 2, ',', '.')."</td>";
            echo "<td>".$daftar_harta[$i][0]->Keterangan."</td>";
        echo "</tr>";
    }
    ?>
    
</table>
<hr>
Kewajiban/Utang Pada Akhir Tahun
<table class="table table-bordered">
    <thead class="thead-primary">
        <tr>
            <th>Nama Pemberi Pinjaman</th>
            <th>Alamat Pemberi Pinjaman</th>
            <th>Tahun Peminjaman</th>
            <th>Jumlah</th>
        </tr>
    </thead>
    <?php
    for ($i=0; $i < count($daftar_hutang) ; $i++) { 
        echo "<tr>";
            echo "<td>".$daftar_hutang[$i][0]->Nama."</td>";
            echo "<td>".$daftar_hutang[$i][0]->Alamat."</td>";
            echo "<td>".$daftar_hutang[$i][0]->Tahun."</td>";
            echo "<td>".number_format($daftar_hutang[$i][0]->Jumlah, 2, ',', '.')."</td>";                    
        echo "</tr>";
    }
    ?>
</table>
<hr>
Daftar Susunan Anggota Keluarga <br> ( Kalau sudah selesai next Bagus tambahi umur buat check masuk tanggungan apa kagak)<br>
<table class="table table-bordered">
    <thead class="thead-primary">
        <tr>
            <th>Nama</th>
            <th>NIK</th>
            <th>Tanggal Lahir</th>
            <th>Hubungan Keluarga</th>
            <th>Pekerjaan</th>
        </tr>
    </thead>
    @foreach ($kartu_keluarga as $row_kk)
    <tr>
        <td>{{$row_kk->Nama}}</td>
        <td>{{$row_kk->NIK}}</td>
        <td>{{$row_kk->Tanggal_Lahir}}</td>
        <td>{{$row_kk->Hubungan_Keluarga}}</td>
        <td>{{$row_kk->Pekerjaan}}</td>
    </tr>
    @endforeach
</table>