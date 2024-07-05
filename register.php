<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <title>Register</title>
    <link rel="stylesheet" href="login_style.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>
    <div class="center">
      <h1>Register</h1>
      <form method="post">
        <div class="txt_field">
          <input type="text" name="name" required />
          <label>Name</label>
        </div>
        <div class="txt_field">
          <input type="email" name="email" required />
          <label>Email</label>
        </div>
        <div class="txt_field">
          <input type="tel" name="phone" required />
          <label>Phone</label>
        </div>
        
        <div class="txt_field">
          <input type="password" name="pw" required />
          <label>Password</label>
        </div>
        <input type="submit" value="Register" name="register"/>
      </form>
      <?php include("connection.php"); ?>
    </div>
  </body>
</html>

<?php
if(isset($_POST['register']))
{
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $pass = $_POST['pw'];

  $query = "INSERT INTO users(name,email,phone,password) VALUES ('$name','$email','$phone','$pass')";
  $data = mysqli_query($connection,$query);
  if($data)
  {
    ?>
    <script>alert('Registration Successful')</script>
    <?php
    header('location:login.php');
  }else{
    ?>
    <script>alert('Registration not Successful')</script>
    <?php
  }
}
?>
