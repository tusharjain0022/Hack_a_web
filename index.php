<?php include('server.php') ?>
<?php 
  

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
* {
  margin: 0px;
  padding: 0px;
}

div.gallery {
  border: 1px solid #ccc;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}
.responsive {
  padding: 0 6px;
  float: left;
  width: 49.99999%;
}

@media only screen and (max-width: 700px) {
  .responsive {
    width: 100%;
    margin: 6px 0;
  }
}

@media only screen and (max-width: 500px) {
  .responsive {
    width: 100%;
  }
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
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
<a href="#down"><img src="img/down.png" id="fixedbuttondown" style="width:50px;height:50px;"></a>
<a href="#up"><img src="img/up.png" id="fixedbuttonup" style="width:50px;height:50px;"></a>
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
  
    <h2 id='2' style=" background-color:lightblue;padding:10px;text-align:center;margin:30px">IIITR HOODIE <h2>
  <div class="responsive">
  <div class="gallery">
    <a target="_blank" href="product1.php">
      <img src="img/hoodie1fYellow.jpg" alt="Puma Men's Rebel Bold Hoody" width="600px" height="`400px">
      <p>Details</p>
    </a>
   
  </div>
</div>
<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="product2.php">
      <img src="img/hoodie2fBlack.jpg" alt="Puma Men's Classics Logo Hoody French Terry" width="600px" height="400px">
      <p>Details</p>
    </a>
    
  </div>
</div>

  </div>



 
</div>



<div id="down"  style="background-color:#e5e5e5;text-align:center;padding:10px;margin-top:7px;">© copyright tusharjain0022@gmail.com</div>
</body>
</html>
