<?php if ($user['role_id'] == '20') { ?>
            <?php
            $username = $this->session->userdata('username');
            $inbox = $this->db->query("SELECT * FROM at_atk where sts=10 AND is_active=1");
            $proses = $this->db->query("SELECT * FROM at_atk where sts BETWEEN 20 AND 30 AND is_active=1");
            $shop = $this->db->query("SELECT * FROM at_atk where sts=40 AND is_active=1");
            $sending = $this->db->query("SELECT * FROM at_atk where sts=50 AND is_active=1");
            $pengambilan = $this->db->query("SELECT * FROM at_atk where sts=60  AND is_active=1");
            $selesai = $this->db->query("SELECT * FROM at_atk where sts=70 AND is_active=1");
            $tolak = $this->db->query("SELECT * FROM at_atk where sts=80 AND is_active=1");
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
                                    <a href="<?= base_url('validatorRSM/permohonan_atk_rsm/inbox'); ?>" class="btn btn-block btn-primary btn-lg">
                                        <i class="fa fa-gears"></i><br>
                                        Inbox<small class="label pull-left bg-red"><?php echo $inbox->num_rows(); ?></small></a>
                                </td>
                                        <td>
                                            <a href="<?= base_url('validatorRSM/permohonan_atk_rsm/proses'); ?>" class="btn btn-block btn-primary btn-lg">
                                                <i class="fa fa-gears"></i><br>
                                                Proccess<small class="label pull-left bg-red"><?php echo $proses->num_rows(); ?></small></a>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('validatorRSM/permohonan_atk_rsm/shop'); ?>" class="btn btn-block btn-primary btn-lg">
                                                <i class="fa fa-shopping-cart"></i><br>
                                                Shopping<small class="label pull-left bg-red"><?php echo $shop->num_rows(); ?></small></a>
                                        </td>

                                        <td>
                                            <a href="<?= base_url('validatorRSM/permohonan_atk_rsm/sending'); ?>" class="btn btn-block btn-primary btn-lg">
                                                <i class="fa fa-send"></i><br>
                                                Sending<small class="label pull-left bg-red"><?php echo $sending->num_rows(); ?></small></a>
                                        </td>

                                        <td>
                                            <a href="<?= base_url('validatorRSM/permohonan_atk_rsm/pengambilan'); ?>" class="btn btn-block btn-primary btn-lg">
                                                <i class="fa fa-cubes"></i><br>
                                                Pick Up<small class="label pull-left bg-red"><?php echo $pengambilan->num_rows(); ?></small></a>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('validatorRSM/permohonan_atk_rsm/selesai'); ?>" class="btn btn-block btn-primary btn-lg">
                                                <i class="fa fa-gears"></i><br>
                                                Sent<small class="label pull-left bg-red"><?php echo $selesai->num_rows(); ?></small></a>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('validatorRSM/permohonan_atk_rsm/tolak'); ?>" class="btn btn-block btn-primary btn-lg">
                                                <i class="fa fa-times"></i><br>
                                                Rejected<small class="label pull-left bg-red"><?php echo $tolak->num_rows(); ?></small></a>
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

                <?php if ($user['role_id'] == '4') { ?>
                    <?php
                    $username = $this->session->userdata('username');
                    $proses = $this->db->query("SELECT * FROM at_atk where sts=30 AND is_active=1");
                    $shop = $this->db->query("SELECT * FROM at_atk where sts=40 AND is_active=1");
                    $sending = $this->db->query("SELECT * FROM at_atk where sts=50 AND is_active=1");
                    $selesai = $this->db->query("SELECT * FROM at_atk where sts BETWEEN 60 AND 70 AND is_active=1 AND tagihan=10");
                    $invoice = $this->db->query("SELECT * FROM at_atk where is_active=1 AND tagihan=2");
                    $tolak = $this->db->query("SELECT * FROM at_atk where sts=80 AND is_active=1");
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
                                                    <a href="<?= base_url('lkk/permohonan_atk_rsm/proses'); ?>" class="btn btn-block btn-primary btn-lg">
                                                        <i class="fa fa-gears"></i><br>
                                                        Process<small class="label pull-left bg-red"><?php echo $proses->num_rows(); ?></small></a>
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('lkk/permohonan_atk_rsm/shop'); ?>" class="btn btn-block btn-primary btn-lg">
                                                        <i class="fa fa-shopping-cart"></i><br>
                                                        Shopping<small class="label pull-left bg-red"><?php echo $shop->num_rows(); ?></small></a>
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('lkk/permohonan_atk_rsm/sending'); ?>" class="btn btn-block btn-primary btn-lg">
                                                        <i class="fa fa-cubes"></i><br>
                                                        Sending<small class="label pull-left bg-red"><?php echo $sending->num_rows(); ?></small></a>
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('lkk/permohonan_atk_rsm/selesai'); ?>" class="btn btn-block btn-primary btn-lg">
                                                        <i class="fa fa-gears"></i><br>
                                                        Accepted<small class="label pull-left bg-red"><?php echo $selesai->num_rows(); ?></small></a>
                                                </td>
                                                <!-- <td>
                                                    <a href="<?= base_url('lkk/permohonan_atk_rsm/invoice'); ?>" class="btn btn-block btn-primary btn-lg">
                                                        <i class="fa fa-gears"></i><br>
                                                        Invoice<small class="label pull-left bg-red"><?php echo $invoice->num_rows(); ?></small></a>
                                                </td> -->
                                                <td>
                                                    <a href="<?= base_url('lkk/permohonan_atk_rsm/tolak'); ?>" class="btn btn-block btn-primary btn-lg">
                                                        <i class="fa fa-times"></i><br>
                                                        Reject<small class="label pull-left bg-red"><?php echo $tolak->num_rows(); ?></small></a>
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