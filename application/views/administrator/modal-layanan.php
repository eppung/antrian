<div class="modal fade" id="layanan_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" style="width: fit-content;">
		<div class="modal-content">
			<div class="login-box bg-white box-shadow border-radius-10">
				<div class="login-title">
					<h2 class="text-center text-danger" id="judulModalLayanan">Layanan</h2>
				</div>
				<form id="layanan_form" name="layanan_form" action="<?= base_url() . 'Administrator/simpanLayanan' ?>" >

					<div id="div_formLayanan">
					<input type="text" id="id_layanan" hidden readonly name="id_layanan">
						<div class="input-group custom">
							<input type="text" class="form-control form-control-lg" placeholder="Nama Layanan"
								name="nama_layanan" id="nama_layanan">
								
							<div class="input-group-append custom"> </div>
						</div>
						<div class="input-group custom">
							<input type="text" class="form-control form-control-lg" placeholder="Kode Layanan"
								name="kode_layanan" id="kode_layanan">
							<div class="input-group-append custom"></div>
						</div>
						<div class="input-group custom">
						<input type="file" name="iconLayanan" id="iconLayanan">
							<div class="input-group-append custom"></div>
						</div>
						<div class="input-group custom" hidden id="div_statusLayanan">
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Aktif</label>
								<div class="col-sm-12 col-md-10">
									<select class="custom-select col-12" id="layanan_aktif" name="layanan_aktif">
										<option value="1">ya</option>
										<option value="0">tidak</option>
									</select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12">
								<div class="input-group mb-0">
									<input class="btn btn-primary btn-lg btn-block" value="Simpan" type="submit"
										id="simpan_layanan">
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