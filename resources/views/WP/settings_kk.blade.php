@extends('master-blade.master')

@section('konten_bar')
{{-- @include('master-blade.leftbar.bar_pemasukan') --}}
@endsection

@section('konten_header')

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/plug-ins/1.11.5/dataRender/datetime.js"></script>

<script>
    var myurl = "<?php echo URL::to('/'); ?>";
    $(document).ready(function (){

        tabel = $('#example').DataTable({
            "processing": true,
            // "serverSide": true,
            "responsive": true,
            "ordering": true, // Set true agar bisa di sorting
            "order": [[ 0, 'desc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
            "ajax":
            {
                "url": myurl + '/get_kk',
                "type": "GET"
            },
            columnDefs: [
                {
                    targets: [3],
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
                    targets: [6],
                    render: function(data) {
                        if (data == 1) {
                            return "Ya"
                        } else {
                            return "Tidak"
                        }
                    },
                    className: 'dt-body-right'
                },
            ],
            "drawCallback": function( settings ) {
                feather.replace({
                    width: 14,
                    height: 14
                });
                var response = settings.json;
                var prm = "{{$param}}";
                var countTanggungan = 0;
                if (response) {
                    if (response.data != undefined) {
                        response.data.forEach((x) => {
                            if (x[6] == 1)
                                countTanggungan++
                        })
                        if (countTanggungan >= 3 && prm == "") {
                            $("#ya").attr("disabled", "")
                            $("#tidak").attr("disabled", "")
                        }
                    }
                }
            }
        });

    });

    function EditKK(paramedit)
    {
        window.location.href = myurl + '/setting_kk?recid=' + paramedit;
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function resetData()
    {
        window.location.href = '/setting_kk';
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function DeleteKK(paramdelete)
    {
        // alert(paramdelete);
        var data = window.confirm("Apakah yakin akan menghapus data tersebut?");
        if(data == true)
        {
            // alert("hapus");
            $.ajax({
                type: 'POST',
                url: myurl + '/delete_kk',
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

<div class="content-header-left col-md-9 col-12 mb-2">
    <div class="row breadcrumbs-top">
        <div class="col-12">
            <h2 class="content-header-title float-start mb-0">Account</h2>
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{Route('dashboard')}}">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{Route('setting')}}">Account Settings </a>
                    </li>
                    <li class="breadcrumb-item active"> Account
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('konten_body')
<div class="row">
    <div class="col-12">
        <ul class="nav nav-pills mb-2">
            <!-- account -->
            <li class="nav-item">
                <a class="nav-link" href="{{Route('setting')}}">
                    <i data-feather="user" class="font-medium-3 me-50"></i>
                    <span class="fw-bold">Account</span>
                </a>
            </li>
            <!-- KK -->
            <li class="nav-item">
                <a class="nav-link active" href="{{Route('setting_kk')}}">
                    <i data-feather="link" class="font-medium-3 me-50"></i>
                    <span class="fw-bold">KK</span>
                </a>
            </li> 
            <!-- security -->
            <li class="nav-item">
                <a class="nav-link" href="">
                    <i data-feather="lock" class="font-medium-3 me-50"></i>
                    <span class="fw-bold">Security</span>
                </a>
            </li>
            {{-- <!-- billing and plans -->
            <li class="nav-item">
                <a class="nav-link" href="page-account-settings-billing.html">
                    <i data-feather="bookmark" class="font-medium-3 me-50"></i>
                    <span class="fw-bold">Billings &amp; Plans</span>
                </a>
            </li>
            <!-- notification -->
            <li class="nav-item">
                <a class="nav-link" href="page-account-settings-notifications.html">
                    <i data-feather="bell" class="font-medium-3 me-50"></i>
                    <span class="fw-bold">Notifications</span>
                </a>
            </li>
            <!-- connection -->
            <li class="nav-item">
                <a class="nav-link" href="page-account-settings-connections.html">
                    <i data-feather="link" class="font-medium-3 me-50"></i>
                    <span class="fw-bold">Connections</span>
                </a>
            </li> --}}
        </ul>

        <!-- profile -->
        <div class="card">
            <div class="card-header border-bottom">
                <h4 class="card-title">Kartu Keluarga</h4>
            </div>
            <div class="card-body py-2 my-25">
                <!-- form -->
                <form class="validate-form mt-1 pt-10" action="{{ URL::route('post_kk')}}" method="post">
                    @csrf
                    <input type="hidden" value="{{$param}}" name="ID_Records" />
                    <div class="row">
                        <div class="col-12 col-sm-6 mb-1">
                            <label class="form-label" for="txtNama">Nama Lengkap</label>
                            <input value="{{$Nama}}" type="text" class="form-control" id="txtNama" name="txtNama"
                                placeholder="John Dor" data-msg="Masukkan Nama Lengkap" required/>
                        </div>
                        <div class="col-12 col-sm-6 mb-1">
                            <label class="form-label" for="hubungan_keluarga">Hubungan Keluarga</label>
                            <select id="hubungan_keluarga"  name="hubungan_keluarga"  class="select2 form-select" required>
                                <option value="" {{$Hubungan_Keluarga == "" ? 'selected' : ''}}>Select Hubungan Keluarga</option>
                                <option value="Suami" {{$Hubungan_Keluarga == "Suami" ? 'selected' : ''}}>Suami</option>
                                <option value="Istri" {{$Hubungan_Keluarga == "Istri" ? 'selected' : ''}}>Istri</option>
                                <option value="Anak Kandung" {{$Hubungan_Keluarga == "Anak Kandung" ? 'selected' : ''}}>Anak Kandung</option>
                                <option value="Anak Angkat" {{$Hubungan_Keluarga == "Anak Angkat" ? 'selected' : ''}}>Anak Angkat</option>
                                <option value="Kakek" {{$Hubungan_Keluarga == "Kakek" ? 'selected' : ''}}>Kakek</option>
                                <option value="Nenek" {{$Hubungan_Keluarga == "Nenek" ? 'selected' : ''}}>Nenek</option>
                                <option value="Paman" {{$Hubungan_Keluarga == "Paman" ? 'selected' : ''}}>Paman</option>
                                <option value="Bibi" {{$Hubungan_Keluarga == "Bibi" ? 'selected' : ''}}>Bibi</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-6 mb-1">
                            <label class="form-label" for="txt_NIK">NIK</label>
                            <input value="{{$NIK}}" type="text" class="form-control" id="txt_NIK" name="txt_NIK" placeholder="3102014403910312" required/>
                        </div>
                        <div class="col-12 col-sm-6 mb-1">
                            <label class="form-label" for="pil_tanggal_lahir">Tanggal Lahir</label>
                            <input value="{{$Tanggal_Lahir}}" type="date" class="form-control" id="pil_tanggal_lahir" name="pil_tanggal_lahir" required/>
                        </div>
                        <div class="col-12 col-sm-6 mb-1">
                            <label class="form-label" for="pil_Pekerjaan">Pekerjaan</label>
                            <select id="pekerjaan" name="pekerjaan" class="select2 form-select">
                                <option value="" {{$Pekerjaan == "" ? 'selected' : ''}}>Select Pekerjaan</option>
                                <option value="Pelajar" {{$Pekerjaan == "Pelajar" ? 'selected' : ''}}>Pelajar</option>
                                <option value="Wirausaha" {{$Pekerjaan == "Wirausaha" ? 'selected' : ''}}>Wirausaha</option>
                                <option value="Guru" {{$Pekerjaan == "Guru" ? 'selected' : ''}}>Guru</option>
                                <option value="Dosen" {{$Pekerjaan == "Dosen" ? 'selected' : ''}}>Dosen</option>
                                <option value="PNS" {{$Pekerjaan == "PNS" ? 'selected' : ''}}>PNS</option>
                                <option value="Karyawan" {{$Pekerjaan == "Karyawan" ? 'selected' : ''}}>Karyawan</option>
                                <option value="Dokter" {{$Pekerjaan == "Dokter" ? 'selected' : ''}}>Dokter</option>
                                <option value="PNS" {{$Pekerjaan == "PNS" ? 'selected' : ''}}>PNS</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-6 mb-1">
                            <label class="form-label" for="txtAlamat">Alamat</label>
                            <input value="{{$Alamat}}" type="text" class="form-control" id="txtAlamat" name="txtAlamat"
                                placeholder="Alamat" />
                        </div>
                        <div class="col-12 col-sm-6 mb-1">
                            <label class="form-label" for="tanggungan">Masuk dalam tanggungan</label>
                            <div>
                                <input type="radio" id="ya" name="tanggungan" value="1" {{$Tanggungan == 1 ? 'checked' : ''}}>
                                <label for="ya">Ya</label>
                              </div>
                          
                              <div>
                                <input type="radio" id="tidak" name="tanggungan" value="0" {{$Tanggungan == 0 ? 'checked' : ''}}>
                                <label for="tidak">Tidak</label>
                              </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary mt-1 me-1">Save </button>
                            <button type="button" onclick="resetData()" class="btn btn-outline-secondary mt-1">Discard</button>
                        </div>
                    </div>
                </form>
                <!--/ form -->
            </div>
        </div>

        <!-- Datatable Start-->
        <div class="row" id="table-hover-row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar KK</h4>
                    </div>
                    <div class="card-body">
                        {{-- <p class="card-text">Datatable</p> --}}

                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-hover" style="width:100%;">
                                <thead>
                                    <tr>
                                        <td>Nama</td>
                                        <td>Hubungan Keluarga</td>
                                        <td>NIK</td>
                                        <td>Tanggal Lahir</td>
                                        <td>Pekerjaan</td>
                                        <td>Alamat</td>
                                        <td>Tanggungan</td>
                                        <td>Options</td>
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

        {{-- <!-- Daftar KK Start-->
        <table class="table">
            <thead>
                <tr>
                    <td>Nama</td>
                    <td>Hubungan Keluarga</td>
                    <td>NIK</td>
                    <td>Tanggal Lahir</td>
                    <td>Pekerjaan</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $rowdata)
                    <tr>
                        <td>{{$rowdata->Nama}}</td>
                        <td>{{$rowdata->NIK}}</td>
                        <td>{{$rowdata->Tanggal_Lahir}}</td>
                        <td>{{$rowdata->Hubungan_Keluarga}}</td>
                        <td>{{$rowdata->Pekerjaan}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Daftar KK End--> --}}
    </div>
</div>

@endsection

