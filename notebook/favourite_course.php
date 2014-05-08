<?php
$course = $_POST['course'];
$pid = $_SESSION['id'];
$newsql = new mysqli("localhost", "root", "ishallcallhimsebastian", "notebook");
$newsql->query("insert into registers values($pid, $course)");
?>
