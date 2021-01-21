</div>
<!-- /.container -->
</div>
<!-- /.content-wrapper -->

</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="container">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.4.18
        </div>
        <strong>Copyright &copy; 2014-2019 <a href="">AdminLTE</a>.</strong> All rights
        reserved.
    </div>
    <!-- /.container -->
</footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?= base_url('assets/'); ?>bower_components/jquery/dist/jquery.min.js"></script>
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
<!-- DataTables -->
<script src="<?= base_url('assets/'); ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>

 <link href="<?= base_url('assets/'); ?>signature/css/jquery.signaturepad.css" rel="stylesheet">
  <script src="<?= base_url('assets/'); ?>signature/js/numeric-1.2.6.min.js"></script> 
   <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script src="<?= base_url('assets/'); ?>signature/js/bezier.js"></script>
  <script src="<?= base_url('assets/'); ?>signature/js/jquery.signaturepad.js"></script> 
  
  <script  src="https://github.com/niklasvh/html2canvas/releases/download/0.4.1/html2canvas.js"></script>
  <script src="<?= base_url('assets/'); ?>signature/js/json2.min.js"></script>
  <script src="<?= base_url('assets/'); ?>jSignature-master/libs/jSignature.min.js"></script>
 
<script type="text/javascript">
   
        $(document).ready(function() {

                // Initialize jSignature
                var $sigdiv = $("#signature").jSignature({'UndoButton':true});

                $('#click').click(function(){
                    // Get response of type image
                    var data = $sigdiv.jSignature('getData', 'image');

                    // Storing in textarea
                    $('#output').val(data);
                    
                    // Alter image source
                    $('#sign_prev').attr('src',"data:"+data);
                    $('#sign_prev').show();
                });
            });
</script>




<script>
    $(function() {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#jumlah, #harga ,#upah").keyup(function() {
            var harga  = $("#harga").val();
            var jumlah = $("#jumlah").val();
            var upah = $("#upah").val();

            var total = parseInt(harga) * parseInt(jumlah) + parseInt(upah) ;
            $("#total").val(total);
        });
    });
</script>


<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });



    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?= base_url('admin/changeaccess'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
            }
        });

    });
</script>


</body>

</html>