<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head> 
	<meta charset="utf-8"> 
	
	<link href="css/lightbox.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet"> 
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet"> 
	
	
</head>
<style>
    body{
        text-align:center;
        font-family:Verdana;
        color:lightblue;
        background:black;       
    }

    h4 {
        margin-bottom:60px;
    }
  
}
    
 



    </style>
<body>
<h1> Welcome <?php if(isset($_SESSION['user'])){
    echo  "{$_SESSION['user']}";
} ?> </h1>
<div class="col-sm-12"> 
											<div id="contact-form-section">
												<div class="status alert alert-success" style="display: none"></div>
												<form id="contact-form" class="contact" name="contact-form" method="post" action="send-mail.php">
													<div class="form-group">														
														<div class="form-group">
															<textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Message"></textarea>
														</div> 
														<div class="form-group">
															<button type="submit" class="btn btn-primary"  href="index.html">Send</button>
														</div>
													</form> 
												</div>
											</div>

</body>
</html>