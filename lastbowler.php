<?php include'init.php';?>
<?php

class lastbowler
{
  
	private $adminid;
  private $matchid;
	private $tossId;
  private $playerid;

	public function getlastbowler()
	{


    $this->adminid=Session::get('id');
	  $sql="SELECT * FROM m_atch WHERE adminid=$this->adminid";
    $result=DB::getConnection()->select($sql);
    if($result)
    {
      foreach ($result as $value) 
      {
       	$this->tossId=$value['toss'];
       	$this->matchid=$value['match_id'];
        $this->over=$value['overs'];
      }
    }

    $sql="SELECT * FROM status WHERE match_id=$this->matchid AND toss!=$this->tossId";
    $result=DB::getConnection()->select($sql);
    if($result)
    {
       foreach ($result as $value) 
       {
        
         $this->playerid=$value['player_id'];

       }
    }
    $sql="UPDATE players SET isSelect=1 WHERE player_id=$this->playerid";
    $result=DB::getConnection()->update($sql);
    header("Location:selectbowler.php");
   // header("Location:ballbyball.php");
       
	}
}
$bowler=new lastbowler();
$bowler->getlastbowler();
?>