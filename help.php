<?php
include 'init.php';
while(1){
	$length = 4 ;
    $characters = '01234567898765432109';
    $charactersLength = strlen($characters);
    $username = '';
    for ($i = 0; $i < $length; $i++) 
    {
        $username .= $characters[rand(0, $charactersLength - 1)];
    }
    echo $randomString;
    $sql="SELECT username from admin where username='$username'";
    $result=DB::getConnection()->select($sql);
    if(!$result)
    break;
}
?>