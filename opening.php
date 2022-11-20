<?php 
include'config.php';
$aname = $_POST['teama'];
$bname = $_POST['teamb'];
$tteam = $_POST['toss'];
$Opt = $_POST['opt'];
$tovers =$_POST['overs'];
$sql =  "insert into tdetails values('$aname','$bname','$tovers')";
mysqli_query($conn,$sql);
?>
<html>
<body>
<form name="createm" method="post" action="scorer.php">
Striker<input type="text" name="strk"><br>
Non-Striker<input type="text" name="nstrk"><br>
Opening Bowler<input type="text" name="bwlr"><br>
<input type="submit" value="Start Match">
</form>
</body>
</html>