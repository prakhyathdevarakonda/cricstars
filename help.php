<?php
include'init.php';
$username="tree";
$sql="SELECT * FROM admin WHERE username=$username";
$result=DB::getConnection()->select($sql);
var_dump($result);
$id=20;
$sql="SELECT match_id FROM m_atch WHERE adminid=$id";
$result=DB::getConnection()->select($sql);
var_dump($result);
?>