	<?php
    session_start();
    if(isset($_SESSION['name']))
        header("location:home.php");
    ?>
    <head>
			
		<title>The NoteBook</title>
	<script src="./jquery-2.0.3.min.js"></script>	
		<script type="text/javascript">
			$(document).ready(function() {
				if (!($.browser.safari || $.browser.mozilla)) {
					$("form").hide();
					$("<div class='error' />").html("<h2>Browser Not Supported</h2>The NoteBook Dashboard utilizes cutting-edge browser technologies.<br /><br />We currently only support <ul><li>Firefox (version &gt; 3.5 recommended)</li><li>Safari (version &gt; 3 recommended)</li></ul>").appendTo('#login-content');
				}
			});
            function logmein() {
                var uname = $("#uname").val();
                var upass = $("#upass").val();
    //            alert(uname+upass);
                $.ajax({
                    type: 'POST',
                    url: 'checkit.php',
                    data:{
                        'uname' : uname,
                        'upass' : upass,
                    },
                    success: function(res) {
                        if(res=="1")
                            window.location="./home.php";
                        else
                            $("#error").html(res);
                    }
                });
            }
		</script>
		
		<style type="text/css">
			
            
            * {
				font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
			}
			
			    
            
            body {
				margin: 0;
				pading: 0;
				color: #fff;
				background: url('./images/login_bg.png');
background-size: 1350px 700px;
				font-size: 14px;
				text-shadow: #050505 0 -1px 0;
				font-weight: bold;
			}
			
			li {
				list-style: none;
			}
			
			#dummy {
				position: absolute;
				top: 0;
				left: 0;
				border-bottom: solid 3px #777973;
				height: 250px;
				width: 100%;
				background: url('') repeat #fff;
				z-index: 1;
			}
			
			#dummy2 {
				position: absolute;
				top: 0;
				left: 0;
				border-bottom: solid 2px #545551;
				height: 252px;
				width: 100%;
				background: transparent;
				z-index: 2;
			}
			
			#login-wrapper {
				margin: 0 0 0 -160px;
				width: 320px;
				text-align: center;
				z-index: 99;
				position: absolute;
				top: 0;
				left: 50%;
			}
			
			#login-top {
				height: 120px;
				padding-top: 140px;
				text-align: center;
			}
			
			label {
				width: 70px;
				float: left;
				padding: 8px;
				line-height: 14px;
				margin-top: -4px;
			}
			
			input.text-input {
				width: 200px;
				float: right;
				-moz-border-radius: 4px;
                -webkit-border-radius: 4px;
				border-radius: 4px;
				background: #fff;
				border: solid 1px transparent;
				color: #555;
				padding: 8px;
				font-size: 13px;
			}
			
			input.button {
				float: right;
				padding: 6px 10px;
				color: #fff;
				font-size: 14px;
				background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#a4d04a), to(#459300));
				text-shadow: #050505 0 -1px 0;
				background-color: #459300;
				-moz-border-radius: 4px;
                -webkit-border-radius: 4px;
				border-radius: 4px;
				border: solid 1px transparent;
				font-weight: bold;
				cursor: pointer;
				letter-spacing: 1px;
			}
			
			input.button:hover {
				background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#a4d04a), to(#a4d04a), color-stop(80%, #76b226));
				text-shadow: #050505 0 -1px 2px;
				background-color: #a4d04a;
				color: #fff;
			}
			
			div.error {
				padding: 8px;
				background: rgba(52, 4, 0, 0.4);
				-moz-border-radius: 8px;
                -webkit-border-radius: 8px;
				border-radius: 8px;
				border: solid 1px transparent;
				margin: 6px 0;}

.imagestyle1 { position: relative; top: -3px; }

#regbut{
color:black;
text-decoration: underline;
size:20px;
float: right;
z-index:100;

}


			
            

		</style>		
	</head>
  
	<body id="login">
        <div id="login-wrapper" class="png_bg">

                        <a id=regbut href="register.php">Register</a>
			<div id="login-top">
				<img src="./images/login_logo.png" width="300px" height="90px" class="imagestyle1" alt="The NoteBook" title="Powered By Us" />			
			</div>
			<p id=error></p>
			<div id="login-content">
					<p>
						<label><font color="black" size="3.5 px">Username</font></label>
						<input id=uname name="uname" class="text-input" type="text" />
					</p>
					<br style="clear: both;" />
					<p>
						<label><font color="white" size="3.5 px">Password</font></label>
						<input id=upass name="upass" class="text-input" type="password" />
					</p>
					<br style="clear: both;" />
					<p>
                        <input class="button" onclick=logmein() type="submit" value="Sign In"  />
					</p>
					
			</div>
		</div>
		<div id="dummy"></div>
		<div id="dummy2"></div>
  </body>
</html>

