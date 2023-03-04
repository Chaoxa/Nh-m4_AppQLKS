<?php

use Illuminate\Support\Arr;

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
}

function checkoutAction()
{
    $id = $_GET['id'];
    $room = db_fetch_array("SELECT * FROM `tbl_room` WHERE `room_id` = $id");
    // show_array($_POST);
    if (isset($_POST['btn-order'])) {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $time = date("d/m/Y") . ' | ' . date('H:i');
        $order_code = 'gr4#' . date("His");
        if (!empty($_POST['fullname'])) {
            $fullname = $_POST['fullname'];
        }
        if (!empty($_POST['tel'])) {
            $tel = $_POST['tel'];
        }
        if (!empty($_POST['email'])) {
            $email = $_POST['email'];
        }
        $id_guest = info_user('users_id');
        $data = array(
            'fullname' => $fullname,
            'tel' => $tel,
            'email' => $email
        );
        db_update('guest', $data, "`users_id`= $id_guest");
        $data_room_order = array(
            'guest_id' => $id_guest,
            'room_id' => $id,
            'time' => $time
        );
        $_SESSION['order_info'] = $data_room_order;
        db_insert('tbl_order_room', $data_room_order);
    }
    $data['room'] = $room;
    load_view('checkout', $data);
}
