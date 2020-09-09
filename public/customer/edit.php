<?php 
    require_once('../../../private/initialize.php');
    require_login();

    if(!isset($_GET['id'])) {
        redirect_to(url_for(/'index.php'));
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

        $result = update_customer($customer);

        if($result === true) {
            redirect_to(url_for('/customer/show.php?id=' . h(u($id))));
        } else {
            $error = $result;
        }
    } else {
        $customer = find_customer_by_id($id);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Edit Form -->
</body>
</html>