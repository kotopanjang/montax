@extends('master-blade.master')

@section('konten_bar')
@include('master-blade.leftbar.bar_aset')
@endsection

@section('konten_header')
ini header aset
@endsection

@section('konten_body')


<div class="content-wrapper container-xxl p-0">
    <div class="content-body">

        <!-- Basic Aset Form section start -->
        <section id="aset-column-form" name="aset-column-form">
            <div class="row">
                <div class="col-12">

                    <div class="card text-center">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="true" href="#">Active</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="true" href="#">aaaa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled">Disabled</a>
                            </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Special title treatment</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                    <!-- <div class="card">
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
                            <strong style="background-color: yellow;">Mumpung inget</strong> <br>
                            <strong>Note : Tambah div notif kalau kosong apakah yakin tidak ada keterangan, kalau bank tambahin idr sama mata uang lain, update delete belum dikerjain, separator juga belum</strong>
                        </div>
                    </div> -->
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
                            <h4 class="card-title">Edit Form Aset</h4>
                        </div>
                        <div class="card-body">
                            {{-- <form class="form form-horizontal" action="{{ URL::route('post_edit_pemasukan')}}"
                                method="post"> --}}
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
                                                        name="edt_pilTanggal" />
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
                                                        <option value="1">Penghasilan Utama</option>
                                                        <option value="2">Penghasilan Tambahan</option>
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
                                                    <select name="edt_pilJenisPT" id="edt_pilJenisPT"
                                                        class="form-control">
                                                        <option value="--">Pilih Kategori</option>
                                                        {{-- @foreach ($sub_coa as $rowsubcoa)
                                                        <option value="{{$rowsubcoa->ID}}">{{$rowsubcoa->Nama}}</option>
                                                        @endforeach --}}
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="edt_txtJumlah">Jumlah</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="edit-2"></i></span>
                                                    <input type="text" id="edt_txtJumlah" class="form-control"
                                                        name="edt_txtJumlah" placeholder="Jumlah" required />
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
                                                    <input type="text" id="edt_txt_Keterangan" class="form-control"
                                                        name="edt_txt_Keterangan" placeholder="Keterangan" />
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
                                                    <select name="edt_pilSumberDana" id="edt_pilSumberDana"
                                                        class="form-control">
                                                        {{-- @foreach ($sumberdana_wp as $row_sumberdana_wp)
                                                        <option value="{{$row_sumberdana_wp->ID_Record}}">
                                                            {{$row_sumberdana_wp->Jenis}} |
                                                            {{$row_sumberdana_wp->Inisial}}</option>
                                                        @endforeach --}}
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-9 offset-sm-3">
                                        <button type="submit" name="btnEdit" class="btn btn-primary me-1"
                                            onclick="UpdatePemasukan()">Edit</button>
                                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                    </div>
                                </div>
                                {{--
                            </form> --}}
                            <br>
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

        tabel = $('#example').DataTable({
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
        // alert('masuk');
    });


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
        if($param_sub_harta == 0)
        {
            $("#pilJenisPT").attr('disabled', true);
            $("#AF").css("display", "none");
        }
        else if($param_sub_harta == "--")
        {
            $("#pilJenisPT").val('--');
            $("#pilJenisPT").attr('disabled', true);
            $("#AF").css("display", "none");
        }
        else
        {
            $("#pilJenisPT").attr('disabled', false);
            change_sub_harta($param_sub_harta);
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
        // HARTA BERGERAK LAINNYA
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
        // else
        // {
        //     // alert('reset');
        //     reset_additional();
        // }
    });

</script>

@endsection
