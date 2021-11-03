@extends('pegawai/main')

@section('konten')

<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-8 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Grafik Tahunan</h4>
          <canvas id="lineChart" style="height:250px"></canvas>
        </div>
      </div>
    </div>
    <div class="col-sm-4 grid-margin">
      <div class="card">
        <div class="card-body">
          <h5>Pendapatan</h5>
          <div class="row">
            <div class="col-8 col-sm-12 col-xl-8 my-auto">
              <div class="d-flex d-sm-block d-md-flex align-items-center">
                <h2 class="mb-0">Rp.
                  <script type="text/javascript">
                    function numberWithCommas(number)
                    {
                      return number
                      .toString()
                      .replace(
                        /\B(?=(\d{3})+(?!\d))/g,
                        "."
                      );
                    }
                    document.write(numberWithCommas({{ $uang }}));
                  </script>
                </h2>
              </div>
            </div>
            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
              <i class="icon-lg mdi mdi-codepen text-primary ml-auto"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection('konten')

@section('grafik')

var data = {
  labels: ["2021", "2022", "2023", "2024", "2025", "2026"],
  datasets: [{
    label: '# of Votes',
    data: [{{ $info }}],
    backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(255, 206, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(255, 159, 64, 0.2)'
    ],
    borderColor: [
      'rgba(255,99,132,1)',
      'rgba(54, 162, 235, 1)',
      'rgba(255, 206, 86, 1)',
      'rgba(75, 192, 192, 1)',
      'rgba(153, 102, 255, 1)',
      'rgba(255, 159, 64, 1)'
    ],
    borderWidth: 1,
    fill: false
  }]
};

var multiLineData = {
  labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
  datasets: [{
      label: 'Dataset 1',
      data: [12, 19, 3, 5, 2, 3],
      borderColor: [
        '#587ce4'
      ],
      borderWidth: 2,
      fill: false
    },
    {
      label: 'Dataset 2',
      data: [5, 23, 7, 12, 42, 23],
      borderColor: [
        '#ede190'
      ],
      borderWidth: 2,
      fill: false
    },
    {
      label: 'Dataset 3',
      data: [15, 10, 21, 32, 12, 33],
      borderColor: [
        '#f44252'
      ],
      borderWidth: 2,
      fill: false
    }
  ]
};
var options = {
  scales: {
    yAxes: [{
      ticks: {
        beginAtZero: true
      },
      gridLines: {
        color: "rgba(204, 204, 204,0.1)"
      }
    }],
    xAxes: [{
      gridLines: {
        color: "rgba(204, 204, 204,0.1)"
      }
    }]
  },
  legend: {
    display: false
  },
  elements: {
    point: {
      radius: 0
    }
  }
};
@endsection('grafik')
