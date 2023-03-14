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
