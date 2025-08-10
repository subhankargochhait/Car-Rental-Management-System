<?php

session_start();
include("../config/db.php");

if(isset($_POST["login"])){
$e=$_POST["email"];
$pass=$_POST["password"];

$sel="SELECT * FROM signup 
                WHERE email='$e' AND
                password ='$pass'";

$rs=$con->query($sel);
if($rs->num_rows>0){
  $row=$rs->fetch_assoc();
  $_SESSION["un"]=$row["full_name"];
header("Location:dashboard.php");
exit;

}else{
  echo "Invalid login";
}


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Car Rental | Login</title>
  <link rel="stylesheet" href="../assets/css/styles-login.css" />
</head>
<body>
  <div class="overlay">
    <div class="form-container">
      <h2 id="formTitle">Login</h2>

      <!-- Login Form -->
      <form id="loginForm" class="form active" action="" method="post">
        <input type="email" name="email" placeholder="Email" required />
        <input type="password" name="password" placeholder="Password" required />
        <button type="submit" name="login">Login</button>
      </form>
    </div>
  </div>


</body>
</html>
