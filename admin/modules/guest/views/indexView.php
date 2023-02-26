<?php get_header() ?>
<style>
    td img {
        border-radius: 10px;
    }
</style>
<div id="content" class="container-fluid">
    <?php get_sidebar() ?>
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách sản phẩm</h5>
            <div class="form-search form-inline">
                <form action="#" class="d-flex">
                    <input type="" class="form-control form-search" placeholder="">
                    <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="analytic">
                <a href="" class="text-primary">Trạng thái 1<span class="text-muted">(10)</span></a>
                <a href="" class="text-primary">Trạng thái 2<span class="text-muted">(5)</span></a>
                <a href="" class="text-primary">Trạng thái 3<span class="text-muted">(20)</span></a>
            </div>
            <div class="form-action form-inline py-3">
                <select class="form-control mr-1" id="">
                    <option>Chọn</option>
                    <option>Tác vụ 1</option>
                    <option>Tác vụ 2</option>
                </select>
                <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
            </div>
            <table class="table table-striped table-checkall">
                <thead>
                    <tr>
                        <th scope="col">
                            <input name="checkall" type="checkbox">
                        </th>
                        <th scope="col">#</th>
                        <th scope="col">Mã đơn</th>
                        <th scope="col">Tên tài khoản</th>
                        <th scope="col">Lượng coin</th>
                        <th scope="col">Tổng tiền</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Thời gian</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $temp = 0;
                    foreach ($list_order_coin as $value) {
                        $temp++ ?>
                        <tr class="">
                            <td>
                                <input type="checkbox">
                            </td>
                            <td><?php echo $temp ?></td>
                            <td><img src="<?php echo $value['avt'] ?>" alt="" width="100px"></td>
                            <td><a href="#"><?php echo $value['username'] ?></a></td>
                            <td><?php echo $value['amount_coin'] ?></td>
                            <td><?php echo currency_format($value['amount_coin'] * 1000, 'đ') ?></td>
                            <td><?php echo $value['status'] ?></td>
                            <td><?php echo $value['time'] ?></td>
                            <td>
                                <a href="?mod=guest&action=recharge&guest=<?php echo $value['users_id'] ?>&id=<?php echo $value['id'] ?>" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Xác nhận nạp"><i class="fa fa-edit"></i></a>
                                <a href="?mod=guest&action=delete&id=<?php echo $value['id'] ?>" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
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
                    <a class="page-link" href="#" aria-label="Previous">
                        <span class="">Sau</span>
                    </a>
                </ul>
            </nav>
        </div>
    </div>
</div>