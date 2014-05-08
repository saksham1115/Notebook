<?php
$req = $_POST['searched'];
$newsql = new mysqli("localhost","root","ishallcallhimsebastian","notebook");
$nop = $newsql->query("select id from users where name='$req'");
$nopp = $nop->num_rows;
if(!$nopp)
    header("location:home.php");
else
{
    $popp = $nop->fetch_assoc();
    header("location:profile.php?id=".$popp['id']);
}
?>
