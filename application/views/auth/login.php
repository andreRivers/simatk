<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href=""><b>SIMATK</b> Web</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <?= $this->session->flashdata('message'); ?>
            <form method="post" action="<?= base_url('auth'); ?>">
                <div class="form-group has-feedback">
                    <input type="text" id="username" name="username" class="form-control" placeholder="username" value="<?= set_value('username'); ?>">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <a href="<?= base_url('auth/forgotpassword'); ?>">I forgot my password</a><br>


        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->