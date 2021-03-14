<?php
include "database.php";
$msg = "";
$query = "SELECT * FROM shouts ORDER BY date ASC";
$shouts = mysqli_query($con, $query);
while($row = mysqli_fetch_assoc($shouts)){
    $msg = $msg.$row['name']."[{$row['date']}] : ".$row['shout']."\n";
}

$myfile = fopen("chat_ROOM.txt", "w") or die("Unable to open file!");
$txt = $msg;
//fwrite($myfile, $txt);
file_put_contents("chat_ROOM.txt",$txt,FILE_APPEND);
fclose($myfile);

?>