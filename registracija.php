<?php
 ob_start();
 session_start();
 include_once 'spoj.php';

 $error = false;

 if ( isset($_POST['btn-signup']) ) {
  
  $ime = trim($_POST['ime']);
  $ime = strip_tags($ime);
  $ime = htmlspecialchars($ime);
  
  $prezime = trim($_POST['prezime']);
  $prezime = strip_tags($prezime);
  $prezime = htmlspecialchars($prezime);
  
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $kor_ime = trim($_POST['kor_ime']);
  $kor_ime = strip_tags($kor_ime);
  $kor_ime = htmlspecialchars($kor_ime);
  
  $lozinka = trim($_POST['lozinka']);
  $lozinka = strip_tags($lozinka);
  $lozinka = htmlspecialchars($lozinka);
  
  // password encrypt using SHA256();
  $password = hash('sha256', $lozinka);
  
  // if there's no error, continue to signup
  if( !$error ) {
   
   $query = "INSERT INTO korisnici(ime,prezime,email,korime,lozinka) VALUES('$ime','$prezime','$email','$kor_ime','$lozinka')";
   $res = mysqli_query($conn,$query);
    
   if ($res) {
    $errTyp = "success";
    $errMSG = "Successfully registered, you may login now";
    unset($ime);
	unset($prezime);
	unset($kor_ime);
    unset($email);
    unset($lozinka);
   } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later..."; 
   } 
    
  }
  
  
 }
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/bootstrap.min.css" rel="stylesheet">
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

    input[type=text], input[type=email], input[type=password] {
    
    width: 50%;
    padding: 12px 20px;
    margin: 25px 0;
    margin-left:300px;
    box-sizing: border-box;
    background-color: lightblue;
    color: black;
    
}

    </style>
    
<body>

<div class="container">

 <div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
     <div>
        
         <div class="form-group">
             <h2 class="">Welcome to IPhotography register site!</h2>
             <h4> Enter your data below, please! </h4>
            </div>
        
         
            
            <?php
   if ( isset($errMSG) ) {
    
    ?>
    <div>
             <div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
    <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
             </div>
                <?php
   }
   ?>
            
            
             <div>
            <input type="text" name="ime" class="form-control" style="color:blue" placeholder="Name" maxlength="50" value="<?php echo $ime ?>" />
             </div>
             <div>
             <input type="text" name="prezime" class="form-control" placeholder="Surname" maxlength="50" value="<?php echo $prezime ?>" />
              </div>
              <div>            
             <input type="email" name="email" class="form-control" placeholder="e-mail" maxlength="40" value="<?php echo $email ?>" />
            </div>
             <input type="text" name="kor_ime" class="form-control" placeholder="Username" maxlength="50" value="<?php echo $kor_ime ?>" />
                <div>
             <input type="password" name="lozinka" class="form-control" placeholder="Password" maxlength="15" />
                </div>
            <div>
             <button type="submit" class="btn btn-primary" name="btn-signup">REGISTER</button> 
            </div>
            
            
            
            <div class="form-group">
                <br>
             <a href="prijava.php">Log in Here...</a>
            </div>

            <div>
                <a  type="submit" class="btn btn-primary" href="index.html">CANCEL</a>
            </div>
        
        </div>
   
    </form>
    </div> 

</div>

</body>
</html>