<?php
$sql = $koneksi->query("SELECT count(nis) as siswa  from tb_siswa where status='Aktif'");
while ($data = $sql->fetch_assoc()) {

	$siswa = $data['siswa'];
}
?>

<?php
$sql = $koneksi->query("SELECT SUM(setor) as Tsetor  from tb_tabungan where jenis='ST'");
while ($data = $sql->fetch_assoc()) {

	$setor = $data['Tsetor'];
}
?>

<?php
$sql = $koneksi->query("SELECT SUM(tarik) as Ttarik  from tb_tabungan where jenis='TR'");
while ($data = $sql->fetch_assoc()) {

	$tarik = $data['Ttarik'];
}

$saldo = $setor - $tarik;
?>

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Dashboard
		<small>Administrator</small>
	</h1>
</section>

<?php
$keyword = '';
if (isset($_POST['search'])) {
    $keyword = $_POST['keyword'];
}
?>

<section class="content">
    <div class="row">
        <div class="box box-primary">
            <div class="d-flex align-items-center justify-content-between">
                <div class="box-header">
                    <strong>Profil Sekolah</strong>
                </div>
                <!-- Search form -->
                <form method="post" class="form-inline p-3">
                    <div class="d-flex">
                        <div class="form-group">
                            <input type="text" name="keyword" class="form-control" placeholder="Cari..." value="<?php echo htmlspecialchars($keyword); ?>">
                        </div>
                        <button type="submit" name="search" class="btn btn-default ml-2">
                            <i class="glyphicon glyphicon-search"></i> Cari
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nama Sekolah</th>
                                <th>Alamat</th>
                                <th>Akreditasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = $koneksi->query("SELECT * FROM tb_profil WHERE nama_sekolah LIKE '%$keyword%' OR alamat LIKE '%$keyword%' OR akreditasi LIKE '%$keyword%'");
                            while ($data = $sql->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?php echo $data['nama_sekolah']; ?></td>
                                <td><?php echo $data['alamat']; ?></td>
                                <td>Akreditasi <?php echo $data['akreditasi']; ?></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
