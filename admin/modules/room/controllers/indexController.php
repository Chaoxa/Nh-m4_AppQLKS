<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
}

function indexAction()
{
    $list_rooms = db_fetch_array('SELECT * FROM tbl_room INNER JOIN tbl_hotel ON tbl_room.parent_hotel = tbl_hotel.id;');
    $data['list_rooms'] = $list_rooms;
    load_view('index', $data);
}

function addAction()
{
    // show_array($_POST);
    // show_array($_FILES);
    global $time, $error, $creator, $notify, $hotel_name, $old_price, $discount, $new_price, $desc, $detail, $parent_hotel, $target_file;
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $time = date("d/m/Y") . ' | ' . date('H:i');
    $creator = user_login();
    if (isset($_POST['btn-add'])) {
        $error = array();
        if (empty($_POST['hotel_name'])) {
            $error['hotel_name'] = '(*)Không được để trống tên khách sạn!';
        } else {
            $hotel_name = $_POST['hotel_name'];
        }
        if (empty($_POST['old_price'])) {
            $error['old_price'] = '(*)Không được để trống giá tiền!';
        } else {
            $old_price = $_POST['old_price'];
        }
        if (!empty($_POST['discount'])) {
            $discount = $_POST['discount'];
        } else {
            $discount = '';
        }
        if (!empty($_POST['new_price'])) {
            $new_price = $_POST['new_price'];
        } else {
            $error['new_price'] = '(*)Không được để trống thành tiền!';
        }
        if (empty($_POST['desc'])) {
            $error['desc'] = '(*)Không được để trống mô tả ngắn!';
        } else {
            $desc = $_POST['desc'];
        }
        if (empty($_POST['detail'])) {
            $error['detail'] = '(*)Không được để trống chi tiết sản phẩm!';
        } else {
            $detail = $_POST['detail'];
        }
        if (empty($_POST['hotel_cat'])) {
            $error['hotel_cat'] = '(*)Không được để trống danh mục cha!';
        } else {
            $parent_hotel = $_POST['hotel_cat'];
        }
        if (!empty($_POST['amount_room'])) {
            $amount_room = $_POST['amount_room'];
        }

        #upload main image
        $file_upload_name = $_FILES['file_upload']['name'];
        #Tạo đường dẫn file chứa images
        $target_dir = "public/uploads/";
        #Tạo đường dẫn file sau khi upload lên hệ thống
        $target_file = $target_dir . $file_upload_name;
        $file_upload_size = $_FILES['file_upload']['size'];
        $file_type = pathinfo($file_upload_name, PATHINFO_EXTENSION);
        $file_type_allow = array('jpg', 'png', 'jpeg', 'gif');
        // echo $target_file;

        if (empty($_FILES['file_upload']['name'])) {
            $error["file_upload"] = "(*)Không được để trống ảnh chính!";
        } else if ($file_upload_size > 5242880) {
            $error["file_upload"] = "Kích thước file không được vượt quá 5MB";
        } else if (!in_array(strtolower($file_type), $file_type_allow)) {
            $error["file_upload"] = "Chỉ cho upload file ảnh có đuôi jpg,png,jpeg,gif";
        } else if (file_exists($target_file)) {
            // $error['file_upload'] = "File $target_file đã tồn tại trên hệ thống!";
        } else {
            $flag_1 = true;
        }


        #Upload image detail
        // show_array($_FILES);
        if (empty($_FILES['files']['name'][0])) {
            $error['file_upload_detail'] = '(*)Không được để trống ảnh chi tiết!';
        } else {
            $list_target_file = array();
            $list_file_upload_name = $_FILES['files']['name'];
            // show_array($list_file_upload_name);
            foreach ($list_file_upload_name as $value) {
                #Tạo đường dẫn file chứa images
                $target_dir = "public/uploads/";
                #Tạo đường dẫn file sau khi upload lên hệ thống
                $list_target_file[] = $target_dir . $value;
            }
            // show_array($target_file);


            #Kiểm tra kích thước
            global $temp;
            $temp = 0;
            $list_file_upload_size = $_FILES['files']['size'];
            foreach ($list_file_upload_size as $value) {
                $temp++;
                if ($value > 5242880) {
                    $error["file_upload_size_$temp"] = "Kích thước file $value không được vượt quá 5MB";
                }
            }
            // show_array($error);


            #Kiểm tra loại file 
            // Lấy đuôi pathinfo
            $file_type = array();
            foreach ($list_file_upload_name as $value) {
                $file_type[] = pathinfo($value, PATHINFO_EXTENSION);
            }
            // show_array($file_type);
            // Tạo mảng có pathinfo cho phép 
            $file_type_allow = array('jpg', 'png', 'jpeg', 'gif');
            foreach ($file_type as $value) {
                $temp++;
                if (!in_array(strtolower($value), $file_type_allow)) {
                    $error["file_upload_$temp"] = "Chỉ cho upload file ảnh có đuôi jpg,png,jpeg,gif";
                }
            }

            #Kiểm tra sự tồn tại của file trên hệ thống
            // show_array($list_target_file);
            // foreach ($list_target_file as $value) {
            //     if (file_exists($value)) {
            //         $error['file_upload_detail'] = "File $value đã tồn tại trên hệ thống!";
            //         break;
            //     }
            // }

        }
        if (!empty($list_file_upload_name)) {
            $result = array();
            foreach ($list_file_upload_name as $value) {
                $result[] = "admin/public/uploads/$value";
            }
            $thumb_detail = json_encode($result);
        }

        if (empty($error)) {
            #Kiểm tra và chuyển file từ bộ nhớ tạm lên server
            $file_upload_tmp_name = $_FILES['file_upload']['tmp_name'];
            move_uploaded_file($file_upload_tmp_name, $target_file);

            $list_file_upload_tmp_name = $_FILES['files']['tmp_name'];
            // show_array($list_file_upload_tmp_name);
            $temp = -1;
            foreach ($list_file_upload_tmp_name as $value) {
                $temp++;
                if (move_uploaded_file($value, $list_target_file[$temp])) {
                } else {
                    echo "Bạn đã upload thất bại";
                };
            }
            $data = array(
                'room_name' => $hotel_name,
                'old_price' => $old_price,
                'discount' => $discount,
                'new_price' => $new_price,
                'hotel_desc' => $desc,
                'hotel_detail' => $detail,
                'parent_hotel' => $parent_hotel,
                'thumb_main_room' => "admin/public/uploads/$file_upload_name",
                'thumb_detail' => $thumb_detail,
                'time' => $time,
                'creator' => $creator,
                'number_rooms' => $amount_room,
            );
            $notify = array();
            $notify['add_success'] = "Đã thêm phòng thành công!";
            db_insert('tbl_room', $data);
        }
    }
    $list_hotel = db_fetch_array('SELECT * FROM `tbl_hotel`');
    // show_array($list_hotel);

    $data['list_hotel'] = $list_hotel;
    load_view('add', $data);
}
function update_roomAction()
{
    // show_array($_POST);
    // show_array($_FILES);
    $id = $_GET['id'];
    global $time, $error, $creator, $notify, $hotel_name, $old_price, $discount, $new_price, $desc, $detail, $parent_hotel, $target_file, $amount_room;
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $time = date("d/m/Y") . ' | ' . date('H:i');
    $creator = user_login();
    if (isset($_POST['btn-add'])) {
        $error = array();
        if (empty($_POST['hotel_name'])) {
            $error['hotel_name'] = '(*)Không được để trống tên khách sạn!';
        } else {
            $hotel_name = $_POST['hotel_name'];
        }
        if (empty($_POST['old_price'])) {
            $error['old_price'] = '(*)Không được để trống giá tiền!';
        } else {
            $old_price = $_POST['old_price'];
        }
        if (!empty($_POST['discount'])) {
            $discount = $_POST['discount'];
        } else {
            $discount = '';
        }
        if (!empty($_POST['new_price'])) {
            $new_price = $_POST['new_price'];
        } else {
            $error['new_price'] = '(*)Không được để trống thành tiền!';
        }
        if (empty($_POST['desc'])) {
            $error['desc'] = '(*)Không được để trống mô tả ngắn!';
        } else {
            $desc = $_POST['desc'];
        }
        if (empty($_POST['detail'])) {
            $error['detail'] = '(*)Không được để trống chi tiết sản phẩm!';
        } else {
            $detail = $_POST['detail'];
        }
        if (empty($_POST['hotel_cat'])) {
            $error['hotel_cat'] = '(*)Không được để trống danh mục cha!';
        } else {
            $parent_hotel = $_POST['hotel_cat'];
        }
        if (!empty($_POST['amount_room'])) {
            $amount_room = $_POST['amount_room'];
        }

        #upload main image
        $file_upload_name = $_FILES['file_upload']['name'];
        #Tạo đường dẫn file chứa images
        $target_dir = "public/uploads/";
        #Tạo đường dẫn file sau khi upload lên hệ thống
        $target_file = $target_dir . $file_upload_name;
        $file_upload_size = $_FILES['file_upload']['size'];
        $file_type = pathinfo($file_upload_name, PATHINFO_EXTENSION);
        $file_type_allow = array('jpg', 'png', 'jpeg', 'gif');
        // echo $target_file;

        if (empty($_FILES['file_upload']['name'])) {
            // $error["file_upload"] = "(*)Không được để trống ảnh chính!";
        } else if ($file_upload_size > 5242880) {
            $error["file_upload"] = "Kích thước file không được vượt quá 5MB";
        } else if (!in_array(strtolower($file_type), $file_type_allow)) {
            $error["file_upload"] = "Chỉ cho upload file ảnh có đuôi jpg,png,jpeg,gif";
        } else if (file_exists($target_file)) {
            // $error['file_upload'] = "File $target_file đã tồn tại trên hệ thống!";
        } else {
            $flag_1 = true;
        }


        #Upload image detail
        // show_array($_FILES);
        if (empty($_FILES['files']['name'][0])) {
            // $error['file_upload_detail'] = '(*)Không được để trống ảnh chi tiết!';
        } else {
            $list_target_file = array();
            $list_file_upload_name = $_FILES['files']['name'];
            // show_array($list_file_upload_name);
            foreach ($list_file_upload_name as $value) {
                #Tạo đường dẫn file chứa images
                $target_dir = "public/uploads/";
                #Tạo đường dẫn file sau khi upload lên hệ thống
                $list_target_file[] = $target_dir . $value;
            }
            // show_array($target_file);


            #Kiểm tra kích thước
            global $temp;
            $temp = 0;
            $list_file_upload_size = $_FILES['files']['size'];
            foreach ($list_file_upload_size as $value) {
                $temp++;
                if ($value > 5242880) {
                    $error["file_upload_size_$temp"] = "Kích thước file $value không được vượt quá 5MB";
                }
            }
            // show_array($error);


            #Kiểm tra loại file 
            // Lấy đuôi pathinfo
            $file_type = array();
            foreach ($list_file_upload_name as $value) {
                $file_type[] = pathinfo($value, PATHINFO_EXTENSION);
            }
            // show_array($file_type);
            // Tạo mảng có pathinfo cho phép 
            $file_type_allow = array('jpg', 'png', 'jpeg', 'gif');
            foreach ($file_type as $value) {
                $temp++;
                if (!in_array(strtolower($value), $file_type_allow)) {
                    $error["file_upload_$temp"] = "Chỉ cho upload file ảnh có đuôi jpg,png,jpeg,gif";
                }
            }

            #Kiểm tra sự tồn tại của file trên hệ thống
            // show_array($list_target_file);
            // foreach ($list_target_file as $value) {
            //     if (file_exists($value)) {
            //         $error['file_upload_detail'] = "File $value đã tồn tại trên hệ thống!";
            //         break;
            //     }
            // }

        }
        if (!empty($list_file_upload_name)) {
            $result = array();
            foreach ($list_file_upload_name as $value) {
                $result[] = "admin/public/uploads/$value";
            }
            $thumb_detail = json_encode($result);
        }

        if (empty($error)) {
            // #Kiểm tra và chuyển file từ bộ nhớ tạm lên server
            // $file_upload_tmp_name = $_FILES['file_upload']['tmp_name'];
            // move_uploaded_file($file_upload_tmp_name, $target_file);

            // $list_file_upload_tmp_name = $_FILES['files']['tmp_name'];
            // // show_array($list_file_upload_tmp_name);
            // $temp = -1;
            // foreach ($list_file_upload_tmp_name as $value) {
            //     $temp++;
            //     if (move_uploaded_file($value, $list_target_file[$temp])) {
            //     } else {
            //         echo "Bạn đã upload thất bại";
            //     };
            // }
            $data = array(
                'room_name' => $hotel_name,
                'old_price' => $old_price,
                'discount' => $discount,
                'new_price' => $new_price,
                'hotel_desc' => $desc,
                'hotel_detail' => $detail,
                'parent_hotel' => $parent_hotel,
                'time' => $time,
                'creator' => $creator,
                'number_rooms' => $amount_room,
            );
            $notify = array();
            $notify['add_success'] = "Đã cập nhật thành công!";
            db_update('tbl_room', $data, "room_id = $id");
        }
    }
    $room = db_fetch_row("SELECT * FROM `tbl_room` WHERE `room_id` = $id");
    $list_hotel = db_fetch_array('SELECT * FROM `tbl_hotel`');

    $data['list_hotel'] = $list_hotel;
    $data['room'] = $room;
    load_view('update', $data);
};

function delete_roomAction()
{
    $id = $_GET['id'];
    db_delete('tbl_room', "`room_id` = $id");
    redirect('?mod=room&action=index');
};
