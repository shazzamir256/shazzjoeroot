<?php
include("includes/connect.php");


session_start();

if(!isset($_SESSION['user_name'])){         /* if user hasnt logged in .show login.php  if logged in execute the else statement and show rest of page that is index.php of admin panel*/
	
	header("location:login.php");
	
}
    else 
	{
		
?>

<html>
<head>
<title>
Admin Panel
</title>
<link rel="stylesheet" style="text/css" href="admin_style.css">
</head>
<body>
<header>

<h1><a href="index.php">Welcome to Admin Panel of Joeroot.com</h1></a> <!-- index.php here will show page without view content-->
                                                                       <!-- To show view content on same page i stored index.php url in view,if i didnt do that the normal method would view posts page on click on another page-->
</header>
<aside>
<h2>Welcome: <font color="white" size="5"><?php echo $_SESSION['user_name']; ?></font></h2>       <!-- shows name of user logged in -->

<h2>Manage Content</h2>
<h2><a href="logout.php">Admin Log Out</a></h2> 
<h2><a href="index.php?view=view">View Posts</a></h2>        <!-- storing index.php url into view--><!--this index.php would show all data including view content, it will go on index.php..but show data on php tag of view downpage-->
<h2><a href="index.php?insert=insert">Insert New Posts</a></h2>  <!-- Go to index.php of admin panel but show query performed on insert that is used in isset-->
</aside>
<center><h1 style="color:white">This is Your Admin Panel</h1>
<p style="color:white">You can manage all your websites's content here</p>
<h1><?php echo @$_GET['deleted']; ?></h1></center>         <!-- it will show message given on delete.php page on this page.when button  delete is presses-->

<?php
 if(isset($_GET['insert'])){                               /* when insert new post button is clicked ,show query performed on insert  on line 17*/
	 
 include("insert_post.php");

 }


?>


<?php if(isset($_GET['view'])){  ?>        <!-- To remove extra content from page when clicked on welcome to admin panel isset is used bracket start if $_GET['view' is active then show all page otherwise dont show page-->
<table width="900" align="center" border="3" bordercolor="white">
<tr>
<td align="center" colspan="9" bgcolor="blue"><h1 style="color:white">View All Posts</h1></td>
</tr> 
<tr style="background-color:blue">
<th style="color:white">Post no</th>
<th style="color:white">Post Title</th>
<th style="color:white">Post Date</th>
<th style="color:white">Post Author</th>
<th style="color:white">Post Image</th>
<th style="color:white">Post Content</th>
<th style="color:white">Edit</th>
<th style="color:white">Delete</th> 
</tr> 
<?php
include("includes/connect.php");
                                                           
if(isset($_GET['view'])) {                                       /* now when view is clicked it will show all data in while loop from database*/
 $query = "SELECT * FROM posts order by 1 DESC";
  $run = mysqli_query($con,$query);                               
 while($row=mysqli_fetch_array($run)){
	$i=1;                                                       /* To show post no in ascending order in admin panel $i=1*/
	$id      =  $row['post_id'];
    $title   =  $row['post_title']; 
	$date    =  $row['post_date'];
	$author  =  $row['post_author'];
	$image   =  $row['post_image'];
	$content =  substr($row['post_content'],0,50);
	
 
?>

<tr align="center">
<td><?php echo $i++; ?></td>                                    <!-- To show post no in ascending order in admin panel $i=++-->
<td><?php echo $title;?></td>
<td><?php echo $date;?> </td>
<td><?php echo $author;?> </td>
<td><img src="../images/<?php echo $image; ?>" width="50" height="50"/></td>
<td><?php echo $content;?></td>
<td><a href="edit.php?edit=<?php echo  $id; ?>"><p style="color:white">Edit</p></a></td>  <!-- take specific id from database to edit and redirecting it to edit.php-->
<td><a href="delete.php?del=<?php echo $id; ?>"><p style="color:white">Delete</p></a></td>
</tr>
<?php }}} ?>                                                    <!-- To remove extra content from page bracket closed-->
</table>
                                                           <!-- End of while loop.the data shown while view is clicked-->
</body>
</html>

	<?php } ?>  