<?php session_start(); ?>
<?php if($_SESSION['userLogin']){ ?>

<?php 
    include "config/koneksi.php";
    include "function/helper.php";
?>
<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Material Admin</title>
        <link href="vendors/bower_components/material-design-iconic-font/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="vendors/socicon/socicon.min.css" rel="stylesheet">
        <link href="css/app.min.1.css" rel="stylesheet">
        <link href="css/custom.css" rel="stylesheet">
        <link href="css/app.min.2.css" rel="stylesheet">

        <link href="vendors/bootgrid/jquery.bootgrid.min.css" rel="stylesheet">
        <link href="css/jquery.dynatable.css" rel="stylesheet">
        <link href="plugin/pace.css" rel="stylesheet">

        <!-- <link href="vendors/bower_components/sweetalert/dist/sweetalert-override.min.css" rel="stylesheet"> -->
        <link rel="stylesheet" type="text/css" href="plugin/dist/sweetalert2.css">

        <!-- Javascript Libraries -->
        <script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>

        
        <script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        
        <!-- Plugin Modules -->
        <script src="plugin/jquery.dynatable.js"></script>  
        <script src="plugin/pace.min.js"></script>    
        <script src="plugin/angular.min.js"></script>    
        
    </head>
    <body class="toggled sw-toggled">
    <?php include '_inc/header.php'; ?>
        
        <section id="main">

            <!-- SIDEBAR -->
            <?php include '_inc/sidebar.php'; ?>
            
            <section id="content">
                <div class="container">
                    <div class="block-header">
                        <h2>Dashboard</h2>
                        
                        <ul class="actions">
                            <li>
                                <a href="">
                                    <i class="md md-trending-up"></i>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="md md-done-all"></i>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="" data-toggle="dropdown">
                                    <i class="md md-more-vert"></i>
                                </a>
                                
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a href="">Refresh</a>
                                    </li>
                                    <li>
                                        <a href="">Manage Widgets</a>
                                    </li>
                                    <li>
                                        <a href="">Widgets Settings</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        
                    </div>

                    <!-- CONTENT -->
                    <?php 
                    if (@$_GET['p']) {
                        include $_GET['p'].'.php';
                    } else {
                        include 'dashboard.php';
                    }
                     ?>
                    <!-- END CONTENT -->
                

                </div>
            </section>

        </section>
        
        <?php include '_inc/footer.php' ?>
        
        <!-- Older IE warning message -->
        <!--[if lt IE 9]>
            <div class="ie-warning">
                <h1 class="c-white">Warning!!</h1>
                <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
                <div class="iew-container">
                    <ul class="iew-download">
                        <li>
                            <a href="http://www.google.com/chrome/">
                                <img src="img/browsers/chrome.png" alt="">
                                <div>Chrome</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.mozilla.org/en-US/firefox/new/">
                                <img src="img/browsers/firefox.png" alt="">
                                <div>Firefox</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.opera.com">
                                <img src="img/browsers/opera.png" alt="">
                                <div>Opera</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.apple.com/safari/">
                                <img src="img/browsers/safari.png" alt="">
                                <div>Safari</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                                <img src="img/browsers/ie.png" alt="">
                                <div>IE (New)</div>
                            </a>
                        </li>
                    </ul>
                </div>
                <p>Sorry for the inconvenience!</p>
            </div>   
        
        <script src="vendors/bower_components/flot/jquery.flot.resize.js"></script>
        
        <![endif]-->
        
        <!-- a_ dari sini -->
        <script src="vendors/sparklines/jquery.sparkline.min.js"></script>
        <script src="vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
        
        <script src="vendors/bower_components/moment/min/moment.min.js"></script>
        <script src="vendors/bower_components/fullcalendar/dist/fullcalendar.min.js "></script>
        <script src="vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js"></script>
        <script src="vendors/bower_components/jquery.nicescroll/jquery.nicescroll.min.js"></script>
        <script src="vendors/bower_components/Waves/dist/waves.min.js"></script>
        <script src="vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
        <script src="plugin/dist/sweetalert2.min.js"></script>
        
        <!-- Placeholder for IE9 -->
        <!--[if IE 9 ]>
            <script src="vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
        <![endif]-->
        
        <script src="js/flot-charts/curved-line-chart.js"></script>
        <script src="js/flot-charts/line-chart.js"></script>
        <script src="js/charts.js"></script>

        <script src="vendors/chosen_v1.4.2/chosen.jquery.min.js"></script>
        <script src="vendors/fileinput/fileinput.min.js"></script>
        <script src="vendors/input-mask/input-mask.min.js"></script>
        <script src="vendors/farbtastic/farbtastic.min.js"></script>
        
        <script src="js/charts.js"></script>
        <script src="js/functions.js"></script>
        <script src="js/demo.js"></script>

        <script src="vendors/bootgrid/jquery.bootgrid.min.js"></script>


        
        <script>
            //Success Message
            $('#sa-success').click(function(){
                swal("Sukses!", "Data anggota nasabah berhasil dimasukkan!", "success")
            });
        </script>



    </body>
  </html>

<?php } else { ?>
    <?php header('location:login.php'); ?>
<?php } ?>