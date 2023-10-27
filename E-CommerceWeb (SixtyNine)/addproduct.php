<?php
session_start();
$message = [];

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

if (isset($_POST['submit'])) {
    include('dbconnection.php'); 

    if (empty($_POST['product_name']) || empty($_POST['description']) || empty($_POST['price'])) {
        $message = array("category" => "danger", "message" => "Please fill in all fields");
    } else {
        if (!empty($_FILES['product_picture']['tmp_name'])) {
            $product_name = $conn->real_escape_string($_POST['product_name']);
            $description = $conn->real_escape_string($_POST['description']);
            $price = $conn->real_escape_string($_POST['price']);
            $user_id = $_SESSION['user_id'];

            $picture_name = $_FILES['product_picture']['name'];
            $tmp_name = $_FILES['product_picture']['tmp_name'];

            $image_data = file_get_contents($tmp_name);

            $sql = "INSERT INTO products (`productname`, `description`, `picture`, `price`, `user_id`) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $null = null; 
            $stmt->bind_param("ssbdi", $product_name, $description, $null, $price, $user_id);

            $stmt->send_long_data(2, $image_data);

            if ($stmt->execute()) {
                $_SESSION['flash_message'] = array("category" => "success", "message" => "New product added successfully");
            } else {
                $message = array("category" => "danger", "message" => "Failed to add product: " . $stmt->error);
            }
            $stmt->close();
        } else {
            $message = array("category" => "danger", "message" => "Please insert a picture of the product");
        }
    }
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
    <script src="static bootstrap-5.1.1-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="addproduct.css">
    <title>Tevos::New product</title>
</head>
<body>
    <main role="main" class="container">
        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/flashMessage.php'; ?>
        <main role="main" class="container" style = "max-width:600px; max-height: 1000px; margin: 0 auto;padding: 20px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); border: 1px solid #ccc;border-radius: 5px;background-color: #f9f9f9; margin-top: 50px; margin-bottom: 50px;">


        <hr class="col-6 offset-3 mb-5">
        <h4 class="text-center mb-4"><strong>New product</strong></h4>
        <form action="" method="POST" enctype="multipart/form-data" class="g-3 col-md-8 offset-md-2">
            <?php
                if ($message) {
                    $messageText = "<div class='alert alert-" . $message['category'] . "'>" . $message['message'] . "</div>";
                    echo $messageText;
                }
            ?>
            <input type="text" name="product_name" required class="form-control mb-4" placeholder="Product name" aria-label="Product name">
            <textarea name="description" required class="form-control mb-4" rows="3" placeholder="Description"></textarea>
            <div class="row">
                <div class="col">
                    <label for="formFile" class="form-label">Picture</label>
                    <input type="file" required name="product_picture" class="form-control mb-4" id="formFile" accept=".jpg, .jpeg, .png">
                </div>
                <div class="col">
                    <label for="price" class="form-label">Price (Lkr: )</label>
                    <input type="number" required name="price" id="price" class="form-control mb-4" placeholder="Price" aria-label="Price">
                </div>
            </div>
            <div class="text-center">
                <button type="submit" name="submit" class="btn btn-orange">Submit</button>
            </div>
        </form>
    </main>
    <?php include 'includes/footer.php'; ?>
</body>
</html>
