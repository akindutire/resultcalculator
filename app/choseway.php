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

<script>
	function conf(){
		var conf=confirm("Notice:  After Compilation You Can't Add New Courses");
		if(conf==true){
			window.location='compda.php';
		}else{
			return false;
		}
	}

	function confreset(){
		var conf=confirm("Resetting Will Erase All Exam and CA Scores");
		if(conf==true){
			window.location='deletecomputation.php';
		}else{
			return false;
		}
	}


</script>
<body>
<div id="wrapper" class="w3-container" style="padding-left:0px; padding-right: 0px;">

	<?php  	include_once('inc/head.php'); ?>
	<hr />

	<!-- end #logo -->
<!-- end #header-wrapper -->
	
        
<div id="page" class="w3-container">
	
	<div id="content" class="w3-margin-left w3-margin-right w3-row" style="display: flex; justify-content: center;">

		<div class="w3-col l6 m12 s12">

				<p><a href="adminpass.php" class="w3-tag w3-round w3-grey"><i class="fa fa-arrow-left"></i>&nbsp;Back</a></p>
				<p style="text-align:center; font-size:16px; font-style:bold; color:red;"><?php echo @$ar[1]; echo @$ar[0]; ?></p>
				
                
               <div class="w3-bar" style="margin-bottom: 110px; margin-top: 110px;">
               	
               		<a href='regco.php' class="w3-bar-item w3-btn w3-green"><i class="fa fa-plus"></i>&nbsp;Register Course</a>

               		<a onclick='conf()' class="w3-bar-item w3-btn w3-green w3-margin-left"><i class="fa fa-cogs"></i>&nbsp;Compute Result</a>

               		<a onclick="confreset()" class="w3-bar-item w3-btn w3-green w3-margin-left"><i class="fa fa-refresh"></i>&nbsp;Reset Computed Result</a>

               </div>

               
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
