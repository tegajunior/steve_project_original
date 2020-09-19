<?php 
   /* require_once('../../private/initialize.php');
    require_customer_login();

    if(!isset($_GET['id'])) {
        redirect_to(url_for('/index.php'));
    }
    $id = $_GET['id'];

    if(is_post_request()) {
        //handles post request from a user
        $customer = [];
        $customer['id'] = $id;
        $customer['first_name'] = $_POST['first_name'] ?? '';
        $customer['last_name'] = $_POST['last_name'] ?? '';
        $customer['gender'] = $_POST['gender'] ?? '';
        $customer['occupation'] = $_POST['occupation'];
        $customer['date_of_birth'] = $_POST['date_of_birth'] ?? '';
        $customer['address'] = $_POST['address'] ?? '';
        $customer['country'] = $_POST['country'] ?? '';
        $customer['phone_number'] = $_POST['phone_number'] ?? '';
        $customer['password'] = $_POST['password'] ?? '';
        //the three fields below should be hidden to the customer edit form
        //but visible to the admin edit form
        $customer['balance'] = $_POST['balance'] ?? '';
        $customer['account_number'] = $_POST['account_number'] ?? '';
        $customer['activated'] = $_POST['activated'];

        $result = update_customer($customer);

        if($result === true) {
            redirect_to(url_for('/customer/show.php?id=' . h(u($id))));
        } else {
            $error = $result;
        }
    } else {
        $customer = find_customer_by_id($id);
    } */
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
        <link rel="stylesheet" href="<?php echo url_for('/stylesheets/dashboard_index.css'); ?>">
    </head>
    <body onresize="widthSize()">
        <div class="overall-wrapper container-fluid p-0">
        
            <aside class="p-1" id="aside">
                <a href="<?php echo url_for('/customer/index.php'); ?>" class="py-3 px-1 my-3 mt-5">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
                <a href="<?php echo url_for('/customer/withdraw.php'); ?>" class="py-3 px-1 my-3"><i class="far fa-money-bill-alt"></i> Withdraw
                </a>
                <a href="<?php echo url_for('/customer/edit.php'); ?>" class="py-3 px-1 my-3 active"><i class="fa fa-fw fa-wrench"></i> Edit Profile</a>
                <a href="#contact" class="py-3 px-1 my-3 mt-5"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </aside>

            <main class="position-relation">
                <div class="top-head d-flex justify-content-between align-items-center position-sticky sticky-top p-3">
                    <h1 class="d-none d-sm-flex">Welcome User</h1>
                    <div class="">
                        <img class="img-fluid user-image rounded-circle" src="<?php echo url_for('/images/homepage_assets/slide3.jpg'); ?>" alt="user-image">
                    </div>
                    <button class="btn btn-lg d-flex d-sm-none" id="nav-toggle" type="button">
                            <i class="fas fa-bars toggle-icon"></i>
                    </button>
                </div>
                <div class="jumbotron user-detail m-0">
                    <div class="current-banlance text-center pb-5">
                        <h3 class="current-balance m-0">Your current balance is: <br> <strong>$ <em>1000</em></strong></h3>
                    </div>

                    <div class="user-menu row no-gutters justify-content-around">

                        <div class="btn card m-3 m-xl-0 p-3 col-10 col-lg-5 col-xl-3" data-toggle="modal" data-target="#user-profile">
                            <i class="fas fa-user-circle fa-5x mx-auto my-3 card-image-top"></i>
                            <div class="card-body">
                                <h3 class="card-title text-center">View Profile</h3>
                                <!-- <button class="btn m-auto d-block">View Profile</button> -->
                            </div>
                        </div>
                    
                        <div class="btn card m-3 m-xl-0 p-3 col-10 col-lg-5 col-xl-3" data-toggle="modal" data-target="#contact-us">
                            <i class="fas fa-id-card-alt fa-5x mx-auto my-3 card-image-top"></i>
                            <div class="card-body">
                                <h3 class="card-title text-center">Contact Us</h3>
                                <!-- <button class="btn m-auto d-block">Contact Us</button> -->
                            </div>
                        </div>
                        
                        <div class="btn card m-3 m-xl-0 p-3 col-10 col-lg-5 col-xl-3" data-toggle="modal" data-target="#user-account-number">
                            <i class="fas fa-money-bill-alt fa-5x mx-auto my-3 card-image-top"></i>
                            <div class="card-body">
                                <h3 class="card-title text-center">View Account Number</h3>
                                <!-- <button class="btn m-auto d-block">View Account Number</button> -->
                            </div>
                        </div>

                    </div>
                </div>

                <p class="footer container-fluid pr-4 position-fixed fixed-bottom m-0 text-right">copyright &copy; ABF</p>
            </main>
            <!-- end of main section -->

            <!-- The Modal for User Profile -->
            <div class="modal" id="user-profile">
                <div class="modal-dialog">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">User Details</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        Modal body..
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    </div>

                    </div>
                </div>
            </div>
            <!-- END of The Modal for User Profile -->

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
                        Modal body..
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
                        Modal body..
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