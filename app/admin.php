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
			
			$pin=$_POST['pn'];
			if(!empty($pin)){
				
				try{

					
					$sql=$link->prepare("SELECT * FROM adata WHERE pin=?");
					$sql->execute([$pin]);
				
					throw new PDOException("Error Processing Request", 1);
					
				}catch(PDOException $e){
					$e->getmessage();
				}



				if($sql->rowCount()==1){
				
					$rd=rand(1,90);
					$_SESSION['p']=$rd;
					header("location:adminpass.php");
				
				}else{
				
					$ar[0]='Pin Incorrect';
				
				}
				
			}else{
				
				$ar[1]='Empty Field';	
				
			}
		
		}
		
		
		?>
        
        
<div id="page" class="w3-container">
	
	<div id="content" class="w3-margin-left w3-margin-right" style="display: flex; justify-content: center;">

		<div class="post" class="w3-col l9 m9 s12">
			
			<!--<h2 class="title">Admin Password</h2>-->
			
			
				<p style="text-align:center; font-size:16px; font-style:bold; color:red;"><?php echo @$ar[1]; echo @$ar[0]; ?></p>
				
                
                <form class="w3-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
	            
	                <label class="">Password</label><input class="w3-input" type="text" name="pn" placeholder="4367364"><br>
	                <p class="w3-center"><button type="submit" name="go" class="w3-btn w3-red">Enter</button></p>
				
				</form>
                
                
			
		</div>
	</div>
	<!-- end #content --><!-- end #sidebar -->
	<div style="clear: both;">&nbsp;</div>
</div>
<!-- end #page -->

	<?php include_once('inc/foot.php');  ?>
	
<!-- end #footer -->
</div>
</body>
</html>
