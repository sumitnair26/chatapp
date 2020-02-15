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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
	<script>


function getallmsg(id)
	{
	var id;
	//alert(id);
	//#mailcontent.show();
	
	var dataString = 'id='+ id ;
	
	$.ajax({
	url: "<?php echo base_url(); ?>chat/getallmsg",
   	data: dataString,
	type: "GET",
	dataType: "HTML",
	success:  function(data){
            //console.log(data);
			 //$('#outbox_subject').html(data[0]['outbox_subject']);
			 
			 $('#showmsg').html(data);
			// alert(data);
           // $('#mailcontent').show(); //showresume
			
	}
	});   
	}
 function sendmsg(id)
   {
   var newmsg = $("#newmsg").val();
   //alert(newmsg);
   var id ;
   var dataString = 'id='+ id + '&newmsg='+ newmsg ;
   //alert(dataString);
   
   $.ajax({
	type: "POST",
	url: "<?php echo base_url(); ?>chat/insertnewchat",
	data: dataString,
	cache: false,
	success: function(result){
	$('#newmsg').val("");
	getallmsg(id);
	//reload_table();
	//location.reload();
	}
	});
	return false; 
   }
</script>
</head>

  <body class="">
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
    <div class="container" >
     
	 <div class="row">
	 
	
    <div class="col-sm-4" style="background-color:lavender;">
	
	
	 
                          
                          <div class="user-name">
                              <h2>
							  
				      	Hi , <?php
//echo $this->session->userid; 
	   echo $this->session->username; ?> </h2>
                          </div>
						  
	          <ul class="nav nav-pills nav-stacked labels-info ">
                          <li> <h3>Buddy online</h3> </li>
						  <?php foreach($mychatroom as $friends) { ?>
                          <li> <a onClick="getallmsg(<?php echo $friends['relation_id']; ?>)"> <i class=" fa fa-circle text-success"></i><?php echo $friends['relation_id']; ?> <p>I do not think</p></a>  </li>
                         <?php } ?>
                          </li>
           </ul>
	         
			 <ul class="nav nav-pills nav-stacked labels-info ">
                          <li> <h3>Chat With New Buddy</h3> </li>
						  <?php foreach($allusers as $users) { ?>
                          <li> <a onClick="getallmsg(<?php echo $users['user_id']; ?>)"> <i class=" fa fa-circle text-danger"></i><?php echo $users['username']; ?> <p>I do not think</p></a>  </li>
                         <?php } ?>
                          </li>
           </ul>
	       
	
	</div>
    <div class="col-sm-8"  style="background-color:lavenderblush;">
	
	<div id="showmsg">
	
	</div> 
	
	
	</div>
  </div>
	 
      
    </div>
	
  </body>
</html>
