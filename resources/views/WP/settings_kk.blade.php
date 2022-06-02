@extends('master-blade.master')

@section('konten_bar')
{{-- @include('master-blade.leftbar.bar_pemasukan') --}}
@endsection

@section('konten_header')
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
                <form class="validate-form mt-1 pt-10" action="{{ URL::route('post_KK')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-sm-6 mb-1">
                            <label class="form-label" for="txtNama">Nama Lengkap</label>
                            <input type="text" class="form-control" id="txtNama" name="txtNama"
                                placeholder="John Dor" data-msg="Masukkan Nama Lengkap" required/>
                        </div>
                        <div class="col-12 col-sm-6 mb-1">
                            <label class="form-label" for="hubungan_keluarga">Hubungan Keluarga</label>
                            <select id="hubungan_keluarga"  name="hubungan_keluarga"  class="select2 form-select" required>
                                <option value="">Select Hubungan Keluarga</option>
                                <option value="Suami">Suami</option>
                                <option value="Istri">Istri</option>
                                <option value="Anak Kandung">Anak Kandung</option>
                                <option value="Anak Angkat">Anak Angkat</option>
                                <option value="Kakek">Kakek</option>
                                <option value="Nenek">Nenek</option>
                                <option value="Paman">Paman</option>
                                <option value="Bibi">Bibi</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-6 mb-1">
                            <label class="form-label" for="txt_NIK">NIK</label>
                            <input type="text" class="form-control" id="txt_NIK" name="txt_NIK" placeholder="3102014403910312" required/>
                        </div>
                        <div class="col-12 col-sm-6 mb-1">
                            <label class="form-label" for="pil_tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="pil_tanggal_lahir" name="pil_tanggal_lahir" required/>
                        </div>
                        <div class="col-12 col-sm-6 mb-1">
                            <label class="form-label" for="pil_Pekerjaan">Pekerjaan</label>
                            <select id="pekerjaan" name="pekerjaan" class="select2 form-select">
                                <option value="">Select Pekerjaan</option>
                                <option value="Pelajar">Pelajar</option>
                                <option value="Wirausaha">Wirausaha</option>
                                <option value="Guru">Guru</option>
                                <option value="Dosen">Dosen</option>
                                <option value="PNS">PNS</option>
                                <option value="Karyawan">Karyawan</option>
                                <option value="Dokter">Dokter</option>
                                <option value="PNS">PNS</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-6 mb-1">
                            <label class="form-label" for="txtAlamat">Alamat</label>
                            <input type="text" class="form-control" id="txtAlamat" name="txtAlamat"
                                placeholder="Alamat" />
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary mt-1 me-1">Save </button>
                            <button type="reset" class="btn btn-outline-secondary mt-1">Discard</button>
                        </div>
                    </div>
                </form>
                <!--/ form -->
            </div>
        </div>

        <!-- Daftar KK Start-->
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
        <!-- Daftar KK End-->
    </div>
</div>

@endsection

