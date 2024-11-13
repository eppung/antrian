<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Setting</title>

    <!-- Site favicon -->
    <?= $this->view('nav/site-favicon', '', TRUE); ?>

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

   
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

    <!-- <link href="<?= base_url() . 'assets/src/select2/css/select2.min.css' ?>" rel="stylesheet" /> -->

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
                            <h4 class="text-blue h4">Pengaturan Loket</h4>
                        </div>
                    </div>
                    <form id="loket_setting_form" name="loket_setting_form"
                        action="<?= base_url() . 'setting/update_loket' ?>">
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Pilih Loket</label>
                                    <select class="selectpicker form-control" data-style="btn-outline-primary"
                                        id="select_loket" style="width: 100%;" name="select_loket">

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Server Antrian</label>
                                    <input class="form-control" type="text" placeholder="Server untuk data antrian"
                                        name="input_server_antrian" <?php echo (isset($data->ip_server_antrian)) ? 'value=' . $data->ip_server_antrian : ''; ?>>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Ip Display</label>
                                    <input class="form-control" type="text"
                                        placeholder="Server untuk menampilkan antrian" name="input_ip_display" <?php echo (isset($data->ip_display)) ? 'value=' . $data->ip_display : ''; ?>>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Ip Websocket</label>
                                    <input class="form-control" type="text" placeholder="Server websocket"
                                        name="input_ip_websocket" <?php echo (isset($data->websocket)) ? 'value=' . $data->websocket : ''; ?>>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>tess</label>
                                    <button id="tess">tess</button>

                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">

                                    <button class="btn btn-primary btn-lg" type="submit">
                                        Simpan
                                    </button>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>


                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-blue h4">Layanan</h4>
                        </div>
                    </div>
                    
                </div>

            </div>
            <div class="footer-wrap pd-20 mb-20 card-box">
                Aplikasi antrian terintegrasi
            </div>
        </div>
       
    </div>

    <script>
        var base_url = "<?= base_url() ?>";
    </script>

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

    <!-- custom script -->
    <script src="<?= base_url() . 'assets/src/scripts/custom/custom-setting.js' ?>"></script>

    	<!-- add sweet alert js & css in footer -->
	<script src="<?= base_url() . 'assets/src/plugins/sweetalert2/sweetalert2.all.js' ?>"></script>
	<script src="<?= base_url() . 'assets/src/plugins/sweetalert2/sweet-alert.init.js' ?>"></script>

    <script>
        var loketSelect = $('#select_loket');
        var full_name = "<?php echo($data->nama_loket) ?>";
        var id = "<?php echo( $data->kode_loket) ?>";
        var option = new Option(full_name,id, true, true);
        loketSelect.append(option).trigger('change');
    </script>

</body>

</html>