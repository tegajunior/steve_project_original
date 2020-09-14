<?php 
require_once('../../private/initialize.php');
require_admin_login();

if(!isset($_GET['id'])) {
    redirect_to(url_for('/admins/index.php'));
}
$id = $_GET['id'];

if (is_post_request()) {
    # code...
    $to = $_POST['phone_number'] ?? '';
    $content = $_POST['content'] ?? '';
    // Send Sms Via twillo
} else {
    # code...
    $customer = find_customer_by_id($id);
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Message</title>
    <link rel="stylesheet" href="<?php echo url_for('/stylesheets/staff.css'); ?>">
</head>
<body>
    <div id="content">

        <h1>Send Message</h1>
        <?php echo display_errors($errors); ?>
        <form action="" method="post">
            To:<br />
            <input type="text" name="phone_number" value="<?php echo h($customer['phone_number']) ?>" /><br />

            Message:<br>
            <textarea name="content" id="" cols="30" rows="10"></textarea>
            <input type="submit" name="submit" value="Send Message"  />
        </form>

    </div> 
</body>
</html>