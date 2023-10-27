<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Website</title>
  <link rel="stylesheet" href="includes/styles.css">
</head>
  <nav class="navbar">
    <div class="container">
      <div class="navbar-brand"><strong>SixtyNine</strong></div>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="./index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./trending.php">Trending</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./products.php">Products</a>
        </li>
        <?php
          if(isset($_SESSION['user_id'])){
        ?>
          <li class="nav-item">
            <a class="nav-link" href="./myproducts.php">My Products</a>
          </li>
        <?php 
          }
        ?>
      </ul>
      <ul class="navbar-nav">
        <?php
          if(!isset($_SESSION['user_id'])){
        ?>
          <li class="nav-item">
            <a class="nav-link" href="./register.php">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./login.php">Login</a>
          </li>
        <?php 
          }else{
        ?>
          <li class="nav-item user-info">
            <strong><?php echo $_SESSION['user_names'];?></strong>
            <small><?php echo $_SESSION['user_email'];?></small>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./addproduct.php">Add product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./logout.php">Logout</a>
          </li>
        <?php 
          }
        ?>
      </ul>
    </div>
  </nav>
</html>
