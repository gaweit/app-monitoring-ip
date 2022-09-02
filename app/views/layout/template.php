<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Arif iik | kontak : 085289033229">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>assets/images/favicon.png">
    <title><?=$title;?></title>
    <!-- This page CSS -->
    <link href="<?=base_url()?>assets/node_modules/datatables/media/css/dataTables.bootstrap4.css" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="<?=base_url()?>assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?=base_url()?>assets/dist/<?=getMode()?>/css/style.min.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="<?=base_url()?>assets/dist/<?=getMode()?>/css/pages/dashboard1.css" rel="stylesheet">
    <?php date_default_timezone_set("Asia/Jakarta"); $numeric_date=date("G"); if($numeric_date>=15&&$numeric_date<=17){ ?>
        <style type="text/css">
            .skin-green-dark {
            }
            .skin-green-dark .topbar {
                background: #f09e01;
            }
            .skin-green-dark .topbar .top-navbar .navbar-header .navbar-brand .dark-logo {
                display: none;
            }
            .skin-green-dark .topbar .top-navbar .navbar-header .navbar-brand .light-logo {
                display: inline-block;
                color: rgba(255,  255,  255,  0.8);
            }
            .skin-green-dark .sidebar-nav ul li a.active, .skin-green-dark .sidebar-nav ul li a:hover {
                color: #f09e01;
            }
            .skin-green-dark .sidebar-nav ul li a.active i, .skin-green-dark .sidebar-nav ul li a:hover i {
                color: #f09e01;
            }
            .skin-green-dark .sidebar-nav>ul>li.active>a {
                color: #f09e01;
                border-left: 3px solid #f09e01;
            }
            .skin-green-dark .sidebar-nav>ul>li.active>a i {
                color: #f09e01;
            }
            .skin-green-dark .page-titles .breadcrumb .breadcrumb-item.active {
                color: #f09e01;
            }
            .left-sidebar{
                background: #242424;
            }
        </style>
    <?php } ?>
    <link rel="stylesheet" href="<?=base_url()?>assets/dist/map/css/leaflet.css"/>
    <link rel="stylesheet" href="<?=base_url()?>assets/leaflet-routing/dist/leaflet-routing-machine.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="<?=base_url()?>assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="<?=base_url()?>assets/node_modules/popper/popper.min.js"></script>
    <script src="<?=base_url()?>assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?=base_url()?>assets/dist/<?=getMode()?>/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="<?=base_url()?>assets/dist/<?=getMode()?>/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?=base_url()?>assets/dist/<?=getMode()?>/js/sidebarmenu.js"></script>

    <script src="<?=base_url()?>assets/node_modules/hchart/code/highcharts.js"></script>
    <script src="<?=base_url()?>assets/node_modules/hchart/code/highcharts-3d.js"></script>
    <script src="<?=base_url()?>assets/node_modules/hchart/code/modules/data.js"></script>
    <script src="<?=base_url()?>assets/node_modules/hchart/code/modules/drilldown.js"></script>
    <script src="<?=base_url()?>assets/node_modules/hchart/code/modules/exporting.js"></script>
    <script src="<?=base_url()?>assets/node_modules/hchart/code/modules/wordcloud.js"></script>
    <script src="<?=base_url()?>assets/node_modules/hchart/code/modules/export-data.js"></script>
    <script src="<?=base_url()?>assets/node_modules/hchart/code/modules/accessibility.js"></script>

    <?php if (getMode()=='dark') { ?>
        <script src="<?=base_url()?>assets/node_modules/hchart/code/themes/gray.js"></script>
        <script type="text/javascript">
            Highcharts.theme = {
            colors: ['#2b908f', '#90ee7e', '#f45b5b', '#7798BF', '#aaeeee', '#ff0066',
                '#eeaaee', '#55BF3B', '#DF5353', '#7798BF', '#aaeeee'],
            chart: {
                backgroundColor: 'rgba(0,0,0,0)',
                style: {
                    fontFamily: 'monospace',
                    font: '20px',
                    color: "#f00",
                    textShadow: false,
                    textOutline: false 
                }
            },
            
        };
        // Apply the theme
        Highcharts.setOptions(Highcharts.theme);
        </script>
    <?php } ?>
</head>
<?php  if (getMode()=='light') { ?>
    <body class="skin-green-dark fixed-layout">
<?php }else{ ?>
    <body class="skin-default-dark fixed-layout">
<?php } ?>
<!--  -->
    
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Proses</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <?php include 'header.php'; ?>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <?php include 'sidebar.php'; ?>
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor"><?=strtoupper('Page '.$this->uri->segment(1));?></h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active"><?=ucwords($this->uri->segment(1));?></li>
                            </ol>
                            <!-- <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button> -->
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- Over Visitor, Our income , slaes different and  sales prediction -->
                <!-- ============================================================== -->
                <div class="row">
                    <?php echo $contents; ?>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            <?php include 'footer.php'; ?>
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    
   
    <!--stickey kit -->
    <script src="<?=base_url()?>assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?=base_url()?>assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?=base_url()?>assets/dist/<?=getMode()?>/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- Popup message jquery -->
    <script src="<?=base_url()?>assets/node_modules/toast-master/js/jquery.toast.js"></script>
    <!-- Chart JS -->
    <script src="<?=base_url()?>assets/node_modules/toast-master/js/jquery.toast.js"></script>
    <!-- This is data table -->
    <script src="<?=base_url()?>assets/node_modules/datatables/datatables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <!-- end - This is for export functionality only -->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "language": {
            "search": "Filter records:"
          }
        });

        $('#example3').DataTable({
          "paging": false,
          "lengthChange": false,
          "searching": false,
          "ordering": false,
          "info": false,
          "autoWidth": false,
          "pageLength": 200,
          "language": {
            "emptyTable": " "
          }
        });

        $('#mastersiswa').DataTable({
          "paging": false,
          "lengthChange": false,
          "searching": true,
          "ordering": false,
          "info": false,
          "autoWidth": false,
          "pageLength": 200
        });

        $('#example5').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "info": false,
          "autoWidth": false,
          "pageLength": 200,
          "order": [[ 5, "desc" ]]
        });

        $('#example99').DataTable({
          "aLengthMenu":[[45,90,115,220],[45,90,115,220]],
          "pageLength": 90,
          "paging": false,
          "searching": false,
          "autoWidth": true,
          "info": false,
        });

        /** add active class and stay opened when selected */
      
      });
    </script>
    <!-- This Page JS -->
    <script src="<?=base_url()?>assets/node_modules/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <script src="<?=base_url()?>assets/dist/<?=getMode()?>/js/pages/mask.init.js"></script>
    <script src="<?=base_url()?>assets/dist/map/js/leaflet.js"></script>
    <script src="<?=base_url()?>assets/leaflet-routing/dist/leaflet-routing-machine.js"></script>

</body>

</html>