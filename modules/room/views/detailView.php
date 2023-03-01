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
    <div class="container">
        <div class="info-room">
            <h4 class="hotel-name py-2 text-success">MIX BOUTIQUE HOTEL 4</h4>
            <div class="address py-2"><i class="bi bi-geo-alt-fill text-danger"></i> 20, P. Phúc La, Hà Đông, Hà Nội, Vietnam</div>
        </div>
    </div>
    <div class="container thumb-room">
        <div class="main-image">
            <img class="main-1" src="https://s3.go2joy.vn/1000w/hotel/3914/634_1621504531_60a63213afd43.jpg" alt="Main Image">
        </div>
        <div class="small-images">
            <img src="https://s3.go2joy.vn/1000w/hotel/3914/634_1621504958_60a633bec01d7.jpg" id="1" onclick="change_image(1)" alt="Small Image 1">
            <img src="https://s3.go2joy.vn/1000w/hotel/3914/634_1621505644_60a6366c162a5.jpg" id="2" onclick="change_image(2)" alt="Small Image 2">
            <img src="https://s3.go2joy.vn/1000w/hotel/3914/634_1621504819_60a633333fba0.jpg" id="3" onclick="change_image(3)" alt="Small Image 3">
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
<!-- <?php get_footer() ?> -->