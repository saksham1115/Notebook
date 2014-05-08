<?php
session_start();
if(!isset($_SESSION['name']))
    header("location:index.php");
?>
<html>
<head>
<title>Upload Notes</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.js"></script>


<style>

/** the form elements **/  
#hongkiat-form { box-sizing: border-box; }  
  
#hongkiat-form .txtinput {   
  display: block;  
  font-family: "Helvetica Neue", Arial, sans-serif;  
  border-style: solid;  
  border-width: 1px;  
  border-color: #dedede;  
  margin-bottom: 20px;  
  font-size: 1.55em;  
  padding: 11px 25px;  
  padding-left: 55px;  
  width: 90%;  
  color: #777;  
    
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) inset;  
  -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) inset;  
  -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) inset;   
    
  transition: border 0.15s linear 0s, box-shadow 0.15s linear 0s, color 0.15s linear 0s;  
  -webkit-transition: border 0.15s linear 0s, box-shadow 0.15s linear 0s, color 0.15s linear 0s;  
  -moz-transition: border 0.15s linear 0s, box-shadow 0.15s linear 0s, color 0.15s linear 0s;  
  -o-transition: border 0.15s linear 0s, box-shadow 0.15s linear 0s, color 0.15s linear 0s;  
}  
  
#hongkiat-form .txtinput:focus {   
  color: #333;  
  border-color: rgba(41, 92, 161, 0.4);  
    
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) inset, 0 0 8px rgba(41, 92, 161, 0.6);  
  -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) inset, 0 0 8px rgba(41, 92, 161, 0.6);  
  -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) inset, 0 0 8px rgba(41, 92, 161, 0.6);  
  outline: 0 none;   
} 
#hongkiat-form textarea {  
  display: block;  
  font-family: "Helvetica Neue", Arial, sans-serif;  
  border-style: solid;  
  border-width: 1px;  
  border-color: #dedede;  
  margin-bottom: 15px;  
  font-size: 1.5em;  
  padding: 11px 25px;  
  padding-left: 55px;  
  width: 90%;  
  height: 180px;  
  color: #777;  
    
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) inset;  
  -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) inset;  
  -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) inset;   
    
  transition: border 0.15s linear 0s, box-shadow 0.15s linear 0s, color 0.15s linear 0s;  
  -webkit-transition: border 0.15s linear 0s, box-shadow 0.15s linear 0s, color 0.15s linear 0s;  
  -moz-transition: border 0.15s linear 0s, box-shadow 0.15s linear 0s, color 0.15s linear 0s;  
  -o-transition: border 0.15s linear 0s, box-shadow 0.15s linear 0s, color 0.15s linear 0s;  
}  
#hongkiat-form textarea:focus {  
  color: #333;  
  border-color: rgba(41, 92, 161, 0.4);  
  
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) inset, 0 0 8px rgba(40, 90, 160, 0.6);  
  -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) inset, 0 0 8px rgba(40, 90, 160, 0.6);  
  -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) inset, 0 0 8px rgba(40, 90, 160, 0.6);  
  outline: 0 none;   
}  
#hongkiat-form textarea.txtblock {  
    background: #fff url('http://media02.hongkiat.com/responsive-css3-form/speech.png') 5px 4px no-repeat;  
} 
#hongkiat-form input#image {
background: #fff url('up.png') 5px 4px no-repeat;
}
#hongkiat-form input#uname {
background: #fff url('uname.png') 5px 4px no-repeat;
}
#hongkiat-form input#course {
background: #fff url('courses.png') 5px 4px no-repeat;
}



<style type="text/css">
/* pushes the page to the full capacity of the viewing area */
html {height:100%;}
body {height:100%; margin:0; padding:0;}
/* prepares the background image to full capacity of the viewing area */
#bg {position:fixed; top:0; left:0; width:100%; height:100%;}
/* places the content ontop of the background image */
#content {position:relative; z-index:1;}



/*For Buttons*/

