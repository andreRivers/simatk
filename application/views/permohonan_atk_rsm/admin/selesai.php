<div class="col-xs-12">
     <?= $this->session->flashdata('message'); ?>
     <div class="box box-primary">
          <div class="box-header">
               <h3 class="box-title">Permohonan Selesai</h3>
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
                                                  <a href="<?= base_url('validatorRSM/permohonan_atk_rsm/detailSelesai/'); ?><?= $at['username']; ?>/<?= $at['created_at']; ?>" class="btn btn-success" title="Detail"><i class="fa fa-eye"></i> </a>
                                                  <!-- CETAK SERAH TERIMA -->
                                                 
                                             <?php } ?>
                                        <?php } ?>

                                        <?php if ($user['role_id'] == '4') { ?>
                                             
                                                  <a href="<?= base_url('lkk/permohonan_atk_rsm/prosesDetail/'); ?><?= $at['username']; ?>/<?= $at['created_at']; ?>" class="btn btn-success" title="Detail"><i class="fa fa-eye"></i> </a>
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
