<?php
$newsql = new mysqli("localhost","root","ishallcallhimsebastian","notebook");
$res = $newsql->query("select perid, comment, time from comments where imid=".$_GET['imid']." order by time desc");
while($rem = $res->fetch_assoc())
{
    $pep = $newsql->query("select name from users where id=".$rem['perid'])->fetch_assoc();
    $name = $pep['name'];
    echo "<div class=comment>";
    echo "<p class=headcomment>>$name said on ".$rem['time'].":&nbsp;&nbsp;</p>";
    echo "<p class=rawtext>".$rem['comment']."</p><hr>";
}
?>
