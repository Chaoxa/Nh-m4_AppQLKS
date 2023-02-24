<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
}

function indexAction()
{

    $list_hotels = db_fetch_array('SELECT * FROM tbl_room INNER JOIN tbl_hotel ON tbl_room.parent_hotel = tbl_hotel.id;');
    $data['list_hotels'] = $list_hotels;
    load_view('index', $data);
}
