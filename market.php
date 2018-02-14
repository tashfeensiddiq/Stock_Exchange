<?php 
include "connect.php";
?>



<!DOCTYPE html>
<html>


<head>

    <title>Market</title>

    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>





<body style="background-image: url(css/market.png)">

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


<div class="marketbd">
	<div id="buybd" >
    <div name="buyhd" align="center"><h1> Fill up information </h1></div>




			<form action="buy_sell.php" method="post">
			What do yoy want to do?      <select name="buy_sell" id="buy_sell">  
                  <option value="buy">Buy</option>
                  <option value="sell">Sell</option>
			      </select>  <br><br>
			Name: &nbsp&nbsp&nbsp&nbsp&nbsp  <input type="text" name="name" required><br><br>
			Password: <input type="password" name="password" required><br><br>
			Email: &nbsp&nbsp&nbsp&nbsp&nbsp <input type="email" name="mail" required><br><br>
			<!-- Id: <input type="number" name="id" min="0" required><br><br> -->
            Company: <select name="company_name" id="company_name">

				     <option value="Google">-----------</option>
					 <?php 
					 mysql_select_db("project_391");
					 $mydata = mysql_query("SELECT * FROM company_details");
				     while ($record = mysql_fetch_array($mydata)) {

				     	?>
				     	
				     	<option value="<?php echo $record['name']; ?>"> <?php echo $record['name']."---". $record['price'];  ?></option>

				     	<?php } 
				     	?>
				     	

				     </select>  <br><br>
            Amount:  &nbsp&nbsp&nbsp<input type="number" name="amount" min="0" required><br><br>
			<input type="submit" value="submit">
			</form>

    </div>



    
    </div>
</div>






</body>


</html>