<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login/login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/">
<!-- Head -->
<?php $page = 'dashboard'; require 'Components/head.php';?>
<!-- /Head -->

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <?php require 'Components/sidebar.php';?>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <?php require 'Components/navbar.php';?>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="col-lg-10 mb-2 order-0">
                                <div class="card">
                                    <div class="d-flex align-items-end row">
                                        <div class="col-sm-8">
                                            <div class="card-body">
                                                <h5 class="card-title text-primary">Congratulations
                                                    <?php echo $_SESSION['username']?> 🎉</h5>
                                                <p class="mb-4">
                                                    You have done <span class="fw-bold">72%</span> more sales today.
                                                    Check your new badge in
                                                    your profile.
                                                </p>

                                                <a href="javascript:;" class="btn btn-sm btn-outline-primary">View
                                                    Badges</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 text-center text-sm-left">
                                            <div class="card-body pb-0 px-0 px-md-4">
                                                <img src="assets/img/illustrations/man-with-laptop-light.png"
                                                    height="140" alt="View Badge User"
                                                    data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                                    data-app-light-img="illustrations/man-with-laptop-light.png" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 order-1">
                                <div class="row">
                                    
                                    
                                </div>
                            </div>
                            <!-- Total Revenue -->
                            
                            <!--/ Total Revenue -->

                            
                        </div>
                    </div>

                </div>
                <!-- / Content -->

                <!-- Footer -->
                <?php require 'Components/footer.php';?>
                <!-- /Footer -->