
<?php
    	if(empty($_POST['techno']))
        {
            if(isset($_POST['0']))  
            { 
                $val=$_POST['0'] ;
            } 
            if(isset($_POST['1']))  
            { 
                $val=$_POST['1'] ;
            } 
            else if(isset($_POST['2']))
            { 
                $val=$_POST['2'] ;
                
            } 
            else if(isset($_POST['3']))
            { 
                $val=$_POST['3'] ;
                
            } 
            else if(isset($_POST['4']))
            { 
                $val=$_POST['4'] ;
               
            } 
            else if(isset($_POST['5']))
            { 
                $val=$_POST['5'] ;
                
            } 
            else if(isset($_POST['6']))
            { 
                $val=$_POST['6'] ;
                
            } 
            
        }
?>
<?php
include'init.php';

class batRuns
{
    private $runs;
    private $statusid;
    private $nonstriker;
    private $tossId;
    public function runs($runs)
    {
        $this->runs=$runs;
        $sql="SELECT match_id FROM m_atch WHERE adminid=17";
        $result=DB::getConnection()->select($sql);
        if($result)
        {
              foreach ($result as $value) 
              {
                   $this->tossId=95;
                   $this->matchid=42;
              }
        }       

        $sql="SELECT status_id FROM status WHERE stricking_role=1  AND match_id=$this->matchid AND toss=$this->tossId";
       $result=DB::getConnection()->select($sql);
       if($result)
       {
       	  foreach ($result as $value) 
       	  {
       	  	 $this->statusid=$value['status_id'];
       	  	// echo "in striker ".$this->statusid."<br>";
       	  }
       }

       $sql="SELECT status_id FROM status WHERE stricking_role=2  AND match_id=$this->matchid AND toss=$this->tossId";
       $result=DB::getConnection()->select($sql);
       if($result)
       {
       	  foreach ($result as $value) 
       	  {
       	  	 $this->nonstriker=$value['status_id'];
       	  	// echo "in nostriker ".$this->nonstriker."<br>";
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
        	  $batsrun=$this->runs+$value["bat_run"];
        	  if($this->runs==4)
        	  {
                 $four=1+$value["hitted_fours"];
        	  }
        	  if($this->runs==6)
        	  {
                 $six=1+$value["hitted_sixes"];
        	  }
           }
          // echo "int batsman ".$this->statusid." ".$batsball." ".$batsrun." ".$six." ".$four."<br>";
           $sql="UPDATE  status  SET bat_run=$batsrun,played_ball=$batsball WHERE status_id=$this->statusid";
           $result=DB::getConnection()->update($sql);
           //if hitted four then add it to batsman inc 1
           if($this->runs==4)
           {
           	  $sql="UPDATE  status  SET hitted_fours=$four WHERE status_id=$this->statusid";
              $result=DB::getConnection()->update($sql);
           }
           //if hitted six then add it to batsman inc 1
           if($this->runs==6)
           {
           	  $sql="UPDATE  status  SET hitted_sixes=$six WHERE status_id=$this->statusid";
              $result=DB::getConnection()->update($sql);
           }
          // $x=$this->runs%2;
          // echo $x."<br>";
           // if batted runs is odd then position change of batsman
           if(($this->runs%2)==1)
           {
           	  $sql="UPDATE  status  SET stricking_role=2 WHERE status_id=$this->statusid";
              $result=DB::getConnection()->update($sql);
              $sql="UPDATE  status  SET stricking_role=1 WHERE status_id=$this->nonstriker";
              $result=DB::getConnection()->update($sql);
           }
       }

       $sql="SELECT status_id FROM status WHERE stricking_role=1  AND match_id=$this->matchid AND toss!=$this->tossId";
       $result=DB::getConnection()->select($sql);
       if($result)
       {
       	  foreach ($result as $value) 
       	  {
       	  	 $this->statusid=$value['status_id'];
       	  }
       }

        // update bowler balls and runs
       $sql ="SELECT * FROM status WHERE status_id=$this->statusid";
       $result=DB::getConnection()->select($sql);
       if ($result)
       {
       	   $bowlerball;
       	   $bowlerrun;
           foreach ($result as $value) 
           {
        	  $bowlerrun=$this->runs+$value["bowlruns"];
        	  $bowlerball=1+$value["bowled_overs"];
           }
          // echo "in bowler ".$this->statusid." ".$bowlerball." ".$bowlerrun;
           $sql="UPDATE  status  SET bowlruns=$bowlerrun,bowled_overs=$bowlerball WHERE status_id=$this->statusid";
           $result=DB::getConnection()->update($sql);
       }
       header("Location:details.php");
    }
 
}
$run=new batRuns();
$run->runs($val);
?>
