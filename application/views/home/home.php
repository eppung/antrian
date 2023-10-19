<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Antrian terintegrasi</title>

    
    <!-- Site favicon -->
	<?= $this->view('nav/site-favicon','',TRUE); ?>

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
                <div class="col-lg-3 col-md-6 col-sm-12 mb-30"  >
                    <div class="card-box pd-30 height-100-p">
                        <div class="progress-box text-center">
                            <a href="<?= base_url().'Loket/index'?>">
                                <!-- <input type="text" class="knob dial1" value="80" data-width="120" data-height="120" data-linecap="round" data-thickness="0.12" data-bgColor="#fff" data-fgColor="#1b00ff" data-angleOffset="180" readonly> -->
                                <div class="img pb-30">
                                    <img src="<?= base_url().'assets/vendors/images/custom/icon-pendaftaran-png.png' ?>" alt="">
                                </div>
                                <h5 class="padding-top-10 h5" style="color:black;">Pemanggilan</h5>
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
    
</body>

</html>