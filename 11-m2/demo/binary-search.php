<?php
function search($arr, $left, $right, $target)
{
    $mid = ($left + $right) / 2;

    if ($right - $left <= 0) {
        return -1;
    }
    if ($target === $mid) {
        return $mid;
    } elseif ($target >= $mid) {
        return search($arr, $mid + 1, $right, $target);
    } else {
        return search($arr, $left, $mid - 1, $target);
    }
}

$arr = [1, 2, 3, 4, 5, 6, 7, 8, 9];
$left = $arr[0];
$right = count($arr) - 1;
$target = 7;

if (search($arr, $left, $right, $target)) {
    echo 'True';
} else {
    echo 'False';
}