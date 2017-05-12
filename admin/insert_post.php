<?php
include("includes/connect.php");


@session_start();                                     /* @ is used for ignoring error on page*/

if(!isset($_SESSION['user_name'])){         /* if user hasnt logged in .show login.php  if logged in execute the else statement and show rest of page that is index.php of admin panel*/
	
	header("location:login.php");
	
}
    else 
	{
		
?>




<html>
<head>
<title>
Insert New Posts
</title>
</head>
<body>
<form method="post" enctype="multipart/form-data" action="insert_post.php">    <!-- enctype is used to upload images-->
<table align="center" border="10" width="600" bordercolor="white">
<tr>
<td align="center" colspan="5" bgcolor="blue">
<h1>Insert New Post Here</h1></td>
</tr>

<tr>
<td align="right"><h1>Post Title</h1></td>
<td><input type="text" name="title" size="40"></td>

</tr>

<tr>
<td align="right"><h1>Post Author</h1></td>
<td><input type="text" name="author"></td>

</tr> 

<tr>
<td align="right"><h1>Post Image</h1></td>
<td><input type="file" name="image"></td>

</tr>
<tr>
<td align="right"><h1>Post Content</h1></td>
<td><textarea name="content" cols="40" rows="20"></textarea></td>

</tr>
<tr>

<td align="center" colspan="5"><input type="submit" name="submit" value="Publish Now"></td>

</tr>

</table>


</form>

</body>
</html>

<?php
include("includes/connect.php");
if(isset($_POST['submit'])){
    $title = $_POST['title'];
	$date  = date('y-m-d');
	$author = $_POST['author'];
	$content = $_POST['content'];
	$image_name = $_FILES['image']['name'];
    $image_type = $_FILES['image']['type'];
	$image_size = $_FILES['image']['size'];
	$image_tmp  = $_FILES['image']['tmp_name'];                             /* tmp is temporary name saved in server*/                  
  
    $query= "INSERT INTO posts (post_title,post_date,post_author,post_image,post_content) VALUES ('$title','$date','$author','$image_name','$content')";
	 // echo "aaa ".$query." ";
   
   
   if($title == ''  or $author==''  or $content=''){                      /*  '' means nothing,if nothing is entered.display message*/
	echo "<script>alert('Any Field is Empty')</script>";
	exit();
	
	}
	
	if($image_type=="image/jpeg" or $image_type=="image/png" or $image_type=="image/gif"){
		
		if($image_size<=50000){
			
			move_uploaded_file($image_tmp,"images/$image_name");
		}
	else {
	echo "<script>alert('Image is larger,only 50kb size is allowed')</script>";
    }
	
	}
	else {
	echo "<script>alert('Image type is invalid')</script>";
	}
	
	 	   
	   if(mysqli_query($con,$query))
	   {
        echo "<script>window.open('index.php?published=Post Has Been Published','_self')</script>";
    
	   }
    else{
        echo 'Data Not Inserted';
    }
    
    
    mysqli_close($con);                                                           /* very important to close the connection ,otherwise it would mix with bottom code*/
}
	
	?>
	
	<?php  }  ?>