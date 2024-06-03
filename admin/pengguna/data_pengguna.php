<?php

$keyword = '';
if (isset($_POST['search'])) {
    $keyword = $_POST['keyword'];
}
?>
<section class="content-header">
    <h1>
        Pengguna Sistem
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-primary">
		<div class="box-header">
            <div class="d-flex justify-content-between">
                <a href="?page=MyApp/add_siswa" title="Tambah Data" class="btn btn-primary">
                    <i class="glyphicon glyphicon-plus"></i> Tambah Data
                </a>

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
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        // Initialize $keyword variable
                        $keyword = '';
                        if (isset($_POST['search'])) {
                            $keyword = $_POST['keyword'];
                        }

                        $no = 1;
                        // Modify the SQL query to filter results based on the search term
                        $sql = $koneksi->query("SELECT * FROM tb_pengguna WHERE nama_pengguna LIKE '%$keyword%' OR username LIKE '%$keyword%' OR level LIKE '%$keyword%'");
                        while ($data = $sql->fetch_assoc()) {
                        ?>

                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['nama_pengguna']; ?></td>
                                <td><?php echo $data['username']; ?></td>
                                <td><?php echo $data['level']; ?></td>
                                <td>
                                    <a href="?page=MyApp/edit_pengguna&kode=<?php echo $data['id_pengguna']; ?>" title="Ubah" class="btn btn-success">
                                        <i class="fi fi-sr-file-edit"></i>
                                    </a>
                                    <a href="?page=MyApp/del_pengguna&kode=<?php echo $data['id_pengguna']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger">
                                        <i class="fi fi-sr-trash"></i>
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
