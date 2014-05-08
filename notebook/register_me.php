<?php
$uname = $_POST['uname'];
$upass = $_POST['upass'];
$ugrad = $_POST['grd'];
$uloc = $_POST['loc'];
if(!ctype_alnum($uloc)||!ctype_alnum($uname)||!ctype_alnum($upass)||strlen($upass)<=8)
    header("location:register.php");
else
{
    $newsql = new mysqli("localhost","root","ishallcallhimsebastian","notebook");
    $res = $newsql->query("select name from users where name='$uname'")->num_rows;
    if($res)
        header("location:register.php");
    else
    {
        $charset ="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        $salt = '';
        for($i=0;$i<32;++$i)
            $salt.=$charset[rand(0,61)];
        $pass = hash('sha256', $salt.$upass, false); 
        $newsql->query("insert into users(name, salt, password, location, year) values('$uname', '$salt', '$pass', '$uloc', '$ugrad')");
        $iarr = $newsql->query("select id from users where name='$uname'")->fetch_assoc();
        mkdir("users/".$iarr['id'], 0757);
        chmod("users/".$iarr['id'], 0757);
         header("location:index.php");
    }
}
?>
