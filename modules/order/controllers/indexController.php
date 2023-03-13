<?php

use Illuminate\Support\Arr;

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
}

function checkoutAction()
{
    global $fullname, $tel, $email, $error;
    if (!empty($_COOKIE['fullname'])) {
        $fullname = $_COOKIE['fullname'];
    }
    if (!empty($_COOKIE['email'])) {
        $email = $_COOKIE['email'];
    }
    if (!empty($_COOKIE['tel'])) {
        $tel = $_COOKIE['tel'];
    }
    $id = $_GET['id'];
    $room = db_fetch_array("SELECT * FROM `tbl_room` WHERE `room_id` = $id");
    $room[0]['coin'] = round($room[0]['new_price'] / 1000);
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
        if ($_POST['direct_payment'] == 1) {
            $current_coin = get_field('coin') -  $room[0]['coin'];
            if ($current_coin >= 0) {
                $data = array(
                    'coin' => $current_coin,
                );
                $guest_id = get_field("users_id");
                db_update('guest', $data, "`users_id`=$guest_id");
            } else {
                $error['exhausted'] = 'Bạn hiện không đủ coin để thanh toán';
            }
            $_SESSION['payments_coin'] = true;
        } else {
            $_SESSION['payments_coin'] = false;
        }

        setcookie('fullname', $fullname, time() + (86400 * 30), "/");
        setcookie('email', $email, time() + (86400 * 30), "/");
        setcookie('tel', $tel, time() + (86400 * 30), "/");

        if (empty($error)) {
            $id_guest = info_user('users_id');
            $data = array(
                'fullname' => $fullname,
                'tel' => $tel,
                'email' => $email
            );
            db_update('guest', $data, "`users_id`= $id_guest");
            $amount_room =  db_fetch_row("SELECT `number_rooms` FROM `tbl_room` WHERE `room_id` = $id");
            // show_array($amount_room);
            $current_number_rooms = $amount_room['number_rooms'] - 1;

            $data_amount_room = array(
                'number_rooms' => $current_number_rooms,
            );
            db_update('tbl_room', $data_amount_room, "`room_id` = $id");

            $data_room_order = array(
                'guest_id' => $id_guest,
                'room_id' => $id,
                'time' => $time,
                'payment_methods' => $_POST['direct_payment'],
            );
            db_insert('tbl_order_room', $data_room_order);

            $_SESSION['order_info'] = array(
                'fullname' => $fullname,
                'tel' => $tel,
                'email' => $email,
                'room' => $room,
                'time' => $time
            );
            redirect('?mod=order&action=order_success');
        } else {
            echo "<script>";
            echo "alert('Tài khoản coin của bạn hiện không đủ')";
            echo "</script>";
        }
    }

    $data['room'] = $room;
    load_view('checkout', $data);
}

function order_successAction()
{
    load_view('order_success');
}
