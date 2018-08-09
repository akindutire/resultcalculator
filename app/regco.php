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
						$level 	= 	ucwords($rlev['lenam']);
						
	?>
		
        
<div id="page" class="w3-container">
	
	<div id="content" class="w3-margin-left w3-margin-right w3-row" style="display: flex; justify-content: center;">

		<div class="w3-col l6 m12 s12" style="">

        	<p class=""><a href="choseway.php" class="w3-tag w3-round" style="">EXIT</a></p>

			<h2 class="title">Register Course</h2>
			
			
				<p style="text-align:center; font-size:16px; font-style:bold; color:red;"><?php echo @$ar[1]; echo @$ar[0]; ?></p>
				<p style="margin-top:30px; margin-bottom:30px;text-align:center; font-size:16px; font-style:bold; color:red;"><?php echo '<b>'.$level.'>>'.$semester.'</b>'; ?></p>
                
               
                
                
                <table class="w3-table w3-striped" style="">

                <tr class="w3-green"><td>Course</td><td>Code</td><td>Units</td><td>Operation</td></tr>
                	<tbody>

                    <?php
					$total = null;
					$sqlee=$link->query("SELECT * FROM courses WHERE lev_id='$lev' and sem_id='$sem'");
						while(list($ctid,$level,$sem,$cm,$cd,$cu)=$sqlee->fetch()){
								
								$cd 	=	 strtoupper($cd);
								$cm 	=	 strtoupper($cm);

								$total+=$cu;
								$arr[0]=$total;
								echo "<tr class='w3-text-black'>
								
								<td>$cm</td>
								<td>$cd</td>
								<td>$cu</td>
								
								<td><a href='del.php?da=$ctid' style='text-decoration:none;cursor:help;'><i class='fa fa-minus w3-text-red'></i>&nbsp;Delete</a> &nbsp; &nbsp;<a style='text-decoration:none;'href='updcos.php?eda=$ctid'><i class='fa fa-pencil w3-text-blue'></i>&nbsp;Update</a></td>
								</tr>";
								
							}
						echo 	"<tr><td></td><td></td><td>"; ?><?php echo @$arr[0];?><?php echo "</td><td></td></tr>";
					
				 	 
					?>
                	
                	</tbody>
                </table>
                
                  <hr>	
                  <div style="display: flex; justify-content: center;">

		                <form class="w3-form w3-col l5 m6 s12" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
		                	
		                	<label>Course </label><input class="w3-input" type="text" name="course"  required><br>

		                 	<label>Course Code</label><input class="w3-input" type="text" name="code" required><br>

		                  	<label>Unit </label><input class="w3-input" type="number" min="0" name="unit" required><br>

		                	<p class="w3-center"><button type="submit" name="go" class="w3-btn w3-red">Add</button></p>
						
						</form>
		            </div>    
				<?php
                	if(isset($_POST['go'])){
						
						$cos=$_POST['course'];
						$cod=$_POST['code'];
						$ut=$_POST['unit'];
						
						if(!empty($cos) and !empty($cod)){
							$lev = $_SESSION['lev'];
							$sem = $_SESSION['sem'];

							$unknown = $link->query("SELECT * FROM sdata WHERE cur_lev='$lev' and cur_sem='$sem'"); 
 							if($unknown->rowCount() == 0){
							
							$sql_ins 	=	$link->prepare("INSERT INTO courses(lev_id,sem_id,name,code,unit) VALUES(?,?,?,?,?)");
							$exec_sql_ins 	=	$sql_ins->execute([$lev,$sem,$cos,$cod,$ut]);

							if($exec_sql_ins != FALSE ){

								echo "<body onload='sx()'></body>";
							
							}else{
							
								echo "<body onload='server()'></body>";
							
							}
								
						}else{
							
							echo "<body onload='cktab()'></body>";
							
						}
							
					}else{
						echo "<body onload='empty()'></body>";
					}
				}


				?>
                
				<script>
					function cktab(){
					
						alert("You Cannot Add New Courses After Compiling A Result");
						window.location="regco.php";
					
					}
					
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


	<div style="clear: both;">&nbsp;</div>
	
	<hr>

	

</div>

<!-- end #page -->
	
	<?php 	include_once('inc/foot.php'); ?>

<!-- end #footer -->

</div>
</body>
</html>
