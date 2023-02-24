<?php
function currency_format($number, $suffix = 'đ')
{
    return number_format($number) . $suffix;
}
function price($price, $unit = "")
{
    return number_format($price) . ' ' . $unit;
}
