<!DOCTYPE html>
<html>
<head>
	<title>analysis</title>

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

			

			#customers tr.alt td {
			    color: #000000;
			    background-color: #EAF2D3;
			}
     </style>

</head>
<body style="background-image: url(css/company.png)">

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
<div class="main" style="margin: 5%;" >

		<div class="mainbd">
			
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
		        

		        //company name and heading


		        echo "<h1 style='margin-left: 25%; font: italic bold 40px/70px Georgia,serif; align:center'>".$row['name']."</h1>";





		        // showing as a table

                

		        echo "<div class='table' id='customers'>";  
                echo "<h3 style='background: rgb(22, 38, 53) none repeat scroll 0% 0%; color: bisque; font-weight: normal; font-family: Arial,Helvetica,sans-serif; font-size: 20px; padding: 4px 12px;'>Recent data and statistics</h3>";
				echo "<table class='show' border='solid' name='details' align='center' style='background-color:white'>"; // start a table tag in the HTML
				echo "<tr class='alt'><td>"."Symbol"."</td><td>".$quote[0]."</td></tr>";
				echo "<tr><td>"."Name"."</td><td>".$quote[1]."</td></tr>";
				echo "<tr class='alt'><td>"."Last Trade (Price Only)"."</td><td>".$quote[2]."</td></tr>";
				echo "<tr><td>"."Last Trade Date"."</td><td>".$quote[3]."</td></tr>";
				echo "<tr class='alt'><td>"."Last Trade Time"."</td><td>".$quote[4]."</td></tr>";
				echo "<tr><td>"."Change"."</td><td>".$quote[5]."</td></tr>";
				echo "<tr class='alt'><td>"."52-Week Range"."</td><td>".$quote[6]."</td></tr>";
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
          <h2 style="background: rgb(22, 38, 53) none repeat scroll 0% 0%; color: bisque; font-weight: normal; font-family: Arial,Helvetica,sans-serif; font-size: 20px; padding: 4px 12px;">Recent price chart</h2>

		  <img style="-webkit-user-select: none; cursor: zoom-in;" src="http://chart.finance.yahoo.com/z?s=<?php echo $row['c_symbol']; ?>&amp;t=6m&amp;q=l&amp;l=on&amp;z=l&amp;p=m50,e200,v&amp;a=p12,p&amp;c=%5EDJI,BDT=X&amp;region=de&amp;lang=de-DE" width="490" height="400">

	      </div>

        
            <div class="summary" style="margin-top: 40%; width: 650px; height: 100%; position: absolute;" >
		        <h1 align="left" style="width: 100%; background: rgb(22, 38, 53) none repeat scroll 0% 0%; color: bisque; font-weight: normal; font-family: Arial,Helvetica,sans-serif; font-size: 20px; padding: 4px 12px;">  <?php echo $row['name']; ?>      </h1>

			   	<p class="sum"  align="left">
			   		<?php 
		              echo $row['description'];
			   		 ?>
			   	</p>

	       </div>



		</div>   
	   



</div>


      

  

</body>
</html>
