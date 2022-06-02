@extends('master-blade.master')

@section('konten_bar')
@include('master-blade.leftbar.bar_spt')
@endsection

@section('konten_header')
{{-- ini header bukti potong spt --}}
@endsection

@section('konten_body')

{{-- Jenis Pajak
NPWP Pemotong/ Pemungut Pajak
Nama Pemotong/ Pemungut Pajak
Nomor Bukti Pemotongan/ Pemungutan
Tanggal Bukti Pemotongan/ Pemungutan
Jumlah PPh yang Dipotong/ Dipungut --}}


<div class="content-wrapper container-xxl p-0">
    <div class="content-body">

        <!-- Basic Bukti Potong Form section start -->
        <section id="bukti_potong-column-form" name="bukti_potong-column-form">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" name="TitleBuktiPotong" id="TitleBuktiPotong">Form Bukti Potong</h4>
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
                                                        <option value="1721-A1">(Pasal 21) 1721-A1</option>
                                                        <option value="1721-A2">(Pasal 21) 1721-A2</option>
                                                        {{-- <option value="Pasal 21">Pasal 21</option> --}}
                                                        <option value="Pasal 22">Pasal 22</option>
                                                        <option value="Pasal 23/26">Pasal 23/26</option>
                                                        <option value="Pasal 15">Pasal 15</option>
                                                        <option value="Pasal 4">Pasal 4 Ayat 2</option>
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
                                                <label class="col-form-label" for="txtJumlah">Jumlah</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="edit-2"></i></span>
                                                    <input type="text" id="txtJumlah" class="form-control" name="txtJumlah" placeholder="Jumlah" required />
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
                                                    <input type="text" id="txtBruto" class="form-control" name="txtBruto"
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
                                                    <input type="text" id="txtPengurangan" class="form-control" name="txtPengurangan"
                                                        placeholder="Jumlah Pengurangan" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="txtPengurangan">Jumlah PPH 21 Terutang</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="edit-2"></i></span>
                                                    <input type="text" id="txtPphTerutang" class="form-control" name="txtPengurangan"
                                                        placeholder="Jumlah PPH 21 Terutang" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="txtPengurangan">Jumlah PPh Pasal 21 dan Pasal 26 yang telah dipotong dan dilunasi</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="edit-2"></i></span>
                                                    <input type="text" id="txtPelunasan" class="form-control" name="txtPengurangan"
                                                        placeholder="Jumlah PPh Pasal 21 dan Pasal 26 yang telah dipotong dan dilunasi" required />
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
                            <strong>Note : update delete sudah, tinggal thousand separator</strong> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Basic Floating Label Form section end -->


        <!-- Basic Bukti Potong Update Form section start -->
        <section id="edit-bukti_potong-column-form" name="edit-bukti_potong-column-form" style="display: none;">
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
                                                <label class="col-form-label" for="edt_pilJenis">Jenis Pajak</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="grid"></i></span>
                                                    <select name="edt_pilJenis" id="edt_pilJenis" class="form-control">
                                                        <option value="1721-A1">(Pasal 21) 1721-A1</option>
                                                        <option value="1721-A2">(Pasal 21) 1721-A2</option>
                                                        {{-- <option value="Pasal 21">Pasal 21</option> --}}
                                                        <option value="Pasal 22">Pasal 22</option>
                                                        <option value="Pasal 23/26">Pasal 23/26</option>
                                                        <option value="Pasal 15">Pasal 15</option>
                                                        <option value="Pasal 4">Pasal 4 Ayat 2</option>
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
                                                <label class="col-form-label" for="edt_txtJumlah">Jumlah</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="edit-2"></i></span>
                                                    <input type="text" id="edt_txtJumlah" class="form-control" name="edt_txtJumlah" placeholder="Jumlah" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="edt_txtBruto">Jumlah Penghasilan Bruto</label>
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
                                                <label class="col-form-label" for="edt_txtPengurangan">Jumlah Pengurangan</label>
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
                                        <td>Jumlah</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                {{-- <tfoot>
                                    <tr>
                                        <td>Jenis_Pajak	NPWP_Pemotong</td>
                                        <td>Nama_Pemotong</td>
                                        <td>Nomor_Bukti_Pemotongan</td>
                                        <td>Tanggal_Bukti_Pemotongan</td>
                                        <td>Jumlah</td>
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

        $("#txtJumlah").attr('disabled',true);
        $("#txtBruto").attr('disabled', false);
        $("#txtPengurangan").attr('disabled',false);

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

    //Combobox Edit Form Pengeluaran
    //Ketika dipilih akan mengubah kondisi combobox subnya
    $('#pilJenis').on('change', function (e) {
        var optionSelected = $(this).find("option:selected");
        var valueSelected = optionSelected.val();
        var textSelected = optionSelected.text();

        $param_val = valueSelected;
        alert("nilai " + $param_val);
        if($param_val == "1721-A1" || $param_val == "1721-A2")
        {
            $("#txtJumlah").attr('disabled',true);
            $("#txtBruto").attr('disabled', false);
            $("#txtPengurangan").attr('disabled',false);
        }
        else
        {
            $("#txtJumlah").attr('disabled',false);
            $("#txtBruto").attr('disabled', true);
            $("#txtPengurangan").attr('disabled',true);
        }

    });

    function EditBupot(paramedit)
    {
        alert('edit : ' + paramedit);
        $("#bukti_potong-column-form").css("display", "none");
        $("#edit-bukti_potong-column-form").css("display", "block");

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
                $('#edt_pilJenis').val(msg.Jenis_Pajak);
                $('#edt_txt_NPWP_Pemotong').val(msg.NPWP_Pemotong);
                $('#edt_txt_Nama_Pemotong').val(msg.Nama_Pemotong);
                $('#edt_txt_Nomor_Bukti_Potongan').val(msg.Nomor_Bukti_Pemotongan);
                $('#edt_pilTanggal').val(msg.Tanggal_Bukti_Pemotongan);
                $('#edt_txtJumlah').val(msg.Jumlah);

                if(msg.Jenis_Pajak == '1721-A1' || msg.Jenis_Pajak == '1721-A2')
                {
                    $("#edt_txtJumlah").attr('disabled',true);
                    $("#edt_txtBruto").attr('disabled', false);
                    $("#edt_txtPengurangan").attr('disabled',false);
                }
                else
                {
                    $("#edt_txtJumlah").attr('disabled',false);
                    $("#edt_txtBruto").attr('disabled', true);
                    $("#edt_txtPengurangan").attr('disabled',true);
                }
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
            var new_paramID     = $('#txt_paramID').val();
            var jenis_pajak     = $('#edt_pilJenis').val();
            var NPWP_Pemotong   = $('#edt_txt_NPWP_Pemotong').val();
            var Nama_Pemotong   = $('#edt_txt_Nama_Pemotong').val();
            var Nomor_Bupot     = $('#edt_txt_Nomor_Bukti_Potongan').val();
            var Tanggal_Bupot   = $('#edt_pilTanggal').val();
            var Jumlah          = $('#edt_txtJumlah').val();
            var bruto           = $('#edt_txtBruto').val();
            var pengurangan     = $('#edt_txtPengurangan').val();
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
                    param_edt_Jumlah: Jumlah,
                    param_edt_Bruto: bruto,
                    param_edt_pengurangan: pengurangan,
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
