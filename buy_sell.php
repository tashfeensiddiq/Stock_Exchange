<?php 
include "connect.php";

$name = $_POST["name"];
$pass = $_POST["password"];
$mail = $_POST["mail"];
$company = $_POST['company_name']; 
$amount = $_POST["amount"];
$decision=$_POST['buy_sell'];

    

  //security measures
    $sql="SELECT * FROM member WHERE name='$name' AND password='$pass' AND email='$mail'";
    $result=mysql_query($sql);
    $row = mysql_fetch_array($result);

    if (mysql_num_rows($result)>0) {
      //session_start();
        $_SESSION["name"]=$name;
        echo "success";
        echo "<br>"."<br>";
       // echo "<h3>for course selection click here</h3><br>"."<a href='course.php' style='text-decoration:none;'>"."   courseselect"."</a></p><br>";
        header("refresh:3;url=user_profile.php");

        if ($decision=="buy") {
            # code...      
            $mydata = mysql_query("SELECT * FROM company_details WHERE name='$company'");
            $update_balance = mysql_query("SELECT * FROM user_account WHERE name='$name'");
             $result=mysql_fetch_array($mydata);
             $up_balance=mysql_fetch_array($update_balance);
            $price=$result['price'];
            $minus=$result['price']*$amount;
            $tbalance=$up_balance['balance']-$minus;
           // echo ($minus);
            
            $buy=   mysql_query("UPDATE user_account SET balance=$tbalance WHERE name= '$name' ");
            $update_buy=   mysql_query("INSERT INTO u_buy_sell(`name`,`buy_name`,`buy_amount`,`buy_price`,`account`,`date`,`time`) VALUES ('$name','$company','$amount','$price','$tbalance',CURRENT_DATE,CURRENT_TIME)");
            if (!$update_buy) {
              echo mysql_error();
            }
           
           }
            
            if ($decision=="sell") {
            # code...      
            $mydata = mysql_query("SELECT * FROM company_details WHERE name='$company'");
            $update_balance = mysql_query("SELECT * FROM user_account WHERE name='$name'");
             $result=mysql_fetch_array($mydata);
             $up_balance=mysql_fetch_array($update_balance);
            $price=$result['price'];
            $minus=$result['price']*$amount;
            $tbalance=$up_balance['balance']+$minus;
           // echo ($minus);
            
            $sell=   mysql_query("UPDATE user_account SET balance=$tbalance WHERE name= '$name' ");
            $update_sell=   mysql_query("INSERT INTO u_buy_sell(`name`,`sell_name`,`sell_amount`,`sell_price`,`account`,`date`,`time`) VALUES ('$name','$company','$amount','$price','$tbalance',CURRENT_DATE,CURRENT_TIME)");
            if (!$update_sell) {
              echo mysql_error();
            }
           }
      
    }
    else
    {
      //header("Location:login.html");
      echo "<div align='center'><h1>No such member</h1>
        <h3>redirecting in 3 seconds</h3>

      </div>";
     header( "refresh:3;url=home.html" );
    }

  //end 


   

 ?>