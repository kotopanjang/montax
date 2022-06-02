<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
    <li class=" nav-item"><a class="d-flex align-items-center" href="{{route('dashboard')}}"><i
                data-feather="home"></i><span class="menu-title text-truncate"
                data-i18n="Dashboards">Dashboards</span><span
                class="badge badge-light-warning rounded-pill ms-auto me-1">2</span></a>
        {{-- <ul class="menu-content">
            <li><a class="d-flex align-items-center" href="{{route('dashboard')}}"><i data-feather="circle"></i><span
                        class="menu-item text-truncate" data-i18n="Analytics">Analytics</span></a>
            </li>
            <li class="active"><a class="d-flex align-items-center" href="dashboard-ecommerce.html"><i
            <li><a class="d-flex align-items-center" href="{{route('dashboard')}}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="eCommerce"></span></a>
            </li>
        </ul> --}}
    </li>
    <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Apps &amp; Pages</span><i
            data-feather="more-horizontal"></i>
    </li>
    <li class=" nav-item"><a class="d-flex align-items-center" href="{{route('pemasukan_WP')}}"><i
                data-feather="mail"></i><span class="menu-title text-truncate" data-i18n="Email">Pemasukan</span></a>
    </li>
    <li class=" nav-item"><a class="d-flex align-items-center" href="{{route('pengeluaran_WP')}}"><i
                data-feather="mail"></i><span class="menu-title text-truncate">Pengeluaran</span></a>
    </li>
    <li class=" nav-item"><a class="d-flex align-items-center" href="{{route('hutang_WP')}}"><i
                data-feather="mail"></i><span class="menu-title text-truncate">Hutang</span></a>
    </li>
    <li class="active nav-item"><a class="d-flex align-items-center" href="{{route('aset_WP')}}"><i
                data-feather="mail"></i><span class="menu-title text-truncate">Aset</span></a>
    </li>
    <li class=" nav-item"><a class="d-flex align-items-center" href="{{route('budgeting_WP')}}"><i
                data-feather="mail"></i><span class="menu-title text-truncate">Budgeting</span></a>
    </li>
    <li class=" nav-item"><a class="d-flex align-items-center" href="{{route('dana_impian_WP')}}"><i
                data-feather="mail"></i><span class="menu-title text-truncate">Dana Impian</span></a>
    </li>
    <li class=" nav-item"><a class="d-flex align-items-center" href="{{route('financial_check_up')}}"><i
                data-feather="mail"></i><span class="menu-title text-truncate" data-i18n="Email">Financial Check Up</span></a>
    </li>
    <li class=" nav-item"><a class="d-flex align-items-center"><i
                data-feather="mail"></i><span class="menu-title text-truncate">SPT</span></a>
        <ul class="menu-content">
            <li><a class="d-flex align-items-center" href="{{route('SPT_BuktiPotong_WP')}}"><i data-feather="circle"></i><span
                        class="menu-item text-truncate" data-i18n="Bukti Potong">Bukti Potong</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="{{route('SPT_Dashboard_Panduan_WP')}}"><i data-feather="circle"></i><span
                        class="menu-item text-truncate" data-i18n="Panduan">Panduan</span></a>
            </li>
        </ul>
    </li>
    {{-- <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span
                class="menu-title text-truncate" data-i18n="Invoice">Invoice</span></a>
        <ul class="menu-content">
            <li><a class="d-flex align-items-center" href="app-invoice-list.html"><i data-feather="circle"></i><span
                        class="menu-item text-truncate" data-i18n="List">List</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="app-invoice-preview.html"><i data-feather="circle"></i><span
                        class="menu-item text-truncate" data-i18n="Preview">Preview</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="app-invoice-edit.html"><i data-feather="circle"></i><span
                        class="menu-item text-truncate" data-i18n="Edit">Edit</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="app-invoice-add.html"><i data-feather="circle"></i><span
                        class="menu-item text-truncate" data-i18n="Add">Add</span></a>
            </li>
        </ul>
    </li>
    <li class=" nav-item"><a class="d-flex align-items-center" href="modal-examples.html"><i
                data-feather="square"></i><span class="menu-title text-truncate" data-i18n="Modal Examples">Modal
                Examples</span></a>
    </li>
    <li class=" navigation-header"><span data-i18n="User Interface">User Interface</span><i
            data-feather="more-horizontal"></i>
    </li>
    <li class=" nav-item"><a class="d-flex align-items-center" href="ui-typography.html"><i
                data-feather="type"></i><span class="menu-title text-truncate"
                data-i18n="Typography">Typography</span></a>
    </li>
    <li class=" nav-item"><a class="d-flex align-items-center" href="ui-feather.html"><i data-feather="eye"></i><span
                class="menu-title text-truncate" data-i18n="Feather">Feather</span></a>
    </li>
    <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="credit-card"></i><span
                class="menu-title text-truncate" data-i18n="Card">Card</span><span
                class="badge badge-light-success rounded-pill ms-auto me-1">New</span></a>
        <ul class="menu-content">
            <li><a class="d-flex align-items-center" href="card-basic.html"><i data-feather="circle"></i><span
                        class="menu-item text-truncate" data-i18n="Basic">Basic</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="card-advance.html"><i data-feather="circle"></i><span
                        class="menu-item text-truncate" data-i18n="Advance">Advance</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="card-statistics.html"><i data-feather="circle"></i><span
                        class="menu-item text-truncate" data-i18n="Statistics">Statistics</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="card-analytics.html"><i data-feather="circle"></i><span
                        class="menu-item text-truncate" data-i18n="Analytics">Analytics</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="card-actions.html"><i data-feather="circle"></i><span
                        class="menu-item text-truncate" data-i18n="Card Actions">Card Actions</span></a>
            </li>
        </ul>
    </li>
    <li class=" navigation-header"><span data-i18n="Forms &amp; Tables">Forms &amp; Tables</span><i
            data-feather="more-horizontal"></i>
    </li>
    <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="grid"></i><span
                class="menu-title text-truncate" data-i18n="Datatable">Datatable</span></a>
        <ul class="menu-content">
            <li><a class="d-flex align-items-center" href="table-datatable-basic.html"><i
                        data-feather="circle"></i><span class="menu-item text-truncate"
                        data-i18n="Basic">Basic</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="table-datatable-advanced.html"><i
                        data-feather="circle"></i><span class="menu-item text-truncate"
                        data-i18n="Advanced">Advanced</span></a>
            </li>
        </ul>
    </li>
    <li class=" navigation-header"><span data-i18n="Charts &amp; Maps">Charts &amp; Maps</span><i
            data-feather="more-horizontal"></i>
    </li>
    <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="pie-chart"></i><span
                class="menu-title text-truncate" data-i18n="Charts">Charts</span><span
                class="badge badge-light-danger rounded-pill ms-auto me-2">2</span></a>
        <ul class="menu-content">
            <li><a class="d-flex align-items-center" href="chart-apex.html"><i data-feather="circle"></i><span
                        class="menu-item text-truncate" data-i18n="Apex">Apex</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="chart-chartjs.html"><i data-feather="circle"></i><span
                        class="menu-item text-truncate" data-i18n="Chartjs">Chartjs</span></a>
            </li>
        </ul>
    </li> --}}
</ul>
