<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Info Kas</h3>

				</div>
				<form action="?page=kas_tabungan" method="post" enctype="multipart/form-data">
					<div class="box-body">

						<div class="d-flex">
							<div class="col-md-6 px-2">
								<div class="form-group">
									<label>Tanggal Awal</label>
									<input type="date" name="tgl_1" id="tgl_1" class="form-control">
								</div>
							</div>
							<div class="col-md-6 px-2">
								<div class="form-group">
									<label>Tanggal Akhir</label>
									<input type="date" name="tgl_2" id="tgl_2" class="form-control">
								</div>
							</div>
						</div>
					</div>

					<div class="box-footer">
						<input type="submit" name="btnCetak" value="Cetak Periode" class="btn btn-success">
					</div>
				</form>
			</div>
</section>