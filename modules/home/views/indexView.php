<?php get_header(); ?>
<?php
$num_rows = db_num_rows("SELECT * FROM `tbl_room`");
$num_per_page = 2;
$total_rows = $num_rows;
$num_pages = ceil($total_rows / $num_per_page);

// echo "Số trang: $num_pages <br>";
$page = isset($_GET['page']) ? $_GET['page'] : 1;
// echo "Trang: $page";

$start = ($page - 1) * $num_per_page;
// echo " <br> Bắt đầu từ: $start"; 

$list_users = get_rooms($start, $num_per_page);
?>
<div id="content">
    <div id="wp-content">
        <div id="slide-show">
            <!-- Set up your HTML -->
            <div class="owl-carousel owl-theme">
                <div class="item">
                    <h4><a href=""><img src="https://ik.imagekit.io/tvlk/image/imageResource/2022/12/16/1671178107214-dbeb159eef7ff3edf28a6fecffc3e9fb.jpeg?tr=h-230,q-75,w-472" alt=""></a></h4>
                </div>
                <div class="item">
                    <h4><a href=""><img src="https://ik.imagekit.io/tvlk/image/imageResource/2023/02/15/1676473866198-4313e2eaf62ea8f785fc5e843649dc8a.jpeg?tr=h-230,q-75,w-472" alt=""></a></h4>
                </div>
                <div class="item">
                    <h4><a href=""><img src="https://ik.imagekit.io/tvlk/image/imageResource/2023/01/04/1672832128279-058ecb9c711fcf1d732685bfaba3eefa.jpeg?tr=h-230,q-75,w-472" alt=""></a></h4>
                </div>
                <div class="item">
                    <h4><a href=""><img src="https://ik.imagekit.io/tvlk/image/imageResource/2023/02/07/1675747870284-d902b3b46fc9b925dc1846fc67480e23.png?tr=h-230,q-75,w-472" alt=""></a></h4>
                </div>
                <div class="item">
                    <h4><a href=""><img src="https://ik.imagekit.io/tvlk/image/imageResource/2023/02/09/1675919338492-0f2a13dd4f02f8887b1bfbb84d4d11ab.png?tr=h-230,q-75,w-472" alt=""></a></h4>
                </div>
                <div class="item">
                    <h4><a href=""><img src="https://ik.imagekit.io/tvlk/image/imageResource/2022/11/29/1669698104875-5c561642420c0efde5d7c390f3db8adc.png?tr=h-230,q-75,w-472" alt=""></a></h4>
                </div>
            </div>
        </div>
        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="function-menu">
                            <div class="row">
                                <div class="col-md-3 main-function">
                                    <nav>
                                        <ul>
                                            <li><a href=""><i class="bi bi-airplane-fill"></i> Vé máy bay</a>
                                            </li>
                                            <li><a href=""><i class="bi bi-buildings"></i> Đặt phòng khách
                                                    sạn</a>
                                            </li>
                                            <li><a href=""><i class="bi bi-piggy-bank-fill"></i> Combo tiết
                                                    kiệm</a>
                                            </li>
                                            <li><a href=""><i class="bi bi-car-front"></i> Đưa đón sân bay</a>
                                            </li>
                                            <li><a href=""><i class="bi bi-ev-front-fill"></i> Cho thuê xe</a>
                                            </li>
                                            <li><a href=""><i class="bi bi-cash-coin"></i> Điểm thưởng của
                                                    tôi</a>
                                            </li>
                                            <li><a href=""><i class="bi bi-star-fill"></i> Tình trạng chuyến
                                                    bay</a>
                                            </li>
                                            <li><a href=""><i class="bi bi-currency-dollar"></i> Thông báo về giá
                                                    vé</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>

                                <div class="selection-detail col-md-8">
                                    <form action="" method="POST">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="address" class="pt-3">Thành phố,địa điểm du lịch</label>
                                                    <select class="form-select form-select-sm mb-3 form-control" id="city" aria-label=".form-select-sm">
                                                        <option value="" selected>Chọn tỉnh thành</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="district">Quận/Huyện</label>
                                                    <select class="form-select form-select-sm mb-3 form-control" id="district" aria-label=".form-select-sm">
                                                        <option value="" selected>Chọn quận huyện</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="num-order">Phường/Xã</label>
                                                    <select class="form-select form-select-sm form-control" id="ward" aria-label=".form-select-sm">
                                                        <option value="" selected>Chọn phường xã</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
                                            <script src="public/js/auto_address.js"></script>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container p-0">
        <div class="row">
            <div id="sidebar" class="col-md-3 p-0">
                <div class="price-filter">
                    <h3>Lọc giá phòng</h3>
                    <div class="form-group">
                        <b class="btn btn-success ">Giá từ: <output id="minPriceValue">0</output> -> <output id="maxPriceValue">10</output>tr
                            VNĐ</b>
                        <br>
                        <label for="minPriceRange">Min Price:</label>
                        <input type="range" id="minPriceRange" min="0" max="10" value="0">


                        <label for="maxPriceRange">Max Price:</label>
                        <input type="range" id="maxPriceRange" min="0" max="10" value="10">
                    </div>
                    <script>
                        minPriceRange.addEventListener("input", function() {
                            if (this.value > maxPriceRange.value) {
                                maxPriceRange.value = this.value;
                                maxPriceValue.value = this.value;
                            }

                            minPriceValue.value = this.value;
                        });

                        maxPriceRange.addEventListener("input", function() {
                            if (this.value < minPriceRange.value) {
                                minPriceRange.value = this.value;
                                minPriceValue.value = this.value;
                            }

                            maxPriceValue.value = this.value;
                        });
                    </script>
                </div>
                <div class="address-filter my-2">
                    <form action="" method="POST">
                        <div class="form-group">
                            <input type="radio" name="filter_address" id="hanoi" value="Hà Nội">
                            <label for="hanoi">Hà Nội</label>
                        </div>
                        <div class="form-group">
                            <input type="radio" name="filter_address" id="danang" value="Đà Nẵng">
                            <label for="danang">Đà Nẵng</label>
                        </div>
                        <div class="form-group">
                            <input type="radio" name="filter_address" id="thaibinh" value="Thái Bình">
                            <label for="thaibinh">Thái Bình</label>
                        </div>
                        <div class="form-group">
                            <input type="radio" name="filter_address" id="thanhhoa" value="Thanh Hóa">
                            <label for="thanhhoa">Thanh Hóa</label>
                        </div>
                        <div class="form-group">
                            <input type="radio" name="filter_address" id="HCM" value="TP.Hồ Chí Minh">
                            <label for="HCM">TP.Hồ Chí Minh</label>
                        </div>
                        <input type="submit" name="btn-address-filter" value="Lọc" class="btn btn-success">
                        <a href="?" class="btn btn-primary">Khôi phục</a>
                    </form>
                </div>
                <?php if (isset($_POST['btn-address-filter']) && !empty($_POST['filter_address'])) {
                    $address = $_POST['filter_address'];
                    redirect("?mod=home&action=index&address=$address");
                } ?>
                <div class="banner">
                    <img src="https://channel.mediacdn.vn/428462621602512896/2022/11/23/photo-1-166920031490330252919.png" alt="">
                </div>

            </div>
            <div id="card" class="col-md-9">
                <div class="card-hotel">
                    <!-- <?php show_array($list_hotels) ?> -->
                    <?php foreach ($list_hotels as $hotel) { ?>
                        <div class="row card-info">
                            <div class="thumb-main col-md-2">
                                <a href="?mod=room&action=room_detail&id=<?php echo $hotel['room_id'] ?>"><img src="<?php echo $hotel['thumb_main_room'] ?>" alt="" width="132px" height="176px"></a>
                            </div>
                            <div class="info ml-4 col-md-6">
                                <h5 class="name-hotel my-1 "><a href="" class="text-dark room_name"><?php echo $hotel['room_name'] ?></a></h5>
                                <a href="" class="btn-sm btn-primary cat">Khách sạn</a>
                                <div class="location my-1"><i class="bi bi-geo-alt-fill text-danger"></i><?php echo $hotel['address'] ?>
                                </div>
                                <div class="vote"><i class="bi bi-star-fill text-warning"></i><i class="bi bi-star-fill text-warning"></i><i class="bi bi-star-fill text-warning"></i><i class="bi bi-star-fill text-warning"></i><i class="bi bi-star-fill text-warning"></i></div>
                                <div class="freeship my-1"><i class="bi bi-truck-front-fill text-success"></i>Miễn
                                    phí
                                    bãi đậu
                                    xe</div>
                                <div class="author"><i class="bi bi-person-check-fill text-primary"></i> <b>Nhóm
                                        4</b></div>
                            </div>
                            <div class="price col-md-3">
                                <div class="save text-primary my-1 object"><i class="bi bi-piggy-bank-fill"></i><b> Tiết
                                        kiệm <?php echo $hotel['discount'] . '%' ?>
                                    </b>
                                </div>
                                <div class="old-price my-1"><del><?php echo price($hotel['old_price'], 'VNĐ') ?></del></div>
                                <div class="new-price my-1"><b class="text-success"><?php echo price($hotel['new_price'], 'VNĐ') ?></b></div>
                                <?php if ($hotel['number_rooms'] > 0) { ?>
                                    <a href="?mod=room&action=room_detail&id=<?php echo $hotel['room_id'] ?>" class="detail-hotel my-1"><b>Xem chi tiết</b> <i class="bi bi-three-dots"></i></a>
                                <?php } else { ?>
                                    <span class="bg-danger img-rounded text-white px-1 amount_room">Đã hết phòng</span>
                                <?php } ?>
                                <div class="my-1"><b>Liên hệ với chúng tôi?</b></div>
                                <a href="https://www.facebook.com/thaiquymomo"><i class="bi bi-facebook text-primary"></i></a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <script>
                function toggleClass() {
                    var objects = document.querySelectorAll('.object');
                    // console.log(objects);
                    objects.forEach(function(object) {
                        setInterval(function() {
                            object.classList.toggle('text-danger');
                        }, 200);
                    });
                }
                toggleClass();
            </script>
            <?php echo get_pagging($num_pages, $page, "?mod=member&act=main") ?>
        </div>
    </div>
</div>
<script src="public/js/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(".owl-carousel").owlCarousel({
            autoplay: true,
            autoplayTimeout: 4000,
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1100: {
                    items: 3
                },
                1600: {
                    items: 4
                }
            }
        });

    });
</script>
<script src="public/slider/owlcarousel/owl.carousel.min.js"></script>
<?php get_footer() ?>