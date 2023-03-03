<?php get_header(); ?>
<div class="container">
    <div id="checkout">
        <form action="" method="POST" id="form-order">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-order py-3">
                        <div class="form-group">
                            <label for="fullname">Họ và tên:</label>
                            <input type="text" name="fullname" placeholder="Nguyễn Văn A" class="form-control" id="fullname">
                            <span class="form-message"></span>
                        </div>
                        <div class="form-group">
                            <label for="tel">Số điện thoại:</label>
                            <input type="text" name="tel" placeholder="Số điện thoại" class="form-control" id="tel">
                            <span class="form-message"></span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="fullname" placeholder="nhom4abc@gmail.com" class="form-control" id="email">
                            <span class="form-message"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="room-hotel">
                        <div class="row">
                            <div class="thumb-main">
                                <img src="https://cf.bstatic.com/xdata/images/hotel/max1024x768/415261418.jpg?k=466cdf1cc8fda37f74fc5b33270f05491a9be5b39261b2d55847fb6ac076a3ef&o=&hp=1" alt="">
                            </div>
                            <div class="more-info">
                                <h2 class="text-white">Khách sạn Đà Nẵng</h2>
                                <div class="vote"><i class="bi bi-star-fill text-warning"></i><i class="bi bi-star-fill text-warning"></i><i class="bi bi-star-fill text-warning"></i><i class="bi bi-star-fill text-warning"></i><i class="bi bi-star-fill text-warning"></i></div>
                                <div class="freeship my-1 text-white"><i class="bi bi-truck-front-fill text-dark"></i>Miễn
                                    phí
                                    bãi đậu
                                    xe</div>
                                <div class="price">
                                    <div class="row">
                                        <div class="money text-success">
                                            <b> 560.000VNĐ</b>
                                        </div>
                                        <div class="coin px-2">
                                            <b>560 coin</b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="payments">
                        <h3>Hình thức thanh toán</h3>
                        <div class="form-group p-0">
                            <input type="radio" name="direct_payment" id="direct_payment" checked value="0">
                            <label for="direct_payment">Thanh toán trực tiếp</label>
                        </div>
                        <div class="form-group p-0">
                            <input type="radio" name="direct_payment" id="payment_coin" value="1">
                            <label for="payment_coin">Thanh toán bằng coin</label>
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" name="btn-order" hidden>
            <input type="submit" class="btn btn-success btn-order my-5" value="Đặt phòng">
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