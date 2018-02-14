<!DOCTYPE html>
<html>
<head>
	<title>analysis</title>

	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class='main'  >

		<?php  
        include "connect.php";
        $selected = $_POST['company_name']; 

        
        $result=mysql_query("SELECT * FROM company_details WHERE name= '$selected' ");
        $row= mysql_fetch_array($result);

		// Setup Variables
		$stockList = $row['c_symbol'];
		$stockFormat = "snl1d1t1c1hgwr6";
		$host = "http://quote.yahoo.com/d/quotes.csv";
		$requestUrl = $host."?s=".$stockList."&amp;amp;amp;amp;f=".$stockFormat."&amp;amp;amp;amp;e=.csv";
		 
		// Pull data (download CSV as file)
		$filesize=2000;
		$handle = fopen($requestUrl, "r");
		$raw = fread($handle, $filesize);
		fclose($handle);
		 
		// Split results, trim way the extra line break at the end
		$quotes = explode("\n",trim($raw));
		 
		foreach($quotes as $quoteraw) {
		$quoteraw = str_replace(", I", " I", $quoteraw);
		$quote = explode(",", $quoteraw);


		// for ($i=0; $i <7 ; $i++) { 
		//  	echo $quote[$i]."<br>";
		//  }

        // showing as a table

        echo "<div class='table'>";  

		echo "<table class='show' border='solid' name='details' align='center' style='background-color:white'>"; // start a table tag in the HTML
		echo "<tr><td>"."Symbol"."</td><td>".$quote[0]."</td></tr>";
		echo "<tr><td>"."Name"."</td><td>".$quote[1]."</td></tr>";
		echo "<tr><td>"."Last Trade (Price Only)"."</td><td>".$quote[2]."</td></tr>";
		echo "<tr><td>"."Last Trade Date"."</td><td>".$quote[3]."</td></tr>";
		echo "<tr><td>"."Last Trade Time"."</td><td>".$quote[4]."</td></tr>";
		echo "<tr><td>"."Change"."</td><td>".$quote[5]."</td></tr>";
		echo "<tr><td>"."52-Week Range"."</td><td>".$quote[6]."</td></tr>";
		echo "<tr><td>"."Est. Price(this year) "."</td><td>".$quote[7]."</td></tr>";

		echo "</table>"; //Close the table in HTML  
		 // output the first element of the array, the Company Name

		echo "</div>";



		//putting price valu from current update

		$value=mysql_query("UPDATE `company_details` SET`price`='$quote[7]' WHERE name= '$selected' ");
		}







		?>

		<!-- chart creating -->

	      <div class="chart">
		  <img style="-webkit-user-select: none; cursor: zoom-in;" src="http://chart.finance.yahoo.com/z?s=<?php echo $row['c_symbol']; ?>&amp;t=1d&amp;q=l&amp;l=off&amp;z=l&amp;p=m50,e200,v&amp;a=p12,p&amp;c=%5EDJI,BDT=X&amp;region=de&amp;lang=de-DE" width="490" height="400">

	      </div>

        
               <!-- Creating summary -->
	   <div class="summary" >
        <h1 align="left">  <?php echo $row['name']; ?> :Summary     </h1>

	   	<p class="sum"  align="left">
	   		<?php 
              echo $row['description'];
	   		 ?>
	   	</p>

	   </div>



</div>
</body>
</html>
