<?php include'init.php';?>
<?php
class outBatsman
{
  private $run;
	private $outtype;
	private $adminid;
	private $tossId;
	private $statusid;
	private $nonstriker;
  private $bowler;
  private $bowlerid;
  private $bowlername; 
  private $batsmanid;
  private $extrawicket;
  private $playedball;


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

       $sql="SELECT * FROM status WHERE stricking_role=1  AND match_id=$this->matchid AND toss=$this->tossId";
       $result=DB::getConnection()->select($sql);
       if($result)
       {
       	  foreach ($result as $value) 
       	  {
       	  	 $this->statusid=$value['status_id'];
             $this->playedball=1+$value['played_ball'];
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
       	   $six;
       	   $four;
           foreach ($result as $value) 
           {
        	   $batsball=1+$value["played_ball"];
             $batsrun=$this->run+$value['bat_run']-1;
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
             $this->extrawicket=1+$value['extra_wicket'];
       	  }
       }

        // update bowler balls and runs
       $sql ="SELECT * FROM status WHERE status_id=$this->bowler";
       $result=DB::getConnection()->select($sql);
       if ($result)
       {
       	   $noball;
           $ballrun;
           $extra;
           foreach ($result as $value) 
           {
             $noball=1+$value['noball'];
             $ballrun=$this->run+$value['bowlruns'];
             $extra=1+$value['extra'];
           }
          // echo "in bowler ".$this->statusid." ".$bowlerball." ".$bowlerrun;
           $sql="UPDATE  status  SET bowlruns=$ballrun,extra=$extra,noball=$noball WHERE status_id=$this->bowler";
           $result=DB::getConnection()->update($sql);
       }

       if($this->outtype==1)
       {
          
          $sql="UPDATE  status  SET out_type='run out',stricking_role=NULL WHERE status_id=$this->statusid";
          $result=DB::getConnection()->update($sql);

          $sql="UPDATE  status  SET extra_wicket=$this->extrawicket WHERE status_id=$this->bowler";
          $result=DB::getConnection()->update($sql);
       }
       header("Location:gamesituation.php");
       
	}
}
$run=new outBatsman();
$run->out($val,1);
?>