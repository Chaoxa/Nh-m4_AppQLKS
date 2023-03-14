<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
}

function loginAction()
{
    global $error, $password, $username;
    if (isset($_POST['btn-submit'])) {
        $error = array();
        if (empty($_POST['username'])) {
            $error['username'] = 'Không được để trống tên đăng nhập!';
        } else {
            if (is_username()) {
                $username = $_POST['username'];
            } else {
                $error['username'] = 'Tên đăng nhập phải từ 6-32 kí tự và không có kí tự đặc biệt';
            }
        }
        if (empty($_POST['password'])) {
            $error['password'] = 'Không được để trống mật khẩu!';
        } else {
            if (is_password()) {
                $password = $_POST['password'];
            } else {
                $error['password'] = 'Mật khẩu cần 6-32 kí tự và được viết hoa chữ cái đầu';
            }
        }
        if (empty($error)) {
            if (isset($_POST['remember_me'])) {
                setcookie('is_login', true, time() + 3600);
                setcookie('user_login', $username, time() + 3600);
            }
            if (check_login($username, $password)) {
                $_SESSION['admin']['is_login'] = true;
                $_SESSION['admin']['user_login'] = $username;
                redirect("?mod=home&action=index");
            } else {
                $error['login'] = 'Tài khoản hoặc mật khẩu không chính xác';
            }
        }
    }
    load_view('login');
};

function logoutAction()
{
    // setcookie('is_login',true,time()-3600);
    // setcookie('user_login',$username,time()-3600);
    unset($_SESSION['admin']['is_login']);
    unset($_SESSION['admin']['user_login']);
}
