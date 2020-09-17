<?php require_once('../private/initialize.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dubai</title>
    <link rel="shortcut icon" href="<?php echo url_for('/images/favicon.png') ?>" type="image/x-icon">

    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/4ea96ace4f.js" crossorigin="anonymous"></script>

    <!-- my css file -->
    <link rel="stylesheet" href="<?php echo url_for('/stylesheets/public_navigation.css') ?>">
    <link rel="stylesheet" href="<?php echo url_for('/stylesheets/index.css') ?>">
    
</head>
<body>
    <div class="container-fluid p-0">
        <!-- nav bar section -->
        <?php include('../private/shared/public_navigation.php') ?>
         <!-- END nav bar section -->

         <!-- slideshow section -->
         <div id="demo" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner" id="goto-home">
            <div class="carousel-item active">
                <img src="https://media.istockphoto.com/photos/businessman-keeping-the-united-arab-emirates-banknote-money-in-his-picture-id947648864?k=6&m=947648864&s=612x612&w=0&h=DpojOtg4rK9hCPC14NJ_9sL3F5Q2nnuRM1kwbp7hWJ8=" class="img-fluid" alt="Dubai Currency">
                <div class="carousel-caption">
                    <h3>Abu-dhabi Dubai</h3>
                    <p>Experiencing good business</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?php echo url_for('/images/homepage_assets/slide2.jpg'); ?>" class="img-fluid" alt="Dubai Currency">
                <div class="carousel-caption">
                    <h3>Dubai</h3>
                    <p>Investing in the future</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?php echo url_for('/images/homepage_assets/slide3.jpeg'); ?>" class="img-fluid" alt="Business Talk">
                <div class="carousel-caption">
                    <p>No limit to your cash</p>
                </div>
            </div>
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
            </a>
        </div>
         <!-- END of slide show section -->

         <!-- customized-banking  section -->
         <div class="customized-banking container p-3 text-center">
             <h4 class="pt-5 text-danger">CUSTOMIZED BANKING SOLUTIONS</h4>
             <h2 class="pb-5 mt-4">A truly unique banking experience</h2>
             <p class="mb-2">A new personalized online banking experience right at your fingertips. Take advantage of our new online features specifically tailored with your needs in mind ranging from bill payments, transfers, financial management and online applications.</p> 

             <div class="what-you-can-do row no-gutters justify-content-between">
                <div class="col-md-3 p-2 my-2">
                    <i class="fas fa-users fa-5x d-block my-3"></i>
                    <a href="">Manage all your accounts</a>
                    <hr>
                </div>
                <div class="col-md-3 p-2 my-2">
                    <i class="fas fa-door-open fa-5x d-block my-3"></i>
                    <a href="">Apply Online</a>
                    <hr>
                </div>
                <div class="col-md-3 p-2 my-2">
                    <i class="fas fa-chart-line fa-5x d-block my-3"></i>
                    <a href="">Budget and Track</a>
                    <hr>
                </div>
                <div class="col-md-3 p-2 my-2">
                    <i class="fas fa-people-carry fa-5x d-block my-3"></i>
                    <a href="">Easy Withdraw</a>
                    <hr>
                </div>
            </div>

         </div>
         <!--END of customized-banking  section -->

         <!--mobilebanking  section -->
         <div class="mobile-banking container-fluid p-5 row no-gutters justify-content-end text-white">
            <div class="col-12 col-sm-8 col-lg-5 p-2 p-md-5">
                <p class="py-3">Bank anytime, anywhere with new CBD Mobile Banking App</p>
                <h3 class="py-3">Enjoy the convenience of banking on the move, wherever you are, from your mobile device.</h3>
                <ul class="list-unstyled">
                    <li class="my-2">Check account balance, transaction history</li>
                    <li class="my-2">Transfer funds to other UAE Banks</li>
                    <li class="my-2">Apply for products</li>
                </ul>
                <button class="btn btn-danger">Learn more ></button>
            </div>
         </div>
         <!--END of mobilebanking  section -->

         <!--About  section -->
         <div class="about-section container py-3" id="about">
            <div class="header-wrapper my-2">
                <h1 class="section-header text-center">About Us</h1>
                <hr class="header-rule">
            </div>
            <div class="row no-gutters align-items-center py-2">
                <div class="col-md-3 text-center text-md-left my-3">
                    <img src="<?php echo url_for('/images/homepage_assets/about-image-1.jpeg'); ?>" class="img-fluid">
                </div>
                <div class="col-md-9 px-2">
                    <p>Commercial Bank of Dubai is a UAE banking and financial services corporation headquartered in Deira, Dubai. With more than $23 billion in assets, Gulf Business listed CBD as the 7th largest bank in the UAE, based on total assets. It also figures in the Dubai Financial Market index.</p>
                </div>
            </div>
            <div class="row no-gutters align-items-center py-2">
                <div class="col-md-3 text-center text-md-left my-3">
                    <img src="<?php echo url_for('/images/homepage_assets/about-image-2.jpeg'); ?>" class="img-fluid">
                </div>
                <div class="col-md-9 px-2">
                    <p>Established as a public institution with an independent legal entity by virtue of Decree 14/2000 issued by the Government of Dubai, the DFM lanched its activities on 26th March 2000.</p>
                    <p>within a short period of time, the Dubai Finanical Market(DFM) has fast developed into a leading financial market across the region. its ongoing efforts and strategic initiatives have further reinforced Dubai as a centre of excellence in this part of the world and enhanced its leading postion as a powerful capital market hub which embraces international best practices to meet the evolving needs of its investors locally and internationally.</p>
                    <p>DFM operates as a secondary market for the trading of securities issued by public shareholding companies, bonds issued by federal or local governments, local public institutions and mutual funds as wel as other local or foreign DFM approved financial instruments.</p>
                    <p>The Dubai Financial Market(DFM) is governed and regulated by the UAE Securities and Commodities Authority (SCA) which has the authority to impose laws and standards which the DFM must comply</p>
                </div>
            </div>
         </div>
         <!--END of About  section -->

         <!-- contact us section -->
         <div class="font-family: 'Roboto', sans-serif;font-family: 'Roboto', sans-serif; container py-3" id="contact">
            <div class="header-wrapper my-2">
                <h1 class="section-header text-center">Contact Us</h1>
                <hr class="header-rule">
            </div>
            <div class="row no-gutters align-items-center py-2">
                <div class="col-md-6 text-center text-md-left">
                    <div class="my-3">
                        <i class="fas fa-phone-alt fa-2x"></i>
                        <span>+223 000 000 000</span>
                    </div>
                    <div class="my-3">
                        <i class="fas fa-mail-bulk fa-2x"></i>
                        <span>12345@gmail.com.ng</span>
                    </div>
                    <h3 class="contact-side mb-3">An easier way to get to us</h3>
                </div>
                <form class="col-md-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text">Email</span>
                        </div>
                        <input type="text" class="form-control px-3" placeholder="enter your email here!">
                    </div>
                    <textarea rows="10" class="contact-textarea container-fluid p-2">enter your comment here!</textarea>

                    <div class="text-right">
                        <button class="contact-submit btn btn-danger mt-2">Send</button>
                    </div>
                </form>
            </div>
        </div>
         <!-- END of contact us section -->

         <!-- footer -->
         <?php include('../private/shared/public_footer.php') ?>
         <!-- END of footer -->
    </div>

    <script src="<?php echo url_for('/jsScripts/index.js') ?>"></script>
</body>
</html>