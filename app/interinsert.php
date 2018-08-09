<?php
session_start();
include 'conn.php';
 
 $lev=$_SESSION['lev'];
 $sem=$_SESSION['sem'];
 $mat=@$_GET['mid'];

 $sqleeI 	= 	$link->query("SELECT * FROM courses WHERE lev_id='$lev' and sem_id='$sem'");
 $course_row 	=	$sqleeI->rowCount();
 
	$unknown	=	 $link->query("SELECT * FROM sdata WHERE cur_lev='$lev' and cur_sem='$sem' and student_id='$mat'"); 
 	
 	if($unknown->rowCount()==0){
		
 		$sqlee 	= 	$link->query("SELECT * FROM courses WHERE lev_id='$lev' and sem_id='$sem'");
 
			while($real_fetch=$sqlee->fetch()){
					
				$cosr 	= 	strtoupper($real_fetch['name']);
				$codr 	=	 $real_fetch['code'];
				
				$unit 	= 	strtoupper($real_fetch['unit']);
				$ctid 	= 	$real_fetch['id'];
				
				$gradef = 'f';
				 $query 	= 	$link->prepare("INSERT INTO sdata(student_id,course_id,title,score,grade,unit,cur_sem,cur_lev,scoregrade,exam,ca) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
				
				$query->execute([$mat,$ctid,$cosr,0,$gradef,$unit,$sem,$lev,0,0,0]);
			}
							
			$_SESSION['moid'] 	= 	$mat;
			header("location:compeach.php");

	}else if($unknown->rowCount() 	== 	$course_row){

				$_SESSION['moid']=$mat;
				header("location:compeach.php");

	}else{
			
		echo "<body onload='rld()'></body>";
	}


?>

<script>

	function rld(){
		
		alert("Please Check Course(s) That are Added After Result Compilation");
		window.location="compda.php";
	
	}
</script>