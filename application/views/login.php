<!DOCTYPE html>
<html>
<head>
	<title>Viva Laundry</title>
	<link href='<?php echo base_url(); ?>assets/img/laundry.png' rel='icon' type='image/x-icon'/>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>plugins/bootstrap/css/bootstrap.min.css">
	<script src="<?php echo base_url(); ?>plugins/jquery/jquery.js"></script>
	<script src="<?php echo base_url(); ?>plugins/bootstrap/js/bootstrap.min.js"></script>
	<!-- Custom -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
</head>
<body class="hold-transition login-page">
	
	<div class="panel panel-default" style='width:350px;position:absolute;left:0;right:0;top:20%;margin:0 auto;'>
			<div class="panel-heading">                                
				<div class="row-fluid user-row">
					<img src='<?php echo base_url(); ?>assets/img/laundry.png' class="img-responsive" alt="Images" style='width:100px;margin:0 auto;'>
					<h3 class='text-center' style='margin:0;'>Viva Laundry</h3>	
				</div>
			</div>
			<div class="panel-body">
				<div class="alert alert-danger <?php if(!isset($_GET['login'])) echo 'hide';?>">
            <strong>Error!</strong> Invalid user/password!
        </div>
        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
        <form method="post" id="form_login" action="<?= base_url('login'); ?>">
					<div class="form-group notif"></div>
					<div class="form-group">
						<div class="input-group">  
							<span class="input-group-addon glyphicon glyphicon-user"></span>			
							<input type="text" name="user" placeholder="Username" class="form-control input-lg">
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">  
							<span class="input-group-addon glyphicon glyphicon-lock"></span>		
							<input type="password" name="pass" placeholder="Password" class="form-control input-lg">	
						</div>
					</div>	
					<button type="submit" name="login" class="btn btn-lg btn-success btn-block" id="tombol">
						Masuk »
					</button>
				</form>
			</div>
		</div>

		<script>
      $("#form_login").on('submit', function(e){
        e.preventDefault();
        if($("#user").val()==""){
          $("#user").focus();
        }else if($("#pass").val()==""){
          $("#pass").focus();
        }else{
          $.ajax({
            url: <?php echo base_url('login'); ?>
          });
        }
    });
    </script>

</body>
</html>
