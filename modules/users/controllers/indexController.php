<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
}

function loginAction()
{
    // show_array($_POST);
    global $error, $password, $username;
    if (isset($_POST['btn-login'])) {
        $error = array();
        if (!empty($_POST['username'])) {
            $username = $_POST['username'];
        }
        if (!empty($_POST['password'])) {
            $password = $_POST['password'];
        }
        if (empty($error)) {
            if (isset($_POST['remember_me'])) {
                setcookie('is_login', true, time() + 3600);
                setcookie('user_login', $username, time() + 3600);
            }
            if (check_login($username, $password)) {
                $_SESSION['is_login'] = true;
                $_SESSION['user_login'] = $username;
                redirect("?mod=home&action=index");
            } else {
                redirect("?mod=home&action=index");
                // $error['login'] = 'Tài khoản hoặc mật khẩu không chính xác';
            }
        }
    }
};

function logoutAction()
{
    // setcookie('is_login',true,time()-3600);
    // setcookie('user_login',$username,time()-3600);
    unset($_SESSION['is_login']);
    unset($_SESSION['user_login']);
    header("location: ?mod=home&action=index");
}

function regAction()
{
    // show_array($_POST);
    $avt = 'https://anhdep123.com/wp-content/uploads/2020/05/nhung-hinh-anh-dai-dien-dep-nhat-2.jpg';

    global $error, $fullname, $username, $notify;
    if (isset($_POST['btn-reg'])) {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $time = date("d/m/Y") . ' | ' . date('H:i');
        $error = array();
        if (!empty($_POST['fullname'])) {
            $fullname = $_POST['fullname'];
        }
        if (!empty($_POST['username'])) {
            $username = $_POST['username'];
        }
        if (!empty($_POST['password'])) {
            $password = $_POST['password'];
        }
        if (user_exists($username)) {
            $error['login'] = "Tài khoản đã tồn tại trong hệ thống!";
        }
        if (empty($error)) {
            $data = array(
                'fullname' => $fullname,
                'username' => $username,
                'date_reg' => $time,
                'password' => md5($password),
                'avt' => $avt,
                'coin' => 0,
            );
            db_insert('guest', $data);
            $notify = array();
            $notify['add_success'] = "Đã đăng ký tài khoản thành công";
        }
    }
    load_view('reg');
}
