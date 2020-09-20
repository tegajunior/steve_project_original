<?php 
   require_once('../../private/initialize.php');
    //require_customer_login();

    /*if(!isset($_GET['id'])) {
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
    }*/
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
        <link rel="stylesheet" href="<?php echo url_for('/stylesheets/dashboard/withdraw.css'); ?>">
        
    </head>
    <body onresize="widthSize()">
        <div class="overall-wrapper container-fluid p-0">
        
            <!-- Top Header section and aside nav -->
            <div class="header-aside">
                <div class="top-head d-flex justify-content-between align-items-center p-3 flex-wrap">
                    <h1 class="user-name">Welcome <em><?php echo "user-name" ;?></em></h1>
                    <div class="d-flex flex-nowrap">
                        <img class="user-image img-fluid rounded-circle" src="<?php echo url_for('/images/homepage_assets/slide.jpg'); ?>" alt="user-image" style="height: 40px; width:40px">

                        <button class="btn btn-lg d-flex d-sm-none" id="nav-toggle" type="button">
                            <i class="fas fa-bars toggle-icon"></i>
                        </button>
                    </div>
                </div>

                <aside class="aside px-1" id="aside">
                    <div id="nav-close" class="nav-close btn btn-lg text-white d-block d-sm-none text-right">
                        <span class="px-2 bg-dark">&times</span>
                    </div>
                    <a href="<?php echo url_for('/customer/index.php'); ?>" class="py-3 px-1 mb-3">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                    <a href="<?php echo url_for('/customer/withdraw.php'); ?>" class="py-3 px-1 my-3"><i class="far fa-money-bill-alt"></i> Withdraw
                    </a>
                    <a href="<?php echo url_for('/customer/edit.php'); ?>" class="active py-3 px-1 my-3"><i class="fa fa-fw fa-wrench"></i> Edit Profile</a>
                    <a href="<?php echo url_for('/customer/logout.php'); ?>" class="py-3 px-1 my-3 mt-5"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </aside>
            </div>
            <!-- Top Header section and aside nav -->

            <main class="position-relation">
                <div class="jumbotron user-detail m-0">
                    <div class="current-banlance text-center pb-5">
                        <h3 class="current-balance m-0">Your current balance is: <br> <strong>$ <em>1000</em></strong></h3>
                    </div>

                    <!-- user Update Form -->
                    <form onsubmit="return loadingSpin()" action="" class="withdraw p-3 row no-gutters justify-content-between" method="post" autocomplete="off">
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
                            <button type="submit" class="place-withdraw btn btn-dark">Update</button>
                        </div>
                        <div class="text-center my-2 col-12">
                            <span class="my-spin spinner-border spinner-border-sm text-success"></span>
                        </div>
                    </form>
                    <!-- END of user Update Form -->

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