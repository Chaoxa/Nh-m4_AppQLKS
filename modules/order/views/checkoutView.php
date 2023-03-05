<?php get_header(); ?>
<div class="container">
    <div id="checkout">
        <form action="" method="POST" id="form-order">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-order py-3">
                        <div class="form-group">
                            <label for="fullname">Họ và tên:</label>
                            <input type="text" name="fullname" placeholder="Nguyễn Văn A" class="form-control" id="fullname" value="<?php echo set_value('fullname') ?>">
                            <span class="form-message"></span>
                        </div>
                        <div class="form-group">
                            <label for="tel">Số điện thoại:</label>
                            <input type="text" name="tel" placeholder="Số điện thoại" class="form-control" id="tel" value="<?php echo set_value('tel') ?>">
                            <span class="form-message"></span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" placeholder="nhom4abc@gmail.com" class="form-control" id="email" value="<?php echo set_value('email') ?>">
                            <span class="form-message"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="room-hotel">
                        <div class="row">
                            <?php foreach ($room as $value) { ?>
                                <div class="thumb-main">
                                    <img src="<?php echo $value['thumb_main_room'] ?>" alt="">
                                </div>
                                <div class="more-info">
                                    <h2 class="text-white"><?php echo $value['room_name'] ?></h2>
                                    <div class="vote"><i class="bi bi-star-fill text-warning pr-1"></i><i class="bi bi-star-fill text-warning pr-1"></i><i class="bi bi-star-fill text-warning pr-1"></i><i class="bi bi-star-fill text-warning pr-1"></i><i class="bi bi-star-fill text-warning pr-1"></i></div>
                                    <div class="freeship my-1 text-white"><i class="bi bi-truck-front-fill text-dark"></i>Miễn
                                        phí
                                        bãi đậu
                                        xe</div>
                                    <div class="price">
                                        <div class="row">
                                            <div class="money text-success">
                                                <b><?php echo price($value['new_price'], 'VNĐ') ?></b>
                                            </div>
                                            <div class="coin px-2">
                                                <b><?php echo price($value['new_price'] / 1000, 'Coin') ?></b>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="payments">
                        <h3>Hình thức thanh toán</h3>
                        <div class="form-group p-0">
                            <input type="radio" name="direct_payment" id="direct_payment" value="0">
                            <label for="direct_payment">Thanh toán trực tiếp</label>
                        </div>
                        <div class="form-group p-0">
                            <input type="radio" name="direct_payment" id="payment_coin" checked value="1">
                            <label for="payment_coin">Thanh toán bằng coin</label>
                        </div>
                    </div>
                </div>
            </div>
            <input type="text" name="btn-order" hidden>
            <input type="submit" class="btn btn-success btn-order my-5" value="Đặt phòng" name="btn-order">
        </form>

        <script src="public/js/validation.js"></script>
        <script>
            Validator({
                errorSelector: ".form-message",
                form: "#form-order",
                color: "text-danger",
                rules: [Validator.isRequired("#fullname", "Không được để trống họ tên!"), Validator.isRequired("#tel", "Không được để trống số điện thoại!"), Validator.isRequired("#email", 'Không được để trống email!')],
            });
        </script>
    </div>
</div>
<?php get_footer() ?>