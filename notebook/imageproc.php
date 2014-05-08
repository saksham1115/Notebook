<?php
session_start();
$user = $_SESSION['id'];
$name = $_POST['uname'];
$course = $_POST['course'];
if(exif_imagetype($_FILES["file"]["tmp_name"])||!ctype_alnum($name))
{
    if($_FILES["file"]["error"] > 0)
        echo "Error uploading image: ".$_FILES["file"]["error"];
    else 
    {
        $newsq = new mysqli("localhost","root","ishallcallhimsebastian","notebook");
        $res = $newsq->query("select imid from images order by imid desc limit 1")->fetch_assoc();
        $imi = $res['imid']+1;
        $ext = end(explode(".", $_FILES["file"]["name"]));
        $newsq->query("insert into images(imid, perid, name, ext, course) values($imi, ".$_SESSION['id'].", '$name', '$ext', '$course')");  
        $newsq->query("update users set submissions=submissions+1 where id=$user");
        echo "hello";
        move_uploaded_file($_FILES["file"]["tmp_name"], "./users/".$user."/".$imi.".".$ext);
        header("location:display.php?imid=$imi");
    }
}
//else
//    echo "Please upload a valid image.";
?>
