<?php get_header(); ?>
<style>
    * {
        box-sizing: border-box;
    }

    .thumb-room {
        display: flex;
        max-height: 450px;
    }

    .main-image {
        width: 70%;
    }

    .main-image img {
        width: 100%;
        border-radius: 10px;
        max-height: 100%;
    }

    .small-images {
        width: 30%;
        height: auto;
        margin-left: 10px;
    }

    .small-images img {
        width: 100%;
        margin-bottom: 10px;
        max-height: 32%;
        border-radius: 10px;
    }

    @media (max-width: 768px) {
        .container {
            flex-direction: column;
            align-items: center;
        }

        .main-image {
            width: 100%;
        }

        .small-images {
            display: flex;
            width: 40%;
        }

        .small-images img {
            width: 48%;
            margin-bottom: 10px;
        }
    }
</style>
<div id="wrapper">
    <!-- <?php show_array($room_info); ?> -->
    <div class="container">
        <div class="info-room">
            <h4 class="hotel-name py-2 text-success"><?php echo $room_info['room_name'] ?></h4>
            <div class="address py-2"><i class="bi bi-geo-alt-fill text-danger"></i> <?php echo $room_info['address'] ?></div>
        </div>
    </div>
    <div class="container">
        <div class="thumb-room">
            <div class="main-image">
                <img class="main-1" src="<?php echo $room_info['thumb_main_room'] ?>" alt="Main Image">
            </div>
            <div class="small-images">
                <?php $tempp = 0;
                foreach ($room_info['thumb_detail'] as $thumb) {
                    $tempp++ ?>
                    <img src="<?php echo $thumb ?>" id="<?php echo $tempp ?>" onclick="change_image(<?php echo $tempp ?>)" alt="Small Image 1">

                <?php } ?>
            </div>
        </div>
        <h3 class="py-3">Tiện ích</h3>
        <ul class="convenient">
            <li><img src="https://s3.go2joy.vn/1000w/facility/33_1638346714_61a72fda44df0.png" alt=""> Thang máy</li>
            <li><img src="https://s3.go2joy.vn/1000w/facility/33_1638346656_61a72fa03452a.png" alt=""> Điều hòa</li>
            <li><img src="https://s3.go2joy.vn/1000w/facility/33_1638344709_61a7280507613.png" alt=""> Smart TV</li>
            <li><img src="https://s3.go2joy.vn/1000w/facility/3731_1638412499_61a830d30b35f.png" alt=""> Lễ tân 24/24</li>
        </ul>
        <h3 class="intro py-2">Giới thiệu</h3>
        <p><?php echo $room_info['hotel_detail'] ?></p>
        <h3>Địa chỉ</h3>
        <iframe class="address-hotel" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8168144215065!2d105.73976961476993!3d21.040014492770265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135096b31fa7abb%3A0xff645782804911af!2zVHLGsOG7nW5nIMSR4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgxJDDtG5nIMOB!5e0!3m2!1svi!2s!4v1677757494171!5m2!1svi!2s" width="100%" height="550" style="border-radius: 10px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div class="order">
            <a href="<?php echo $room_info['url_order'] ?>" class="btn btn-success my-4 text-right">Nhận phòng</a>
        </div>
    </div>
</div>
<script>
    var main_image = document.querySelector('.main-1');

    function change_image(id) {
        var link_image = document.getElementById(id).getAttribute('src');
        main_image.setAttribute('src', link_image);
    }
</script>
<?php get_footer() ?>