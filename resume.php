<?php include 'init.php'; ?>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$username = $_POST['username'];
	$id=$_GET['match_id'];
    

	$sql = "SELECT * FROM m_atch WHERE admin_name='$username' and match_id=$id";
	$result = DB::getConnection()->selectFirstRow($sql);

	
    
    if ($result)
	{
		Session::set('mid',$id);
    	session::set('id',$result['adminid']);
		header("Location:main.php");
	}
        
    


}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name='viewport' content="width=device-width, initial-scale=1.0">
	<title>Resume</title>
	<link type="text/css" rel="stylesheet" href="resources/css/bootstrap.css">
	<link type="text/css" rel="stylesheet" href="resources/css/style.css">
</head>
<body>
	<div class="container-fluid">
		<div class="col-md-offset-4 col-md-4">
			<h1 class="text-center">Resume</h1>
			<form action="" method="POST">
				<div class="form-group">
					<label for="username">Password</label>
					<input type="password" name="username" value="" placeholder="enter password" class="form-control"/>
				</div>
				<div class="form-group col-md-offset-5">
					<input type="submit" name="register" value="Log in" class="btn btn-primary btn-lg"/>
				</div>
			</form>
		</div>
	</div>
</body>
</html>


