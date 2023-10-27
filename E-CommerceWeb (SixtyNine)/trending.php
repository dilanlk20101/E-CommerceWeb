<?php
    session_start();
    $message=[];
    include('dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/bootstrap-5.1.1-dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="static/bootstrap-5.1.1-dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="tending.css">
    <title>SixtyNine::Products</title>
</head>
<body>
    <main role="main" class="container">
        <?php include'includes/navbar.php'; ?>

        <hr class=" col-8 offset-2 mb-3">
        <h5 class="text-center"><strong>Trending products</strong></h5>
        <!-- <section class="text-center mt-5 mb-5"> -->
            
            <!-- <div class="ms-lg-5 ps-lg-5"> -->

                <div class="row">
                 
                    <!-- <div class="col-lg-2 col-md-6 mb-5"> -->
                      
                            <div class="card">
                           
                            <img src="https://faloshop.com/images/thumbnails/700/700/detailed/12/1bdba172c9bdc9865e0093b7ad69abfa.webp" alt="Lenovo Tab" >
                       
                            <div class="card-body text-center">
                                <h5><strong>Lenovo Tablet</strong></h5>
                                <h6 class="orange"><strong> Lkr: 100,900.00 </strong></h6>
                            </div>
                           
                        </div>
                       
                    <!-- </div> -->
                  
                    <!-- <div class="col-lg-2 col-md-5 offset-lg-1 mb-5"> -->
                        
                        <div class="card">
                      
                            <img src="https://istyle.com.lb/media/catalog/product/cache/image/700x700/e9c3970ab036de70892d86c6d221abfe/m/a/macbook_pro_16-in_space_gray_pdp_image_position-11_en.jpg" alt="Macbook" >
                           
                            <div class="card-body text-center">
                                <h5><strong>Macbook M1 Pro</strong></h5>
                                <h6 class="orange"><strong> Lkr: 490,900.00 </strong></h6>
                            </div>
                            
                        </div>
                   
                    <!-- </div> -->
                
                    <!-- <div class="col-lg-2 col-md-5 offset-lg-1 mb-5"> -->
                       
                        <div class="card">
                          
                            <img src="https://tecplanet.lk/wp-content/uploads/2023/06/montre-connectee-haino-teko-g8-mini-gold-rose.jpg" alt="Smart Watch" >
                           
                            <div class="card-body text-center">
                                <h5><strong>Smart watch</strong></h5>
                                <h6 class="orange"><strong> Lkr: 3,900.00 </strong></h6>
                            </div>
                          
                        </div>
                      
                    <!-- </div> -->
             
                    <!-- <div class="col-lg-2 col-md-5 offset-lg-1 mb-5"> -->
                      
                        <div class="card">
                            
                            <img src="https://hips.hearstapps.com/hmg-prod/images/wireless-headphone-display-in-the-store-royalty-free-image-1678138342.jpg" alt="Beast Headphones" >
                          
                            <div class="card-body text-center">
                                <h5><strong>Beats Headphone</strong></h5>
                                <h6 class="orange"><strong> Lkr: 5,500.00 </strong></h6>
                            </div>
                     
                        </div>
                       
                    <!-- </div> -->
             
                <!-- </div> -->
            
            <!-- </div> -->
           
        <!-- </section> -->
    </main>
    <?php include'includes/footer.php'; ?>
</body>
</html>