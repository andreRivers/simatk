<?php if ($user['role_id'] == '1') {
    $username = $this->session->userdata('username');
    $notif = $this->db->query("SELECT * FROM at_atk where username='$username' AND sts=6 AND is_active=1");
} ?>

<?php if ($user['role_id'] == '2') {
    $notif = $this->db->query("SELECT * FROM at_atk where sts=1 AND is_active=1");
} ?>

<?php if ($user['role_id'] == '3') {
    $notif = $this->db->query("SELECT * FROM at_atk where sts=2 AND is_active=1");
} ?>

<?php if ($user['role_id'] == '4') {
    $notif = $this->db->query("SELECT * FROM at_atk where sts=3 AND is_active=1");
} ?>

<header class="main-header">
    <nav class="navbar navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <a href="<?= base_url('user'); ?>" class="navbar-brand"><b> <i class="fa fa-home"></i> DASHBOARD</b></a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>



            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="<?= base_url('user'); ?>">
                            <i class="fa fa-home"></i>
                            Beranda
                            <span class="sr-only">(current)</span>
                        </a></li>

                    <li><a href="<?= base_url('user/profil'); ?>"> <i class="fa fa-user"></i> Profil</a></li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-file"></i> Permohonan Atk <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="<?= base_url('permohonan_atk/input'); ?>">Buat Permohonan</a></li>
                            <?php if ($user['role_id'] == '1') { ?>
                                <li><a href="<?= base_url('permohonan_atk/proses'); ?>">List Permohonan</a></li>
                            <?php } ?>
                            <?php if ($user['role_id'] == '2') { ?>
                                <li><a href="<?= base_url('validator/permohonan_atk/proses'); ?>">List Permohonan</a></li>
                            <?php } ?>
                            <?php if ($user['role_id'] == '3') { ?>
                                <li><a href="<?= base_url('pimpinan/permohonan_atk/proses'); ?>">List Permohonan</a></li>
                            <?php } ?>
                            <?php if ($user['role_id'] == '4') { ?>
                                <li><a href="<?= base_url('lkk/permohonan_atk/proses'); ?>">List Permohonan</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                </ul>

            </div>
            <!-- /.navbar-collapse -->
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Notifications Menu -->
                    <li class="dropdown notifications-menu">
                        <!-- Menu toggle button -->
                        <?php if ($user['role_id'] == '1') { ?>
                            <a href="<?= base_url('permohonan_atk/pengambilan'); ?>">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning"><?php echo $notif->num_rows(); ?></span>
                            </a>
                        <?php } ?>

                        <?php if ($user['role_id'] == '2') { ?>
                            <a href="<?= base_url('validator/permohonan_atk/proses'); ?>">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning"><?php echo $notif->num_rows(); ?></span>
                            </a>
                        <?php } ?>


                        <?php if ($user['role_id'] == '3') { ?>
                            <a href="<?= base_url('pimpinan/permohonan_atk/proses'); ?>">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning"><?php echo $notif->num_rows(); ?></span>
                            </a>
                        <?php } ?>


                        <?php if ($user['role_id'] == '4') { ?>
                            <a href="<?= base_url('lkk/permohonan_atk/proses'); ?>">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning"><?php echo $notif->num_rows(); ?></span>
                            </a>
                        <?php } ?>

                    </li>

                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="<?= base_url('image/'); ?><?= $user['image']; ?>" class="user-image" alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs"><?= $user['username']; ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="<?= base_url('image/'); ?><?= $user['image']; ?>" class="img-circle" alt="User Image">

                                <p>
                                    <?= $user['name']; ?>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="<?= base_url('user/profil'); ?>" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?= base_url('auth/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-custom-menu -->
        </div>
        <!-- /.container-fluid -->
    </nav>
</header>

<!-- Full Width Column -->
<div class="content-wrapper">
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashsoard
                <small>Application 2.0</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active"><?= $title; ?></li>
            </ol>
        </section>