<?php
ob_start();
session_start();
// function check_login($username, $password)
// {

//     foreach ($list_user as $user) {
//         if ($username == $user['username'] && md5($password) == $user['password']) {
//             return true;
//         }
//     }
//     return false;
// }
// // trả về true nếu đã login

function is_login()
{
    if (isset($_SESSION['is_login']))
        return true;
    return false;
}

//trả về username của người login
function user_login()
{
    if (!empty($_SESSION['user_login']))
        return $_SESSION['user_login'];
    return false;
}

//
function info_user($field = 'id')
{
    global $list_user;
    $list_user = db_fetch_array("SELECT * FROM `guest` WHERE 1");
    if (isset($_SESSION['is_login'])) {
        foreach ($list_user as $user) {
            if ($_SESSION['user_login'] == $user['username']) {
                if (array_key_exists($field, $user)) {
                    return $user[$field];
                }
            }
        }
    }
    return false;
}

function get_field($field_get)
{
    $list_guest = db_fetch_array('SELECT * FROM `guest` WHERE 1');
    // show_array($list_guest);
    if (isset($_SESSION['is_login'])) {
        foreach ($list_guest as $field) {
            if ($_SESSION['user_login'] == $field['username']) {
                return $field[$field_get];
            }
        }
    }
};
