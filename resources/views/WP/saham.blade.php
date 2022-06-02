@extends('master-blade.master')

@section('konten_bar')
@include('master-blade.leftbar.bar_aset')
@endsection

@section('konten_header')
<div class="content-header-left col-md-9 col-12 mb-2">
    <div class="row breadcrumbs-top">
        <div class="col-12">
            <h2 class="content-header-title float-start mb-0">Aset & Investasi</h2>
        </div>
    </div>
</div>
@endsection

@section('konten_body')

<div class="content-wrapper container-xxl p-0">
    <div class="content-body">

        <div>
            <ul class="nav nav-pills mb-2">
                <!-- Aset -->
                <li class="nav-item">
                    <a class="nav-link" href="{{Route('aset_WP')}}">
                        <i data-feather="layers" class="font-medium-3 me-50"></i>
                        <span class="fw-bold">Aset</span>
                    </a>
                </li>
                <!-- Saham -->
                <li class="nav-item">
                    <a class="nav-link active" href="{{Route('saham_WP')}}">
                        <i data-feather="activity" class="font-medium-3 me-50"></i>
                        <span class="fw-bold">Saham</span>
                    </a>
                </li> 
                <!-- Reksadana -->
                {{-- <li class="nav-item">
                    <a class="nav-link" href="">
                        <i data-feather="bar-chart" class="font-medium-3 me-50"></i>
                        <span class="fw-bold">Reksadana</span>
                    </a>
                </li> --}}
            </ul>
        </div>

        <section>
            <div class="row">
                <div class="col-6">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">DANA RDN</h4>
                        </div>
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{ URL::route('post_deposit')}}" method="post">
                                @csrf
                                <h4 class="card-title">DEPOSIT</h4>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="pilTanggal">Tanggal</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i
                                                        data-feather="calendar"></i></span>
                                                <input type="date" id="pilTanggal" class="form-control" name="pilTanggal" value="<?php echo date("Y-m-d");?>"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="txtJumlah">Jumlah</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i data-feather="edit-2"></i></span>
                                                <input type="text" id="txtJumlah" class="form-control"
                                                    name="txtJumlah" placeholder="Jumlah" required/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label"
                                                for="edt_txt_Keterangan">Keterangan</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i data-feather="feather"></i></span>
                                                <input type="text" id="txt_Keterangan" class="form-control"
                                                    name="txt_Keterangan" placeholder="Keterangan" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="pilSumberDana">Sumber Dana</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="input-group input-group-merge">
                                                <select name="pilSumberDana" id="pilSumberDana"
                                                    class="form-control">
                                                    @foreach ($sumberdana_wp as $row_sumberdana_wp)
                                                    <option value="{{$row_sumberdana_wp->ID_Record}}">
                                                        {{$row_sumberdana_wp->Jenis}} |
                                                        {{$row_sumberdana_wp->Inisial}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="pilTransferKe">Transfer Ke</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="input-group input-group-merge">
                                                <select name="pilTransferKe" id="pilTransferKe"
                                                    class="form-control">
                                                    @foreach ($sumberrdn_wp as $row_sumberrdn_wp)
                                                    <option value="{{$row_sumberrdn_wp->ID_Record}}">
                                                        {{$row_sumberrdn_wp->namasekuritas}} |
                                                        {{$row_sumberrdn_wp->Inisial_RDN}} |
                                                        {{$row_sumberrdn_wp->No_Rekening}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-9 offset-sm-3">
                                    <button type="submit" name="btnSubmit"
                                        class="btn btn-primary me-1">Submit</button>
                                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-6">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">DANA RDN</h4>
                        </div>
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{ URL::route('post_withdraw')}}" method="post">
                                @csrf
                                <h4 class="card-title">WITHDRAW</h4>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="pilTanggal">Tanggal</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i
                                                        data-feather="calendar"></i></span>
                                                <input type="date" id="pilTanggal" class="form-control"
                                                    name="pilTanggal" value="<?php echo date("Y-m-d");?>"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="txtJumlah">Jumlah</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i data-feather="edit-2"></i></span>
                                                <input type="text" id="txtJumlah" class="form-control"
                                                    name="txtJumlah" placeholder="Jumlah" required/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label"
                                                for="edt_txt_Keterangan">Keterangan</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i data-feather="feather"></i></span>
                                                <input type="text" id="txt_Keterangan" class="form-control"
                                                    name="txt_Keterangan" placeholder="Keterangan" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="pilSumberDana">Sumber Dana</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="input-group input-group-merge">
                                                <select name="pilTransferKe" id="pilTransferKe"
                                                    class="form-control">
                                                    @foreach ($sumberrdn_wp as $row_sumberrdn_wp)
                                                    <option value="{{$row_sumberrdn_wp->ID_Record}}">
                                                        {{$row_sumberrdn_wp->namasekuritas}} |
                                                        {{$row_sumberrdn_wp->Inisial_RDN}} |
                                                        {{$row_sumberrdn_wp->No_Rekening}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="pilTransferKe">Transfer Ke</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="input-group input-group-merge">
                                                <select name="pilSumberDana" id="pilSumberDana"
                                                    class="form-control">
                                                    @foreach ($sumberdana_wp as $row_sumberdana_wp)
                                                    <option value="{{$row_sumberdana_wp->ID_Record}}">
                                                        {{$row_sumberdana_wp->Jenis}} |
                                                        {{$row_sumberdana_wp->Inisial}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-9 offset-sm-3">
                                    <button type="submit" name="btnSubmit"
                                        class="btn btn-primary me-1">Submit</button>
                                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Basic Transaksi Saham Form section start -->
        <section id="saham-column-form" name="saham-column-form">
            <div class="row">
                {{-- BUY --}}
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" name="TitleTransaksiSaham" id="TitleTransaksiSaham">Form Saham</h4>
                        </div>
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{ URL::route('post_buy_saham')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="pilAction">Action</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="input-group input-group-merge">
                                                    <select name="pilAction" id="pilAction" class="form-control">
                                                        <option value="BUY">BUY</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="pilTanggal">Tanggal Transaksi</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i
                                                            data-feather="calendar"></i></span>
                                                    <input type="date" id="pilTanggal" class="form-control"
                                                        name="pilTanggal" placeholder="Tanggal" value="<?php echo date("Y-m-d");?>"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="pilProduct">Product</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="grid"></i></span>
                                                    {{-- <select name="pilProduct" id="pilProduct" class="form-control">
                                                        <option value="1">Penghasilan Utama</option>
                                                        <option value="2">Penghasilan Tambahan</option>
                                                    </select> --}}

                                                    <input type="text" id="pilProduct" class="form-control"
                                                        name="pilProduct" placeholder="Product" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="txtJumlah">Jumlah</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="edit-2"></i></span>
                                                    <input type="text" id="txtJumlah" class="form-control"
                                                        name="txtJumlah" placeholder="Jumlah" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="txtHargaSatuan">Harga Satuan</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="edit-2"></i></span>
                                                    <input type="text" id="txtHargaSatuan" class="form-control"
                                                        name="txtHargaSatuan" placeholder="Harga Satuan" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="txtHargaTotal">Harga Total</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="edit-2"></i></span>
                                                    <input type="text" id="txtHargaTotal" class="form-control"
                                                        name="txtHargaTotal" placeholder="Harga Total" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="txt_Keterangan">Keterangan</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="feather"></i></span>
                                                    <input type="text" id="txt_Keterangan" class="form-control"
                                                        name="txt_Keterangan" placeholder="Keterangan" />
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="pilSumberDana">Sumber Dana</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <select name="pilSumberDana" id="pilSumberDana"
                                                        class="form-control">
                                                        @foreach ($sumberrdn_wp as $row_sumberrdn_wp)
                                                        <option value="{{$row_sumberrdn_wp->ID_Record}}">
                                                            {{$row_sumberrdn_wp->namasekuritas}} |
                                                            {{$row_sumberrdn_wp->Inisial_RDN}} |
                                                            {{$row_sumberrdn_wp->No_Rekening}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-9 offset-sm-3">
                                        <button type="submit" name="btnSubmit"
                                            class="btn btn-primary me-1">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                    </div>
                                </div>
                            </form>
                            <br>
                            <strong style="background-color: yellow;">Mumpung inget</strong> <br>
                            <strong>
                                Note : Tambah div notif kalau kosong apakah yakin tidak ada keterangan
                                <br>
                                Check jumlah buy <= dana di RDN  <br>
                                Check hanya bisa sell kalau udah buy <br>
                                Check jumlah sell tidak melebihi <br>
                                tanya perhitungan keuntungan. <br>
                            </strong>
                        </div>
                    </div>
                </div>
                {{-- SELL --}}
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" name="TitleTransaksiSaham" id="TitleTransaksiSaham">Form Saham</h4>
                        </div>
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{ URL::route('post_buy_saham')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="pilAction">Action</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="input-group input-group-merge">
                                                    <select name="pilAction" id="pilAction" class="form-control">
                                                        <option value="SELL">SELL</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="pilTanggal">Tanggal Transaksi</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i
                                                            data-feather="calendar"></i></span>
                                                    <input type="date" id="pilTanggal" class="form-control"
                                                        name="pilTanggal" placeholder="Tanggal" value="<?php echo date("Y-m-d");?>"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="pilSumberDana">Sumber Dana</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <select name="pilSumberDanaSell" id="pilSumberDanaSell" class="form-control" onchange="isi_sell_stock()">                                                        
                                                            <option value="---">Pilih</option>
                                                            @foreach ($sumberrdn_wp as $row_sumberrdn_wp)
                                                            <option value="{{$row_sumberrdn_wp->ID_Record}}">
                                                                {{$row_sumberrdn_wp->namasekuritas}} |
                                                                {{$row_sumberrdn_wp->Inisial_RDN}} |
                                                                {{$row_sumberrdn_wp->No_Rekening}}</option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="pilProduct">Product</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="grid"></i></span>
                                                    <select name="pilProductSell" id="pilProductSell" class="form-control">
                                                        <option value="---">Pilih</option>
                                                    </select>

                                                    {{-- <input type="text" id="pilProduct" class="form-control"
                                                        name="pilProduct" placeholder="Product" required /> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="txtJumlah">Jumlah</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="edit-2"></i></span>
                                                    <input type="text" id="txtJumlah" class="form-control"
                                                        name="txtJumlah" placeholder="Jumlah" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="txtHargaSatuan">Harga Satuan</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="edit-2"></i></span>
                                                    <input type="text" id="txtHargaSatuan" class="form-control"
                                                        name="txtHargaSatuan" placeholder="Harga Satuan" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="txtHargaTotal">Harga Total</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="edit-2"></i></span>
                                                    <input type="text" id="txtHargaTotal" class="form-control"
                                                        name="txtHargaTotal" placeholder="Harga Total" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="txt_Keterangan">Keterangan</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="feather"></i></span>
                                                    <input type="text" id="txt_Keterangan" class="form-control"
                                                        name="txt_Keterangan" placeholder="Keterangan" />
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}                                    
                                    <div class="col-sm-9 offset-sm-3">
                                        <button type="submit" name="btnSubmit"
                                            class="btn btn-primary me-1">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                    </div>
                                </div>
                            </form>
                            <br>
                            <strong style="background-color: yellow;">Mumpung inget</strong> <br>
                            <strong>
                                Note : Tambah div notif kalau kosong apakah yakin tidak ada keterangan
                                <br>
                                Check jumlah buy <= dana di RDN  <br>
                                Check hanya bisa sell kalau udah buy <br>
                                Check jumlah sell tidak melebihi <br>
                                tanya perhitungan keuntungan. <br>
                            </strong>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Basic Floating Label Form section end -->

        <!-- Datatable Start-->
        <div>
            <?php
                // print_r($sahaaam);
            ?>
            <br>
            {{-- <table> --}}
            {{-- @foreach ($sahaaam as $item)
                <tr>
                    <td> {{ $item['Product'] }}</td>
                    <td> {{ $item['Lot'] }}</td>
                    <td> {{ $item['AVG'] }}</td>
                </tr>
            @endforeach --}}
            {{-- </table> --}}
        </div>
        <div class="row" id="table-hover-row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Saham yang dimiliki</h4>
                        <select name="pilSumberDanaRdna" id="pilSumberDanaRdna">
                            <option value="">Show All</option>                            
                            @foreach ($sumberrdn_wp as $row_sumberrdn_wp)
                            <option value="{{$row_sumberrdn_wp->namasekuritas}}">
                                {{$row_sumberrdn_wp->namasekuritas}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="card-body">
                        {{-- <p class="card-text">Datatable</p> --}}

                        <div class="table-responsive">
                            <table id="saham_yang_dimiliki" class="table table-striped table-hover" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th scope="col">Product</th>
                                        <th scope="col">Jumlah Lot</th>
                                        <th scope="col">Harga_Satuan</th>
                                        <th scope="col">Harga_Total</th>
                                        <th scope="col">RDN</th>
                                    </tr>
                                </thead>
                                {{-- <tfoot>
                                    <tr>
                                        <td>Tanggal</td>
                                        <td>Jenis</td>
                                        <td>Jumlah</td>
                                        <td>Keterangan</td>
                                        <td>Action</td>
                                    </tr>
                                </tfoot> --}}
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!-- Datatable End-->

        <!-- Datatable Start-->
        <div class="row" id="table-hover-row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Riwayat Transaksi Saham</h4>
                        <select name="pilSumberDanaRdnb" id="pilSumberDanaRdnb">
                            <option value="">Show All</option>
                            @foreach ($sumberrdn_wp as $row_sumberrdn_wp)
                            <option value="{{$row_sumberrdn_wp->namasekuritas}}">
                                {{$row_sumberrdn_wp->namasekuritas}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="card-body">
                        {{-- <p class="card-text">Datatable</p> --}}

                        <div class="table-responsive">
                            <table id="transaksi_saham" class="table table-striped table-hover" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th scope="col">Tanggal Transaksi</th>
                                        <th scope="col">Action</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Harga_Satuan</th>
                                        <th scope="col">Harga_Total</th>
                                        <th scope="col">RDN</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                {{-- <tfoot>
                                    <tr>
                                        <td>Tanggal</td>
                                        <td>Jenis</td>
                                        <td>Jumlah</td>
                                        <td>Keterangan</td>
                                        <td>Action</td>
                                    </tr>
                                </tfoot> --}}
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!-- Datatable End-->


    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/plug-ins/1.11.5/dataRender/datetime.js"></script>

<script>
    var myurl = "<?php echo URL::to('/'); ?>";
    // alert('myurl : ' + myurl);

    $("#pilProductSell").attr('disabled',true);
    var table_b = null;
    var table_a = null;
    $(document).ready(function() {
        // alert('load');

        table_a = $('#saham_yang_dimiliki').DataTable({
            "processing": true,
            "searching": true,
            // "serverSide": true,
            "responsive": true,
            "ordering": true, // Set true agar bisa di sorting
            "order": [[ 0, 'desc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
            "ajax":
            {
                "url": myurl + '/avg_saham_datatable',
                "type": "GET"
            },
            columnDefs: [
                {
                    targets: [2,3],
                    render: $.fn.dataTable.render.number( '.', ',', 0, 'Rp ' ),
                    className: 'dt-body-right'
                },
            ],
            "drawCallback": function( settings ) {
                feather.replace({
                width: 14,
                height: 14
                });
            }
        });
        // alert('masuk');

        tabel_b = $('#transaksi_saham').DataTable({
            "processing": true,
            "searching": true,
            // "serverSide": true,
            "responsive": true,
            "ordering": true, // Set true agar bisa di sorting
            "order": [[ 0, 'desc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
            "ajax":
            {
                "url": myurl + '/saham_datatable',
                "type": "GET"
            },
            columnDefs: [
                {
                    targets: [5],
                    render: $.fn.dataTable.render.number( '.', ',', 0, 'Rp ' ),
                    className: 'dt-body-right'
                },
                {
                    targets: [0],
                    render:function(data,type,row)
                    {
                        if(type === "sort" || type === "type")
                        {
                            return data;
                        }
                        return moment(data).format("dddd, DD MMMM YYYY");
                    }
                },
                {
                    targets: [3,4],
                    render: $.fn.dataTable.render.number( '.', ',', 0,''),
                    className: 'dt-body-right'
                },
            ],
            "drawCallback": function( settings ) {
                feather.replace({
                width: 14,
                height: 14
                });
            }
        });

        // ----------------------------------------------------------------------------------------------------------
        //  Searching Via Combobox Append to Datatable
        // -----------------------------------------------------------------------------------------------------------

        //Get a reference to the new datatable
        var table_aa = $('#saham_yang_dimiliki').DataTable();
        var table_bb = $('#transaksi_saham').DataTable();

        //Take the category filter drop down and append it to the datatables_filter div. 
        $("#transaksi_saham_filter.dataTables_filter").append($("#pilSumberDanaRdnb"));
        $("#saham_yang_dimiliki_filter.dataTables_filter").append($("#pilSumberDanaRdna"));
        
        //Get the column index for the Category column to be used in the method below ($.fn.dataTable.ext.search.push)
        //This tells datatables what column to filter on when a user selects a value from the dropdown.
        //It's important that the text used here (Category) is the same for used in the header of the column to filter
        var categoryIndex_a = 0;
        $("#saham_yang_dimiliki th").each(function (i) {
            if ($($(this)).html() == "RDN") {
            categoryIndex_a = i; return false;
            }
        });
        var categoryIndex = 0;
        $("#transaksi_saham th").each(function (i) {
            if ($($(this)).html() == "RDN") {
            categoryIndex = i; return false;
            }
        });

        //Use the built in datatables API to filter the existing rows by the Category column
        $.fn.dataTable.ext.search.push(
            function (settings, data, dataIndex) {
            var selectedItem = $('#pilSumberDanaRdna').val()
            var category = data[categoryIndex_a];
            if (selectedItem === "" || category.includes(selectedItem)) {
                return true;
            }
            return false;
            }
        );
        $.fn.dataTable.ext.search.push(
            function (settings, data, dataIndex) {
            var selectedItem = $('#pilSumberDanaRdnb').val()
            var category = data[categoryIndex];
            if (selectedItem === "" || category.includes(selectedItem)) {
                return true;
            }
            return false;
            }
        );

        //Set the change event for the Category Filter dropdown to redraw the datatable each time
        //a user selects a new filter.        
        $("#pilSumberDanaRdna").change(function (e) {
            table_aa.draw();
        });
        $("#pilSumberDanaRdnb").change(function (e) {
            table_bb.draw();
        });

        table_aa.draw();
        table_bb.draw();
       
    });

    function isi_sell_stock()
    {
        var pilihan = $("#pilSumberDanaSell").val();
        // alert(pilihan);
        if(pilihan != "---")
        {
            $("#pilProductSell").attr('disabled',false);
            $.ajax({
                type: 'POST',
                url: myurl + '/custom_sell_stock',
                data: {param_rdn: pilihan},
                cache: false,
                success: function(msg){
                    // alert("msg : " + msg);
                    $("#pilProductSell").html(msg);
                    // $("#pilJenisSubPengeluaran").val($("#pilJenisSubPengeluaran").val());
                }
            });

        }
        else if(pilihan == "---")
        {
            var res_cb = "<option value='---'>Pilih</option>";
            $("#pilProductSell").html(res_cb);
            $("#pilProductSell").attr('disabled',true);
            // $("#pilProductSell").prop("selectedIndex", 0);
        }
    }


    $("#txtJumlah,#txtHargaSatuan,#txtHargaTotal").on({
        "focus": function(event) {
            $(event.target).select();
        },
        "keyup": function(event) {
            $(event.target).val(function(index, value) {
            return value.replace(/\D/g, "")
                // .replace(/([0-9])([0-9]{2})$/, '$1,$2')
                .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
            });
        }
    });


    function DeleteSaham(paramdelete)
    {
        // alert('delete : ' + paramdelete);
        var data = window.confirm("Apakah yakin akan menghapus : " + paramdelete + " ?");
        if(data == true)
        {
            // alert("hapus");
            $.ajax({
                type: 'POST',
                url: myurl + '/post_delete_saham',
                data: {idparam: paramdelete},
                cache: false,
                success: function(msg){
                    // alert('pesan : ' + msg);
                    document.location.reload(true);
                    alert("berhasil hapus");
                    // location.reload();
                },
                error: function(result) {
                    alert('error');
                }
            });
        }
        else if(data == false)
        {
            alert("tidak jadi");
        }
    }

</script>
@endsection
