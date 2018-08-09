		<?php
		session_start();
		include 'conn.php';
				
					if(@$_GET['da']){
						$da=$_GET['da'];
						$mda=$link->query("DELETE FROM courses WHERE id='$da'");
						$sda=$link->query("DELETE FROM sdata WHERE course_id='$da'");
						unset($_SESSION['del']);
						echo "<body onload='sx()'></body>";
					
						}
                        ?>
                        <script>
						function sx(){
							alert("Successful Deleted");
						window.location='regco.php';
						}
						</script>