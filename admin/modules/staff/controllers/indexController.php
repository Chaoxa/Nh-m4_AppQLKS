<?php

use Illuminate\Support\Arr;

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
}

function indexAction()
{
    $list_staff = db_fetch_array("SELECT *
        FROM tbl_users WHERE 1");
    $data['list_staff'] = $list_staff;
    load_view('index', $data);
}

function add_staffAction()
{
    $avt = 'https://c2.staticflickr.com/8/7628/27739307291_c43b62d5df_b.jpg';
    $date = date("d/m/Y");
    global $error, $fullname, $usernamee, $email, $password, $tel, $address, $control, $notify;
    if (isset($_POST['btn-submit'])) {
        $error = array();
        if (!empty($_POST['fullname'])) {
            $fullname = $_POST['fullname'];
        }
        if (!empty($_POST['control'])) {
            $control = $_POST['control'];
        }
        if (!empty($_POST['username'])) {
            $username = $_POST['username'];
        }
        if (!empty($_POST['password'])) {
            $password = $_POST['password'];
        }
        if (!empty($_POST['email'])) {
            $email = $_POST['email'];
        }
        if (!empty($_POST['tel'])) {
            $tel = $_POST['tel'];
        }
        if (!empty($_POST['address'])) {
            $address = $_POST['address'];
        }
        if (user_exists('tbl_users', $username)) {
            $error['login'] = "Tài khoản đã tồn tại trong hệ thống";
        }
        // show_array($error);
        $username = user_login();
        if (empty($error)) {
            $data = array(
                'fullname' => $fullname,
                'permission' => $control,
                'username' => $username,
                'email' => $email,
                'phone' => $tel,
                'address' => $address,
                'time' => $date,
                'password' => md5($password),
                'avt' => $avt,
                'creator' => $username
            );
            db_insert('tbl_users', $data);
            $notify = array();
            $notify['add_success'] = "Đã thêm admin thành công";
        }
    }
    load_view('add');
}
