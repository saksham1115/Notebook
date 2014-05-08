<?php 
session_start();
if(!isset($_SESSION['name']))
    header("location:index.php");
$newsql = new mysqli("localhost","root","ishallcallhimsebastian","notebook");
$cid = $_GET['cid'];
$res = $newsql->query("select course from courses where cid=$cid")->fetch_assoc();
$name = $res['course'];
?>
<head>
<title><?php echo $name; ?></title>
<style>
<link href='http://fonts.googleapis.com/css?family=Hanalei' rel='stylesheet' type='text/css'>
html, body, address, blockquote, div, dl, form, h1, h2, h3, h4, h5, h6, ol, p, pre, table, ul, dd, dt, li, tbody, td, tfoot, th, thead, tr, button, del, ins, map, object, a, abbr, acronym, b, bdo, big, br, cite, code, dfn, em, i, img, kbd, q, samp, small, span, strong, sub, sup, tt, var, legend, fieldset {
	margin: 0;
	padding: 0;
}

img, fieldset {
	border: 0;
}


img {
	max-width: 100%;
	height: auto;
	width: auto\9; 
}

article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section { 
    display: block;
}

body {
	background: #0d1424 url(./images/home_bg.jpg) repeat center top;
	font: .81em/150% Arial, Helvetica, sans-serif;
	color: #666;
}
a {
	font-family: 'Hanalei', cursive;
	color: #026acb;
	text-decoration: none;
	outline: none;
}
a:hover {
	text-decoration: underline;
}

/* list */
ul, ol {
	font-family: 'Hanalei', cursive;
	margin: 1em 0 1.4em 24px;
	padding: 0;
	line-height: 140%;
}
li {
	font-family: 'Hanalei', cursive;
	margin: 0 0 .5em 0;
	padding: 0;
}

/* headings */
h1, h2, h3, h4, h5, h6 {
	line-height: 1.4em;
	margin: 20px 0 .4em;
	color: #000;
}
h1 {
	font-family: 'Hanalei', cursive;
	font-size: 2em;
}
h2 {
	font-size: 1.6em;
}
h3 {
	font-size: 1.4em;
}
h4 {
	font-size: 1.2em;
}
h5 {
	font-size: 1.1em;
}
h6 {
	font-size: 1em;
}

/* reset webkit search input styles */
input[type=search] {
	-webkit-appearance: none;
	outline: none;
}
input[type="search"]::-webkit-search-decoration, 
input[type="search"]::-webkit-search-cancel-button {
	display: none;
}

/************************************************************************************
STRUCTURE
*************************************************************************************/
#pagewrap {
	width: 980px;
	margin: 0 auto;
}

/************************************************************************************
HEADER

*************************************************************************************/
#header {
	position: relative;
	height: 160px;
}

/* site logo */
#site-logo {
	position: relative;
	top: 35px;
width: 300px;
height: 70px;
}
#site-logo a {
	font: bold 30px/100% Arial, Helvetica, sans-serif;
	color: #fff;
	text-decoration: none;
}

/* site description */
#site-description {
	font: italic 100%/130% "Times New Roman", Times, serif;
	color: #fff;
	position: absolute;
	top: 55px;
}

/* searchform */
#searchform {
	position:absolute;
	right: 10px;
	bottom: 6px;
	z-index: 100;
	width: 160px;
}
#searchform #s {
	width: 140px;
	float: right;
	background: #fff;
	border: none;
	padding: 6px 10px;
	/* border radius */
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	/* box shadow */
	-webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,.2);
	-moz-box-shadow: inset 0 1px 2px rgba(0,0,0,.2);
	box-shadow: inset 0 1px 2px rgba(0,0,0,.2);
	/* transition */
	-webkit-transition: width .7s;
	-moz-transition: width .7s;
	transition: width .7s;
}

