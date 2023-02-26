<?php get_header() ?>
<style>
    #my-form {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    #success-message {
        display: none;
        background-color: green;
        color: white;
        padding: 10px;
        border-radius: 5px;
        text-align: center;
    }

    #success-message p {
        margin: 0;
    }
</style>
<div id="content" class="container-fluid">
    <?php get_sidebar() ?>
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm phòng
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data" id="form-1">
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-12 p-0">
                            <div class="form-group">
                                <label for="hotel_name"><b>Tên phòng</b></label>
                                <input class="form-control" type="text" name="hotel_name" id="hotel_name" value="<?php echo set_value('hotel_name') ?>">
                                <span class="form-message"></span>
                            </div>
                        </div>
                        <div class="col-md-12 p-0">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="old_price"><b>Giá phòng</b><span class="text-danger">(*)</span></label>
                                        <input type="text" name="old_price" placeholder="VNĐ" class="form-control" onkeyup="count()" id="old_price" value="<?php echo set_value('old_price') ?>">
                                        <span class="form-message"></span>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="discount"><b>Giảm giá % </b><span class="text-danger">(Không bắt buộc)</span></label>
                                        <input type="text" placeholder="%" name="discount" onkeyup="count()" class="form-control" id="discount" value="<?php echo set_value('discount') ?>">
                                    </div>
                                </div>
                                <script>
                                    function count() {
                                        var price = document.getElementById('old_price').value;
                                        var discount = document.getElementById('discount').value;
                                        var new_price1 = price * discount / 100;
                                        var new_price = price - new_price1;
                                        if (discount > 100) {
                                            alert('Không thể giảm giá vượt quá 100% giá trị sản phẩm')
                                        } else {
                                            document.getElementById('new_price').value = new_price
                                        }
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div id="uploadFile">
                                    <input type="file" name="file_upload" id="file_upload" onchange="chooseFile(this)">
                                    <img src="public/images/img-thumb.png" alt="" id="image" class="img-rounded my-2" width="150">
                                    <?php echo form_error('file_upload') ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <input type="file" name="files[]" id="file-upload" class="mb-3" multiple>
                                <br>
                                <div id="images" class="d-flex">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <span><img src="public/images/img-product.png" class="img m-1 img-rounded" width="80"></span>
                                            <span><img src="public/images/img-product.png" class="img m-1 img-rounded" width="80"></span>

                                        </div>
                                        <div class="row">
                                            <span><img src="public/images/img-product.png" class="img m-1 img-rounded" width="80"></span>
                                            <span><img src="public/images/img-product.png" class="img m-1 img-rounded" width="80"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php echo form_error('file_upload_detail') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3 p-0">
                    <label for="new_price" class="text-success"><b>Thành tiền: </b><span class="text-danger">(*)</span></label>
                    <input type="text" id="new_price" name="new_price" class="form-control m-0" value="<?php echo set_value('new_price') ?>">
                    <span class="form-message"></span>

                </div>
                <div class="form-group">
                    <label for="desc"><b>Mô tả phòng</b></label>
                    <textarea name="desc" class="form-control" id="desc" cols="30" rows="10"><?php echo set_value('desc') ?></textarea>
                    <span class="form-message"></span>
                </div>
                <div class="form-group">
                    <label for="detail"><b>Chi tiết phòng</b></label>
                    <textarea name="detail" class="form-control" id="detail" cols="30" rows="5"><?php echo set_value('detail') ?></textarea>
                    <span class="form-message"></span>
                </div>


                <div class="col-md-3 p-0">
                    <div class="form-group">
                        <label for=""><b>Danh mục</b></label>
                        <select class="form-control" id="" name="hotel_cat">
                            <option>---Danh mục khách sạn---</option>
                            <?php foreach ($list_hotel as $hotel) { ?>
                                <option value="<?php echo $hotel['id'] ?>">
                                    <?php echo $hotel['name'] ?>
                                </option>
                            <?php } ?>
                        </select>
                        <?php echo form_error('hotel_cat') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for=""><b>Trạng thái</b></label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                        <label class="form-check-label" for="exampleRadios1">
                            Chờ duyệt
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2" checked>
                        <label class="form-check-label" for="exampleRadios2">
                            Công khai
                        </label>
                    </div>
                </div>
                <input type="text" name="btn-add" hidden value="Thêm mới">
                <button type="submit" class="btn btn-primary" name="btn-add">Thêm mới</button>
            </form>
            <strong><?php echo notify('add_success') ?></strong>
        </div>
    </div>
</div>
</div>
</div>
<script src="public/js/validation.js"></script>
<script>
    Validator({
        errorSelector: '.form-message',
        form: '#form-1',
        rules: [
            Validator.isRequired('#hotel_name', 'Không được để trống tên phòng!'),
            Validator.isRequired('#old_price', 'Không được để trống giá tiền!'),
            Validator.isRequired('#new_price', 'Không được để trống thành tiền!'),
            Validator.isRequired('#desc', 'Không được để trống mô tả phòng!'),
            Validator.isRequired('#detail', 'Không được để trống chi tiết phòng!'),
            // Validator.isRequired('#hotel_cat', 'Không được để trống danh mục khách sạn!'),
        ]
    });
</script>
<script>
    var inputFile = document.querySelector("#file_upload")

    function chooseFile(fileInput) {
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#image').attr('src', e.target.result)
            }
            reader.readAsDataURL(fileInput.files[0]);
        }
    }

    var inputFile = document.querySelector('.img');
    const fileUpload = document.getElementById('file-upload');
    fileUpload.addEventListener('change', (event) => {
        const files = event.target.files;
        var str = '';
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var url = URL.createObjectURL(file);
            str += "<span><img class = 'img' src='" + url + "' width='80' class='img' </span>"
        }
        var blockImages = document.getElementById('images');
        blockImages.innerHTML = str;
        // console.log(str)


    });

    const form = document.querySelector('#my-form');
    const submitButton = document.querySelector('input[type="submit"]');
    const successMessage = document.querySelector('#success-message');

    submitButton.addEventListener('click', (event) => {
        event.preventDefault();
        successMessage.classList.remove('hidden');
    });
</script>

<script src="public/js/jquery.min.js"></script>
<script src="public/js/app.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>