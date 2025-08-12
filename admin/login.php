<?php
include("../config/db.php");

session_start();
if(isset($_POST["login"])){
$e=$_POST["email"];
$pass=$_POST["password"];

$sel="SELECT * FROM admin_login 
                WHERE email='$e' AND
                password ='$pass'";

$rs=$con->query($sel);
if($rs->num_rows>0){
  $row=$rs->fetch_assoc();
  $_SESSION["un"]=$row["name"];
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
       
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <i class="fas fa-shield-alt"></i>
                <h2>Admin Portal</h2>
                <p>Secure Dashboard Access</p>
            </div>
            
            <div class="login-body">
                
                <form id="loginForm" action="" method="post">
                    <div class="form-floating">
                        <input type="email" name="email" class="form-control" id="email" placeholder="admin@example.com" required>
                        <label for="email"><i class="fas fa-user me-2"></i>Email Address</label>
                    </div>
                    
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                        <label for="password"><i class="fas fa-lock me-2"></i>Password</label>
                    </div>
                    
                    <div class="remember-forgot">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember">
                            <label class="form-check-label" for="remember">
                                Remember me
                            </label>
                        </div>
                        <a href="#" class="forgot-link">Forgot password?</a>
                    </div>
                    
                    <button type="submit" name="login" class="btn btn-primary btn-login">
                        <i class="fas fa-sign-in-alt me-2" name="login"></i>Sign In
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>
