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

	<?php  	include_once('inc/head.php'); ?>
	<hr />
		
        <?php
		//$mid=@$_GET['dart'];
      	if(isset($_POST['go'])){
		
			$sem=$_POST['sem'];
			$lev=$_POST['lev'];
			$ses=$_POST['session'];
			 
			 $nomal=$_SESSION['useinupdate'];
			 $l=$_SESSION['lev'];
	  		 $s=$_SESSION['sem'];
			
			$sqle=$link->query("SELECT * FROM level WHERE id='$lev'");
				
				$rlev = $sqle->fetch();
				$level=strtoupper($rlev['lenam']);

			$csqle=$link->query("SELECT * FROM level WHERE id='$l'");
				
				$crlev = $csqle->fetch();
				$cur_level=strtoupper($rlev['lenam']);
					
			if(!empty($sem)  && !empty($lev)){
					
					$acc = $link->query("SELECT id,cgpa,acas FROM student_info WHERE sem_id='$s' and level='$cur_level'");
					while(list($id,$gp,$acas) = $acc->fetch()){

						$xcv=$link->query("SELECT id FROM last_acc WHERE student_id='$id'");
						if($xcv->rowCount() == 0){
						
							$axc=$link->prepare("INSERT INTO last_acc VALUES(?,?,?)");
							$axc->execute([$id,$gp,$acas]);
						
						}else{

							$axc=$link->query("UPDATE last_acc SET gpa='$gp',acas='$acas' WHERE student_id='$id'");
						
						}
					}

					$rt=$link->query("UPDATE student_info SET sem_id='$sem',level='$level',session='$ses' WHERE sem_id='$s' and level='$level'");
					
					header("location:compda.php");
					
				
			}else{
				$ar[1]='Empty Field';	
			}
		}
		
		
		?>
        
        
<div id="page" class="w3-container">
	
	<div id="content" class="w3-margin-left w3-margin-right w3-row" style="display: flex; justify-content: center;">

		<div class="w3-col l8 m12 s12" style="">
		<p class=""><a href="compda.php" class="w3-tag w3-round" style="">Back</a></p>

			<h2 class="title">Update Student</h2>
			
			
				<p style="text-align:center; font-size:16px; font-style:bold; color:red;"><?php echo @$ar[1]; echo @$ar[0]; ?></p>
				<p style="margin-top:30px; margin-bottom:30px;"> </p>
                
                <form class="w3-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">

                	<label>New Semester</label><select class="w3-input" name="sem">
                	
                	<?php
                	
                	$sql_sem=$link->query("SELECT id,sem FROM semester");
					while(list($id,$sem) = $sql_sem->fetch()){
					
						echo "<option value='$id'>$sem</option>";
					
					}
				
					?>
                	</select>
                <br>
                
                <label>New Level</label> <select class="w3-input" name="lev">
                <?php
                	$sql_lev=$link->query("SELECT * FROM level");
					while(list($id,$level) = $sql_lev->fetch()){
						
						echo "<option value='$id'>$level</option>";
					
					}
				
				?>
                </select>
                <br>

                <label>New Session</label><select class="w3-input" name="session">
                	
                	<?php

                		for($i = 2017; $i<2035; $i++){

                			$c=$i;
                			$c++;

                			echo "<option value='{$i}/{$c}'>{$i}/{$c}</option>";

                		}
                	?>
                </select><br>
                	
                <p class="w3-center"><button class="w3-btn w3-red" type="submit" name="go">Enter</button></p>
				
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
