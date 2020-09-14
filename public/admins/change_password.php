<?php
require_once('../../private/initialize.php');
require_admin_login();
$errors = []
if(is_post_request()) {
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    if ($new_password == $confirm_password) {
        # validated
        $result = update_admin_password($new_password);

        if($result) {
            $_SESSION['message'] = 'Password updated.';
            redirect_to(url_for('/admins/index.php'))

        }
    } else {
        # code...
        $errors[] = 'Password does not match!';
    }   
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Change Password</title>
    <link rel="stylesheet" href="<?php echo url_for('/stylesheets/staff.css'); ?>">
</head>
<body>
    <div id="content">

        <h1>Change Password</h1>
        <?php echo display_errors($errors); ?>
        <form action="<?php echo url_for('/admins/login.php'); ?>" method="post">
            New Password:<br />
            <input type="password" name="new_password" value="" /><br />
            Again:<br />
            <input type="password" name="confirm_password" value="" /><br />
            <input type="submit" name="submit" value="Change Password"  />
        </form>

    </div> 
</body>
</html>