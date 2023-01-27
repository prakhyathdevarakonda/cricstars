<?php include'init.php';?>
<?php
$val=$_GET['val'];
class outBatsman
{
	private $outtype;
	private $adminid;
	private $tossId;
	private $statusid;
	private $nonstriker;
  private $bowler;
  private $bowlerid;
  private $bowlername; 
  private $batsmanid;
  private $allwicket;
  private $extrawicket;


	public function out($run,$outtype)
	{
       $this->run=$run;
	   $this->outtype=$outtype;
	   $this->adminid=Session::get('id');
	   $sql="SELECT * FROM m_atch WHERE adminid=$this->adminid";
       $result=DB::getConnection()->select($sql);

       if($result)
       {
       	  foreach ($result as $value) 
       	  {
       	  	 $this->tossId=$value['toss'];
       	  	 $this->matchid=$value['match_id'];
       	  }
       }

       $sql="SELECT status_id FROM status WHERE stricking_role=1  AND match_id=$this->matchid AND toss=$this->tossId";
       $result=DB::getConnection()->select($sql);
       var_dump($result);
       if($result)
       {
       	  foreach ($result as $value) 
       	  {
       	  	 $this->statusid=$value['status_id'];
       	  }
       }

       $sql="SELECT status_id FROM status WHERE stricking_role=2  AND match_id=$this->matchid AND toss=$this->tossId";
       $result=DB::getConnection()->select($sql);
       if($result)
       {
       	  foreach ($result as $value) 
       	  {
       	  	 $this->nonstriker=$value['status_id'];
       	  }
       }

       // update ball played && batsman runs by batsman
       $sql ="SELECT * FROM status WHERE status_id=$this->statusid";
       $result=DB::getConnection()->select($sql);
       if ($result)
       {
       	   $batsball;
       	   $batsrun;
       	   $six=0;
       	   $four;
           foreach ($result as $value) 
           {
        	  $batsball=1+$value["played_ball"];
              $batsrun=$this->run+$value['bat_run'];
           }
          // echo "int batsman ".$this->statusid." ".$batsball." ".$batsrun." ".$six." ".$four."<br>";
          $sql="UPDATE  status  SET bat_run=$batsrun,played_ball=$batsball WHERE status_id=$this->statusid";
           $result=DB::getConnection()->update($sql);
       }

       $sql="SELECT * FROM status WHERE stricking_role=1  AND match_id=$this->matchid AND toss!=$this->tossId";
       $result=DB::getConnection()->select($sql);
       if($result)
       {
       	  foreach ($result as $value) 
       	  {
       	  	 $this->bowler=$value['status_id'];
             $this->allwicket=1+$value['wicket'];
             $this->extrawicket=1+$value['extra_wicket'];
       	  }
       }
       if($this->outtype==1)
       {
          $sql="UPDATE  status  SET wicket=$this->allwicket WHERE status_id=$this->bowler";
          $result=DB::getConnection()->update($sql);
       }

        // update bowler balls and runs
       $sql ="SELECT * FROM status WHERE status_id=$this->bowler";
       $result=DB::getConnection()->select($sql);
       if ($result)
       {
       	   $bowlerball;
           foreach ($result as $value) 
           {
        	   $bowlerball=1+$value["bowled_overs"];
               $ballrun=$this->run+$value['bowlruns'];
           }
          // echo "in bowler ".$this->statusid." ".$bowlerball." ".$bowlerrun;
          $sql="UPDATE  status  SET bowlruns=$ballrun,bowled_overs=$bowlerball WHERE status_id=$this->bowler";
           $result=DB::getConnection()->update($sql);
       }

       $sql ="SELECT player_id FROM status WHERE status_id=$this->bowler";
       $result=DB::getConnection()->select($sql);
       if ($result)
       {
           foreach ($result as $value) 
           {
            $this->bowlerid=$value["player_id"];
           }
       }
       $sql ="SELECT player_name FROM players WHERE player_id=$this->bowlerid";
       $result=DB::getConnection()->select($sql);
       if ($result)
       {
           foreach ($result as $value) 
           {
            $this->bowlername=$value["player_name"];
           }
       }


       if($this->outtype==1)
       {
          $this->bowlername="B ".$this->bowlername;
          $sql="UPDATE  status  SET out_type='$this->bowlername',stricking_role=NULL WHERE status_id=$this->statusid";
          $result=DB::getConnection()->update($sql);
       }
       header("Location:gamesituation.php");
       
	}
}
$run=new outBatsman();
$run->out($val,1);
?>