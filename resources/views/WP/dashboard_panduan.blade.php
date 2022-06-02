@extends('master-blade.master')

@section('konten_bar')
@include('master-blade.leftbar.bar_spt')
@endsection

@section('konten_header')
{{-- ini header panduan spt --}}
@endsection

@section('konten_body')

{{-- <div class="card">
    <div class="container">
       <table>
            @foreach ($tahun_wp as $isi_tahun)
            <tr>
                <td>{{$isi_tahun}}</td>
            </tr>
            @endforeach
       </table>
<hr>
       <table>
            @foreach ($utama as $isi_tahuna)
            <tr>
                <td>{{$isi_tahuna}}</td>
            </tr>
            @endforeach
        </table>

<hr>
        <table>
            @foreach ($non_utama as $isi_tahunb)
            <tr>
                <td>{{$isi_tahunb}}</td>
            </tr>
            @endforeach
        </table>
<hr>

        <table>
            @foreach ($bupot as $rowbupot)
            <tr>
                <td>{{$rowbupot}}</td>
            </tr>
            @endforeach
        </table>
    </div>
    <br>
</div> --}}

<div class="card">
<div class="container">
    <table class="table table-stripped">
        <tr>
            <td>Tahun Pajak</td>
            <td>Pemasukan</td>
            <td>Jumlah Bukti Selain PPH 21</td>
            <td>Bukti Potong PPH 21</td>
            <td>Action</td>
        </tr>
        @foreach ($tahun_wp as $item)
            <tr>
                <td>{{$item['year']}}</td>
                <td>{{number_format($item['pemasukan'],0,',','.')}}</td>
                <td>{{$item['buktiselainpph21']}}</td>
                <td>{{$item['bupotpph21']}}</td>
                <td><a href="{{url('SPT_Panduan_WP/'.$item['year'])}}">Lihat Panduan SPT</a></td>
            </tr>
        @endforeach
        {{--  <tr>
            <td>2019</td>
            <td>60.000.000</td>
            <td>3</td>
            <td>V</td>
            <td><Button>Lihat Panduan SPT</Button></td>
        </tr>
        <tr>
            <td>2020</td>
            <td>120.000.000</td>
            <td>6</td>
            <td>V</td>
            <td><Button>Lihat Panduan SPT</Button></td>
        </tr>
        <tr>
            <td>2019</td>
            <td>140.000.000</td>
            <td>4</td>
            <td>V</td>
            <td><Button>Lihat Panduan SPT</Button></td>
        </tr>  --}}
    </table>
</div>
</div>
@endsection
