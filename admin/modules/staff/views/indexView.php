<?php get_header() ?>
<!-- <?php show_array($list_order_room) ?> -->
<div class="container-fluid py-5">
    <?php get_sidebar() ?>
    <div class="card">
        <div class="card-header font-weight-bold">
            DANH SÁCH NHÂN VIÊN
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Quyền</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 0;
                    // show_array($list_order_room);
                    foreach ($list_staff as $staff) {
                        $count++ ?>
                        <tr>
                            <th scope="row"><?php echo $count ?></th>
                            <td><img width="60px" height="60px" src="<?php echo cut_string('admin/', $staff['avt']) ?>" alt="error"></td>
                            <td><a href="#"><?php echo $staff['fullname'] ?></a></td>
                            <td><a href="#" class="bg-success text-white rounded"><?php echo $staff['permission'] ?></a></td>
                            <td><a href="#"><?php echo $staff['phone'] ?></a></td>
                            <td><a href="#"><?php echo $staff['address'] ?></a></td>
                            <td>
                                <style>
                                    @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css");
                                </style>
                                <a href="?mod=home&action=order_success&order_id=<?php echo $order['order_id'] ?>" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Hoàn thành"><i class="bi bi-check-square-fill"></i></a>
                                <a href="#" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Xóa"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">Trước</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">Sau</span>
                        </a>
                    </li>
                </ul>
            </nav>
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