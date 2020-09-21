<?php require_once('../../private/initialize.php'); ?>

<?php require_customer_login();

// if(isset($_GET['id']) && !empty($_GET['id'])) {
//     $id = $_GET['id']; 
// } else {
//     redirect_to(url_for('/customer/login.php'));
// }
//At this point, the user is logged in and the id has been retrieved
$customer = find_customer_by_id($_SESSION['customer_id']);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>

        <!-- CSS only -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <!-- JS, Popper.js, and jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

        <!-- font awesome -->
        <script src="https://kit.fontawesome.com/4ea96ace4f.js" crossorigin="anonymous"></script>

        <!-- my css file -->
        <link rel="stylesheet" href="<?php echo url_for('/stylesheets/dashboard/top_section.css'); ?>">
        <link rel="stylesheet" href="<?php echo url_for('/stylesheets/dashboard/index.css'); ?>">
        
    </head>
    <body onresize="widthSize()">
        <div class="overall-wrapper container-fluid p-0">

            <!-- Top Header section and aside nav -->
            <div class="header-aside">
                <div class="top-head d-flex justify-content-between align-items-center p-3 flex-wrap">
                    <h1 class="user-name">Welcome <em><?php echo $customer['first_name'] ;?></em></h1>
                    <div class="d-flex flex-nowrap">
                        <img class="user-image img-fluid rounded-circle" src="<?php echo $customer['passport_url']; ?>" alt="user-image">

                        <button class="btn btn-lg d-flex d-sm-none" id="nav-toggle" type="button">
                            <i class="fas fa-bars toggle-icon"></i>
                        </button>
                    </div>
                </div>

                <aside class="aside px-1" id="aside">
                    <div id="nav-close" class="nav-close btn btn-lg text-white d-block d-sm-none text-right">
                        <span class="px-2 bg-dark">&times</span>
                    </div>
                    <a href="<?php echo url_for('/customer/index.php'); ?>" class="active py-3 px-1 mb-3">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                    <a href="<?php echo url_for('/customer/withdraw.php'); ?>" class="py-3 px-1 my-3"><i class="far fa-money-bill-alt"></i> Withdraw
                    </a>
                    <a href="<?php echo url_for('/customer/edit.php'); ?>" class="py-3 px-1 my-3"><i class="fa fa-fw fa-wrench"></i> Edit Profile</a>
                    <a href="<?php echo url_for('/customer/logout.php'); ?>" class="py-3 px-1 my-3 mt-5"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </aside>
            </div>
            <!-- Top Header section and aside nav -->

            <main class="position-relation">
                <div class="jumbotron user-detail m-0">
                    <div class="current-banlance text-center pb-5">
                        <h3 class="current-balance m-0">Your current balance is: <br> <strong>$ <em><?php echo $customer['balance']?></em></strong></h3>
                    </div>

                    <div class="user-space row no-gutters justify-content-around">

                        <a href="<?php echo url_for('/customer/view_profile.php'); ?>" class="btn card m-3 p-3 col-10 col-lg-5">
                            <i class="fas fa-user-circle fa-5x mx-auto my-3 card-image-top"></i>
                            <div class="card-body">
                                <h3 class="card-title text-center">View Profile</h3>
                            </div>
                        </a>
                    
                        <div class="btn card m-3 p-3 col-10 col-lg-5" data-toggle="modal" data-target="#contact-us">
                            <i class="fas fa-id-card-alt fa-5x mx-auto my-3 card-image-top"></i>
                            <div class="card-body">
                                <h3 class="card-title text-center">Contact Us</h3>
                            </div>
                        </div>
                        
                        <div class="btn card m-3 p-3 col-10 col-lg-5" data-toggle="modal" data-target="#user-account-number">
                            <i class="fas fa-money-bill-alt fa-5x mx-auto my-3 card-image-top"></i>
                            <div class="card-body">
                                <h3 class="card-title text-center">View Account Number</h3>
                            </div>
                        </div>

                        <a href="<?php echo url_for('/customer/change_password.php'); ?>" class="btn card m-3 p-3 col-10 col-lg-5">
                            <i class="fas fa-lock fa-5x mx-auto my-3 card-image-top"></i>
                            <div class="card-body">
                                <h3 class="card-title text-center">Change Password</h3>
                            </div>
                        </a>

                    </div>
                </div>

                <p class="footer container-fluid pr-4 position-fixed fixed-bottom m-0 text-right">
                &copy; <?php echo date("Y"); ?> United Arab Bank (UAB)
                </p>
    
            </main>
            <!-- end of main section -->


            <!-- The Modal for Contact Us -->
            <div class="modal" id="contact-us">
                <div class="modal-dialog">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Our Contact</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        contact@uab.in.net
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    </div>

                    </div>
                </div>
            </div>
            <!-- END of The Modal for Contact Us -->

            <!-- The Modal for User Account Number -->
            <div class="modal" id="user-account-number">
                <div class="modal-dialog">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">User Account Number</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <?php echo $customer['account_number']; ?>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    </div>

                    </div>
                </div>
            </div>
            <!-- END of The Modal for User Account Number -->
            
        </div>
        <!-- end of overall container -->

        <script src="<?php echo url_for('/jsScripts/customer_nav.js') ?>"></script>
    </body>
</html>

