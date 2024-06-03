<?php
$keyword = '';
if (isset($_POST['search'])) {
    $keyword = $_POST['keyword'];
}
?>
<section class="content-header">
    <h1>
        Master Data
        <small>Kelas</small>
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
                            <th>Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $sql = $koneksi->query("SELECT * FROM tb_kelas WHERE kelas LIKE '%$keyword%' ORDER BY kelas ASC");
                        while ($data = $sql->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['kelas']; ?></td>
                                <td>
                                    <a href="?page=MyApp/edit_kelas&kode=<?php echo $data['id_kelas']; ?>" title="Ubah" class="btn btn-success">
                                        <i class="fi fi-sr-file-edit"></i>
                                    </a>
                                    <a href="?page=MyApp/del_kelas&kode=<?php echo $data['id_kelas']; ?>" onclick="return confirm('Yakin Hapus Data Ini ?')" title="Hapus" class="btn btn-danger">
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
