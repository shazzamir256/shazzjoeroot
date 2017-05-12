<!DOCTYPE HTML>                                                                       <!-- necessary for html 5 to suport bootstrap-->
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

<div><?php include("includes/post_bodynew.php");?></div>


<!-- This is Footer Area-->
<div class="footer">

<h1 style="color:white; padding-top:30px; text-align:center;">&copy; 2017 - By www.joeroot.net</h1>

</div>



</body>
</html>