<?php 
    require_once('../../private/initialize.php');
    $errors = [];
    $username = '';
    $password = '';

    if(is_post_request())   {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        $admin = find_admin_by_username($username);

        if ($admin) {
            # code...
            if ($password == $admin['password']) {
                # password matches
                log_in_admin($admin);
                redirect_to(url_for('/admins/index.php'));
            } else {
                # username found, but password doesn't match
                $errors[] = 'password is wrong';
            }
            
        } else {
            # username not found
            $errors[] = 'username is wrong';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="<?php echo url_for('/stylesheets/staff.css'); ?>">
</head>
<body>
    <div id="content">

        <h1>Log in</h1>
        <?php echo display_errors($errors); ?>
        <form action="<?php echo url_for('/admins/login.php'); ?>" method="post">
            Username:<br />
            <input type="text" name="username" value="<?php echo h($username); ?>" /><br />
            Password:<br />
            <input type="password" name="password" value="" /><br />
            <input type="submit" name="submit" value="Submit"  />
        </form>

    </div> 
</body>
</html>