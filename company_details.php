<?php 
//session_start();
include "connect.php";
//session_start();
//echo $_SESSION['name'];
 ?>

<!DOCTYPE HTML>
<html> 
<head>
	<title>Company_details</title>
     <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<header>
    <div class="menubar">
      
        <img src="css/logo.jpg" style="width: 100%; height: 100px;">
       <div class="menu" style="margin-top: -6px;">
          
          <ul>
          <li><a href="home.php">Home</a></li>
          <li><a href="reglog.html">Members Area</a></li>
          <li><a href="market.php">Marketplace</a></li>
          <li><a href="company_details.php">Company details</a></li>
          <!-- <li><a href="reglog.html">sign in or up</a></li> -->
    </ul>
      
       </div>
        
   </div>


</header>

<div name="company_detailsbd" align="center">
<div name="company_detailshd"><h1> Fill up to company_details </h1></div>




<form action="test.php" method="post">

company_details: <select name="company_name" id="company_name">

     <option value="Google">-----------</option>
	<?php 
	mysql_select_db("project_391");
	$mydata = mysql_query("SELECT * FROM company_details");
     while ($record = mysql_fetch_array($mydata)) {

     	?>
     	
     	<option value="<?php echo $record['name']; ?>"> <?php echo $record['name'];  ?></option>

     	<?php } ?>
     	

</select>

  


<input type="submit" value="company_details">
</form>

</div>
</body>


</html>