<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo asset('AdminLTE/plugins/fontawesome-free/css/all.min.css')?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo asset('AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo asset('AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css')?>">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo asset('AdminLTE/plugins/jqvmap/jqvmap.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo asset('AdminLTE/dist/css/adminlte.min.css')?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo asset('AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo asset('AdminLTE/plugins/daterangepicker/daterangepicker.css')?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo asset('AdminLTE/plugins/summernote/summernote-bs4.css')?>">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo asset('AdminLTE/plugins/select2/select2/dist/css/select2.min.css')?>"> 
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <style>
      img{
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px;
        width: 150px;

      }
      img:hover{
        box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
      }

  </style>



</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
      <li class="nav-item d-none d-sm-inline-block">
      @guest
          <a href="{{ route('login') }}" class="nav-link">Login</a>
            
      @else
            <form method="POST" action="{{ route('logout') }}">
                            @csrf

                <a class="nav-link" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                Logout
                </a>
                        </form>                                       
      @endguest  
      </li>
    </ul>

    <!-- SEARCH FORM -->
    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
      
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
      <img src="<?php echo asset('AdminLTE/dist/img/AdminLTELogo.png')?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">PPA Databank System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo asset('AdminLTE/dist/img/user2-160x160.jpg')?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          @guest
            <a href="#" class="d-block">Welcome, Guest</a>
          @else
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
          @endguest
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Conservation and Devt Section 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo asset('AdminLTE/pages/forms/general.html')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Enhanced National Greening Program</p>
                  
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo asset('AdminLTE/pages/forms/advanced.html')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Protected Area</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo asset('AdminLTE/pages/forms/editors.html')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Caves</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo asset('AdminLTE/pages/forms/validation.html')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Coastal</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo asset('AdminLTE/pages/forms/validation.html')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>CBFM/CSC</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo asset('AdminLTE/pages/forms/validation.html')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Watershed</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo asset('AdminLTE/pages/forms/validation.html')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>FLUP</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo asset('AdminLTE/pages/forms/validation.html')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tenurial Instrument(FLMA, IFMA, SIFMA, CADT, CADC)</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo asset('AdminLTE/pages/forms/validation.html')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Wetlands</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo asset('AdminLTE/pages/forms/validation.html')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Biodiversity Monitoring</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Regulation and Permitting Section
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/patentissuance') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Patent issuance(AFP, RFPA, Special Patent)</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/sapa') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SAPA</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/fla') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Foreshore Lease Agreement</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('flagt') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>FLAGT</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('cuttingpermit') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cutting permits(CTPO, SPLTP, STCP, RCP)</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('wildlifetransportpermit') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Wildlife Transport permits(WTP) </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo asset('AdminLTE/pages/tables/jsgrid.html')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Wildlife Registration</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo asset('AdminLTE/pages/tables/jsgrid.html')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Other Permits(Endorsed to Regional Office, Water permit)</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo asset('AdminLTE/pages/tables/jsgrid.html')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Chainsaw Registration</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Enforcement and Monitoring Section
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/apprehension') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Apprehension</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/casesfiled') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cases Filed</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/lumberdonation') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lumber Donation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo asset('AdminLTE/pages/tables/jsgrid.html')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>LAWIN</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/monitoringstation') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monitoring Station</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo asset('AdminLTE/pages/tables/jsgrid.html')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>MFPC/DENROS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/chainsawinventory') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Chainsaw Inventory</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                MGB Concerns
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo asset('AdminLTE/pages/tables/simple.html')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hazard Map</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo asset('AdminLTE/pages/tables/data.html')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tenement Map</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo asset('AdminLTE/pages/tables/jsgrid.html')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>MPSA</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo asset('AdminLTE/pages/tables/jsgrid.html')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Exploration Permit</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                EMB Concerns
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo asset('AdminLTE/pages/tables/simple.html')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Water Classification</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo asset('AdminLTE/pages/tables/data.html')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>MRF</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo asset('AdminLTE/pages/tables/jsgrid.html')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ECC Issuance</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo asset('AdminLTE/pages/tables/jsgrid.html')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SLF</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo asset('AdminLTE/pages/tables/jsgrid.html')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>LGU Solid Waste Management Plan</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header)-->
    <div class="content-header">
      <div class="container-fluid">
        
      </div> <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
                 
          <!-- Main row -->
          @yield('content')
  
      </div><!-- /.container-fluid -->

          @yield('modal')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="https://denr.gov.ph/">Department of Environment and Natural Resources</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 0.0.2
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo asset('AdminLTE/plugins/jquery/jquery.min.js')?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo asset('AdminLTE/plugins/jquery-ui/jquery-ui.min.js')?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- DataTables -->
<script src="<?php echo asset('AdminLTE/plugins/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo asset('AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')?>"></script>
<script src="<?php echo asset('AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js')?>"></script>
<script src="<?php echo asset('AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')?>"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- ChartJS -->
<script src="<?php echo asset('AdminLTE/plugins/chart.js/Chart.min.js')?>"></script>
<!-- Sparkline -->
<script src="<?php echo asset('AdminLTE/plugins/sparklines/sparkline.js')?>"></script>
<!-- JQVMap -->
<script src="<?php echo asset('AdminLTE/plugins/jqvmap/jquery.vmap.min.js')?>"></script>
<script src="<?php echo asset('AdminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js')?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo asset('AdminLTE/plugins/jquery-knob/jquery.knob.min.js')?>"></script>
<!-- daterangepicker -->
<script src="<?php echo asset('AdminLTE/plugins/moment/moment.min.js')?>"></script>
<script src="<?php echo asset('AdminLTE/plugins/daterangepicker/daterangepicker.js')?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo asset('AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')?>"></script>
<!-- Summernote -->
<script src="<?php echo asset('AdminLTE/plugins/summernote/summernote-bs4.min.js')?>"></script>
<!-- overlayScrollbars -->
<script src="<?php echo asset('AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo asset('AdminLTE/dist/js/adminlte.js')?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo asset('AdminLTE/dist/js/pages/dashboard.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo asset('AdminLTE/dist/js/demo.js')?>"></script>

<script src="<?php echo asset('AdminLTE/plugins/select2/select2/dist/js/select2.min.js')?>"></script>

<script>
$(document).ready(function() {
    $('.search-office').select2({

    });
    $('.search-appre').select2({
      
    });

    $("#tabledata1").DataTable({
      "responsive": true,
      "autoWidth": false,
      "searching": false,
    });

    $(".btn-success").click(function(){ 
          var lsthmtl = $(".clone").html();
          $(".increment").after(lsthmtl);
    });

    $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".hdtuto").remove();
    });
});

</script>

</body>
</html>