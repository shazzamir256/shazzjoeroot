<?php
 include("includes/connect.php");
  
  
 $delete_id    = $_GET['del'];                        /* storing 'del' in $delete_id .del is coming from edit.php page.its taking specific id from that page and storing it in $delete.specific id means that id which we want to delete that is one record.not delete all records.if we dont take a specific id then it would delete all records.$GET is an array.$delete is local variable. */
 $delete_query = "DELETE FROM posts WHERE post_id = '$delete_id'";         /* delete_id is upcoming id ,posts is the table we created in database*/
       if (mysqli_query($con,$delete_query)){
		   
		   echo "<script>window.open('index.php?deleted=A post Has Been Deleted..','_self')</script>";         /* it will go on index.php*/
		   
	   }


 ?>
 
