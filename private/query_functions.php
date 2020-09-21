<?php

/*____________steve_project_______*/


/*____________Customer_________*/
  function insert_customer($customer) {
    global $db;

    $sql = "INSERT INTO customers ";
    $sql .= "(first_name, last_name, gender, occupation, date_of_birth, address, email,
              country, phone_number, password, passport_url, activated, balance, account_number) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $customer['first_name']) . "',";
    $sql .= "'" . db_escape($db, $customer['last_name']) . "',";
    $sql .= "'" . db_escape($db, $customer['gender']) . "',";
    $sql .= "'" . db_escape($db, $customer['occupation']) . "',";
    $sql .= "'" . db_escape($db, $customer['date_of_birth']) . "',";
    $sql .= "'" . db_escape($db, $customer['address']) . "',";
    $sql .= "'" . db_escape($db, $customer['email']) . "',";
    $sql .= "'" . db_escape($db, $customer['country']) . "',";
    $sql .= "'" . db_escape($db, $customer['phone_number']) . "',";
    $sql .= "'" . db_escape($db, $customer['password']) . "',";
    $sql .= "'" . db_escape($db, $customer['passport_url']) . "',";
    $sql .= "'" . db_escape($db, $customer['activated']) . "',";
    $sql .= "'" . db_escape($db, $customer['balance']) . "',";
    $sql .= "'" . db_escape($db, $customer['account_number']) . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function update_passport_url($path_filename_ext, $id) {
    global $db;

    $sql = "UPDATE customers SET ";
    $sql .= "passport_url = '" . db_escape($db, $path_filename_ext) . "' ";
    $sql .= "WHERE id = '" . db_escape($db, $id) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    //for UPDATE AND INSERT, $result is true or false
    if($result) {
      return true;
    } else  {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;      
    }
  }

  function find_customer_by_id($id) {
    global $db;

    $sql = "SELECT * FROM customers ";
    $sql .= "WHERE id = '" . db_escape($db, $id) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $customer = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $customer;
  }

  function update_customer($customer) {
    global $db;

    $sql = "UPDATE customers SET ";
    $sql .= "first_name='" . db_escape($db, $customer['first_name']) . "', ";
    $sql .= "last_name='" . db_escape($db, $customer['last_name']) . "', ";
    $sql .= "gender='" . db_escape($db, $customer['gender']) . "', ";
    $sql .= "occupation='" . db_escape($db, $customer['occupation']) . "', ";
    $sql .= "date_of_birth='" . db_escape($db, $customer['date_of_birth']) . "', ";
    $sql .= "address='" . db_escape($db, $customer['address']) . "', ";
    $sql .= "phone_number='" . db_escape($db, $customer['phone_number']) . "', ";
    $sql .= "country='" . db_escape($db, $customer['country']) . "', ";
    $sql .= "password='" . db_escape($db, $customer['password']) . "', ";
    $sql .= "balance='" . db_escape($db, $customer['balance']) . "', ";
    $sql .= "account_number='" . db_escape($db, $customer['account_number']) . "', ";
    $sql .= "activated='" . db_escape($db, $customer['activated']) . "' ";
    $sql .= "WHERE id='" . db_escape($db, $customer['id']) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);

    // For UPDATE statements, $result is true or false
    if($result) {
      return true;
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function update_customer_2($customer) {
    global $db;
    
    $sql = "UPDATE customers SET ";
    $sql .= "first_name='" . db_escape($db, $customer['first_name']) . "',";
    $sql .= "last_name='" . db_escape($db, $customer['last_name']) . "',";
    $sql .= "phone_number='" . db_escape($db, $customer['phone_number']) . "',";
    $sql .= "occupation='" . db_escape($db, $customer['occupation']) . "' ";
    $sql .= "WHERE id='" . db_escape($db, $customer['id']) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);

    
    // For UPDATE statements, $result is true or false
    if($result) {
      return true;
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }

  }

  function update_customer_password($id, $new_password)  {
    global $db;

    $sql = "UPDATE customers ";
    $sql .= "SET password ='" . db_escape($db, $new_password) . "' ";
    $sql .= "WHERE id ='" . db_escape($db, $id) . "' ";
    $sql .= "LIMIT 1";
    
    $result = mysqli_query($db, $sql);

        // For UPDATE statements and INSERT statements, $result is true or false
    if($result) {
      return true;
      } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
    
  }


  function find_customer_by_email($email) {
    global $db;

    $sql = "SELECT * FROM customers ";
    $sql .= "WHERE email = '" . db_escape($db, $email) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $customer = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $customer;
  }


  // Find all customers, ordered last_name, first_name
  function find_all_customers() {
    global $db;

    $sql = "SELECT * FROM customers ";
    $sql .= "ORDER BY first_name ASC, last_name ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }


  function delete_customer($id) {
    global $db;
  
    $sql = "DELETE FROM customers ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
    $sql .= "LIMIT 1;";
    $result = mysqli_query($db, $sql);

    // For DELETE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // DELETE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }
  /*________Admin__________*/
  
  function find_admin_by_username($username) {
    global $db;

    $sql = "SELECT * FROM admins ";
    $sql .= "WHERE username='" . db_escape($db, $username) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $admin = mysqli_fetch_assoc($result); // find first
    mysqli_free_result($result);
    return $admin; // returns an assoc. array
  }

  function send_message_to_admin($user) {
    global $db;

    $sql = "INSERT INTO messages ";
    $sql .= "(sender, content) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $user['email']) . "',";
    $sql .= "'" . db_escape($db, $user['content']) . "'";
    $sql .= ")";

    $result = mysqli_query($db, $sql);

    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function insert_reset_info($email, $key, $expDate) {
    global $db;


    $sql = "INSERT INTO password_reset_temp ";
    $sql .= "(email, my_key, expDate) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $email) . "',";
    $sql .= "'" . db_escape($db, $key) . "',";
    $sql .= "'" . db_escape($db, $expDate) . "'";
    $sql .= ")";

    $result = mysqli_query($db, $sql);

    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
    
  }

  function find_all_messages() {
    global $db;

    $sql = "SELECT * FROM messages ";
    $sql .= "ORDER BY id";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;

  }

  function find_all_withdrawal() {
    global $db;

    $sql = "SELECT * FROM withdrawals ";
    $sql .= "ORDER BY id";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }
  function insert_withdrawal($withdrawal) {
    global $db;

    $sql = "INSERT INTO withdrawals ";
    $sql .= "(first_name, last_name, date_of_withdrawal) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $withdrawal['first_name']) . "',";
    $sql .= "'" . db_escape($db, $withdrawal['last_name']) . "',";
    $sql .= "'" . db_escape($db, $withdrawal['date_of_withdrawal']) . "'";
    $sql .= ")";
    
    $result = mysqli_query($db, $sql);

    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function update_admin_password($new_password) {
    global $db;

    $sql = "UPDATE admins ";
    $sql .= "SET password ='" . db_escape($db, $new_password) . "'";
    $result = mysqli_query($db, $sql);

        // For UPDATE statements and INSERT statements, $result is true or false
    if($result) {
      return true;
      } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }
  /*__________end of steve_project________*/
?>
