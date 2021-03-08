<div class="col-xs-12">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Permohonan Ditolak</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Permohonan</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($atk as $at) : ?>
                        <tr>
                            <td><?= $at['id_atk']; ?></td>
                            <td><?= $at['nama_barang']; ?>
                                <br>
                                <small><i>Merek : <?= $at['merek']; ?> | Tipe : <?= $at['type']; ?> | Tanggal Permohonan :
                                        <?= date("d F Y", strtotime($at['created_at'])) ?></i><br>
                                    Keterangan<?= $at['ket']; ?><br>
                                    <?php
                                    if ($at['sts'] == 10) {
                                        echo '<span class="badge bg-grey">Permohonan Terkirim</span> ';
                                    } elseif ($at['sts'] == 20) {
                                        echo '<span class="badge bg-light-blue">Proccess</span>';
                                    } elseif ($at['sts'] == 30) {
                                        echo '<span class="badge bg-blue">Aproved</span>';
                                    } elseif ($at['sts'] == 40) {
                                        echo '<span class="badge bg-orange">Shopping</span>';
                                    } elseif ($at['sts'] == 50) {
                                        echo '<span class="badge bg-red">Sending</span>';
                                    } elseif ($at['sts'] == 60) {
                                        echo '<span class="badge bg-green">Pick up</span>';
                                    }  elseif ($at['sts'] == 70) {
                                        echo '<span class="badge bg-green">Finish</span>';
                                    }  else {
                                        echo '<span class="badge bg-default">Rejected</span>';
                                    }

                                    ?>
                                    <br>Tanggapan Penolakan <?= $at['komentar']; ?>
                                </small>
                            </td>

                        </tr>
                    <?php endforeach; ?>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->