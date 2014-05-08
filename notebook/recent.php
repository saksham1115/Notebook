<?php
$newsql = new mysqli("localhost","root","ishallcallhimsebastian","notebook");
$res = $newsql->query("select course from registers where pid=".$_SESSION['id']);
while($rem = $res->fetch_assoc())
    $mover[]=$rem['course'];
$res = $newsql->query("select imid, perid, course, name, time from images order by time desc");
while($rem = $res->fetch_assoc())
{
    if(in_array($rem['course'], $mover))
    {
        echo "<li class=recent>";
        $rep = $newsql->query("select name from users where id=".$rem['perid'])->fetch_assoc();
        echo "<a href=./display.php?imid=".$rem['imid']." id=reclink>".$rem['name']."</a> by ";
        echo "<a href=./profile.php?id=".$rem['perid']." id=perlink>".$rep['name']."</a>";
        echo "<p id=timepar>".$rem['time']."</p></li>";
    }
}
?>
