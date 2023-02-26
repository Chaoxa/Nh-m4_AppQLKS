<?php get_header() ?>
<div id="content" class="container-fluid">
    <?php get_sidebar() ?>
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm khách sạn
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-12 p-0">
                            <div class="form-group">
                                <label for="name"><b>Tên khách sạn</b></label>
                                <input class="form-control" type="text" name="hotel-name" id="hotel-name" value="<?php echo set_value('name_hotel') ?>">
                                <?php echo form_error('hotel-name') ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-12 p-0">
                            <div class="form-group">
                                <label for="address"><b>Địa chỉ</b></label>
                                <input class="form-control" type="text" name="address" id="address" value="<?php echo set_value('address') ?>">
                                <?php echo form_error('address') ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div id="uploadFile">
                            <div class="col-md-12 p-0 py-2">
                                <input type="file" name="file_upload" id="file_upload" onchange="chooseFile(this)">
                            </div>
                            <div class="col-md-12 p-0 py-2">
                                <img src="public/images/img-thumb.png" alt="" id="image" class="img-rounded my-2" width="150">
                            </div>
                            <?php echo form_error('file_upload') ?>
                        </div>
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
                <button type="submit" class="btn btn-primary" name="btn-add">Thêm mới</button>
                <?php echo notify('success') ?>
            </form>
        </div>
    </div>
</div>
</div>
</div>
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

    // var inputFile = document.querySelector('.img');
    // const fileUpload = document.getElementById('file-upload');
    // fileUpload.addEventListener('change', (event) => {
    //     const files = event.target.files;
    //     var str = '';
    //     for (var i = 0; i < files.length; i++) {
    //         var file = files[i];
    //         var url = URL.createObjectURL(file);
    //         str += "<span><img class = 'img' src='" + url + "' width='80' class='img' </span>"
    //     }
    //     var blockImages = document.getElementById('images');
    //     blockImages.innerHTML = str;
    //     // console.log(str)
    // });
</script>

<script src="public/js/jquery.min.js"></script>
<script src="public/js/app.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>