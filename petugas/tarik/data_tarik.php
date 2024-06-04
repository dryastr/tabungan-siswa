<?php
$data_nama = $_SESSION["ses_nama"];

$keyword = '';
if (isset($_POST['search'])) {
    $keyword = $_POST['keyword'];
}
?>

<section class="content-header">
    <h1>
        Transaksi
        <small>Tarikan</small>
    </h1>
</section>

<section class="content">
    <div class="alert alert-danger alert-dismissible" style="padding: 15px">
        <div class="d-flex justify-content-between align-items-center w-100 ">
            <h4 class="ml-5">
                <i class="icon fa fa-info"></i> Total Tarikan
            </h4>
            <i class="fi fi-sr-cross-circle mr-5" data-dismiss="alert" aria-hidden="true" style="margin-right: 15px; cursor: pointer"></i>
        </div>
        <?php
        $sql = $koneksi->query("SELECT SUM(tarik) as total  from tb_tabungan where jenis='TR'");
        while ($data = $sql->fetch_assoc()) {
        ?>
            <h3>
                <?php echo rupiah($data['total']); ?>
            </h3>
        <?php } ?>
    </div>

    <div class="box box-primary">
		<div class="box-header">
            <div class="d-flex justify-content-between">
                <a href="?page=add_tarik" title="Tambah Data" class="btn btn-primary">
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
        <div class="box-body">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Tarikan</th>
                            <th>Petugas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        $no = 1;
                        $sql = $koneksi->query("SELECT s.nis, s.nama_siswa, t.id_tabungan, t.tarik, t.tgl, t.petugas FROM tb_siswa s JOIN tb_tabungan t ON s.nis=t.nis WHERE jenis ='TR' AND (s.nis LIKE '%$keyword%' OR s.nama_siswa LIKE '%$keyword%') ORDER BY t.tgl DESC, t.id_tabungan DESC");
                        while ($data = $sql->fetch_assoc()) {
                        ?>

                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['nis']; ?></td>
                                <td><?php echo $data['nama_siswa']; ?></td>
                                <td><?php $tgl = $data['tgl']; echo date("d/M/Y", strtotime($tgl)); ?></td>
                                <td align="left"><?php echo rupiah($data['tarik']); ?></td>
                                <td><?php echo $data['petugas']; ?></td>
                                <td>
                                    <a href="?page=edit_tarik&kode=<?php echo $data['id_tabungan']; ?>" title="Ubah" class="btn btn-success btn-sm">
                                        <i class="fi fi-sr-file-edit"></i>
                                    </a>
                                    <a href="?page=del_tarik&kode=<?php echo $data['id_tabungan']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
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
