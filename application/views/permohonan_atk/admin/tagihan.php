
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
<section class="content">
<div class="row">
<div class="col-xs-12">
    <?= $this->session->flashdata('message'); ?>
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">List Tagihan</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="tagihan" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Unit</th>
                        <th>Tgl. Disetujui</th>
                        <th>Nama Barang</th>
                        <th>Merek</th>
                        <th>Tipe</th>
                        <th>Jumlah</th>
                        <th>Satuan</th>
                        <th>Harga Satuan</th>
                        <th>Total</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($atk as $at) : ?>
                        <tr>
                            <td><?= $at['id_atk']; ?></td>
                            <td><?= $at['username']; ?>
                            <td><?= date("d F Y", strtotime($at['date_pimpinan'])) ?></td>
                            <td><?= $at['nama_barang']; ?></td>
                            <td><?= $at['merek']; ?></td>
                            <td><?= $at['type']; ?></td>
                            <td><?= $at['jumlah']; ?></td>
                            <td><?= $at['satuan']; ?></td>
                            <td><?= number_format($at['harga']); ?></td>
                            <td><?= number_format($at['total']); ?></td>
                            <td>
                            <a href="<?= base_url('lkk/tagihan/unlist/'); ?><?= $at['id_atk']; ?>" class="btn btn-danger" title="Unlist"><i class="fa fa-times"></i> </a>
                           
                            </td>
                        </tr>
                    <?php endforeach; ?>
            </table>
            <a href="<?= base_url('lkk/tagihan/invoice'); ?>" class="btn btn-primary" ><i class="fa fa-print"></i> Cetak Invoice</a>
            <a href="<?= base_url('lkk/tagihan/lunas'); ?>" class="btn btn-danger" onClick="return confirm('Apakah Tagihan Ini Sudah Lunas ?')"><i class="fa fa-check"></i> Lunas</a>
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


</div>
</section>

</div>
<!-- /.container -->
</div>
<!-- /.content-wrapper -->

</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="container">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.2.1
        </div>
        <strong>Copyright &copy; <?= date('Y');?> <a href="">SIMPERATAS</a>.</strong> All rights
        reserved.
    </div>
    <!-- /.container -->
</footer>
</div>
<!-- ./wrapper -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>



<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('assets/'); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?= base_url('assets/'); ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url('assets/'); ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/'); ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/'); ?>dist/js/demo.js"></script>



<script>
$(document).ready(function() {
    $('#tagihan').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>



</body>

</html>