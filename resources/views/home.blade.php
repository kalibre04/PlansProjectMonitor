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
                 			Donut Chart
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
      { label: 'Series2', data: 30, color: '#3c8dbc' },
      { label: 'Series3', data: 20, color: '#0073b7' },
      { label: 'Series4', data: 50, color: '#00c0ef' }
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