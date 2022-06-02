@extends('master-blade.master')

@section('konten_bar')
@include('master-blade.leftbar.bar_spt')
@endsection

@section('konten_header')
{{-- <a href="{{url('SPT_Panduan_WP_PDF/'.$tahun)}}">PDF</a> --}}
@endsection

@section('konten_body')

<div class="card">
    <div class="container">
        {{-- Tipe Form {{$tipe_form}} --}}
        <br>
        <div class="row">
            <div class="col-11"><h1 style="text-align: center;">Panduan SPT {{$tipe_form}}</h1></div>
            <div class="col-1"><button class="btn btn-outline-primary">Export</button></div>
        </div>


        <hr>
        <h3 class="text-light bg-primary text-center">FORM INDUK</h3>
        <hr>
        <table class="table table-bordered">
            <tr>
                <td>JUMLAH PENGHASILAN BRUTO DALAM NEGERI SEHUBUNGAN DENGAN PEKERJAAN DAN PENGHASILAN NETTO DALAM NEGERI LAINNYA</td>
                <td>{{$jumlah_penghasilan_bruto}}</td>
            </tr>
            <tr>
                <td>PENGURANGAN</td>
                <td>{{$pengurangan}}</td>
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
                <td>PAJAK PENGHASILAN TERUTANG</td>
                <td>{{$pph_terutang}}</td>
            </tr>
            <tr>
                <td>PAJAK PENGHASILAN YANG DIPOTONG PIHAK LAIN</td>
                {{-- <td>{{$pajak_penghasilan_dipotong_pihak_lain}}</td> --}}
                <td>{{$pph_terutang}}</td>
            </tr>
            {{-- <tr>
                <td>PAJAK PENGHASILAN YANG HARUS DIBAYAR SENDIRI</td>
                <td>{{$pph_yang_harus_dibayar_sendiri}}</td>
            </tr>
            <tr>
                <td>PAJAK PENGHASILAN YANG LEBIH DIPOTONG</td>
                <td>{{$pph_yang_lebih_dipotong_atau_dipungut}}</td>
            </tr> --}}
            <tr>
                <td>PAJAK PENGHASILAN YANG HARUS DIBAYAR SENDIRI</td>
                <td rowspan='2'>0</td>
            </tr>
            <tr>
                <td>PAJAK PENGHASILAN YANG LEBIH DIPOTONG</td>
            </tr>
            <tr>
                <td>DASAR PENGENAAN PAJAK/PENGHASILAN BRUTO PAJAK PENGHASILAN FINAL</td>
                <td>{{$dasar_pengenaan_pajak_atau_penghasilan_bruto_penghasilan_final}}</td>
            </tr>
            <tr>
                <td>PAJAK PENGHASILAN FINAL TERUTANG</td>
                {{-- <td>{{$pajak_penghasilan_final_terutang}}</td> --}}
                <td>0,00</td>
            </tr>
            <tr>
                <td>PAJAK YANG DIKECUALIKAN DARI OBJEK PAJAK</td>
                <td>{{$penghasilan_dikecualikan_oleh_objek_pajak}}</td>
            </tr>
            <tr>
                <td>JUMLAH KESELURUHAN HARTA PADA AKHIR TAHUN PAJAK</td>
                {{-- <td>{{$harta}}</td> --}}
                <td>21.500.000</td>
            </tr>
            <tr>
                <td>JUMLAH KESELURUHAN HUTANG PADA AKHIR TAHUN PAJAK </td>
                {{-- <td>{{$hutang}}</td> --}}
                <td>116.000.000</td>
            </tr>
        </table>
        <hr>
    </div>
    <br>
</div>

@endsection
