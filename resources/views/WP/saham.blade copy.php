@extends('master-blade.master')

@section('konten_bar')
{{-- @include('master-blade.leftbar.bar_pemasukan') --}}
@endsection

@section('konten_header')
ini header saham
@endsection

@section('konten_body')

<div class="content-wrapper container-xxl p-0">
    <div class="content-body">

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
        <!-- Basic Pemasukan Form section start -->
        <section id="saham-column-form" name="saham-column-form">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" name="TitlePemasukan" id="TitlePemasukan">Form Saham</h4>
                        </div>
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{ URL::route('post_saham')}}" method="post">
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
                            @foreach ($sumberrdn_wp as $row_sumberrdn_wp)
                            <option value="{{$row_sumberrdn_wp->ID_Record}}">
                                {{$row_sumberrdn_wp->namasekuritas}} |
                                {{$row_sumberrdn_wp->Inisial_RDN}} |
                                {{$row_sumberrdn_wp->No_Rekening}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="card-body">
                        {{-- <p class="card-text">Datatable</p> --}}

                        <div class="table-responsive">
                            <table id="saham_yang_dimiliki" class="table table-striped table-hover" style="width:100%;">
                                <thead>
                                    <tr>
                                        <td>Product</td>
                                        <td>Jumlah Lot</td>
                                        <td>Harga_Satuan</td>
                                        <td>Harga_Total</td>
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
                            @foreach ($sumberrdn_wp as $row_sumberrdn_wp)
                            <option value="{{$row_sumberrdn_wp->ID_Record}}">
                                {{$row_sumberrdn_wp->namasekuritas}} |
                                {{$row_sumberrdn_wp->Inisial_RDN}} |
                                {{$row_sumberrdn_wp->No_Rekening}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="card-body">
                        {{-- <p class="card-text">Datatable</p> --}}

                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-hover" style="width:100%;">
                                <thead>
                                    <tr>
                                        <td>Tanggal Transaksi</td>
                                        <td>Action</td>
                                        <td>Product</td>
                                        <td>Jumlah</td>
                                        <td>Harga_Satuan</td>
                                        <td>Harga_Total</td>
                                        <td>Masuk_Ke</td>
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

    var table_b = null;
    var table_a = null;
    $(document).ready(function() {
        // alert('load');

        // $("#pilJenisPT").attr('disabled', true);
        // $("#pilRekening").attr('disabled', true);

        tabel_b = $('#example').DataTable({
            "processing": true,
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

        table_a = $('#saham_yang_dimiliki').DataTable({
            "processing": true,
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
    });


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

    // $("#edt_txtJumlah").on({
    //     "focus": function(event) {
    //         $(event.target).select();
    //     },
    //     "keyup": function(event) {
    //         $(event.target).val(function(index, value) {
    //         return value.replace(/\D/g, "")
    //             // .replace(/([0-9])([0-9]{2})$/, '$1,$2')
    //             .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
    //         });
    //     }
    // });

    // $('#edt_pilJenis').on('change', function (e) {
    //     var optionSelected = $(this).find("option:selected");
    //     var valueSelected = optionSelected.val();
    //     var textSelected = optionSelected.text();
    //     // alert("pilih : " + textSelected + " | " + valueSelected);

    //     if(valueSelected == 1) //kalau pilih penghasilan utama
    //     {
    //         $("#edt_pilJenisPT").prop("selectedIndex", 0);
    //         $("#edt_pilJenisPT").attr('disabled', true);
    //     }
    //     if(valueSelected == 2) //kalau pilih penghasilan tambahan
    //     {
    //         $("#edt_pilJenisPT").attr('disabled', false);
    //     }
    // });


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
