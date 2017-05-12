<html>
<head>
<title>
Joe Root
</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<!-- This is Top Bar-->
<div id="top"><p>Top Bar</p>
</div>                                                       <!-- sketchy bar for clock and date-->
<!-- This is Header Area-->
<div><?php include("includes/header.php");?></div>
<!-- This is Navigation Area-->

<div><?php include("includes/nav.php");?></div>

<!-- This is Side Bar Area-->

<div><?php include("includes/sidebar.php");?></div>
<!-- This is Post Content Area-->
<div class="post_body">
<?php  
include("includes/connect.php");
$page_id =isset($_GET['id']) ? $_GET['id'] : '';
//$page_id = $_GET['id'];
$query = "SELECT * FROM posts where post_id='$page_id'";
$run = mysqli_query($con,$query);

while ($row=mysqli_fetch_array($run)){                              
	
	
	$title = $row['post_title'];
    $date = $row['post_date'];
	$author = $row['post_author'];
	$image = $row['post_image'];
	$content = $row['post_content'];
	
 
?>
<h2>

<?php echo $title; ?>
               
</h2>
<p>Published on :&nbsp;&nbsp;<b><?php echo $date;  ?></b></p>
<p align="right">Posted By :&nbsp;&nbsp;<b><?php echo $author; ?></b>
</p>
<center><img src="images/<?php echo $image; ?>" width="600"/></center>
<p align="justify">
<?php echo $content;?>
</p>

<?php } ?>
</div>

<!-- This is Footer Area-->
<div class="footer">This is footer</div>



</body>
</html>