

<?


$website=$_POST['url'];
$message=$_POST['message'];


    $body .= "Message: " . $message . "\n"; 

    
    mail("ipicturology@gmail.com","IPhotography",$body); 

  
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script>alert("Thank you for your message, it has been sent successfully. I will answer as soon as possible.");</script>
<meta HTTP-EQUIV="REFRESH" content="0; url=index.html"> 

</head>