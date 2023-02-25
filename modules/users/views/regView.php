<?php get_header(); ?>
<style>
    .reg-form {
        min-height: 550px;
        padding: 40px 0px;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    label {
        display: block;
        margin-bottom: 0.5rem;
    }

    input[type="text"],
    input[type="password"] {
        display: block;
        width: 100%;
        padding: 0.5rem;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 1rem;
    }

    button[type="submit"] {
        display: block;
        margin-top: 1rem;
        padding: 0.5rem;
        background-color: #008080;
        color: #fff;
        border: none;
        border-radius: 4px;
        font-size: 1rem;
        cursor: pointer;
    }

    #wrapper {
        background: rgb(51, 142, 174);
        background: linear-gradient(90deg, rgba(51, 142, 174, 0.16010154061624648) 0%, rgba(63, 178, 208, 1) 65%, rgba(0, 212, 255, 1) 100%);
    }

    #form-1 {
        background: rgb(63, 94, 251);
        background: radial-gradient(circle, rgba(63, 94, 251, 1) 0%, rgba(252, 70, 107, 1) 100%);
        padding: 30px;
        border-radius: 20px;
    }
</style>
<div id="wrapper">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 reg-form">
                <h2 class="text-center text-white">Đăng ký thành viên</h2>
                <p class="text-center text-white">Đặt phòng cùng nhóm 4❤️</p>
                <form action="" method="POST" id="form-1">
                    <div class="form-group">
                        <label for="fullname" class="text-white">Họ và tên</label>
                        <input type="text" id="fullname" name="fullname" class="form-control" placeholder="VD:Trần Quý">
                        <b class="form-message"></b>
                    </div>
                    <div class="form-group">
                        <label for="username" class="text-white">Tên đăng nhập</label>
                        <input type="text" id="username" name="username" class="form-control" placeholder="VD:Chaoxa2003">
                        <b class="form-message"></b>
                    </div>
                    <div class="form-group">
                        <label for="password" class="text-white">Mật khẩu</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Nhập mật khẩu">
                        <b class="form-message"></b>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password" class="text-white">Xác nhận mật khẩu</label>
                        <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Xác thực mật khẩu">
                        <b class="form-message"></b>
                    </div>
                    <button type="submit" class="btn btn-primary">Đăng ký</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>

</script>
<script src="public/js/validation.js"></script>

<script>
    Validator({
        errorSelector: '.form-message',
        form: '#form-1',
        rules: [
            Validator.isRequired('#fullname'),
            Validator.isRequired('#username'),
            Validator.isRequired('#password'),
            Validator.minLength('#password', 6),
            Validator.isRequired('#confirm_password'),
            Validator.isConfirmed('#confirm_password', function() {
                return document.querySelector('#form-1 #password').value;
            }, 'Mật khẩu nhập lại không chính xác!'),
        ]
    });
</script>
<?php get_footer(); ?>