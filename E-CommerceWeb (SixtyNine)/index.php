<?php
    session_start();
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
    <link rel="stylesheet" href="index.css">
    <!--Boostrap Linked -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>SixtyNine::Electronic Store</title>
</head>
<body>
    <main role="main" class="container">
        <?php include'includes/navbar.php'; ?>
        <?php include'includes/flashMessage.php'; ?>
        
        
        <div id="carouselExampleControls" class="carousel carousel-dark slide carousel-fade mb-5" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://www.apple.com/v/apple-watch-ultra-2/c/images/meta/gps-lte__c6yo97eo67ue_og.png" class="d-block w-20" alt="Apple Watch Ultra 2">
                    <h5 class="text-center mt-4"><strong>Apple Watch Ultra 2</strong></h>
                    <h6 class="text-center orange"><strong> Lkr: 299,900.00 </strong></h6>
                </div>
                <div class="carousel-item">
                    <img src="https://www.bell.ca/Styles/wireless/all_languages/all_regions/catalog_images/large/iPhone_15_Pro_Max_Natural_Titanium_lrg2.png" class="d-block w-20" alt="iPhone 15 Pro">
                    <h5 class="text-center mt-4"><strong>iPhone 15 Pro</strong></h5>
                    <h6 class="text-center orange"><strong> Lkr: 534,900.00 </strong></h6>
                </div>
                <div class="carousel-item">
                    <img src="https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/airpods-max-select-skyblue-202011?wid=470&hei=556&fmt=png-alpha&.v=1604022365000" class="d-block w-20" alt="AirPods Max">
                    <h5 class="text-center mt-4"><strong>AirPods Max</strong></h5>
                    <h6 class="text-center orange"><strong> Lkr: 179,900.00 </strong></h6>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        
        <section class="text-center mb-5">
            <hr class=" col-8 offset-2 mb-3">
            <h4 class="ht-brands mb-4"><strong>Hot Products</strong></h4>
                
            <div class="container" style="margin-top: 20px; display: flex; flex-wrap: wrap; justify-content: space-between;">
                    
                   <!--  <div class="col-lg-2 "> -->
                        
                            <div class="card">
                            
                            <img src="https://www.soundguys.com/wp-content/uploads/2022/10/Apple-Airpods-Pro-Gen-2-vs.-Apple-Airpods-Pro-Gen-1-Hero-Image-2-scaled.jpg" alt="AirPods Pro 2nd Generation" >
                            
                            
                            <div class="card-body text-center">
                                <h5><strong>AirPods Pro 2nd Generation</strong></h5>
                                <h6 class="orange"><strong> Lkr: 82,900.00</strong></h6>
                            </div>
                           
                        </div>
                    
                    <!-- </div> -->
                    
                    <!-- <div class="col-lg-2 col-md-5 offset-lg-1 mb-5"> -->
                    
                        <div class="card">
                          
                            <img src="https://hips.hearstapps.com/hmg-prod/images/wireless-headphone-display-in-the-store-royalty-free-image-1678138342.jpg" alt="Beats Headphones" >
                          
                            <div class="card-body text-center">
                                <h5><strong>Beats Headphone</strong></h5>
                                <h6 class="orange"><strong> Lkr: 5,500.00 </strong></h6>
                            </div>
                      
                        </div>
                   
                    <!-- </div> -->
                   
                   <!--  <div class="col-lg-2 col-md-5 offset-lg-1 mb-5"> -->
                 
                        <div class="card">
                            
                            <img src="https://image.coolblue.be/max/640x360/content/7443ce3772842d667ee8be786fd214b1" alt=" Macbook" >
                           
                            <div class="card-body text-center">
                                <h5><strong>Mackbook pro M1</strong></h5>
                                <h6 class="orange"><strong> Lkr: 450,000.00 </strong></h6>
                            </div>
                    
                        </div>
                     
                    <!-- </div> -->
              
                    <!-- <div class="col-lg-2 col-md-5 offset-lg-1 mb-5">
                       
                        <div class="card">
                   
                            <img src="https://appleme.lk/wp-content/uploads/2022/07/haino_teko_smart_watch_-_fitness_sensorssplash_proofbluetooth_a-1.jpg" alt=" Smart Watch" >
                       
                            <div class="card-body text-center">
                                <h5><strong>Smart Watch</strong></h5>
                                <h6 class="orange"><strong> Lkr: 3,000.00 </strong></h6>
                            </div>
                           
                        </div>
                       
                    </div> -->
                 
                </div>
                
            </div>
           
        </section>
    </main>
    <?php include'includes/footer.php'; ?>
</body>
</html>
