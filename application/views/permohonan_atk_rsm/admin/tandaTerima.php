    <style>
            #signature{
                width: 100%;
                height: auto;
                border: 1px solid black;
            }
        </style>
<div class="col-xs-12">
     <?= $this->session->flashdata('message'); ?>
     <div class="box box-primary">
          <div class="box-header">
               <h3 class="box-title">Serah Terima Barang</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
          <form method="POST" action="<?= base_url('validatorRSM/permohonan_atk_rsm/diterimaGo'); ?>"  enctype="multipart/form-data">
            

               <div id="signature"></div>
                   <div class="form-group">
                   
                   <input type='button' id='click' value='click'><br/>
                   <textarea id='output' name="img"></textarea><br/>
                  </div>

                  <div class="form-group">
                    <label for="nik">Unit</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= $atk['username']; ?>" placeholder="npm" readonly>
                  </div>

                  <div class="form-group">
                    <label for="nik">Tgl. Permohonan</label>
                    <input type="text" class="form-control" name="created_at" value="<?= $atk['created_at']; ?>" placeholder="created_at" readonly>
                  </div>

                <div class="card-footer">
                  <button type="submit" name="update"  class="btn btn-primary">Simpan</button>
                </div>
              </form>
          </div>
          <!-- /.box-body -->
     </div>
     <!-- /.box -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>

