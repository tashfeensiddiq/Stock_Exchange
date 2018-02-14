<?php
include "connect.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="css/style.css">

	<style>
			#customers {
			    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
			    
			    border-collapse: collapse;
			}

			#customers td, #customers th {
			    font-size: 1em;
			    border: 1px solid #98bf21;
			    padding: 3px 7px 2px 7px;
			}

			

			#customers tr td.alt {
			    color: #000000;
			    background-color: #EAF2D3;
			}
     </style>
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

    <div class='buy_table' align="center" >
        
       <h3>buy table</h3>  
	<?php 
        include "connect.php";
	
		$query = "SELECT * FROM u_buy_sell WHERE buy_amount !='0' ORDER BY date,time "; //You don't need a ; like you do in SQL
		$result = mysql_query($query);
        echo mysql_error();
		echo "<table class='show' id='customers'>"; // start a table tag in the HTML
		echo "<tr><td class='alt'>"."NAME"."</td><td>"."Company"."</td><td class='alt'>"."Amount"."</td><td>"."Price"."</td><td class='alt'>"."balance"."</td><td>"."Date"."</td><td class='alt'>"."Time"."</td></tr>";
		while($row = mysql_fetch_array($result)){ 
		echo mysql_error();  //Creates a loop to loop through results
		echo "<td class='alt'>" . $row['name'] . "</td><td>" . $row['buy_name'] ."</td><td class='alt'>".$row['buy_amount']."</td><td>".$row['buy_price']. "</td><td class='alt'>".$row['account']. "</td><td>".$row['date']. "</td><td class='alt'>".$row['time']. "</td></tr>";  //$row['index'] the index here is a field name
		}

		echo "</table>"; //Close the table in HTML

		mysql_close(); //Make sure to close out the database connection
    ?>
</div>

  <div class='sell_table' align="center" >
        
      <h3>sell table</h3>
	<?php 
        include "connect.php";
	    
		$query = "SELECT * FROM u_buy_sell WHERE sell_amount !='0' ORDER BY date,time "; //You don't need a ; like you do in SQL
		$result = mysql_query($query);

		echo "<table class='show' id='customers'>"; // start a table tag in the HTML
		echo "<tr><td class='alt'>"."NAME"."</td><td>"."Company"."</td><td class='alt'>"."Amount"."</td><td>"."Price"."</td><td class='alt'>"."balance"."</td><td>"."Date"."</td><td class='alt'>"."Time"."</td></tr>";
		while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
		echo "<td class='alt'>" . $row['name'] . "</td><td>" . $row['sell_name'] ."</td><td class='alt'>".$row['sell_amount']."</td><td>".$row['sell_price']. "</td><td class='alt'>".$row['account']. "</td><td>".$row['date']. "</td><td class='alt'>".$row['time']. "</td></tr>";  //$row['index'] the index here is a field name
		}

		echo "</table>"; //Close the table in HTML

		mysql_close(); //Make sure to close out the database connection
    ?>
</div>






</body>
</html>