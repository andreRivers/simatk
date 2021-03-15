<section class="content">
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                    </div>
                    <h3 class="text-center">Cetak Laporan Non RSM</h3>

                </div>
                <form method="post" action="<?= base_url('lkk/permohonan_atk/cetakLaporan'); ?>" enctype="multipart/form-data" class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nama_barang" class=" col-sm-3 control-label">Tanggal Awal Laporan</label>
                            <div class="col-sm-5">

                                <input id="tgl_awal" type="datetime-local"  id="tgl_awal" name="tgl_awal" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="merek" class=" col-sm-3 control-label">Tanggal Akhir Laporan</label>
                            <div class="col-sm-5">
                                <input id="tgl_akhir" type="date" class="form-control" name="tgl_akhir" required>
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <input type="submit" id="cetak" name="cetak" class="btn btn-primary col-sm-offset-3 " value="Cetak">
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
    </div>
    </div>
</section>