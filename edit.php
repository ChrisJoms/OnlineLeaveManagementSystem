<?php
include('inc/config.php'); 
$sql = "UPDATE FROM leaves WHERE id='" . $_GET["id"] . "'";

$run = mysqli_query($con,$sql);

if($run == true){
			
    echo "<script> 
            alert('User Deleted');
            window.open('dashboard.php','_self');
          </script>";
}else{
    echo "<script> 
    alert('Failed to delete');
    </script>";
}

mysqli_close($con);
?>