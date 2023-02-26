<?php get_header() ?>
<style>
    .qr_code img {
        max-width: 200px;
        height: auto;
        border-radius: 5px;
    }

    .more_info_qr {
        background: rgb(63, 94, 251);
        background: radial-gradient(circle, rgba(63, 94, 251, 1) 0%, rgba(158, 82, 179, 1) 50%, rgba(252, 70, 107, 1) 100%);
        border-radius: 5px;
        margin-top: 10px;
    }

    .more-info-qr {
        width: 500px;
        margin: 0px auto;
        padding: 20px;
    }

    #wp-content {
        background: rgb(51, 142, 174);
        background: linear-gradient(90deg,
                rgba(51, 142, 174, 0.16010154061624648) 0%,
                rgba(63, 178, 208, 1) 65%,
                rgba(0, 212, 255, 1) 100%);
        min-height: 600px;
    }
</style>
<div id="wp-content">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                <h3 class="text-center p-3">Tạo đơn nạp coin thành công</h3>
                <p>Tổng tiền cần thanh toán: <b><?php echo price($_SESSION['amount_coin'] * 1000, 'VNĐ') ?></b></p>
                <b>Sau khi thanh toán hoàn tất coin sẽ được nạp vào tài khoản của bạn.Thân ái!</b>
            </div>
        </div>
    </div>
    <div class="more-info-qr">
        <div class="qr_code text-center">
            <img src="public/uploads/qr bank.jpg" alt="">
        </div>
        <div class="more_info_qr text-white p-3 ">
            <p>Chủ tài khoản: <b>Trần Quang Quý</b> </p>
            <p>Ngân hàng: <b>MB Bank</b> </p>
            <p>Số tài khoản: <b>1999920039999</b> </p>
            <p>Nội dung chuyển khoản: <b><?php echo user_login() . '+' . 'SĐT' . '+' . 'Nạp tiền' ?></b> </p>

        </div>
    </div>
</div>
<?php get_footer() ?>