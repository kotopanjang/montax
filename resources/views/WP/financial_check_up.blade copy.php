@extends('master-blade.master')

@section('konten_bar')
@include('master-blade.leftbar.bar_financial_check_up')
@endsection

@section('konten_header')
ini header chart
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
                <select name="pilTahun" id="pilTahun" onchange="Ganti_Chart_2()">
                  @foreach ($tahun_wp as $isi_tahun)
                    @if($isi_tahun == Date('Y'))
                    <option value="{{$isi_tahun}}" selected>{{$isi_tahun}}</option>
                    @else
                    <option value="{{$isi_tahun}}">{{$isi_tahun}}</option>
                    @endif
                  @endforeach
                </select>
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
                        <h3 class="fw-bolder mb-0" name="title_penghasilan_utama" id="title_penghasilan_utama">{{$pemasukan_utama}}</h3>
                    </div>
                    <div class="col-6 py-1">
                        <p class="card-text text-muted mb-0">Penghasilan Tambahan</p>
                        <h3 class="fw-bolder mb-0" name="title_penghasilan_non_utama" id="title_penghasilan_non_utama">{{$pemasukan_non_utama}}</h3>
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

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://unpkg.com/chart.js@2.8.0/dist/Chart.bundle.js"></script>
<script src="https://unpkg.com/chartjs-gauge@0.3.0/dist/chartjs-gauge.js"></script>
<script src="https://unpkg.com/chartjs-plugin-datalabels@0.7.0/dist/chartjs-plugin-datalabels.js"></script>

<script>
  var myurl = "<?php echo URL::to('/'); ?>";
  var current_year = new Date().getFullYear();
  var chartpenghasilan;
  Chart_2(current_year);

  function Ganti_Chart_2()
  {
    var tahunpilih = $('#pilTahun').val();
    alert("tahun " + tahunpilih);
    Chart_2(tahunpilih);
  }
  function Chart_2(paramtahun)
  {
    var varparamtahun = paramtahun
    $.ajax({
            type: 'POST',
            url: myurl + '/FU_chart_2',
            data: {idparamth: varparamtahun},
            cache: false,
            success: function(msg){
                alert('pesan : ' + msg);                
                // Chart.helpers.each(Chart.instances, function (instance) {
                //     instance.destroy();
                // });
                $("#title_penghasilan_utama").html(msg.utama);
                $("#title_penghasilan_non_utama").html(msg.non_utama);
                extension_chart_2(msg.prosentase);
            },
            error: function(result) {
                alert('error');
            }
        });
  }

  function extension_chart_2(paramdata_c2)
  {
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
                        'Penghasilan \n Tambahan'],
                    datasets: [{
                      data: paramdata_c2,
                      value: value,
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
                        formatter:  function (value, context) {
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
</script>



{{-- START CHART PERTAMA --}}
<script>
var randomScalingFactor = function() {
  return Math.round(Math.random() * 100);
};

var randomData = function () {
  return [
    33.333,66.666,99.999
  ];
};

var randomValue = function (data) {
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
      value: value,
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
      formatter: function (value, context) {
        // debugger;
        return value + "X";
        // return '< ' + Math.round(value);
      }
    },
    plugins: {
      datalabels: {
        display: true,
        formatter:  function (value, context) {
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

window.onload = function() {
  var ctx = document.getElementById('chart').getContext('2d');
  window.myGauge = new Chart(ctx, config);
};

document.getElementById('randomizeData').addEventListener('click', function() {
  config.data.datasets.forEach(function(dataset) {
    dataset.data = randomData();
    dataset.value = randomValue(dataset.data);
  });

  window.myGauge.update();
});
</script>
{{-- CHART PERTAMA END --}}


<script>
    var rasio_tabungan = document.getElementById("chart_rasio_tabungan");
    var dt_label = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember']
    var dt_tabungan = [2500000,4000000,2000000,3500000,1500000,700000,1000000,2500000,3000000,4500000,2500000,8000000];
    var dt_color= ['blue', 'red','orange', 'green','black', 'silver','gold', 'chocolate','maroon', '#FF6384','purple', 'navy'];
    var pieChart = new Chart(rasio_tabungan, {
        type: 'line',
        data: {
            labels: dt_label,
            datasets: [{
                data: dt_tabungan,
                value: value,
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
</script>

<script>
    // var rasio_tabungan = document.getElementById("chart_rasio_passive_income").getContext("2d");
    var ctx = document.getElementById("chart_rasio_passive_income").getContext("2d");

    var data = {
    labels: ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'],
    datasets: [{
            label: "Active Income",
            backgroundColor: "blue",
            data: [2500000,4000000,2000000,3500000,1500000,700000,1000000,2500000,3000000,4500000,2500000,8000000]
        }, {
            label: "Passive Income",
            backgroundColor: "red",
            data: [2000000,4000000,200000,350000,150000,70000,1000000,250000,2000000,450000,250000,800000]
        }]
    };

    var myBarChart = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: {
            barValueSpacing: 10,
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
                    formatter:  function (value, context) {
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

</script>

@endsection
