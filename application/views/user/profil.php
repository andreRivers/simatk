 <!-- Main content -->
 <section class="content">

     <?= $this->session->flashdata('message'); ?>
     <div class="row">
         <div class="col-md-3">
             <!-- Profile Image -->
             <div class="box box-primary">
                 <div class="box-body box-profile">
                     <img class="profile-user-img img-responsive img-circle" src="<?= base_url('image/') . $user['image']; ?>" alt="User profile picture">
                     <h3 class="profile-username text-center"><?= $user['username']; ?></h3>
                     <p class="text-muted text-center"><?= $user['name']; ?></p>
                     <button data-toggle="modal" data-target="#modalProfil" class="btn btn-primary btn-block"><b>Edit Foto</b></button>
                     <a href="<?= base_url('user/ubahPassword') ?>" class="btn btn-warning btn-block"><b>Edit Password</b></a>
                 </div>
                 <!-- /.box-body -->
             </div>

         </div>
         <!-- /.col -->
         <div class="col-md-9">
             <div class="nav-tabs-custom">
                 <ul class="nav nav-tabs">
                     <li class="active"><a href="#activity" data-toggle="tab">Biodata</a></li>
                 </ul>
                 <div class="tab-content">
                     <div class="active tab-pane" id="activity">
                         <table class="table">
                             <tbody>
                                 <tr>

                                     <td>username</td>
                                     <td><?= $user['username']; ?></td>
                                 </tr>
                                 <tr>

                                     <td>Nama</td>
                                     <td><?= $user['name']; ?></td>
                                 </tr>
                                 <tr>

                                     <td>Email</td>
                                     <td><?= $user['email']; ?></td>
                                 </tr>
                                 <tr>

                                     <td>No. Hp</td>
                                     <td><?= $user['no_hp']; ?></td>
                                 </tr>
                             </tbody>
                         </table>
                         <button data-toggle="modal" data-target="#modaledit" class="btn btn-warning btn-left"><b>Edit Biodata</b></button>
                     </div>
                 </div>
                 <!-- /.tab-content -->
             </div>
             <!-- /.nav-tabs-custom -->
         </div>
         <!-- /.col -->
     </div>
     <!-- /.row -->

 </section>

 <div class="modal fade" id="modalProfil" tabindex="-1" role="dialog">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title" id="modalProfil">Upload Photo MAX 1MB</h4>
             </div>
             <div class="modal-body">
                 <form id="form_validation" method="POST" action="<?= base_url('user/ubahFoto'); ?>" enctype="multipart/form-data">
                     <div class="form-group form-float">
                         <div class="form-line">
                             <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                         </div>
                         <?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
                     </div>

             </div>
             <div class="modal-footer">
                 <button type="submit" class="btn btn-primary">Simpan</button>
                 <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
             </div>
             </form>
         </div>
     </div>
 </div>

 <div class="modal fade" id="modaledit" tabindex="-1" role="dialog">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title" id="modalProfil">Ubah Identitas</h4>
             </div>
             <div class="modal-body">
                 <form id="form_validation" method="POST" action="<?= base_url('user/ubahData'); ?>" enctype="multipart/form-data">
                     <div class="form-group form-float">
                         <div class="form-line">
                             <input type="text" class="form-control" id="name" name="name" placeholder="Nama Unit" required>
                         </div>
                         <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                     </div>

                     <div class="form-group form-float">
                         <div class="form-line">
                             <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No HP aktif" required>
                         </div>
                         <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                     </div>

             </div>
             <div class="modal-footer">
                 <button type="submit" class="btn btn-primary">Simpan</button>
                 <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
             </div>
             </form>
         </div>
     </div>
 </div>