

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel="stylesheet" href="login_style.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>
    <div class="center">
      <h1>Login</h1>
      <form method="post">
        <div class="txt_field">
          <input type="email" name="uname" required />
          <label>Email</label>
        </div>
        <div class="txt_field">
          <input type="password" name="pw" required />
          <label>Password</label>
        </div>
        <!-- <div class="pass"><a href="forget.php"> Forgot Password?</a></div> -->
        <a href="../../pages/indextwo.php"><input type="submit" value="Login" name="login"/></a>
        <div class="signup_link">Don't have an account? <a href="register.php">Register now</a></div>

      </form>
      <?php include("connection.php"); ?>
    </div>
  </body>
</html>

<?php

if(isset($_POST['login']))
{
  $uname = $_POST['uname'];
  $pass = $_POST['pw'];

  $query = "SELECT * FROM users WHERE email = '$uname' && password = '$pass' ";
  $data = mysqli_query($connection,$query);  
  $row = mysqli_fetch_array($data);
  $total = mysqli_num_rows(($data));
  $role = $row['role'];

  if($total == 1)
  {

  if($role == 1)
  {
    $row = $data->fetch_assoc();
    header('location:contactdetails/admin_panel/table_booking.php');
  }else{
    header('location:index.php');
  }
  }else{
    echo "<script>Swal.fire({
      title: 'Credentials does not match.',
      confirmButtonText: 'OK'
      });</script>";
  }
}
?>
