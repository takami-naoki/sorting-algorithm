<?php

function quickSort(int $start, int $end, array &$arr) {
    if ($end <= $start || count($arr) < 2) {
        return;
    }

    $pivot = $arr[(int)(($start + $end) / 2)];

    [$left, $right] = [$start, $end];

    while (true) {
        while ($arr[$left] < $pivot) {
            $left++;
        }

        while ($arr[$right] > $pivot) {
            $right--;
        }

        if ($right <= $left) {
            break;
        }
        [$arr[$left], $arr[$right]] = [$arr[$right], $arr[$left]];
        $left++;
        $right--;
    }

    if ($start < $left - 1) {
        quickSort($start, $left - 1, $arr);
    }
    if ($right + 1 < $end) {
        quickSort($right + 1, $end, $arr);
    }
}

$a = range(0, 100);
shuffle($a);
quickSort(0, count($a) - 1, $a);
print_r($a);