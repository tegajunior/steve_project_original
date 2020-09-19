<?php 
    require_once('../../private/initialize.php');

    if(!isset($_GET['id'])) {
        //redirect_to(url_for('/customer/new.php'));
    } else {
        //$id = $_GET['id'];
    } 
    //$customer = find_customer_by_id($id);   
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
        <link rel="stylesheet" href="<?php echo url_for('/stylesheets/success.css') ?>">
    </head>
    <body>
        <div class="container-fluid p-0 success-container">
           
            <!-- nav bar section -->
            <?php include('../../private/shared/public_navigation.php') ?>
            <!-- END nav bar section -->

            <!-- main form section -->
            <main class="success-message alert">
                <h2 class="text-success">Email Sent!!!</h2>
                <p>
                    Please check your Email for your password recovery instructions!
                </p>
            </main>
            <!-- END of main form section -->

            <!-- footer -->
            <div class="position-fixed fixed-bottom">
                <?php // include('../../private/shared/public_footer.php') ?>
            </div>
            <!-- END of footer -->
        </div>
    </body>
</html>