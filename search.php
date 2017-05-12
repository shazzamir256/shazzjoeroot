<html>
<head>
<title>
Joe Root
</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<!-- This is Top Bar-->
<div id="top">
<p>Today is : &nbsp;&nbsp;<?php echo date("jS, F Y ")?></p>
</div>                                                       <!-- sketchy bar for clock and date-->
<!-- This is Header Area-->
<div><?php include("includes/header.php");?></div>
<!-- This is Navigation Area-->

<div><?php include("includes/nav.php");?></div>

<!-- This is Side Bar Area-->

<div><?php include("includes/sidebar.php");?></div>
<!-- This is Post Content Area-->
<div class="post_body>
<?php
include("includes/connect.php");

     if(isset($_GET['submit'])){
	 $search_id = $_GET['search'];
	 $query = "SELECT * FROM posts where post_title like '%$search_id%'";
	 $run= mysqli_query($con,$query);

	 while (row==mysqli_fetch_array($run)){
		 
	 $post_id = $row['post_id'];
	 $post_title = $row['post_title'];
	 $post_image= $row['post_image'];
	 $post_content = substr($row['post_content'],0,100);
	
	 
	 
	 mysqli_close($con);
	 
	 }

?>
<h2>
<a href="pages.php?id=<?php echo $post_id;?>"><?php echo $title; ?></a>                 <!-- storing id in page url -->
</h2>

<center><img src="images/<?php echo $image; ?>" width="100" height="100"/></center>
<p align="justify">
<?php echo $post_content; ?>
</p>
<p align="right"><a href="pages.php?id=<?php echo $post_id;?>">Read More</a></p>    <!-- storing id in page url -->
<?php  } ?>   
</div>

<!-- This is Footer Area-->
<div class="footer">This is footer</div>



</body>
</html>