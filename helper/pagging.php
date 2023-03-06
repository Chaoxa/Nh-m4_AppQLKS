<?php
function get_rooms($start = 1, $num_per_page = 10, $where = "")
{
    if (!empty($where)) {
        $where = "WHERE $where";
    } else {
        $where = "WHERE 1";
    }
    $list_user = db_fetch_array("SELECT *
    FROM tbl_order_room
    INNER JOIN guest ON tbl_order_room.guest_id = guest.users_id
    INNER JOIN tbl_room ON tbl_order_room.room_id = tbl_room.room_id $where LIMIT $start,$num_per_page");
    return $list_user;
};

function get_pagging($num_pages, $page, $base_url = "")
{
    $str_pagging = "<ul class=\"pagging float-right\">";
    if ($page > 1) {
        $before = $page - 1;
        $str_pagging .= "<li><a href=\"?mod=member&act=main&page=$before\">Trước</a></li>";
    }
    for ($i = 1; $i <= $num_pages; $i++) {
        if ($i == $page) {
            $active = "class=\"active\"";
        } else {
            $active = "";
        }
        $str_pagging .= "<li $active ><a href=\"{$base_url}&page={$i}\">$i</a></li>";
    }
    if ($page < $num_pages) {
        $after = $page + 1;
        $str_pagging .= "<li><a href=\"?mod=member&act=main&page=$after\">Sau</a></li>";
    }
    $str_pagging .= "</ul>";
    return $str_pagging;
}
