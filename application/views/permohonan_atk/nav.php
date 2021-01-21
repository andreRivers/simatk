<?php if ($user['role_id'] == '1') { ?>
    <?php
    $username = $this->session->userdata('username');
    $terkirim = $this->db->query("SELECT * FROM at_atk where username='$username' AND sts=1 AND is_active=1");
    $proses = $this->db->query("SELECT * FROM at_atk where username='$username' AND sts BETWEEN 2 AND 6 AND is_active=1");
    $pengambilan = $this->db->query("SELECT * FROM at_atk where username='$username' AND sts=6 AND is_active=1");
    $selesai = $this->db->query("SELECT * FROM at_atk where username='$username' AND sts=7 AND is_active=1");
    $tolak = $this->db->query("SELECT * FROM at_atk where username='$username' AND sts=8 AND is_active=1");
    ?>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                    </div>
                    <div class="box-body pad table-responsive">
                        <table class="table table-bordered text-center">
                            <tr>
                            <td>
                                    <a href="<?= base_url('permohonan_atk/terkirim'); ?>" class="btn btn-block btn-primary btn-lg">
                                        <i class="fa fa-send"></i><br>
                                        Sent<small class="label pull-left bg-red"><?php echo $terkirim->num_rows(); ?></small></a>
                                </td>
                                <td>
                                    <a href="<?= base_url('permohonan_atk/proses'); ?>" class="btn btn-block btn-primary btn-lg">
                                        <i class="fa fa-gears"></i><br>
                                        Proccess<small class="label pull-left bg-red"><?php echo $proses->num_rows(); ?></small></a>
                                </td>
                                <td>
                                    <a href="<?= base_url('permohonan_atk/pengambilan'); ?>" class="btn btn-block btn-primary btn-lg">
                                        <i class="fa fa-cubes"></i><br>
                                        Pick up<small class="label pull-left bg-red"><?php echo $pengambilan->num_rows(); ?></small></a>
                                </td>
                                <td>
                                    <a href="<?= base_url('permohonan_atk/selesai'); ?>" class="btn btn-block btn-primary btn-lg">
                                        <i class="fa fa-check"></i><br>
                                        Accepted<small class="label pull-left bg-red"><?php echo $selesai->num_rows(); ?></small></a>
                                </td>
                                <td>
                                    <a href="<?= base_url('permohonan_atk/tolak'); ?>" class="btn btn-block btn-primary btn-lg">
                                        <i class="fa fa-times"></i><br>
                                        rejected<small class="label pull-left bg-red"><?php echo $tolak->num_rows(); ?></small></a>
                                </td>

                            </tr>
                            <tr>
                        </table>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <!-- /.col -->
        <?php } ?>
