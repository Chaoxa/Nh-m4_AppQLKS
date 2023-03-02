<?php
function get_detail_room($id)
{
    $list_rooms = db_fetch_array("SELECT * FROM tbl_room INNER JOIN tbl_hotel ON tbl_room.parent_hotel = tbl_hotel.id");
    foreach ($list_rooms as $room) {
        if ($room['room_id'] == $id) {
            $room['url_order'] = "?mod=order&action=checkout&id=$id";
            $room['thumb_detail'] = json_decode($room['thumb_detail'], true);
            return $room;
        }
    }
}
