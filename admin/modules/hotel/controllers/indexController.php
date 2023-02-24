<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
}

function addAction()
{
    global $error, $name_hotel, $time, $creator, $notify, $address;
    $error = array();
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $time = date("d/m/Y") . ' | ' . date('H:i');
    $creator = user_login();
    if (isset($_POST['btn-add'])) {
        if (empty($_POST['hotel-name'])) {
            $error['hotel-name'] = "(*)Không được để trống tên khách sạn!";
        } else {
            $name_hotel = $_POST['hotel-name'];
        }
        if (empty($_POST['address'])) {
            $error['address'] = "(*)Không được để trống địa chỉ!";
        } else {
            $address = $_POST['address'];
        }

        #upload main image
        $file_upload_name = $_FILES['file_upload']['name'];
        #Tạo đường dẫn file chứa images
        $target_dir = "public/uploads/";
        #Tạo đường dẫn file sau khi upload lên hệ thống
        $target_file = $target_dir . $file_upload_name;
        $file_upload_size = $_FILES['file_upload']['size'];
        $file_type = pathinfo($file_upload_name, PATHINFO_EXTENSION);
        $file_type_allow = array('jpg', 'png', 'jpeg', 'gif');
        // echo $target_file;

        if (empty($_FILES['file_upload']['name'])) {
            $error["file_upload"] = "(*)Không được để trống ảnh chính!";
        } else if ($file_upload_size > 5242880) {
            $error["file_upload"] = "Kích thước file không được vượt quá 5MB";
        } else if (!in_array(strtolower($file_type), $file_type_allow)) {
            $error["file_upload"] = "Chỉ cho upload file ảnh có đuôi jpg,png,jpeg,gif";
        } else if (file_exists($target_file)) {
            // $error['file_upload'] = "File $target_file đã tồn tại trên hệ thống!";
        } else {
            $flag_1 = true;
        }

        $file_upload_tmp_name = $_FILES['file_upload']['tmp_name'];
        move_uploaded_file($file_upload_tmp_name, $target_file);
        // show_array($_POST);

        if (empty($error)) {
            $data = array(
                'name' => $name_hotel,
                'thumb_main' => 'admin/public/uploads/' . $file_upload_name,
                'address' => $address,
                'creator' => $creator,
                'time' => $time
            );
            db_insert('tbl_hotel', $data);
            $notify['success'] = 'Đã thêm danh mục thành công.';
        }
    }
    load_view('add');
}
