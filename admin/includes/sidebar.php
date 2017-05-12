
<!-- Email Subscription Form-->
<div id="sidebar">
<h2>Subscribe Via Email</h2>
<form style="padding:3px;text-align:center" action=                 
"http://feedburner.google.com/fb/a/mailverify" method ="post" target="popupwindow" 
onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=OnlineComputerTeacherKarachi',
 'popupwindow','scrollbars="yes",width="550",height="520"') ; return true"><p>Enter Your Email Address:
 </p><p><input type="text" style="width:140px" name="email"/></p><input type="hidden" value="OnlineComputerTeacherKarachi" 
 name="uri"/><input type="hidden" name="loc" value="en_US"/><input type="submit" value="Subscribe" /></form>

 <!-- Social Buttons-->
<div class="social">
<h2 align="center">Follow Us</h2>
<a href="https://web.facebook.com/shazz.amir.3" target="blank"><img src="images/facebook.png"></a>
<a href="https://www.pinterest.com/shazzamir/" target="blank"><img src="images/pinterest.png"></a>
<a href="https://twitter.com/shazzamir" target="blank"><img src="images/twitter.png"></a>

</div>

<h2>Recent Posts</h2>              <!-- Show Recent Posts on sidebar-->
<?php
include("includes/connect.php");
$query = "SELECT * FROM posts order by 1 DESC LIMIT 0,5";
$run = mysqli_query($con,$query);
while($row=mysqli_fetch_array($run)){
    $post_id = $row['post_id'];                           /* $post_id is fetched to use below to go back to orginal posts in link*/
	$title   = $row['post_title'];                        /* $title and $image are fetched from database to show them in sidebar */
    $image   = $row['post_image'];
	mysqli_close($con);
?>

<center>                                  <!-- echo $post_id is used on image and title in link to go back to original page when clicked-->
<a href="pages.php?id=<?php echo $post_id;?>"><img src="images/<?php echo $image; ?>" width="150" height="150"/></a>
<a href="pages.php?id=<?php echo $post_id;?>"><h3><?php echo $title; ?></h3></a></center>


<?php } ?>
</div>