<?php include('server.php') ?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
* {
  margin: 0px;
  padding: 0px;
}
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
#background{background-image: url('1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;}

 .p01 {
  color: black;
  background-color:lightblue;
  font-size: 250%;
 allign-text:center;
  padding:30px;}
* {
  box-sizing: border-box;
}
.menu {
  float:left;
  width:20%;
  text-align:center;
}
.menu a {
  background-color:lightblue;
  padding:8px;
  margin-top:7px;
  display:block;
  width:100%;
  color:black;
}
.main {
   
  float:left;
  width:80%;
  padding:0 10px;
}
.right {
  background-color:lightblue;
  float:right;
  width:100%;
  padding:15px;
  margin-top:7px;
  text-align:center;
}
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
#fixedbuttondown {
    position: fixed;
    bottom: 10px;
    left: 10px; 
}

#fixedbuttonup {
    position: fixed;
    bottom: 80px;
    left: 10px; 
}

@media only screen and (max-width:620px) {
  /* For mobile phones: */
  .menu, .main, .right ,.p01{
    width:100%;
    
  }
}

</style>
</head>
<body  id="background">

<p class=p01 id="up"><img src="img/iiitrlogo.gif" alt="IIITR Logo" style="float:left;width:150px;height:120px;background-color:lightblue;padding:0px;">
<br>
  Indian Institute Of Information 
     Technology, Ranchi</p>

<div style="overflow:auto">
  <div class="menu">
    <a href="http://iiitranchi.ac.in/">IIITR site Link</a>
    <a href="index.php">Go to Home</a>
    <a href="cart.php">Cart</a>
    <a href="order.php">Your Orders</a>
    <a href="logout.php">Log Out</a>
<div class="right">
    <h2>Contact</h2>
    <p>ph-7982250655</p>
    <h2>Location</h2>
    <p>Namkun,Ranchi</p>
   <a href="https://www.google.com/maps/place/Indian+Institute+of+Information+Technology+(IIIT),+Ranchi/@23.3154918,85.3722899,17z/data=!4m8!1m2!2m1!1sjut+campus+ranchi!3m4!1s0x39f4e36d68aa3ad1:0x71cdc1be0272920!8m2!3d23.3158006!4d85.3739234">view in map</a>
   
  </div>
  </div>

  <div class="main">
  
    <h2 id='2' style=" background-color:lightblue;padding:10px;text-align:center;margin:30px;">YOUR ORDERS <h2>
 
    <?php
//connect database 

$name= $_SESSION['username'];
//select all values from empInfo table
$cart_name=$name."cart";
$sql = "SELECT * from $cart_name";
$resul = mysqli_query($db,$sql);
while($c=mysqli_fetch_assoc($resul)){
$num=$c['cart_num'];

$sql = "SELECT * from $name WHERE Status=$num ";
$result = mysqli_query($db,$sql);
if($result)
{echo "<h6> CART $num</h6>";
echo "  
 <div style=' background-color:lightblue;'>
     <table id='customers'>
  <tr>
    <th>S.no.</th>
    <th>ProductID</th>
    <th>Quantity</th>
    <th>Size</th>
    <th>Color</th>
  </tr>";
while($r=mysqli_fetch_assoc($result))
{    $ID=$r['S_no'];
    if($r['ProductID']==101)
  $link='product1.php';
  else
  $link='product2.php';
echo "<tr><td>".$r['S_no']."</td><td>".$r['ProductID']."</td><td>".$r['Quantity']."</td><td>".$r['Size']."</td><td>".$r['Color']."</td><td>"."<a href='$link'>See Details</a>"."</td><td>"." 
      <form method='post' action='fpdf182/invoice.php'>
     <input type='hidden' value='$num' name='cart_num'  >
     <button type='submit' onclick=\"document.location = 'fpdf182/invoice.php'\"  class='btn' name='invoice'>Download Receipt</button></form>"."</td></tr>";
}
 echo "</table>
</div>";}
   
}
?>

  </div>



 
</div>



<div id="down"  style="background-color:#e5e5e5;text-align:center;padding:10px;margin-top:7px;">© copyright tusharjain0022@gmail.com</div>
</body>

</html>
