@extends('master-blade.master')

@section('konten_bar')
    @include('master-blade.leftbar.bar_financial_check_up')
@endsection

@section('konten_header')
@endsection

@section('konten_body')
    <style type='text/css' rel='stylesheet'>
        canvas {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
        }

    </style>

    <div class="row match-height">
        <div class="col-lg-12 col-md-12 col-12">
            <div class="card">

                <div class="card-header d-flex justify-content-between align-items-center">
                    <h1>FINANCIAL CHECK UP</h1>
                    <select name="pilTahun" id="pilTahun" onchange="Ganti_Chart()">
                        @foreach ($tahun_wp as $isi_tahun)
                            @if ($isi_tahun == Date('Y'))
                                <option value="{{ $isi_tahun }}" selected>{{ $isi_tahun }}</option>
                            @else
                                <option value="{{ $isi_tahun }}">{{ $isi_tahun }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div id="hasil">

                </div>
            </div>
        </div>
    </div>

    <div class="row match-height">
        <div class="col-lg-6 col-md-6 col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Financial Overview</h4>
                    {{-- <i data-feather="help-circle" class="font-medium-3 text-muted cursor-pointer"></i> --}}
                </div>
                <div class="card-body p-0">
                    <div id="canvas-holder" style="width:100%">
                        <canvas id="chart"></canvas>
                    </div>
                    <br>
                    <div class="row border-top text-center mx-0">
                        <div class="col-12 py-3">
                            Deskripsi : masuk dalam kondisi sehat
                            {{-- <button id="randomizeData" class="btn w-100 btn-success">cob Data</button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Income Overview</h4>
                    {{-- <select name="pilTahun" id="pilTahun" onchange="Ganti_Chart()">
                  @foreach ($tahun_wp as $isi_tahun)
                    @if ($isi_tahun == Date('Y'))
                    <option value="{{$isi_tahun}}" selected>{{$isi_tahun}}</option>
                    @else
                    <option value="{{$isi_tahun}}">{{$isi_tahun}}</option>
                    @endif
                  @endforeach
                </select> --}}
                    <i data-feather="help-circle" class="font-medium-3 text-muted cursor-pointer"></i>
                </div>
                <div class="card-body p-0">
                    {{-- <div id="goal-overview-radial-bar-chart" class="my-2"></div> --}}
                    <div id="canvas-holder" style="width:100%">
                        <canvas id="chart_pemasukan"></canvas>
                    </div>
                    <br>
                    <div class="row border-top text-center mx-0">
                        <div class="col-6 border-end py-1">
                            <p class="card-text text-muted mb-0">Penghasilan Utama</p>
                            <h3 class="fw-bolder mb-0" name="title_penghasilan_utama" id="title_penghasilan_utama">
                                {{ $pemasukan_utama }}</h3>
                        </div>
                        <div class="col-6 py-1">
                            <p class="card-text text-muted mb-0">Penghasilan Tambahan</p>
                            <h3 class="fw-bolder mb-0" name="title_penghasilan_non_utama" id="title_penghasilan_non_utama">
                                {{ $pemasukan_non_utama }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row match-height">
        <div class="col-lg-6 col-md-6 col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Rasio Penghasilan dan Pengeluaran</h4>
                    <i data-feather="help-circle" class="font-medium-3 text-muted cursor-pointer"></i>
                </div>
                <div class="card-body p-0">
                    {{-- <div id="goal-overview-radial-bar-chart" class="my-2"></div> --}}
                    <div id="canvas-holder_pp" style="width:100%">
                        <canvas id="chart_rasio_pemasukan_pengeluaran"></canvas>
                    </div>
                    <br>
                    <div class="row border-top text-center mx-0">
                        <div class="col-6 border-end py-1">
                            {{-- <p class="card-text text-muted mb-0">Penghasilan Utama</p> --}}
                            {{-- <h3 class="fw-bolder mb-0">786,617</h3> --}}
                        </div>
                        <div class="col-6 py-1">
                            {{-- <p class="card-text text-muted mb-0">Penghasilan Tambahan</p> --}}
                            {{-- <h3 class="fw-bolder mb-0">13,561</h3> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Rasio Passive Income</h4>
                    <i data-feather="help-circle" class="font-medium-3 text-muted cursor-pointer"></i>
                </div>
                <div class="card-body p-0">
                    {{-- <div id="goal-overview-radial-bar-chart" class="my-2"></div> --}}
                    <div id="canvas-holder" style="width:100%">
                        <canvas id="chart_rasio_passive_income"></canvas>
                    </div>
                    <br>
                    <div class="row border-top text-center mx-0">
                        <div class="col-6 border-end py-1">
                            {{-- <p class="card-text text-muted mb-0">Penghasilan Utama</p> --}}
                            {{-- <h3 class="fw-bolder mb-0">786,617</h3> --}}
                        </div>
                        <div class="col-6 py-1">
                            {{-- <p class="card-text text-muted mb-0">Penghasilan Tambahan</p> --}}
                            {{-- <h3 class="fw-bolder mb-0">13,561</h3> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row match-height">
        <div class="col-lg-6 col-md-6 col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Distribusi Pemasukan</h4>
                    <i data-feather="help-circle" class="font-medium-3 text-muted cursor-pointer"></i>
                </div>
                <div class="card-body p-0">
                    {{-- <div id="goal-overview-radial-bar-chart" class="my-2"></div> --}}
                    <div id="canvas-holder" style="width:100%">
                        <canvas id="chart_distribusi_pemasukan"></canvas>
                    </div>
                    <br>
                    {{-- <div class="row border-top text-center mx-0">
                    <div class="col-6 border-end py-1">
                        <p class="card-text text-muted mb-0">Penghasilan Utama</p>
                        <h3 class="fw-bolder mb-0" name="title_penghasilan_utama" id="title_penghasilan_utama">
                            {{$pemasukan_utama}}</h3>
                    </div>
                    <div class="col-6 py-1">
                        <p class="card-text text-muted mb-0">Penghasilan Tambahan</p>
                        <h3 class="fw-bolder mb-0" name="title_penghasilan_non_utama" id="title_penghasilan_non_utama">
                            {{$pemasukan_non_utama}}</h3>
                    </div>
                </div> --}}
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Distribusi Pengeluaran</h4>
                    <i data-feather="help-circle" class="font-medium-3 text-muted cursor-pointer"></i>
                </div>
                <div class="card-body p-0">
                    {{-- <div id="goal-overview-radial-bar-chart" class="my-2"></div> --}}
                    <div id="canvas-holder" style="width:100%">
                        <canvas id="chart_distribusi_pengeluaran"></canvas>
                    </div>
                    <br>
                    {{-- <div class="row border-top text-center mx-0">
                    <div class="col-6 border-end py-1">
                        <p class="card-text text-muted mb-0">Penghasilan Utama</p>
                        <h3 class="fw-bolder mb-0" name="title_penghasilan_utama" id="title_penghasilan_utama">
                            {{$pemasukan_utama}}</h3>
                    </div>
                    <div class="col-6 py-1">
                        <p class="card-text text-muted mb-0">Penghasilan Tambahan</p>
                        <h3 class="fw-bolder mb-0" name="title_penghasilan_non_utama" id="title_penghasilan_non_utama">
                            {{$pemasukan_non_utama}}</h3>
                    </div>
                </div> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="row match-height">
        <div class="col-lg-6 col-md-6 col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Rasio Tabungan</h4>
                    <i data-feather="help-circle" class="font-medium-3 text-muted cursor-pointer"></i>
                </div>
                <div class="card-body p-0">
                    {{-- <div id="goal-overview-radial-bar-chart" class="my-2"></div> --}}
                    <div id="canvas-holder" style="width:100%">
                        <canvas id="chart_rasio_tabungan"></canvas>
                        {{-- <canvas id="openedCanvas" height="230" width="680"></canvas> --}}
                    </div>
                    <br>
                    <div class="row border-top text-center mx-0">
                        <div class="col-6 border-end py-1">
                            {{-- <p class="card-text text-muted mb-0">Penghasilan Utama</p> --}}
                            {{-- <h3 class="fw-bolder mb-0">786,617</h3> --}}
                        </div>
                        <div class="col-6 py-1">
                            {{-- <p class="card-text text-muted mb-0">Penghasilan Tambahan</p> --}}
                            {{-- <h3 class="fw-bolder mb-0">13,561</h3> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Rasio Dana Impian</h4>
                    <i data-feather="help-circle" class="font-medium-3 text-muted cursor-pointer"></i>
                </div>
                <div class="card-body p-0">
                    {{-- <div id="goal-overview-radial-bar-chart" class="my-2"></div> --}}
                    <div id="canvas-holder_di" style="width:100%">
                        <canvas id="chart_rasio_dana_impian"></canvas>
                    </div>
                    <br>
                    <div class="row border-top text-center mx-0">
                        <div class="col-6 border-end py-1">
                            {{-- <p class="card-text text-muted mb-0">Penghasilan Utama</p> --}}
                            {{-- <h3 class="fw-bolder mb-0">786,617</h3> --}}
                        </div>
                        <div class="col-6 py-1">
                            {{-- <p class="card-text text-muted mb-0">Penghasilan Tambahan</p> --}}
                            {{-- <h3 class="fw-bolder mb-0">13,561</h3> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row match-height">
        <div class="col-lg-6 col-md-6 col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Saran Rasio Sesuai Kondisi</h4>
                    <i data-feather="help-circle" class="font-medium-3 text-muted cursor-pointer"></i>
                </div>
                <div class="card-body p-0">
                    {{-- <div id="goal-overview-radial-bar-chart" class="my-2"></div> --}}
                    <div id="canvas-holder" style="width:100%">
                        <canvas id="chart_saran_rasio"></canvas>
                        {{-- <canvas id="openedCanvas" height="230" width="680"></canvas> --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Rasio Perbandingan Hutang vs Aset</h4>
                    <i data-feather="help-circle" class="font-medium-3 text-muted cursor-pointer"></i>
                </div>
                <div class="card-body p-0">
                    {{-- <div id="goal-overview-radial-bar-chart" class="my-2"></div> --}}
                    <div id="canvas-holder_di" style="width:100%">
                        <canvas id="chart_rasio_perbandingan_hutang_vs_asset"></canvas>
                    </div>
                    <br>
                    {{-- <div class="row border-top text-center mx-0">
                        <div class="col-6 border-end py-1">
                            
                        </div>
                        <div class="col-6 py-1">
                            
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="row match-height">
        <div class="col-lg-6 col-md-6 col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Rasio Kemampuan Pelunasan Hutang</h4>
                    <i data-feather="help-circle" class="font-medium-3 text-muted cursor-pointer"></i>
                </div>
                <div class="card-body p-0">
                    {{-- <div id="goal-overview-radial-bar-chart" class="my-2"></div> --}}
                    <div id="canvas-holder" style="width:100%">
                        <canvas id="chart_rasio_kemampuan_pelunasan_hutang"></canvas>
                        {{-- <canvas id="openedCanvas" height="230" width="680"></canvas> --}}
                    </div>
                </div>
                {{-- <br>
                <div class="row border-top text-center mx-0">
                    <div class="col-6 border-end py-1">
                        
                    </div>
                    <div class="col-6 py-1">
                        
                    </div>
                </div> --}}
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Rasio Perbandingan Nilai Bersih Aset Investasi vs Nilai Bersih Kekayaan</h4>
                    <i data-feather="help-circle" class="font-medium-3 text-muted cursor-pointer"></i>
                </div>
                <div class="card-body p-0">
                    {{-- <div id="goal-overview-radial-bar-chart" class="my-2"></div> --}}
                    <div id="canvas-holder_di" style="width:100%">
                        <canvas id="chart_rasio_perbandingan_investasi_vs_kekayaan"></canvas>
                    </div>
                    {{-- <br>
                    <div class="row border-top text-center mx-0">
                        <div class="col-6 border-end py-1">

                        </div>
                        <div class="col-6 py-1">
                            
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="row match-height">
        <div class="col-lg-6 col-md-6 col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Rasio Kemampuan Pelunasan Hutang</h4>
                    <i data-feather="help-circle" class="font-medium-3 text-muted cursor-pointer"></i>
                </div>
                <div class="card-body p-0">
                    {{-- <div id="goal-overview-radial-bar-chart" class="my-2"></div> --}}
                    <div id="canvas-holder" style="width:100%">
                        <canvas id="chart_rasio_perbandingan_nilai_bersih_assets_vs_nilai_bersih_kekayaan"></canvas>
                        {{-- <canvas id="openedCanvas" height="230" width="680"></canvas> --}}
                    </div>
                </div>
                {{-- <br>
                <div class="row border-top text-center mx-0">
                    <div class="col-6 border-end py-1">
                        
                    </div>
                    <div class="col-6 py-1">
                        
                    </div>
                </div> --}}
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Rasio Budgeting</h4>
                    <i data-feather="help-circle" class="font-medium-3 text-muted cursor-pointer"></i>
                </div>
                <div class="card-body p-0">
                    {{-- <div id="goal-overview-radial-bar-chart" class="my-2"></div> --}}
                    <div id="canvas-holder_di" style="width:100%">
                        <canvas id="chart_budget"></canvas>
                    </div>
                    {{-- <br>
                    <div class="row border-top text-center mx-0">
                        <div class="col-6 border-end py-1">

                        </div>
                        <div class="col-6 py-1">
                            
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://unpkg.com/chart.js@2.8.0/dist/Chart.bundle.js"></script>
    <script src="https://unpkg.com/chartjs-gauge@0.3.0/dist/chartjs-gauge.js"></script>
    <script src="https://unpkg.com/chartjs-plugin-datalabels@0.7.0/dist/chartjs-plugin-datalabels.js"></script>

    <script>
        var myurl = "<?php echo URL::to('/'); ?>";

        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
        var current_year = new Date().getFullYear();
        var chartpenghasilan;
        var chartrasiopertama;
        var chartrasiokedua;
        var chartdistribusipemasukan;
        var chartdistribusipengeluaran;
        var chartsaranrasio;
        var chartrasioperbandinganhutangvsasset;
        var chartrasiokemampuanpelunasanhutang;
        var chartrasioperbandinganinvestasivskekayaan;
        var chartrasioperbandingannilaibersihassetvssnilaibersihkekayaan;
        var chartbudget;
        Chart_FinancialOverview(current_year);
        Chart_IncomeOverview(current_year);
        Chart_RasioPenghasilanDanPengeluaran(current_year);
        Chart_RasioPassiveIncome(current_year);
        Chart_DistribusiPemasukan(current_year);
        Chart_DistribusiPengeluaran(current_year);
        Chart_RasioTabungan(current_year);
        Chart_DanaImpian(current_year);
        Chart_SaranRasio(current_year);
        Chart_PerbandinganHutangAsset(current_year);
        Chart_RasioKemampuanPelunasanHutang(current_year);
        Chart_RasioPerbandinganInvestasiVsKekayaan(current_year);
        Chart_RasioPerbandinganNilaiBersihAssetVsNilaiBersihKekayaan(current_year);
        Chart_Budgeting(current_year);

        //Combobox tahun pilih
        function Ganti_Chart() {
            var tahunpilih = $('#pilTahun').val();
            // alert("tahun " + tahunpilih);
            Chart_FinancialOverview(tahunpilih);
            Chart_IncomeOverview(tahunpilih);
            Chart_RasioPenghasilanDanPengeluaran(tahunpilih);
            Chart_RasioPassiveIncome(tahunpilih);
            Chart_DistribusiPemasukan(tahunpilih);
            Chart_DistribusiPengeluaran(tahunpilih);
            Chart_RasioTabungan(tahunpilih);
            Chart_DanaImpian(tahunpilih);
            Chart_SaranRasio(tahunpilih);
            Chart_PerbandinganHutangAsset(tahunpilih);
            Chart_RasioKemampuanPelunasanHutang(tahunpilih);
            Chart_RasioPerbandinganInvestasiVsKekayaan(tahunpilih);
            Chart_RasioPerbandinganNilaiBersihAssetVsNilaiBersihKekayaan(tahunpilih);
            Chart_Budgeting(tahunpilih);
        }

        function Chart_FinancialOverview(paramtahun) {
            var varparamtahun = paramtahun
            $.ajax({
                type: 'POST',
                url: myurl + '/FU_chart_FinancialOverview',
                data: {
                    idparamth: varparamtahun
                },
                cache: false,
                success: function(msg) {
                    // alert('pesan : ' + msg);
                    // Chart.helpers.each(Chart.instances, function (instance) {
                    //     instance.destroy();
                    // });
                    // $("#title_penghasilan_utama").html(msg.utama);
                    // $("#title_penghasilan_non_utama").html(msg.non_utama);
                    extension_chart_FinancialOverview(msg);
                },
                error: function(result) {
                    alert('error');
                }
            });
        }

        function extension_chart_FinancialOverview(param) {
            var randomScalingFactor = function() {
                return Math.round(Math.random() * 100);
            };

            var randomData = function() {
                return [
                    33.333, 66.666, 99.999
                ];
            };

            var randomValue = function(data) {
                return Math.max.apply(null, data) * Math.random();
            };

            var data = randomData();
            var value = 30;

            var config = {
                type: 'gauge',
                data: {
                    labels: ['Save', 'Warning', 'Risk'],
                    datasets: [{
                        data: data,
                        value: param,
                        backgroundColor: ['green', 'orange', 'red'],
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    title: {
                        display: false,
                        text: 'Financial Chart Condition',
                    },
                    layout: {
                        padding: {
                            bottom: 30
                        }
                    },
                    needle: {
                        // Needle circle radius as the percentage of the chart area width
                        radiusPercentage: 2,
                        // Needle width as the percentage of the chart area width
                        widthPercentage: 3.2,
                        // Needle length as the percentage of the interval between inner radius (0%) and outer radius (100%) of the arc
                        lengthPercentage: 80,
                        // The color of the needle
                        color: 'rgba(0, 0, 0, 1)'
                    },
                    valueLabel: {
                        display: false,
                        fontSize: 32,
                        formatter: function(value, context) {
                            // debugger;
                            return value + "X";
                            // return '< ' + Math.round(value);
                        }
                    },
                    plugins: {
                        datalabels: {
                            display: true,
                            formatter: function(value, context) {
                                return context.chart.data.labels[context.dataIndex];
                            },
                            //color: function (context) {
                            //  return context.dataset.backgroundColor;
                            //},
                            color: 'rgba(255, 255, 255, 1.0)',
                            //color: 'rgba(255, 255, 255, 1.0)',
                            backgroundColor: null,
                            font: {
                                size: 20,
                                weight: 'bold'
                            }
                        }
                    }
                }
            };

            var ctx = document.getElementById('chart').getContext('2d');
            window.myGauge = new Chart(ctx, config);

            // window.onload = function() {

            // };

            // document.getElementById('randomizeData').addEventListener('click', function() {
            //     config.data.datasets.forEach(function(dataset) {
            //         dataset.data = randomData();
            //         dataset.value = randomValue(dataset.data);
            //     });

            //     window.myGauge.update();
            // });
        }

        function Chart_IncomeOverview(paramtahun) {
            var varparamtahun = paramtahun
            $.ajax({
                type: 'POST',
                url: myurl + '/FU_chart_IncomeOverview',
                data: {
                    idparamth: varparamtahun
                },
                cache: false,
                success: function(msg) {
                    // alert('pesan : ' + msg);
                    // Chart.helpers.each(Chart.instances, function (instance) {
                    //     instance.destroy();
                    // });
                    $("#title_penghasilan_utama").html(msg.utama);
                    $("#title_penghasilan_non_utama").html(msg.non_utama);
                    extension_chart_IncomeOverview(msg.prosentase);
                },
                error: function(result) {
                    alert('error');
                }
            });
        }

        function extension_chart_IncomeOverview(paramdata_c2) {
            if (chartpenghasilan) {
                chartpenghasilan.destroy();
            }
            var oilCanvas = document.getElementById("chart_pemasukan");
            Chart.defaults.global.defaultFontFamily = "Lato";
            Chart.defaults.global.defaultFontSize = 12;
            chartpenghasilan = new Chart(oilCanvas, {
                type: 'pie',
                data: {
                    labels: ['Penghasilan \n Utama',
                        'Penghasilan \n Tambahan'
                    ],
                    datasets: [{
                        data: paramdata_c2,
                        // value: value,
                        backgroundColor: ['blue', '#FF6384'],
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    title: {
                        display: false,
                        text: 'Chart Pemasukan',
                    },
                    layout: {
                        padding: {
                            bottom: 10
                        }
                    },
                    plugins: {
                        datalabels: {
                            display: true,
                            formatter: function(value, context) {
                                return context.chart.data.labels[context.dataIndex];
                            },
                            color: 'rgba(255, 255, 255, 1.0)',
                            backgroundColor: null,
                            font: {
                                size: 14,
                                weight: 'bold'
                            }
                        }
                    }
                }
            });
        }

        function Chart_RasioPenghasilanDanPengeluaran(paramtahun) {
            var varparamtahun = paramtahun
            $.ajax({
                type: 'POST',
                url: myurl + '/FU_chart_RasioPenghasilanDanPengeluaran',
                data: {
                    idparamth: varparamtahun
                },
                cache: false,
                success: function(msg) {
                    // alert('pesan : ' + msg.kalimat);
                    // $("#hasil").html(msg.pemasukan);
                    // Chart.helpers.each(Chart.instances, function (instance) {
                    //     instance.destroy();
                    // });
                    var datac3 = {
                        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus',
                            'September', 'Oktober', 'November', 'Desember'
                        ],
                        datasets: [{
                            label: "Penghasilan",
                            backgroundColor: "blue",
                            data: msg.pemasukan,
                        }, {
                            label: "Pengeluaran",
                            backgroundColor: "orange",
                            data: msg.pengeluaran,
                        }]
                    };
                    extension_chart_RasioPenghasilanDanPengeluaran(datac3);
                },
                error: function(result) {
                    alert('error');
                }
            });
        }

        function extension_chart_RasioPenghasilanDanPengeluaran(paramdata_c3) {

            if (chartrasiopertama) {
                chartrasiopertama.destroy();
            }
            var oilCanvass = document.getElementById("chart_rasio_pemasukan_pengeluaran");
            Chart.defaults.global.defaultFontFamily = "Lato";
            Chart.defaults.global.defaultFontSize = 12;
            chartrasiopertama = new Chart(oilCanvass, {
                type: 'bar',
                data: paramdata_c3,
                options: {
                    responsive: true,
                    title: {
                        display: false,
                        text: 'Rasio Penghasilan dan Pengeluaran',
                    },
                    layout: {
                        padding: {
                            bottom: 10
                        }
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                min: 0,
                            }
                        }]
                    },
                    plugins: {
                        datalabels: {
                            display: false,
                            formatter: function(value, context) {
                                return context.chart.data.labels[context.dataIndex];
                            },
                            color: 'rgba(255, 255, 255, 1.0)',
                            //color: 'rgba(255, 255, 255, 1.0)',
                            backgroundColor: null,
                            font: {
                                size: 15,
                                weight: 'bold'
                            }
                        }
                    }
                }
            });
        }

        function Chart_RasioPassiveIncome(paramtahun) {
            var varparamtahun = paramtahun
            $.ajax({
                type: 'POST',
                url: myurl + '/FU_chart_RasioPassiveIncome',
                data: {
                    idparamth: varparamtahun
                },
                cache: false,
                success: function(msg) {
                    // alert('pesan : ' + msg.kalimat);
                    // $("#hasil").html(msg.pemasukan);
                    // Chart.helpers.each(Chart.instances, function (instance) {
                    //     instance.destroy();
                    // });
                    var datac4 = {
                        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus',
                            'September', 'Oktober', 'November', 'Desember'
                        ],
                        datasets: [{
                            label: "Penghasilan Utama",
                            backgroundColor: "blue",
                            data: msg.utama,
                        }, {
                            label: "Penghasilan Tambahan",
                            backgroundColor: "green",
                            data: msg.tambahan,
                        }]
                    };
                    extension_chart_RasioPassiveIncome(datac4);
                },
                error: function(result) {
                    alert('error');
                }
            });
        }

        function extension_chart_RasioPassiveIncome(paramdata_c4) {

            if (chartrasiokedua) {
                chartrasiokedua.destroy();
            }
            var oilCanvass = document.getElementById("chart_rasio_passive_income");
            Chart.defaults.global.defaultFontFamily = "Lato";
            Chart.defaults.global.defaultFontSize = 12;
            chartrasiokedua = new Chart(oilCanvass, {
                type: 'bar',
                data: paramdata_c4,
                options: {
                    responsive: true,
                    title: {
                        display: false,
                        text: 'Rasio Active Income vs Passive Income',
                    },
                    layout: {
                        padding: {
                            bottom: 10
                        }
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                min: 0,
                            }
                        }]
                    },
                    plugins: {
                        datalabels: {
                            display: false,
                            formatter: function(value, context) {
                                return context.chart.data.labels[context.dataIndex];
                            },
                            color: 'rgba(255, 255, 255, 1.0)',
                            //color: 'rgba(255, 255, 255, 1.0)',
                            backgroundColor: null,
                            font: {
                                size: 15,
                                weight: 'bold'
                            }
                        }
                    }
                }
            });
        }

        function Chart_DistribusiPemasukan(paramtahun) {
            var varparamtahun = paramtahun
            $.ajax({
                type: 'POST',
                url: myurl + '/FU_chart_DistribusiPemasukan',
                data: {
                    idparamth: varparamtahun
                },
                cache: false,
                success: function(msg) {
                    // alert('pesan : ' + msg);
                    // Chart.helpers.each(Chart.instances, function (instance) {
                    //     instance.destroy();
                    // });
                    // $("#title_penghasilan_utama").html(msg.utama);
                    // $("#title_penghasilan_non_utama").html(msg.non_utama);
                    extension_chart_DistribusiPemasukan(msg.jenis, msg.jumlah);
                },
                error: function(result) {
                    alert('error');
                }
            });
        }

        function extension_chart_DistribusiPemasukan(paramdata_c51, paramdata_c52) {
            if (chartdistribusipemasukan) {
                chartdistribusipemasukan.destroy();
            }
            var oilCanvas = document.getElementById("chart_distribusi_pemasukan");
            Chart.defaults.global.defaultFontFamily = "Lato";
            Chart.defaults.global.defaultFontSize = 12;
            chartdistribusipemasukan = new Chart(oilCanvas, {
                type: 'pie',
                data: {
                    labels: paramdata_c51,
                    datasets: [{
                        data: paramdata_c52,
                        // value: value,
                        backgroundColor: ['blue', '#FF6384', 'orange', 'green', 'navy', 'silver', 'gold',
                            'purple'
                        ],
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    title: {
                        display: false,
                        text: 'Chart Pemasukan',
                    },
                    layout: {
                        padding: {
                            bottom: 10
                        }
                    },
                    plugins: {
                        datalabels: {
                            display: false,
                            formatter: function(value, context) {
                                return context.chart.data.labels[context.dataIndex];
                            },
                            color: 'rgba(255, 255, 255, 1.0)',
                            backgroundColor: null,
                            font: {
                                size: 14,
                                weight: 'bold'
                            }
                        }
                    }
                }
            });
        }

        function Chart_DistribusiPengeluaran(paramtahun) {
            var varparamtahun = paramtahun
            $.ajax({
                type: 'POST',
                url: myurl + '/FU_chart_DistribusiPengeluaran',
                data: {
                    idparamth: varparamtahun
                },
                cache: false,
                success: function(msg) {
                    // alert('pesan : ' + msg);
                    // Chart.helpers.each(Chart.instances, function (instance) {
                    //     instance.destroy();
                    // });
                    // $("#title_penghasilan_utama").html(msg.utama);
                    // $("#title_penghasilan_non_utama").html(msg.non_utama);
                    extension_chart_DistribusiPengeluaran(msg.jenis, msg.jumlah);
                },
                error: function(result) {
                    alert('error');
                }
            });
        }

        function extension_chart_DistribusiPengeluaran(paramdata_c61, paramdata_c62) {
            if (chartdistribusipengeluaran) {
                chartdistribusipengeluaran.destroy();
            }
            var oilCanvas = document.getElementById("chart_distribusi_pengeluaran");
            Chart.defaults.global.defaultFontFamily = "Lato";
            Chart.defaults.global.defaultFontSize = 12;
            chartdistribusipengeluaran = new Chart(oilCanvas, {
                type: 'pie',
                data: {
                    labels: paramdata_c61,
                    datasets: [{
                        data: paramdata_c62,
                        // value: value,
                        backgroundColor: ['blue', '#FF6384', 'orange', 'green', 'navy', 'silver', 'gold',
                            'purple'
                        ],
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    title: {
                        display: false,
                        text: 'Chart Pengeluaran',
                    },
                    layout: {
                        padding: {
                            bottom: 10
                        }
                    },
                    plugins: {
                        datalabels: {
                            display: false,
                            formatter: function(value, context) {
                                return context.chart.data.labels[context.dataIndex];
                            },
                            color: 'rgba(255, 255, 255, 1.0)',
                            backgroundColor: null,
                            font: {
                                size: 14,
                                weight: 'bold'
                            }
                        }
                    }
                }
            });
        }

        function Chart_RasioTabungan(paramtahun) {
            var varparamtahun = paramtahun
            $.ajax({
                type: 'POST',
                url: myurl + '/FU_chart_RasioTabungan',
                data: {
                    idparamth: varparamtahun
                },
                cache: false,
                success: function(msg) {
                    // alert('pesan : ' + msg);
                    // Chart.helpers.each(Chart.instances, function (instance) {
                    //     instance.destroy();
                    // });
                    // $("#title_penghasilan_utama").html(msg.utama);
                    // $("#title_penghasilan_non_utama").html(msg.non_utama);
                    extension_chart_RasioTabungan(msg.tabungan);
                },
                error: function(result) {
                    alert('error');
                }
            });
        }

        function extension_chart_RasioTabungan(param_data) {
            var rasio_tabungan = document.getElementById("chart_rasio_tabungan");
            var dt_label = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                'Oktober',
                'November', 'Desember'
            ]
            var dt_tabungan = param_data;
            var dt_color = ['blue', 'red', 'orange', 'green', 'black', 'silver', 'gold', 'chocolate', 'maroon', '#FF6384',
                'purple', 'navy'
            ];
            var pieChart = new Chart(rasio_tabungan, {
                type: 'line',
                data: {
                    labels: dt_label,
                    datasets: [{
                        data: dt_tabungan,
                        // value: value,
                        borderColor: dt_color,
                        borderWidth: 2
                    }]
                },
                options: {
                    legend: {
                        display: false
                    },
                    responsive: true,
                    layout: {
                        padding: {
                            bottom: 10
                        }
                    },
                    plugins: {
                        datalabels: {
                            display: false,
                        }
                    },
                    elements: {
                        line: {
                            fill: false
                        }
                    }
                }
            });
        }

        function Chart_DanaImpian(paramtahun) {
            var varparamtahun = paramtahun
            $.ajax({
                type: 'POST',
                url: myurl + '/FU_chart_DanaImpian',
                data: {
                    idparamth: varparamtahun
                },
                cache: false,
                success: function(msg) {
                    // alert('pesan : ' + msg);
                    // Chart.helpers.each(Chart.instances, function (instance) {
                    //     instance.destroy();
                    // });
                    // $("#title_penghasilan_utama").html(msg.utama);
                    // $("#title_penghasilan_non_utama").html(msg.non_utama);
                    extension_chart_DanaImpian(msg.labels, msg.value_danaImpian, msg.value_tabungan);
                },
                error: function(result) {
                    alert('error');
                }
            });
        }

        function extension_chart_DanaImpian(label, danaImpian, tabungan) {
            let ctx = document.getElementById("chart_rasio_dana_impian").getContext("2d");

            let data = {
                labels: label, //['Dana Liburan', 'Dana Pendidikan', 'Dana Upgrading'],
                datasets: [{
                    label: "Dana Impian",
                    backgroundColor: "green",
                    data: danaImpian //[2500000, 4000000, 2000000]
                }, {
                    label: "Tabungan",
                    backgroundColor: "orange",
                    data: tabungan //[2000000, 4000000, 1700000]
                }]
            };

            let myBarChart = new Chart(ctx, {
                type: 'horizontalBar',
                data: data,
                options: {
                    barValueSpacing: 10,
                    scales: {
                        yAxes: [{
                            ticks: {
                                min: 0,
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                min: 0,
                            }
                        }]
                    },
                    plugins: {
                        datalabels: {
                            display: false,
                            formatter: function(value, context) {
                                return context.chart.data.labels[context.dataIndex];
                            },
                            color: 'rgba(255, 255, 255, 1.0)',
                            //color: 'rgba(255, 255, 255, 1.0)',
                            backgroundColor: null,
                            font: {
                                size: 15,
                                weight: 'bold'
                            }
                        }
                    }
                }
            });
        }

        function Chart_SaranRasio(paramtahun) {
            var varparamtahun = paramtahun
            $.ajax({
                type: 'POST',
                url: myurl + '/FU_chart_SaranRasio',
                data: {
                    idparamth: varparamtahun
                },
                cache: false,
                success: function(msg) {
                    // alert('pesan : ' + msg);
                    // Chart.helpers.each(Chart.instances, function (instance) {
                    //     instance.destroy();
                    // });
                    // $("#title_penghasilan_utama").html(msg.utama);
                    // $("#title_penghasilan_non_utama").html(msg.non_utama);
                    extension_chart_SaranRasio(msg.labels, msg.value);
                },
                error: function(result) {
                    alert('error');
                }
            });
        }

        function extension_chart_SaranRasio(paramdata_c51, paramdata_c52) {
            if (chartsaranrasio) {
                chartsaranrasio.destroy();
            }
            var oilCanvas = document.getElementById("chart_saran_rasio");
            Chart.defaults.global.defaultFontFamily = "Lato";
            Chart.defaults.global.defaultFontSize = 12;
            chartsaranrasio = new Chart(oilCanvas, {
                type: 'pie',
                data: {
                    labels: paramdata_c51,
                    datasets: [{
                        data: paramdata_c52,
                        // value: value,
                        backgroundColor: ['blue', '#FF6384', 'orange', 'green', 'navy', 'silver', 'gold',
                            'purple'
                        ],
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    title: {
                        display: false,
                        text: 'Chart Pemasukan',
                    },
                    layout: {
                        padding: {
                            bottom: 10
                        }
                    },
                    plugins: {
                        datalabels: {
                            display: false,
                            formatter: function(value, context) {
                                return context.chart.data.labels[context.dataIndex];
                            },
                            color: 'rgba(255, 255, 255, 1.0)',
                            backgroundColor: null,
                            font: {
                                size: 14,
                                weight: 'bold'
                            }
                        }
                    }
                }
            });
        }

        function Chart_PerbandinganHutangAsset(paramtahun) {
            var varparamtahun = paramtahun
            $.ajax({
                type: 'POST',
                url: myurl + '/FU_chart_Perbandingan_Hutang_Asset',
                data: {
                    idparamth: varparamtahun
                },
                cache: false,
                success: function(msg) {
                    // alert('pesan : ' + msg);
                    // Chart.helpers.each(Chart.instances, function (instance) {
                    //     instance.destroy();
                    // });
                    // $("#title_penghasilan_utama").html(msg.utama);
                    // $("#title_penghasilan_non_utama").html(msg.non_utama);
                    extension_chart_PerbandinganHutangAsset(msg.persentase);
                },
                error: function(result) {
                    alert('error');
                }
            });
        }

        function extension_chart_PerbandinganHutangAsset(paramdata_c2) {
            if (chartrasioperbandinganhutangvsasset) {
                chartrasioperbandinganhutangvsasset.destroy();
            }
            var oilCanvas = document.getElementById("chart_rasio_perbandingan_hutang_vs_asset");
            Chart.defaults.global.defaultFontFamily = "Lato";
            Chart.defaults.global.defaultFontSize = 12;
            chartrasioperbandinganhutangvsasset = new Chart(oilCanvas, {
                type: 'pie',
                data: {
                    labels: ['Hutang', 'Asset'],
                    datasets: [{
                        data: paramdata_c2,
                        // value: value,
                        backgroundColor: ['blue', '#FF6384'],
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    title: {
                        display: false,
                        text: 'Chart Pemasukan',
                    },
                    layout: {
                        padding: {
                            bottom: 10
                        }
                    },
                    plugins: {
                        datalabels: {
                            display: false,
                            formatter: function(value, context) {
                                return context.chart.data.labels[context.dataIndex];
                            },
                            color: 'rgba(255, 255, 255, 1.0)',
                            backgroundColor: null,
                            font: {
                                size: 14,
                                weight: 'bold'
                            }
                        }
                    }
                }
            });
        }

        function Chart_RasioKemampuanPelunasanHutang(paramtahun) {
            var varparamtahun = paramtahun
            $.ajax({
                type: 'POST',
                url: myurl + '/FU_chart_Rasio_Pelunasan_Hutang',
                data: {
                    idparamth: varparamtahun
                },
                cache: false,
                success: function(msg) {
                    // alert('pesan : ' + msg);
                    // Chart.helpers.each(Chart.instances, function (instance) {
                    //     instance.destroy();
                    // });
                    // $("#title_penghasilan_utama").html(msg.utama);
                    // $("#title_penghasilan_non_utama").html(msg.non_utama);
                    extension_chart_RasioKemampuanPelunasanHutang(msg.persentase);
                },
                error: function(result) {
                    alert('error');
                }
            });
        }

        function extension_chart_RasioKemampuanPelunasanHutang(paramdata_c2) {
            if (chartrasiokemampuanpelunasanhutang) {
                chartrasiokemampuanpelunasanhutang.destroy();
            }
            var oilCanvas = document.getElementById("chart_rasio_kemampuan_pelunasan_hutang");
            Chart.defaults.global.defaultFontFamily = "Lato";
            Chart.defaults.global.defaultFontSize = 12;
            chartrasiokemampuanpelunasanhutang = new Chart(oilCanvas, {
                type: 'pie',
                data: {
                    labels: ['Hutang', 'Tabungan'],
                    datasets: [{
                        data: paramdata_c2,
                        // value: value,
                        backgroundColor: ['blue', '#FF6384'],
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    title: {
                        display: false,
                        text: 'Chart Pemasukan',
                    },
                    layout: {
                        padding: {
                            bottom: 10
                        }
                    },
                    plugins: {
                        datalabels: {
                            display: false,
                            formatter: function(value, context) {
                                return context.chart.data.labels[context.dataIndex];
                            },
                            color: 'rgba(255, 255, 255, 1.0)',
                            backgroundColor: null,
                            font: {
                                size: 14,
                                weight: 'bold'
                            }
                        }
                    }
                }
            });
        }

        function Chart_RasioPerbandinganInvestasiVsKekayaan(paramtahun) {
            var varparamtahun = paramtahun
            $.ajax({
                type: 'POST',
                url: myurl + '/FU_chart_Rasio_Perbandingan_Aset_Investasi_vs_Nilai_Bersih_Kekayaan',
                data: {
                    idparamth: varparamtahun
                },
                cache: false,
                success: function(msg) {
                    // alert('pesan : ' + msg);
                    // Chart.helpers.each(Chart.instances, function (instance) {
                    //     instance.destroy();
                    // });
                    // $("#title_penghasilan_utama").html(msg.utama);
                    // $("#title_penghasilan_non_utama").html(msg.non_utama);
                    extension_chart_RasioPerbandinganInvestasiVsKekayaan(msg.persentase);
                },
                error: function(result) {
                    alert('error');
                }
            });
        }

        function extension_chart_RasioPerbandinganInvestasiVsKekayaan(paramdata_c2) {
            if (chartrasioperbandinganinvestasivskekayaan) {
                chartrasioperbandinganinvestasivskekayaan.destroy();
            }
            var oilCanvas = document.getElementById("chart_rasio_perbandingan_investasi_vs_kekayaan");
            Chart.defaults.global.defaultFontFamily = "Lato";
            Chart.defaults.global.defaultFontSize = 12;
            chartrasioperbandinganinvestasivskekayaan = new Chart(oilCanvas, {
                type: 'pie',
                data: {
                    labels: ['Asset', 'Kekayaan'],
                    datasets: [{
                        data: paramdata_c2,
                        // value: value,
                        backgroundColor: ['blue', '#FF6384'],
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    title: {
                        display: false,
                        text: 'Chart Pemasukan',
                    },
                    layout: {
                        padding: {
                            bottom: 10
                        }
                    },
                    plugins: {
                        datalabels: {
                            display: false,
                            formatter: function(value, context) {
                                return context.chart.data.labels[context.dataIndex];
                            },
                            color: 'rgba(255, 255, 255, 1.0)',
                            backgroundColor: null,
                            font: {
                                size: 14,
                                weight: 'bold'
                            }
                        }
                    }
                }
            });
        }

        function Chart_RasioPerbandinganNilaiBersihAssetVsNilaiBersihKekayaan(paramtahun) {
            var varparamtahun = paramtahun
            $.ajax({
                type: 'POST',
                url: myurl + '/FU_chart_Rasio_Perbandingan_Nilai_Bersih_Aset_vs_Nilai_Bersih_Kekayaan',
                data: {
                    idparamth: varparamtahun
                },
                cache: false,
                success: function(msg) {
                    // alert('pesan : ' + msg);
                    // Chart.helpers.each(Chart.instances, function (instance) {
                    //     instance.destroy();
                    // });
                    // $("#title_penghasilan_utama").html(msg.utama);
                    // $("#title_penghasilan_non_utama").html(msg.non_utama);
                    extension_chart_RasioPerbandinganNilaiBersihAssetVsNilaiBersihKekayaan(msg.persentase);
                },
                error: function(result) {
                    alert('error');
                }
            });
        }

        function extension_chart_RasioPerbandinganNilaiBersihAssetVsNilaiBersihKekayaan(paramdata_c2) {
            if (chartrasioperbandingannilaibersihassetvssnilaibersihkekayaan) {
                chartrasioperbandingannilaibersihassetvssnilaibersihkekayaan.destroy();
            }
            var oilCanvas = document.getElementById(
            "chart_rasio_perbandingan_nilai_bersih_assets_vs_nilai_bersih_kekayaan");
            Chart.defaults.global.defaultFontFamily = "Lato";
            Chart.defaults.global.defaultFontSize = 12;
            chartrasioperbandingannilaibersihassetvssnilaibersihkekayaan = new Chart(oilCanvas, {
                type: 'pie',
                data: {
                    labels: ['Asset', 'Kekayaan'],
                    datasets: [{
                        data: paramdata_c2,
                        // value: value,
                        backgroundColor: ['blue', '#FF6384'],
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    title: {
                        display: false,
                        text: 'Chart Pemasukan',
                    },
                    layout: {
                        padding: {
                            bottom: 10
                        }
                    },
                    plugins: {
                        datalabels: {
                            display: false,
                            formatter: function(value, context) {
                                return context.chart.data.labels[context.dataIndex];
                            },
                            color: 'rgba(255, 255, 255, 1.0)',
                            backgroundColor: null,
                            font: {
                                size: 14,
                                weight: 'bold'
                            }
                        }
                    }
                }
            });
        }

        function Chart_Budgeting(paramtahun) {
            var varparamtahun = paramtahun
            $.ajax({
                type: 'POST',
                url: myurl + '/FU_chart_Budgeting',
                data: {
                    idparamth: varparamtahun
                },
                cache: false,
                success: function(msg) {
                    // alert('pesan : ' + msg);
                    // Chart.helpers.each(Chart.instances, function (instance) {
                    //     instance.destroy();
                    // });
                    // $("#title_penghasilan_utama").html(msg.utama);
                    // $("#title_penghasilan_non_utama").html(msg.non_utama);
                    extension_chart_Budgeting(msg.labels, msg.value_budget, msg.value_pengeluaran);
                },
                error: function(result) {
                    alert('error');
                }
            });
        }

        function extension_chart_Budgeting(label, budget, pengeluaran) {
            let ctx = document.getElementById("chart_budget").getContext("2d");

            let data = {
                labels: label, //['Dana Liburan', 'Dana Pendidikan', 'Dana Upgrading'],
                datasets: [{
                    label: "Budget",
                    backgroundColor: "green",
                    data: budget //[2500000, 4000000, 2000000]
                }, {
                    label: "Pengeluaran",
                    backgroundColor: "orange",
                    data: pengeluaran //[2000000, 4000000, 1700000]
                }]
            };

            let myBarChart = new Chart(ctx, {
                type: 'horizontalBar',
                data: data,
                options: {
                    barValueSpacing: 10,
                    scales: {
                        yAxes: [{
                            ticks: {
                                min: 0,
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                min: 0,
                            }
                        }]
                    },
                    plugins: {
                        datalabels: {
                            display: false,
                            formatter: function(value, context) {
                                return context.chart.data.labels[context.dataIndex];
                            },
                            color: 'rgba(255, 255, 255, 1.0)',
                            //color: 'rgba(255, 255, 255, 1.0)',
                            backgroundColor: null,
                            font: {
                                size: 15,
                                weight: 'bold'
                            }
                        }
                    }
                }
            });
        }
    </script>
@endsection
