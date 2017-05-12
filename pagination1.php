<html>
<head>
<title>
</title>
</head>
<body>
<?php
/*error_reporting(0);                        */                                    // Turn off all error reporting
include("includes/connect.php");

$query = "SELECT * FROM posts";                                       /* Show 2 records on single page*/
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


?>
</body>
</html>
