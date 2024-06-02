<?php

if (isset($_GET['kode'])) {
	$sql_cek = "SELECT * FROM tb_siswa WHERE nis='" . $_GET['kode'] . "'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Ubah Siswa</h3>
				</div>
				<form action="" method="post" enctype="multipart/form-data">
					<div class="box-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group mb-3 px-2">
									<label>NIS</label>
									<input type="text" name="nis" id="nis" class="form-control" value="<?php echo $data_cek['nis']; ?>" readonly>
								</div>
								<div class="form-group mb-3 px-2">
									<label>Nama Siswa</label>
									<input type="text" name="nama_siswa" id="nama_siswa" class="form-control" value="<?php echo $data_cek['nama_siswa']; ?>">
								</div>
								<div class="form-group px-2">
									<label>Tahun Masuk</label>
									<input type="number" name="th_masuk" id="th_masuk" class="form-control" value="<?php echo $data_cek['th_masuk']; ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group mb-3 px-2">
									<label>Jenis Kelamin</label>
									<select name="jekel" id="jekel" class="form-control" required>
										<option value="">-- Pilih --</option>
										<option value="LK" <?php if ($data_cek['jekel'] == 'LK') echo 'selected'; ?>>LK</option>
										<option value="PR" <?php if ($data_cek['jekel'] == 'PR') echo 'selected'; ?>>PR</option>
									</select>
								</div>
								<div class="form-group mb-3 px-2">
									<label>Kelas</label>
									<select name="id_kelas" id="id_kelas" class="form-control" required>
										<option value="">-- Pilih --</option>
										<?php
										$query = "SELECT * FROM tb_kelas";
										$hasil = mysqli_query($koneksi, $query);
										while ($row = mysqli_fetch_array($hasil)) {
											$selected = ($data_cek['id_kelas'] == $row['id_kelas']) ? 'selected' : '';
											echo "<option value='" . $row['id_kelas'] . "' " . $selected . ">" . $row['kelas'] . "</option>";
										}
										?>
									</select>
								</div>
								<div class="form-group px-2">
									<label>Status</label>
									<select name="status" id="status" class="form-control" required>
										<option value="">-- Pilih --</option>
										<option value="Aktif" <?php if ($data_cek['status'] == 'Aktif') echo 'selected'; ?>>Aktif</option>
										<option value="Lulus" <?php if ($data_cek['status'] == 'Lulus') echo 'selected'; ?>>Lulus</option>
										<option value="Pindah" <?php if ($data_cek['status'] == 'Pindah') echo 'selected'; ?>>Pindah</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<input type="submit" name="Ubah" value="Ubah" class="btn btn-success">
						<a href="?page=MyApp/data_siswa" class="btn btn-secondary">Batal</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>


<?php

if (isset($_POST['Ubah'])) {
	//mulai proses ubah
	$sql_ubah = "UPDATE tb_siswa SET
        nama_siswa='" . $_POST['nama_siswa'] . "',
        jekel='" . $_POST['jekel'] . "',
        id_kelas='" . $_POST['id_kelas'] . "',
        th_masuk='" . $_POST['th_masuk'] . "',
        status='" . $_POST['status'] . "'
        WHERE nis='" . $_POST['nis'] . "'";
	$query_ubah = mysqli_query($koneksi, $sql_ubah);

	if ($query_ubah) {
		echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=MyApp/data_siswa';
            }
        })</script>";
	} else {
		echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=MyApp/data_siswa';
            }
        })</script>";
	}
}
