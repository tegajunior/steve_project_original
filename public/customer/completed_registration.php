<?php 
    require_once('../../../private/initialize.php');

    if(!isset($_GET['id'])) {
        redirect_to(url_for('/customer/new.php'));
    } else {
        $id = $_GET['id'];
    } 
    $customer = find_customer_by_id($id);   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completed Registration</title>
</head>
<body>
    <h2>Congratulations! <?php echo $customer['first_name'] . " " . $customer['last_name']; ?></h2>
    <p>
        You have successfully created an account with us. 
        Your account will be activated within 24 hours and then you will be able to use it.
        You will be notified promptly.
        Thanks for Banking with us!
    </p>
</body>
</html>