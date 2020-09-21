<?php require_once('../../private/initialize.php'); ?>
<?php  $errors = [];?>
<?php require_customer_login();


// if(isset($_GET['id']) && !empty($_GET['id'])) {
//     $id = $_GET['id'];
// }   else {
//     redirect_to(url_for('/index.php'));
// }
//At this point, id is already set
$customer = find_customer_by_id($_SESSION['customer_id']);
if(is_post_request()) {
    if($_POST['password'] == $customer['password']) {
        $withdrawal = [];
        $withdrawal['first_name'] = $_POST['first_name'] ?? '';
        $withdrawal['last_name'] = $_POST['last_name'] ?? '';
        $withdrawal['date_of_withdrawal'] = date("Y-m-d");

        $result = insert_withdrawal($withdrawal);
        if($result == true) {
            $errors[] = "Dear " . $customer['first_name'] . ", Please Contact United Arab Bank (uab) For Your OTP";
            $errors[] = "contact@uab.in.net"; 
        } else {
            $errors[] = "unable to do work";
        }
    } else  {
            $errors[] = "Invalid password!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard - WIthdraw</title>

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
                    <a href="<?php echo url_for('/customer/index.php'); ?>" class="py-3 px-1 mb-3">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                    <a href="<?php echo url_for('/customer/withdraw.php'); ?>" class="active py-3 px-1 my-3"><i class="far fa-money-bill-alt"></i> Withdraw
                    </a>
                    <a href="<?php echo url_for('/customer/edit.php'); ?>" class="py-3 px-1 my-3"><i class="fa fa-fw fa-wrench"></i> Edit Profile</a>
                    <a href="<?php echo url_for('/customer/logout.php'); ?>" class="py-3 px-1 my-3 mt-5"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </aside>
            </div>
            <!-- Top Header section and aside nav -->

            <main class="position-relation">
                <div class="jumbotron user-detail m-0">
                    <div class="current-banlance text-center pb-5">
                        <h3 class="current-balance m-0">Your current balance is: <br> <strong>$ <em id="current-balance"><?= $customer['balance']; ?></em></strong></h3>
                    </div>

                    <!-- user withdraw Form -->
                    <form onsubmit="return compareWithdrawAmount()" action="<?php echo url_for('/customer/withdraw.php'); ?>" class="withdraw p-3 row no-gutters justify-content-between" method="post" autocomplete="off">
                        <div class="col-12 px-2 text-danger font-weight-bolder"><?php echo display_errors($errors); ?></div>

                        <input type="text" placeholder="Enter Firstname" name="first_name" class="firstname col-md-6 m-2 p-2" required>
                        <input type="text" placeholder="Enter Lastname" name="last_name" class="lastname col-md-6 m-2 p-2" required>
                        <select name="country" id="country" class="country col-md-6 m-2 p-2">
                            <option value="defalut">Select Country</option>
                        </select>
                        <input type="text" placeholder="Enter Bank Name" name="bankname" class="bankname col-md-6 m-2 p-2" required>
                        <input type="text" placeholder="Enter Bank Account Number" name="bankaccount" class="bankaccount col-md-6 m-2 p-2" required>
                        <input type="text" placeholder="Enter Switf Code" name="switfcode" class="switfcode col-md-6 m-2 p-2" required>

                        <div class="password position-relative col-md-6 m-2">
                            <i class="fas fa-eye-slash position-absolute show-password"></i>
                            <input type="password" class="password container-fluid p-2" name="password" placeholder="Password" required>
                        </div>

                        <input type="text" placeholder="Enter Amount to Withdraw" name="amount" class="amount col-md-6 m-2 p-2" id="amount" required>

                        <div class="withdraw-btn col-12 text-right">
                            <button id="withdraw" type="submit" class="place-withdraw btn btn-dark">Withdraw</button>
                        </div>
                        <div class="text-center my-2 col-12">
                            <span class="my-spin spinner-border spinner-border-sm text-success"></span>
                        </div>
                    </form>
                    <!-- END of user withdraw Form -->

                </div>

                <p class="footer container-fluid pr-4 position-fixed fixed-bottom m-0 text-right">&copy; <?php echo date("Y"); ?> United Arab Bank (UAB)</p>
            </main>
            <!-- end of main section -->
            
        </div>
        <!-- end of overall container -->

        <script src="<?php echo url_for('/jsScripts/customer_nav.js'); ?>"></script>
        <script src="<?php echo url_for('/jsScripts/withdraw.js'); ?>"></script>
    </body>
</html>

