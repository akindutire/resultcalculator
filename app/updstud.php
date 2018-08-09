		<?php
		session_start();
		include 'conn.php';
				
					if(@$_GET['dar']){
						$da=$_GET['dar'];
						$mda=$link->query("DELETE FROM student_info WHERE id='$da'");
						
						unset($_SESSION['del']);
						echo "<body onload='sx()'></body>";
					
						}
                        ?>
                        <script>
						function sx(){
							alert("Successful Deleted");
						window.location='compda.php';
						}
						</script>