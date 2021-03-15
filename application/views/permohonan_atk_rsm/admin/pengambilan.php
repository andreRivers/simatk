<div class="col-xs-12">
     <?= $this->session->flashdata('message'); ?>
     <div class="box box-primary">
          <div class="box-header">
               <h3 class="box-title">Pemgambilan Barang Permohonan</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
               <table id="example1" class="table table-bordered table-striped">
                    <thead>
                         <tr>
                              <th>id</th>
                              <th>Unit</th>
                              <th>TGL Pemohonan</th>
                              <th>#</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php foreach ($atk as $at) : ?>
                              <tr>
                                   <td><?= $at['id_atk']; ?></td>
                                   <td><?= $at['username']; ?></td>
                                   <td> <?= date("d F Y", strtotime($at['created_at'])) ?> </td>
                                   <td>
                                        <?php if ($user['role_id'] == '20') { ?>
                                             <?php if ($at['sts'] = 50) { ?>
                                                  <a href="<?= base_url('validatorRSM/permohonan_atk_rsm/prosesDetail/'); ?><?= $at['username']; ?>/<?= $at['created_at']; ?>" class="btn btn-success" title="Detail"><i class="fa fa-eye"></i> </a>
                                                  <!-- Diterima -->
                                                  <a href="<?= base_url('validatorRSM/permohonan_atk_rsm/diterima/'); ?><?= $at['username']; ?>/<?= $at['created_at']; ?>" class="btn btn-warning" title="Diterima"><i class="fa fa-handshake-o"></i> </a>
                                             <?php } ?>
                                        <?php } ?>

                                        <?php if ($user['role_id'] == '4') { ?>
                                             <?php if ($at['sts'] = 50) { ?>
                                                  <a href="<?= base_url('lkk/permohonan_atk_rsm/prosesDetail/'); ?><?= $at['username']; ?>/<?= $at['created_at']; ?>" class="btn btn-success" title="Detail"><i class="fa fa-eye"></i> </a>
                                                  <!-- CETAK SERAH TERIMA -->
                                                  <a href="<?= base_url('lkk/permohonan_atk_rsm/cst/'); ?><?= $at['username']; ?>/<?= $at['created_at']; ?>" class="btn btn-info" title="Detail"><i class="fa fa-print"></i> </a>
                                                  
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