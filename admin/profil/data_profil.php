<?php
	$keyword = '';
	if (isset($_POST['search'])) {
		$keyword = $_POST['keyword'];
	}
?>
<section class="content-header">
    <h1>
        Profil Sekolah
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-primary">
	<div class="box-header">
            <div class="d-flex justify-content-end">
                <form method="post" class="form-inline" style="display: inline-block; margin-left: 10px;">
                    <div class="d-flex">
                        <div class="form-group">
                            <input type="text" name="keyword" class="form-control" placeholder="Cari..." value="<?php echo htmlspecialchars($keyword); ?>">
                        </div>
                        <button type="submit" name="search" class="btn btn-default">
                            <i class="glyphicon glyphicon-search"></i> Cari
                        </button>
                    </div>
                </form>
            </div>
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
                        $sql = $koneksi->query("SELECT * FROM tb_profil WHERE nama_sekolah LIKE '%$keyword%' OR alamat LIKE '%$keyword%' OR akreditasi LIKE '%$keyword%'");
                        while ($data = $sql->fetch_assoc()) {
                        ?>

                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['nama_sekolah']; ?></td>
                                <td><?php echo $data['alamat']; ?></td>
                                <td><?php echo $data['akreditasi']; ?></td>
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
