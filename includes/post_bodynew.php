<html>
<head>
<title>
</title>
<style type='text/css'>
.pager {                                                                /*Pagination*/
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
    background-color: #191971;
    text-align: center;
    color: #fff;
}

.pager a:hover {
    background-color: #A52A2A;
}

.photo-grid {                                                              /*Photo grid*/
	margin: 1em auto;
	max-width: 1106px;
	text-align: center;
}

.photo-grid li {
	border: 5px solid white;
	display: inline-block;
	margin: 1em;
	width: 289px;
}

.photo-grid img {
	display: block;
	height: auto;
	max-width: 100%;
}

.photo-grid figure {
	height: 163px;
	overflow: hidden;
	position: relative;
	width: 289px;
}

.photo-grid figcaption {
	background: rgba(0,0,0,0.8);
	color: white;
	display: table;
	height: 100%;
	left: 0;
	opacity: 0;
	position: absolute;
	right: 0;
	top: 0;
	z-index: 100;
}

.photo-grid figcaption p {
	display: table-cell;
	font-size: 1.5em;
	position: relative;
	top: -40px;
	width: 289px;
	vertical-align: middle;
}

.photo-grid li:hover figcaption {                                    /*Show text on hover*/                    
	opacity: 1;
}

.photo-grid img {                                                    /*Zoom the images*/
	display: block;
	height: auto;
	-webkit-transition: all 300ms;
	-moz-transition: all 300ms;
	transition: all 300ms;
	max-width: 100%;
}

.photo-grid li:hover img {
	-webkit-transform: scale(1.4);
	-moz-transform: scale(1.4);
	transform: scale(1.4);
}

.photo-grid figcaption p {                                           /*Drop in the text*/
	display: table-cell;
	font-size: 1.0em;
	position: relative;
	top: -40px;
	width: 289px;
	-webkit-transition: all 300ms ease-out;
	-moz-transition: all 300ms ease-out;
	transition: all 300ms ease-out;
	vertical-align: middle;
}

.photo-grid li:hover figcaption p {
	-moz-transform: translateY(40px);
	-webkit-transform: translateY(40px);
	transform: translateY(40px);
}

.photo-grid figcaption {                                                       /*Fade in the caption*/
	background: rgba(0,0,0,0.8);
	color: white;
	display: table;
	height: 100%;
	left: 0;
	opacity: 0;
	position: absolute;
	right: 0;
	top: 0;
	-webkit-transition: all 300ms;
	-moz-transition: all 300ms;
	transition: all 300ms;
	-webkit-transition-delay: 100ms;
	-moz-transition-delay: 100ms;
	transition-delay: 100ms;
	z-index: 100;
}
</style>
</head>

<div class="post_body">                                        <!-- To Show Data in body-->   
<?php
error_reporting(0); 
include("connect.php");

$page=$_GET['page'];
if($page =="" || $page =="1")
{
$page1=0;	
}
else{
	
	$page1 = ($page*5)-5;
	
}
//Selecting the data from table but with limit
$query = "SELECT * FROM posts LIMIT $page1,2";

//$query= "SELECT* FROM posts order by rand() LIMIT 0,4";
$run = mysqli_query($con,$query);

while ($row=mysqli_fetch_assoc($run)){                              
	
	$post_id = $row ['post_id'];                                        /* picking up page id of for specific page*/
	$title = $row['post_title'];
    $date = $row['post_date'];
	$author = $row['post_author'];
	$image = $row['post_image'];
	$content = substr($row['post_content'],0,200);
	
}

/* This is for counting number of pages*/

$query = "SELECT * FROM posts ";
$run = mysqli_query($con,$query);
$count = mysqli_num_rows($run);
$divide = $count/2;
$a = ceil($divide);

$prev= $page-1;
$next= $page+1;
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

<h2><a href="#">News</a></h2>
<ul class="photo-grid" style="margin-left:-150px;">
	<li>
		<a href="http://www.telegraph.co.uk/cricket/2017/03/29/joe-root-england-need-show-backbone/">
			<figure>
				<img src="joeroot3.jpg" height="180" width="320" title="England need to show more backbone">
				<figcaption><p>Joe Root: 'England need to show more backbone'</p></figcaption>
			</figure>
		</a>
	</li>
    
	<li>
		<a href="http://metro.co.uk/2017/04/01/joe-root-wants-ben-stokes-to-spy-on-australia-skipper-steve-smith-during-indian-premier-league-6548096/">
			<figure>
				<img src="joerrot4.jpg" height="180" width="320" title="Joe Root wants Ben Stokes to spy on Australia skipper Steve Smith during Indian Premier League">
				<figcaption><p>Joe Root wants Ben Stokes to spy on Australia skipper Steve Smith during Indian Premier League</p></figcaption>
			</figure>
		</a>
	</li>
	
	


<?php
if(!($page<=1)){                                                                   /* if(!page<=1)) means. show previous button,when clicked on page 2 or else.not on first page*/

echo "<center><a href='index.php?page=$prev'style='text-decoration:none;'>Prev</a>";

}
for($b=1;$b<=$a;$b++){

?><div class="pager"><a href="index.php?page=<?php  echo $b; ?>" style="text-decoration:none;"><?php echo $b;?></a></div><?php 
	

}


echo "<a href='index.php?page=$next'style='text-decoration:none;'>&nbsp;Next</a></center>";	

?>


                                                           <!-- To show all fields title,date,author  ">?php } ?> -->
</div>

