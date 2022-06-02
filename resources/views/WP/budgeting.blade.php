@extends('master-blade.master')

@section('konten_bar')
@include('master-blade.leftbar.bar_budgeting')
@endsection

@section('konten_header')
{{-- ini header Budgeting --}}
@endsection

@section('konten_body')

<div class="content-wrapper container-xxl p-0">
    <div class="content-body">

        <!-- Basic Budgeting Form section start -->
        <section id="budgeting-column-form" name="budgeting-column-form">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" name="TitleBudgeting" id="TitleBudgeting">Form Budgeting</h4>
                        </div>
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{ URL::route('post_budgeting')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="pilTanggal">Tanggal Mulai</label>
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
                                                <label class="col-form-label" for="pilTanggal">Tanggal Berakhir</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="calendar"></i></span>
                                                    <input type="date" id="pilTanggal_exp" class="form-control" name="pilTanggal_exp" placeholder="Tanggal"
                                                        value=""/>
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
                                                    <select name="pilJenisPengeluaran" id="pilJenisPengeluaran" class="form-control">
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
                                                    <select name="pilJenisSubPengeluaran" id="pilJenisSubPengeluaran" class="form-control">
                                                        <option value="--">Pilih Sub Kategori</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="txtJumlah">Jumlah budget</label>
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
                            {{-- <strong style="background-color: yellow;">Mumpung inget</strong> <br>
                            <strong>Note : Tambah div notif kalau kosong apakah yakin tidak ada keterangan</strong> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Basic Floating Label Form section end -->


        <!-- Basic Budgeting Update Form section start -->
        <section id="edit-budgeting-column-form" name="budgeting-column-form" style="display: none;">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" name="edt_TitleBudgeting" id="edt_TitleBudgeting">Edit Form Budgeting</h4>
                        </div>
                        <div class="card-body">
                            {{-- <form class="form form-horizontal" action="{{ URL::route('post_budgeting')}}" method="post">
                                @csrf --}}
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
                                                <label class="col-form-label" for="edt_pilTanggal">Tanggal Mulai</label>
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
                                                <label class="col-form-label" for="edt_pilTanggalExp">Tanggal Berakhir</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="calendar"></i></span>
                                                    <input type="date" id="edt_pilTanggal_exp" class="form-control" name="edt_pilTanggal_exp" placeholder="Tanggal" value=""/>
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
                                                    <select name="edt_pilJenisPengeluaran" id="edt_pilJenisPengeluaran" class="form-control">
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
                                                    <select name="edt_pilJenisSubPengeluaran" id="edt_pilJenisSubPengeluaran" class="form-control">
                                                        <option value="--">Pilih Sub Kategori</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="edt_txtJumlah">Jumlah budget</label>
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
                                        <button type="submit" name="btnEdit" class="btn btn-primary me-1" onclick="UpdateBudgeting()">Edit</button>
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
        <!-- Basic Floating Label Update Form section end -->

        <!-- Datatable Start-->
        <div class="row" id="table-hover-row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Riwayat Budgeting</h4>
                    </div>
                    <div class="card-body">
                        {{-- <p class="card-text">Datatable</p> --}}

                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-hover" style="width:100%;">
                                <thead>
                                    <tr>
                                        <td>Jenis</td>
                                        <td>Sub Jenis</td>
                                        <td>Start</td>
                                        <td>End</td>
                                        <td>Jumlah</td>
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
    // alert ("url : " + myurl);
    $(document).ready(function (){
        $("#pilJenisSubPengeluaran").attr('disabled', true);

        tabel = $('#example').DataTable({
            "processing": true,
            // "serverSide": true,
            "responsive": true,
            "ordering": true, // Set true agar bisa di sorting
            "order": [[ 0, 'desc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
            "ajax":
            {
                "url": myurl + '/budgeting_datatable',
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

    });

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

    //Combobox Pengeluaran di Main Form Budgeting
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
            change_edt_sub_coa($param_subcoa);
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

    function change_edt_sub_coa(lempcoa,lempsubcoa)
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
            }
        });
    }

    function EditBudgeting(paramedit)
    {
        alert(paramedit);
        $("#budgeting-column-form").css("display", "none");
        $("#edit-budgeting-column-form").css("display", "block");

        $.ajax({
            type: 'POST',
            url: myurl + '/show_edit_budgeting',
            data: {idparam: paramedit},
            cache: false,
            success: function(msg){
                // alert('pesan : ' + msg);
                $("#txt_paramID").val(msg.id);
                $("#edt_pilTanggal").val(msg.Start_Berlaku);
                $("#edt_pilTanggal_exp").val(msg.Exp_Berlaku);
                $("#edt_pilJenisPengeluaran").val(msg.Nomor_Perkiraan);
                $("#edt_pilJenisSubPengeluaran").val(msg.Sub_Nomor_Perkiraan);
                $("#edt_txtJumlah").val(msg.Jumlah_Budget);
                change_edt_sub_coa(msg.Nomor_Perkiraan,msg.Sub_Nomor_Perkiraan);
            },
            error: function(result) {
                alert('error');
            }
        });
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function UpdateBudgeting()
    {
        var data = window.confirm("Apakah yakin akan mengupdate ?");
        if(data == true)
        {
            var new_paramID                 = $("#txt_paramID").val();
            var new_pilTanggal              = $("#edt_pilTanggal").val();
            var new_pilTanggal_exp          = $("#edt_pilTanggal_exp").val();
            var new_pilJenisPengeluaran     = $("#edt_pilJenisPengeluaran").val();
            var new_pilJenisSubPengeluaran  = $("#edt_pilJenisSubPengeluaran").val();
            var new_txtJumlah               = $("#edt_txtJumlah").val();

            // alert(new_paramID + ' | ' + new_pilTanggal + ' | ' + new_pilTanggal_exp + ' | ' + new_pilJenisPengeluaran + ' | ' + new_pilJenisSubPengeluaran + ' | ' + new_txtJumlah + ' | ');

            $.ajax({
                type: 'POST',
                url: myurl + '/post_edit_budgeting',
                data: {
                    param_new_paramID: new_paramID,
                    param_new_pilTanggal: new_pilTanggal,
                    param_new_pilTanggal_exp: new_pilTanggal_exp,
                    param_new_pilJenisPengeluaran: new_pilJenisPengeluaran,
                    param_new_pilJenisSubPengeluaran: new_pilJenisSubPengeluaran,
                    param_new_txtJumlah: new_txtJumlah,
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

    function DeleteBudgeting(paramdelete)
    {
        // alert(paramdelete);
        var data = window.confirm("Apakah yakin akan menghapus : " + paramdelete + " ?");
        if(data == true)
        {
            // alert("hapus");
            $.ajax({
                type: 'POST',
                url: myurl + '/post_delete_budgeting',
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
