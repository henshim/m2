<?php
function insertBig($arr)
{
    for ($i = 0; $i < count($arr) - 1; $i++) {
        $loop = $i;
        $current = $arr[$i];
        while ($loop > 0 && ($arr[$loop - 1] > $current)) {
            $arr[$loop] = $arr[$loop - 1];
            $loop -= 1;
        }
        $arr[$loop] = $current;
    }
    return $arr;
}

function insertSmall($arr)
{
    for ($i = 0; $i < count($arr) - 1; $i++) {
        $loop = $i;
        $current = $arr[$i];
        while ($loop > 0 && ($arr[$loop - 1] < $current)) {
            $arr[$loop] = $arr[$loop - 1];
            $loop -= 1;
        }
        $arr[$loop] = $current;
    }
    return $arr;
}

$array = [5, 8, 6, 7, 4, 3, 9];
echo '<pre>';
print_r(insertBig($array));

print_r(insertSmall($array));