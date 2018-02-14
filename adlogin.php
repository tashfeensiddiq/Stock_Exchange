<?php
$name = $_POST["name"];
$pass = $_POST["password"];
$con=mysqli_connect("localhost","root","","project_391") ;

if (mysqli_connect_error()) {
	# code...
	die("connection failed: ".mysqli_connect_error());

}
$sql="SELECT * FROM admin WHERE name='$name' AND password='$pass'";
$result=mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);

if (mysqli_num_rows($result)>0) {
	# code...
	session_start();
    $_SESSION["name"]=$row['name'];
    echo "<div align='center'><h1>success</h1>
    <h3>redirecting in 3 seconds</h3>

    </div>";
    header( "refresh:3;url=admin/admin_panel.php" );
    //header('Location:test.php');
	
}
else
{
	//header("Location:login.html");
	echo "<div align='center'><h1>invalid login</h1>
    <h3>redirecting in 3 seconds</h3>

    </div>";
    header( "refresh:3;url=home.php" );
}
mysqli_close($con);
?>