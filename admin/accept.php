<?php 
include "connect.php";
 

$c_name = $_POST["c_name"];
$c_tag = $_POST["tag"];
$summary = $_POST["summary"];



$sql=mysql_query("INSERT INTO `company_details`(`name`,  `c_symbol`, `description`) VALUES ('$c_name','$c_tag','$summary')");
if (!$sql) {
	# code...
	echo mysql_error();
}

else{
	echo "<div align='center'><h1>success</h1>
    <h3>redirecting in 3 seconds</h3>

	</div>";
	header( "refresh:3;url=admin_panel.php" );
}



 ?>