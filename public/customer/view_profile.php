<?php require_once('../../private/initialize.php'); ?>

<?php require_customer_login();

    $customer = find_customer_by_id($_SESSION['customer_id']);
    if(!$customer) {
        redirect_to(url_for('/index.php'));
    }

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
                        <img class="user-image img-fluid rounded-circle" src="<?php echo $customer['passport_url']; ?>" alt="user-image" style="height: 40px; width:40px">

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
                        <h3 class="current-balance m-0">Profile Details</h3>
                    </div>

                    <div class="user-space row no-gutters justify-content-around">
                        <form action="" class="personal-detail">
                            <div class="form-input-wrapper row no-gutters justify-content-between">

                                <div class="passport col-12 text-center m-3">
                                    <img src="<?php echo $customer['passport_url']; ?>" alt="User Passport" class="user-passport rounded-circle">
                                </div>

                                <div class="input-wrapper col-lg-6 my-3">
                                    <label class="form-description container-fluid py-0 px-1 m-0">Firstname</label>
                                    <input type="text" class="form-value container-fluid p-1" value="<?php echo $customer['first_name']; ?>" disabled>
                                </div>

                                <div class="input-wrapper col-lg-6 my-3">
                                    <label class="form-description container-fluid py-0 px-1 m-0">Lastname</label>
                                    <input type="text" class="form-value container-fluid p-1" value="<?php echo $customer['last_name']; ?>" disabled>
                                </div>

                                <div class="input-wrapper col-lg-6 my-3">
                                    <label class="form-description container-fluid py-0 px-1 m-0">Gender</label>
                                    <input type="text" class="form-value container-fluid p-1" value="<?php echo $customer['gender']; ?>" disabled>
                                </div>

                                <div class="input-wrapper col-lg-6 my-3">
                                    <label class="form-description container-fluid py-0 px-1 m-0">Email</label>
                                    <input type="text" class="form-value container-fluid p-1" value="<?php echo $customer['email']; ?>" disabled>
                                </div>

                                <div class="input-wrapper col-lg-6 my-3">
                                    <label class="form-description container-fluid py-0 px-1 m-0">Phone Number</label>
                                    <input type="text" class="form-value container-fluid p-1" value="<?php echo $customer['phone_number']; ?>" disabled>
                                </div>

                                <div class="input-wrapper col-lg-6 my-3">
                                    <label class="form-description container-fluid py-0 px-1 m-0">Date of Birth</label>
                                    <input type="text" class="form-value container-fluid p-1" value="<?php echo $customer['date_of_birth']; ?>" disabled>
                                </div>

                                <div class="input-wrapper col-lg-6 my-3">
                                    <label class="form-description container-fluid py-0 px-1 m-0">Occupation</label>
                                    <input type="text" class="form-value container-fluid p-1" value="<?php echo $customer['occupation']; ?>" disabled>
                                </div>

                                <div class="input-wrapper col-lg-6 my-3">
                                    <label class="form-description container-fluid py-0 px-1 m-0">Country</label>
                                    <input type="text" class="form-value container-fluid p-1" value="<?php echo $customer['country']; ?>" disabled>
                                </div>

                                <div class="input-wrapper col-lg-6 my-3">
                                    <label class="form-description container-fluid py-0 px-1 m-0">Address</label>
                                    <input type="text" class="form-value container-fluid p-1" value="<?php echo $customer['address']; ?>" disabled>
                                </div>

                                <div class="input-wrapper col-lg-6 my-3">
                                    <label class="form-description container-fluid py-0 px-1 m-0">Account Number</label>
                                    <input type="text" class="form-value container-fluid p-1" value="<?php echo $customer['account_number']; ?>" disabled>
                                </div>

                                <div class="input-wrapper col-lg-6 my-3">
                                    <label class="form-description container-fluid py-0 px-1 m-0">Account Activated?</label>
                                    <input type="text" class="form-value container-fluid p-1" value="<?php
                                    if($customer['activated'] === 1) {
                                        echo "Yes";
                                    } else {
                                        echo "No";
                                    }
                                     ?>" disabled>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

                <p class="footer container-fluid pr-4 position-fixed fixed-bottom m-0 text-right">&copy; <?php echo date("Y"); ?> United Arab Bank (UAB)</p>
            </main>
            <!-- end of main section -->
            
        </div>
        <!-- end of overall container -->

        <script src="<?php echo url_for('/jsScripts/customer_nav.js') ?>"></script>
    </body>
</html>

