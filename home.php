<?php 
include "connect.php";

 ?>
<!DOCTYPE html>
<html>
<head>

<title>home</title>

<link rel="stylesheet" type="text/css" href="css/style.css">


</head>
<body style="background-image: url(css/home.png)">


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
         
         <div name="company_detailsbd" align="right">
			




			<form action="test.php" method="post">

			company_search: <select name="company_name" id="company_name">

			     <option value="Google">-----------</option>
				<?php 
				mysql_select_db("project_391");
				$mydata = mysql_query("SELECT * FROM company_details");
				echo mysql_error();
			     while ($record = mysql_fetch_array($mydata)) {

			     	?>
			     	
			     	<option value="<?php echo $record['name']; ?>"> <?php echo $record['name'];  ?></option>
                 
			     	<?php } ?>
			     	

			</select>

			  


			<input type="submit" value="search">
			</form>

			</div>

        <!-- some junks to fill up the page -->
         <!--game rules-->
        <div class="junk">
        	
        	<div class="game" style="margin: 10%; float:left">
        	<h2 style="margin-bottom: 15px; border-bottom: 1px dashed rgb(110, 95, 95);">Game Rules</h2>
            <p>Stockmarket is pleased to offer a realistic virtual stock trading platform to educate the general public about stock investments and let people learn from outstanding investors whereby outstanding investors can also be rewarded for their excellent stock investment skills and efforts.
            </p>
            <p>
            	<a class="button" href="game_rules.html">read more</a>
            </p>

        </div>

        <div class="game" style="margin: 10% 16.99% 10% 10%; float: right;" >
        	<h2 style="margin-bottom: 15px; border-bottom: 1px dashed rgb(110, 95, 95);">Game Rules</h2>
            <p>Stockmarket is pleased to offer a realistic virtual stock trading platform to educate the general public about stock investments and let people learn from outstanding investors whereby outstanding investors can also be rewarded for their excellent stock investment skills and efforts.
            </p>
            <p>
            	<a class="button" href="game_rules.html">read more</a>
            </p>

        </div>
        <br style="clear:both;"/>
        </div>

		<div class="chart" style="padding: 1%; border-radius: 10%; margin-top: -5%; margin-right: 24%;">

		     <h2 style="background: rgb(22, 38, 53) none repeat scroll 0% 0%; color: bisque; font-weight: normal; font-family: Arial,Helvetica,sans-serif; font-size: 20px; padding: 4px 12px;">Recent price chart</h2>

			 <img style="cursor: zoom-in; margin-top: -13px;" src="http://chart.finance.yahoo.com/z?s=BXP.L&amp;t=6m&amp;q=l&amp;l=on&amp;z=l&amp;p=m50,e200,v&amp;a=p12,p&amp;c=%5EDJI,EURUSD=X&amp;region=de&amp;lang=de-DE" width="300" height="300" >

		</div>

	      <div class="videonews"  height="330" width="220" style="width: 400px; background-color: rgba(250, 235, 215, 0.42); margin-top: -4%; margin-left: 9%; padding: 0% 0.5% 0.5%;"> 
	      	
	      	<h2 style="background: rgb(22, 38, 53) none repeat scroll 0% 0%; color: bisque; font-weight: normal; font-family: Arial,Helvetica,sans-serif; font-size: 20px; padding: 4px 12px;">Recent finance news</h2>

	      	<video width="300" height="300" style="width: inherit; margin-top: -16px;" controls>
	      		<source src="video2.mp4" type="video/mp4">

	      	</video>
	        <p>Financial shares are ending the week broadly lower after a court ruling on foreclosures in Massachusetts weighed on the sector. Bank stocks were hit hard through the first half of the session following news that Massachusetts' highest court said two home foreclosures were invalid since the banks in the case couldn't show they owned the mortgages. Earlier today, Ben Bernanke told the Senate Committee that the economy seems to be making steps toward self-sustained growth. In mid-day news, American International Group (AIG) shares are higher after insurer, which US taxpayers bailed out, said it wants to issue 75 million warrants to shareholders this month as it seeks to regain independence, Bloomberg reports. Meanwhile, shares of Popular (BPOP) are higher following a pre-market rating change from Goldman Sachs (GS), which initiated the bank at a "buy." Goldman has a $4.25 price target on company shares.</p> 
	      </div>


</body>
</html>
