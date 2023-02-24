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
    $date = date("d/m/Y");
    global $error, $fullname, $usernamee, $email, $password, $confirm_password, $tel, $address, $control, $notify;
    if (isset($_POST['btn-reg'])) {
        $error = array();
        if (empty($_POST['fullname'])) {
            $error['fullname'] = 'Không được để trống tên!';
        } else {
            $fullname = $_POST['fullname'];
        }

        if (empty($_POST['username'])) {
            $error['usernamee'] = 'Không được để trống tên đăng nhập!';
        } else {
            $usernamee = $_POST['username'];
        }
        if (empty($_POST['password'])) {
            $error['password'] = 'Không được để trống mật khẩu!';
        } else {
            $password = $_POST['password'];
        }
        if (empty($_POST['confirm-password'])) {
            $error['confirm-password'] = 'Không được để trống xác nhận mật khẩu!';
        } else {
            $confirm_password = $_POST['confirm-password'];
        }
        if (user_exists($usernamee)) {
            $error['login'] = "Tài khoản đã tồn tại trong hệ thống";
        }
        if (empty($error['password']) && empty($error['confirm-password'])) {
            if ($confirm_password != $password) {
                $error['confirm'] = 'Mật khẩu xác nhận không khớp';
            }
        }
        // show_array($error);
        $username = user_login();
        if (empty($error)) {
            $data = array(
                'fullname' => $fullname,
                'control' => $control,
                'username' => $usernamee,
                'email' => $email,
                'tel' => $tel,
                'address' => $address,
                'date_reg' => $date,
                'password' => md5($password),
                'avt' => $avt,
                'creator' => $username
            );
            add_user_login(user_login(), $data);
            $notify = array();
            $notify['add_success'] = "Đã thêm admin thành công";
        }
    }
    load_view('reg');
}
