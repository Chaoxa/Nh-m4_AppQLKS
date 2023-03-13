<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
}

function indexAction()
{
    if (!empty($_GET['address'])) {
        $address = $_GET['address'];
    } else {
        $address = '';
    }
    $list_hotels = db_fetch_array("SELECT * FROM tbl_room INNER JOIN tbl_hotel ON tbl_room.parent_hotel = tbl_hotel.id WHERE tbl_hotel.address LIKE '%$address%'");
    $data['list_hotels'] = $list_hotels;
    load_view('index', $data);
}
