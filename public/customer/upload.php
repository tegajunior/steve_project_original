<?php 
    require_once('../../../private/initialize.php');
    if(!isset($_GET['id'])) {
        redirect_to(url_for('/customer/new.php'));
    } else {
        $id = $_GET['id'];
    }
    if(is_post_request())   {
        $target_dir = "/uploads";
        $file = $_FILES['my_file']['name'];
        $path = pathinfo($file);
        $filename = $path['filename'];
        $ext = $path['extension'];
        $temp_name = $_FILES['my_file']['tmp_name'];
        $path_filename_ext = $target_dir . $filename . $ext;

        //check if filename exits already
        if(file_exists($path_filename_ext)) {
            $upload_error['upload_error'] = 'File name already exist';
            redirect_to(url_for('/customer/show_error.php'));
        } else {
            move_uploaded_file($temp_name, $path_filename_ext);

            //save the url name to database
            $result = update_passport_url($path_filename_ext, $id);
            if($result === true) {
                redirect_to(url_for('/customer/completed_registration.php?id=' . h(u($id))));
            }
            
        }
    }
?>
