<?php include 'init.php'; ?>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$username = $_POST['username'];

	$sql = "SELECT * FROM admin WHERE username='$username' ";
	$result = DB::getConnection()->selectFirstRow($sql);
    session::set('id',$result['id']);
    
    if ($result)
        header("Location:main.php");

    $id=$_GET['match_id'];
    Session::set('mid',$id);


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


