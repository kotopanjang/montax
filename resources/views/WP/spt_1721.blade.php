@extends('master-blade.master')

@section('konten_bar')
@include('master-blade.leftbar.bar_spt')
@endsection

@section('konten_header')
ini header Form 1721
@endsection

@section('konten_body')

<div class="content-wrapper container-xxl p-0">
    <div class="content-body">

        <!-- Basic Bukti Potong Form section start -->
        <section id="bukti_potong-1721-column-form" name="bukti_potong-1721-column-form">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" name="TitleBuktiPotong" id="TitleBuktiPotong">Form 1721</h4>
                        </div>
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{ URL::route('post_bukti_potong')}}" method="post">
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
                                                <label class="col-form-label" for="pilJenis">Jenis Pajak</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="grid"></i></span>
                                                    <select name="pilJenis" id="pilJenis" class="form-control">
                                                        <option value="1721-A1">1721-A1</option>
                                                        <option value="1721-A2">1721-A2</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="txt_NPWP_Pemotong">NPWP Pemotong</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="edit-2"></i></span>
                                                    <input type="text" id="txt_NPWP_Pemotong" class="form-control" name="txt_NPWP_Pemotong" placeholder="NPWP Pemotong" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="txt_Nama_Pemotong">Nama Pemotong</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="edit-2"></i></span>
                                                    <input type="text" id="txt_Nama_Pemotong" class="form-control" name="txt_Nama_Pemotong" placeholder="Nama Pemotong" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="txt_Nomor_Bukti_Potongan">Nomor Bukti Potongan</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="edit-2"></i></span>
                                                    <input type="text" id="txt_Nomor_Bukti_Potongan" class="form-control" name="txt_Nomor_Bukti_Potongan" placeholder="Nomor Bukti Potongan" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="txtBruto">Jumlah Penghasilan Bruto</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="edit-2"></i></span>
                                                    <input type="text" id="txtBruto" class="form-control" name="txtBruto" placeholder="Jumlah Penghasilan Bruto" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="txtPengurangan">Jumlah Pengurangan</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="edit-2"></i></span>
                                                    <input type="text" id="txtPengurangan" class="form-control" name="txtPengurangan" placeholder="Jumlah Pengurangan" required />
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
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Basic Floating Label Form section end -->


        <!-- Basic Bukti Potong Update Form section start -->
        <section id="edit-bukti_potong-1721-column-form" name="edit-bukti_potong-1721-column-form" style="display: none;">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Form Bukti Potong</h4>
                        </div>
                        <div class="card-body">
                            {{-- <form class="form form-horizontal" action="{{ URL::route('post_edit_bukti_potong')}}" method="post"> --}}
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
                                                <label class="col-form-label" for="pilJenis">Jenis Pajak</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="grid"></i></span>
                                                    <select name="edt_pilJenis" id="edt_pilJenis" class="form-control">
                                                        <option value="1721-A1">1721-A1</option>
                                                        <option value="1721-A2">1721-A2</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="edt_txt_NPWP_Pemotong">NPWP Pemotong</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="edit-2"></i></span>
                                                    <input type="text" id="edt_txt_NPWP_Pemotong" class="form-control" name="edt_txt_NPWP_Pemotong" placeholder="NPWP Pemotong" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="edt_txt_Nama_Pemotong">Nama Pemotong</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="edit-2"></i></span>
                                                    <input type="text" id="edt_txt_Nama_Pemotong" class="form-control" name="edt_txt_Nama_Pemotong" placeholder="Nama Pemotong" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="edt_txt_Nomor_Bukti_Potongan">Nomor Bukti Potongan</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="edit-2"></i></span>
                                                    <input type="text" id="edt_txt_Nomor_Bukti_Potongan" class="form-control" name="edt_txt_Nomor_Bukti_Potongan" placeholder="Nomor Bukti Potongan" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="txtBruto">Jumlah Penghasilan Bruto</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="edit-2"></i></span>
                                                    <input type="text" id="edt_txtBruto" class="form-control" name="edt_txtBruto"
                                                        placeholder="Jumlah Penghasilan Bruto" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="txtPengurangan">Jumlah Pengurangan</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="edit-2"></i></span>
                                                    <input type="text" id="edt_txtPengurangan" class="form-control" name="edt_txtPengurangan"
                                                        placeholder="Jumlah Pengurangan" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-9 offset-sm-3">
                                        <button type="submit" name="btnEdit" class="btn btn-primary me-1" onclick="UpdateBupot()">Edit</button>
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
                        <h4 class="card-title">Riwayat Bukti Potong</h4>
                    </div>
                    <div class="card-body">
                        {{-- <p class="card-text">Datatable</p> --}}

                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-hover" style="width:100%;">
                                <thead>
                                    <tr>
                                        <td>Tanggal</td>
                                        <td>Jenis_Pajak	NPWP_Pemotong</td>
                                        <td>Nama_Pemotong</td>
                                        <td>NPWP Pemotong</td>
                                        <td>Nomor_Bukti_Pemotongan</td>
                                        <td>Jumlah Bruto</td>
                                        <td>Jumlah Pengurangan</td>
                                        <td>Jumlah Netto</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
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

        // $("#pilJenisPT").attr('disabled', true);
        // $("#pilRekening").attr('disabled', true);

        tabel = $('#example').DataTable({
            "processing": true,
            // "serverSide": true,
            "responsive": true,
            "ordering": true, // Set true agar bisa di sorting
            "order": [[ 0, 'desc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
            "ajax":
            {
                "url": myurl + '/bupot_datatable',
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

    function EditBupot1721(paramedit)
    {
        alert('edit : ' + paramedit);
        $("#bukti_potong-1721-column-form").css("display", "none");
        $("#edit-bukti_potong-1721-column-form").css("display", "block");

        $.ajax({
            type: 'POST',
            url: myurl + '/show_edit_bupot',
            data: {idparam: paramedit},
            cache: false,
            success: function(msg){
                // alert('pesan objek : ' + msg);
                // alert('pesan : ' + msg.idparam + " | " + msg.Jenis_Pajak + " | " +msg.NPWP_Pemotong + " | " +msg.Nama_Pemotong + " | " +msg.Nomor_Bukti_Pemotongan + " | " +msg.Tanggal_Bukti_Pemotongan + " | " +msg.Jumlah + " || ");
                // alert('pesan kedua : ' + msg.idparam);

                $('#txt_paramID').val(msg.id);

                $('#edt_txt_NPWP_Pemotong').val(msg.NPWP_Pemotong);
                $('#edt_txt_Nama_Pemotong').val(msg.Nama_Pemotong);
                $('#edt_txt_Nomor_Bukti_Potongan').val(msg.Nomor_Bukti_Pemotongan);
                $('#edt_pilTanggal').val(msg.Tanggal_Bukti_Pemotongan);
                $('#edt_pilJenis').val(msg.Jenis);
                $('#edt_txtBruto').val(msg.Bruto);
                $('#edt_txtPengurangan').val(msg.Pengurangan);
            },
            error: function(result) {
                alert('error');
            }
        });
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function UpdateBupot()
    {
        var data = window.confirm("Apakah yakin akan mengupdate ?");
        if(data == true)
        {
            var new_paramID = $('#txt_paramID').val();
            var jenis_pajak = $('#edt_pilJenis').val();
            var NPWP_Pemotong = $('#edt_txt_NPWP_Pemotong').val();
            var Nama_Pemotong = $('#edt_txt_Nama_Pemotong').val();
            var Nomor_Bupot = $('#edt_txt_Nomor_Bukti_Potongan').val();
            var Tanggal_Bupot = $('#edt_pilTanggal').val();
            var Bruto =  $('#edt_txtBruto').val();
            var Pengurangan = $('#edt_txtPengurangan').val();
            // var utipe = $("input[name='plans']:checked").val();

            alert('isi : ' + new_paramID + " | " + jenis_pajak + " | " + NPWP_Pemotong + " | " + Nama_Pemotong + " | " + Nomor_Bupot + " | " + Tanggal_Bupot + " | " + Jumlah + " ||");

            $.ajax({
                type: 'POST',
                url: myurl + '/post_edit_bupot',
                data: {
                    param_txt_paramID: new_paramID,
                    param_edt_jenis_pajak: jenis_pajak,
                    param_edt_NPWP_Pemotong: NPWP_Pemotong,
                    param_edt_Nama_Pemotong: Nama_Pemotong,
                    param_edt_Nomor_Bupot: Nomor_Bupot,
                    param_edt_Tanggal_Bupot: Tanggal_Bupot,
                    param_edt_Bruto: Bruto,
                    param_edt_Pengurangan: Pengurangan,
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

    function DeleteBupot(paramdelete)
    {
        alert('delete : ' + paramdelete);
        var data = window.confirm("Apakah yakin akan menghapus : " + paramdelete + " ?");
        if(data == true)
        {
            alert("hapus");
            $.ajax({
                type: 'POST',
                url: myurl + '/post_delete_bupot',
                data: {idparam: paramdelete},
                cache: false,
                success: function(msg){
                    alert('pesan : ' + msg);
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
