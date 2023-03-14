<?php get_header() ?>
<!-- <?php show_array($list_order_room) ?> -->
<div class="container-fluid py-5">
    <?php get_sidebar() ?>
    <div class="row">
        <div class="col">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">ĐƠN THÀNH CÔNG</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo db_num_rows("SELECT * FROM `tbl_order_room` WHERE `room_status`= 1") ?></h5>
                    <p class="card-text">Đơn đặt phòng thành công</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-header">ĐANG XỬ LÝ</div>
                <div class="card-body">
                    <h5 class="card-title">10</h5>
                    <p class="card-text">Số lượng đơn hàng đang xử lý</p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header">DOANH THU</div>
                <div class="card-body">
                    <h5 class="card-title">25.000.000 VNĐ</h5>
                    <p class="card-text">Doanh thu của hệ thống khách sạn</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                <div class="card-header">ĐƠN HÀNG HỦY</div>
                <div class="card-body">
                    <h5 class="card-title">125</h5>
                    <p class="card-text">Số đơn bị hủy trong hệ thống</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end analytic  -->
    <div class="card">
        <div class="card-header font-weight-bold">
            ĐƠN ĐẶT PHÒNG
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Tên phòng</th>
                        <th scope="col">Khách hàng</th>
                        <th scope="col">Phương thức</th>
                        <th scope="col">Tổng tiền</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Thời gian</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 0;
                    // show_array($list_order_room);
                    foreach ($list_order_room as $order) {
                        $count++ ?>
                        <tr>
                            <th scope="row"><?php echo $count ?></th>
                            <td><img width="60px" src="<?php echo cut_string('admin/', $order['thumb_main_room']) ?>" alt="error"></td>
                            <td><?php echo limit_string($order['room_name'], 10) ?></td>
                            <td><a href="#"><?php echo $order['fullname'] ?></a></td>
                            <td><?php if ($order['payment_methods'] == 0) { ?> <span class="bg-warning text-white rounded">TT trực tiếp</span> <?php } else { ?><span class="bg-success text-white rounded">TT bằng coin</span><?php } ?></td>
                            <td class="text-danger"><b><?php echo currency_format($order['new_price']) ?></b></td>
                            <td class="text-success"><b><?php if ($order['room_status'] == 0) { ?> <span class="bg-warning text-white rounded">Đang thuê</span> <?php } else { ?><span class="bg-success text-white rounded">Hoàn thành</span><?php } ?></b></td>
                            <td><?php echo $order['time'] ?></td>
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