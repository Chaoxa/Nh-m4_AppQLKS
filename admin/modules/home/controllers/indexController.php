<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
}

function indexAction()
{
    $list_order_room = db_fetch_array("SELECT *
    FROM tbl_order_room
    INNER JOIN guest ON tbl_order_room.guest_id = guest.users_id
    INNER JOIN tbl_room ON tbl_order_room.room_id = tbl_room.room_id;
    ");
    $data['list_order_room'] = $list_order_room;
    load_view('index', $data);
}
