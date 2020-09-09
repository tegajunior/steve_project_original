<?php 
    require_once('../../../private/initialize.php');
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $customer = find_customer_by_email($email);
    if($customer)   {
        //check if account has been activated
        if($customer['activated'] == 1) {
            if($password == $customer['password'])  {
                //login successfull
                login_customer($customer);
                redirect_to(url_for('/customer/index.php?id=' . h(u($customer['id']))));
            } else {
                $errors[] = 'Password and email combination does not match! try again.';
                redirect_to(url_for('/index.php'));
            }
        } else {
            $errors[] = 'Please your account has not been activated yet. Your account will be activated soon.';
            redirect_to(url_for('/index.php'));
        }
    } else {
        $errors[] = 'Sorry this email is not registered on our database!';
        redirect_to(url_for('/index.php'));
    }
?>