<?php
function currency_format($number, $suffix = 'đ')
{
    return number_format($number) . $suffix;
}

function limit_string($string, $limit)
{
    // Kiểm tra độ dài của chuỗi
    if (strlen($string) > $limit) {
        // Cắt chuỗi đến độ dài tối đa và thêm dấu '...'
        $truncatedString = substr($string, 0, $limit) . '...';
    } else {
        $truncatedString = $string;
    }
    // Trả về chuỗi đã giới hạn số kí tự
    return $truncatedString;
}
