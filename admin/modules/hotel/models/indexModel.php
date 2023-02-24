<?php
function check_login($username, $password)
{
    $list_users = db_fetch_array("SELECT * FROM `tbl_users`");
    foreach ($list_users as $user) {
        if ($username == $user['username'] && md5($password) == $user['password']) {
            return true;
            return false;
        }
    }
}
