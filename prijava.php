<?php
 ob_start();
 session_start();
 require_once 'spoj.php';
 
 // it will never let you open index(login) page if session is set

 
 $error = false;
 
 if( isset($_POST['btn-login']) ) { 
  
  // prevent sql injections/ clear user invalid inputs
  $kor_ime = trim($_POST['kor_ime']);
  $kor_ime = strip_tags($kor_ime);
  $kor_ime = htmlspecialchars($kor_ime);
  
  $lozinka = trim($_POST['lozinka']);
  $lozinka = strip_tags($lozinka);
  $lozinka = htmlspecialchars($lozinka);
  // prevent sql injections / clear user invalid inputs
  // if there's no error, continue to login
  if (!$error) {
   
   $password = hash('sha256', $lozinka); // password hashing using SHA256
  
   $res=mysqli_query($conn, "SELECT ID, kor_ime, lozinka FROM users WHERE lozinka='$lozinka'");
   $row=mysqli_fetch_array($res);
   $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
   
   if( $count == 1 && $row['lozinka']==$lozinka ) {
    $_SESSION['user'] = $row['ID'];
    header("Location: index.html");
   } else {
    $errMSG = "Incorrect credentials, please try again...";
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

    input[type=text], input[type=password] {
    
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
    
     <div class="col-md-12">
        
         <div class="form-group">
             <h2 class="">Login to your account</h2>
            </div>
        
         <div class="form-group">
             <hr />
            </div>
            
            <?php
   if ( isset($errMSG) ) {
    
    ?>
    <div class="form-group">
             <div class="alert alert-danger">
    <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
             </div>
                <?php
   }
   ?>
            
            <div>
             <input type="text" name="kor_ime" class="form-control" placeholder="Your username" value="<?php echo $kor_ime; ?>" maxlength="30" />
                </div>
                    
            <div>
               <input type="password" name="lozinka" class="form-control" placeholder="Your Password" maxlength="15" />
                </div>
            
          
            
            <div class="form-group">
             <button type="submit" class="btn btn-primary" name="btn-login">Log In</button>
            </div>
            
            
            <div class="form-group">
             <a href="registracija.php">Register Here...</a>
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
<?php ob_end_flush(); ?>