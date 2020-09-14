<?php

require_once('../../private/initialize.php');

require_admin_login();

$id = $_GET['id'] ?? '1'; // PHP > 7.0
$admin = find_customer_by_id($id);

?>

<?php $page_title = 'Show Customer'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/admins/index.php'); ?>">&laquo; Back to List</a>

  <div class="customer-show">

    <h1>Admin: <?php echo h($admin['username']); ?></h1>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/admins/edit.php?id=' . h(u($customer['id']))); ?>">Edit</a>
      <a class="action" href="<?php echo url_for('/admins/delete.php?id=' . h(u($customer['id']))); ?>">Delete</a>
    </div>

    <div class="attributes">
      <dl>
        <dt>Passport</dt>
        <dd><img src="<?php echo h($customer['passport_url']); ?>" alt="profile photo"></dd>
      </dl>
      <dl>
        <dt>First name</dt>
        <dd><?php echo h($customer['first_name']); ?></dd>
      </dl>
      <dl>
        <dt>Last name</dt>
        <dd><?php echo h($customer['last_name']); ?></dd>
      </dl>
      <dl>
        <dt>Gender</dt>
        <dd><?php echo h($customer['gender']); ?></dd>
      </dl>
      <dl>
        <dt>Email</dt>
        <dd><?php echo h($customer['email']); ?></dd>
      </dl>
      <dl>
        <dt>Password</dt>
        <dd><?php echo h($customer['password']); ?></dd>
      </dl>
      <dl>
        <dt>Contact:</dt>
        <dd><?php echo h($customer['phone_number']); ?></dd>
      </dl>
      <dl>
        <dt>Date of Birth</dt>
        <dd><?php echo h($customer['date_of_birth']); ?></dd>
      </dl>
      <dl>
        <dt>Address</dt>
        <dd><?php echo h($customer['address']); ?></dd>
      </dl>
      <dl>
        <dt>Country</dt>
        <dd><?php echo h($customer['country']); ?></dd>
      </dl>
      <dl>
        <dt>Occupation</dt>
        <dd><?php echo h($customer['occupation']); ?></dd>
      </dl>
      <dl>
        <dt>Account Number</dt>
        <dd><?php echo h($customer['account_number']); ?></dd>
      </dl>
      <dl>
        <dt>Activated</dt>
        <dd><?php
               if($customer['activated'] == 1)  {
                 echo 'Yes';
               } else {
                 echo 'True';
               }
            ?>
        </dd>
      </dl>
      <dl>
        <dt>Balance</dt>
        <dd><?php echo h($customer['balance']); ?></dd>
      </dl>
    </div>

  </div>

</div>
