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

<body>
<div id="wrapper" class="w3-container" style="padding-left:0px; padding-right: 0px;">

	<?php  	include_once('inc/head.php'); ?>
	<hr />

    <?php
    
    	 $lev=$_SESSION['lev'];
	 	 $sem=$_SESSION['sem'];
		
                    $sql 	=	$link->query("SELECT * FROM semester WHERE id='$sem'");
						$rsem	=	$sql->fetch();
						$semester 	=	ucwords($rsem['sem']);
					
					$sqle 	= 	$link->query("SELECT * FROM level WHERE id='$lev'");
						$rlev 	= 	$sqle->fetch();
						$level=strtoupper($rlev['lenam']);
						
						
	?>
		
        
        
<div id="page" class="w3-container">
	
	<div id="content" class="w3-margin-left w3-margin-right w3-row" style="display: flex; justify-content: center;">

		<div class="w3-col l9 m12 s12" style="">
			<p><a class="w3-tag w3-grey w3-round" href="choseway.php" style="">Back</a></p>

			<h2 class="title">Student Info</h2>
			
			
				<p style="text-align:center; font-size:16px; font-style:bold; color:red;"><?php echo @$ar[1]; echo @$ar[0]; ?></p>
				<p style="margin-top:30px; margin-bottom:30px;text-align:center; font-size:16px; font-style:bold; color:red;"><?php echo '<b>'.$level.'>>'.$semester.'</b>'; ?></p>
                
               
                
                
                <table class="w3-table w3-striped" style="">

                <tr class="w3-green"><td>Matric no.</td><td>CGP or CGPA</td><td>Academic Classification</td><!--<td>Operation</td>--></tr>
                	
                	<tbody>
                    <?php
					

					$sqlee=$link->query("SELECT id,acas,cgpa,matricno FROM student_info WHERE level='$level' and sem_id='$sem'");
						while(list($ctid,$acas,$gp,$mat) = $sqlee->fetch()){
								
								$mat=strtoupper($mat);
								$acas=strtoupper($acas);
								
								
								echo "<tr class='w3-text-black'>
								
								<td><a class='w3-tag' href='interinsert.php?mid=$ctid'>$mat</a></td>
								<td>$gp</td>
								<td>$acas</td>";
								
								/**<td><a href='updstud.php?dar=$ctid' style='text-decoration:none;cursor:help;'><i class='fa fa-minus w3-text-red'></i>&nbsp;Delete</a> &nbsp; &nbsp; &nbsp;</td>**/
								
								echo "</tr>";
								
							}
						
							
					
					?>
                	
                	</tbody>
                </table>
                
                  	
               
                
				<?php
                	if(isset($_POST['go'])){
						$cos=$_POST['course'];
						$cod=$_POST['code'];
						$ut=$_POST['unit'];
						if(!empty($cos) and !empty($cod)){

							$sql_ins 	=	$link->prepare("INSERT INTO courses(lev_id,sem_id,name,code,unit) VALUES(?,?,?,?,?)");
							$exec_sql_ins 	=	$sql_ins->execute([$lev,$sem,$cos,$cod,$ut]);

							if($exec_sql_ins != FALSE ){

								echo "<body onload='sx()'></body>";
							
							}else{
							
								echo "<body onload='server()'></body>";
							
							}

						}else{
								echo "<body onload='empty()'></body>";
						}
					}
				
				$_SESSION['useinupdate']=$lev;
				?>
                
				<script>
					function empty(){
					
						alert("Empty Field(s)");
						window.location="regco.php";
					
					}
					
					function server(){
					
						alert("Server Error Retry!");
						window.location="regco.php";
					
					}
						
					function sx(){
					
						window.location='regco.php';
					
					}
				</script>
                
			
		</div>
        
	</div>
	<!-- end #content --><!-- end #sidebar -->
	<div style="clear: both;">&nbsp;</div>

	<p class="w3-center">
        	<a class="w3-btn w3-red" href="choseway.php" style="">Exit</a>
         	<a class="w3-btn w3-green" href="updater.php" style="">Update Record</a>
    </p>


</div>
<!-- end #page -->

	<?php 	include_once('inc/foot.php'); 	?>

<!-- end #footer -->
</div>
</body>
</html>
