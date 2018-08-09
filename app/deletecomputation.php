<?php
session_start();
include 'conn.php';
 
 	$lev=$_SESSION['lev'];
 	$sem=$_SESSION['sem'];
	
	$lexc 	= 	$link->query("SELECT lenam FROM level WHERE id='$lev'");
	list($level)	=	 $lexc->fetch();

	$e = null;

 	$sql=$link->query("DELETE FROM sdata WHERE cur_sem='$sem' and cur_lev='$lev'");
 	
 	/*Restore Previous Result*/

 	$getPrevResult = $link->query("SELECT id FROM student_info WHERE sem_id='$sem' and level='$level'");
 	while(list($student_id) = $getPrevResult->fetch()){

 		$last_accumulated = $link->query("SELECT gpa,acas FROM last_acc WHERE student_id='$student_id'");
 		list($gp,$acas) = $last_accumulated->fetch();
 		
 		$sqle=$link->query("UPDATE student_info SET acas='$acas',cgpa='$gp' WHERE sem_id='$sem' AND level='$level' AND id='$student_id'");

 	}
 	
	

 	if($sql){

		 echo "<body onLoad='back()'></body>";

	} 

?>

<script>
function back(){

	alert("Reset Successful");
	window.location='choseway.php';

}

</script>