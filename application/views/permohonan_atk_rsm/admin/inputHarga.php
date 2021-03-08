
<section class="content">
    <div class="row">
        <div class="col-sm-12">
            <?= $this->session->flashdata('message'); ?>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                    </div>
                    <h3 class="text-center">Input harga Barang</h3>

                </div>
                <form method="post" action="<?= base_url('lkk/permohonan_atk_rsm/hargaGo'); ?>" enctype="multipart/form-data" class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nama_barang" class=" col-sm-3 control-label">Nama Barang</label>
                            <div class="col-sm-5">
                                <input type="hidden" id="id_atk" name="id_atk" class="form-control" value="<?= $atk['id_atk']; ?>" readonly>
                                <input id="nama_barang" type="text" name="nama_barang" class="form-control" value="<?= $atk['nama_barang']; ?>" required>
                            </div>
                            <?= form_error('nama_barang', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="merek" class=" col-sm-3 control-label">Merek</label>
                            <div class="col-sm-5">
                                <input id="merek" type="text" class="form-control" name="merek" value="<?= $atk['merek']; ?>" required>
                            </div>
                            <?= form_error('merek', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="type" class=" col-sm-3 control-label">type</label>
                            <div class="col-sm-5">
                                <input id="type" type="text" class="form-control" name="type" value="<?= $atk['type']; ?>" required>
                            </div>
                            <?= form_error('type', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>


                        <div class="form-group">
                            <label for="jumlah" class=" col-sm-3 control-label">Jumlah</label>
                            <div class="col-sm-2">
                                <input id="jumlah" type="number"  class="form-control" name="jumlah" value="<?= $atk['jumlah']; ?>" required readonly>
                            </div>
                            <?= form_error('jumlah', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="jumlah" class=" col-sm-3 control-label">satuan</label>
                            <div class="col-sm-2">
                                <input id="satuan" type="text"  class="form-control" name="satuan" value="<?= $atk['satuan']; ?>" required readonly>
                            </div>
                            <?= form_error('satuan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="jumlah" class=" col-sm-3 control-label">Harga Barang</label>
                            <div class="col-sm-2">
                                <input id="harga" type="number"  class="form-control" name="harga" value="<?= $atk['harga']; ?>" required>
                            </div>
                            <?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="jumlah" class=" col-sm-3 control-label">Upah Pemasangan</label>
                            <div class="col-sm-2">
                                <input id="upah" type="number" class="form-control" name="upah" value="<?= $atk['pemasangan']; ?>" required>
                            </div>
                            <?= form_error('upah', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="jumlah" class=" col-sm-3 control-label">Total</label>
                            <div class="col-sm-2">
                                <input id="total" type="number" class="form-control" name="total" value="<?= $atk['total']; ?>" required readonly>
                            </div>
                            <?= form_error('total', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>



                        <div class="form-group">
                            <input type="submit" id="simpan" name="simpan" class="btn btn-primary col-sm-offset-3 " value="Simpan">
                            &nbsp;
                            <input type="reset" class="btn btn-danger" value="Batal">
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
    </div>
    </div>
</section>

