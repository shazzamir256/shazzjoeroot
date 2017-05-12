<!DOCTYPE html><html>
<head>
<title>PHP Pagination</title>
</head>

<body>
<?php

error_reporting(0);
// Establish Connection to the Database
include("includes/connect.php");

//Records per page
$per_page = 5;

if (isset($_GET["page"])) {
$page = $_GET["page"];
}
else {
$page = 1;
}

// Page will start from 0 and Multiple by Per Page
$start_from = ($page-1) * $per_page;

//Selecting the data from table but with limit
$query = "SELECT * FROM posts LIMIT $start_from, $per_page";
$result = mysqli_query ($con, $query);


while ($row = mysqli_fetch_assoc($result)) {
echo $row["post_id"]."<br>";
	echo $row["post_title"]."<br>";
	echo $row["post_date"]."<br>";
	echo $row["post_author"]."<br>";
	echo $row["post_image"]."<br>";
	echo $row["post_content"]."<br>";
	
	echo "<br>";
};


//Now select all from table
$query = "select * from posts";
$result = mysqli_query($con, $query);

// Count the total records
$total_records = mysqli_num_rows($result);

//Using ceil function to divide the total records on per page
$total_pages = ceil($total_records / $per_page);

//Going to first page
if($_GET['page'] != 1) {
echo "<center><a href='index.php?page=1'>".'First Page'."</a>";
} else echo "<center>";

echo "<a href='index.php?page=" . ($_GET['page']+1) . "'>Next Page</a>";

for ($i=1; $i<=$total_pages; $i++) {

echo "<a href='index.php?page=".$i."'>".$i."</a> ";
};

echo "<a href='index.php?page=" . ($_GET['page']-1) . "'>Previous Page</a>";

// Going to last page
if($_GET['page'] != $total_pages) {
echo "<a href='index.php?page=$total_pages'>".'Last Page'."</a></center> ";
} else echo "</center>";
?>



</body>
</html>