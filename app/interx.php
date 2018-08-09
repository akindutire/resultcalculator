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
				<a href="result.php" class="w3-blue w3-bar-item" style=""><i class="fa fa-arrow-left w3-text-white"></i>&nbsp;Back</a>
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

      	if(isset($_POST['go'])){
			
			$sem=$_POST['sem'];
			$lev=$_POST['lvl'];
			if(!empty($sem)  && !empty($lev)){
					
					$_SESSION['levi']=$lev;
					$_SESSION['semi']=$sem;
					header("location:otherresult.php");
					
				
			}else{
				$ar[1]='Empty Field';	
			}
		}
		
		
		?>
        
        
<div id="page" class="w3-container">
	
	<div id="content" class="w3-margin-left w3-margin-right" style="display: flex; justify-content: center;">

		<div class="w3-col l5 m6 s12">

			<h2 class="title">Other Semester, Level Result</h2>
			
				<p style="text-align:center; font-size:16px; font-style:bold; color:red;"><?php echo @$ar[1]; echo @$ar[0]; ?></p>
				<p style="margin-top:30px; margin-bottom:30px;"> </p>
                
                <form class="w3-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                	
                	<label>Semester</label><select class="w3-input" name="sem">
                	
                	<?php

                	$sql_sem=$link->query("SELECT * FROM semester");
					while($v_sql 	= 	$sql_sem->fetch()){
						$idt=$v_sql['id'];
						$sem=$v_sql['sem'];
						echo "<option value='$idt'>$sem</option>";
					}
				
					?>
                	</select>
                	<br>
                
                	<label>Level</label><select class="w3-input" name="lvl">
                
                	<?php
                	
                	$sql_le=$link->query("SELECT * FROM level");
					while($v_sqel 	= 	$sql_le->fetch()){
						
						$id=$v_sqel['id'];
						$lev=$v_sqel['lenam'];
						echo "<option value='$id'>$lev</option>";
						
					}
				
					?>
                	</select>
                	<br>

                	
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
