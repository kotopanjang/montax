@extends('master-blade.master')

@section('konten_bar')
@include('master-blade.leftbar.bar_pengeluaran')
@endsection

@section('konten_header')
{{-- ini header pengeluaran --}}
@endsection

@section('konten_body')
<div class="row match-height">

    <!-- Pengeluaran Card -->
    <div class="col-xl-8 col-md-6 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Pengeluaran</h4>
                <div class="d-flex align-items-center">
                    <p class="card-text font-small-2 me-25 mb-0">Updated 1 month ago</p>
                </div>
            </div>
            <div class="card-body">
                <div class="row">

                    <!-- Basic Pengeluaran Form section start -->
                    <section id="pengeluaran-column-form">
                        <div class="row">
                            <div class="col-12">

                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Form Pengeluaran</h4>
                                    </div>
                                    <div class="card-body">
                                        <form class="form form-horizontal" action="{{ URL::route('post_pengeluaran')}}" method="post">
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
                                                                <span class="input-group-text"><i data-feather="calendar"></i></span>
                                                                <input type="date" id="pilTanggal" class="form-control" name="pilTanggal"
                                                                    placeholder="Tanggal" value="<?php echo date("Y-m-d");?>"/>
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
                                                                <select name="pilJenisPengeluaran" id="pilJenisPengeluaran"
                                                                    class="form-control">
                                                                    <option value="--">Pilih Kategori</option>
                                                                    @foreach ($coa as $rowcoa)
                                                                    <option value="{{$rowcoa->Nomor_Perkiraan}}">{{$rowcoa->Nama}}</option>
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
                                                                <select name="pilJenisSubPengeluaran" id="pilJenisSubPengeluaran"
                                                                    class="form-control">
                                                                    <option value="--">Pilih Sub Kategori</option>
                                                                </select>
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
                                                                <input type="text" id="txtJumlah" class="form-control" name="txtJumlah"
                                                                    placeholder="Jumlah" />
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
                                                <div class="col-12">
                                                    <div class="mb-1 row">
                                                        <div class="col-sm-3">
                                                            <label class="col-form-label" for="pilSumberDana">Sumber Dana</label>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <div class="input-group input-group-merge">
                                                                <select name="pilSumberDana" id="pilSumberDana" class="form-control">
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
                                                    <button type="submit" class="btn btn-primary me-1">Submit</button>
                                                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                                </div>
                                            </div>
                                        </form>
                                        <br>
                                        {{-- <strong style="background-color: yellow;">Mumpung inget</strong> <br>
                                        <strong>Note : Tambah div notif, Tambah pengecekan masukan kosong, tambah pengecekan
                                            klo tanggal nggak lengkap, tambah thousand separator live</strong>
                                            <br>
                                        <b style="background-color: orange;">Penting:</b>
                                        <ul>
                                            <li>kasi pengetahuan apabila pengeluaran melebihi dana</li>
                                        </ul> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Basic Pengeluaran Form section end -->

                    <!-- Basic Edit Pengeluaran Form section start -->
                    <section id="edit-pengeluaran-column-form" name="edit-pengeluaran-column-form" style="display: none;">
                        <div class="row">
                            <div class="col-12">

                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Edit Form Pengeluaran</h4>
                                    </div>
                                    <div class="card-body">
                                        {{-- <form class="form form-horizontal" action="{{ URL::route('post_edit_pengeluaran')}}" method="post"> --}}
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
                                                            <label class="col-form-label" for="pilTanggal">Tanggal</label>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <div class="input-group input-group-merge">
                                                                <span class="input-group-text"><i data-feather="calendar"></i></span>
                                                                <input type="date" id="edt_pilTanggal" class="form-control"
                                                                    name="edt_pilTanggal" placeholder="Tanggal" value="" />
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
                                                                <select name="edt_pilJenisPengeluaran" id="edt_pilJenisPengeluaran"
                                                                    class="form-control">
                                                                    <option value="--">Pilih Kategori</option>
                                                                    @foreach ($coa as $rowcoa)
                                                                    <option value="{{$rowcoa->Nomor_Perkiraan}}">{{$rowcoa->Nama}}</option>
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
                                                                <select name="edt_pilJenisSubPengeluaran" id="edt_pilJenisSubPengeluaran"
                                                                    class="form-control">
                                                                    <option value="--">Pilih Sub Kategori</option>
                                                                </select>
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
                                                                <input type="text" id="edt_txtJumlah" class="form-control"
                                                                    name="edt_txtJumlah" placeholder="Jumlah" />
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
                                                    <button type="submit" class="btn btn-primary me-1" onclick="UpdatePengeluaran()">Update</button>
                                                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                                </div>
                                            </div>
                                        {{-- </form> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Basic Edit Pengeluaran Form section end -->


                </div>
            </div>
        </div>
    </div>
    <!--/ Pengeluaran Card -->

    <!-- Additional Pengeluaran Card -->
    <div class="col-xl-4 col-md-6 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Additional Pengeluaran</h4>
            </div>
            <div class="card-body">
                {{-- <form method="post" action="{{ URL::route('Add_Pengeluaran')}}"> --}}
                <form action="post">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-4">
                                    <label class="col-form-label" for="pilJenis">Kategori</label>
                                </div>
                                <div class="col-sm-8">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="grid"></i></span>
                                        <select name="custom_pilJenisPengeluaran" id="custom_pilJenisPengeluaran" class="form-control">
                                            <option value="--">Pilih Kategori</option>
                                            @foreach ($coa as $rowcoa)
                                            <option value="{{$rowcoa->Nomor_Perkiraan}}">{{$rowcoa->Nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-4">
                                    <label class="col-form-label" for="SubKategori">Sub Kategori</label>
                                </div>
                                <div class="col-sm-8">
                                    <div class="input-group input-group-merge">
                                        {{-- <span class="input-group-text"><i data-feather="menu"></i></span> --}}
                                        <div id="SubYangAda" name="SubYangAda"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-4">
                                    <label class="col-form-label" for="txt_custom_category">Sub Kategori Baru</label>
                                </div>
                                <div class="col-sm-8">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="feather"></i></span>
                                        <input type="text" id="txt_custom_category" class="form-control" name="txt_custom_category"
                                            placeholder="Nama Sub Kategori Baru" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8 offset-sm-4">
                            <button type="reset" class="btn btn-outline-secondary">Reset</button>
                            <button type="submit" class="btn btn-primary me-1">Submit</button>
                        </div>
                    </div>
                </form>
                <div>
                    <b style="background-color: yellow;">Mumpung inget:</b>
                    <ul>
                        <li>tambah message belum ada custom ketika belum ada customize</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--/ Additional Pengeluaran Card -->

    <!-- Datatable Start-->
    <div class="col-xl-12 col-md-12 col-12">
        <div class="row" id="table-hover-row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Riwayat Pengeluaran</h4>
                        <div>
                            <form action="{{ URL::route('create_pengeluaran_pdf')}}" method="post">
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
                                        <td>Sub-Kategori</td>
                                        <td>Jumlah</td>
                                        <td>Sumber Dana</td>
                                        <td>Keterangan</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                {{-- <tfoot>
                                    <tr>
                                        <td>Tanggal</td>
                                        <td>Kategori</td>
                                        <td>Sub-Kategori</td>
                                        <td>Jumlah</td>
                                        <td>Sumber Dana</td>
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
    </div>
    <!-- Datatable End-->
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/plug-ins/1.11.5/dataRender/datetime.js"></script>
<script>
    var myurl = "<?php echo URL::to('/'); ?>";
    // alert ("url : " + myurl);
    $(document).ready(function (){
        $("#pilJenisSubPengeluaran").attr('disabled', true);

        show_datatable();
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
                "url": myurl + '/pengeluaran_datatable',
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
                    "url": myurl + '/pengeluaran_datatable_param' + '/' + tgl_start + '/' + tgl_end,
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

    //Live Thousand Separator
     $("#txtJumlah").on({
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
    $("#edt_txtJumlah").on({
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

    //Combobox Card Add Custom Pengeluaran 'POSISI KANAN'
    //Fungsi : kalau dipilih, akan ditampilkan data anakannya
    $('#custom_pilJenisPengeluaran').on('change', function (e) {
        var optionSelected = $(this).find("option:selected");
        var valueSelected = optionSelected.val();
        var textSelected = optionSelected.text();
        // alert("pilih : " + textSelected + " | " + valueSelected);

        $.ajax({
            type: 'POST',
            url: myurl + '/Custom_Sub_Pengeluaran',
            data: {COA_Pengeluaran: valueSelected},
            cache: false,
            success: function(msg){
                // alert("msg : " + msg);
                $("#SubYangAda").html(msg);
                // $("#pilJenisSubPengeluaran").val($("#pilJenisSubPengeluaran").val());
            }
        });

    });

    //Combobox Main Form Pengeluaran
    //Ketika dipilih akan mengubah kondisi combobox subnya
    $('#pilJenisPengeluaran').on('change', function (e) {
        var optionSelected = $(this).find("option:selected");
        var valueSelected = optionSelected.val();
        var textSelected = optionSelected.text();

        $param_subcoa = valueSelected;
        // alert("nilai " + $param_subcoa);
        if($param_subcoa == 0)
        {
            $("#pilJenisSubPengeluaran").attr('disabled', true);
        }
        else if($param_subcoa == "--")
        {
            $("#pilJenisSubPengeluaran").val('');
            $("#pilJenisSubPengeluaran").attr('disabled', true);
        }
        else
        {
            $("#pilJenisSubPengeluaran").attr('disabled', false);
            change_sub_coa($param_subcoa);
        }

    });

    //Combobox Edit Form Pengeluaran
    //Ketika dipilih akan mengubah kondisi combobox subnya
    $('#edt_pilJenisPengeluaran').on('change', function (e) {
        var optionSelected = $(this).find("option:selected");
        var valueSelected = optionSelected.val();
        var textSelected = optionSelected.text();

        $param_subcoa = valueSelected;
        // alert("nilai " + $param_subcoa);
        if($param_subcoa == 0)
        {
            $("#edt_pilJenisSubPengeluaran").attr('disabled', true);
        }
        else if($param_subcoa == "--")
        {
            $("#edt_pilJenisSubPengeluaran").val('');
            $("#edt_pilJenisSubPengeluaran").attr('disabled', true);
        }
        else
        {
            $("#edt_pilJenisSubPengeluaran").attr('disabled', false);
            change_sub_coa_edit($param_subcoa);
        }

    });

    function change_sub_coa(lempcoa)
    {
        // alert("change " + lempcoa);
        $.ajax({
            type: 'POST',
            url: myurl + '/CB_Sub_Pengeluaran',
            data: {COA_Pengeluaran: lempcoa},
            cache: false,
            success: function(msg){
                // alert("change msg : " + msg);
                $("#pilJenisSubPengeluaran").html(msg);
                // $("#pilJenisSubPengeluaran").val($("#pilJenisSubPengeluaran").val());
            }
        });
    }

    function change_sub_coa_edit(lempcoa,lempsubcoa)
    {
        // alert("change " + lempcoa);
        $.ajax({
            type: 'POST',
            url: myurl + '/CB_Sub_Pengeluaran',
            data: {COA_Pengeluaran: lempcoa},
            cache: false,
            success: function(msg){
                // alert("change msg : " + msg);
                $("#edt_pilJenisSubPengeluaran").html(msg);
                $("#edt_pilJenisSubPengeluaran").val(lempsubcoa);
                // $("#pilJenisSubPengeluaran").val($("#pilJenisSubPengeluaran").val());
            }
        });
    }

    function EditPengeluaran(paramedit)
    {
        // alert('edit : ' + paramedit);
        $("#pengeluaran-column-form").css("display", "none");
        $("#edit-pengeluaran-column-form").css("display", "block");

        $.ajax({
            type: 'POST',
            url: myurl + '/show_edit_pengeluaran',
            data: {idparam: paramedit},
            cache: false,
            success: function(msg){
                // alert('pesan : ' + msg.SubNomorPerkiraan);
                alert(msg.Keterangan + "| Nomor : " + msg.NomorPerkiraan + " | Sub nomor : " + msg.SubNomorPerkiraan);

                $("#txt_paramID").val(msg.id);
                $("#edt_pilTanggal").val(msg.Tanggal);
                $("#edt_pilJenisPengeluaran").val(msg.NomorPerkiraan);
                $("#edt_pilJenisSubPengeluaran").val(msg.SubNomorPerkiraan);
                $("#edt_txtJumlah").val(msg.Jumlah);
                $("#edt_txt_Keterangan").val(msg.Keterangan);
                $("#edt_pilSumberDana").val(msg.Sumber_Dana);

                change_sub_coa_edit(msg.NomorPerkiraan, msg.SubNomorPerkiraan);
            },
            error: function(result) {
                alert('error');
            }
        });
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function UpdatePengeluaran()
    {
        var data = window.confirm("Apakah yakin akan mengupdate ?");
        if(data == true)
        {
            var new_paramID = $('#txt_paramID').val();
            var new_tanggal = $('#edt_pilTanggal').val();
            var new_pilJenis = $('#edt_pilJenisPengeluaran').val();
            var new_pilSubJenis = $('#edt_pilJenisSubPengeluaran').val();
            var new_jumlah = $('#edt_txtJumlah').val();
            var new_keterangan = $('#edt_txt_Keterangan').val();
            var new_sumberDana = $('#edt_pilSumberDana').val();

            alert('isi : ' + new_paramID + " | " + new_tanggal + " | " + new_pilJenis + " | " + new_pilSubJenis + " | " + new_jumlah + " | " +
            new_keterangan + " | " + new_sumberDana + " | ");

            $.ajax({
                type: 'POST',
                url: myurl + '/post_edit_pengeluaran',
                data: {
                    param_txt_paramID: new_paramID,
                    param_edt_pilTanggal: new_tanggal,
                    param_edt_pilJenis: new_pilJenis,
                    param_edt_pilSubJenis: new_pilSubJenis,
                    param_edt_Jumlah: new_jumlah,
                    param_edt_Keterangan: new_keterangan,
                    param_edt_SumberDana: new_sumberDana,
                },
                cache: false,
                success: function (msg) {
                    // alert('pesan : ' + msg);
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

    function DeletePengeluaran(paramdelete)
    {
        alert('delete : ' + paramdelete);
        var data = window.confirm("Apakah yakin akan menghapus : " + paramdelete + " ?");
        if(data == true)
        {
            // alert("hapus");
            $.ajax({
                type: 'POST',
                url: myurl + '/post_delete_pengeluaran',
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
