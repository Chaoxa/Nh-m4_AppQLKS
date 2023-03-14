<?php
function user_exists($table, $username)
{
    $check_user = db_num_rows("SELECT * FROM `{$table}` WHERE `username` = '{$username}'");
    if ($check_user > 0) {
        return true;
    } else {
        return false;
    }
}

function check_login($username, $password)
{
    $list_users = db_fetch_array("SELECT * FROM `guest`");
    foreach ($list_users as $user) {
        if ($username == $user['username'] && md5($password) == $user['password']) {
            return true;
            return false;
        }
    }
}
