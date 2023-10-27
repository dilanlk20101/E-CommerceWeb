<?php
session_start();
$message = [];
include('dbconnection.php'); // Include your database connection

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$user_id = $_SESSION['user_id'];

// Handle product deletion
if (isset($_POST['submit']) && $_POST['submit'] === 'delete') {
    $prod_id = $conn->real_escape_string($_POST['prod_id']);

    $sql = "DELETE FROM products WHERE id = $prod_id";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['flash_message'] = array("category" => "success", "message" => "Product deleted successfully");
    } else {
        echo "Unable to delete product " . $sql . "<br>" . $conn->error;
        $message = array("category" => "danger", "message" => "Unable to delete product " . $sql . "<br>" . $conn->error);
    }
}

// Retrieve the user's products
$sql = "SELECT * FROM products WHERE user_id = '$user_id'";
$products = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/bootstrap-5.1.1-dist/css/bootstrap.min.css">
    <script src="static/bootstrap-5.1.1-dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="myproduct.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>SixtyNine::My Products</title>
</head>
<body>
    <main role="main" class="container">
        <?php include 'includes/navbar.php'; ?>

        <section class="text-center mt-5 mb-5">
            <hr class="col-8 offset-2 mb-5">

            <div class="ms-lg-5">
                <!-- <div class="row"> -->
                    <?php
                        if ($products->num_rows > 0) {
                            while ($product = $products->fetch_assoc()) {
                    ?>
                                <div class="col-lg-2 col-md-6 mx-5 mb-5">
                                    <div class="card">
                                        <!-- Display the product image -->
                                        <img src="data:image/jpeg;base64,<?php echo base64_encode($product['picture']) ?>" alt="Product Image">
                                        <div class="card-body text-center">
                                            <h5><strong><?php echo $product['productname'] ?></strong></h5>
                                            <h6 class="font-weight-bold blue-text"><strong><?php echo 'Lkr: ' . $product['price'] ?></strong></h6>
                                            <p><?php echo $product['description'] ?></p>
                                        </div>
                                        <div class="row mb-3 px-3">
                                            <form action="editProduct.php" method="POST" class="col">
                                                <!-- Pass product information to the edit page -->
                                                <input type="hidden" name="prod_id" value="<?php echo $product['id'] ?>">
                                                <input type="hidden" name="prod_name" value="<?php echo $product['productname'] ?>">
                                                <input type="hidden" name="prod_desc" value="<?php echo $product['description'] ?>">
                                                <input type="hidden" name="prod_price" value="<?php echo $product['price'] ?>">
                                                <input type="hidden" name="prod_pic" value="<?php echo base64_encode($product['picture']) ?>">
                                                <button type="submit" name="submit" value="edit" class="btn btn-outline-primary btn-sm">Edit</button>
                                            </form>
                                            <form action="" method="POST" class="col">
                                                <!-- Pass the product ID for deletion -->
                                                <input type="hidden" name="prod_id" value="<?php echo $product['id'] ?>">
                                                <button type="submit" name="submit" value="delete" class="btn btn-outline-warning btn-sm">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                    <?php
                            }
                        } else {
                            echo "You have not added any products yet";
                        }
                    ?>
                <!-- </div> -->
            </div>
        </section>
    </main>
    <?php include 'includes/footer.php'; ?>
</body>
</html>
