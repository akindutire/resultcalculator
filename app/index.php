<?php
session_start();
include_once 'conn.php';



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
<script type="text/javascript" src="js/boxOver.js"></script>

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
			
				<a href="adminpass.php" class="w3-blue w3-bar-item" style=""><i class="fa fa-home w3-text-white"></i>&nbsp;Home</a>
				<a href="logs.php" class="w3-red w3-bar-item"><i class="fa fa-plus"></i></a>
				
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
			$mat=$_POST['matric'];
			if(!empty($mat)){
				
				$sql=$link->query("SELECT * FROM student_info WHERE matricno='$mat'");
				
				if($sql->rowCount() == 1){

					$_SESSION['matric']=$mat;
					header("location:result.php");
				
				}else{
				
						$ar[0]='Data Not Found';
				}
				
			}else{
				
				$ar[1]='Empty Field';	
			}
		
		}
		
		
		?>
        
        
<div id="page" class="w3-container">
	
	<div id="content" class="w3-margin-left w3-margin-right" style="display: flex; justify-content: center;">

		<div class="post" style="width:300px;" class="w3-col l10 m9 s12">
			<h2 class="title">Check Result</h2>
			
			
				<p style="text-align:center; font-size:16px; font-style:bold; color:red;"><?php echo @$ar[1]; echo @$ar[0]; ?></p>
			    
                <form class="w3-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
              	  	<label>Matric No.</label> <input class="w3-input w3-border" type="text" name="matric" placeholder="ACP/HND/COM/15/5778" required><br>
                	<p class="w3-center"><button class="w3-btn w3-red" type="submit" name="go"> Check Result</button></p>
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
