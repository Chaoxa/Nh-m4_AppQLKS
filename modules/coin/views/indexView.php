<?php get_header() ?>
<style>
    #money {
        max-width: 400px;
        border-radius: 5px;
        background: rgb(63, 94, 251);
        background: radial-gradient(circle, rgba(63, 94, 251, 1) 0%, rgba(158, 82, 179, 1) 50%, rgba(252, 70, 107, 1) 100%);
        padding: 10px;
    }

    #wp-content {
        background: rgb(51, 142, 174);
        background: linear-gradient(90deg,
                rgba(51, 142, 174, 0.16010154061624648) 0%,
                rgba(63, 178, 208, 1) 65%,
                rgba(0, 212, 255, 1) 100%);
        max-height: 600px;
    }

    .info_bank {
        padding: 20px 10px;
        max-width: 500px;
        margin: 0px auto;
    }

    #price_list {
        background: rgb(63, 94, 251);
        background: radial-gradient(circle, rgba(63, 94, 251, 1) 0%, rgba(158, 82, 179, 1) 50%, rgba(252, 70, 107, 1) 100%);
        max-width: 400px;
        border-radius: 10px;
        padding: 10px;
        color: #fff;
    }
</style>
<div id="wp-content">
    <div class="container">
        <div class="info_bank">
            <div class="row text-center">
                <div class="col-md-12 text-center">
                    <form action="" method="POST" id="form-coin">
                        <div id="money" class="form-group">
                            <label for="coin_add"><b class="text-white">Số coin muốn nạp:</b></label>
                            <input type="text" id="coin_add" name="coin_add" placeholder="Nhập số tiền" class="form-control">
                            <div class="form-message"></div>
                            <input type="text" hidden name="btn-recharge">
                            <input type="submit" class="btn btn-success my-2" name="btn-recharge" value="Nạp ngay">
                        </div>
                        <script src="public/js/validation.js"></script>

                    </form>
                    <script>
                        Validator({
                            errorSelector: ".form-message",
                            form: "#form-coin",
                            color: "text-white",
                            rules: [Validator.isRequired("#coin_add", 'Vui lòng nhập số coin muốn nạp!!!')],
                        });
                    </script>
                    <div id="price_list" class="text-left">
                        <p>1000 coin = 1.000.000VNĐ</p>
                        <p>2000 coin = 2.000.000VNĐ</p>
                        <p>3000 coin = 3.000.000VNĐ</p>
                        <p>4000 coin = 4.000.000VNĐ</p>
                        <p>5000 coin = 5.000.000VNĐ</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>