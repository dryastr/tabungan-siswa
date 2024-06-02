<?php

$setor = 0;
$tarik = 0;
$saldo = 0;

if (isset($_POST["btnCetak"])) {

    $dt1 = $_POST["tgl_1"];
    $dt2 = $_POST["tgl_2"];

    $sql = $koneksi->query("SELECT SUM(setor) as Tsetor  from tb_tabungan where jenis='ST' and tgl BETWEEN '$dt1' AND '$dt2'");
    while ($data = $sql->fetch_assoc()) {
        if ($data['Tsetor'] !== null) {
            $setor = $data['Tsetor'];
        }
    }

    $sql = $koneksi->query("SELECT SUM(tarik) as Ttarik  from tb_tabungan where jenis='TR' and tgl BETWEEN '$dt1' AND '$dt2'");
    while ($data = $sql->fetch_assoc()) {
        if ($data['Ttarik'] !== null) {
            $tarik = $data['Ttarik'];
        }
    }

    $saldo = $setor - $tarik;
}

?>
<section class="content">

    <div class="box box-primary">
        <div class="box-header">
            Saldo Tabungan (Kas)
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Total Setoran</th>
                            <th>Total Tarikan</th>
                            <th>Saldo Tabungan</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>
                                <a href="?page=data_setor" class="btn btn-success btn-sm">
                                    <i class="glyphicon glyphicon-info-sign" title="Detail"> </i>
                                </a>
                                <?php echo rupiah($setor); ?>
                            </td>
                            <td>
                                <a href="?page=data_tarik" class="btn btn-danger btn-sm">
                                    <i class="glyphicon glyphicon-info-sign" title="Detail"> </i>
                                </a>
                                <?php echo rupiah($tarik); ?>
                            </td>
                            <td>
                                <?php echo rupiah($saldo); ?>
                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</section>
