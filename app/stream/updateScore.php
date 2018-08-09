<?php

	include_once('../conn.php');

	$exam 	=	strip_tags($_POST['exam']);
	$ca 	= 	strip_tags($_POST['ca']);
	$line 	= 	strip_tags($_POST['courseid']);

	if (!empty($exam) && !empty($ca)) {
		
		if (!ctype_digit($exam) && !ctype_digit($ca)) {
		
			$exam	=	(int)$exam;
			$ca	=	(int)$ca;
		}

		$sql_updates 	= 	$link->query("UPDATE sdata SET exam='$exam',ca='$ca' WHERE id='$line'");
							
			if($sql_updates != FALSE){

				$sql_select_p = $link->query("SELECT * FROM sdata WHERE id='$line'");
				$fetch_data 	= 	$sql_select_p->fetch();
				
				$score 	= 	($fetch_data['exam'])+($fetch_data['ca']); 
				
					if($score <= 100){
						
						$sql_update_scores	=  	$link->query("UPDATE sdata SET score='$score' WHERE id='$line'");
						
						$sql_check_score 	=	 $link->query("SELECT eq_grade FROM markrange WHERE fromi<='$score' and toi>='$score'");
						$grade_assoc 	= 	 $sql_check_score->fetch();
						$grade_name=$grade_assoc['eq_grade'];
						
						$sql_update_grades 	= 	$link->query("UPDATE sdata SET grade='$grade_name' WHERE id='$line'");
						
						$sql_check_point	=	 $link->query("SELECT point FROM grade WHERE name='$grade_name'");
						$point_assoc 	= 	$sql_check_point->fetch();
						$point_val 	=	 $point_assoc['point'];
						
						$sql_cos_unit 	= 	$link->query("SELECT unit FROM sdata WHERE id='$line'");
						$fetch_cos_unit 	= 	$sql_cos_unit->fetch();
						$cos_unit 	= 	$fetch_cos_unit['unit'];
						
						$scoregrade 	= 	($cos_unit)*($point_val);
							
							$sql_update_cumulative 	= 	$link->query("UPDATE sdata SET scoregrade='$scoregrade' WHERE id='$line'");
							echo "ok";
						
					}else if($score>100){
						
						$sql_updates 	= 	$link->query("UPDATE sdata SET exam='0',ca='0' WHERE id='$line'");
						echo "bad";
					
					}
					
					
			}else{
				echo "Server Error";
			}
		



	}else{

		$exam = 0; 
		$ca =0;
	}
?>