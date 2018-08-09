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
      	  if(isset($_POST['go'])){
			$sem=$_POST['sem'];
			$lev=$_POST['lev'];
			if(!empty($sem)  && !empty($lev)){
					
					$_SESSION['lev']=$lev;
					$_SESSION['sem']=$sem;
					header("location:choseway.php");
					
				
			}else{
				$ar[1]='Empty Field';	
					}
			}
		
		
		?>
        
        
<div id="page" class="w3-container">
	
	<div id="content" class="w3-margin-left w3-margin-right w3-row" style="display: flex; justify-content: center;">

		<div class="w3-col l5 m5 s12">
			
				<p style="text-align:center; font-size:16px; font-style:bold; color:red;"><?php echo @$ar[1]; echo @$ar[0]; ?></p>
				
                
                <form class="w3-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">

                <label>Semester</label><select class="w3-input" name="sem">
                <?php
                	$sql_sem 	=	$link->query("SELECT id,sem FROM semester");
					while(list($id,$sem) = $sql_sem->fetch()){
						
						echo "<option value='$id'>$sem</option>";
					
					}
				
				?>
                	</select><br>
                
                <label>Level</label> <select class="w3-input" name="lev">
                <?php
                	$sql_lev=$link->query("SELECT id,lenam FROM level");
					while(list($idr,$level)	=	$sql_lev->fetch()){

						echo "<option value='$idr'>$level</option>";
					
					}
				
				?>
                </select><br>
                
                	
                <p class="w3-center"><button class="w3-btn w3-red" type="submit" name="go">Enter</button></p>
				</form>
                
                
       </div>
	</div>
	
	<div style="clear: both;">&nbsp;</div>

</div>

<!-- end #page -->

	<?php  include_once('inc/foot.php'); ?>

<!-- end #footer -->
</div>

</body>
</html>
