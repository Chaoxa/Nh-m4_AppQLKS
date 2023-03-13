<?php

use Illuminate\Support\Arr;

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
        INNER JOIN tbl_room ON tbl_order_room.room_id = tbl_room.room_id 
        GROUP BY tbl_order_room.room_id ASC");
    $data['list_order_room'] = $list_order_room;
    load_view('index', $data);
}

function order_successAction()
{
    $order_id = $_GET['order_id'];
    $data = array(
        'room_status' => 1
    );
    $room_id = db_fetch_row("SELECT `room_id` FROM `tbl_order_room` WHERE `order_id`=$order_id");
    $number_rooms = db_fetch_row("SELECT `number_rooms` FROM `tbl_room` WHERE `room_id` = {$room_id['room_id']}");
    $data_number_rooms = array(
        'number_rooms' => $number_rooms['number_rooms'] + 1
    );
    db_update('tbl_room', $data_number_rooms, "`room_id` = {$room_id['room_id']}");
    db_update('tbl_order_room', $data, "`order_id` = $order_id");
    redirect(base_url('?'));
}
