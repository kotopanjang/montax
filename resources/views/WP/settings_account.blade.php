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
                <a class="nav-link active" href="{{Route('setting')}}">
                    <i data-feather="user" class="font-medium-3 me-50"></i>
                    <span class="fw-bold">Account</span>
                </a>
            </li>
            <!-- KK -->
            <li class="nav-item">
                <a class="nav-link" href="{{Route('setting_kk')}}">
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
                <h4 class="card-title">Profile Details</h4>
            </div>
            <div class="card-body py-2 my-25">
                <!-- header section -->
                {{-- <div class="d-flex">
                    <a href="#" class="me-25">
                        <img src="{{ URL::asset('/bundleku/app-assets/images/portrait/small/avatar-s-11.jpg') }}"
                            id="account-upload-img" class="uploadedAvatar rounded me-50" alt="profile image"
                            height="100" width="100" />
                    </a>
                    <!-- upload and reset button -->
                    <div class="d-flex align-items-end mt-75 ms-1">
                        <div>
                            <label for="account-upload" class="btn btn-sm btn-primary mb-75 me-75">Upload</label>
                            <input type="file" id="account-upload" hidden accept="image/*" />
                            <button type="button" id="account-reset"
                                class="btn btn-sm btn-outline-secondary mb-75">Reset</button>
                            <p class="mb-0">Allowed file types: png, jpg, jpeg.</p>
                        </div>
                    </div>
                    <!--/ upload and reset button -->
                </div> --}}
                <!--/ header section -->

                <!-- form -->
                <form class="validate-form">
                    <div class="row">
                        <div class="col-12 col-sm-12 mb-1">
                            <label class="form-label" for="txtNamaWP">Nama Lengkap</label>
                            <input type="text" class="form-control" id="txtNamaWP" name="txtNamaWP"
                                placeholder="Nama Lengkap" data-msg="Please enter full name" required/>
                        </div>
                        <div class="col-12 col-sm-6 mb-1">
                            <label class="form-label" for="txt_NIK">NIK</label>
                            <input type="text" class="form-control" id="txt_NIK" name="txt_NIK"
                            placeholder="3102014403910312" data-msg="Please enter NIK" required/>
                        </div>
                        <div class="col-12 col-sm-6 mb-1">
                            <label class="form-label" for="txt_NPWP">NPWP</label>
                            <input type="text" class="form-control" id="txt_NPWP" name="txt_NPWP"
                            placeholder="99.999.999.9-999.999" data-msg="Please enter NPWP" required/>
                        </div>
                        <div class="col-12 col-sm-6 mb-1">
                            <label class="form-label" for="txtEmail">Email</label>
                            <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="Email" required/>
                        </div>
                        <div class="col-12 col-sm-6 mb-1">
                            <label class="form-label" for="pil_Pekerjaan">Pekerjaan</label>
                            <select id="pekerjaan" name="pekerjaan" class="select2 form-select" required>
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
                            <label class="form-label" for="accountAddress">Address</label>
                            <input type="text" class="form-control" id="accountAddress" name="address"
                                placeholder="Your Address" />
                        </div>
                        <div class="col-12 col-sm-6 mb-1">
                            <label class="form-label" for="pil_tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="pil_tanggal_lahir" name="pil_tanggal_lahir" required/>
                        </div>                        
                        <div class="col-12 col-sm-6 mb-1">
                            <label class="form-label" for="pil_status">Status</label>
                            <select id="pil_status" name="pil_status" class="select2 form-select">
                                <option value="">Select Pekerjaan</option>
                                <option value="Belum Kawin">Belum Kawin</option>
                                <option value="Kawin">Kawin</option>
                                <option value="Bercerai">Bercerai</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-6 mb-1">
                            {{-- <label for="language" class="form-label">Language</label>
                            <select id="language" class="select2 form-select">
                                <option value="">Select Language</option>
                                <option value="en">English</option>
                                <option value="fr">French</option>
                                <option value="de">German</option>
                                <option value="pt">Portuguese</option>
                            </select> --}}
                        </div>
                        
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary mt-1 me-1">Save
                                changes</button>
                            <button type="reset" class="btn btn-outline-secondary mt-1">Discard</button>
                        </div>
                    </div>
                </form>
                <!--/ form -->
            </div>
        </div>
    </div>
</div>

@endsection

