<?php 
include "connect.php";

$name=$_POST["u_name"];


$sql=mysql_query("DELETE from member WHERE name='$name'");
$sql2=mysql_query("DELETE from user_account WHERE name='$name'");

echo "<div align='center'><h1>success</h1>
    <h3>redirecting in 3 seconds</h3>

	</div>";
	header( "refresh:3;url=admin_panel.php" );

 ?>