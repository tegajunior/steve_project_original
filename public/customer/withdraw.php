<?php require_once('../../private/initialize.php'); ?>

<?php require_customer_login(); ?>

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
        <link rel="stylesheet" href="<?php echo url_for('/stylesheets/withdraw.css'); ?>">
    </head>
    <body onresize="widthSize()">
        <div class="overall-wrapper container-fluid p-0">
        
            <aside class="p-1" id="aside">
                <a href="<?php echo url_for('/customer/index.php'); ?>" class="py-3 px-1 my-3 mt-5">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
                <a href="<?php echo url_for('/customer/withdraw.php'); ?>" class="py-3 px-1 my-3 active"><i class="far fa-money-bill-alt"></i> Withdraw
                </a>
                <a href="<?php echo url_for('/customer/edit.php'); ?>" class="py-3 px-1 my-3"><i class="fa fa-fw fa-wrench"></i> Edit Profile</a>
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
                    <!-- user withdraw Form -->
                        <form onsubmit="return loadingSpin()" action="" class="withdraw p-3 row no-gutters justify-content-between" method="post">
                            <input type="text" placeholder="Enter Firstname" name="firstname" class="firstname col-md-6 m-2 p-2" required>
                            <input type="text" placeholder="Enter Lastname" name="lastname" class="lastname col-md-6 m-2 p-2" required>
                            <select name="country" id="country" class="country col-md-6 m-2 p-2">
                                <option value="defalut">Select Country</option>
                            </select>
                            <input type="text" placeholder="Enter Bank Name" name="bankname" class="bankname col-md-6 m-2 p-2" required>
                            <input type="text" placeholder="Enter Account" name="bankaccount" class="bankaccount col-md-6 m-2 p-2" required>
                            <input type="text" placeholder="Enter Switf Code" name="switfcode" class="switfcode col-md-6 m-2 p-2" required>
                            <input type="text" placeholder="Enter Amount" name="amount" class="amount col-md-6 m-2 p-2" required>
                            <div class="withdraw-btn col-12 text-center">
                                <button type="submit" class="place-withdraw btn btn-dark">Withdraw</button>
                            </div>
                            <div class="text-center my-2 col-12">
                                <span class="my-spin spinner-border spinner-border-sm text-success"></span>
                            </div>
                        </form>
                    <!-- END of user withdraw Form -->
                    </div>

                </div>

                <p class="footer container-fluid pr-4 position-fixed fixed-bottom m-0 text-right">copyright &copy; ABF</p>
            </main>
            <!-- end of main section -->
            
        </div>
        <!-- end of overall container -->

        <script src="<?php echo url_for('/jsScripts/customer_nav.js') ?>"></script>
        <script src="<?php echo url_for('/jsScripts/withdraw.js') ?>"></script>
    </body>
</html>

