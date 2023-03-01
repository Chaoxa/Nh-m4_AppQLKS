<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
}

function room_detailAction()
{
    $id = $_GET['id'];
    $room_info = get_detail_room($id);
    $data['room_info'] = $room_info;
    load_view('detail', $data);
}
