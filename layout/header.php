<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://www.hdtgroup.vn/images/resort-icon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="public/slider/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="public/css/home.css">
    <link rel="stylesheet" href="public/css/coin.css">
    <title>Team-4 Traveloka</title>
</head>

<body>
    <div class="wrapper">
        <div id="header">
            <div id="line-header" class="bg-primary">
            </div>
            <div id="wp-header">
                <div class="container">
                    <div class="">
                        <div class="col-md-12 d-flex justify-content-between p-0">
                            <a href="?" id="logo"><img src="https://d1785e74lyxkqq.cloudfront.net/_next/static/v2/9/97f3e7a54e9c6987283b78e016664776.svg" alt="error">
                            </a>
                            <nav>
                                <ul>
                                    <li><a href=""><i class="bi bi-download"></i> Tải ứng dụng</a></li>
                                    <li><a href=""><i class="bi bi-briefcase-fill"></i></i>Hợp tác với chúng tôi</a>
                                    </li>
                                    <li><a href=""><i class="bi bi-arrow-through-heart-fill"></i>Đặt chỗ của tôi</a>
                                    </li>
                                    <li><a href=""><i class="bi bi-translate"></i>Việt Nam</a></li>
                                    <?php if (is_login()) { ?>
                                        <div class="user-avatar">
                                            <img src="https://scontent.fhan18-1.fna.fbcdn.net/v/t39.30808-6/277534722_1332128460589061_1040701051996209631_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=w_rB1GMTLUYAX8aGBhC&_nc_ht=scontent.fhan18-1.fna&oh=00_AfANPiifBv5bq6JGxOG1z2xnSMaLb5e84iHJcUt2Pq1xpQ&oe=63FE45D9" alt="User Avatar">
                                            <div class="user-menu">
                                                <a href="?mod=coin&action=recharge">Nạp coin</a>
                                                <a href="?mod=users&action=logout">Đăng xuất</a>
                                            </div>
                                        </div>
                                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                        <script>
                                            $(document).ready(function() {
                                                $('.user-avatar').click(function() {
                                                    $('.user-menu').toggle();
                                                });
                                            });

                                            var user_menu = document.querySelector('.user-menu');
                                            window.addEventListener("scroll", function() {
                                                user_menu.style.display = "none";
                                            });
                                        </script>
                                    <?php
                                    } else { ?>
                                        <li><button class="login btn btn-success" id="login-btn">Đăng nhập<i class="bi bi-chevron-down"></i></button>
                                            <div id="login-form" class="sub-menu" style="display: none;">
                                                <form action="?mod=users&action=login" method="POST" id="form-header">
                                                    <h4>Đăng nhập tài khoản</h4>
                                                    <div class="form-group">
                                                        <label for="username">Tên đăng nhập</label>
                                                        <input type="text" id="username" class="form-control" name="username">
                                                        <span class="form-message"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password">Mật khẩu</label>
                                                        <input type="password" class="form-control" id="password" name="password">
                                                        <span class="form-message"></span>
                                                    </div>
                                                    <div class="row justify-content-between">
                                                        <div class="col-md-3 py-2">
                                                            <input type="text" name="btn-login" hidden>
                                                            <input type="submit" value="Đăng nhập" class="btn btn-warning" name="btn-login">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <b>Bạn chưa có tài khoản? <a href="?mod=users&action=reg" class="text-primary">Đăng ký ngay</a></b>
                                                        </div>
                                                    </div>
                                                </form>
                                                <script src="public/js/validation.js"></script>
                                                <script src="public/js/main.js"></script>
                                            </div>
                                        </li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="child-menu">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <nav class="d-flex justify-content-between">
                                <div class="menu-child">
                                    <ul>
                                        <li><a href="">Vận chuyển<i class="bi bi-caret-down-fill  icon-toggle"></i></a>
                                        </li>
                                        <li><a href="">Chỗ ở<i class="bi bi-caret-down-fill icon-toggle"></i></a></li>
                                        <li><a href="">Hoạt động và giải trí<i class="bi bi-caret-down-fill icon-toggle"></i></a></li>
                                        <li><a href="">Sản phẩm bổ sung<i class="bi bi-caret-down-fill icon-toggle"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div id="coin">
                                    <p class="icon-coin"><span class="p-1"><?php echo get_field('coin') ?> Coin</span></p>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>