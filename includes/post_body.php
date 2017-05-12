<div class="post_body">                                        <!-- To Show Data in body-->   
<?php



$query= "SELECT* FROM posts order by rand() LIMIT 0,4";
$run = mysqli_query($con,$query);

while ($row=mysqli_fetch_array($run)){                              
	
	$post_id = $row ['post_id'];                                        /* picking up page id of for specific page*/
	$title = $row['post_title'];
    $date = $row['post_date'];
	$author = $row['post_author'];
	$image = $row['post_image'];
	$content = substr($row['post_content'],0,200);
	
	
?>
<h2>
<a href="pages.php?id=<?php echo $post_id;?>"><?php echo $title; ?></a>                 <!-- storing id in page url -->
</h2>
<p>Published on :&nbsp;&nbsp;<b><?php echo $date;  ?></b></p>
<p align="right">Posted By :&nbsp;&nbsp;<b><?php echo $author; ?></b>
</p>
<center><img src="images/<?php echo $image; ?>" width="600" height="250"/></center>
<p align="justify">
<?php echo $content; ?>
</p>
<p align="right"><a href="pages.php?id=<?php echo $post_id;?>">Read More</a></p>    <!-- storing id in page url -->
<?php  } ?>                                                              <!-- To show all fields title,date,author  ">?php } ?> -->
</div>

