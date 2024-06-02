<section class="content-header">
	<h1>
		Master Data
		<small>Kelas</small>
	</h1>
</section>
<!-- Main content -->
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<a href="?page=MyApp/add_kelas" title="Tambah Data" class="btn btn-primary">
				<i class="glyphicon glyphicon-plus"></i> Tambah Data</a>

		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Kelas</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php
						$no = 1;
						$sql = $koneksi->query("SELECT * FROM tb_kelas");
						while ($data = $sql->fetch_assoc()) {
						?>

							<tr>
								<td>
									<?php echo $no++; ?>
								</td>
								<td>
									<?php echo $data['kelas']; ?>
								</td>
								<td>
									<a href="?page=MyApp/edit_kelas&kode=<?php echo $data['id_kelas']; ?>" title="Ubah" class="btn btn-success">
										<i class="fi fi-sr-file-edit"></i>
									</a>
									<a href="?page=MyApp/del_kelas&kode=<?php echo $data['id_kelas']; ?>" onclick="return confirm('Yakin Hapus Data Ini ?')" title="Hapus" class="btn btn-danger">
										<i class="fi fi-sr-trash"></i>
										</i>
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