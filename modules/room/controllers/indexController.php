<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
}

function room_detailAction()
{
    load_view('detail');
}
