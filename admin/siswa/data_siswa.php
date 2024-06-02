<section class="content-header">
	<h1>
		Master Data
		<small>Siswa</small>
	</h1>
</section>
<!-- Main content -->
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<a href="?page=MyApp/add_siswa" title="Tambah Data" class="btn btn-primary">
				<i class="glyphicon glyphicon-plus"></i> Tambah Data</a>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>NIS</th>
							<th>Nama</th>
							<th>JK</th>
							<th>Kelas</th>
							<th>Status</th>
							<th>Th Masuk</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php
                  $no = 1;
                  $sql = $koneksi->query("SELECT s.nis, s.nama_siswa, s.jekel, s.status, s.th_masuk, k.kelas 
                  from tb_siswa s inner join tb_kelas k on s.id_kelas=k.id_kelas 
                  order by kelas asc, nis asc");
                  while ($data= $sql->fetch_assoc()) {
                ?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['nis']; ?>
							</td>
							<td>
								<?php echo $data['nama_siswa']; ?>
							</td>
							<td>
								<?php echo $data['jekel']; ?>
							</td>
							<td>
								<?php echo $data['kelas']; ?>
							</td>

							<?php $warna = $data['status']  ?>
							<td>
								<?php if ($warna == 'Aktif') { ?>
								<span class="label label-primary" style="padding: 5px; border-radius: 3px;">Aktif</span>
								<?php } elseif ($warna == 'Lulus') { ?>
								<span class="label label-success" style="padding: 5px; border-radius: 3px;">Lulus</span>
								<?php } elseif ($warna == 'Pindah') { ?>
								<span class="label label-danger" style="padding: 5px; border-radius: 3px;">Pindah</span>
							</td>
							<?php } ?>

							<td>
								<?php echo $data['th_masuk']; ?>
							</td>

							<td>
								<a href="?page=MyApp/edit_siswa&kode=<?php echo $data['nis']; ?>" title="Ubah"
								 class="btn btn-success">
								 	<i class="fi fi-sr-file-edit"></i>
								</a>
								<a href="?page=MyApp/del_siswa&kode=<?php echo $data['nis']; ?>" onclick="return confirm('Yakin Hapus Data Ini ?')"
								 title="Hapus" class="btn btn-danger">
								 <i class="fi fi-sr-trash"></i>
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