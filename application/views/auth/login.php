<!DOCTYPE html>
<html>
<head>
	<title><?= $title; ?></title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/'); ?>css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<link rel="shortcut icon" href="<?= base_url('assets/') ?>images/px.png" type="image/icon">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash_login'); ?>"></div>
    <?php if ($this->session->flashdata('flash_login')) : ?>
    <?php endif; ?>

<img class="wave" src="<?= base_url('assets/login/'); ?>img/wave.png">

	<div class="container">
		<div class="img">
			<img src="<?= base_url('assets/login/'); ?>img/bg.png">
		</div>
		<div class="login-content">
        <form method="post" action="<?= base_url('auth'); ?>">
				<img src="<?= base_url('assets/login/'); ?>img/avatar.png">
				<h2 class="title">SIMPERATAS</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" id="username" name="username" class="input" required>
                    </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" id="password" name="password" class="input" required>
                    </div>
            	</div>
            	<a href="<?= base_url('auth/forgotpassword'); ?>">Forgot Password?</a>
            	<input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/login/'); ?>js/main.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="<?= base_url(); ?>assets/sweetalert/dist/sweetalert2.all.min.js"></script>
    <script src="<?= base_url(); ?>assets/sweetalert/myscript.js"></script>
</body>
</html>

