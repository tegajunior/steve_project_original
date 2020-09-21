<?php require_once('../../private/initialize.php'); 
$errors = [];

if(is_post_request()) {
    // recovery form submitted
        //email is submitted and it is not empty
        $email = $_POST['email'];
        $customer = find_customer_by_email($email);
        if ($customer) {
            //customer has account with us
            //generate password reset token
            
            $expFormat = mktime(
                date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
                );
            $expDate = date("Y-m-d H:i:s",$expFormat);
            $key = md5(2418*2+$email);
            $addKey = substr(md5(uniqid(rand(),1)),3,10);
            $key = $key . $addKey;

            //insert reset token
            $result = insert_reset_info($email, $key, $expDate);

            if($result == true) {    
                $output='<p>Dear user,</p>';
                $output.='<p>Please click on the following link to reset your password.</p>';
                $output.='<p>-------------------------------------------------------------</p>';
                $output.='<p><a href="https://www.uab.in.net/customer/reset-password.php?
                key='.$key.'&email='.$email.'&action=reset" target="_blank">
                https://www.uab.in.net/customer/reset-password.php
                ?key='.$key.'&email='.$email.'&action=reset</a></p>'; 
                $output.='<p>-------------------------------------------------------------</p>';
                $output.='<p>Please be sure to copy the entire link into your browser.
                The link will expire after 1 day for security reasons.</p>';
                $output.='<p>If you did not request this forgotten password email, no action 
                is needed, your password will not be reset. However, you may want to log into 
                your account and change your security password as someone may have guessed it.</p>';   
                $output.='<p>Thanks,</p>';
                $output.='<p>United Arab Bank</p>';
                $body = $output; 
                $subject = "Password Recovery - United Arab Bank";

                
                $email_to = $email;
                $subject = 'Password Recovery';
                $headers = [];
                $headers[] = 'From: contact@uab.in.net';
                $headers[] = 'Content-type: text/html; charset=utf-8';
                $headers[] = 'Reply-to: contact@uab.in.net';
                $authorized = "-fcontact@uab.in.net";
                $headers = implode("\r\n", $headers);
                $body = wordwrap($body, 70);

                $send_mail = mail($email_to, $subject, $body, $headers, $authorized);
                if ($send_mail) {
                    # mail was sent successfully
                    redirect_to(url_for('/customer/password_recovery_success.php?by=' . h(u($email))));
                } else {
                    # mail wasn't sent
                    $errors[] = "Please try again some other time";
                }
             }  

            }  else {
                $errors[] = 'Sorry your email is not registered with us';
                } 
} 

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>United Arab Bank - Recover Password</title>
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
            <div class="login-wrapper row m-0 no-gutters p-0">
                <!-- left section Slide -->
                <aside class="col-md-7 px-3 pt-5 mt-5">
                    <h1 class="slideHeader">
                    Welcome To UAB Corporate Online Banking, lets help you recover your password
                        <hr>
                    </h1>
                </aside>
                <!-- end of left section Slide -->

                <!-- right section login -->
                <div class="login-section col-md-5 m-0 p-5">

                    <!-- login starts here! -->
                    <div class="TitleCon">
                        <h3 class="login-title text-center">Welcome!</h3>
                    </div>
                    <form onsubmit="loadingSpin()" action="<?php echo url_for('/customer/password_recovery.php'); ?>" method="post">
                        <?php echo display_errors($errors); ?>
                        <input type="text" name="email" placeholder="Email" autocomplete="false" required>

                        <button class="btn form-login-btn p-2" id="login-btn" type="submit">Submit</button>
                        <div class="text-center my-2">
                            <span class="my-spin spinner-border spinner-border-lg text-success"></span>
                        </div>
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

        <script src="<?php echo url_for('/jsScripts/login.js') ?>"></script>
    </body>
</html>