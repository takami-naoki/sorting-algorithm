<?php

function partition(&$array, $left, $right) {
    $pivotIndex = floor($left + ($right - $left) / 2);
    $pivotValue = $array[$pivotIndex];

    $i = $left;
    $j = $right;

    while ($i <= $j) {
        while ($array[$i] < $pivotValue) {
            $i++;
        }

        while ($array[$j] > $pivotValue) {
            $j--;
        }

        if ($i <= $j) {
            [$array[$i], $array[$j]] = [$array[$j], $array[$i]];
            $i++;
            $j--;
        }
    }
    return $i;
}

function quicksort(&$array, $left, $right) {
    if ($left < $right) {
        $pivotIndex = partition($array, $left, $right);
        quicksort($array, $left,$pivotIndex - 1);
        quicksort($array, $pivotIndex, $right);
    }
}

for ($i = 0; $i < 10; $i++) {
    $array[] = rand(0, 200);
}

echo "First run \r\n";
foreach($array as $value) {
    echo $value . "\r\n";
}
echo "\r\n\r\n";
quicksort($array, 0,count($array) - 1);
foreach($array as $value) {
    echo $value . "\r\n";
}