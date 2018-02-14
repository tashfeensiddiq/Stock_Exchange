<?php
$name = $_POST["name"];
$pass = $_POST["password"];
$mail = $_POST["mail"];

$con=mysqli_connect("localhost","root","","project_391") ;

if (mysqli_connect_error()) {
	# code...
	die("connection failed: ".mysqli_connect_error());

}
$sql = "INSERT INTO member(name,password,email)"."VALUES ('$name', '$pass', '$mail' )";
$sql2="INSERT INTO user_account(name,balance,recent_buy,recent_sell)"."VALUES ('$name','100000.00','N/A','N/A')";
if (mysqli_query($con, $sql)) {
	if(mysqli_query($con, $sql2)){
    echo "New record created successfully";
    echo "<br>";
    // echo "for login click here <br>"."<a href='login.html' style='text-decoration:none;'>"."login"."</a></p><br>";
}
}


else {
	# code...
	echo "Error: " . $sql . "<br>" . mysqli_error($con);
	echo "Error: " . $sql2 . "<br>" . mysqli_error($con);
}
mysqli_close($con);
//header('Location:welcome.html');
?>













