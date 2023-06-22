<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>Wealthhealth Customer Portal</title>
    <meta name="description" content="Wealthhealth Customer Portal">
    <meta name="keywords" content="bootstrap 4, mobile template, cordova, phonegap, mobile, html" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icon/192x192.png">
    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body class="">

    <!-- loader -->

    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader bg-primary scrolled">
        <div class="left">
            <a href="#" class="headerButton" data-toggle="modal" data-target="#sidebarPanel">
                <ion-icon name="menu-outline"></ion-icon>
            </a>
        </div>

        <div>
		<center>
	<img src="../images/logo_small.jpg" alt="icon" style="width: 110px">
        </center>
		</div>
    </div>
    <!-- * App Header -->

    <!-- Search Component -->




    <!-- * Search Component -->

    <!-- App Capsule -->
    <div class="extraHeader p-0">
        <div class="form-wizard-section">
            <a href="index.php" class="button-item">
                <strong>1</strong>
                <p>Check</p>
            </a>
            <a href="bs.php" class="button-item">
                <strong>2</strong>
                <p>Bank Statements</p>
            </a>
            <a href="uf.php" class="button-item">
                <strong>3</strong>
                <p>Upload Files</p>
            </a>
            <a href="comp.php" class="button-item active">
                <strong>
                    <ion-icon name="checkmark-outline"></ion-icon>
                </strong>
                <p>All Done</p>
            </a>
        </div>
    </div>
    <!-- * Extra Header -->

    <!-- App Capsule -->
    <div id="appCapsule" class="extra-header-active">

        <div class="section mb-2 mt-2 full">
            <div class="wide-block pt-2 pb-2">
                <form action="app-components.html">
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="name1">Name</label>
                            <input type="text" class="form-control" id="name1" placeholder="Enter your name">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="email1">E-mail</label>
                            <input type="email" class="form-control" id="email1" placeholder="E-mail address">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="password1">Password</label>
                            <input type="password" class="form-control" id="password1" placeholder="Type a password">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Done</button>
                    </div>

                </form>
            </div>
        </div>



    </div>
    <!-- * App Capsule -->


    <!-- App Bottom Menu -->
    <div class="appBottomMenu">
        <a href="index.php" class="item active">
            <div class="col">
                <ion-icon name="home-outline"></ion-icon>
            </div>
        </a>
        <a href="apply.php" class="item">
            <div class="col">
                <ion-icon title="Vehicle Checks" name="basket-outline"></ion-icon>
            </div>
        </a>

        <a href="login.php" class="item">
            <div class="col">
                <ion-icon name="body-outline"></ion-icon>
            </div>
        </a>
        <a href="javascript:;" class="item" data-toggle="modal" data-target="#sidebarPanel">
            <div class="col">
                <ion-icon name="menu-outline"></ion-icon>
            </div>
        </a>
    </div>
    <!-- * App Bottom Menu -->

    <!-- App Sidebar -->
	<?php include ('sidebar.php'); ?>
    <!-- * App Sidebar -->

    <!-- welcome notification  -->
    <div id="notification-welcome" class="notification-box">
        <div class="notification-dialog android-style">
            <div class="notification-header">
                <div class="in">
                    <img src="../assets/img/icon/72x72.png" alt="image" class="imaged w24">
                    <strong>Wealthhealth Customer Portal</strong>
                    <span>just now</span>
                </div>
                <a href="#" class="close-button">
                    <ion-icon name="close"></ion-icon>
                </a>
            </div>
            <div class="notification-content">
                <div class="in">
                    <h3 class="subtitle">Welcome to Wealthhealth Customer Portal</h3>
                    <div class="text">
                        Wealthhealth Customer Portal is a PWA ready Mobile UI Kit Template.
                        Great way to start your mobile websites and pwa projects.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- * welcome notification -->

    <!-- ///////////// Js Files ////////////////////  -->
    <!-- Jquery -->
    <script src="../assets/js/lib/jquery-3.4.1.min.js"></script>
	

    <!-- Bootstrap-->
    <script src="../assets/js/lib/popper.min.js"></script>
    <script src="../assets/js/lib/bootstrap.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.2.3/dist/ionicons/ionicons.js"></script>
    <!-- Owl Carousel -->
   <script src="../assets/js/plugins/owl-carousel/owl.carousel.min.js"></script>
    <!-- jQuery Circle Progress -->
    <script src="../assets/js/plugins/jquery-circle-progress/circle-progress.min.js"></script>
    <!-- Base Js File -->
    <script src="../assets/js/base.js"></script>



</body>

</html>