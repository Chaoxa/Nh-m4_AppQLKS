<?php get_header() ?>
<!-- <?php show_array($list_order_room) ?> -->
<div class="container-fluid py-5">
    <?php get_sidebar() ?>
    <div class="card">
        <div class="card-header font-weight-bold">
            THÊM NHÂN VIÊN
        </div>
        <div class="card-body">
            <div id="content" class="fl-right">
                <div class="section" id="detail-page">
                    <div class="section-detail">
                        <form method="POST" id="form-add-staff">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="display-name">Tên hiển thị <span class="text-danger">(*)</span> </label>
                                        <input type="text" name="fullname" id="fullname" placeholder="Nguyễn Văn A" value="" class="form-control">
                                        <span class="form-message"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="control">Chức vụ <span class="text-danger">(*)</span> </label>
                                        <select name="control" id="control" class="form-control">
                                            <?php global $control; ?>
                                            <option value="">--Quyền kiểm soát--</option>
                                            <option value="Toàn quyền">Toàn quyền</option>
                                            <option value="QL sale">Quản lý sale</option>
                                            <option value="QL khách hàng">Quản lý khách hàng</option>
                                            <option value="QL giao diện">Quản lý giao diện</option>
                                        </select>
                                        <span class="form-message"></span>
                                    </div>
                                </div>


                            </div>
                            <div class="form-group">
                                <label for="username">Tên đăng nhập <span class="text-danger">(*)</span> </label>
                                <input type="text" name="username" id="username" class="form-control">
                                <span class="form-message"></span>
                            </div>
                            <div class="form-group">
                                <label for="password">Mật khẩu <span class="text-danger">(*)</span> </label>
                                <input type="password" name="password" id="password" class="form-control">
                                <span class="form-message"></span>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="confirm-password">Xác nhận mật khẩu <span class="text-danger">(*)</span> </label>
                                        <input type="password" name="confirm-password" id="confirm-password" value="<?php echo set_value('confirm_password') ?>" class="form-control">
                                        <span class="form-message"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email <span class="text-danger">(*)</span> </label>
                                        <input type="email" name="email" id="email" value="" class="form-control">
                                        <span class="form-message"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tel">Số điện thoại <span class="text-danger">(*)</span> </label>
                                <input type="tel" name="tel" id="tel" value="" class="form-control">
                                <span class="form-message"></span>
                            </div>
                            <div class="form-group">
                                <label for="address">Địa chỉ <span class="text-danger">(*)</span> </label>
                                <textarea name="address" id="address" class="form-control"></textarea>
                                <span class="form-message"></span>
                            </div>
                            <input type="text" name="btn-submit" hidden>
                            <button type="submit" name="btn-submit" id="btn-submit" class="img-rounded btn btn-success">Thêm</button>
                            <?php echo notify('add_success'); ?>
                        </form>
                        <script src="public/js/validation.js"></script>
                        <script>
                            Validator({
                                errorSelector: '.form-message',
                                form: '#form-add-staff',
                                color: 'text-danger',
                                rules: [
                                    Validator.isRequired('#fullname', 'Không được để trống tên nhân viên!'),
                                    Validator.isRequired('#control', 'Không được để trống quyền!'),
                                    Validator.isRequired('#username', 'Không được để trống tài khoản!'),
                                    Validator.isRequired('#password', 'Không được để trống mật khẩu!'),
                                    Validator.isRequired('#confirm-password', 'Không được để trống xác nhận mật khẩu!'),
                                    Validator.isConfirmed('#confirm-password', function() {
                                        return document.querySelector('#form-add-staff #password').value;
                                    }, 'Xác nhận mật khẩu không trùng khớp!'),
                                    Validator.isRequired('#email', 'Không được để trống email!'),
                                    Validator.isEmail('#email', 'Email không đúng định dạng!'),
                                    Validator.isRequired('#tel', 'Không được để trống số điện thoại!'),
                                    // Validator.isPhone('#tel', 'Số điện thoại không đúng định dạng!'),
                                    Validator.isRequired('#address', 'Không được để trống địa chỉ!'),
                                ]
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

<script src="public/js/jquery.min.js"></script>
<script src="public/js/app.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>