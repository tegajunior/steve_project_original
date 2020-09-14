<?php
  if(!isset($page_title)) { $page_title = 'Staff Area'; }
?>

<!doctype html>

<html lang="en">
  <head>
    <title>My Bank - <?php echo h($page_title); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/staff.css'); ?>" />
  </head>

  <body>
    <header>
      <h1>GBI Staff Area</h1>
    </header>

    <nav>
      <ul>
        <li>User: <?php echo $_SESSION[' admin_username'] ?? ''; ?></li>
        <li><a href="<?php echo url_for('/admins/change_password.php'); ?>">Change Password</a></li>
        <li><a href="<?php echo url_for('/admins/logout.php'); ?>">Logout</a></li>
      </ul>
    </nav>

    <?php echo display_session_message(); ?>