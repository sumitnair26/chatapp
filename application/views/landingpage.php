<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Chating App</title>	


    <!-- Bootstrap CSS -->    
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="<?php echo base_url(); ?>assets/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style-responsive.css" rel="stylesheet" />
	
	<script src="<?php  echo base_url(); ?>assets/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="section-primary">
<div class="navbar navbar-default navbar-static-top section-success">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url(); ?>"><span>CHATTING APP</span></a>
          <a href="#" class="hidden-lg hidden-md"><span><i class="fa fa-angle-down fa-fw text-inverse"></i></span></a>
        </div>
      </div>
    </div>
	<br>
    <div class="container" id="login">

      <form class="login-form" method="post">  
	   <input type="hidden" name="mode" value="login" >      
        <div class="login-wrap">
            <p style="color:#000000">Welcome To Chat Room</p>
			<span style="color:#FF0000; font-family:'Times New Roman', Times, serif; font-size:24px;" ><?php echo $this->session->error_msg; ?></span>
            <div class="input-group">
              <span class="input-group-addon">
              <input type="text" class="form-control" placeholder="Please Enter User Name" autofocus name="username" value="<?php echo $this->session->username; ?>" required>
            </div>
            
            <button class="btn btn-primary btn-lg btn-block" type="submit">JOIN CHAT</button>
           
        </div>
      </form>
    </div>
	
  </body>
</html>
