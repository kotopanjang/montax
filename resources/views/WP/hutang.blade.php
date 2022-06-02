@extends('master-blade.master')

@section('konten_bar')
@include('master-blade.leftbar.bar_hutang')
@endsection

@section('konten_header')
{{-- ini header hutang --}}
@endsection

@section('konten_body')
<div class="content-wrapper container-xxl p-0">
    <div class="content-body">

        <!-- Basic Hutang Form section start -->
        <section id="hutang-column-form" name="pemasukan-column-form">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" name="TitleHutang" id="TitleHutang">Form Hutang</h4>
                        </div>
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{ URL::route('post_hutang')}}" method="post">
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
                                                    <input type="date" id="pilTanggal" class="form-control" name="pilTanggal" placeholder="Tanggal" value="<?php echo date("Y-m-d");?>"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="pilTanggal">Tanggal Jatuh Tempo</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="calendar"></i></span>
                                                    <input type="date" id="pilTanggal_exp" class="form-control" name="pilTanggal_exp" placeholder="Tanggal Jatuh Tempo" value=""/>
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
                                                <label class="col-form-label" for="txt_pemberi_pinjaman">Pemberi Pinjaman</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="feather"></i></span>
                                                    <input type="text" id="txt_pemberi_pinjaman" class="form-control" name="txt_pemberi_pinjaman"
                                                        placeholder="Pemberi Pinjaman" />
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
                                                <label class="col-form-label" for="pilSumberDana">Masuk Ke Sumber Dana</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <select name="pilSumberDana" id="pilSumberDana"
                                                        class="form-control">
                                                        <option value="-">-</option>
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
                                </div>
                            </form>
                            <br>
                            {{-- <strong style="background-color: yellow;">Mumpung inget</strong> <br>
                            <strong>Note : Tambah div notif kalau kosong apakah yakin tidak ada keterangan</strong> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Basic Floating Label Form section end -->


        <!-- Basic Hutang Update Form section start -->
        <section id="edit-hutang-column-form" name="edit-hutang-column-form" style="display: none;">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" name="Edit_TitleHutang" id="Edit_TitleHutang">Edit Form Hutang</h4>
                        </div>
                        <div class="card-body">
                            {{-- <form class="form form-horizontal" action="{{ URL::route('post_hutang')}}" method="post">
                                @csrf --}}
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <input type="hidden" id="txt_paramID" class="form-control" name="txt_paramID" />
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
                                                    <input type="date" id="edt_pilTanggal" class="form-control" name="edt_pilTanggal" placeholder="Tanggal" value="<?php echo date("Y-m-d");?>"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="edt_pilTanggalExp">Tanggal Jatuh Tempo</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="calendar"></i></span>
                                                    <input type="date" id="edt_pilTanggal_exp" class="form-control" name="edt_pilTanggal_exp" placeholder="Tanggal Jatuh Tempo" value=""/>
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
                                                <label class="col-form-label" for="txt_pemberi_pinjaman">Pemberi Pinjaman</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="feather"></i></span>
                                                    <input type="text" id="edt_txt_pemberi_pinjaman" class="form-control" name="edt_txt_pemberi_pinjaman"
                                                        placeholder="Pemberi Pinjaman" />
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
                                                <label class="col-form-label" for="edt_pilSumberDana">Masuk Ke Sumber Dana</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <select name="edt_pilSumberDana" id="edt_pilSumberDana"
                                                        class="form-control">
                                                        <option value="-">-</option>
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
                                        <button type="submit" name="btnEdit" class="btn btn-primary me-1" onclick="UpdateHutang()">Edit</button>
                                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                    </div>
                                </div>
                            {{-- </form> --}}
                            <br>
                            {{-- <strong style="background-color: yellow;">Mumpung inget</strong> <br>
                            <strong>Note : Tambah div notif kalau kosong apakah yakin tidak ada keterangan</strong> --}}
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
                        <h4 class="card-title">Riwayat Hutang</h4>
                        <div>
                            <form action="{{ URL::route('create_hutang_pdf')}}" method="post">
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
                                        <td>Tanggal Jatuh Tempo</td>
                                        <td>Jumlah</td>
                                        <td>Pemberi Pinjaman</td>
                                        <td>Keterangan</td>
                                        <td>Masuk Ke</td>
                                        <td>Action</td>
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

    var table = null;
    $(document).ready(function() {
        // alert('load');

        // $("#pilJenisPT").attr('disabled', true);
        // $("#pilRekening").attr('disabled', true);


        // alert('masuk');
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
                "url": myurl + '/hutang_datatable',
                "type": "GET"
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
                    "url": myurl + '/hutang_datatable_param' + '/' + tgl_start + '/' + tgl_end,
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

    function EditHutang(paramedit)
    {
        alert('edit : ' + paramedit);
        $("#hutang-column-form").css("display", "none");
        $("#edit-hutang-column-form").css("display", "block");

        $.ajax({
            type: 'POST',
            url: myurl + '/show_edit_hutang',
            data: {idparam: paramedit},
            cache: false,
            success: function(msg){
                // alert('pesan : ' + msg);
                $("#txt_paramID").val(msg.id);
                $("#edt_pilTanggal").val(msg.Tanggal);
                $("#edt_pilTanggal_exp").val(msg.Tanggal_JatuhTempo);
                $("#edt_txtJumlah").val(msg.Jumlah);
                $("#edt_txt_pemberi_pinjaman").val(msg.Pemberi_Pinjaman);
                $("#edt_pilSumberDana").val(msg.Masuk_Ke);
                $("#edt_txt_Keterangan").val(msg.Keterangan);
            },
            error: function(result) {
                alert('error');
            }
        });
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function UpdateHutang()
    {
        var data = window.confirm("Apakah yakin akan mengupdate ?");
        if(data == true)
        {
            var new_paramID = $("#txt_paramID").val();
            var new_tanggal = $("#edt_pilTanggal").val();
            var new_tanggalExp = $("#edt_pilTanggal_exp").val();
            var new_jumlah = $("#edt_txtJumlah").val();
            var new_pemberi_pinjaman = $("#edt_txt_pemberi_pinjaman").val();
            var new_sumber_dana = $("#edt_pilSumberDana").val();
            var new_keterangan = $("#edt_txt_Keterangan").val();

            // alert('isi : ' + new_paramID + " | " + new_tanggal + " | " + new_pilJenis + " | " + new_pilJenisPT + " | " + new_txtJumlah + " | " +
            // new_txtKeteragan + " | " + new_pilSumberDana + " | ");

            $.ajax({
                type: 'POST',
                url: myurl + '/post_edit_hutang',
                data: {
                    param_paramID: new_paramID,
                    param_tanggal: new_tanggal,
                    param_tanggalExp: new_tanggalExp,
                    param_jumlah: new_jumlah,
                    param_pemberi_pinjaman: new_pemberi_pinjaman,
                    param_sumber_dana: new_sumber_dana,
                    param_keterangan: new_keterangan,
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

    function DeleteHutang(paramdelete)
    {
        alert('delete : ' + paramdelete);
        var data = window.confirm("Apakah yakin akan menghapus : " + paramdelete + " ?");
        if(data == true)
        {
            // alert("hapus");
            $.ajax({
                type: 'POST',
                url: myurl + '/post_delete_hutang',
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
