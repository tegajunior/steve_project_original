<?php

require_once('../../private/initialize.php');

require_admin_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/admins/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {
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
  //the three fields below should be hidden to the customer edit form
  //but visible to the admin edit form
  $customer['balance'] = $_POST['balance'] ?? '';
  $customer['account_number'] = $_POST['account_number'] ?? '';
  $customer['activated'] = $_POST['activated'];

  $result = update_customer($customer);
  if($result === true) {
    $_SESSION['message'] = 'Customer updated.';
    redirect_to(url_for('/admins/show.php?id=' . $id));
  } else {
    $errors = $result;
  }
} else {
  $customer = find_customer_by_id($id);
}

?>

<?php $page_title = 'Edit Customer'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/admins/index.php'); ?>">&laquo; Back to List</a>

  <div class="customer edit">
    <h1>Edit Customer</h1>

    <?php echo display_errors($errors); ?>

    <form action="<?php echo url_for('/admins/edit.php?id=' . h(u($id))); ?>" method="post">
      <dl>
        <dt>First name</dt>
        <dd><input type="text" name="first_name" value="<?php echo h($customer['first_name']); ?>" /></dd>
      </dl>

      <dl>
        <dt>Last name</dt>
        <dd><input type="text" name="last_name" value="<?php echo h($customer['last_name']); ?>" /></dd>
      </dl>

      <dl>
        <dt>Username</dt>
        <dd><input type="text" name="gender" value="<?php echo h($customer['gender']); ?>" /></dd>
      </dl>

        <dl>
          <dt>Occupation</dt>
          <dd><input type="text" name="occupation" value="<?php echo h($customer['occupation']); ?>"></dd>
        </dl>

        <dl>
          <dt>Gender</dt>
          <dd><input type="hidden" name="date_of_birth" value="<?php echo h($customer['date_of_birth']); ?>"></dd>
        </dl>

        <dl>
          <dt>Address</dt>
          <dd><input type="text" name="address" value="<?php echo h($customer['address']); ?>"></dd>
        </dl>

        <dl>
          <dt>Country</dt>
          <dd><input type="hidden" name="country" value="<?php echo h($customer['country']); ?>"></dd>
        </dl>

        <dl>
          <dt>Phone Number</dt>
          <dd><input type="text" name="phone_number" value="<?php echo h($customer['phone_number']); ?>"></dd>
        </dl>
        <dl>
          <dt>Password</dt>
          <dd><input type="password" name="password" value="<?php echo h($customer['password']); ?>"></dd>
      </dl>
        <dl>
          <dt>Balance</dt>
          <dd><input type="text" name="balance" value="<?php echo h($customer['balance']); ?>"></dd>
        </dl>

      <dl>
        <dt>Account Number</dt>
        <dd><input type="text" name="account_number" value="<?php echo h($customer['account_number']); ?>"></dd>
      </dl>

      <dl>
        <dt>Activated</dt>
        <dd><input type="text" name="activated" value="<?php echo h($customer['activated']); ?>"></dd>
      </dl>


      <div id="operations">
        <input type="submit" value="Edit Customer" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
