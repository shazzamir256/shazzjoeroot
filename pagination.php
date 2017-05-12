<html>
<head>
<title>Pagination</title>
<link rel="stylesheet" href="style.css">
<style type='text/css'>
.pager {
    font-family: Arial;
    font-size: 14px;
    display:inline;
	padding: 3px;
	margin: 3px;
	}

	.pager a {
    font-family: Arial;
    font-size: 14px;
    text-decoration: none;
    width: 17px;
    height: 17px;
    border: 1px solid #000;
    background-color: #0C74BA;
    text-align: center;
    color: #fff;
}

.pager a:hover {
    background-color: #c0c0c0;
}
</style>
</head>
<body>

<?php
//error_reporting(0);                                                            // Turn off all error reporting
include("includes/connect.php");

$page=$_GET['page'];
if($page =="" || $page =="1")
{
$page1=0;	
}
else{
	
	$page1 = ($page*5)-5;
	
}

$query = "SELECT * FROM posts limit $page1,2";                                       /* Show 2 records on single page*/
$run = mysqli_query($con,$query);
while ($row=mysqli_fetch_array($run)){
	
	echo $row["post_id"]."<br>";
	echo $row["post_title"]."<br>";
	echo $row["post_date"]."<br>";
	echo $row["post_author"]."<br>";
	echo $row["post_image"]."<br>";
	echo $row["post_content"]."<br>";
	
	echo "<br>"; 

	
}

/* This is for counting number of pages*/

$query = "SELECT * FROM posts ";
$run = mysqli_query($con,$query);
$count = mysqli_num_rows($run);
$divide = $count/2;
$a = ceil($divide);
$prev= $page-1;
$next= $page+1;

if(!($page<=1)){                                                                   /* if(!page<=1)) means. show previous button,when clicked on page 2 or else.not on first page*/

echo "<a href='pagination.php?page=$prev'style='text-decoration:none;'>Prev</a> ";

}
for($b=1;$b<=$a;$b++){

?><div class="pager"><a href="pagination.php?page=<?php  echo $b; ?>" style="text-decoration:none;"><?php echo $b;?></a></div><?php 
	

}


echo "<a href='pagination.php?page=$next'style='text-decoration:none;'>&nbsp;Next</a> ";	

?>



</body>
</html>