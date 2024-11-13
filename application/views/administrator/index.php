<!DOCTYPE html>
<html>

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Administrator</title>

	<!-- Site favicon -->
	<?= $this->view('nav/site-favicon', '', TRUE); ?>

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/vendors/styles/core.css' ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/vendors/styles/icon-font.min.css' ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/src/plugins/datatables/css/dataTables.bootstrap4.min.css' ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/src/plugins/datatables/css/responsive.bootstrap4.min.css' ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/vendors/styles/style.css' ?>">
	

</head>

<body>

	<?= $this->view('nav/head-nav', '', TRUE); ?>

	<?= $this->view('nav/right-nav', '', TRUE); ?>

	<div class="mobile-menu-overlay"></div>

	<div class="container">
		<div class="pd-ltr-20 xs-pd-20-10" style="width: 100%;">
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
									<label>Server Database</label>
									<input class="form-control" type="text" placeholder="">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="min-height-200px">
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4" style="display: inline-block;">Daftar Layanan</h4>
						<div style="float: right;"><button type="button" class="btn btn-outline-primary" title="Tambah Data" data-backdrop="static" data-toggle="modal" data-target="#layanan_modal"><i class="icon-copy fa fa-plus" aria-hidden="true" style="font-size: larger;"></i></button></div>

					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap" id="tabel-layanan">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">No</th>
									<th>Nama Layanan</th>
									<th>Kode</th>
									<th>Status</th>
									<th>Image</th>
									<th class="datatable-nosort">Aksi</th>
								</tr>
							</thead>
							<tbody>

							</tbody>
						</table>
					</div>
				</div>
				<!-- Simple Datatable End -->

				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4" style="display: inline-block;">Daftar Loket</h4>
						<div style="float: right;"><button type="button" class="btn btn-outline-primary" title="Tambah Data" data-backdrop="static" data-toggle="modal" data-target="#loket_modal"><i class="icon-copy fa fa-plus" aria-hidden="true" style="font-size: larger;"></i></button></div>

					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap" id="tabel-loket">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">No</th>
									<th class="table-plus datatable-nosort">Nama Loket</th>
									<th class="table-plus datatable-nosort">Kode Loket</th>
									<th>Status</th>
									<th class="datatable-nosort">Aksi</th>
								</tr>
							</thead>
							<tbody>

							</tbody>
						</table>
					</div>
				</div>
			</div>

			<?= $this->view('administrator/modal-loket', '', TRUE) ?>
			<?= $this->view('administrator/modal-layanan', '', TRUE) ?>

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
	<script src="<?= base_url() . 'assets/src/plugins/datatables/js/jquery.dataTables.min.js' ?>"></script>
	<script src="<?= base_url() . 'assets/src/plugins/datatables/js/dataTables.bootstrap4.min.js' ?>"></script>
	<script src="<?= base_url() . 'assets/src/plugins/datatables/js/dataTables.responsive.min.js' ?>"></script>
	<script src="<?= base_url() . 'assets/src/plugins/datatables/js/responsive.bootstrap4.min.js' ?>"></script>
	
	<!-- add sweet alert js & css in footer -->
	<script src="<?= base_url() . 'assets/src/plugins/sweetalert2/sweetalert2.all.js' ?>"></script>
	<script src="<?= base_url() . 'assets/src/plugins/sweetalert2/sweet-alert.init.js' ?>"></script>
	
	<!-- custom js -->
	<script src="<?= base_url() . 'assets/src/scripts/custom/validation/ajax.js' ?>"></script>
	<script src="<?= base_url() . 'assets/src/scripts/custom/validation/core.js' ?>"></script>
	<script src="<?= base_url() . 'assets/src/scripts/custom/administrator.js' ?>"></script>

	
</html>