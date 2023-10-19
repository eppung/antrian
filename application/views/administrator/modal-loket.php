<div class="modal fade" id="loket_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" style="width: fit-content;">
			<div class="modal-content">
				<div class="login-box bg-white box-shadow border-radius-10">
					<div class="login-title">
						<h2 class="text-center text-primary">Tambah Data Loket</h2>
					</div>
					<form id="loket-form" name="loket_form" action="<?= base_url().'Administrator/simpanLoket' ?>">

						<div class="input-group custom">
							<input type="text" class="form-control form-control-lg" placeholder="Nama Loket" name="nama_loket" style="text-transform:uppercase">
							<div class="input-group-append custom"> </div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="input-group mb-0">
									<input class="btn btn-primary btn-lg btn-block" value="Simpan" type="submit" id="simpan-loket">
									<a class="btn btn-primary btn-lg btn-block" href="javasctipt:;"
										data-dismiss="modal">Tutup</a>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>