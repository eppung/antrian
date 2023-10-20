<div class="modal fade" id="loket_modal" name="loket_modal" tabindex="-1" role="dialog"
	aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" style="width: fit-content;">
		<div class="modal-content" id="div_loket">
			<div class="login-box bg-white box-shadow border-radius-10">
				<div class="login-title">
					<h2 class="text-center text-primary" id="judul">Tambah Data Loket</h2>
				</div>
				<form id="loket-form" name="loket_form" action="<?= base_url() . 'Administrator/simpanLoket' ?>">
				<div id="dalam_loket">
					<div class="input-group custom">
						<input type="text" class="form-control form-control-lg" placeholder="Nama Loket"
							name="nama_loket" id="nama_loket" style="text-transform:uppercase">
					</div>
					<div class="input-group custom">
						<input type="text" class="form-control form-control-lg" placeholder="ID Loket" name="id_loket"
							id="id_loket" style="text-transform:uppercase" readonly hidden>
					</div>
					<div class="input-group custom" hidden id="div_status">
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Aktif</label>
							<div class="col-sm-12 col-md-10">
								<select class="custom-select col-12" id="loket_aktif" name="loket_aktif">
									<option value="1" >ya</option>
									<option value="0">tidak</option>
								</select>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12">
							<div class="input-group mb-0">
								<input class="btn btn-primary btn-lg btn-block" value="Simpan" type="submit"
									id="simpan-loket">
								<a class="btn btn-primary btn-lg btn-block" href="javasctipt:;"
									data-dismiss="modal">Tutup</a>
							</div>
						</div>
					</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>