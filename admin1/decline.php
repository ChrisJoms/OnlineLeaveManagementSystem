<?php
	include'inc/config.php'; 
	if (isset($_POST['declined'])){
		$decid = $_POST['decid'];
		$sql = "UPDATE leaves SET status='2' WHERE id = '$decid'";
		$run = mysqli_query($con,$sql);
		if($run == true){
			
			echo "<script> 
					alert('Application Leave Has Been Declined');
					window.open('dashboard.php','_self');
				  </script>";
		}else{
			echo "<script> 
			alert('Failed To declined');
			</script>";
		}
	}
	
 ?>