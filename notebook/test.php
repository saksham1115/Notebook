<html>
<head>
</head>
<body>
<form name="input" action="makecomment.php" method="post">
Your Views:<input type="text" name="comment">
<input type="hidden" name="image" value="<?php echo $_GET['imid']; ?>">
<input type="submit" value="Submit">
</form>
</body>
</html>
