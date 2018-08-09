<?php
	
	session_start();
	include_once 'conn.php';
	if(empty($_SESSION['p'])){
		
		header("location:admin.php");
	
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--


-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Student Result</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>

	

<style>

	@import "css/style.css";
	@import "css/forms.css";
	@import "css/w3.css";
	@import "css/font-awesome/css/font-awesome.min.css";


</style>


<script src="js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="js/jquery.tooltip.js"></script>
<script type="text/javascript" src="js/pop.js"></script>

<script>	
    
    $('.post .entry').tooltip({ 
    track: true, 
    delay: 0, 
    showURL: false, 
    showBody: " - ", 
    fade: 250 
	});

</script>

<form name="miami">

		<input type="hidden" name="poper" value="<?php echo $_SESSION['popped']; ?>" />

</form>
    
<body>

<div id="wrapper" class="w3-container" style="padding-left:0px; padding-right: 0px;">

	<?php  	include_once('inc/head.php'); ?>
	<hr />
		
        <?php
		  
		  $mat=$_SESSION['moid'];
	      $lev=$_SESSION['lev'];
		  $sem=$_SESSION['sem'];
					
			$sqlmt 		= 	$link->query("SELECT * FROM student_info WHERE id='$mat'");
				$rmt 	=	$sqlmt->fetch();
				$rmat=strtoupper($rmt['matricno']);
           
            $sql 	= 	$link->query("SELECT * FROM semester WHERE id='$sem'");
				$rsem 	=  $sql->fetch();
				$semester 	= 	ucwords($rsem['sem']);

			$sqle 	= 	$link->query("SELECT * FROM level WHERE id='$lev'");
				$rlev 	= 	$sqle->fetch();
				$level 	= 	strtoupper($rlev['lenam']);
			 
		?>
		
        
        
<div id="page" class="w3-container">
	
	<div id="content" class="w3-margin-left w3-margin-right w3-row" style="display: flex; justify-content: center;">

		<div class="w3-col l8 m8 s12">

			<p><a class="w3-tag w3-grey w3-round" href="compda.php">Back</a></p>

			<h2 class="title">Compute Score and Grade</h2>
			
				<p style="text-align:center; font-size:16px; font-style:bold; color:red;"><?php echo @$ar[1]; echo @$ar[0]; ?></p>
				<p style="margin-top:30px; margin-bottom:30px;text-align:center; font-size:16px; font-style:bold; color:red;"><?php echo '<b>'.$level.'>>'.$semester.'&nbsp;&nbsp;('.$rmat.')</b>'; ?></p>
                
               
                
                
                <table class="w3-table w3-border" style="">

                <tr class="w3-green"><td>Course</td><td>Exam</td><td>CA</td><td>Grade</td><td>Unit</td><td>Operation</td></tr>

                	<tbody>
                
                    <?php
					
						$sqlee 	= 	$link->query("SELECT * FROM sdata WHERE cur_lev='$lev' and cur_sem='$sem' and student_id='$mat'");
						
						while($real_fetch 	= 	$sqlee->fetch()){

								$cosr=strtoupper($real_fetch['title']);
								$costid=($real_fetch['course_id']);
								$exam=strtoupper($real_fetch['exam']);
								$ca=strtoupper($real_fetch['ca']);
								$grade=strtoupper($real_fetch['grade']);
								$unit=strtoupper($real_fetch['unit']);
								$ctid=$real_fetch['id'];
								$scoregrade=($real_fetch['scoregrade']);
								
								echo "<tr class='w3-text-black w3-border'>
								
									<td class='w3-border'><a>$cosr</a></td>
									<td class='w3-border'>$exam</td>
									<td class='w3-border'>$ca</td>
									<td class='w3-border'>$grade</td>
									<td class='w3-border'>$unit</td>
									
									<td> <a id='LinkPopulateCourseId' style='text-decoration:none;' data-each='$ctid'><i class='fa fa-refresh'></i>&nbsp;Update</a></td>

								</tr>";
								
							}
						
					
					
					if(isset($_POST['savegp'])){

						$totalscoregrade = null;
						$totalunit =	null;


						$sql_gp 	= 	$link->query("SELECT * FROM sdata WHERE student_id='$mat'");
						while($assoc_gp 	= 	$sql_gp->fetch()){

								$uniti=strtoupper($assoc_gp['unit']);
								
								$scoregradei=($assoc_gp['scoregrade']);
								@$totalscoregrade+=$scoregradei;
								$arr[0]=$totalscoregrade;
								@$totalunit+=$uniti;
								$arr[1]=$totalunit;
								

						}
						
						$cgpa[2] 	= 	($arr[0]/$arr[1]);
						$rounded_gp = round($cgpa[2],2);

						$val 	= 	sprintf('%0.2f',$rounded_gp);

						$sql_update_cgpa 	= 	$link->query("UPDATE student_info SET cgpa='$val' WHERE id='$mat'");
						$sql_classification 	= 	$link->query("SELECT * FROM cgpa WHERE fromi<='$val' and toi>='$val'");
						
						$assoc_clas 	= 	$sql_classification->fetch();
						$classaca 	= 	$assoc_clas['name'];
						
						$sql_update_class 	= 	$link->query("UPDATE student_info SET acas='$classaca' WHERE id='$mat'");
						echo "<body onload='ux()'></body>";
						
					}
					
					?>
                	
                	</tbody>
                </table>
                
                  	
               	<form class="w3-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
               
               		<p class="w3-center"><button class="w3-btn w3-red" type="submit" name="savegp">Save CGP/CGPA</button></p>
               
               	</form>
                
				
                <div id="DialogUpdateResult" class="w3-modal" style="">

                	<div class="w3-modal-content w3-white w3-animate-zoom" style="height: 70%; width: 45%;">
	                	
	                	<a onclick="document.getElementById('DialogUpdateResult').style.display='none'" class="w3-btn w3-red w3-text-white w3-right">&times;</a>
						<hr>
	                	<h2 class="w3-center">Update Score</h2>
	                	<div class="w3-container">

		                 	<form class="w3-form w3-margin" id="UpdateResultForm" action="stream/updateScore.php" method="post">
		                		
		                		<p id="feedback"></p>

		                		<label class="w3-text-white">Exam Score </label><input class="w3-input w3-border w3-round" type="number" min="0" name="exam" autofocus required><br>
		                		<label class="w3-text-white">CA</label><input class="w3-input w3-border w3-round" type="number"  min="0"  name="ca" required><br>
		                  
		                		<p class="w3-center"><button id="btnUpdateResultForm" class="w3-btn w3-green" type="submit" name="update">Update</button></p>
		               
							</form>
						
						</div>
					</div>
				</div>
                

                <?php
				?>
                
	      		<script>
					
					function figsig(){
					
						
						window.location="compeach.php";
					
					}
						
					function empty(){
					
						alert("Empty Field(s)");
						window.location="compeach.php";
					
					}
					
					function server(){
					
						alert("Server Error Retry!");
						window.location="compeach.php";
					
					}
						
					function sx(){
					
						window.location='compeach.php';
					
					}
					
					function ux(){
						
						alert("Updated");
						window.location='compeach.php';
					
					}
				
				</script>
                

			
		</div>
	</div>
	<!-- end #content --><!-- end #sidebar -->
	<div style="clear: both;">&nbsp;</div>
</div>
<!-- end #page -->

	<?php include_once('inc/foot.php'); ?>

<!-- end #footer -->
</div>

</body>
</html>
        
           