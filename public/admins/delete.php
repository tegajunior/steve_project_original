<?php

require_once('../../private/initialize.php');

require_admin_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/admins/index.php'));
}
$id = $_GET['id'];
$customer = find_customer_by_id($id);

if(is_post_request()) {
  $result = delete_customer($id);
  if($result) {
    //remove image from folder
    if(file_exists('../customer'. $customer['passport_url'])) {
      unlink('../customer' . $customer['passport_url'])
    } else{
      // file doesn't exist, do nothing!
    }
  }
  $_SESSION['message'] = 'Customer deleted.';
  redirect_to(url_for('/admins/index.php'));
}

?>

<?php $page_title = 'Delete Customer'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/admins/index.php'); ?>">&laquo; Back to List</a>

  <div class="customer delete">
    <h1>Delete Customer</h1>
    <p>Are you sure you want to delete this customer?</p>
    <p class="item"><?php echo h($customer['email']); ?></p>

    <form action="<?php echo url_for('/admins/delete.php?id=' . h(u($customer['id']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Customer" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
