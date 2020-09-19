<?php 
require_once('../../private/initialize.php');
$user = [];
$user['email'] = $_POST['email'];
$user['content'] = $_POST['content'];

$result = send_message_to_admin($user);

if($result === true) {
    redirect_to(url_for('/customer/index.php'));
}
?>