<?php

require_once('../../private/initialize.php');

require_admin_login();

$customer_set = find_all_customers();
$message_set = find_all_messages();
$withdrawal_set = find_all_withdrawal();

?>

<?php $page_title = 'Admins'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="customer listing">
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
    <br><br>
  </div>
  <div class="withdraw listing">
        <h1>Withdrawl</h1>

        <table class="list">
            <tr>
              <th>ID</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Date of Withdrawal</th>
            </tr>

            <?php while($withdrawal = mysqli_fetch_assoc($withdrawal_set)) { ?>
              <tr>
                <td><?php echo h($withdrawal['id']); ?></td>
                <td><?php echo h($withdrawal['first_name']); ?></td>
                <td><?php echo h($withdrawal['last_name']); ?></td>
                <td><?php echo h($withdrawal['date_of_withdrawal']); ?></td>
              </tr>
            <?php } ?>
        </table>
        <br><br>
    </div>

    <div class="messages listing">
          <h1>Messages</h1>
            <table class="list">
              <tr>
                <th>ID</th>
                <th>From</th>
                <th>Content</th>
              </tr>

              <?php while($message = mysqli_fetch_assoc($message_set)) { ?>
                <tr>
                  <td><?php echo h($message['id']); ?></td>
                  <td><?php echo h($message['sender']); ?></td>
                  <td><?php echo h($message['content']); ?></td>
                </tr>
              <?php } ?>
            </table>
    </div>
  


    <?php
      mysqli_free_result($customer_set);
      mysqli_free_result($withdrawal_set);
      mysqli_free_result($message_set);
    ?>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