#button {
  display: block;
  float: left;
  height: 3em;
  padding: 0 1em;
  border: 1px solid;
  outline: 0;
  font-weight: bold;
  font-size: 1.3em;
  color: #fff;
  text-shadow: 0px 1px 0px #222;
  white-space: nowrap;
  word-wrap: normal;
  vertical-align: middle;
  cursor: pointer;
  
  -moz-border-radius: 2px;
  -webkit-border-radius: 2px;
  border-radius: 2px;
  
  border-color: #5e890a #5e890a #000;
  
  -moz-box-shadow: inset 0 1px 0 rgba(256,256,256, .35);
  -ms-box-shadow: inset 0 1px 0 rgba(256,256,256, .35);
  -webkit-box-shadow: inset 0 1px 0 rgba(256,256,256, .35);
  box-shadow: inset 0 1px 0 rgba(256,256,256, .35);
  
  background-color: rgb(226,238,175);
  background-image: -moz-linear-gradient(top, rgb(226,238,175) 3%, rgb(188,216,77) 3%, rgb(144,176,38) 100%);
  background-image: -webkit-gradient(linear, left top, left bottom, color-stop(3%,rgb(226,238,175)), color-stop(3%,rgb(188,216,77)), color-stop(100%,rgb(144,176,38))); 
  background-image: -webkit-linear-gradient(top, rgb(226,238,175) 3%,rgb(188,216,77) 3%,rgb(144,176,38) 100%);
  background-image: -o-linear-gradient(top, rgb(226,238,175) 3%,rgb(188,216,77) 3%,rgb(144,176,38) 100%);
  background-image: -ms-linear-gradient(top, rgb(226,238,175) 3%,rgb(188,216,77) 3%,rgb(144,176,38) 100%);
  background-image: linear-gradient(top, rgb(226,238,175) 3%,rgb(188,216,77) 3%,rgb(144,176,38) 100%); 
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e2eeaf', endColorstr='#90b026',GradientType=0 );
}
#button:hover, #button:active {
  border-color: #7c9826 #7c9826 #000;
  color: #fff;
  
  -moz-box-shadow: inset 0 1px 0 rgba(256,256,256,0.4),0 1px 3px rgba(0,0,0,0.5);
  -ms-box-shadow: inset 0 1px 0 rgba(256,256,256,0.4),0 1px 3px rgba(0,0,0,0.5);
  -webkit-box-shadow: inset 0 1px 0 rgba(256,256,256,0.4),0 1px 3px rgba(0,0,0,0.5);
  box-shadow: inset 0 1px 0 rgba(256,256,256,0.4),0 1px 3px rgba(0,0,0,0.5);
  
  background: rgb(228,237,189);
  background: -moz-linear-gradient(top, rgb(228,237,189) 2%, rgb(207,219,120) 3%, rgb(149,175,54) 100%); 
  background: -webkit-gradient(linear, left top, left bottom, color-stop(2%,rgb(228,237,189)), color-stop(3%,rgb(207,219,120)), color-stop(100%,rgb(149,175,54))); 
  background: -webkit-linear-gradient(top, rgb(228,237,189) 2%,rgb(207,219,120) 3%,rgb(149,175,54) 100%); 
  background: -o-linear-gradient(top, rgb(228,237,189) 2%,rgb(207,219,120) 3%,rgb(149,175,54) 100%); background: -ms-linear-gradient(top, rgb(228,237,189) 2%,rgb(207,219,120) 3%,rgb(149,175,54) 100%); background: linear-gradient(top, rgb(228,237,189) 2%,rgb(207,219,120) 3%,rgb(149,175,54) 100%); 
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e4edbd', endColorstr='#95af36',GradientType=0 );
}

</style>
<!--[if IE 6]>
<style type="text/css">
/* some css fixes for IE browsers */
html {overflow-y:hidden;}
body {overflow-y:auto;}
#bg {position:absolute; z-index:-1;}
#content {position:static;}
</style>
<![endif]-->
</style>
</head>
<body>
<div id="bg"><img src="backreg.png" width="100%" height="100%" alt=""></div>
 <div id="content">
 <form name="hongkiat" id="hongkiat-form" method=post action=imageproc.php enctype=multipart/form-data> 
 <div id="wrapping" class="clearfix">

<h4 style="color:brown; font-size:50px;">Upload Your Notes</h4> 
<section id="aligned">  
 <input type=text class="txtinput" name=uname placeholder="Image Name" id=uname required><br>
<input type=text class="txtinput" name=course placeholder="Course Name" id=course required><br>
 <input type=file class="txtinput" placeholder="Upload an image" name=file id=image required enctype="multipart/form-data" ><br>

  
<section id="buttons"> 

<input id='button' class="button" type=submit value="Upload"/>
</form>
</section>
</div>
<div id="msg"></div>
</section>
 
    
</div>
</div>
</body>
</html>


