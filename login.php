<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
$con = mysqli_connect('localhost', 'root', '', 'test');
session_start();
// If form submitted, insert values into the database.
if(isset($_SESSION["email"])){
	header("Location: list.php");
	exit(); 
}
if (isset($_POST['email'])){
	// var_dump($_POST);die();
        // removes backslashes
 $email = stripslashes($_POST['email']);
        //escapes special characters in a string
 $email = mysqli_real_escape_string($con, $email);
 $password = stripslashes($_POST['password']);
 $password = mysqli_real_escape_string($con, $password);
 $remember = $_POST['remember'];
 // var_dump($remember); die();
 //Checking is user existing in the database or not
$user_check_query = "SELECT * FROM user WHERE email='$email' LIMIT 1";
$result = mysqli_query($con, $user_check_query);
$user = mysqli_fetch_assoc($result);
 // if ($user) { // if user exists
        if ($user['email'] === $email && $user['password'] === $password){
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['password'] = $_POST['password'];
        }
        else {
            echo "<div class='form'>
	       <h3>Username/password is incorrect.</h3>
	       <br/>Click here to <a href='login.php'>Login</a></div>";
        }      
}
else {
?>
<div class="login-form" style="width: 60%; text-align: center; margin-left: 20%">
    <form action="/ltWeb/login.php" method="post">
        <h2 class="text-center">Log in</h2>       
        <div class="form-group">
            <input type="text" class="form-control" name="email" placeholder="Email" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Log in</button>
        </div>
        <div class="clearfix">
            <label class="pull-left checkbox-inline"><input type="checkbox" name="remember" value="1"> Remember me</label>
        </div>        
    </form>
    <p class="text-center"><a href="index.php">Create an Account</a></p>
</div>
<?php } ?>
</body>
</html>