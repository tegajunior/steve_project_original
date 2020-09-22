<?php 
    require_once('../../private/initialize.php');
    if(is_post_request())   {
        $customer = [];
        $customer['first_name'] = $_POST['first_name'] ?? '';
        $customer['last_name'] = $_POST['last_name'] ?? '';
        $customer['gender'] = $_POST['gender'] ?? '';
        $customer['occupation'] = $_POST['occupation'];
        $date = new DateTime($_POST['date_of_birth']) ?? '';
        $customer['date_of_birth'] = $date->format('y-m-d');
        $customer['address'] = $_POST['address'] ?? '';
        $customer['email'] = $_POST['email'] ?? '';
        $customer['country'] = $_POST['country'] ?? '';
        $customer['phone_number'] = $_POST['phone_number'] ?? '';
        $customer['passport_url'] = 'NA';
        $customer['password'] = $_POST['password'] ?? '';
        $customer['activated'] = 0;
        $customer['balance'] = 0.0000;
        $customer['account_number'] = 'NA';

        $email_is_unique = has_unique_email($customer['email']);

        if(!$email_is_unique)   {
            $errors[] = "This email is already registered!";
        } else {

                 $result = insert_customer($customer);

                if($result === true) {
                    $new_id = mysqli_insert_id($db);
                    redirect_to(url_for('/customer/upload.php?id=' . h(u($new_id))));
                } else  {
                    $result = $errors;
            }
         }
    } else {
        //display a blank form because no form has been submitted
        $customer = [];
        $customer['first_name'] = '';
        $customer['last_name'] = '';
        $customer['gender'] = '';
        $customer['occupation'] = '';
        $customer['date_of_birth'] = '';
        $customer['address'] = '';
        $customer['email'] = '';
        $customer['country'] = '';
        $customer['phone_number'] = '';
        $customer['activated'] = '';
        $customer['balance'] = '';
    }
?>

<!-- Create Account Form -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>United Arab Bank - Register</title>
        <link rel="shortcut icon" href="<?php echo url_for('/images/favicon1.png') ?>" type="image/x-icon">

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
            <div class="login-wrapper row m-0 no-gutters">
                <!-- left section Slide -->
                <aside class="col-md-7 px-3 pt-5 mt-5">
                    <h1 class="slideHeader">
                        Welcome To UAB Corporate Online Banking
                        <hr>
                    </h1>
                </aside>
                <!-- end of left section Slide -->

                <!-- right section login -->
                <div class="login-section col-md-5 m-0 p-5">

                    <!-- login starts here! -->
                    <div class="TitleCon">
                        <p class="login-title text-center">Let's setup your account real quick!</p>
                    </div>
                    <form onsubmit="return registerLoadingSpin()" action="<?php echo url_for('/customer/new.php'); ?>" method="post">

                        <?php echo display_errors($errors); ?>

                        <input type="text" name="first_name" placeholder="First name*" required autofocus>
                        <input type="text" name="last_name" placeholder="Last name*" required>

                        <select name="gender" id="gender">
                            <option value="default">Gender*</option>
                            <option value="male">Male</option>
                            <option value="male">Female</option>
                        </select> 

                        <input type="text" name="email" placeholder="Email*" autocomplete="" required>

                        <div class="position-relative">
                            <i class="show-password fas fa-eye-slash position-absolute"></i>
                            <input type="password" class="password" id="password-one" name="password" placeholder="Password" autocomplete="off" required>
                        </div>

                        <div class="position-relative">
                            <i class="show-password fas fa-eye-slash position-absolute"></i>
                            <input type="password" class="password" id="password-two" name="confirm_password" placeholder="confirm Password" autocomplete="off" required>
                        </div>
                        
                        <input type="date" name="date_of_birth" placeholder="Date of Birth*" required>

                        <input type="text" name="occupation" placeholder="Occupation*" required>

                        <select name="country" id="country">
                            <option value="default">select-Country*</option>
                        </select>

                        <input type="text" name="address" placeholder="address*" required>

                        <input type="text" name="phone_number" placeholder="phone number*" required>

                        <div class="text-center my-2">
                            <span class="my-spin spinner-border spinner-border-lg text-success"></span>
                        </div>

                        <button class="btn form-login-btn p-2" id="login-btn" type="submit">Register</button>
                    </form>
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

        <script src="<?php echo url_for('/jsScripts/new.js') ?>"></script>
    </body>
</html>