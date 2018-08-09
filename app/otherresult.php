<?php

	session_start();
	include 'conn.php';
	
	if(empty($_SESSION['matric'])){

		header("location:index.php");
	
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--


-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Menu</title>
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
<body>
<div id="wrapper" class="w3-container" style="padding-left:0px; padding-right: 0px;">

	<header>

		<div class="w3-bar w3-green" style="border-bottom: 1px solid green;">
			
				<a href="result.php" class="w3-blue w3-bar-item" style=""><i class="fa fa-home w3-text-white"></i>&nbsp;Home</a>
				<a href="interx.php" class="w3-blue w3-bar-item" style=""><i class="fa fa-arrow-up w3-text-white"></i>&nbsp;Back</a>
				<a href="out.php" class="w3-red w3-bar-item"><i class="fa fa-sign-out"></i> Logout</a>
				
			</ul>
		</div>
		<!-- end #menu -->
		
		<div style="display: flex; justify-content: center;">
			<img src="images/img03.jpg">
		</div>	

	</header>
	<hr>		
		
        <?php
      	$lev=$_SESSION['levi'];
		$sem=$_SESSION['semi'];
		$rid=$_SESSION['ridi'];
		
		
		$sql_semester=$link->query("SELECT * FROM semester WHERE id='$sem'");
			$as=$sql_semester->fetch();
			$sm=$as['sem'];
		$sqle=$link->query("SELECT * FROM level WHERE id='$lev'");
						$rlev=$sqle->fetch();
						$level=strtoupper($rlev['lenam']);	
						
		?>
        
        
<div id="page" class="w3-container">
	
	<div id="content" class="w3-margin-left w3-margin-right" style="display: flex; justify-content: center;">

		<div class="w3-col l9 m9 s12">

			<h2 class="title">Others Semester</h2>
			
			
				<p style="text-align:center; font-size:16px; font-style:bold; color:red;"><?php echo @$ar[1]; echo @$ar[0]; ?></p>
				<p style="margin-top:30px; margin-bottom:30px;text-align:center; font-size:16px; font-style:bold; color:red;"><b><?php echo $level.'&nbsp;>>'.$sm; ?> </b></p>
               
                
                
                

                <table class="w3-table">

                <tr><th>Course</th><th>Code</th><th>Grade</th><th>Unit</th></tr>
                	
                	<tbody class="w3-text-black">
                    <?php
					
					$sqlee=$link->query("SELECT * FROM sdata WHERE cur_lev='$lev' and cur_sem='$sem' and student_id='$rid'");
						
						$totalscoregrade = null;
						$totalunit = null;

						while($real_fetch=$sqlee->fetch()){

								$cosr=strtoupper($real_fetch['title']);
								$costid=($real_fetch['course_id']);
								
								$sql_fetch_cos_codes=$link->query("SELECT * FROM courses WHERE id='$costid'");
								while($real_fetch_cos_codes=$sql_fetch_cos_codes->fetch()){
								
								
								$cos_code=strtoupper($real_fetch_cos_codes['code']);
								$grade=strtoupper($real_fetch['grade']);
								$unit=strtoupper($real_fetch['unit']);
								$ctid=$real_fetch['id'];
								$scoregrade=($real_fetch['scoregrade']);
								@$totalscoregrade+=$scoregrade;
								$arr[0]=$totalscoregrade;
								@$totalunit+=$unit;
								$arr[1]=$totalunit;
								
								echo "<tr>
								
								<td><a>$cosr</a></td>
								<td><a>$cos_code</a></td>
								
								<td>$grade</td>
								<td>$unit</td>
								
								
								</tr>";
								}
							}
						
					@$arr[0];
					@$arr[1];
					@$cgpa[2]=$arr[0]/$arr[1];
					$df=round($cgpa[2],2);
					echo "<tr>
								<td></td>
								<td></td>
								<td><a><b style='color:red; font-size:19px; font-family:Consolas;'>CGP</b></a></td>
								<td><a><b style='color:red; font-size:19px; font-family:Consolas;'>$df</b></a></td>
								
								
								</tr>";
					
					?>
                	
                	</tbody>
                </table>

                <form>
                    <p class="w3-center"><button type="submit" class="w3-btn w3-red" onclick="window.print()">Print</button></p>
                </form>

                
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
