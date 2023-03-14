<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
}

//comment ne

function indexAction()
{
    $list_guest = db_fetch_array('SELECT * FROM guest WHERE 1');
    $data['list_guest'] = $list_guest;
    load_view('index', $data);
}

function list_order_coinAction()
{
    $list_order_coin = db_fetch_array('SELECT * FROM tbl_order_coin 
    JOIN guest ON tbl_order_coin.guest_parent = guest.users_id 
    ORDER BY tbl_order_coin.id DESC;    
    ');
    $data['list_order_coin'] = $list_order_coin;
    load_view('list_order_coin', $data);
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
    redirect('?mod=guest&action=list_order_coin');
}
function deleteAction()
{
    $id = $_GET['id'];
    db_delete('tbl_order_coin',  "`id`=$id");
    redirect('?mod=guest&action=list_order_coin');
}
