<?php
session_start();

// initializing variables
$fullname="";
$branch="";
$contact="";
$registrationnum="";
$username = "";
$email    = "";
$errors = array();
$ProductID="";
$Size="";
$Color="";
$Quantity="";
$counter=0;


// connect to the database
$db = mysqli_connect('localhost', 'id13370808_tusharjain', 'Vanitajain@0022', 'id13370808_tusharjain0022');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
  $registrationnum = mysqli_real_escape_string($db, $_POST['registrationnum']);
  $branch = mysqli_real_escape_string($db, $_POST['branch']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $contact = mysqli_real_escape_string($db, $_POST['contact']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($fullname)) { array_push($errors, "Full Name is required"); }
  if (empty($registrationnum)) { array_push($errors, "Registration Number is required"); }
  if (empty($branch)) { array_push($errors, "Branch is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($contact)) { array_push($errors, "Contact is required"); }
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (fullname, registrationnum, branch, email, contact, username, password) 
  			  VALUES( '$fullname', '$registrationnum', '$branch', '$email', '$contact', '$username', '$password')";
  	if(mysqli_query($db, $query))
  	{
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  		$query = "CREATE TABLE $username (
  	S_no int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ProductID int,
    description varchar(255),
    price int,
    Status int,
    Quantity int,
    Size varchar(255),
    Color varchar(255)
);";
  	mysqli_query($db, $query);
  	$cart_name= $username."cart";
  		$query = "CREATE TABLE $cart_name (
  `cart_num` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 `items` int
) ";
  	if(mysqli_query($db, $query))
  	header('location: index.php');
  	else
  	echo("Error description: " . mysqli_error($db));
  	}
  	else
  	   echo("Error description: " . mysqli_error($db));
  	    
  	
  }
}

// ... 
// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	 
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}


//CART
// REGISTER USER
if (isset($_POST['cart_user'])) {
  // receive all input values from the form
  $Size = mysqli_real_escape_string($db, $_POST['Size']);
  $Color = mysqli_real_escape_string($db, $_POST['Color']);
  $Quantity = mysqli_real_escape_string($db, $_POST['Quantity']);
  $ProductID = mysqli_real_escape_string($db, $_POST['ProductID']);
  $name  =  $_SESSION['username'];
   $user_check_query = "SELECT * FROM $name WHERE ProductID='$ProductID' AND Status = 0 AND Color='$Color' AND Size='$Size'  LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['ProductID'] === $ProductID) {
      array_push($errors, "Item already in cart");
      echo '<script>alert("ITEM is already in CART !!")</script>';
    }

  }
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($Size)) { array_push($errors, "Size is required"); }
  if (empty($Color)) { array_push($errors, "Color is required"); }
  if (empty($Quantity)) { array_push($errors, "Quantity is required"); }
 

  

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	

  	$query = "INSERT INTO $name (ProductID, Status, Quantity, Size, Color) 
  			  VALUES('$ProductID', '0', '$Quantity',  '$Size', '$Color')";
  	if(mysqli_query($db, $query))
  	{ if ($ProductID==101)
  	   {$sql="UPDATE $name
  	          SET description='Puma Men\'s Rebel Bold Hoody', price=500
  	          WHERE ProductID='$ProductID'";}
  	 elseif ($ProductID==102)
  	   {$sql="UPDATE $name
  	          SET description='Puma Men\'s Classics Logo Hoody French Terry', price=500
  	          WHERE ProductID=$ProductID";}
  	 elseif ($ProductID==103)
  	   {$sql="UPDATE $name
  	          SET description='Hoodie', price=500
  	          WHERE ProductID=$ProductID";}
    	if( mysqli_query($db, $sql))
  	          
  
  	header('location: cart.php');
  	    	else
   echo("Error description: " . mysqli_error($db));
  	}
  	else
   echo("Error description: " . mysqli_error($db));
  }
}
// BUYNOW

if (isset($_POST['buynow'])) {
   $name  =  $_SESSION['username'];
   $query="SELECT COUNT(Status) as Total
   FROM $name
   WHERE status=0";
   $result=mysqli_query($db,$query);
   if($result){ 
  
    $item=mysqli_fetch_assoc($result);
     $items=$item['Total'];
     $cart_name=$name."cart";
     	$query = "INSERT INTO $cart_name (items) 
  			  VALUES('$items')";
 	mysqli_query($db,$query);
  	  
  	 $query="SELECT MAX(cart_num) AS counter
FROM $cart_name;";
   $result=mysqli_query($db,$query);
   $item=mysqli_fetch_assoc($result);
   $counter=$item['counter'];  
  	  
  	$query = "UPDATE $name
    SET Status = $counter
    WHERE Status = 0 ";
  
      if(mysqli_query($db, $query)){
      
      header('location: order.php');
      }
  	  else
  	   echo("Error description: " . mysqli_error($db));
  	
  }}
  
//CART
// EDIT-SAVE
if (isset($_POST['save'])) {
  $name  =  $_SESSION['username'];
 
  
  // receive all input values from the form
  $Size = mysqli_real_escape_string($db, $_POST['Size']);
  $Color = mysqli_real_escape_string($db, $_POST['Color']);
  $Quantity = mysqli_real_escape_string($db, $_POST['Quantity']);
  $S_no = mysqli_real_escape_string($db, $_POST['S_no']);
  
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  //if (empty($Size)) { array_push($errors, "Size is required"); }
  if (empty($Color)) { array_push($errors, "Color is required"); }
  if (empty($Quantity)) { array_push($errors, "Quantity is required"); }
 

  

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	

  	$query = "UPDATE $name 
  	          SET Quantity='$Quantity', Color='$Color', Size='$Size'
  	          WHERE S_no= '$S_no' ";
  	if(mysqli_query($db, $query))
  
  	header('location: edit.php');
  	else
  echo("Error description: " . mysqli_error($db));
  }
}


//CART
// EDIT-REMOVE
if (isset($_POST['remove'])) {
  $name  =  $_SESSION['username'];
 
 
  $S_no = mysqli_real_escape_string($db, $_POST['S_no']);
  


  

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	

  	$query = "DELETE FROM $name WHERE S_no='$S_no';
";
  	if(mysqli_query($db, $query))
  
  	header('location: edit.php');
  	else
  echo("Error description: " . mysqli_error($db));
  }
}




?>