<?php

  // Performs all actions necessary to log in an admin
  function log_in_customer($customer) {
  // Renerating the ID protects the admin from session fixation.
    session_regenerate_id();
    $_SESSION['customer_id'] = $customer['id'];
    $_SESSION['last_login'] = time();
    $_SESSION['email'] = $customer['email'];
    return true;
  }

  // Performs all actions necessary to log out an admin
  function log_out_customer() {
    unset($_SESSION['customer_id']);
    unset($_SESSION['last_login']);
    unset($_SESSION['email']);
    // session_destroy(); // optional: destroys the whole session
    return true;
  }


  // is_logged_in() contains all the logic for determining if a
  // request should be considered a "logged in" request or not.
  // It is the core of require_login() but it can also be called
  // on its own in other contexts (e.g. display one link if an admin
  // is logged in and display another link if they are not)
  function customer_is_logged_in() {
    // Having a admin_id in the session serves a dual-purpose:
    // - Its presence indicates the admin is logged in.
    // - Its value tells which admin for looking up their record.
    return isset($_SESSION['customer_id']);
  }

  // Call require_login() at the top of any page which needs to
  // require a valid login before granting acccess to the page.
  function require_customer_login() {
    if(!customer_is_logged_in()) {
      redirect_to(url_for('/index.php'));
    } else {
      // Do nothing, let the rest of the page proceed
    }
  }

?>
