<section class="content">
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                    </div>
                    <h3 class="text-center">Ubah Permohonan Barang</h3>

                </div>
                <form method="post" action="<?= base_url('permohonan_atk/editGo'); ?>" enctype="multipart/form-data" class="form-horizontal">
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
                                <input id="jumlah" type="number" onkeyup="" class="form-control" name="jumlah" value="<?= $atk['jumlah']; ?>" required>
                            </div>
                            <?= form_error('jumlah', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="satuan" class="a col-sm-3 control-label">Satuan</label>
                            <div class="col-sm-3">
                                <select id="satuan" name="satuan" class="form-control" required>
                                    <option selected disabled value="">Pilih</option>
                                    <?php foreach ($satuan as $st) : ?>
                                        <option value="<?= $st['satuan']; ?>"><?= $st['satuan']; ?></option>
                                    <?php endforeach; ?>

                                </select>
                            </div>
                            <?= form_error('satuan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="ket" class=" col-sm-3 control-label">Keterangan</label>
                            <div class="col-sm-7">
                                <textarea class="form-control" rows="5" id="ket" name="ket" required></textarea>
                            </div>
                            <?= form_error('ket', '<small class="text-danger pl-3">', '</small>'); ?>
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