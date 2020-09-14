<?php

require_once('../../private/initialize.php');

require_admin_login();

$customer_set = find_all_customers();

?>

<?php $page_title = 'Admins'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="customer-listing">
    <h1>Customers</h1>

    <table class="list">
      <tr>
        <th>ID</th>
        <th>First</th>
        <th>Last</th>
        <th>Email</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

      <?php while($customer = mysqli_fetch_assoc($customer_set)) { ?>
        <tr>
          <td><?php echo h($customer['id']); ?></td>
          <td><?php echo h($customer['first_name']); ?></td>
          <td><?php echo h($customer['last_name']); ?></td>
          <td><?php echo h($customer['email']); ?></td>
          <td><a class="action" href="<?php echo url_for('/admins/show.php?id=' . h(u($customer['id']))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/admins/edit.php?id=' . h(u($customer['id']))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/admins/delete.php?id=' . h(u($customer['id']))); ?>">Delete</a></td>
          <td><a class="action" href="<?php echo url_for('/admins/message.php?id=' . h(u($customer['id']))); ?>">Message</a></td>
        </tr>
      <?php } ?>
    </table>

    <?php
      mysqli_free_result($customer_set);
    ?>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
