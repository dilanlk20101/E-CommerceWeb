<?php
  session_start();
  $message=[];
  if(isset($_POST['submit'])){
      
      include('dbconnection.php');
      
      
      $email = $conn -> real_escape_string($_POST['email']);
      $password = $conn -> real_escape_string($_POST['password']);

      $sql = "SELECT * FROM users WHERE email='$email'";
      $user= $conn->query($sql);
      if ($user->num_rows >0){
        $user = $user->fetch_assoc();
        if(password_verify($password, $user['password'])){
          $_SESSION['user_id']= $user['id'];
          $_SESSION['user_names']= $user['firstname']." ".$user['lastname'];
          $_SESSION['user_email']= $user['email'];
          $_SESSION['flash_message'] = array("category"=>"success","message"=>"Logged in!");;
          header('Location: index.php');
          exit();
        }else{
          $message=array("category"=>"danger","message"=>"Wrong password");
        } 
      } else {
        $message=array("category"=>"danger","message"=>"Incorrect email");
      }
      $conn->close();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/bootstrap-5.1.1-dist/css/bootstrap.min.css">
    <script src="static/bootstrap-5.1.1-dist/js/bootstrap.bundle.min.js"></script>
    <script src="static/bootstrap-5.1.1-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="login.css">
    <title>SixtyNine::Login</title>
</head>
<body>
    <main role="main" class="container">
        <?php include'includes/navbar.php'; ?>

        <hr class=" col-6 offset-3 mb-3">
        <h3 class="text-center mb-4 orange">Login</h3>
        <form action="" method="POST" class="g-3 col-md-6 offset-md-3">
          <?php
            if($message){
              
              $messageText= "<div class='alert alert-".$message['category']."'>".$message['message']."</div>";
              echo $messageText;
            }
          ?>
          <input type="email" name="email" class="form-control mb-4" placeholder="Email" aria-label="Email" required>
          <input type="password" name="password" class="form-control mb-4" placeholder="Password" aria-label="Password" required>
          <div class="text-center mb-4">
            <button type="submit" name="submit" class="btn btn-primary">Login</button>
          </div>
          <div class="text-center">
            <small>Don't have an account? <a href="register.php" class="orange">Sign Up</a></small>
        </div>
        </form>
    </main>
    <?php include'includes/footer.php'; ?>
</body>
</html>