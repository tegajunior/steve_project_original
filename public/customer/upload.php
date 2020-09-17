<?php 
    require_once('../../private/initialize.php');
    if(!isset($_GET['id'])) {
        redirect_to(url_for('/customer/new.php'));
    } else {
        $id = $_GET['id'];
    }
    if(is_post_request())   {
        $target_dir = "/uploads";
        $file = $_FILES['my_file']['name'];
        $path = pathinfo($file);
        $filename = $path['filename'];
        $ext = $path['extension'];
        $temp_name = $_FILES['my_file']['tmp_name'];
        $path_filename_ext = $target_dir . $filename . $ext;

        //check if filename exits already
        if(file_exists($path_filename_ext)) {
            $upload_error['upload_error'] = 'File name already exist';
            redirect_to(url_for('/customer/show_error.php'));
        } else {
            move_uploaded_file($temp_name, $path_filename_ext);

            //save the url name to database
            $result = update_passport_url($path_filename_ext, $id);
            if($result === true) {
                redirect_to(url_for('/customer/completed_registration.php?id=' . h(u($id))));
            }
            
        }
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
                <div class="loginDiv col-md-5 p-0">
                    <div class="loginDivWrapper">
                        <div class="text-center pt-5 pb-3">
                            <img class="logo" src="<?php echo url_for('/images/logo.png'); ?>" alt="Logo">
                        </div>

                        <!-- login starts here! -->
                        <div class="loginCon">
                            <div class="TitleCon mb-3">
                                <p class="loginTitle text-center text-white">Uplaod Passport!</p>
                            </div>
                            <form action="">
                                <input type="text" placeholder="Username" required>
                                <input type="password" placeholder="Password" required>
                                <input type="submit" value="Upload">
                            </form>
                        </div>
                        <!-- login ends here! -->
                    </div>
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
    </body>
</html>