@extends('master-blade.master')

@section('konten_bar')
@include('master-blade.leftbar.bar_pemasukan')
@endsection

@section('konten_header')
ini header pemasukan
@endsection

@section('konten_body')

<div class="content-wrapper container-xxl p-0">
    <div class="content-body">

        <!-- Basic Pemasukan Form section start -->
        <section id="pemasukan-column-form" name="pemasukan-column-form">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" name="TitlePemasukan" id="TitlePemasukan">Form Pemasukan</h4>
                        </div>
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{ URL::route('post_pemasukan')}}" method="post">
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
                                                    <select name="pilJenisPT" id="pilJenisPT" class="form-control">
                                                        <option value="--">Pilih Kategori</option>
                                                        @foreach ($sub_coa as $rowsubcoa)
                                                        <option value="{{$rowsubcoa->ID}}">{{$rowsubcoa->Nama}}</option>
                                                        @endforeach
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
                                                    <input type="text" id="txtJumlah" class="form-control"
                                                        name="txtJumlah" placeholder="Jumlah" required />
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
                                </div>
                            </form>
                            <br>
                            <strong style="background-color: yellow;">Mumpung inget</strong> <br>
                            <strong>Note : Tambah div notif kalau kosong apakah yakin tidak ada keterangan</strong>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Basic Floating Label Form section end -->


        <!-- Basic Pemasukan Update Form section start -->
        <section id="edit-pemasukan-column-form" name="edit-pemasukan-column-form" style="display: none;">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Form Pemasukan</h4>
                        </div>
                        <div class="card-body">
                            {{-- <form class="form form-horizontal" action="{{ URL::route('post_edit_pemasukan')}}" method="post"> --}}
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
                                                        @foreach ($sub_coa as $rowsubcoa)
                                                        <option value="{{$rowsubcoa->ID}}">{{$rowsubcoa->Nama}}</option>
                                                        @endforeach
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
                                                        name="edt_txtJumlah" placeholder="Jumlah" required/>
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
                                        <button type="submit" name="btnEdit" class="btn btn-primary me-1" onclick="UpdatePemasukan()">Edit</button>
                                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                    </div>
                                </div>
                            {{-- </form> --}}
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
                        <h4 class="card-title">Riwayat Pemasukan</h4>
                    </div>
                    <div class="card-body">
                        {{-- <p class="card-text">Datatable</p> --}}

                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-hover" style="width:100%;">
                                <thead>
                                    <tr>
                                        <td>Tanggal</td>
                                        <td>Jenis</td>
                                        <td>Jumlah</td>
                                        <td>Keterangan</td>
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
                "url": myurl + '/pemasukan_datatable',
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

    $('#pilJenis').on('change', function (e) {
        var optionSelected = $(this).find("option:selected");
        var valueSelected = optionSelected.val();
        var textSelected = optionSelected.text();
        // alert("pilih : " + textSelected + " | " + valueSelected);

        if(valueSelected == 1) //kalau pilih penghasilan utama
        {
            // $("#pilJenisPT").val($("#target option:first").val()).change();
            $("#pilJenisPT").prop("selectedIndex", 0);
            $("#pilJenisPT").attr('disabled', true);
        }
        if(valueSelected == 2) //kalau pilih penghasilan tambahan
        {
            $("#pilJenisPT").attr('disabled', false);
        }
    });

    $('#edt_pilJenis').on('change', function (e) {
        var optionSelected = $(this).find("option:selected");
        var valueSelected = optionSelected.val();
        var textSelected = optionSelected.text();
        // alert("pilih : " + textSelected + " | " + valueSelected);

        if(valueSelected == 1) //kalau pilih penghasilan utama
        {
            $("#edt_pilJenisPT").prop("selectedIndex", 0);
            $("#edt_pilJenisPT").attr('disabled', true);
        }
        if(valueSelected == 2) //kalau pilih penghasilan tambahan
        {
            $("#edt_pilJenisPT").attr('disabled', false);
        }
    });

    function EditPemasukan(paramedit)
    {
        alert('edit : ' + paramedit);
        $("#pemasukan-column-form").css("display", "none");
        $("#edit-pemasukan-column-form").css("display", "block");

        $.ajax({
            type: 'POST',
            url: myurl + '/show_edit_pemasukan',
            data: {idparam: paramedit},
            cache: false,
            success: function(msg){
                alert('pesan : ' + msg);

                $("#txt_paramID").val(msg.id);
                $("#edt_pilTanggal").val(msg.Tanggal);
                $("#edt_pilJenis").val(msg.Kategori);
                $("#edt_pilJenisPT").val(msg.SubNomorPerkiraan);
                $("#edt_txtJumlah").val(msg.Jumlah);
                $("#edt_txt_Keterangan").val(msg.Keterangan);
                $('#edt_pilSumberDana').val(msg.Masuk_Ke);

                Check_Combobox_Kategori_Penghasilan();
            },
            error: function(result) {
                alert('error');
            }
        });
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function Check_Combobox_Kategori_Penghasilan()
    {
        var valueSelected = $("#edt_pilJenis").val();
        var textSelected = $("#edt_pilJenis").text();
        if(valueSelected == 1) //kalau pilih penghasilan utama
        {
            $("#edt_pilJenisPT").prop("selectedIndex", 0);
            $("#edt_pilJenisPT").attr('disabled', true);
        }
        if(valueSelected == 2) //kalau pilih penghasilan tambahan
        {
            $("#edt_pilJenisPT").attr('disabled', false);
        }
    }

    function UpdatePemasukan()
    {
        var data = window.confirm("Apakah yakin akan mengupdate ?");
        if(data == true)
        {
            var new_paramID = $('#txt_paramID').val();
            var new_tanggal = $('#edt_pilTanggal').val();
            var new_pilJenis = $('#edt_pilJenis').val();
            var new_pilJenisPT = $('#edt_pilJenisPT').val();
            var new_txtJumlah = $('#edt_txtJumlah').val();
            var new_txtKeteragan = $('#edt_txt_Keterangan').val();
            var new_pilSumberDana = $('#edt_pilSumberDana').val();
            // var utipe = $("input[name='plans']:checked").val();

            // alert('isi : ' + new_paramID + " | " + new_tanggal + " | " + new_pilJenis + " | " + new_pilJenisPT + " | " + new_txtJumlah + " | " +
            // new_txtKeteragan + " | " + new_pilSumberDana + " | ");

            $.ajax({
                type: 'POST',
                url: myurl + '/post_edit_pemasukan',
                data: {
                    param_txt_paramID: new_paramID,
                    param_edt_pilTanggal: new_tanggal,
                    param_edt_pilJenis: new_pilJenis,
                    param_edt_pilJenisPT: new_pilJenisPT,
                    param_edt_txtJumlah: new_txtJumlah,
                    param_edt_txt_Keterangan: new_txtKeteragan,
                    param_edt_pilSumberDana: new_pilSumberDana,
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

    function DeletePemasukan(paramdelete)
    {
        // alert('delete : ' + paramdelete);
        var data = window.confirm("Apakah yakin akan menghapus : " + paramdelete + " ?");
        if(data == true)
        {
            // alert("hapus");
            $.ajax({
                type: 'POST',
                url: myurl + '/post_delete_pemasukan',
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
