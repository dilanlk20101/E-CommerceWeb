<?php
// Start a session to manage user sessions.
  session_start();
  $message=[];
  
  // Check if the registration form is submitted.
  if(isset($_POST['submit'])){
    // Include the database connection script.
    include('dbconnection.php');
    // Check if any of the required fields are empty.
    if(empty($_POST['firstname'])||empty($_POST['lastname'])||empty($_POST['email'])||empty($_POST['password1'])||empty($_POST['password2'])){
      $message=array("category"=>"danger","message"=>"Please fill all fields");
    }else{
     
      // Escape and store user input.
      $first_name = $conn -> real_escape_string($_POST['firstname']);
      $last_name = $conn -> real_escape_string($_POST['lastname']);
      $email = $conn -> real_escape_string($_POST['email']);
      $password1 = $conn -> real_escape_string($_POST['password1']);
      $password2 = $conn -> real_escape_string($_POST['password2']);

      // Check if the entered passwords match.
      if(!($password1 === $password2)){
        $message=array("category"=>"danger","message"=>"Passwords do not match");
      }
      else{
        // Hash the password securely. methana wenne database ekata  yana password eka encript wenawa e kynne user gahuwa password ekka nawe database eka pennane
        $passwordHash = password_hash($password1, PASSWORD_DEFAULT);
        // Prepare and execute the SQL statement to insert the user into the database.
        $sql = "INSERT INTO users (firstname,lastname,email,`password`) VALUES('$first_name','$last_name','$email','$passwordHash')"; //password hash kynne encrips karanna use karana keyword ekk
        if ($conn->query($sql) === TRUE) {
          $user_id = $conn->insert_id;
          $message=array("category"=>"success","message"=>"Registration successfull");
          $_SESSION['user_id']= $user_id;
          $_SESSION['user_names']=$first_name." ".$last_name;
          $_SESSION['user_email']= $email;
          $_SESSION['flash_message']= array("category"=>"success","message"=>"Registration Succesfull. You are Logged in!");
          header('Location: index.php');
          exit();
        } else {
          if(substr($conn->error,0,15)==="Duplicate entry" && substr($conn->error,-7)==="'email'"){
            $message=array("category"=>"danger","message"=>"Email already registered");
          }else{
            echo "Registration failed: " . $sql . "<br>" . $conn->error;
            $message=array("category"=>"danger","message"=>"Registration failed: " . $sql . "<br>" . $conn->error);
          }
        }
        
      }
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
    <link rel="stylesheet" href="static/css/style.css">
    <title>SixtyNine::Register</title>
</head>
<body>
    <main role="main" class="container">
        <?php include'includes/navbar.php'; ?>
        <?php include'includes/flashMessage.php'; ?>
        
        <hr class=" col-6 offset-3 mb-3">
        <h3 class="text-center mb-4 orange">Register</h3>
        <form action="" method="POST" class="g-3 col-md-8 offset-md-2" >
          <?php
            if($message){
              
              $messageText= "<div class='alert alert-".$message['category']."'>".$message['message']."</div>";
              echo $messageText;
            }
          ?>
          <div class="row">
            <div class="col">
              <input type="text" name="firstname" class="form-control mb-4" placeholder="First name" aria-label="First name" required>
            </div><br>
            <div class="col">
              <input type="text" name="lastname" class="form-control mb-4" placeholder="Last name" aria-label="Last name" required>
            </div><br>
          </div>
          <input type="email" name="email" class="form-control mb-4" placeholder="Email" aria-label="Email" required><br>
          <div class="row"><br>
            <div class="col">
              <input type="password" name="password1" class="form-control mb-4" placeholder="Password" aria-label="Password" required>
            </div><br>
            <div class="col">
              <input type="password" name="password2" class="form-control mb-4" placeholder="Confirm password" aria-label="Confirm Password" required>
            </div><br>
          </div><br>
          <div class="text-center mb-4">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
          </div><br>
          <div class="text-center">
            <small>Already have an account? <a href="login.php" class="orange">Login</a></small>
          </div><br>
        </form>
    </main>
    <?php include'includes/footer.php'; ?>
</body>
</html>
