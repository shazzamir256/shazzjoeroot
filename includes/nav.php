<html>
<head>
<title>
</title>
<style type="text/css">
[data-tip] {
    position:relative;
    	}
[data-tip]:before {
    content:'';
    /* hides the tooltip when not hovered */
    display:none;
    content:'';
    display:none;
    border-left: 5px solid transparent;
    border-right: 5px solid transparent;
    border-bottom: 5px solid #1a1a1a;
    position:absolute;
    top:30px;
    left:35px;
    z-index:8;
    font-size:0;
    line-height:0;
    width:0;
    height:0;
    position:absolute;
    top:30px;
    left:100px;
    z-index:8;
    font-size:0;
    line-height:0;
    width:0;
    height:0;
    
	}
[data-tip]:after {
    display:none;
    content:attr(data-tip);
    position:absolute;
    top:35px;
    left:50px;
    padding:5px 8px;
    background:#1a1a1a;
    color:#fff;
    z-index:9;
    font-size: 0.75em;
    height:18px;
    line-height:18px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    white-space:nowrap;
    word-wrap:normal;
   	
	}
[data-tip]:hover:before,
[data-tip]:hover:after {
    display:block;
    font-size:12px;
		}
</style>
</head>
<body>
<div class="navbar">
<div id="menu">
<ul>
<li><a href="index.php">Home</a></li>
<li><a href="#">About Joe Root</a></li>
<li><a href="#">News</a></li>
<li><a href="#">Videos</a></li>
<li><a href="contact.php">Contact Us</a></li>
<li><a href="privacypolicy.php">Privacy Policy</a></li>
</ul>
</div>
<div class="searchbox" data-tip="Search this website">  
<form action="search.php" method="get">
<input type="text" size="25"  name= "search">
<input type="submit" name="submit" value="Search">
</form>
</div>

</div>
</body>
</html>