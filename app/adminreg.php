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
<script>
function conf(){
	
	var ckeck=confirm("Are You Sure Want To Delete This Course");
	if(check==true){
		window.location='del.php';
	}else{
		return false;
		}
	}
</script>
<body>
<div id="wrapper" class="w3-container" style="padding-left:0px; padding-right: 0px;">

	<header>

		<div class="w3-bar w3-green" style="border-bottom: 1px solid green;">
			
				<a href="admin.php" class="w3-blue w3-bar-item" style=""><i class="fa fa-home w3-text-white"></i>&nbsp;Home</a>
				
				
			</ul>
		</div>
		<!-- end #menu -->
		
		<div style="display: flex; justify-content: center;">
			<img src="images/img03.jpg">
		</div>	

	</header>
	<hr>	
		
       
        
        
<div id="page" class="w3-container">
	
	<div id="content" class="w3-margin-left w3-margin-right w3-row" style="display: flex; justify-content: center;">

		<div class="w3-col l5 m5 s12">

			<h2 class="title">Register Users</h2>
			
		
				<p style="text-align:center; font-size:16px; font-style:bold; color:red;"><?php echo @$ar[1]; echo @$ar[0]; ?></p>
				<p style="margin-top:30px; margin-bottom:30px;text-align:center; font-size:16px; font-style:bold; color:red;">Administrators</p>
 
 
 					
                
                
                <table class="w3-table">
                <tr><th>Name</th><th>Rank</th></tr>
                	<tbody class="w3-text-black">
                    <?php
					$sqlee=$link->query("SELECT * FROM adata");
						while($real_fetch=$sqlee->fetch()){

								$cm=strtoupper($real_fetch['name']);
								$cd=strtoupper($real_fetch['rank']);
								
								echo "<tr>
								
								<td>$cm</td>
								<td>$cd</td>
								
								</tr>";
								
							}
						
					
				 	 
					?>
                	
                	</tbody>
                </table>
                
                <hr>
                
                  	
                <form class="w3-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                
                	<label>Name </label><input class="w3-input" type="text" name="name"  required><br>
                 	<label>Rank</label><select class="w3-input" name="rank">
                 
                 		<option value="Senior Lecturer">Senior Lecturer</option>
                  		<option value="Junior Lecturer">Junior Lecturer</option>
                 	</select><br>

                 
                 	<label>Pin </label><input class="w3-input" type="password" name="pass" required><br>

	                <p class="w3-center"> <button class="w3-btn w3-red" type="submit" name="go">Add</button></p>
				</form>
                
				<?php
                	if(isset($_POST['go'])){
						$rank=$_POST['rank'];
						$pin=$_POST['pass'];
						$name=$_POST['name'];
						if(!empty($rank) and !empty($pin) and !empty($name)){
							$sql_ins=$link->query("INSERT INTO adata(name,rank,pin) VALUES('$name','$rank','$pin')");
							if($sql_ins==true){
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
						window.location="adminreg.php";
						}
					function server(){
						alert("Server Error Retry!");
						window.location="adminreg.php";
						}
						
					function sx(){
						window.location='adminreg.php';
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
