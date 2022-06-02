@extends('master-blade.master')

@section('konten_header')
<div class="content-header-left col-md-9 col-12 mb-2">
    <div class="row breadcrumbs-top">
        <div class="col-12">
            <h2 class="content-header-title float-start mb-0">Security</h2>
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Account Settings</a>
                    </li>
                    <li class="breadcrumb-item active">Security
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
                <a class="nav-link" href="page-account-settings-account.html">
                    <i data-feather="user" class="font-medium-3 me-50"></i>
                    <span class="fw-bold">Account</span>
                </a>
            </li>
            <!-- security -->
            <li class="nav-item">
                <a class="nav-link active" href="page-account-settings-security.html">
                    <i data-feather="lock" class="font-medium-3 me-50"></i>
                    <span class="fw-bold">Security</span>
                </a>
            </li>
        </ul>

        <!-- security -->

        <div class="card">
            <div class="card-header border-bottom">
                <h4 class="card-title">Change Password</h4>
            </div>
            <div class="card-body pt-1">
                <!-- form -->
                <form class="validate-form">
                    <div class="row">
                        <div class="col-12 col-sm-6 mb-1">
                            <label class="form-label" for="account-old-password">Current password</label>
                            <div class="input-group form-password-toggle input-group-merge">
                                <input type="password" class="form-control" id="account-old-password" name="password"
                                    placeholder="Enter current password" data-msg="Please current password" />
                                <div class="input-group-text cursor-pointer">
                                    <i data-feather="eye"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 mb-1">
                            <label class="form-label" for="account-new-password">New Password</label>
                            <div class="input-group form-password-toggle input-group-merge">
                                <input type="password" id="account-new-password" name="new-password"
                                    class="form-control" placeholder="Enter new password" />
                                <div class="input-group-text cursor-pointer">
                                    <i data-feather="eye"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 mb-1">
                            <label class="form-label" for="account-retype-new-password">Retype New Password</label>
                            <div class="input-group form-password-toggle input-group-merge">
                                <input type="password" class="form-control" id="account-retype-new-password"
                                    name="confirm-new-password" placeholder="Confirm your new password" />
                                <div class="input-group-text cursor-pointer"><i data-feather="eye"></i></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <p class="fw-bolder">Password requirements:</p>
                            <ul class="ps-1 ms-25">
                                <li class="mb-50">Minimum 8 characters long - the more, the better</li>
                                <li class="mb-50">At least one lowercase character</li>
                                <li>At least one number, symbol, or whitespace character</li>
                            </ul>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary me-1 mt-1">Save changes</button>
                            <button type="reset" class="btn btn-outline-secondary mt-1">Discard</button>
                        </div>
                    </div>
                </form>
                <!--/ form -->
            </div>
        </div>

        <!-- two-step verification -->
        <div class="card">
            <div class="card-header border-bottom">
                <h4 class="card-title">Two-step verification</h4>
            </div>
            <div class="card-body my-2 py-25">
                <p class="fw-bolder">Two factor authentication is not enabled yet.</p>
                <p>
                    Two-factor authentication adds an additional layer of security to your account by requiring <br />
                    more than just a password to log in. Learn more.
                </p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#twoFactorAuthModal">
                    Enable two-factor authentication
                </button>
            </div>
        </div>
        <!-- / two-step verification -->


        <!-- api key list -->
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">API Key List & Access</h4>
            </div>
            <div class="card-body">
                <p class="card-text">
                    An API key is a simple encrypted string that identifies an application without any principal. They
                    are useful
                    for accessing public data anonymously, and are used to associate API requests with your project for
                    quota and
                    billing.
                </p>

                <div class="row gy-2">
                    <div class="col-12">
                        <div class="bg-light-secondary position-relative rounded p-2">
                            <div class="dropdown dropstart btn-pinned">
                                <button class="btn btn-icon rounded-circle hide-arrow dropdown-toggle p-0" type="button"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i data-feather="more-vertical" class="font-medium-4"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <i data-feather="edit-2" class="me-50"></i><span>Edit</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <i data-feather="trash-2" class="me-50"></i><span>Delete</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="d-flex align-items-center flex-wrap">
                                <h4 class="mb-1 me-1">Server Key 1</h4>
                                <span class="badge badge-light-primary mb-1">Full Access</span>
                            </div>
                            <h6 class="d-flex align-items-center fw-bolder">
                                <span class="me-50">23eaf7f0-f4f7-495e-8b86-fad3261282ac</span>
                                <span><i data-feather="copy" class="font-medium-4 cursor-pointer"></i></span>
                            </h6>
                            <span>Created on 28 Apr 2021, 18:20 GTM+4:10</span>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="bg-light-secondary position-relative rounded p-2">
                            <div class="dropdown dropstart btn-pinned">
                                <button class="btn btn-icon rounded-circle hide-arrow dropdown-toggle p-0" type="button"
                                    id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i data-feather="more-vertical" class="font-medium-4"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <i data-feather="edit-2" class="me-50"></i><span>Edit</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <i data-feather="trash-2" class="me-50"></i><span>Delete</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="d-flex align-items-center flex-wrap">
                                <h4 class="mb-1 me-1">Server Key 2</h4>
                                <span class="badge badge-light-primary mb-1">Read Only</span>
                            </div>
                            <h6 class="d-flex align-items-center fw-bolder">
                                <span class="me-50">bb98e571-a2e2-4de8-90a9-2e231b5e99</span>
                                <span><i data-feather="copy" class="font-medium-4 cursor-pointer"></i></span>
                            </h6>
                            <span>Created on 12 Feb 2021, 10:30 GTM+2:30</span>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="bg-light-secondary position-relative rounded p-2">
                            <div class="dropdown dropstart btn-pinned">
                                <button class="btn btn-icon rounded-circle hide-arrow dropdown-toggle p-0" type="button"
                                    id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i data-feather="more-vertical" class="font-medium-4"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <i data-feather="edit-2" class="me-50"></i><span>Edit</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <i data-feather="trash-2" class="me-50"></i><span>Delete</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="d-flex align-items-center flex-wrap">
                                <h4 class="mb-1 me-1">Server Key 3</h4>
                                <span class="badge badge-light-primary mb-1">Full Access</span>
                            </div>
                            <h6 class="d-flex align-items-center fw-bolder">
                                <span class="me-50">2e915e59-3105-47f2-8838-6e46bf83b711</span>
                                <span><i data-feather="copy" class="font-medium-4 cursor-pointer"></i></span>
                            </h6>
                            <span>Created on 28 Apr 2021, 12:21 GTM+4:10</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / api key list -->

        <!-- recent device -->
        <div class="card">
            <div class="card-header border-bottom">
                <h4 class="card-title">Recent devices</h4>
            </div>
            <div class="card-body my-2 py-25">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap text-center">
                        <thead>
                            <tr>
                                <th class="text-start">BROWSER</th>
                                <th>DEVICE</th>
                                <th>LOCATION</th>
                                <th>RECENT ACTIVITY</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-start">
                                    <div class="avatar me-25">
                                        <img src="{{ URL::asset('/bundleku/app-assets/images/icons/google-chrome.png') }}" alt="avatar"
                                            width="20" height="20" />
                                    </div>
                                    <span class="fw-bolder">Chrome on Windows</span>
                                </td>
                                <td>Dell XPS 15</td>
                                <td>United States</td>
                                <td>10, Jan 2021 20:07</td>
                            </tr>
                            <tr>
                                <td class="text-start">
                                    <div class="avatar me-25">
                                        <img src="{{ URL::asset('/bundleku/app-assets/images/icons/google-chrome.png') }}" alt="avatar"
                                            width="20" height="20" />
                                    </div>
                                    <span class="fw-bolder">Chrome on Android</span>
                                </td>
                                <td>Google Pixel 3a</td>
                                <td>Ghana</td>
                                <td>11, Jan 2021 10:16</td>
                            </tr>
                            <tr>
                                <td class="text-start">
                                    <div class="avatar me-25">
                                        <img src="{{ URL::asset('/bundleku/app-assets/images/icons/google-chrome.png') }}" alt="avatar"
                                            width="20" height="20" />
                                    </div>
                                    <span class="fw-bolder">Chrome on MacOS</span>
                                </td>
                                <td>Apple iMac</td>
                                <td>Mayotte</td>
                                <td>11, Jan 2021 12:10</td>
                            </tr>
                            <tr>
                                <td class="text-start">
                                    <div class="avatar me-25">
                                        <img src="{{ URL::asset('/bundleku/app-assets/images/icons/google-chrome.png') }}" alt="avatar"
                                            width="20" height="20" />
                                    </div>
                                    <span class="fw-bolder">Chrome on iPhone</span>
                                </td>
                                <td>Apple iPhone XR</td>
                                <td>Mauritania</td>
                                <td>12, Jan 2021 8:29</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- / recent device -->

        <!--/ security -->
    </div>
</div>
@endsection
