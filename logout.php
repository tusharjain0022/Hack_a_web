<?php 
  session_start(); 

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
body {
  font-size: 120%;
  background: #F8F8FF;
}

.header {
  width: 70%;
  margin: 50px auto 0px;
  color: white;
  background: #5F9EA0;
  text-align: center;
  border: 1px solid #B0C4DE;
  border-bottom: none;
  border-radius: 10px 10px 0px 0px;
  padding: 20px;
}
form, .content {
  width: 70%;
  margin: 0px auto 50px;
  padding: 20px;
  border: 1px solid #B0C4DE;
  background: white;
  border-radius: 0px 0px 10px 10px;
}
.input-group {
  margin: 10px 0px 10px 0px;
}
.input-group label {
  display: block;
  text-align: left;
  margin: 3px;
}
.input-group input {
  height: 30px;
  width: 93%;
  padding: 5px 10px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid gray;
}
.btn {
  padding: 10px;
  font-size: 15px;
  color: white;
  background: #5F9EA0;
  border: none;
  border-radius: 5px;
}
.error {
  width: 92%; 
  margin: 0px auto; 
  padding: 10px; 
  border: 1px solid #a94442; 
  color: #a94442; 
  background: #f2dede; 
  border-radius: 5px; 
  text-align: left;
}
.success {
  color: #3c763d; 
  background: #dff0d8; 
  border: 1px solid #3c763d;
  margin-bottom: 20px;
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
  padding:0 20px;
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
  
   <div class="header">
	<h2>Log Out</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p><strong><?php echo $_SESSION['username']; ?></strong>  LOGOUT?</p>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    	<p> <a href="index.php" style="color: red;">CONTINUE SHOPPING!!!</a> </p>
    <?php endif ?>
</div>
  </div>



 
</div>



<div id="down"  style="background-color:#e5e5e5;text-align:center;padding:10px;margin-top:7px;">© copyright tusharjain0022@gmail.com</div>
</body>
</html>
