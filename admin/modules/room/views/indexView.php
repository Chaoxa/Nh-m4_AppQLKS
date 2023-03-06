<?php get_header() ?>
<div class="container-fluid py-5">
    <?php get_sidebar() ?>
    <div class="card">
        <div class="card-header font-weight-bold">
            DANH SÁCH PHÒNG
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Giá phòng</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Người tạo</th>
                        <th scope="col">Thời gian</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 0;
                    foreach ($list_rooms as $room) {
                        $count++; ?>
                        <tr>
                            <th scope="row"><?php echo $count ?></th>
                            <td><img width="60px" src="<?php echo cut_string('admin/', $room['thumb_main_room']) ?>" alt=""></td>
                            <td>
                                <?php echo $room['room_name'] ?>
                            </td>
                            <td><?php echo $room['new_price'] ?></td>
                            <td><?php echo $room['number_rooms'] ?></td>
                            <td><span class="badge bg-success text-white">Hoạt động</span></td>
                            <td><?php echo $room['creator'] ?></td>
                            <td>26:06:2020 14:00</td>
                            <td>
                                <a href="?mod=room&action=update_room&id=<?php echo $room['room_id'] ?>" class="btn btn-success btn-sm text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                <a href="?mod=room&action=delete_room&id=<?php echo $room['room_id'] ?>" class="btn btn-danger btn-sm text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
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
                            <span class="sr-only">Sau</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
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