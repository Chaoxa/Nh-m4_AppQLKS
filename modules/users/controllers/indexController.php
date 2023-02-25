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
                $_SESSION['is_login'] = true;
                $_SESSION['user_login'] = $username;
                redirect("?mod=sale&action=list_order");
            } else {
                $error['login'] = 'Tài khoản hoặc mật khẩu không chính xác';
            }
        }
    }
    load_view('login');
};

function regAction()
{
    $avt = 'https://c2.staticflickr.com/8/7628/27739307291_c43b62d5df_b.jpg';
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $time = date("d/m/Y") . ' | ' . date('H:i');
    global $error, $fullname, $username, $password, $confirm_password, $tel, $address, $control, $notify;
    if (isset($_POST['btn-reg'])) {
        $error = array();
        if (!empty($_POST['fullname'])) {
            $fullname = $_POST['fullname'];
        }
        if (!empty($_POST['username'])) {
            $usernamee = $_POST['username'];
        }
        if (!empty($_POST['password'])) {
            $password = $_POST['password'];
        }
        if (user_exists($username)) {
            $error['login'] = "Tài khoản đã tồn tại trong hệ thống";
        }
        // show_array($error);
        $username = user_login();
        if (empty($error)) {
            $data = array(
                'fullname' => $fullname,
                'username' => $username,
                'date_reg' => $time,
                'password' => md5($password),
                'avt' => $avt,
            );
            db_insert('guest', $data);
            $notify = array();
            $notify['add_success'] = "Đã đăng ký tài khoản thành công";
        }
    }
    load_view('reg');
}
