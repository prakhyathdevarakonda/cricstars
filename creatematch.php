<?php include'init.php'?>
<?php
 class teamDetails
 {
 	private $teamname;
 	private $coachname;
 	private $managername;

 	public  function teamIntodb($teamname)
 	{
 		$this->teamname=$teamname;

 		$sql="INSERT INTO team(team_name)
 		      VALUES('$this->teamname')";
 		$result=DB::getConnection()->insert($sql);
 		if($result)
 		{
 			header("Location:teamAplayers.php");
 		}
 	}
 }
 if($_SERVER["REQUEST_METHOD"]=="POST")
 {
   	// store value from html box for 1st team
    $team1=$_POST["team_name1"];

    // store value from html box for 2nd team
    $team2=$_POST["team_name2"];

    $team=new teamDetails();
    $team->teamIntodb($team1);
    $team->teamIntodb($team2);
   }
   


?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Team Details</title>
<link rel="stylesheet" type="text/css" href="css/view.css" media="all">
<script type="text/javascript" src="resources/js/view.js"></script>
<script>
function validateForm() {
    var x = document.forms["index"]["team_name1"].value;
    if (x == "") {
        alert("Team A Name must be filled out");
        return false;
    }
}
</script>

</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Team Details</a></h1>
		<form id="index" class="appnitro"  method="post" action="" onsubmit="return validateForm()">
					<div class="form_description">
			<h2>Team Details</h2>
			<p>Please enter proper info below:</p>
		</div>						
			<ul >
			
					<li id="li_1" >
		<label class="description" for="team_name1">Team A Name </label>
		<div>
			<input id="team_name1" name="team_name1" class="element text medium" type="text" maxlength="255" value="" required/> 
		</div> <li id="li_2" >
		<label class="description" for="team_name2">Team B Name </label>
		<div>
			<input id="team_name2" name="team_name2" class="element text medium" type="text" maxlength="255" value="" required/> 
		</div> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="index" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
		</li>
			</ul>
		</form>	
	</div>
	</body>
</html>