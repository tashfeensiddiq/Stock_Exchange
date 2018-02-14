<?php
session_start();
$name = $_POST["name"];
$pass = $_POST["password"];
$mail = $_POST["mail"];
$con=mysqli_connect("localhost","root","","project_391") ;

if (mysqli_connect_error()) {
	# code...
	die("connection failed: ".mysqli_connect_error());

}
$sql="SELECT * FROM member WHERE name='$name' AND password='$pass' AND email='$mail'";
$result=mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);

if (mysqli_num_rows($result)>0) {
	//session_start();
    $_SESSION["name"]=$name;
    echo "success";
    echo "<br>"."<br>";
   // echo "<h3>for course selection click here</h3><br>"."<a href='course.php' style='text-decoration:none;'>"."   courseselect"."</a></p><br>";
    header("refresh:3;url=user_profile.php");
	
}
else
{
	//header("Location:login.html");
	echo "<div align='center'><h1>No such member</h1>
    <h3>redirecting in 3 seconds</h3>

	</div>";
	header( "refresh:3;url=home.php" );
}
mysqli_close($con);
?>