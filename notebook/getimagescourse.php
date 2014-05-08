<?php
$res = $newsql->query("select imid, perid, rating, name, ext from images where course='".$name."' order by rating desc");
$i=0;
while($arr = $res->fetch_assoc())
{
    $repp = $newsql->query("select name from users where id=".$arr['perid'])->fetch_assoc();
    $name = $repp['name'];
    if($i%2==0)
        echo "<tr>";
        
    echo "<td class=left align=center valign=center>";
    echo "<div class=zoom-ing>";
    echo "<a href=display.php?imid=".$arr['imid']."><img src='./users/".$arr['perid']."/".$arr['imid'].".".$arr['ext']."' width=30% height=auto/></a>";
    echo "</div><br>";
    echo "<div class=abc>";
    echo "<span style=font-family: georgia,palatino;>".$arr['name']." by ".$name."</span>";
    echo "</div></td>";
    if($i%2==0)
        echo "</tr>";
    $i++;    
}
?>
