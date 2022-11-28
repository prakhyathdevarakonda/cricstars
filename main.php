
<?php
include'init.php';
$id=$_GET['match_id'];
Session::set('mid',$id);
$username="qwerty"; 
$sql = "SELECT * FROM admin WHERE username='$username' ";
$result = DB::getConnection()->selectFirstRow($sql);
session::set('id',$result['id']);

?>
<html>
<frameset rows="23%,*" frameborder="0">
<frame src="index.php"></frame>
<frameset cols="75%,*" frameborder="0">
<frame src="details.php"></frame>
<frame src="gameposition.php"></frame>
</frameset>
</frameset>

</html>