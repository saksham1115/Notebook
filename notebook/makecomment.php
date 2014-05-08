<?php
session_start();
$comm = $_POST['comment'];
$img = $_POST['image'];
if($comm!=="")
{
    $comment = stripslashes(mysql_real_escape_string($_POST['comment']));
    $newsql = new mysqli("localhost","root","ishallcallhimsebastian","notebook");
    $newsql->query("insert into comments(comment, imid, perid) values('$comment', $img, ".$_SESSION['id'].")");
}
header("location:./display.php?imid=".$img);
?>
