<?php 
    require_once('../../../private/initialize.php');
    if(is_post_request())   {
        $customer = [];
        $customer['first_name'] = $_POST['first_name'] ?? '';
        $customer['last_name'] = $_POST['last_name'] ?? '';
        $customer['gender'] = $_POST['gender'] ?? '';
        $customer['occupation'] = $_POST['occupation'];
        $customer['date_of_birth'] = $_POST['date_of_birth'] ?? '';
        $customer['address'] = $_POST['address'] ?? '';
        $customer['email'] = $_POST['email'] ?? '';
        $customer['country'] = $_POST['country'] ?? '';
        $customer['phone_number'] = $_POST['phone_number'] ?? '';
        $customer['passport_url'] = 'NA'
        $customer['password'] = $_POST['password'] ?? '';
        $customer['activated'] = 0;
        $customer['balance'] = 0.0000;
        $customer['account_number'] = 'NA';

        $result = insert_customer($customer);

        if($result === true) {
            $new_id = mysqli_insert_id($db);
            redirect_to(url_for('/customer/upload.php?id=' . h(u($new_id))))
        } else  {
            $result = $errors;
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