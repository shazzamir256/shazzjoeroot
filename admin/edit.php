 
<html>
<body>

<?php


include("index.php");                            /* It will show the same page (index.php of admin panel when click on edit so that our page style remains same*/            
include("includes/connect.php");                 /* connection*/

$edit_id = @$_GET['edit'];                        /* creating variable $edit_id.storing "edit" that is coming from line 62 in index.php in $edit_id ."@" is used to ignore error*/

 $query = "SELECT * FROM posts where post_id ='$edit_id'";                /* id is 1 record from database.$edit_id is upcoming id(specific record to select)*/
  $run  = mysqli_query($con,$query);
  while($row =mysqli_fetch_array($run)){                              /* fetching all data from database through while loop*/
	  
	$edit_id1 =  $row['post_id'];
    $title   =  $row['post_title']; 
	$date    =  $row['post_date'];
	$author  =  $row['post_author'];
	$image   =  $row['post_image'];
	$content =  $row['post_content'];
  
 ?>
 
<form method="post" action="edit.php?edit_form=<?php echo $edit_id1;?>" enctype="multipart/form-data">            <!-- $edit_id1 used for update-->
<table align="center" border="10" width="600" bordercolor="white">
<tr>
<td align="center" colspan="5" bgcolor="blue">
<h1>Editing Post</h1></td>
</tr>

<tr>
<td align="right"><h1>Post Title</h1></td>
<td><input type="text" name="title" size="40"  value="<?php echo $title; ?>"></td>     <!-- Displaying data in value Fields,so when we click them data would be displayed in form -->

</tr>

<tr>
<td align="right"><h1>Post Author</h1></td>
<td><input type="text" name="author" value="<?php echo $author; ?>"></td>

</tr> 

<tr>
<td align="right"><h1>Post Image</h1></td>
<td><input type="file" name="image">
<img src="../images/<?php echo $image; ?>" width="60" height="60"/></td>
</tr>
<tr>
<td align="right"><h1>Post Content</h1></td>
<td><textarea name="content" cols="40" rows="20">
<?php echo $content; ?></textarea></td>

</tr>
<tr>

<td align="center" colspan="5"><input type="submit" name="update" value="Update Now"></td>        <!-- now when data is displayed in form submit button would change it into update-->

</tr>
  <?php } ?>
</table>


</form>
</body>
</html>

<?php                                                                /* Update*/
  
  
  if(isset($_POST['update'])){
	
	$update_id = $_GET['edit_form'];                            /* creating variable update_id* edit_form is used above.we just want to update a specific id not all id.means we want to update only specifcic record not all records*/
	
	$post_title= $_POST['title'];
    $post_date= date('y-m-d');
	$post_author= $_POST['author'];
	$post_content= $_POST['content'];
	$post_image= $_FILES['image']['name'];
	$post_image_type= $_FILES['image']['type'];
	$post_image_size= $_FILES['image']['size'];
	$image_tmp =  $_FILES['image']['tmp_name'];
	 
	 move_uploaded_file($image_tmp,"../images/$post_image");
	 
	 $update_query= "UPDATE posts SET post_title='$post_title',post_date='$post_date',post_author='$post_author',post_image='$post_image',post_content='$post_content'
	                 WHERE post_id=$update_id";              /*update only that "id" means post where post_id = update_id .which we choose to update.do not update all posts.only update that post where post id is update id*/
				                                             /* data would be updated by this "WHERE post_id=$update_id";"*/
				$result=mysqli_query($con,$update_query);
				if(mysqli_affected_rows($con)==1){
					
					
				    echo "<script>window.open('view.php?updated=Post Has been updated','_self')</script>";          /* redirect post to view.php*/
				}
	              
	 
	}                                                               


?>