/************************************************************************************
MAIN NAVIGATION
*************************************************************************************/
#main-nav {
	width: 100%;

	background: #ccc;
	margin: 0;
	padding: 0;
	position: absolute;
	left: 0;
	bottom: 0;
	z-index: 100;
	/* gradient */
	background: #6a6a6a url(images/nav-bar-bg.png) repeat-x;
	background: -webkit-gradient(linear, left top, left bottom, from(#b9b9b9), to(#6a6a6a));
	background: -moz-linear-gradient(top,  #b9b9b9,  #6a6a6a);
	background: linear-gradient(-90deg, #b9b9b9, #6a6a6a);
	/* rounded corner */
	-webkit-border-radius: 8px;
	-moz-border-radius: 8px;
	border-radius: 8px;
	/* box shadow */
	-webkit-box-shadow: inset 0 1px 0 rgba(255,255,255,.3), 0 1px 1px rgba(0,0,0,.4);
	-moz-box-shadow: inset 0 1px 0 rgba(255,255,255,.3), 0 1px 1px rgba(0,0,0,.4);
	box-shadow: inset 0 1px 0 rgba(255,255,255,.3), 0 1px 1px rgba(0,0,0,.4);
}
#main-nav li {
	margin: 0;
	padding: 0;
	list-style: none;
	float: left;
	position: relative;
}
#main-nav li:first-child {
	margin-left: 10px;
}
#main-nav a {
	line-height: 100%;
	font-weight: bold;
	color: #fff;
	display: block;
	padding: 14px 15px;
	text-decoration: none;
	text-shadow: 0 -1px 0 rgba(0,0,0,.5);
}
#main-nav a:hover {
	color: #fff;
	background: #474747;
	/* gradient */
	background: -webkit-gradient(linear, left top, left bottom, from(#282828), to(#4f4f4f));
	background: -moz-linear-gradient(top,  #282828,  #4f4f4f);
	background: linear-gradient(-90deg, #282828, #4f4f4f);
}

/************************************************************************************
CONTENT
*************************************************************************************/
#content {
	background: #fff;
	margin: 30px 0 30px;
	padding: 20px 20px;
	width: 947px;
	float: center;
	/* rounded corner */
	-webkit-border-radius: 8px;
	-moz-border-radius: 8px;
	border-radius: 8px;
	/* box shadow */
	-webkit-box-shadow: 0 1px 3px rgba(0,0,0,.4);
	-moz-box-shadow: 0 1px 3px rgba(0,0,0,.4);
	box-shadow: 0 1px 3px rgba(0,0,0,.4);
}

/* post */
.post {
	margin-bottom: 40px;
}
.post-title {
	margin: 0 0 5px;
	padding: 0;
	font: bold 26px/120% Arial, Helvetica, sans-serif;
}
.post-title a {
	text-decoration: none;
	color: #000;
}
.post-meta {
	margin: 0 0 10px;
	font-size: 90%;
}

/* post image */
.post-image {
	margin: 0 0 15px;
}

/************************************************************************************
SIDEBAR
*************************************************************************************/
#sidebar {
	width: 25%;
margin-right: 5%;
	float: right;
	margin: 30px 0 30px;
}
.widget {
	background: #fff;
	margin: 0 0 30px;
	padding: 10px 20px;
	/* rounded corner */
	-webkit-border-radius: 8px;
	-moz-border-radius: 8px;
	border-radius: 8px;
	/* box shadow */
	-webkit-box-shadow: 0 1px 3px rgba(0,0,0,.4);
	-moz-box-shadow: 0 1px 3px rgba(0,0,0,.4);
	box-shadow: 0 1px 3px rgba(0,0,0,.4);
}
.widgettitle {
	margin: 0 0 5px;
	padding: 0;	
}
.widget p {
	margin: 0;
	padding: 0;
	color:
}

/* flickr widget */
.widget .flickr_badge_image {
	margin-top: 10px;
}
.widget .flickr_badge_image img {
	width: 48px;
	height: 48px;
	margin-right: 12px;
	margin-bottom: 12px;
	float: left;
}

/************************************************************************************
FOOTER
*************************************************************************************/
#footer {
	clear: both;
	color: #ccc;
	font-size: 85%;
}
#footer a {
	color: #fff;
}

/************************************************************************************
CLEARFIX
*************************************************************************************/
.clearfix:after { visibility: hidden; display: block; font-size: 0; content: " "; clear: both; height: 0; }
.clearfix { display: inline-block; }
.clearfix { display: block; zoom: 1; }

    .file_button_container,
      .file_button_container input {
           background: transparent url(./images/upload.png) right top no-repeat;
           height: 47px;
           width: 263px;
right:200 px;
       }

       .file_button_container {
           background: transparent url(./images/upload.png) right top no-repeat;
margin-left:250px;
top: 10px;
position: relative;

       }
    
       .file_button_container input {
           opacity: 0;
       }

p{
	font-family: 'Hanalei', cursive;
	margin: 0 0 1.2em;
	padding: 0;
}
span{
	font-size: large;
	color: #ff0000;
}


.content {
    height:200px;
}
.left {
	overflow: hidden;
}
.right {
    overflow: hidden;
}

.zoom-img {
    -webkit-transition: -webkit-transform 0.2s;
    -moz-transition: -moz-transform 0.2s;
    -ms-transition: -ms-transform 0.2s;
    transition: transform 0.2s;
}
.zoom-img:hover {
    -webkit-transform: scale(1.2);
    -moz-transform: scale(1.2);
    -ms-transform: scale(1.2);
    transform: scale(1.2);
}

.abc{
font-family: 'Hanalei', cursive;
}
</style>


<link href="./css/media-queries.css" rel="stylesheet" type="text/css">

</head>

<body>


<strong><a style="float:right; color:white;font-size:20px;" href=logout.php>Logout</a></strong>

<div id="pagewrap">

	<header id="header">

		<hgroup>
			<div id=logo><a href="home.php"><img src="./images/home_logo.png"></a></div>
			
		</hgroup>

		<nav>
			<ul id="main-nav" class="clearfix">
				<li><a href="">HOME</a></li>
				<li><a href="">PROFILE</a></li>
				<li><a href="">COURSES</a> </li>
				<li><div class="file_button_container"><input type="file" /></div></li>
			</ul>

			<!-- /#main-nav --> 
		
		<form id="searchform">
			<input type="search" id="s" placeholder="Search">
		</form></nav>

		

	</header>
	<!-- /#header -->
	
	<div id="content">

		<article class="post clearfix">

			<header>
				
<h1 class="post-title" style="text-align: center;"><span style="font-family: 'Hanalei', cursive; font-size: xx-large; color: #003300; text-decoration: underline";><strong><?php echo $name; ?></strong></span></h1>

			</header>
			<figure class="post-image"> 
			</figure>
			<p></p>
<table class="content">
<?php include "getimagescourse.php"; ?>
</table>	
	
	<footer id="footer">
	
		

	</footer>
	<!-- /#footer --> 
	
</div>

</body>
</html>
