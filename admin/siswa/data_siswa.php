<?php
$keyword = '';
if (isset($_POST['search'])) {
    $keyword = $_POST['keyword'];
}
?>

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
			<div class="d-flex justify-content-between">
				<a href="?page=MyApp/add_siswa" title="Tambah Data" class="btn btn-primary">
					<i class="glyphicon glyphicon-plus"></i> Tambah Data</a>
				
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
                            FROM tb_siswa s 
                            INNER JOIN tb_kelas k ON s.id_kelas=k.id_kelas 
                            WHERE s.nis LIKE '%$keyword%' 
                            OR s.nama_siswa LIKE '%$keyword%' 
                            OR s.jekel LIKE '%$keyword%' 
                            OR k.kelas LIKE '%$keyword%' 
                            OR s.status LIKE '%$keyword%' 
                            OR s.th_masuk LIKE '%$keyword%'
                            ORDER BY k.kelas ASC, s.nis ASC");
                        while ($data = $sql->fetch_assoc()) {
                        ?>

                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $data['nis']; ?></td>
                            <td><?php echo $data['nama_siswa']; ?></td>
                            <td><?php echo $data['jekel']; ?></td>
                            <td><?php echo $data['kelas']; ?></td>
                            
                            <td>
                                <?php 
                                $warna = $data['status'];
                                if ($warna == 'Aktif') { ?>
                                    <span class="label label-primary" style="padding: 5px; border-radius: 3px;">Aktif</span>
                                <?php } elseif ($warna == 'Lulus') { ?>
                                    <span class="label label-success" style="padding: 5px; border-radius: 3px;">Lulus</span>
                                <?php } elseif ($warna == 'Pindah') { ?>
                                    <span class="label label-danger" style="padding: 5px; border-radius: 3px;">Pindah</span>
                                <?php } ?>
                            </td>

                            <td><?php echo $data['th_masuk']; ?></td>

                            <td>
                                <a href="?page=MyApp/edit_siswa&kode=<?php echo $data['nis']; ?>" title="Ubah" class="btn btn-success">
                                    <i class="fi fi-sr-file-edit"></i>
                                </a>
                                <a href="?page=MyApp/del_siswa&kode=<?php echo $data['nis']; ?>" onclick="return confirm('Yakin Hapus Data Ini ?')" title="Hapus" class="btn btn-danger">
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
