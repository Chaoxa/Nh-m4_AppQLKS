<?php
function cut_string($str, $path)
{
    $newPath = str_replace("$str", "", $path);
    return $newPath;
}
