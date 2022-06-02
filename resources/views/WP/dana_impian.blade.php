@extends('master-blade.master')

@section('konten_bar')
@include('master-blade.leftbar.bar_dana_impian')
@endsection

@section('konten_header')
{{-- ini header Dana Impian --}}
@endsection

@section('konten_body')

<div class="content-wrapper container-xxl p-0">
    <div class="content-body">

        <!-- Basic Dana Impian Form section start -->
        <section id="dana-impian-column-form" name="dana-impian-column-form">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" name="TitleDanaImpian" id="TitleDanaImpian">Form Dana Impian</h4>
                        </div>
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{ URL::route('post_dana_impian')}}" method="post">
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
                                                <label class="col-form-label" for="txt_Judul">Judul</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="feather"></i></span>
                                                    <input type="text" id="txt_Judul" class="form-control"
                                                        name="txt_Judul" placeholder="Nama Dana Impian (contoh : Dana Liburan Ke Eropa)" />
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
                                                <label class="col-form-label" for="txtJumlah">Jumlah Target</label>
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
                                                <label class="col-form-label" for="pilTanggalPencapaian">Target Pencapaian</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i
                                                            data-feather="calendar"></i></span>
                                                    <input type="date" id="pilTanggalPencapaian" class="form-control"
                                                        name="pilTanggalPencapaian" placeholder="Tanggal" value=""/>
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
                                                        <option value="0"> Semua Dana</option>
                                                        @foreach ($sumberdana_wp as $row_sumberdana_wp)
                                                        <option value="{{$row_sumberdana_wp->ID_Record}}">
                                                            @if($row_sumberdana_wp->namabank == "")
                                                            {{$row_sumberdana_wp->Inisial}}
                                                            @else
                                                            {{$row_sumberdana_wp->namabank}} | {{$row_sumberdana_wp->Inisial}} | {{$row_sumberdana_wp->No_Rekening}}
                                                            @endif
                                                        </option>
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


        <!-- Basic Dana Impian Update Form section start -->
        <section id="edit-dana-impian-column-form" name="dana-impian-column-form" style="display: none;">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" name="TitleDanaImpian" id="TitleDanaImpian">Form Dana Impian</h4>
                        </div>
                        <div class="card-body">
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
                                                <label class="col-form-label" for="edt_txt_Judul">Judul</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="feather"></i></span>
                                                    <input type="text" id="edt_txt_Judul" class="form-control"
                                                        name="edt_txt_Judul" placeholder="Nama Dana Impian (contoh : Dana Liburan Ke Eropa)" />
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
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="edt_txtJumlah">Jumlah Target</label>
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
                                                <label class="col-form-label" for="edt_pilTanggalPencapaian">Target Pencapaian</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i
                                                            data-feather="calendar"></i></span>
                                                    <input type="date" id="edt_pilTanggalPencapaian" class="form-control"
                                                        name="edt_pilTanggalPencapaian" placeholder="Tanggal" value=""/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="edt_pilSumberDana">Sumber Dana</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <select name="edt_pilSumberDana" id="edt_pilSumberDana"
                                                        class="form-control">
                                                        <option value="0"> Semua Dana</option>
                                                        @foreach ($sumberdana_wp as $row_sumberdana_wp)
                                                        <option value="{{$row_sumberdana_wp->ID_Record}}">
                                                            @if($row_sumberdana_wp->namabank == "")
                                                            {{$row_sumberdana_wp->Inisial}}
                                                            @else
                                                            {{$row_sumberdana_wp->namabank}} | {{$row_sumberdana_wp->Inisial}} | {{$row_sumberdana_wp->No_Rekening}}
                                                            @endif
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-9 offset-sm-3">
                                        <button type="submit" name="btnEdit" class="btn btn-primary me-1" onclick="UpdateDanaImpian()">Edit</button>
                                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                    </div>
                                </div>
                            <br>
                            <strong style="background-color: yellow;">Mumpung inget</strong> <br>
                            <strong>Note : Tambah div notif kalau kosong apakah yakin tidak ada keterangan</strong>
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
                        <h4 class="card-title">Riwayat Pemasukan</h4>
                    </div>
                    <div class="card-body">
                        {{-- <p class="card-text">Datatable</p> --}}

                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-hover" style="width:100%;">
                                <thead>
                                    <tr>
                                        <td>Tanggal</td>
                                        <td>Judul</td>
                                        <td>Keterangan</td>
                                        <td>Jumlah Target</td>
                                        <td>Tanggal Target</td>
                                        <td>Sumber Dana</td>
                                        <td>Detail Sumber Dana</td>
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
    // alert('myurl : ' + myurl);


    var table = null;
    $(document).ready(function() {
        // alert('load');

        $("#pilJenisPT").attr('disabled', true);
        $("#pilRekening").attr('disabled', true);

        tabel = $('#example').DataTable({
            "processing": true,
            // "serverSide": true,
            "responsive": true,
            "ordering": true, // Set true agar bisa di sorting
            "order": [[ 0, 'desc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
            "ajax":
            {
                "url": myurl + '/dana_impian_datatable',
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


    function EditDanaImpian(paramedit)
    {
        alert('edit : ' + paramedit);
        $("#dana-impian-column-form").css("display", "none");
        $("#edit-dana-impian-column-form").css("display", "block");

        $.ajax({
            type: 'POST',
            url: myurl + '/show_edit_dana_impian',
            data: {idparam: paramedit},
            cache: false,
            success: function(msg){
                alert('pesan : ' + msg);
                $('#txt_paramID').val(msg.id);
                $("#edt_txt_Judul").val(msg.Judul);
                $("#edt_txt_Keterangan").val(msg.Keterangan);
                $("#edt_pilTanggal").val(msg.Tanggal);
                $("#edt_pilTanggalPencapaian").val(msg.Tanggal_Pencapaian);
                $("#edt_txtJumlah").val(msg.Jumlah);
                $("#edt_pilSumberDana").val(msg.Masuk_Ke);
            },
            error: function(result) {
                alert('error');
            }
        });
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function UpdateDanaImpian()
    {
        var data = window.confirm("Apakah yakin akan mengupdate ?");
        if(data == true)
        {
            var new_paramID             = $('#txt_paramID').val();
            var new_judul               = $("#edt_txt_Judul").val();
            var new_keterangan          = $("#edt_txt_Keterangan").val();
            var new_tanggal             = $("#edt_pilTanggal").val();
            var new_tanggalpencapaian   = $("#edt_pilTanggalPencapaian").val();
            var new_jumlah              = $("#edt_txtJumlah").val();
            var new_sumberdana          = $("#edt_pilSumberDana").val();

            // alert(new_paramID + "|"+ new_judul + "|"+ new_keterangan + "|"+ new_tanggal + "|"+ new_tanggalpencapaian + "|"+ new_jumlah + "|"+ new_sumberdana + "|");
            $.ajax({
                type: 'POST',
                url: myurl + '/post_edit_dana_impian',
                data: {
                    param_paramID : new_paramID,
                    param_judul : new_judul,
                    param_keterangan : new_keterangan,
                    param_tanggal : new_tanggal,
                    param_tanggalpencapaian : new_tanggalpencapaian,
                    param_jumlah : new_jumlah,
                    param_sumberdana : new_sumberdana,
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

    function DeleteDanaImpian(paramdelete)
    {
        // alert('delete : ' + paramdelete);
        var data = window.confirm("Apakah yakin akan menghapus : " + paramdelete + " ?");
        if(data == true)
        {
            // alert("hapus");
            $.ajax({
                type: 'POST',
                url: myurl + '/post_delete_dana_impian',
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
