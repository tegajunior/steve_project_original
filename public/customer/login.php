<?php 
    require_once('../../private/initialize.php');
    $errors =[];
    if(is_post_request()) {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $customer = find_customer_by_email($email);
    if($customer)   {
        //check if account has been activated
        if($customer['activated'] == 0) {
            if($password == $customer['password'])  {
                // //login successfull
                 log_in_customer($customer);
                redirect_to(url_for('/customer/index.php?id=' . h(u($customer['id']))));
                echo 'email and password is correct';
            } else {
                  $errors[] = 'Password and email combination does not match! try again.';
                 
            }
        } else {
            // $errors[] = 'Please your account has not been activated yet. Your account will be activated soon.';
            // redirect_to(url_for('/index.php'));
            echo 'case 2';
        }
    } else {
         $errors[] = 'Sorry this email is not registered on our database!';
        //  redirect_to(url_for('/customer/login.php'));
    }
} else {
    // echo "hello";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dubai | Login</title>
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
        <link rel="stylesheet" href="<?php echo url_for('/stylesheets/login.css') ?>">
    </head>
    <body>
        <div class="container-fluid p-0 login-container">
           
            <!-- nav bar section -->
            <?php include('../../private/shared/public_navigation.php') ?>
            <!-- END nav bar section -->

            <!-- main form section -->
            <div class="login-wrapper row m-0 no-gutters align-items-center">
                <!-- left section Slide -->
                <div class="slide col-md-7 px-3">
                    <h1 class="slideHeader">
                        Welcome to Abu-Dhabi Finance
                        <hr>
                    </h1>
                    <p class="">The Financial Institute you can trust</p>
                </div>
                <!-- end of left section Slide -->

                <!-- right section login -->
                <div class="login-section col-md-5 m-0 p-5">
                    <div class="text-center pb-4">
                        <img class="logo" src="<?php echo url_for('/images/logo.png'); ?>" alt="Logo">
                    </div>

                    <!-- login starts here! -->
                    <div class="login-form p-3">
                        <div class="TitleCon">
                            <h3 class="login-title text-center text-white">Welcome!</h3>
                            <?php echo display_errors($errors); ?>
                        </div>
                        <form onsubmit="loadingSpin()" action="<?php echo url_for('/customer/login.php'); ?>" method="post">
                            <input type="text" name="email" placeholder="Email" autocomplete="" autofocus required>

                            <div class="position-relative">
                                <i class="fas fa-eye-slash position-absolute show-password"></i>
                                <input type="password" class="password" name="password" placeholder="Password" autocomplete="off" required>
                            </div>
                            
                            <p class="login-forget text-right">Forgot <a href="<?php echo url_for('/index.php/#contact') ?>" class="login-anchor">Email</a> or <a href="<?php echo url_for('/index.php/#contact') ?>" class="login-anchor">Password?</a></p>

                            <button class="btn form-login-btn p-2" id="login-btn" type="submit">Login</button>
                            <div class="text-center my-2">
                                <span class="my-spin spinner-border spinner-border-sm text-success"></span>
                            </div>

                            <p class="login-reg text-center">Yet to Register? <a href="<?php echo url_for('/customer/new.php'); ?>" class="login-anchor">Sign Up</a></p>
                        </form>
                    </div>
                    <!-- login ends here! -->
                </div>
                <!-- end of right section login -->
            </div>
            <!-- END of main form section -->

            <!-- footer -->
            <div class="position-fixed fixed-bottom">
                <?php include('../../private/shared/public_footer.php') ?>
            </div>
            <!-- END of footer -->
        </div>

        <script src="<?php echo url_for('/jsScripts/login.js') ?>"></script>
    </body>
</html>