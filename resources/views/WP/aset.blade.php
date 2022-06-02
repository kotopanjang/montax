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
                    <a class="nav-link active" href="{{Route('aset_WP')}}">
                        <i data-feather="layers" class="font-medium-3 me-50"></i>
                        <span class="fw-bold">Aset</span>
                    </a>
                </li>
                <!-- Saham -->
                <li class="nav-item">
                    <a class="nav-link" href="{{Route('saham_WP')}}">
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

        <!-- Basic Aset Form section start -->
        <section id="aset-column-form" name="aset-column-form">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" name="TitleAset" id="TitleAset">Form Aset</h4>
                        </div>
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{ URL::route('post_harta')}}" method="post">
                                {{-- <form action=""> --}}
                                @csrf
                                <div class="row">
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
                                                        name="pilTanggal" placeholder="Tanggal" value="<?php echo date("Y-m-d");?>"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="pilJenis">Kategori</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="grid"></i></span>
                                                    {{-- <input type="email" id="email-icon" class="form-control"
                                                        name="email-id-icon" placeholder="Email" /> --}}
                                                    <select name="pilJenis" id="pilJenis" class="form-control">
                                                        <option value="--">Pilih Kategori</option>
                                                        @foreach ($kategori_harta as $row_kategori_harta)
                                                            <option value="{{$row_kategori_harta->Nomor_Perkiraan}}"> {{$row_kategori_harta->Nama}} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                {{-- Kategori Lanjutan --}}
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="menu"></i></span>
                                                    <select name="pilJenisPT" id="pilJenisPT" class="form-control">
                                                        <option value="--">Pilih Sub Kategori</option>
                                                        @foreach ($sub_kategori_harta as $row_sub_kategori_harta)
                                                        <option value="{{$row_sub_kategori_harta->ID}}"> {{$row_sub_kategori_harta->Nama}} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Section Additional Start --}}
                                    <div name="AF" id="AF">
                                        <div class="col-12" name="AF7" id="AF7" style="display: none;">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="txt_Tahun">Tahun</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="input-group input-group-merge">
                                                        <div class="input-group input-group-merge">
                                                            {{-- <span class="input-group-text"><i data-feather="feather"></i></span> --}}
                                                            <input type="text" id="txt_Tahun" class="form-control" name="txt_Tahun" placeholder="Tahun" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12" name="AF1" id="AF1" style="display: none;">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form- label" for="txt_Penerbit">Penerbit</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="input-group input-group-merge">
                                                        <div class="input-group input-group-merge">
                                                            {{-- <span class="input-group-text"><i data-feather="feather"></i></span> --}}
                                                            <input type="text" id="txt_Penerbit" class="form-control" name="txt_Penerbit"
                                                                placeholder="Penerbit" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12" name="AF2" id="AF2" style="display: none;">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form- label" for="txt_Jumlah">Jumlah</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="input-group input-group-merge">
                                                        <div class="input-group input-group-merge">
                                                            {{-- <span class="input-group-text"><i data-feather="feather"></i></span> --}}
                                                            <input type="text" id="txt_Jumlah" class="form-control" name="txt_Jumlah"
                                                                placeholder="Jumlah" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12" name="AF3" id="AF3" style="display: none;">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="txt_Luas">Luas M&sup2;</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="input-group input-group-merge">
                                                        <div class="input-group input-group-merge">
                                                            {{-- <span class="input-group-text"><i data-feather="feather"></i></span> --}}
                                                            <input type="text" id="txt_Luas" class="form-control" name="txt_Luas"
                                                                placeholder="Luas M&sup2;" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12" name="AF4" id="AF4" style="display: none;">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="txt_Lokasi">Lokasi</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="input-group input-group-merge">
                                                        <div class="input-group input-group-merge">
                                                            {{-- <span class="input-group-text"><i data-feather="feather"></i></span> --}}
                                                            <input type="text" id="txt_Lokasi" class="form-control" name="txt_Lokasi"
                                                                placeholder="Lokasi" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12" name="AF5" id="AF5" style="display: none;">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="txt_Merek">Merek</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="input-group input-group-merge">
                                                        <div class="input-group input-group-merge">
                                                            {{-- <span class="input-group-text"><i data-feather="feather"></i></span> --}}
                                                            <input type="text" id="txt_Merek" class="form-control" name="txt_Merek" placeholder="Merek" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12" name="AF6" id="AF6" style="display: none;">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="txt_Jenis">Jenis</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="input-group input-group-merge">
                                                        <div class="input-group input-group-merge">
                                                            {{-- <span class="input-group-text"><i data-feather="feather"></i></span> --}}
                                                            <input type="text" id="txt_Jenis" class="form-control" name="txt_Jenis" placeholder="Jenis" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12" name="AF8" id="AF8" style="display: none;">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="txt_Negara">Negara</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="input-group input-group-merge">
                                                        <div class="input-group input-group-merge">
                                                            {{-- <span class="input-group-text"><i data-feather="feather"></i></span> --}}
                                                            <input type="text" id="txt_Negara" class="form-control" name="txt_Negara"
                                                                placeholder="Negara" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12" name="AF9" id="AF9" style="display: none;">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="txt_NamaBank">Nama Bank</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="input-group input-group-merge">
                                                        <div class="input-group input-group-merge">
                                                            {{-- <span class="input-group-text"><i data-feather="feather"></i></span> --}}
                                                            <input type="text" id="txt_NamaBank" class="form-control" name="txt_NamaBank"
                                                                placeholder="Nama Bank" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12" name="AF10" id="AF10" style="display: none;">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="txt_NomorRekening">Nomor Rekening</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="input-group input-group-merge">
                                                        <div class="input-group input-group-merge">
                                                            {{-- <span class="input-group-text"><i data-feather="feather"></i></span> --}}
                                                            <input type="text" id="txt_NomorRekening" class="form-control" name="txt_NomorRekening"
                                                                placeholder="Nomor Rekening" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12" name="AF11" id="AF11" style="display: none;">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="txt_IdentitasPenerima">Identitas Penerima</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="input-group input-group-merge">
                                                        <span class="input-group-text"><i data-feather="edit-2"></i></span>
                                                        <input type="number" id="txt_IdentitasPenerima" class="form-control" name="txt_IdentitasPenerima"
                                                            placeholder="Identitas Penerima" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Section Additional End --}}
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="txtNilai">Nilai</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="edit-2"></i></span>
                                                    <input type="text" id="txtNilai" class="form-control"
                                                        name="txtNilai" placeholder="Nilai" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
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
                                    </div>
                                    <div class="col-sm-9 offset-sm-3">
                                        <button type="submit" name="btnSubmit"
                                            class="btn btn-primary me-1">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                    </div>
                                </div>
                            </form>
                            <br>
                            {{-- <strong style="background-color: yellow;">Mumpung inget</strong> <br>
                            <strong>Note : Tambah div notif kalau kosong apakah yakin tidak ada keterangan, kalau bank tambahin idr sama mata uang lain</strong> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Basic Floating Label Form section end -->


        <!-- Basic Aset Update Form section start -->
        <section id="edit-aset-column-form" name="edit-aset-column-form" style="display: none;">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" name="TitleAset" id="TitleAset">Edit Form Aset</h4>
                        </div>
                        <div class="card-body">
                            {{-- <form class="form form-horizontal" action="{{ URL::route('post_harta')}}" method="post"> --}}
                                {{-- <form action=""> --}}
                                {{-- @csrf --}}
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <input type="hidden" id="txt_paramID" class="form-control"
                                                        name="txt_paramID" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="edt_pilTanggal">Tanggal</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i
                                                            data-feather="calendar"></i></span>
                                                    <input type="date" id="edt_pilTanggal" class="form-control"
                                                        name="edt_pilTanggal" placeholder="Tanggal" value="<?php echo date("Y-m-d");?>"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="edt_pilJenis">Kategori</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="grid"></i></span>
                                                    {{-- <input type="email" id="email-icon" class="form-control"
                                                        name="email-id-icon" placeholder="Email" /> --}}
                                                    <select name="edt_pilJenis" id="edt_pilJenis" class="form-control">
                                                        <option value="--">Pilih Kategori</option>
                                                        @foreach ($kategori_harta as $row_kategori_harta)
                                                            <option value="{{$row_kategori_harta->Nomor_Perkiraan}}"> {{$row_kategori_harta->Nama}} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                {{-- Kategori Lanjutan --}}
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="menu"></i></span>
                                                    <select name="edt_pilJenisPT" id="edt_pilJenisPT" class="form-control">
                                                        <option value="--">Pilih Sub Kategori</option>
                                                        @foreach ($sub_kategori_harta as $row_sub_kategori_harta)
                                                        <option value="{{$row_sub_kategori_harta->ID}}"> {{$row_sub_kategori_harta->Nama}} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Section Additional Start --}}
                                    <div name="edt_AF" id="edt_AF">
                                        <div class="col-12" name="edt_AF7" id="edt_AF7" style="display: none;">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="txt_Tahun">Tahun</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="input-group input-group-merge">
                                                        <div class="input-group input-group-merge">
                                                            {{-- <span class="input-group-text"><i data-feather="feather"></i></span> --}}
                                                            <input type="text" id="edt_txt_Tahun" class="form-control" name="edt_txt_Tahun" placeholder="Tahun" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12" name="edt_AF1" id="edt_AF1" style="display: none;">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form- label" for="txt_Penerbit">Penerbit</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="input-group input-group-merge">
                                                        <div class="input-group input-group-merge">
                                                            {{-- <span class="input-group-text"><i data-feather="feather"></i></span> --}}
                                                            <input type="text" id="edt_txt_Penerbit" class="form-control" name="edt_txt_Penerbit"
                                                                placeholder="Penerbit" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12" name="edt_AF2" id="edt_AF2" style="display: none;">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form- label" for="txt_Jumlah">Jumlah</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="input-group input-group-merge">
                                                        <div class="input-group input-group-merge">
                                                            {{-- <span class="input-group-text"><i data-feather="feather"></i></span> --}}
                                                            <input type="text" id="edt_txt_Jumlah" class="form-control" name="edt_txt_Jumlah"
                                                                placeholder="Jumlah" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12" name="edt_AF3" id="edt_AF3" style="display: none;">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="txt_Luas">Luas M&sup2;</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="input-group input-group-merge">
                                                        <div class="input-group input-group-merge">
                                                            {{-- <span class="input-group-text"><i data-feather="feather"></i></span> --}}
                                                            <input type="text" id="edt_txt_Luas" class="form-control" name="edt_txt_Luas"
                                                                placeholder="Luas M&sup2;" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12" name="edt_AF4" id="edt_AF4" style="display: none;">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="txt_Lokasi">Lokasi</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="input-group input-group-merge">
                                                        <div class="input-group input-group-merge">
                                                            {{-- <span class="input-group-text"><i data-feather="feather"></i></span> --}}
                                                            <input type="text" id="edt_txt_Lokasi" class="form-control" name="edt_txt_Lokasi"
                                                                placeholder="Lokasi" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12" name="edt_AF5" id="edt_AF5" style="display: none;">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="txt_Merek">Merek</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="input-group input-group-merge">
                                                        <div class="input-group input-group-merge">
                                                            {{-- <span class="input-group-text"><i data-feather="feather"></i></span> --}}
                                                            <input type="text" id="edt_txt_Merek" class="form-control" name="edt_txt_Merek" placeholder="Merek" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12" name="edt_AF6" id="edt_AF6" style="display: none;">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="txt_Jenis">Jenis</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="input-group input-group-merge">
                                                        <div class="input-group input-group-merge">
                                                            {{-- <span class="input-group-text"><i data-feather="feather"></i></span> --}}
                                                            <input type="text" id="edt_txt_Jenis" class="form-control" name="edt_txt_Jenis" placeholder="Jenis" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12" name="edt_AF8" id="edt_AF8" style="display: none;">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="txt_Negara">Negara</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="input-group input-group-merge">
                                                        <div class="input-group input-group-merge">
                                                            {{-- <span class="input-group-text"><i data-feather="feather"></i></span> --}}
                                                            <input type="text" id="edt_txt_Negara" class="form-control" name="edt_txt_Negara"
                                                                placeholder="Negara" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12" name="edt_AF9" id="edt_AF9" style="display: none;">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="txt_NamaBank">Nama Bank</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="input-group input-group-merge">
                                                        <div class="input-group input-group-merge">
                                                            {{-- <span class="input-group-text"><i data-feather="feather"></i></span> --}}
                                                            <input type="text" id="edt_txt_NamaBank" class="form-control" name="edt_txt_NamaBank"
                                                                placeholder="Nama Bank" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12" name="edt_AF10" id="edt_AF10" style="display: none;">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="txt_NomorRekening">Nomor Rekening</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="input-group input-group-merge">
                                                        <div class="input-group input-group-merge">
                                                            {{-- <span class="input-group-text"><i data-feather="feather"></i></span> --}}
                                                            <input type="text" id="edt_txt_NomorRekening" class="form-control" name="edt_txt_NomorRekening"
                                                                placeholder="Nomor Rekening" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12" name="edt_AF11" id="edt_AF11" style="display: none;">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="txt_IdentitasPenerima">Identitas Penerima</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="input-group input-group-merge">
                                                        <span class="input-group-text"><i data-feather="edit-2"></i></span>
                                                        <input type="number" id="edt_txt_IdentitasPenerima" class="form-control" name="edt_txt_IdentitasPenerima"
                                                            placeholder="Identitas Penerima" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Section Additional End --}}
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="edt_txtNilai">Nilai</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="edit-2"></i></span>
                                                    <input type="text" id="edt_txtNilai" class="form-control"
                                                        name="edt_txtNilai" placeholder="Nilai" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="edt_txt_Keterangan">Keterangan</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="feather"></i></span>
                                                    <input type="text" id="edt_txt_Keterangan" class="form-control"
                                                        name="edt_txt_Keterangan" placeholder="Keterangan" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-9 offset-sm-3">
                                        <button type="submit" name="btnEdit" class="btn btn-primary me-1" onclick="UpdateAset()">Edit</button>
                                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                    </div>
                                </div>
                            {{-- </form> --}}
                            <br>
                            <strong style="background-color: yellow;">Mumpung inget</strong> <br>
                            <strong>Note : Tambah div notif kalau kosong apakah yakin tidak ada keterangan, kalau bank tambahin idr sama mata uang lain, update delete belum dikerjain, separator juga belum</strong>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Basic Floating Label Update Form section end -->

        <!-- Datatable Start-->
        <div class="row" id="table-hover-row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Riwayat Aset</h4>
                        <div>
                            <form action="{{ URL::route('create_aset_pdf')}}" method="post">
                                @csrf
                                <input type="date" name="pilStart" id="pilStart">
                                <input type="date" name="pilEnd" id="pilEnd">
                                <button class="btn btn-secondary me-1" name="btnCetak" id="btnCetak" onclick="cetak_PDF()">Cetak PDF</button>
                            </form>
                            <button class="btn btn-primary me-1" name="btnFilter" id="btnFilter" onclick="filter_data()">Filter</button>
                            <button type="reset" class="btn btn-outline-secondary" name="btnReset" id="btnReset"
                                onclick="show_datatable()">Reset</button>
                        </div>
                    </div>
                    <div class="card-body">
                        {{-- <p class="card-text">Datatable</p> --}}

                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-hover" style="width:100%;">
                                <thead>
                                    <tr>
                                        <td>Tanggal</td>
                                        <td>Kategori</td>
                                        <td>Sub Kategori</td>
                                        <td>Jumlah</td>
                                        <td>Tahun</td>
                                        <td>Keterangan</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                {{-- <tfoot>
                                    <tr>
                                        <td>No</td>
                                        <td>Tanggal</td>
                                        <td>Kategori</td>
                                        <td>Sub Kategori</td>
                                        <td>Tahun</td>
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

    var table = null;
    $(document).ready(function() {
        // alert('load');

        $("#pilJenisPT").attr('disabled', true);
        show_datatable();

        // alert('masuk');
    });

    function show_datatable()
    {
        tabel = $('#example').DataTable({
            "destroy":true,
            "processing": true,
            // "serverSide": true,
            "responsive": true,
            "ordering": true, // Set true agar bisa di sorting
            "order": [[ 0, 'desc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
            "ajax":
            {
                "url": myurl + '/aset_datatable',
                "type": "GET"
            },
            columnDefs: [
                {
                    targets: [3],
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
            ],
            "drawCallback": function( settings ) {
                feather.replace({
                width: 14,
                height: 14
                });
            }
        });
    }


    function filter_data()
    {
        var tgl_start = $("#pilStart").val();
        var tgl_end = $("#pilEnd").val();
        // $.session.set('tgl_start', tgl_start);
        // $.session.set('tgl_end', tgl_end);
        alert('masuk');

        if(tgl_start == "" || tgl_end == "")
        {
            alert("Silahkan mengisi tanggal terlebih dahulu");
        }
        else{
            // tgl_start = '2021-01-01';
            // tgl_end = '2022-06-30';
            $("#example").dataTable().fnDestroy();
            var tabel = $('#example').DataTable({
                "processing": true,
                // "serverSide": true,
                "responsive": true,
                "ordering": true, // Set true agar bisa di sorting
                "order": [[ 0, 'desc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
                "ajax":
                {
                    "url": myurl + '/aset_datatable_param' + '/' + tgl_start + '/' + tgl_end,
                    "type": "GET",
                },
                columnDefs: [
                    {
                        targets: [2],
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
                ],
                "drawCallback": function( settings ) {
                    feather.replace({
                    width: 14,
                    height: 14
                    });
                }
            });
        }
        alert('selesai');
    }

    function change_sub_harta(lemp_id)
    {
        $.ajax({
            type: 'POST',
            url: myurl + '/CB_Sub_Harta',
            data: {Sub_Harta: lemp_id},
            cache: false,
            success: function(msg){
                // alert("msg : " + msg);
                $("#pilJenisPT").html(msg);
            }
        });
    }

    function change_edt_sub_harta(lemp_id)
    {
        $.ajax({
            type: 'POST',
            url: myurl + '/CB_Sub_Harta',
            data: {Sub_Harta: lemp_id},
            cache: false,
            success: function(msg){
                // alert("msg : " + msg);
                $("#edt_pilJenisPT").html(msg);
            }
        });
    }

    function reset_additional()
    {
        $("#AF1").css("display", "none");
        $("#AF2").css("display", "none");
        $("#AF3").css("display", "none");
        $("#AF4").css("display", "none");
        $("#AF5").css("display", "none");
        $("#AF6").css("display", "none");
        $("#AF7").css("display", "none");
        $("#AF8").css("display", "none");
        $("#AF9").css("display", "none");
        $("#AF10").css("display", "none");
        $("#AF11").css("display", "none");
    }

    function reset_additional_edt()
    {
        $("#edt_AF1").css("display", "none");
        $("#edt_AF2").css("display", "none");
        $("#edt_AF3").css("display", "none");
        $("#edt_AF4").css("display", "none");
        $("#edt_AF5").css("display", "none");
        $("#edt_AF6").css("display", "none");
        $("#edt_AF7").css("display", "none");
        $("#edt_AF8").css("display", "none");
        $("#edt_AF9").css("display", "none");
        $("#edt_AF10").css("display", "none");
        $("#edt_AF11").css("display", "none");
    }


    $('#pilJenis').on('change', function (e) {
        // var optionSelected = $("option:selected", this);
        // var valueSelected = this.value;

        var optionSelected = $(this).find("option:selected");
        var valueSelected = optionSelected.val();
        var textSelected = optionSelected.text();
        // alert("pilih besar : " + textSelected + " | " + valueSelected);

        $param_sub_harta = valueSelected;
        // alert("nilai " + $param_sub_harta);
        reset_additional();
        // if($param_sub_harta == 0)
        // {
        //     alert('sini');
        //     $("#pilJenisPT").attr('disabled', true);
        //     $("#AF").css("display", "none");
        // }
        if($param_sub_harta == "--")
        {
            $("#pilJenisPT").val('--');
            // $("#pilJenisPT option:first").prop("selected", "selected");
            $("#pilJenisPT").attr('disabled', true);
            // $("#AF").css("display", "none");
        }
        else
        {
            $("#pilJenisPT").attr('disabled', false);
            change_sub_harta($param_sub_harta);
        }

    });

    $('#edt_pilJenis').on('change', function (e) {
        // var optionSelected = $("option:selected", this);
        // var valueSelected = this.value;

        var optionSelected = $(this).find("option:selected");
        var valueSelected = optionSelected.val();
        var textSelected = optionSelected.text();
        // alert("pilih besar : " + textSelected + " | " + valueSelected);

        $param_sub_harta = valueSelected;
        // alert("nilai " + $param_sub_harta);
        reset_additional_edt();
        if($param_sub_harta == "--")
        {
            $("#edt_pilJenisPT").val('--');
            // $("#pilJenisPT option:first").prop("selected", "selected");
            $("#edt_pilJenisPT").attr('disabled', true);
            // $("#AF").css("display", "none");

        }
        else
        {
            $("#edt_pilJenisPT").attr('disabled', false);
            change_edt_sub_harta($param_sub_harta);
        }

    });

    $('#pilJenisPT').on('change', function (e) {
        // alert('masuk reset dulu');
        reset_additional();
        // alert('selesai reset');
        var optionSelected = $(this).find("option:selected");
        var valueSelected = optionSelected.val();
        var textSelected = optionSelected.text();
        var subSelected = valueSelected.substring(5);
        // alert("pilih : " + textSelected + " | " + valueSelected + " | " + valueSelected.substring(5));

        // $temp_subcoa = valueSelected;
        // $("#tempPilSubHT").val($temp_subcoa);
        // additional_field($temp_subcoa);

        // KAS DAN SETARA KAS
        if(subSelected == 11 || subSelected == 19 )
        {
            // alert('masuk');
            $("#AF7").css("display", "block");
        }
        else if(subSelected == 12 || subSelected == 13 || subSelected == 14)
        {
            // alert('masuk 1');
            $("#AF7").css("display", "block");
            //
            $("#AF8").css("display", "block");
            $("#AF9").css("display", "block");
            $("#AF10").css("display", "block");
        }
        // PIUTANG
        else if(subSelected == 21 || subSelected == 22 || subSelected == 29)
        {
            // alert('masuk 2');
            $("#AF7").css("display", "block");
            //
            $("#AF11").css("display", "block");
        }
        // INVESTASI
        else if(subSelected == 31 || subSelected == 32 || subSelected == 33 || subSelected == 34 || subSelected == 35 || subSelected == 36)
        {
            // alert('masuk 3');
            $("#AF1").css("display", "block");
            $("#AF2").css("display", "block");
            //
            $("#AF7").css("display", "block");
        }
        // ALAT TRANSPORTASI
        else if(subSelected == 41 || subSelected == 42 || subSelected == 43 || subSelected == 49)
        {
            // alert('masuk 4');
            $("#AF5").css("display", "block");
            $("#AF6").css("display", "block");
            $("#AF7").css("display", "block");
        }
        else if(subSelected == 54)
        {
            // alert('masuk 5');
            $("#AF5").css("display", "block");
            $("#AF6").css("display", "block");
            $("#AF7").css("display", "block");
        }
        // HARTA TIDAK BERGERAK
        else if(subSelected == 61 || subSelected == 62 || subSelected == 63)
        {
            // alert('masuk 6');
            $("#AF3").css("display", "block");
            $("#AF4").css("display", "block");
            //
            $("#AF7").css("display", "block");
        }
        //LAINNYA
        else if(subSelected == 39 || subSelected == 51 || subSelected == 52 || subSelected == 53 || subSelected == 55 || subSelected == 59 || subSelected == 69)
        {
            $("#AF7").css("display", "block");
        }
        // else
        // {
        //     // alert('reset');
        //     reset_additional();
        // }
    });

    $('#edt_pilJenisPT').on('change', function (e) {
        // alert('masuk reset dulu');
        reset_additional_edt();
        // alert('selesai reset');
        var optionSelected = $(this).find("option:selected");
        var valueSelected = optionSelected.val();
        var textSelected = optionSelected.text();
        var subSelected = valueSelected.substring(5);
        // alert("pilih : " + textSelected + " | " + valueSelected + " | " + valueSelected.substring(5));

        // $temp_subcoa = valueSelected;
        // $("#tempPilSubHT").val($temp_subcoa);
        // additional_field($temp_subcoa);

        // KAS DAN SETARA KAS
        if(subSelected == 11 || subSelected == 19 )
        {
            // alert('masuk');
            $("#edt_AF7").css("display", "block");
        }
        else if(subSelected == 12 || subSelected == 13 || subSelected == 14)
        {
            // alert('masuk 1');
            $("#edt_AF7").css("display", "block");
            //
            $("#edt_AF8").css("display", "block");
            $("#edt_AF9").css("display", "block");
            $("#edt_AF10").css("display", "block");
        }
        // PIUTANG
        else if(subSelected == 21 || subSelected == 22 || subSelected == 29)
        {
            // alert('masuk 2');
            $("#edt_AF7").css("display", "block");
            //
            $("#edt_AF11").css("display", "block");
        }
        // INVESTASI
        else if(subSelected == 31 || subSelected == 32 || subSelected == 33 || subSelected == 34 || subSelected == 35 || subSelected == 36)
        {
            // alert('masuk 3');
            $("#edt_AF1").css("display", "block");
            $("#edt_AF2").css("display", "block");
            //
            $("#edt_AF7").css("display", "block");
        }
        // ALAT TRANSPORTASI
        else if(subSelected == 41 || subSelected == 42 || subSelected == 43 || subSelected == 49)
        {
            // alert('masuk 4');
            $("#edt_AF5").css("display", "block");
            $("#edt_AF6").css("display", "block");
            $("#edt_AF7").css("display", "block");
        }
        // HARTA BERGERAK LAINNYA
        else if(subSelected == 54)
        {
            // alert('masuk 5');
            $("#edt_AF5").css("display", "block");
            $("#edt_AF6").css("display", "block");
            $("#edt_AF7").css("display", "block");
        }
        // HARTA TIDAK BERGERAK
        else if(subSelected == 61 || subSelected == 62 || subSelected == 63)
        {
            // alert('masuk 6');
            $("#edt_AF3").css("display", "block");
            $("#edt_AF4").css("display", "block");
            //
            $("#edt_AF7").css("display", "block");
        }
        //LAINNYA
        else if(subSelected == 39 || subSelected == 51 || subSelected == 52 || subSelected == 53 || subSelected == 55 || subSelected == 59 || subSelected == 69)
        {
            $("#edt_AF7").css("display", "block");
        }
        // else
        // {
        //     alert('reset');
        //     reset_additional();
        // }
    });

    $("#txtNilai").on({
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

    $("#edt_txtNilai").on({
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

    function EditAset(paramedit)
    {
        alert('edit : ' + paramedit);
        $("#aset-column-form").css("display", "none");
        $("#edit-aset-column-form").css("display", "block");

        $("#edt_pilJenisPT").attr('disabled', true);

        $.ajax({
            type: 'POST',
            url: myurl + '/show_edit_aset',
            data: {idparam: paramedit},
            cache: false,
            success: function(msg){
                alert('pesan : ' + msg);
                Check_Editing_Form(msg.KategoriHarta, msg.KategoriSubHarta);

                Check_Editing_Form_Detail(msg.KategoriSubHarta);
                Fill_Editing_Form_Detail(msg.lemp_AF7, msg.lemp_AF1, msg.lemp_AF2, msg.lemp_AF3, msg.lemp_AF4, msg.lemp_AF5, msg.lemp_AF6, msg.lemp_AF8, msg.lemp_AF9, msg.lemp_AF10, msg.lemp_AF11);
                $("#txt_paramID").val(msg.id);
                $("#edt_pilTanggal").val(msg.Tanggal);
                $("#edt_pilJenis").val(msg.KategoriHarta);
                // $("#edt_pilJenisPT").val(msg.KategoriSubHarta);
                $("#edt_txtNilai").val(msg.Nilai);
                $("#edt_txt_Keterangan").val(msg.Keterangan);
            },
            error: function(result) {
                alert('error');
            }
        });

        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function Check_Editing_Form(lemp_id,lemp_isian_sub)
    {
        $.ajax({
            type: 'POST',
            url: myurl + '/CB_Sub_Harta',
            data: {Sub_Harta: lemp_id},
            cache: false,
            success: function(msg){
                // alert("msg : " + msg);
                $("#edt_pilJenisPT").html(msg);
                $("#edt_pilJenisPT").val(lemp_isian_sub);
            }
        });
        $("#edt_pilJenisPT").attr('disabled', false);
        alert('selesai');
    }

    function Fill_Editing_Form_Detail(lemp_A7,lemp_A1,lemp_A2,lemp_A3,lemp_A4,lemp_A5,lemp_A6,lemp_A8,lemp_A9,lemp_A10,lemp_A11)
    {
        // alert("lemparaaan : " + lemp_A7 + "|" + lemp_A1+ "|" +lemp_A2+ "|" +lemp_A3+ "|" +lemp_A4+ "|" +lemp_A5+ "|" +lemp_A6+ "|" +lemp_A8+ "|" +lemp_A9+ "|" +lemp_A10+ "|" +lemp_A11+ "|");
        $("#edt_txt_Tahun").val(lemp_A7);
        $("#edt_txt_Penerbit").val(lemp_A1);
        $("#edt_txt_Jumlah").val(lemp_A2);
        $("#edt_txt_Luas").val(lemp_A3);
        $("#edt_txt_Lokasi").val(lemp_A4);
        $("#edt_txt_Merek").val(lemp_A5);
        $("#edt_txt_Jenis").val(lemp_A6);
        $("#edt_txt_Negara").val(lemp_A8);
        $("#edt_txt_NamaBank").val(lemp_A9);
        $("#edt_txt_NomorRekening").val(lemp_A10);
        $("#edt_txt_IdentitasPenerima").val(lemp_A11);
    }

    function Check_Editing_Form_Detail(lemp_pilih)
    {
        var subSelected = lemp_pilih.toString().substring(5);
        // alert('hasil : ' + subSelected);

        // KAS DAN SETARA KAS
        if(subSelected == 11 || subSelected == 19 )
        {
            // alert('masuk');
            $("#edt_AF7").css("display", "block");
        }
        else if(subSelected == 12 || subSelected == 13 || subSelected == 14)
        {
            // alert('masuk 1');
            $("#edt_AF7").css("display", "block");
            //
            $("#edt_AF8").css("display", "block");
            $("#edt_AF9").css("display", "block");
            $("#edt_AF10").css("display", "block");
        }
        // PIUTANG
        else if(subSelected == 21 || subSelected == 22 || subSelected == 29)
        {
            // alert('masuk 2');
            $("#edt_AF7").css("display", "block");
            //
            $("#edt_AF11").css("display", "block");
        }
        // INVESTASI
        else if(subSelected == 31 || subSelected == 32 || subSelected == 33 || subSelected == 34 || subSelected == 35 || subSelected == 36)
        {
            // alert('masuk 3');
            $("#edt_AF1").css("display", "block");
            $("#edt_AF2").css("display", "block");
            //
            $("#edt_AF7").css("display", "block");
        }
        // ALAT TRANSPORTASI
        else if(subSelected == 41 || subSelected == 42 || subSelected == 43 || subSelected == 49)
        {
            // alert('masuk 4');
            $("#edt_AF5").css("display", "block");
            $("#edt_AF6").css("display", "block");
            $("#edt_AF7").css("display", "block");
        }
        // HARTA BERGERAK LAINNYA
        else if(subSelected == 54)
        {
            // alert('masuk 5');
            $("#edt_AF5").css("display", "block");
            $("#edt_AF6").css("display", "block");
            $("#edt_AF7").css("display", "block");
        }
        // HARTA TIDAK BERGERAK
        else if(subSelected == 61 || subSelected == 62 || subSelected == 63)
        {
            // alert('masuk 6');
            $("#edt_AF3").css("display", "block");
            $("#edt_AF4").css("display", "block");
            //
            $("#edt_AF7").css("display", "block");
        }
        //LAINNYA
        else if(subSelected == 39 || subSelected == 51 || subSelected == 52 || subSelected == 53 || subSelected == 55 || subSelected == 59 || subSelected == 69)
        {
            $("#edt_AF7").css("display", "block");
        }
    }

    function UpdateAset()
    {
        var data = window.confirm("Apakah yakin akan mengupdate ?");
        if(data == true)
        {
            var new_paramID = $('#txt_paramID').val();
            var new_tanggal = $("#edt_pilTanggal").val();
            var new_piljenis = $("#edt_pilJenis").val();
            var new_piljenispt = $("#edt_pilJenisPT").val();
            var new_nilai = $("#edt_txtNilai").val();
            var new_keterangan = $("#edt_txt_Keterangan").val();
            var new_penerbit = $("#edt_txt_Penerbit").val();
            var new_jumlah = $("#edt_txt_Jumlah").val();
            var new_luas = $("#edt_txt_Luas").val();
            var new_lokasi = $("#edt_txt_Lokasi").val();
            var new_merek = $("#edt_txt_Merek").val();
            var new_jenis = $("#edt_txt_Jenis").val();
            var new_tahun = $("#edt_txt_Tahun").val();
            var new_negara = $("#edt_txt_Negara").val();
            var new_namabank = $("#edt_txt_NamaBank").val();
            var new_nomorrekening = $("#edt_txt_NomorRekening").val();
            var new_identitaspenerima = $("#edt_txt_IdentitasPenerima").val();

            $.ajax({
                type: 'POST',
                url: myurl + '/post_edit_aset',
                data: {
                    param_new_paramID : new_paramID,
                    param_new_tanggal : new_tanggal,
                    param_new_piljenis : new_piljenis,
                    param_new_piljenispt : new_piljenispt,
                    param_new_nilai : new_nilai,
                    param_new_keterangan : new_keterangan,
                    param_new_penerbit : new_penerbit,
                    param_new_jumlah : new_jumlah,
                    param_new_luas : new_luas,
                    param_new_lokasi : new_lokasi,
                    param_new_merek : new_merek,
                    param_new_jenis : new_jenis,
                    param_new_tahun : new_tahun,
                    param_new_negara : new_negara,
                    param_new_namabank : new_namabank,
                    param_new_nomorrekening : new_nomorrekening,
                    param_new_identitaspenerima : new_identitaspenerima,
                },
                cache: false,
                success: function (msg) {
                    alert('pesan : ' + msg);
                    document.location.reload(true);
                    alert('sukses update');
                },
                error: function (result) {
                    alert('error');
                }
            });
        }
        else if(data == false)
        {
            alert("tidak jadi");
        }
    }

    function DeleteAset(paramdelete)
    {
        alert('delete : ' + paramdelete);
        var data = window.confirm("Apakah yakin akan menghapus : " + paramdelete + " ?");
        if(data == true)
        {
            // alert("hapus");
            $.ajax({
                type: 'POST',
                url: myurl + '/post_delete_aset',
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
