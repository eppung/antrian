<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Antrian terintegrasi</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url().'assets/vendors/images/apple-touch-icon.png' ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url().'assets/vendors/images/favicon-32x32.png' ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url().'assets/vendors/images/favicon-16x16.png"' ?>>

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets/vendors/styles/core.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets/vendors/styles/icon-font.min.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets/src/plugins/jvectormap/jquery-jvectormap-2.0.3.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets/vendors/styles/style.css' ?>">


</head>

<body>

    <div class="mobile-menu-overlay"></div>

    <div >
        <div class="xs-pd-20-10 pd-ltr-20">
            <div class="row clearfix progress-box" style="display: flex; justify-content: center;">
                <div class="col-lg-3 col-md-6 col-sm-12 mb-30" >
                    <div class="card-box pd-30 height-100-p">
                        <div class="progress-box text-center">
                            <a href="<?= base_url().'Setting/index' ?>">
                                <!-- <input type="text" class="knob dial1" value="80" data-width="120" data-height="120" data-linecap="round" data-thickness="0.12" data-bgColor="#fff" data-fgColor="#1b00ff" data-angleOffset="180" readonly> -->
                                <div class="img pb-30">
                                    <img src="<?= base_url().'assets/vendors/images/custom/gear.svg' ?>" alt="">
                                </div>
                                <h5 class="padding-top-10 h5" style="color:#ff7058;">Setting</h5>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-30"  >
                    <div class="card-box pd-30 height-100-p">
                        <div class="progress-box text-center">
                            <a href="<?= base_url().'Administrator/index'?>">
                                <!-- <input type="text" class="knob dial1" value="80" data-width="120" data-height="120" data-linecap="round" data-thickness="0.12" data-bgColor="#fff" data-fgColor="#1b00ff" data-angleOffset="180" readonly> -->
                                <div class="img pb-30">
                                    <img src="<?= base_url().'assets/vendors/images/custom/admin.svg' ?>" alt="">
                                </div>
                                <h5 class="padding-top-10 h5" style="color:#167ee6;">Administrator</h5>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-30"  >
                    <div class="card-box pd-30 height-100-p">
                        <div class="progress-box text-center">
                            <a href="<?= base_url().'Antrian/index'?>">
                                <!-- <input type="text" class="knob dial1" value="80" data-width="120" data-height="120" data-linecap="round" data-thickness="0.12" data-bgColor="#fff" data-fgColor="#1b00ff" data-angleOffset="180" readonly> -->
                                <div class="img pb-30">
                                    <img src="<?= base_url().'assets/vendors/images/custom/queue.svg' ?>" alt="">
                                </div>
                                <h5 class="padding-top-10 h5" style="color:#c262c7;">Mesin Antrian</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-wrap pd-20 mb-20 card-box">
                Aplikasi antrian terintegrasi
            </div>
        </div>
    </div>
    <!-- js -->
    <script src="<?= base_url().'assets/vendors/scripts/core.js'?>"></script>
    <script src="<?= base_url().'assets/vendors/scripts/script.min.js'?>"></script>
    <script src="<?= base_url().'assets/vendors/scripts/process.js'?>"></script>
    <script src="<?= base_url().'assets/vendors/scripts/layout-settings.js'?>"></script>
    <script src="<?= base_url().'assets/src/plugins/jQuery-Knob-master/jquery.knob.min.js'?>"></script>
    <script src="<?= base_url().'assets/src/plugins/highcharts-6.0.7/code/highcharts.js'?>"></script>
    <script src="<?= base_url().'assets/src/plugins/highcharts-6.0.7/code/highcharts-more.js'?>"></script>
    <script src="<?= base_url().'assets/src/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js'?>"></script>
    <script src="<?= base_url().'assets/src/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'?>"></script>
    <script src="<?= base_url().'assets/vendors/scripts/dashboard2.js'?>"></script>
</body>

</html>