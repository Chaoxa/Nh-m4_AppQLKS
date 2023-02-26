<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
}

function indexAction()
{
    $list_order_coin = db_fetch_array('SELECT *
    FROM tbl_order_coin
    JOIN guest
    ON tbl_order_coin.guest_parent = guest.users_id;
    ');
    $data['list_order_coin'] = $list_order_coin;
    load_view('index', $data);
}

function rechargeAction()
{
    $id = $_GET['id'];
    $guest = $_GET['guest'];
    $old_coin = db_fetch_row("SELECT `coin` FROM `guest` WHERE users_id = $guest");
    $amount_coin = db_fetch_row("SELECT `amount_coin` FROM `tbl_order_coin` WHERE id = $id");
    $new_coin = $old_coin['coin'] + $amount_coin['amount_coin'];
    $data1 = array(
        'coin' => $new_coin
    );
    db_update('guest', $data1, "`users_id` = $guest");



    $data = array(
        'status' => 1
    );
    db_update('tbl_order_coin', $data, "`id`=$id");
    redirect('?mod=guest&action=index');
}
function deleteAction()
{
    $id = $_GET['id'];
    db_delete('tbl_order_coin',  "`id`=$id");
    redirect('?mod=guest&action=index');
}
