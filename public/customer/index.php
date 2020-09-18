<?php require_once('../../private/initialize.php'); ?>

<?php //require_customer_login(); ?>

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
    <body>
        <div class="container-fluid p-0">
        
            <!-- <div class="row no-gutters"> -->
                <aside class="d-none d-md-block p-1" id="aside">
                    <a href="#home" class="py-3 px-1 my-3 mt-5 active">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                    <a href="#services" class="py-3 px-1 my-3"><i class="far fa-money-bill-alt"></i> Withdraw
                    </a>
                    <a href="#clients" class="py-3 px-1 my-3"><i class="fa fa-fw fa-wrench"></i> Edit Profile</a>
                    <a href="#contact" class="py-3 px-1 my-3 mt-5"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </aside>

                <main class="">
                    <div class="top-head d-flex justify-content-between align-items-center position-sticky sticky-top p-3">
                        <h1 class="d-none d-md-flex">Welcome User</h1>
                        <div class="">
                            <img class="img-fluid user-image rounded-circle" src="<?php echo url_for('/images/homepage_assets/slide3.jpg'); ?>" alt="user-image">
                        </div>
                        <button class="btn btn-lg d-flex d-md-none" type="button">
                                <i class="fas fa-bars toggle-icon"></i>
                        </button>
                    </div>
                    <div class="container">
                        <p>This side navigation is of full height (100%) and always shown.</p>
                        <p>Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.</p>
                        <p>Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no molestiae voluptatibus.</p>
                    </div>
                </main>
            <!-- </div> -->
            
        </div>
    </body>
</html>

