<?php
get_header();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>Đặt hàng thành công</title>
</head>

<body>
    <style>
        body {
            background: rgb(242, 239, 239);
        }

        #wrapper {
            max-width: 1200px;
            margin: auto;
        }

        .icon {
            text-align: center;
        }

        .icon img {
            max-width: 100px;
            height: auto;
            display: inline-block;
            margin-top: 20px;
        }

        #wp-info {
            background: white;
            border-radius: 1rem;
        }

        a.product_thumb img {
            max-width: 70px;
            height: auto;
        }

        #info_buy table thead tr th {
            text-align: center;
        }

        #info_buy table tbody td {
            align-items: center;
            text-align: center;
            line-height: 60px;
        }

        #info_buy table tbody td a {
            align-items: center;
            text-align: center;
            line-height: 60px;
            color: red;
            font-weight: 500;
        }
    </style>
    <div id="wrapper">
        <div id="order_success">
            <div class="icon"><img src="https://sablanca.vn/Images/icon/tick-iconblue.png" alt="Lỗi"></div>
            <h3 class="text-center my-2">Đặt phòng thành công</h3>
        </div>
        <div id="wp-info" class="p-3">
            <div id="info-cart">
                <p>Xin chào <b><?php echo $_SESSION['order_info']['fullname'] ?></b></p>
                <p>Chúc mừng bạn đã đặt phòng thành công tại <b>Nhóm 4</b></p>
            </div>
            <div id="info-guest">
                <b class="py-2 d-block">Thôn tin người mua:</b>
                <div class="fullname">Người đặt: &emsp; &emsp; <b><?php echo $_SESSION['order_info']['fullname'] ?></b></div>
                <div class="tel">Điện thoại: &emsp; &emsp; &emsp; <b><?php echo $_SESSION['order_info']['tel'] ?></b></div>
                <div class="tel">Phương thức thanh toán: <b><?php if ($_SESSION['payments_coin'] == true) {
                                                                echo 'Thanh toán bằng coin';
                                                            } else {
                                                                echo 'Thanh toán trực tiếp';
                                                            } ?></b></div>
                <?php if (!empty($bill['email'])) { ?>
                    <div class="note">Email: &emsp; &emsp;<b><?php echo $bill['email'] ?></b></div>
                <?php } ?>
                <div class="time text-success">Thời gian: &emsp; &emsp;<b><?php echo $_SESSION['order_info']['time'] ?></b></div>
                <?php if (!empty($bill['note'])) { ?>
                    <div class="note">Chú thích: &emsp; &emsp;<b><?php echo $bill['note'] ?></b></div>
                <?php } ?>
                <div id="info_buy">
                    <b class="py-2 d-block">Chi tiết hóa đơn</b>
                    <?php $room = $_SESSION['order_info']['room'][0];
                    // show_array($room);
                    ?>
                    <table class="table table-bordered table-striped ">
                        <thead class="table-dark">
                            <tr>
                                <th>Ảnh</th>
                                <th>Tên phòng</th>
                                <th>Giá tiền</th>
                                <th>Số lượng</th>
                                <th>Tổng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <td><a href="" class="product_thumb"><img src="<?php echo $room['thumb_main_room'] ?>" alt="error"></a></td>
                            <td><a href="" class="text-center"><?php echo $room['room_name'] ?></a></td>
                            <td><?php echo price($room['new_price'], "VNĐ") ?></td>
                            <td>1</td>
                            <td><?php echo price($room['new_price'], 'VNĐ') ?></td>
                        </tbody>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th class="text-danger text-center"><?php echo price($room['new_price'], 'VNĐ') ?></th>
                        </tr>
                    </table>
                </div>
                <hr>
                <b>Mọi thông tin đơn hàng đã được gửi trực tiếp vào email của bạn. Hãy kiểm tra để biết thêm chi tiết
                </b>
                <p>Cảm ơn bạn đã tin tưởng và giao dịch tại <b>TQ Store</b></p>
                <div class="buttom">
                    <a href="?" class="btn btn-success">Tiếp tục mua hàng</a>
                    <a href="https://mail.google.com/mail/u/0/?tab=rm#inbox" target="blank" class="btn btn-danger">Check Email</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php get_footer() ?>