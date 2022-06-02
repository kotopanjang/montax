@extends('master-blade.master')


@section('konten_bar')
@include('master-blade.leftbar.masterbar')
@endsection

@section('konten_body')

    <!-- Dashboard Ecommerce Starts -->
    <section id="dashboard-ecommerce">
        <div class="row match-height">

            <!-- Statistics Card -->
            <div class="col-xl-8 col-md-6 col-12">
                <div class="card card-statistics">
                    <div class="card-header">
                        <h4 class="card-title">Statistics</h4>
                        <div class="d-flex align-items-center">
                            <p class="card-text font-small-2 me-25 mb-0">Updated 1 month ago</p>
                        </div>
                    </div>
                    <div class="card-body statistics-body">
                        <div class="row">
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                <div class="d-flex flex-row">
                                    <div class="avatar bg-light-primary me-2">
                                        <div class="avatar-content">
                                            <i data-feather="trending-up" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="fw-bolder mb-0">230k</h4>
                                        <p class="card-text font-small-3 mb-0">Pemasukan</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                <div class="d-flex flex-row">
                                    <div class="avatar bg-light-info me-2">
                                        <div class="avatar-content">
                                            <i data-feather="user" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="fw-bolder mb-0">8.549k</h4>
                                        <p class="card-text font-small-3 mb-0">Pengurangan</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                <div class="d-flex flex-row">
                                    <div class="avatar bg-light-danger me-2">
                                        <div class="avatar-content">
                                            <i data-feather="box" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="fw-bolder mb-0">1.423k</h4>
                                        <p class="card-text font-small-3 mb-0">Aset Non Investasi</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12">
                                <div class="d-flex flex-row">
                                    <div class="avatar bg-light-success me-2">
                                        <div class="avatar-content">
                                            <i data-feather="dollar-sign" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="fw-bolder mb-0">$9745</h4>
                                        <p class="card-text font-small-3 mb-0">Investasi</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Statistics Card -->

            <!-- Medal Card -->
            <div class="col-xl-4 col-md-6 col-12">
                <div class="card card-congratulation-medal">
                    <div class="card-body">
                        <h5>Congratulations {{Auth::user()->nama_lengkap}} 🎉  <br> for Your Subscription!</h5>
                        <p class="card-text font-small-3">Your subscription end at ::::::::::::</p>
                        <h3 class="mb-75 mt-2 pt-50">
                            {{-- <a href="#">$48.9k</a> --}}
                        </h3>
                        <button type="button" class="btn btn-primary">View Another Plan</button>
                        <br><br>
                        <div style="text-align: right; color:navy; background-color: yellow;">Nanti sekalian gabungin ama pembayaran</div>
                        <img src="{{ URL::asset('/bundleku/app-assets/images/illustration/badge.svg') }}"
                            class="congratulation-medal" alt="Medal Pic" />
                        @yield('content')
                        @yield('content-1')
                    </div>
                </div>
            </div>
            <!--/ Medal Card -->

        </div>

        <div class="row match-height">

            <!-- Tabungan Card -->
            <div class="col-xl-8 col-md-6 col-12">
                <div class="card card-statistics">
                    <div class="card-header">
                        <h4 class="card-title">Tabungan </h4>
                        <div class="d-flex align-items-center">
                            <p class="card-text font-small-2 me-25 mb-0">Updated 1 month ago</p>
                        </div>
                    </div>
                    <div class="card-body statistics-body">
                        <div class="row">
                            <div class="row row-cols-1 row-cols-md-3 mb-2">
                                @foreach ($sumber_dana as $sumber_dana_row)
                                <div class="col">
                                    <div class="card h-70 border">
                                        @if ($sumber_dana_row->Jenis == "BANK")
                                        <img class="card-img-top" src="{{ URL::asset('/bundleku/app-assets/images/slider/01.jpg') }}" alt="Card image" />
                                        @else
                                        <img class="card-img-top" src="{{ URL::asset('/bundleku/app-assets/images/slider/02.jpg') }}" alt="Card image" />
                                        @endif

                                        <div class="card-body">
                                            @if ($sumber_dana_row->Jenis == "BANK")
                                            <h3 class="card-title">{{$sumber_dana_row->Jenis}} - {{$sumber_dana_row->Inisial}}</h3>
                                            <h4>({{$sumber_dana_row->No_Rekening}} )</h4>
                                            @else
                                            <h3 class="card-title mb-0">{{$sumber_dana_row->Jenis}}</h3>
                                            {{-- <h4>&nbsp; &nbsp; &nbsp;</h4> --}}
                                            @endif
                                            <?php $total = 0; $totalmasuk = 0; $totalkeluar = 0;?>
                                            <p class="card-text">
                                                @foreach ($pemasukan as $pemasukan_row)
                                                @if ($pemasukan_row->Masuk_Ke == $sumber_dana_row->ID_Record)
                                                    <?php $totalmasuk = $totalmasuk +  $pemasukan_row->Jumlah; ?>
                                                @endif
                                                @endforeach
                                                @foreach ($pengeluaran as $pengeluaran_row)
                                                @if ($pengeluaran_row->Sumber_Dana == $sumber_dana_row->ID_Record)
                                                    <?php $totalkeluar = $totalkeluar +  $pengeluaran_row->Jumlah; ?>
                                                @endif
                                                @endforeach
                                                <?php $total = $totalmasuk - $totalkeluar ?>
                                                <h3><?php echo "RP." . number_format($total,2,',','.') ?></h3>
                                                <?php $total = 0;?>
                                            </p>
                                        </div>
                                        <div class="card-footer">
                                            <small class="text-muted">Last updated 3 mins ago</small>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @foreach ($sumber_rdn as $sumber_rdn_row)
                                <div class="col">
                                    <div class="card h-70 border">
                                        <img class="card-img-top" src="{{ URL::asset('/bundleku/app-assets/images/slider/02.jpg') }}" alt="Card image" />

                                        <div class="card-body">
                                            <h3 class="card-title mb-0">{{$sumber_rdn_row->namasekuritas}} | {{$sumber_rdn_row->Inisial_RDN}}</h3>
                                            <h4>({{$sumber_rdn_row->No_Rekening}} )</h4>
                                            {{-- <h4>&nbsp; &nbsp; &nbsp;</h4> --}}
                                            <?php $total = 0; $totaldepo = 0; $totalwithdraw = 0; $totalbuy = 0; $totalsell = 0;?>
                                            <p class="card-text">
                                                @foreach ($mutasi_rdn_depo as $depo_row)
                                                @if ($depo_row->Transfer_Ke == $sumber_rdn_row->ID_Record)
                                                    <?php $totaldepo = $totaldepo +  $depo_row->Jumlah; ?>
                                                @endif
                                                @endforeach
                                                @foreach ($mutasi_rdn_withdraw as $withdraw_row)
                                                @if ($withdraw_row->Transfer_Ke == $sumber_rdn_row->ID_Record)
                                                    <?php $totalwithdraw = $totalwithdraw +  $withdraw_row->Jumlah; ?>
                                                @endif
                                                @endforeach
                                                @foreach ($buy_saham as $buy_row)
                                                @if ($buy_row->Masuk_Ke == $sumber_rdn_row->ID_Record)
                                                    <?php $totalbuy = $totalbuy +  $buy_row->Harga_Total; ?>
                                                @endif
                                                @endforeach
                                                @foreach ($sell_saham as $sell_row)
                                                @if ($sell_row->Masuk_Ke == $sumber_rdn_row->ID_Record)
                                                    <?php $totalsell = $totalsell +  $sell_row->Harga_Total; ?>
                                                @endif
                                                @endforeach
                                                <?php $total = $totaldepo - $totalwithdraw - $totalbuy + $totalsell; ?>
                                                <?php 
                                                    echo "Depo RP." . number_format($totaldepo,2,',','.') . "<br>";
                                                    echo "WD RP." . number_format($totalwithdraw,2,',','.') . "<br>";
                                                    echo "Buy RP." . number_format($totalbuy,2,',','.') . "<br>";
                                                    echo "Sell RP." . number_format($totalsell,2,',','.') . "<br>";
                                                ?>
                                                <h3><?php echo "RP." . number_format($total,2,',','.'); ?></h3>
                                                <?php $total = 0;?>
                                            </p>
                                        </div>
                                        <div class="card-footer">
                                            <small class="text-muted">Last updated 3 mins ago</small>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Tabungan Card -->

            <!--/ Add Tabungan Card -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card card-developer-meetup">
                    <div class="meetup-img-wrapper rounded-top text-center">
                        <img src="{{ URL::asset('/bundleku/app-assets/images/illustration/email.svg') }}" alt="Meeting Pic"
                            height="170" />
                    </div>
                    <div class="card-body">
                        <div class="meetup-header d-flex align-items-center">
                            {{-- <div class="meetup-day">
                                <h6 class="mb-0">THU</h6>
                                <h3 class="mb-0">24</h3>
                            </div> --}}
                            <div class="my-auto">
                                <h4 class="card-title mb-25">Add Daftar Tabungan Disini</h4>
                                <p class="card-text mb-0">Penambahan Sumber Dana yang dimiliki</p>
                            </div>
                        </div>
                        <div>
                            <form class="form form-horizontal" action="{{ URL::route('post_tabungan')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="pilJenisSumber">Sumber
                                                    Dana</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="grid"></i></span>
                                                    <select name="pilJenisSumber" id="pilJenisSumber" class="form-control">
                                                        <option value="1">Kas</option>
                                                        <option value="2">Rekening Bank</option>
                                                        <option value="3">RDN</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="txtInisial">Inisial</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="smile"></i></span>
                                                    <input type="text" id="txtInisial" class="form-control" name="txtInisial"
                                                        placeholder="Inisial Sumber Dana" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" name="group_bank" id="group_bank" style="display: none;">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="txtBank">Bank</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <select name="pilRekening" id="pilRekening" class="form-control">
                                                        <option value="--">Pilih Bank</option>
                                                        @foreach ($kategori_bank as $rowk_kategori_bank)
                                                        <optgroup label="{{$rowk_kategori_bank->jenis}}">
                                                            @foreach ($bank as $rowbank)
                                                            @if ($rowk_kategori_bank->jenis == $rowbank->jenis)
                                                            <option value="{{$rowbank->kode_bank}}">{{$rowbank->nama_bank}}</option>
                                                            @endif
                                                            @endforeach
                                                        </optgroup>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" name="group_rdn" id="group_rdn" style="display: none;">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="txtSekuritas">Sekuritas</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <select name="pilSekuritas" id="pilSekuritas" class="form-control">
                                                        <option value="--">Pilih Sekuritas</option>
                                                        @foreach ($RDN as $row_kategori_rdn)
                                                        <option value="{{$row_kategori_rdn->ID_Records}}">{{$row_kategori_rdn->Nama}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="txtNoRekening">Nomor Rekening</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="edit-2"></i></span>
                                                    <input type="number" id="txtNoRekening" class="form-control" name="txtNoRekening"
                                                        placeholder="Nomor Rekening" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1 row">
                                            <div class="col-sm-3">
                                                <label class="col-form-label" for="txtPemilikRekening">Pemilik Rekening</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text"><i data-feather="smile"></i></span>
                                                    <input type="text" id="txtPemilikRekening" class="form-control" name="txtPemilikRekening"
                                                        placeholder="Pemilik Rekening" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-9 offset-sm-3">
                                        <button type="submit" name="btnSubmit" class="btn btn-primary me-1">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Add Tabungan Card -->
        </div>

        {{-- <div class="row match-height">
            <!-- Company Table Card -->
            <div class="col-lg-8 col-12">
                <div class="card card-company-table">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Company</th>
                                        <th>Category</th>
                                        <th>Views</th>
                                        <th>Revenue</th>
                                        <th>Sales</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar rounded">
                                                    <div class="avatar-content">
                                                        <img src="{{ URL::asset('/bundleku/app-assets/images/icons/toolbox.svg') }}"
                                                            alt="Toolbar svg" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="fw-bolder">Dixons</div>
                                                    <div class="font-small-2 text-muted">meguc@ruj.io</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar bg-light-primary me-1">
                                                    <div class="avatar-content">
                                                        <i data-feather="monitor" class="font-medium-3"></i>
                                                    </div>
                                                </div>
                                                <span>Technology</span>
                                            </div>
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="d-flex flex-column">
                                                <span class="fw-bolder mb-25">23.4k</span>
                                                <span class="font-small-2 text-muted">in 24 hours</span>
                                            </div>
                                        </td>
                                        <td>$891.2</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="fw-bolder me-1">68%</span>
                                                <i data-feather="trending-down"
                                                    class="text-danger font-medium-1"></i>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar rounded">
                                                    <div class="avatar-content">
                                                        <img src="{{ URL::asset('/bundleku/app-assets/images/icons/parachute.svg') }}"
                                                            alt="Parachute svg" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="fw-bolder">Motels</div>
                                                    <div class="font-small-2 text-muted">vecav@hodzi.co.uk
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar bg-light-success me-1">
                                                    <div class="avatar-content">
                                                        <i data-feather="coffee" class="font-medium-3"></i>
                                                    </div>
                                                </div>
                                                <span>Grocery</span>
                                            </div>
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="d-flex flex-column">
                                                <span class="fw-bolder mb-25">78k</span>
                                                <span class="font-small-2 text-muted">in 2 days</span>
                                            </div>
                                        </td>
                                        <td>$668.51</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="fw-bolder me-1">97%</span>
                                                <i data-feather="trending-up"
                                                    class="text-success font-medium-1"></i>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar rounded">
                                                    <div class="avatar-content">
                                                        <img src="{{ URL::asset('/bundleku/app-assets/images/icons/brush.svg') }}"
                                                            alt="Brush svg" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="fw-bolder">Zipcar</div>
                                                    <div class="font-small-2 text-muted">davcilse@is.gov
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar bg-light-warning me-1">
                                                    <div class="avatar-content">
                                                        <i data-feather="watch" class="font-medium-3"></i>
                                                    </div>
                                                </div>
                                                <span>Fashion</span>
                                            </div>
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="d-flex flex-column">
                                                <span class="fw-bolder mb-25">162</span>
                                                <span class="font-small-2 text-muted">in 5 days</span>
                                            </div>
                                        </td>
                                        <td>$522.29</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="fw-bolder me-1">62%</span>
                                                <i data-feather="trending-up"
                                                    class="text-success font-medium-1"></i>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar rounded">
                                                    <div class="avatar-content">
                                                        <img src="{{ URL::asset('/bundleku/app-assets/images/icons/star.svg') }}"
                                                            alt="Star svg" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="fw-bolder">Owning</div>
                                                    <div class="font-small-2 text-muted">us@cuhil.gov</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar bg-light-primary me-1">
                                                    <div class="avatar-content">
                                                        <i data-feather="monitor" class="font-medium-3"></i>
                                                    </div>
                                                </div>
                                                <span>Technology</span>
                                            </div>
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="d-flex flex-column">
                                                <span class="fw-bolder mb-25">214</span>
                                                <span class="font-small-2 text-muted">in 24 hours</span>
                                            </div>
                                        </td>
                                        <td>$291.01</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="fw-bolder me-1">88%</span>
                                                <i data-feather="trending-up"
                                                    class="text-success font-medium-1"></i>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar rounded">
                                                    <div class="avatar-content">
                                                        <img src="{{ URL::asset('/bundleku/app-assets/images/icons/book.svg') }}"
                                                            alt="Book svg" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="fw-bolder">Cafés</div>
                                                    <div class="font-small-2 text-muted">pudais@jife.com
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar bg-light-success me-1">
                                                    <div class="avatar-content">
                                                        <i data-feather="coffee" class="font-medium-3"></i>
                                                    </div>
                                                </div>
                                                <span>Grocery</span>
                                            </div>
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="d-flex flex-column">
                                                <span class="fw-bolder mb-25">208</span>
                                                <span class="font-small-2 text-muted">in 1 week</span>
                                            </div>
                                        </td>
                                        <td>$783.93</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="fw-bolder me-1">16%</span>
                                                <i data-feather="trending-down"
                                                    class="text-danger font-medium-1"></i>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar rounded">
                                                    <div class="avatar-content">
                                                        <img src="{{ URL::asset('/bundleku/app-assets/images/icons/rocket.svg') }}"
                                                            alt="Rocket svg" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="fw-bolder">Kmart</div>
                                                    <div class="font-small-2 text-muted">bipri@cawiw.com
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar bg-light-warning me-1">
                                                    <div class="avatar-content">
                                                        <i data-feather="watch" class="font-medium-3"></i>
                                                    </div>
                                                </div>
                                                <span>Fashion</span>
                                            </div>
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="d-flex flex-column">
                                                <span class="fw-bolder mb-25">990</span>
                                                <span class="font-small-2 text-muted">in 1 month</span>
                                            </div>
                                        </td>
                                        <td>$780.05</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="fw-bolder me-1">78%</span>
                                                <i data-feather="trending-up"
                                                    class="text-success font-medium-1"></i>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar rounded">
                                                    <div class="avatar-content">
                                                        <img src="{{ URL::asset('/bundleku/app-assets/images/icons/speaker.svg') }}"
                                                            alt="Speaker svg" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="fw-bolder">Payers</div>
                                                    <div class="font-small-2 text-muted">luk@izug.io</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar bg-light-warning me-1">
                                                    <div class="avatar-content">
                                                        <i data-feather="watch" class="font-medium-3"></i>
                                                    </div>
                                                </div>
                                                <span>Fashion</span>
                                            </div>
                                        </td>
                                        <td class="text-nowrap">
                                            <div class="d-flex flex-column">
                                                <span class="fw-bolder mb-25">12.9k</span>
                                                <span class="font-small-2 text-muted">in 12 hours</span>
                                            </div>
                                        </td>
                                        <td>$531.49</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="fw-bolder me-1">42%</span>
                                                <i data-feather="trending-up"
                                                    class="text-success font-medium-1"></i>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Company Table Card -->

            <!-- Developer Meetup Card -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card card-developer-meetup">
                    <div class="meetup-img-wrapper rounded-top text-center">
                        <img src="{{ URL::asset('/bundleku/app-assets/images/illustration/email.svg') }}" alt="Meeting Pic"
                            height="170" />
                    </div>
                    <div class="card-body">
                        <div class="meetup-header d-flex align-items-center">
                            <div class="meetup-day">
                                <h6 class="mb-0">THU</h6>
                                <h3 class="mb-0">24</h3>
                            </div>
                            <div class="my-auto">
                                <h4 class="card-title mb-25">Developer Meetup</h4>
                                <p class="card-text mb-0">Meet world popular developers</p>
                            </div>
                        </div>
                        <div class="mt-0">
                            <div class="avatar float-start bg-light-primary rounded me-1">
                                <div class="avatar-content">
                                    <i data-feather="calendar" class="avatar-icon font-medium-3"></i>
                                </div>
                            </div>
                            <div class="more-info">
                                <h6 class="mb-0">Sat, May 25, 2020</h6>
                                <small>10:AM to 6:PM</small>
                            </div>
                        </div>
                        <div class="mt-2">
                            <div class="avatar float-start bg-light-primary rounded me-1">
                                <div class="avatar-content">
                                    <i data-feather="map-pin" class="avatar-icon font-medium-3"></i>
                                </div>
                            </div>
                            <div class="more-info">
                                <h6 class="mb-0">Central Park</h6>
                                <small>Manhattan, New york City</small>
                            </div>
                        </div>
                        <div class="avatar-group">
                            <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                data-bs-placement="bottom" title="Billy Hopkins" class="avatar pull-up">
                                <img src="{{ URL::asset('/bundleku/app-assets/images/portrait/small/avatar-s-9.jpg') }}"
                                    alt="Avatar" width="33" height="33" />
                            </div>
                            <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                data-bs-placement="bottom" title="Amy Carson" class="avatar pull-up">
                                <img src="{{ URL::asset('/bundleku/app-assets/images/portrait/small/avatar-s-6.jpg') }}"
                                    alt="Avatar" width="33" height="33" />
                            </div>
                            <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                data-bs-placement="bottom" title="Brandon Miles" class="avatar pull-up">
                                <img src="{{ URL::asset('/bundleku/app-assets/images/portrait/small/avatar-s-8.jpg') }}"
                                    alt="Avatar" width="33" height="33" />
                            </div>
                            <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                data-bs-placement="bottom" title="Daisy Weber" class="avatar pull-up">
                                <img src="{{ URL::asset('/bundleku/app-assets/images/portrait/small/avatar-s-20.jpg') }}"
                                    alt="Avatar" width="33" height="33" />
                            </div>
                            <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                data-bs-placement="bottom" title="Jenny Looper" class="avatar pull-up">
                                <img src="{{ URL::asset('/bundleku/app-assets/images/portrait/small/avatar-s-20.jpg') }}"
                                    alt="Avatar" width="33" height="33" />
                            </div>
                            <h6 class="align-self-center cursor-pointer ms-50 mb-0">+42</h6>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Developer Meetup Card -->

            <!-- Browser States Card -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card card-browser-states">
                    <div class="card-header">
                        <div>
                            <h4 class="card-title">Browser States</h4>
                            <p class="card-text font-small-2">Counter August 2020</p>
                        </div>
                        <div class="dropdown chart-dropdown">
                            <i data-feather="more-vertical" class="font-medium-3 cursor-pointer"
                                data-bs-toggle="dropdown"></i>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Last 28 Days</a>
                                <a class="dropdown-item" href="#">Last Month</a>
                                <a class="dropdown-item" href="#">Last Year</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="browser-states">
                            <div class="d-flex">
                                <img src="{{ URL::asset('/bundleku/app-assets/images/icons/google-chrome.png') }}"
                                    class="rounded me-1" height="30" alt="Google Chrome" />
                                <h6 class="align-self-center mb-0">Google Chrome</h6>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="fw-bold text-body-heading me-1">54.4%</div>
                                <div id="browser-state-chart-primary"></div>
                            </div>
                        </div>
                        <div class="browser-states">
                            <div class="d-flex">
                                <img src="{{ URL::asset('/bundleku/app-assets/images/icons/mozila-firefox.png') }}"
                                    class="rounded me-1" height="30" alt="Mozila Firefox" />
                                <h6 class="align-self-center mb-0">Mozila Firefox</h6>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="fw-bold text-body-heading me-1">6.1%</div>
                                <div id="browser-state-chart-warning"></div>
                            </div>
                        </div>
                        <div class="browser-states">
                            <div class="d-flex">
                                <img src="{{ URL::asset('/bundleku/app-assets/images/icons/apple-safari.png') }}"
                                    class="rounded me-1" height="30" alt="Apple Safari" />
                                <h6 class="align-self-center mb-0">Apple Safari</h6>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="fw-bold text-body-heading me-1">14.6%</div>
                                <div id="browser-state-chart-secondary"></div>
                            </div>
                        </div>
                        <div class="browser-states">
                            <div class="d-flex">
                                <img src="{{ URL::asset('/bundleku/app-assets/images/icons/internet-explorer.png') }}"
                                    class="rounded me-1" height="30" alt="Internet Explorer" />
                                <h6 class="align-self-center mb-0">Internet Explorer</h6>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="fw-bold text-body-heading me-1">4.2%</div>
                                <div id="browser-state-chart-info"></div>
                            </div>
                        </div>
                        <div class="browser-states">
                            <div class="d-flex">
                                <img src="{{ URL::asset('/bundleku/app-assets/images/icons/opera.png') }}" class="rounded me-1"
                                    height="30" alt="Opera Mini" />
                                <h6 class="align-self-center mb-0">Opera Mini</h6>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="fw-bold text-body-heading me-1">8.4%</div>
                                <div id="browser-state-chart-danger"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Browser States Card -->

            <!-- Goal Overview Card -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Goal Overview</h4>
                        <i data-feather="help-circle" class="font-medium-3 text-muted cursor-pointer"></i>
                    </div>
                    <div class="card-body p-0">
                        <div id="goal-overview-radial-bar-chart" class="my-2"></div>
                        <div class="row border-top text-center mx-0">
                            <div class="col-6 border-end py-1">
                                <p class="card-text text-muted mb-0">Completed</p>
                                <h3 class="fw-bolder mb-0">786,617</h3>
                            </div>
                            <div class="col-6 py-1">
                                <p class="card-text text-muted mb-0">In Progress</p>
                                <h3 class="fw-bolder mb-0">13,561</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Goal Overview Card -->

            <!-- Transaction Card -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card card-transaction">
                    <div class="card-header">
                        <h4 class="card-title">Transactions</h4>
                        <div class="dropdown chart-dropdown">
                            <i data-feather="more-vertical" class="font-medium-3 cursor-pointer"
                                data-bs-toggle="dropdown"></i>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Last 28 Days</a>
                                <a class="dropdown-item" href="#">Last Month</a>
                                <a class="dropdown-item" href="#">Last Year</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="transaction-item">
                            <div class="d-flex">
                                <div class="avatar bg-light-primary rounded float-start">
                                    <div class="avatar-content">
                                        <i data-feather="pocket" class="avatar-icon font-medium-3"></i>
                                    </div>
                                </div>
                                <div class="transaction-percentage">
                                    <h6 class="transaction-title">Wallet</h6>
                                    <small>Starbucks</small>
                                </div>
                            </div>
                            <div class="fw-bolder text-danger">- $74</div>
                        </div>
                        <div class="transaction-item">
                            <div class="d-flex">
                                <div class="avatar bg-light-success rounded float-start">
                                    <div class="avatar-content">
                                        <i data-feather="check" class="avatar-icon font-medium-3"></i>
                                    </div>
                                </div>
                                <div class="transaction-percentage">
                                    <h6 class="transaction-title">Bank Transfer</h6>
                                    <small>Add Money</small>
                                </div>
                            </div>
                            <div class="fw-bolder text-success">+ $480</div>
                        </div>
                        <div class="transaction-item">
                            <div class="d-flex">
                                <div class="avatar bg-light-danger rounded float-start">
                                    <div class="avatar-content">
                                        <i data-feather="dollar-sign" class="avatar-icon font-medium-3"></i>
                                    </div>
                                </div>
                                <div class="transaction-percentage">
                                    <h6 class="transaction-title">Paypal</h6>
                                    <small>Add Money</small>
                                </div>
                            </div>
                            <div class="fw-bolder text-success">+ $590</div>
                        </div>
                        <div class="transaction-item">
                            <div class="d-flex">
                                <div class="avatar bg-light-warning rounded float-start">
                                    <div class="avatar-content">
                                        <i data-feather="credit-card" class="avatar-icon font-medium-3"></i>
                                    </div>
                                </div>
                                <div class="transaction-percentage">
                                    <h6 class="transaction-title">Mastercard</h6>
                                    <small>Ordered Food</small>
                                </div>
                            </div>
                            <div class="fw-bolder text-danger">- $23</div>
                        </div>
                        <div class="transaction-item">
                            <div class="d-flex">
                                <div class="avatar bg-light-info rounded float-start">
                                    <div class="avatar-content">
                                        <i data-feather="trending-up" class="avatar-icon font-medium-3"></i>
                                    </div>
                                </div>
                                <div class="transaction-percentage">
                                    <h6 class="transaction-title">Transfer</h6>
                                    <small>Refund</small>
                                </div>
                            </div>
                            <div class="fw-bolder text-success">+ $98</div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Transaction Card -->
        </div> --}}
    </section>
    <!-- Dashboard Ecommerce ends -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script>
        $(document).ready(function (){
            $("#txtNoRekening").attr('disabled', true);
            $("#txtPemilikRekening").attr('disabled', true);
            // $("#pilRekening").attr('disabled', true);
            $("#group_bank").css("display","none");
            $("#group_rdn").css("display","none");
        });

        $('#pilJenisSumber').on('change', function (e) {
            // var optionSelected = $("option:selected", this);
            // var valueSelected = this.value;

            var optionSelected = $(this).find("option:selected");
            var valueSelected = optionSelected.val();
            var textSelected = optionSelected.text();
            // alert("pilih jenisumber: " + textSelected + " | " + valueSelected);

            if(valueSelected == 1) //kalau pilih kas tunai
            {
                // $("#pilJenisPT").val($("#target option:first").val()).change();
                // $("#pilRekening").prop("selectedIndex", 0);
                // $("#pilRekening").attr('disabled', true);
                $("#group_bank").css("display","none");
                $("#txtNoRekening").attr('disabled', true);
                $("#txtPemilikRekening").attr('disabled', true);
                $("#group_rdn").css("display","none");
            }
            if(valueSelected == 2) //kalau pilih ke rekening
            {
                // $("#pilRekening").attr('disabled', false);
                $("#group_bank").css("display","block");
                $("#txtNoRekening").attr('disabled', false);
                $("#txtPemilikRekening").attr('disabled', false);
                $("#group_rdn").css("display","none");
            }
            if(valueSelected == 3) //kalau pilih rdn
            {
                // $("#pilRekening").attr('disabled', false);
                $("#group_bank").css("display","none");
                $("#txtNoRekening").attr('disabled', false);
                $("#txtPemilikRekening").attr('disabled', false);
                $("#group_rdn").css("display","block");
            }
        });

        var myurl = "<?php echo URL::to('/'); ?>";
    </script>
@endsection
