<div class="col-xs-12">
    <?= $this->session->flashdata('message'); ?>
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Invoice</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Unit</th>
                        <th>Permohonan</th>
                        <?php if ($user['role_id'] == '4') { ?>
                            <th>Total</th>
                        <?php } ?>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($atk as $at) : ?>
                        <tr>
                            <td><?= $at['id_atk']; ?></td>
                            <td><?= $at['username']; ?>
                            <td><?= $at['nama_barang']; ?>
                                <br>
                                <small><i>Merek : <?= $at['merek']; ?> | Tipe : <?= $at['type']; ?>| Jumlah Barang : <?= $at['jumlah']; ?> <?= $at['satuan']; ?> | Tanggal Permohonan :
                                        <?= date("d F Y", strtotime($at['created_at'])) ?></i><br>
                                    Keterangan : <?= $at['ket']; ?><br>
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
                                      <?php if ($user['role_id'] == '4') { ?>
                                        <?php
                                    if ($at['tagihan'] == 10) {
                                        echo '<span class="badge bg-blue">Belum Ditagih</span> ';
                                    } elseif ($at['tagihan'] == 20) {
                                        echo '<span class="badge bg-light-orange">Proses Penagihan</span>';
                                    } elseif ($at['tagihan'] == 30) {
                                        echo '<span class="badge bg-green">Sudah Lunas</span>';
                                    ?>
                                      <?php } ?>
                                      <?php } ?>

                                </small>
                                <?php if ($user['role_id'] == '4') { ?>
                                    <td><?= number_format($at['total']); ?></td>
                                <?php } ?>
                            </td>
                            <td>

                                <?php if ($user['role_id'] == '10') { ?>
                                    <?php if ($at['sts'] < '20') { ?>
                                        <a href="<?= base_url('permohonan_atk_rsm/hapus/'); ?><?= $at['id_atk']; ?>" class="btn btn-danger" title="Batal" onClick="return confirm('Apakah Anda Yakin?')"><i class="fa fa-times"></i> </a>
                                        <a href="<?= base_url('permohonan_atk_rsm/edit/'); ?><?= $at['id_atk']; ?>" class="btn btn-primary" title="Edit"><i class="fa fa-edit"></i> </a>
                                    <?php } ?>
                                <?php } ?>

                                <?php if ($user['role_id'] == '20') { ?>
                                    <?php if ($at['sts'] == '10') { ?>
                                        <a href="<?= base_url('validator/permohonan_atk_rsm/setuju/'); ?><?= $at['id_atk']; ?>" class="btn btn-success" title="Setuju"><i class="fa fa-check"></i> </a>
                                        <button type="button" class="btn btn-danger" title="Tolak" data-toggle="modal" data-target="#tolak"><i class="fa fa-times"></i> </button>
                                    <?php } ?>
                                <?php } ?>

                                <?php if ($user['role_id'] == '3') { ?>
                                    <?php if ($at['sts'] == '20') { ?>
                                        <a href="<?= base_url('pimpinan/permohonan_atk_rsm/setuju/'); ?><?= $at['id_atk']; ?>" class="btn btn-success" title="Setuju"><i class="fa fa-check"></i> </a>
                                        <button type="button" class="btn btn-danger" title="Tolak" data-toggle="modal" data-target="#tolakPimpinan"><i class="fa fa-times"></i> </button>
                                    <?php } ?>
                                <?php } ?>


                                <?php if ($user['role_id'] == '4') { ?>
                                    <?php if ($at['sts'] == '30') { ?>
                                        <a href="<?= base_url('lkk/permohonan_atk_rsm/setuju/'); ?><?= $at['id_atk']; ?>" class="btn btn-success" title="Belanjakan"><i class="fa fa-shopping-cart"></i> </a>
                                        <button type="button" class="btn btn-danger" title="Tolak" data-toggle="modal" data-target="#tolakPimpinan"><i class="fa fa-times"></i> </button>
                                    <?php } ?>

                                    <?php if ($at['sts'] == '60') { ?>
                                    
                                        <?php if ($at['tagihan'] == '10') { ?>
                                        <a href="<?= base_url('lkk/permohonan_atk_rsm/tagihan/'); ?><?= $at['id_atk']; ?>" class="btn btn-success" title="Masukan Ketagihan"><i class="fa fa-credit-card"></i> </a>
                                        <?php } ?>
                                    <?php } ?>

                                    <?php if ($at['sts'] == '70') { ?>
                                        <?php if ($at['tagihan'] == '10') { ?>
                                        <a href="<?= base_url('lkk/permohonan_atk_rsm/tagihan/'); ?><?= $at['id_atk']; ?>" class="btn btn-success" title="Masukan Ketagihan"><i class="fa fa-credit-card"></i> </a>
                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>


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

<!-- Modal -->
<div class="modal fade" id="tolak" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Berikan Tanggapan Penolakan.</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('validatorRSM/permohonan_atk_rsm/tolakGo/'); ?>">
                    <div class="form-group">
                        <label for="usr">ID Permohonan:</label>
                        <input type="text" class="form-control" id="id_atk" name="id_atk" value="<?= $at['id_atk']; ?>" readonly required>
                    </div>
                    <div class=" form-group">
                        <label for="usr">Keterangan:</label>
                        <textarea type="text" class="form-control" rows="5" id="komentar" name="komentar" required></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success"><i class="fa fa-send"></i> send</button>
                <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="fa fa-times"></i> Close</button>
            </div>
            </form>
        </div>

    </div>
</div>


<!-- Modal Pimpinan Tolak -->
<div class="modal fade" id="tolakPimpinan" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Berikan Tanggapan Penolakan.</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('pimpinan/permohonan_atk_rsm/tolakGo/'); ?>">
                    <div class="form-group">
                        <label for="usr">ID Permohonan:</label>
                        <input type="text" class="form-control" id="id_atk" name="id_atk" value="<?= $at['id_atk']; ?>" readonly required>
                    </div>
                    <div class=" form-group">
                        <label for="usr">Keterangan:</label>
                        <textarea type="text" class="form-control" rows="5" id="komentar" name="komentar" required></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success"><i class="fa fa-send"></i> send</button>
                <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="fa fa-times"></i> Close</button>
            </div>
            </form>
        </div>

    </div>
</div>