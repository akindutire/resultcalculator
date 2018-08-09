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
						$rlev 	= 	$sqle->fetch();;
						$level 	= 	ucwords($rlev['lenam']);


            			$er 	= 	@$_GET['eda'];
						$sql_select		= 	$link->query("SELECT * FROM courses WHERE id='$er'");
						$assoc_sel 	= 		$sql_select->fetch();						
						
						?>
		
        
        
<div id="page" class="w3-container">
	
	<div id="content" class="w3-margin-left w3-margin-right w3-row" style="display: flex; justify-content: center;">

		<div class="w3-col l6 m12 s12" style="">
		<p><a href="regco.php" class="w3-tag w3-round w3-grey"><i class="fa fa-arrow-left"></i>&nbsp;Back</a></p>
			<h2 class="title">Update Course</h2>
			
				<p style="text-align:center; font-size:16px; font-style:bold; color:red;"><?php echo @$ar[1]; echo @$ar[0]; ?></p>
				<p style="margin-top:30px; margin-bottom:30px;text-align:center; font-size:16px; font-style:bold; color:red;"><?php echo '<b>'.$level.'>>'.$semester.'</b>'; ?></p>

         
                  	
                <form class="w3-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">

                	<label>Course </label><input class="w3-input" type="text" name="course" value="<?php echo $assoc_sel['name']; ?>" required><br>

                 	<label>Course Code</label><input class="w3-input" type="text" name="code" value="<?php echo $assoc_sel['code']; ?>" required><br>
                  	
                  	<label>Unit </label><input class="w3-input" type="number" min="0" name="unit" value="<?php echo $assoc_sel['unit']; ?>" required><br>
                	
                	<p class="w3-center"><button class="w3-btn w3-red" type="submit" name="go">Update</button></p>
				
				</form>
                
				<?php
                
                	if(isset($_POST['go'])){
						$cos=$_POST['course'];
						$cod=$_POST['code'];
						$ut=$_POST['unit'];
						
						if(!empty($cos) and !empty($cod) and !empty($er)){
							
						$rha=$link->query("UPDATE courses SET name='$cos',code='$cod',unit='$ut' WHERE id='$er'");

							if($rha!= 	FALSE){
								
								echo "<body onload='sx()'></body>";
							
							}else{

								echo "<body onload='server()'></body>";
							
							}
						}else{
							echo "<body onload='empty()'></body>";
						}
					}
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
</div>
<!-- end #page -->

	<?php include_once('inc/foot.php'); ?>

<!-- end #footer -->
</div>
</body>
</html>
