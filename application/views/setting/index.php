<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Setting</title>

   <!-- Site favicon -->
	<?= $this->view('nav/site-favicon','',TRUE); ?>
    
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/vendors/styles/core.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/vendors/styles/icon-font.min.css' ?>">
    <!-- switchery css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/src/plugins/switchery/switchery.min.css' ?>">
    <!-- bootstrap-tagsinput css -->
    <link rel="stylesheet" type="text/css"
        href="<?= base_url() . 'assets/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css' ?>">
    <!-- bootstrap-touchspin css -->
    <link rel="stylesheet" type="text/css"
        href="<?= base_url() . 'assets/src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/vendors/styles/style.css' ?>">


</head>

<body>
    <?= $this->view('nav/head-nav', '', TRUE); ?>
    
    <?= $this->view('nav/right-nav', '', TRUE); ?>

    <div class="mobile-menu-overlay"></div>

    <div class="container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">

                <!-- Bootstrap Select Start -->
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-blue h4">Pengaturan aplikasi</h4>
                        </div>
                    </div>
                    <form>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Pilih Loket</label>
                                    <select class="selectpicker form-control" data-style="btn-outline-primary"
                                        data-size="5">
                                        <option value="A">Loket A</option>
                                        <option value="B">Loket B</option>
                                        <option value="C">Loket C</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Server Antrian</label>
                                    <input class="form-control" type="text" placeholder="Johnny Brown">
                                    
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
            <div class="footer-wrap pd-20 mb-20 card-box">
                Aplikasi antrian terintegrasi
            </div>
        </div>
    </div>

    
    <!-- js -->
    <script src="<?= base_url() . 'assets/vendors/scripts/core.js' ?>"></script>
    <script src="<?= base_url() . 'assets/vendors/scripts/script.min.js' ?>"></script>
    <script src="<?= base_url() . 'assets/vendors/scripts/process.js' ?>"></script>
    <script src="<?= base_url() . 'assets/vendors/scripts/layout-settings.js' ?>"></script>
    <!-- switchery js -->
    <script src="<?= base_url() . 'assets/src/plugins/switchery/switchery.min.js' ?>"></script>
    <!-- bootstrap-tagsinput js -->
    <script src="<?= base_url() . 'assets/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js' ?>"></script>
    <!-- bootstrap-touchspin js -->
    <script src="<?= base_url() . 'assets/src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js' ?>"></script>
    <script src="<?= base_url() . 'assets/vendors/scripts/advanced-components.js' ?>"></script>
</body>

</html>