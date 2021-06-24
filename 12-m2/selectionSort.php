<?php
function selectionBig($arr)
{
    for ($i = 0; $i < count($arr) - 1; $i++) {
        $min = $i;
        for ($j = $i + 1; $j < count($arr); $j++) {
            if ($arr[$j] > $arr[$min]) {
                $min = $j;
            }
        }
        $temp = $arr[$i];
        $arr[$i] = $arr[$min];
        $arr[$min] = $temp;
    }
    return $arr;
}

function selectionSmall($arr)
{
    for ($i = 0; $i < count($arr) - 1; $i++) {
        $max = $i;
        for ($j = $i + 1; $j < count($arr); $j++) {
            if ($arr[$j] < $arr[$max]) {
                $max = $j;
            }
        }
        $temp = $arr[$i];
        $arr[$i] = $arr[$max];
        $arr[$max] = $temp;
    }
    return $arr;
}

$array = [5, 8, 6, 7, 4, 3, 9];
echo '<pre>';
print_r(selectionBig($array));

print_r(selectionSmall($array));
