<?php include'init.php';
$sql="DELETE FROM m_atch WHERE player_name='' ";
$result=DB::getConnection()->delete($sql);?>
<?php

class tossDetails
{
	private $val;
	private $teamAid;
	private $teamBid;
	private $teamAname;
	private $teamBname;
	private $tossid;
	private $overs;

	public function toss($val,$overs)
	{
		$this->val=$val;
		$this->overs=$overs;
		$sql="SELECT * FROM team";
		$result=DB::getConnection()->select($sql);
		if($result)
		{
			foreach($result as $value)
			{
				$this->teamBid=$value['team_id'];
				$this->teamBname=$value['team_name'];
			}
		}
		$this->teamAid=$this->teamBid-1;
     
		$sql="SELECT team_name FROM team WHERE team_id=$this->teamAid";
		$result=DB::getConnection()->select($sql);
		if($result)
		{
			foreach($result as $value)
			{
               $this->teamAname=$value['team_name'];
		    }
		    
		}

		if($this->val==1)
		{
			$this->tossid=$this->teamAid;
		}
		else
		{
			$this->tossid=$this->teamBid;
		}

		$sql="INSERT INTO m_atch (team_Aid,team_Bid,team_Aname,team_Bname,toss,overs,isActive)
		      VALUE ('$this->teamAid','$this->teamBid','$this->teamAname','$this->teamBname','$this->tossid','$this->overs',1)";
		$result=DB::getConnection()->insert($sql);

			$username=session::get('code');
			$sql = "INSERT INTO admin(username,isPresent)VALUES('$username',1)";
   			$result = DB::getConnection()->insert($sql);

			   $sql="SELECT * FROM admin WHERE username='$username'";
			   $result=DB::getConnection()->selectFirstRow($sql);
			   $adminid=$result['id'];
			   
			$sql="SELECT * from m_atch where team_Aid=$this->teamAid and team_Bid=$this->teamBid";
			$result=DB::getConnection()->selectFirstRow($sql);
			   //echo $result['team_Bname'];
			$matchid=$result['match_id'];

			//echo"$this->teamBid";

				
			$sql="UPDATE  m_atch SET admin_name='$username',isSelect=1,adminid=$adminid WHERE match_id=$matchid";
			$result=DB::getConnection()->update($sql);


			header("Location:resume.php? match_id=$matchid ");
	}
}
 
if($_SERVER["REQUEST_METHOD"]=="POST")
{
   
   $toss=new tossDetails();
   $toss->toss($_POST["element_1"],$_POST["over"]);
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Toss Details</title>
<link rel="stylesheet" type="text/css" href="resources/css/view.css" media="all">
<script type="text/javascript" src="resources/js/view.js"></script>


</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Toss Details</a></h1>
		<form id="index2" class="appnitro"  method="post" action="">
					<div class="form_description">
			<h2>
				Match Code:
				<?php
							while(1)//generation of random pass
							{
								$length = 4 ;
								$characters = '01234567898765432109';
								$charactersLength = strlen($characters);
								$username = '';
								for ($i = 0; $i < $length; $i++) 
									$username .= $characters[rand(0, $charactersLength - 1)];
								
								$sql="SELECT username from admin where username='$username'";
								$result=DB::getConnection()->select($sql);
								if(!$result)
								break;
							}
							echo $username;
							session::set('code',$username)
				?>
			</h2>
			<h2>Toss Details</h2>
			<p>Please enter the proper info below:</p>
		</div>						
			<ul >
			
					<li id="li_1" >
		<label class="description" for="element_1">Bat </label>
		<div>
		<select class="element select medium" id="element_1" name="element_1"> 
			<option value="" selected="selected"></option>
<option value="1" >Team A</option>
<option value="2" >Team B</option>

		</select>
		</div>
		</li>		<li id="li_2" >
		<label class="description" for="over">Overs</label>
		<div>
			<input id="over" name="over" class="element text medium" type="text" maxlength="255" value="" required /> 
		</div> 
		</li>		<li class="buttons">
			    <input type="hidden" name="index2"/>
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
		</li>
			</ul>
		</form>	
	</div>
	<img id="bottom" src="bottom.png" alt="">
	</body>
</html>