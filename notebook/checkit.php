<?php
$uname = $_POST['uname'];
$upass = $_POST['upass'];
$err = "Login failed due to invalid username or password.";
if(!ctype_alnum($uname)||!ctype_alnum($upass))
    echo $err;
else
{
    $newsql = new mysqli("localhost","root","ishallcallhimsebastian","notebook");
    $res = $newsql->query("select salt, password from users where name='$uname'")->fetch_assoc();
    $nepass = $res['salt'].$upass;
    if($res['password']!==hash('sha256', $nepass, false))
        echo $err;
    else
    {
        $iarr = $newsql->query("select id from users where name='$uname'")->fetch_assoc();
        session_start();
        $_SESSION['name'] = $uname;
        $_SESSION['id'] = $iarr['id'];
        echo "1";
    }
}
?>
