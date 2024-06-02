<head>
<!-- <link rel="stylesheet" href="dist/css/dashboard.css"> -->
</head>

<?php
	$sql = $koneksi->query("SELECT count(nis) as siswa  from tb_siswa where status='Aktif'");
	while ($data= $sql->fetch_assoc()) {
	
		$siswa=$data['siswa'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT SUM(setor) as Tsetor  from tb_tabungan where jenis='ST'");
	while ($data= $sql->fetch_assoc()) {
	
		$setor=$data['Tsetor'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT SUM(tarik) as Ttarik  from tb_tabungan where jenis='TR'");
	while ($data= $sql->fetch_assoc()) {
	
		$tarik=$data['Ttarik'];
	}

	$saldo=$setor-$tarik;
?>

<section class="content-header">
	<h1>
		Dashboard
		<small>Administrator</small>
	</h1>
</section>

<section class="content">
	<div class="row">

		<div class="col-lg-3 col-xs-6">
			<div class="small-box" style="background-color: #fff;">
				<div class="inner">
					<div class="d-flex align-items-center">
						<a href="?page=MyApp/data_siswa"></a>
						<div class="card card-dashboard">
							<i class="fi fi-sr-user-add" style="font-size: 25px;margin-bottom: -10px;"></i>
						</div>
						<h4 class="" style="color: #566a7f; margin: 0;">
							<?= $siswa; ?>
						</h4>
					</div>
					<p style="color: #566a7f;margin-bottom: 0;margin-top: 10px;">Siswa Aktif</p>
				</div>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<div class="small-box" style="background-color: #fff;">
				<div class="inner">
					<div class="d-flex align-items-center">
						<a href="?page=MyApp/data_siswa"></a>
						<div class="card card-dashboard" style="background-color: #ffe0db !important; color: #ff3e1d !important;">
							<i class="fi fi-sr-user-add" style="font-size: 25px;margin-bottom: -10px;"></i>
						</div>
						<h4 class="" style="color: #566a7f; margin: 0;">
							<?= rupiah($setor); ?>
						</h4>
					</div>
					<p style="color: #566a7f;margin-bottom: 0;margin-top: 10px;">Total Setoran</p>
				</div>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<div class="small-box" style="background-color: #fff;">
				<div class="inner">
					<div class="d-flex align-items-center">
						<a href="?page=MyApp/data_siswa"></a>
						<div class="card card-dashboard" style="background-color: #e7e7ff !important; color: #696cff !important">
							<i class="fi fi-sr-user-add" style="font-size: 25px;margin-bottom: -10px;"></i>
						</div>
						<h4 class="" style="color: #566a7f; margin: 0;">
							<?= rupiah($tarik); ?>
						</h4>
					</div>
					<p style="color: #566a7f;margin-bottom: 0;margin-top: 10px;">Total Penarikan</p>
				</div>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<div class="small-box" style="background-color: #fff;">
				<div class="inner">
					<div class="d-flex align-items-center">
						<a href="?page=MyApp/data_siswa"></a>
						<div class="card card-dashboard" style="background-color: #d7f5fc !important; color: #03c3ec !important;">
							<i class="fi fi-sr-user-add" style="font-size: 25px;margin-bottom: -10px;"></i>
						</div>
						<h4 class="" style="color: #566a7f; margin: 0;">
							<?= rupiah($saldo); ?>
						</h4>
					</div>
					<p style="color: #566a7f;margin-bottom: 0;margin-top: 10px;">Total Saldo</p>
				</div>
			</div>
		</div>
	</div>

	<!-- /.box-body -->

	<!-- Main content -->
<section class="content pt-0">
		<div class="row">
				<div class="box-header">
					<strong>Profil Sekolah</strong>
				</div>
				<div class="p-0" style="background-color: #fff;">
					<table class="table table-striped table-responsive m-0">
						<thead>
							<tr>
								<th>Nama Sekolah</th>
								<th>Alamat</th>
								<th>Akreditasi</th>
							</tr>
						</thead>
						<tbody>

							<?php
								$sql = $koneksi->query("select * from tb_profil");
								while ($data= $sql->fetch_assoc()) {
							?>

							<tr>
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
							</tr>
							<?php
								}
							?>
						</tbody>

					</table>
				</div>
		</div>
</section>