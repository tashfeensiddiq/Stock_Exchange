<?php 

include "connect.php";

 ?>



<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/admin_style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#kick").hide(); 
    $("#add_company").hide();
    $("#kickb").click(function(){
        $("#kick").show(1000);
    });
    $("#add_companyb").click(function(){
        $("#add_company").show(1000);
    });
});
</script>
</head>




<body>

         <div class="admin_c_form" id="admin_c_form" >



           <h3>What do you want to do?</h3>
               <button id="kickb">Kick</button>
               <button id="add_companyb">Add Company</button>



                   <form name="kick" id="kick" action="del_user.php" method="post">
                 
                     Name: <input type="text" name="u_name" required><br><br>
                     Email: &nbsp&nbsp&nbsp&nbsp&nbsp <input type="email" name="mail" required><br><br>
                     <input type="submit" value="submit">

                   </form>
               

                  <form name="add_company" id="add_company" action="accept.php" method="post">
                
                    Comapny Name: <input type="text" name="c_name" required><br><br>
                    Company Tag : <input type="text" name="tag" required><br><br>
                    Company Summary: <textarea name="summary" rows="5" cols="80" required> </textarea> <br><br>
                    <input type="submit" value="submit">

                  </form>
         </div>





    <div class='sell_table' align="center" >
        
    <h3>sell history</h3>
    <?php 

  
    $query = "SELECT * FROM u_buy_sell WHERE sell_amount !='0' ORDER BY time,date "; //You don't need a ; like you do in SQL
    $result = mysql_query($query);

    echo "<table class='show' border='solid' name='details' align='center' style='background-color:grey'>"; // start a table tag in the HTML
    echo "<tr><td>"."NAME"."</td><td>"."Company"."</td><td>"."Amount"."</td><td>"."Price"."</td><td>"."balance"."</td><td>"."Date"."</td><td>"."Time"."</td></tr>";
    echo mysql_error();
    while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
    echo "<td>" . $row['name'] . "</td><td>" . $row['sell_name'] ."</td><td>".$row['sell_amount']."</td><td>".$row['sell_price']. "</td><td>".$row['account']. "</td><td>".$row['date']. "</td><td>".$row['time']. "</td></tr>";  //$row['index'] the index here is a field name
    }

    echo "</table>"; //Close the table in HTML

    mysql_close(); //Make sure to close out the database connection
    ?>
</div>

  <div class='buy_table' align="center" >
        
       <h3>buy history</h3>  
  <?php 
        include "connect.php";
  
    $query = "SELECT * FROM u_buy_sell WHERE buy_amount !='0' ORDER BY time,date  "; //You don't need a ; like you do in SQL
    $result = mysql_query($query);
        echo mysql_error();
    echo "<table class='show' border='solid' name='details' align='center' style='background-color:grey'>"; // start a table tag in the HTML
   echo "<tr><td>"."NAME"."</td><td>"."Company"."</td><td>"."Amount"."</td><td>"."Price"."</td><td>"."balance"."</td><td>"."Date"."</td><td>"."Time"."</td></tr>";
    while($row = mysql_fetch_array($result)){ 
    echo mysql_error();  //Creates a loop to loop through results
    echo "<td>" . $row['name'] . "</td><td>" . $row['buy_name'] ."</td><td>".$row['buy_amount']."</td><td>".$row['buy_price']. "</td><td>".$row['account']. "</td><td>".$row['date']. "</td><td>".$row['time']. "</td></tr>";  //$row['index'] the index here is a field name
    }

    echo "</table>"; //Close the table in HTML

    mysql_close(); //Make sure to close out the database connection
    ?>
</div>




    <div name="company_detailsbd" align="center">
    <div name="company_detailshd"><h1> Fill up to company_details </h1></div>




      <form action="test.php" method="post">

      company_details: <select name="company_name" id="company_name">

           <option value="Google">-----------</option>
        <?php
        mysql_connect("localhost","root", "") or die("error at connecting".mysql_error()); 
        mysql_select_db("project_391");
        $mydata = mysql_query("SELECT * FROM company_details");
           while ($record = mysql_fetch_array($mydata)) {

            ?>
            
            <option value="<?php echo $record['name']; ?>"> <?php echo $record['name'];  ?></option>

            <?php } ?>
            

      </select>

        


      <input type="submit" value="company_details">
      </form>



</body>
</html>
