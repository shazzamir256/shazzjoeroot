<html>
<head>
<title>
Joe Root
</title>
<link rel="stylesheet" href="style.css">
<script>
function myclock(){
time = new Date();	
hours = time.getHours();
mins = time.getMinutes(); 
sec  = time.getSeconds();

if (sec<10) {
	sec = "0" + sec;
	
}

if (mins<10) {
	mins = "0" + sec;
	
}	
document.getElementById("clock").innerHTML=hours+":"+mins+":"+sec;
timer = setTimeout(function(){ myclock()},500);
}
</script>

</head>
<body onload="myclock()">
<!-- This is Top Bar--> 
<div id="top"><p id="clock" class="clock"></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Today is : <?php echo date("jS, F Y ")?></p>  <!-- Date Function-->
</div>                                                       <!-- sketchy bar for clock and date-->
<!-- This is Header Area-->
<div><?php include("includes/header.php");?></div>
<!-- This is Navigation Area-->

<div><?php include("includes/nav.php");?></div>

<!-- This is Side Bar Area-->

<div><?php include("includes/sidebar.php");?></div>
<!-- This is Post Content Area-->
<div class="post_body">
<form action="contact.php" method="post">
<table width="600" align="center" border="0">
<tr>
<td align="center" colspan="5"><h2>Contact Us</h2></td>
<tr>

<tr>
<td align="right"><b>Your Email:</b></td>
<td><input type="text" name="email" placeholder="required,but never shown"></td>
</tr>

<tr>
<td align="right"><b>Subject:</b></td>
<td><input type="text" name="subject" placeholder="your Subject"></td>
</tr>

<tr>
<td align="right"><b>Your Message:</b></td>
<td><textarea cols="22" rows="10" name="message" placeholder="write Your Message"></textarea></td>
</tr>

<tr>
<td align="center" colspan="8"><input type="submit" name="send_email" value="Send Email"></td>
</tr>
</table>
</form>
</div>
<?php
if(isset($_POST['send_email'])){                          /* Backend data of email form but it will work only when website goes online server*/

 $sender_email = $_POST['email'];	
 $subject      = $_POST['subject'];	
 $mes          = $_POST['message'];	
 $to           = "shazzamir256@gmail.com";                /* you will receive email on this address*/
	
 $message = "Email From:<br>".$mes;                       /* show a person's message*/
  
  if($sender_email=='' or $subject=='' or $mes=='') {
   echo "<script>alert('Please Fill the Blank Field')</script>"; 
   exit(); 
	  
  }
 // create email headers
$headers = 'From: '.$sender_email."\r\n".
'Reply-To: '.$sender_email."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($to, $subject, $mes, $headers);                             /* person's email coming to us*/

 
 // To send HTML mail, the Content-type header must be set
//$headers[] = 'MIME-Version: 1.0';
//$headers[] = 'From:shazz <shazzamir256@gmail.com>' . "\r\n";
//$headers[] = 'Content-type: text/html; charset=iso-8859-1';



	//mail($to, $subject, $message, $headers);

 //mail($to,$subject,$message,$sender_email);	          /* person's email coming to us*/
  
  // $to_sender = $_POST['email'];                             /* For autoresponse, sending email to sender*/
  // $sub    = "joeroot.net<br>";
  //$mesg   = "Thank you for sending an email, we will get to you soon<br>";
  //$headers = 'From:shazz <shazzamir256@gmail.com>' . "\r\n";
  //$from   = "shazzamir256@gmail.com";
  
  //mail($to_sender,$sub,$mesg,$headers);
  echo "<center><h2>Email Sent, get to you soon!</h2></center>";
  }



?>
<!-- This is Footer Area-->
<div class="footer">This is footer</div>



</body>
</html>