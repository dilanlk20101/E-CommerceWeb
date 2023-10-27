<?php
// Start a session to manage user sessions.
session_start();

// Include the database connection script.
include('dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="product.css">
    <!--Boostrap Linked -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Your HTML head content here -->
    <title>SixtyNine::Products</title>

</head>
<body>
    <main role="main" class="container">
        <?php include 'includes/navbar.php'; ?>
        <hr class="col-8 offset-2 mb-5">
        <div class="container" style="margin-top: 20px; display: flex; flex-wrap: wrap; justify-content: space-between;">
            <?php
            // Fetch products data from the database with images.
            $sql = "SELECT * FROM products WHERE picture IS NOT NULL";
            $products = $conn->query($sql);

            if ($products->num_rows > 0) {
                while ($product = $products->fetch_assoc()) {
                    ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card">
                            <!-- Display the product image -->
                            <img src="data:image/jpeg;base64,<?php echo base64_encode($product['picture']) ?>" alt="Product Image">
                            <div class="card-body text-center">
                                <h5><strong><?php echo $product['productname'] ?></strong></h5>
                                <h6 class="font-weight-bold blue-text"><strong><?php echo 'Lkr: ' . $product['price'] ?></strong></h6>
                                <p><?php echo $product['description'] ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                // If no products with images are found, display a message.
                echo "No products with images found";
            }
            ?>
        </div>
    </main>
    <?php include 'includes/footer.php'; ?>
</body>
</html>