@extends('template')

@section('content')
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Welcome to PENRO Davao Oriental</h3>
              </div>
              <!-- /.card-header -->
        <div class="card-body">
        		<p></p>
        		<div class="card card-primary card-outline">
              		<div class="card-header">
                		<h3 class="card-title">
                  			<i class="far fa-chart-bar"></i>
                 			Patent Processing and Issuance Status Chart(Approved/Pending)
                		</h3>

                		<div class="card-tools">
                  			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  			</button>
                  			<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  			</button>
                		</div>
              		</div>
              		<div class="card-body">
                		<div id="donut-chart" style="height: 300px;"></div>
              		</div>
              	<!-- /.card-body-->
        		</div>
            <!-- BAR CHART -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Bar Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
              <!-- /.card-body -->
</div>

@endsection


@section('script')
<!-- FLOT CHARTS -->
<script src="public/AdminLTE/plugins/flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="public/AdminLTE/plugins/flot-old/jquery.flot.resize.min.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="public/AdminLTE/plugins/flot-old/jquery.flot.pie.min.js"></script>
<!-- Page script -->
<script>
  $(function () {
    /*
     * DONUT CHART
     * -----------
     */

    var donutData = [
      { label: 'Completed', data: {!! count($cc) !!}, color: '#3c8dbc' },
      { label: 'Pending', data: {!! count($cp) !!}, color: '#0073b7' }
    ]


    $.plot('#donut-chart', donutData, {
      series: {
        pie: {
          show       : true,
          radius     : 1,
          innerRadius: 0.5,
          label      : {
            show     : true,
            radius   : 2 / 3,
            formatter: labelFormatter,
            threshold: 0.1
          }

        }
      },
      legend: {
        show: false
      }
    })
    /*
     * END DONUT CHART
     */
    //--------------
    //- AREA CHART -
    //--------------

      var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
        {
          label               : 'Digital Goods',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 90]
        },
        {
          label               : 'Electronics',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40]
        },
      ]
    }

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = jQuery.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar', 
      data: barChartData,
      options: barChartOptions
    })





  })

  /*
   * Custom Label formatter
   * ----------------------
   */
  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
      + label
      + '<br>'
      + Math.round(series.percent) + '%</div>'
  }
</script>

@endsection