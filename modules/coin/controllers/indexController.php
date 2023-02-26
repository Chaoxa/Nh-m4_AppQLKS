<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
}

function rechargeAction()
{
    if (isset($_POST['btn-recharge'])) {
        $guest_parent = get_field('users_id');
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $time = date("d/m/Y") . ' | ' . date('H:i');
        if (!empty($_POST['coin_add'])) {
            $amount_coin = $_POST['coin_add'];
            $_SESSION['amount_coin'] = $amount_coin;
        }

        $data['amount_coin'] = $amount_coin;
        $data['time'] = $time;
        $data['guest_parent'] = $guest_parent;
        $data['code'] = 'nhom-4_' . date("His");
        $data['status'] = 0;

        db_insert('tbl_order_coin', $data);
        redirect('?mod=coin&action=qr_bank');
    }
    load_view('index');
}

function qr_bankAction()
{
    load_view('qr-bank');
}
