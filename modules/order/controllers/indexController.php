<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
}

function checkoutAction()
{
    $id = $_GET['id'];
    $room = db_fetch_array('SELECT * FROM tbl_room INNER JOIN tbl_hotel ON tbl_room.parent_hotel = tbl_hotel.id;');
    load_view('checkout');
}
