<section class="content-header">
	<h1>
		Profil Sekolah
	</h1>

</section>

<!-- Main content -->
<section class="content">
	<div class="box box-primary">
		<div class="box-header">

		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Sekolah</th>
							<th>Alamat</th>
							<th>Akreditasi</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php
						$no = 1;
						$sql = $koneksi->query("select * from tb_profil");
						while ($data = $sql->fetch_assoc()) {
						?>

							<tr>
								<td>
									<?php echo $no++; ?>
								</td>
								<td>
									<?php echo $data['nama_sekolah']; ?>
								</td>
								<td>
									<?php echo $data['alamat']; ?>
								</td>
								<td>
									Akreditasi
									<?php echo $data['akreditasi']; ?>
								</td>
								<td>
									<a href="?page=MyApp/edit_profil&kode=<?php echo $data['id_profil']; ?>" title="Ubah" class="btn btn-success">
										<i class="fi fi-sr-file-edit"></i>
									</a>
								</td>
							</tr>
						<?php
						}
						?>
					</tbody>

				</table>
			</div>
		</div>
	</div>
</section>