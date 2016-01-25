<!DOCTYPE html>
    <!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Material Admin</title>
        
        <!-- Vendor CSS -->
        <link href="vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="vendors/bower_components/material-design-iconic-font/css/material-design-iconic-font.min.css" rel="stylesheet">
            
        <!-- CSS -->
        <link href="css/app.min.1.css" rel="stylesheet">
        <link href="css/app.min.2.css" rel="stylesheet">
    </head>
    
    <body class="login-content">
    <?php if($_GET['status'] && $_GET['status'] == 'error'){ ?>
        <div class="loginMessage" align="center">
            Username atau Password salah
        </div>
    <?php } ?>
        <!-- Login -->

        <form method="POST" action="loginProses.php">
        <div class="lc-block toggled m-t-15" id="l-login" data-ng-if="lctrl.login === 1">
            
            <div class="card-header">
                <img src="http://amikom.ac.id/newamikom/assets/images/logos/logo-footer.png" />
            </div>

            <hr>

            <div class="card-header m-b-20">
                <div class="header-login">
                    <h2>Login Administrator</h2>
                    <p>Silahkan login dengan akun masing - masing.</p>
                    <?php if(@$_GET['status'] && @$_GET['status'] == 'error'){ ?>
                        <div class="loginMessage" align="center">
                           <div id="feedback"><p class="alert alert-danger">Maaf ada kesalahan</p></div>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <div class="input-group m-b-20">
                <span class="input-group-addon"><i class="md md-person"></i></span>
                <div class="fg-line">
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                </div>
            </div>
            
            <div class="input-group m-b-20">
                <span class="input-group-addon"><i class="md md-vpn-key"></i></span>
                <div class="fg-line">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
            </div>
            
            <div class="clearfix"></div>
            
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="">
                    <i class="input-helper"></i>
                    Keep me signed in
                </label>
            </div>
            <button type="submit" class="btn btn-login btn-danger btn-float"><i class="md md-arrow-forward"></i></button>
            
        </form>
            
        </div>
        <script type="text/javascript">
        function doLogin() {
            $('form#login').submit();
            };
        
        </script>

            

        
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
        <![endif]-->
        
        <!-- Javascript Libraries -->
        <script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        
        <script src="vendors/bower_components/Waves/dist/waves.min.js"></script>
        
        <!-- Placeholder for IE9 -->
        <!--[if IE 9 ]>
            <script src="vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
        <![endif]-->
        
        <script src="js/functions.js"></script>
        
    </body>
</html>