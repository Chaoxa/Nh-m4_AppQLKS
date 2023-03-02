<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
}

function checkoutAction()
{
    load_view('checkout');
}
