<?php 
ob_start();
include("./includes/header.html");
include_once("database.php");
session_start();
if(isset($_SESSION['mem_id'])) {
 header("Location: index1.php");
}
$error = false;
if (isset($_POST['signup'])) {
 $mem_user = mysqli_real_escape_string($connect, $_POST['mem_user']);
 $mem_name = mysqli_real_escape_string($connect, $_POST['mem_name']);
 $mem_password = mysqli_real_escape_string($connect, $_POST['mem_password']);
 $mem_password = mysqli_real_escape_string($connect, $_POST['mem_password']); 
 if (!preg_match("/^[a-zA-Z ]+$/",$mem_user)) {
  $error = true;
  $uname_error = "Name must contain only alphabets and space";
 }
 if(!filter_var($mem_name,FILTER_VALIDATE_EMAIL)) {
  $error = true;
  $mem_name_error = "Please Enter Valid Email ID";
 }
 if(strlen($mem_password) < 6) {
  $error = true;
  $mem_password_error = "Password must be minimum of 6 characters";
 }
 if($mem_password != $mem_password) {
  $error = true;
  $mem_password_error = "Password and Confirm Password doesn't match";
 }
 if (!$error) {
  if(mysqli_query($connect, "INSERT INTO member(mem_user, mem_name, mem_password) VALUES('" . $mem_user . "', '" . $mem_name . "', '" . ($mem_password) . "')")) {
   $success_message = "Successfully Registered! <a href='backlog.php'>Click here to Login</a>";
  } else {
   $error_message = "Error in registering...Please try again later!";
  }
 }
}
?>
<title>GAMING ZONE : Register</title>
<script type="text/javascript" src="script/ajax.js"></script>

<div class="col-md-12 col-sm-12 block" align="center">
 <h2>Sign Up</h2>
 <br>
</div>
<div class="container">
 <div class="row">
  <div class="col-md-4 col-md-offset-4 well">
   <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
    <fieldset>
     <div class="form-group">
      <label for="name">Name</label>
      <input type="text" name="mem_user" placeholder="Enter Full Name" required value="<?php if($error) echo $mem_user; ?>" class="form-control" />
      <span class="text-danger"><?php if (isset($mem_user_error)) echo $mem_user_error; ?></span>
     </div>
     
     <div class="form-group">
      <label for="name">Email</label>
      <input type="text" name="mem_name" placeholder="Email" required value="<?php if($error) echo $mem_name; ?>" class="form-control" />
      <span class="text-danger"><?php if (isset($mem_name_error)) echo $mem_name_error; ?></span>
     </div>

     <div class="form-group">
      <label for="name">Password</label>
      <input type="password" name="mem_password" placeholder="Password" required class="form-control" />
      <span class="text-danger"><?php if (isset($mem_password_error)) echo $mem_password_error; ?></span>
     </div>

     <div class="form-group">
      <label for="name">Confirm Password</label>
      <input type="password" name="mem_password" placeholder="Confirm Password" required class="form-control" />
      <span class="text-danger"><?php if (isset($mem_password_error)) echo $mem_password_error; ?></span>
     </div>

     <div class="form-group">
      <input type="submit" name="signup" value="Sign Up" class="btn btn-dark" />
     </div>
    </fieldset>
   </form>
   <span class="text-success"><?php if (isset($success_message)) { echo $success_message; } ?></span>
   <span class="text-danger"><?php if (isset($error_message)) { echo $error_message; } ?></span>
  </div>
 </div>
 <div class="row">
  <div class="col-md-4 col-md-offset-4 text-center"> 
  Already Registered? <a href="backlog.php">Login Here</a>
  </div>
 </div> 
</div>
