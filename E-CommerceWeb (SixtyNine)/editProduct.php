<?php
    session_start();
    $message=[];
    include('dbconnection.php');

    // Check if the user is not logged in, then redirect to index.php
    if (!isset($_SESSION['user_id'])) {
        header('Location: index.php');
        exit();
    }

    
    $prod_id;
    $prod_name;
    $prod_desc;
    $prod_price;
    $prod_pic;

    if(isset($_POST['submit']) && $_POST['submit']=== 'edit'){
            
            $prod_id = $conn -> real_escape_string($_POST['prod_id']);
            $prod_name = $_POST['prod_name'];
            $prod_desc = $conn -> real_escape_string($_POST['prod_desc']);
            $prod_price = $conn -> real_escape_string($_POST['prod_price']);
            $prod_pic = $conn -> real_escape_string($_POST['prod_pic']);
            
            
    }else{
        if(isset($_POST['submit']) && $_POST['submit']=== 'done'){
            if(empty($_POST['product_name'])||empty($_POST['description'])||empty($_POST['price'])){
                $message=array("category"=>"danger","message"=>"Please fill all fields");
            }else{
                
                $prod_id = $conn -> real_escape_string($_POST['prod_id']);
                $prod_name = $conn -> real_escape_string($_POST['product_name']);
                $prod_desc = $conn -> real_escape_string($_POST['description']);
                $prod_price = $conn -> real_escape_string($_POST['price']);

                $user_id= $_SESSION['user_id'];

                
                if(file_exists($_FILES['product_picture']['tmp_name'])){
                    $filePath = './media/uploads/'.$_FILES['product_picture']['name'];
                    $new_picture_name = basename($_FILES['product_picture']['name']);
                    $tmp_name= $_FILES['product_picture']['tmp_name'];
                    
                    if(move_uploaded_file($tmp_name, $filePath)){
                        
                        $sql = "UPDATE products SET productname='$prod_name', `description`='$prod_desc', picture='$new_picture_name', price='$prod_price' WHERE id=$prod_id";
                        if ($conn->query($sql) === TRUE) {
                            $product_id = $conn->insert_id;
                            $_SESSION['flash_message']= array("category"=>"success","message"=>"Product updated successfully");
                            header('Location: myproducts.php');
                            
                        } else {
                            echo "failed to update product " . $sql . "<br>" . $conn->error;
                            $message=array("category"=>"danger","message"=>"failed to update product " . $sql . "<br>" . $conn->error);
                        }
                    }else{
                        $message=array("category"=>"danger","message"=>"Unable to upload picture, failed to update product");
                    }

                }else{
                    
                    
                    $sql = "UPDATE products SET productname='$prod_name', `description`='$prod_desc', price='$prod_price' WHERE id=$prod_id";
                    if ($conn->query($sql) === TRUE) {
                        $product_id = $conn->insert_id;
                        $_SESSION['flash_message']= array("category"=>"success","message"=>"Product updated successfully");
                        header('Location: myproducts.php');
                        
                    } else {
                        echo "failed to update product " . $sql . "<br>" . $conn->error;
                        $message=array("category"=>"danger","message"=>"failed to update product " . $sql . "<br>" . $conn->error);
                    }
                }       
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
    <script src="static/bootstrap-5.1.1-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="update.css">
    <title>SixtyNine::Edit product</title>
</head>
<body>
    <main role="main" class="container">
        <?php include'includes/navbar.php'; ?>
        <?php include'includes/flashMessage.php'; ?>
        <main role="main" class="container" style = "max-width:600px; max-height: 1000px; margin: 0 auto;padding: 20px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); border: 1px solid #ccc;border-radius: 5px;background-color: #f9f9f9; margin-top: 50px; margin-bottom: 50px;">
        
        <hr class=" col-6 offset-3 mb-5">
        <h3 class="text-center mb-4">Edit Product</h3>
        <form action="" method="POST" enctype="multipart/form-data" class="g-3 col-md-8 offset-md-2">
            <?php
                if($message){
                $messageText= "<div class='alert alert-".$message['category']."'>".$message['message']."</div>";
                echo $messageText;
                }
            ?>
            <input type="hidden" name="prod_id" value=<?php echo $prod_id?> required aria-label="Product_id">
            <input type="text" name="product_name" value="<?php echo $prod_name?>" required class="form-control mb-4" placeholder="Product name" aria-label="Product name">
            <textarea name="description" required class="form-control mb-4" rows="3" placeholder="Description"><?php echo $prod_desc?></textarea>
            <div class="row">
                <div class="col">
                    <label for="formFile" class="form-label">Picture</label>
                    <input type="file" name="product_picture" class="form-control mb-4" id="formFile">
                </div>
                <div class="col">
                    <label for="price" class="form-label">price(Lkr: )</label>
                    <input type="number" value=<?php echo $prod_price?> required name="price" id="price" class="form-control mb-4" placeholder="Price" aria-label="Price">
                </div>
            </div>
            <div class="text-center">
                <button type="submit" name="submit" value="done" class="btn btn-orange">Submit</button>
            </div>
        </form>
    </main>
    <?php include'includes/footer.php'; ?>
</body>
</html>