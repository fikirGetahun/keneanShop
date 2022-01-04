<?php
    require_once "../php/adminCrude.php";

    $_SESSION['scroll_on'] = 'OFF';


    if(isset($_POST['pid'])){
        $pid = $_POST['pid'];
    }
?>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Item - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="admin/assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <script src="../assets/jquery.js"></script>
        <link href="css/styles.css" rel="stylesheet" />
        <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
        <!-- Navigation-->

        <!-- Product section-->
        <?php
        if(isset($_POST['type'])){
            if($_POST['type'] == 'ad'){
                $adView = $admin->adEditDataLister($pid);
                $adRow = $adView->fetch_assoc();
                ?>
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol  class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators"  data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div  class="carousel-inner">
                                <div class="carousel-item active">
                                <img class="d-block w-100" src="<?php $p = $admin->photoSplit($adRow['photoPath1']); echo $p[0] ;?>"" alt="First slide">
                                </div>

                                <?php
                                $p = $admin->photoSplit($adRow['photoPath1']);
                                if(!empty($p[1])){
                                    ?>
                                <div class="carousel-item">
                                <img class="d-block w-100" src="<?php $p = $admin->photoSplit($adRow['photoPath1']); echo $p[1] ;?>" alt="Third slide">
                                </div>
                                    <?php
                                }
                                ?>

                                <?php
                                $p = $admin->photoSplit($adRow['photoPath1']);
                                if(!empty($p[2])){
                                    ?>
                                <div class="carousel-item">
                                <img class="d-block w-100" src="<?php $p = $admin->photoSplit($adRow['photoPath1']); echo $p[2] ;?>" alt="Third slide">
                                </div>
                                    <?php
                                }
                                ?>

                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                            </div>  
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                            </div>         
                        <div class="col-md-6">
                        <h1 class="display-5 fw-bolder"><?php echo $adRow['title'] ?></h1>
                        <div class="fs-5 mb-5">
                            <span class="text-decoration-line-through"></span>
                            <span><?php echo $adRow['price'] ?> Brr</span>
                        </div>
                        <label class="lable" for="exampleInputEmail1">Category: <?php echo $adRow['type'] ?></label>
                        <label for="exampleInputEmail1">Offer Shipping: <?php echo $adRow['shipping'] ?></label>
                        <label for="exampleInputEmail1">Location:  <?php echo $adRow['address'] ?></label>
                        <p class="lead"> Info:  <?php echo $adRow['info'] ?> </p>
                        <div class="d-flex">
                            <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                            <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                <i class="bi-cart-fill me-1"></i>
                                View User
                            </button>
                        </div>
                    </div>
                </div>
            </div>
                
                <?php
            }elseif($_POST['type'] == 'car'){
                $carView = $admin->carPostDataLister($pid);
                $carRow = $carView->fetch_assoc();
                ?>
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol  class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators"  data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div  class="carousel-inner">
                                <div class="carousel-item active">
                                <img class="d-block w-100" src="<?php $p = $admin->photoSplit($carRow['photoPath1']); echo $p[0] ;?>"" alt="First slide">
                                </div>

                                <?php
                                $p = $admin->photoSplit($carRow['photoPath1']);
                                if(!empty($p[1])){
                                    ?>
                                <div class="carousel-item">
                                <img class="d-block w-100" src="<?php $p = $admin->photoSplit($carRow['photoPath1']); echo $p[1] ;?>" alt="Third slide">
                                </div>
                                    <?php
                                }
                                ?>

                                <?php
                                $p = $admin->photoSplit($carRow['photoPath1']);
                                if(!empty($p[2])){
                                    ?>
                                <div class="carousel-item">
                                <img class="d-block w-100" src="<?php $p = $admin->photoSplit($carRow['photoPath1']); echo $p[2] ;?>" alt="Third slide">
                                </div>
                                    <?php
                                }
                                ?>

                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                            </div>         
                        <div class="col-md-6">
                        <h1 class="display-5 fw-bolder"><?php echo $carRow['title'] ?></h1>
                        <div class="fs-5 mb-5">
                            <span class="text-decoration-line-through"></span>
                            <span><?php echo $carRow['price'] ?> Brr</span>
                        </div>
                        <label for="exampleInputEmail1">For: <?php echo $carRow['forRentOrSell'] ?></label>

                        <label for="exampleInputEmail1">Type: <?php echo $carRow['type'] ?></label>
                        <label for="exampleInputEmail1">Status: <?php echo $carRow['status'] ?></label>
                        <label for="exampleInputEmail1">Fule Kind: <?php echo $carRow['fuleKind'] ?></label>
                        <label for="exampleInputEmail1">Price Status: <?php echo $carRow['fixidOrN'] ?></label>


                        <p class="lead"><?php echo $carRow['info'] ?></p>
                        <div class="d-flex">
                            <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                            <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                <i class="bi-cart-fill me-1"></i>
                                View User
                            </button>
                        </div>
                    </div>
                </div>
            </div>
                <?php
            }elseif($_POST['type'] == 'house'){
                $carView = $admin->singleHousePostLister($pid);
                $carRow = $carView->fetch_assoc();
                ?>
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol  class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators"  data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div  class="carousel-inner">
                                <div class="carousel-item active">
                                <img class="d-block w-100" src="<?php $p = $admin->photoSplit($carRow['photoPath1']); echo $p[0] ;?>"" alt="First slide">
                                </div>

                                <?php
                                $p = $admin->photoSplit($carRow['photoPath1']);
                                if(!empty($p[1])){
                                    ?>
                                <div class="carousel-item">
                                <img class="d-block w-100" src="<?php $p = $admin->photoSplit($carRow['photoPath1']); echo $p[1] ;?>" alt="Third slide">
                                </div>
                                    <?php
                                }
                                ?>

                                <?php
                                $p = $admin->photoSplit($carRow['photoPath1']);
                                if(!empty($p[2])){
                                    ?>
                                <div class="carousel-item">
                                <img class="d-block w-100" src="<?php $p = $admin->photoSplit($carRow['photoPath1']); echo $p[2] ;?>" alt="Third slide">
                                </div>
                                    <?php
                                }
                                ?>

                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                            </div>        
                        <div class="col-md-6">
                        <h1 class="display-5 fw-bolder"><?php echo $carRow['title'] ?></h1>
                        <div class="fs-5 mb-5">
                            <span class="text-decoration-line-through"></span>
                            <span><?php echo $carRow['cost'] ?> Brr</span>
                        </div>
                        <label for="exampleInputEmail1">House Or Land :  <?php echo $carRow['houseOrLand'] ?></label>

                        <label for="exampleInputEmail1">For: <?php echo $carRow['forRentOrSell'] ?></label>
                        <label for="exampleInputEmail1">City: <?php echo $carRow['city'] ?></label>
                        <label for="exampleInputEmail1">SubCity: <?php echo $carRow['subCity'] ?></label>
                        <label for="exampleInputEmail1">Wereda/Kebele: <?php echo $carRow['wereda'] ?></label>
                        <label for="exampleInputEmail1">Area: <?php echo $carRow['area'] ?> MeterSquare </label>

                        <label for="exampleInputEmail1">No of Bed Room: <?php echo $carRow['bedRoomNo'] ?></label>

                        <label for="exampleInputEmail1">Type: <?php echo $carRow['type'] ?></label>
                        <label for="exampleInputEmail1">Price Status: <?php echo $carRow['fixedOrN'] ?></label>


                        <p class="lead"><?php echo $carRow['info'] ?></p>
                        <div class="d-flex">
                            <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                            <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                <i class="bi-cart-fill me-1"></i>
                                View User
                            </button>
                        </div>
                    </div>
                </div>
            </div>
                <?php
            }elseif($_POST['type'] == 'electronics'){
                $carView = $admin->elecSinglePostViewer($pid);
                $carRow = $carView->fetch_assoc();
                ?>
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol  class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators"  data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div  class="carousel-inner">
                                <div class="carousel-item active">
                                <img class="d-block w-100" src="<?php $p = $admin->photoSplit($carRow['photoPath1']); echo $p[0] ;?>"" alt="First slide">
                                </div>

                                <?php
                                $p = $admin->photoSplit($carRow['photoPath1']);
                                if(!empty($p[1])){
                                    ?>
                                <div class="carousel-item">
                                <img class="d-block w-100" src="<?php $p = $admin->photoSplit($carRow['photoPath1']); echo $p[1] ;?>" alt="Third slide">
                                </div>
                                    <?php
                                }
                                ?>

                                <?php
                                $p = $admin->photoSplit($carRow['photoPath1']);
                                if(!empty($p[2])){
                                    ?>
                                <div class="carousel-item">
                                <img class="d-block w-100" src="<?php $p = $admin->photoSplit($carRow['photoPath1']); echo $p[2] ;?>" alt="Third slide">
                                </div>
                                    <?php
                                }
                                ?>

                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                            </div>         
                        <div class="col-md-6">
                        <h1 class="display-5 fw-bolder"><?php echo $carRow['title'] ?></h1>
                        <div class="fs-5 mb-5">
                            <span class="text-decoration-line-through"></span>
                            <span><?php echo $carRow['price'] ?> Brr</span>
                        </div>

                        <label for="exampleInputEmail1">Type: <?php echo $carRow['type'] ?></label>
                        <label for="exampleInputEmail1">Address: <?php echo $carRow['address'] ?></label>

                        <p class="lead"><?php echo $carRow['info'] ?></p>
                        <div class="d-flex">
                            <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                            <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                <i class="bi-cart-fill me-1"></i>
                                View User
                            </button>
                        </div>
                    </div>
                </div>
            </div>
                <?php
            }
        }
        
        ?>

        <!-- Related items section-->
 
            <!-- <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Related products</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div class="col mb-5">
                        <div class="card h-100"> -->
                            <!-- Product image
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            Product details
                            <div class="card-body p-4">
                                <div class="text-center">
                                    Product name
                                    <h5 class="fw-bolder">Fancy Product</h5>
                                    Product price
                                    $40.00 - $80.00
                                </div>
                            </div>
                            Product actions
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            Sale badge
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            Product image
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            Product details
                            <div class="card-body p-4">
                                <div class="text-center">
                                    Product name
                                    <h5 class="fw-bolder">Special Item</h5>
                                    Product reviews
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    Product price
                                    <span class="text-muted text-decoration-line-through">$20.00</span>
                                    $18.00
                                </div>
                            </div>
                            Product actions
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            Sale badge
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            Product image
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            Product details
                            <div class="card-body p-4">
                                <div class="text-center">
                                    Product name
                                    <h5 class="fw-bolder">Sale Item</h5>
                                    Product price
                                    <span class="text-muted text-decoration-line-through">$50.00</span>
                                    $25.00
                                </div>
                            </div>
                            Product actions
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            Product image
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            Product details
                            <div class="card-body p-4">
                                <div class="text-center">
                                    Product name
                                    <h5 class="fw-bolder">Popular Item</h5>
                                    Product reviews
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    Product price
                                    $40.00
                                </div>
                            </div>
                            Product actions
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        <!-- Footer-->

        <!-- Bootstrap core JS-->
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->
        <!-- Core theme JS-->
        <!-- <script src="js/scripts.js"></script> -->
