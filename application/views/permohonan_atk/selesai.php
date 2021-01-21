<div class="col-xs-12">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Permohonan Sudah Selesai</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Permohonan</th>
                        <th>#</th>
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
                                        <?php
                                    if ($at['sts'] == 1) {
                                        echo '<span class="badge bg-grey">Permohonan Terkirim</span> ';
                                    } elseif ($at['sts'] == 2) {
                                        echo '<span class="badge bg-light-blue">Proccess</span>';
                                    } elseif ($at['sts'] == 3) {
                                        echo '<span class="badge bg-blue">Aproved</span>';
                                    } elseif ($at['sts'] == 4) {
                                        echo '<span class="badge bg-orange">Shopping</span>';
                                    } elseif ($at['sts'] == 5) {
                                        echo '<span class="badge bg-red">Sending</span>';
                                    } elseif ($at['sts'] == 6) {
                                        echo '<span class="badge bg-green">Pick up</span>';
                                    }  elseif ($at['sts'] == 7) {
                                        echo '<span class="badge bg-green">Finish</span>';
                                    }  else {
                                        echo '<span class="badge bg-default">Rejected</span>';
                                    }

                                    ?>
                                </small>
                            </td>
                            <td> <a href="" class="btn btn-danger" title="Batal"><i class="fa fa-times"></i> </a>
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