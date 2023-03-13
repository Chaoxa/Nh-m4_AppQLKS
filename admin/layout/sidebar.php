<div id="sidebar" class="bg-white">
    <ul id="sidebar-menu">
        <li class="nav-link">
            <a href="?">
                <div class="nav-link-icon d-inline-flex">
                    <i class="far fa-folder"></i>
                </div>
                Dashboard
            </a>
            <i class="arrow fas fa-angle-right"></i>
        </li>
        <li class="nav-link">
            <a href="?view=list-post">
                <div class="nav-link-icon d-inline-flex">
                    <i class="far fa-folder"></i>
                </div>
                <a href="?mod=hotel&action=index">Khách sạn</a>
            </a>
            <i class="arrow fas fa-angle-right"></i>
            <ul class="sub-menu">
                <li><a href="?mod=hotel&action=add">Thêm khách sạn</a></li>
                <li><a href="?mod=hotel&action=index">Danh sách khách sạn</a></li>
            </ul>
        </li>
        <li class="nav-link">
            <a href="?view=list-product">
                <div class="nav-link-icon d-inline-flex">
                    <i class="far fa-folder"></i>
                </div>
                <a href="?mod=room&action=index">Phòng</a>
            </a>
            <i class="arrow fas fa-angle-right"></i>

            <ul class="sub-menu">
                <li><a href="?mod=room&action=add">Thêm phòng</a></li>
                <li><a href="?mod=room&action=index">Danh sách phòng</a></li>
            </ul>
        </li>
        <li class="nav-link">
            <a href="?view=list-order">
                <div class="nav-link-icon d-inline-flex">
                    <i class="far fa-folder"></i>
                </div>
                Khách hàng
            </a>
            <i class="arrow fas fa-angle-right"></i>
            <ul class="sub-menu">
                <li><a href="?mod=guest&action=index">Đơn nạp coin</a></li>
                <li><a href="?view=list-order">Danh sách khách hàng</a></li>
            </ul>
        </li>
        <li class="nav-link">
            <a href="?view=list-user">
                <div class="nav-link-icon d-inline-flex">
                    <i class="far fa-folder"></i>
                </div>
                Nhân viên
            </a>
            <i class="arrow fas fa-angle-right"></i>

            <ul class="sub-menu">
                <li><a href="?view=add-user">Thêm nhân viên</a></li>
                <li><a href="?view=add-user">Danh sách nhân viên</a></li>
                <li><a href="?view=add-user">Chấm công ngày</a></li>
                <li><a href="?view=list-user">Tính lương nhân viên</a></li>
            </ul>
        </li>
    </ul>
    <script>
        var menuItems = document.querySelectorAll('.nav-link');
        menuItems.forEach(function(item) {
            document.addEventListener('DOMContentLoaded', function() {
                var activeMenuItem = localStorage.getItem('activeMenuItem');
                if (activeMenuItem) {
                    var menuItem = document.querySelector(`.nav-link:contains('${activeMenuItem}')`);
                    menuItem.classList.add('active');
                }
            });
            item.addEventListener('click', function() {
                // Remove the "active" class from all menu items
                menuItems.forEach(function(item) {
                    item.classList.remove('active');

                });
                // Add the "active" class to the clicked menu item
                item.classList.add('active');
                // $(".nav-link.active .sub-menu").slideDown();

                // Save the active menu item to localStorage
                localStorage.setItem('activeMenuItem', item.textContent);
            });

        });
    </script>
</div>
<div id="wp-content">