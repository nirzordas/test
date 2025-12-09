<?php

function sum($a, $b){ 
    return $a + $b;
}


echo "Sum Examples:<br>";
echo "Sum of 5 and 10 = " . sum(5, 10) . "<br>";
echo "Sum of 20 and 30 = " . sum(20, 30) . "<br>";

echo "<br>";

function factorial($n) {
    if ($n <= 1) {
        return 1;
    }
    return $n * factorial($n - 1);
}


echo "Factorial Example:<br>";
echo "Factorial of 5 = " . factorial(5) . "<br>";

echo "<br>";


function is_prime($n) {
    if ($n <= 1) {
        return false;
    }

    if ($n == 2 || $n == 3) {
        return true;
    }


    if ($n % 2 == 0 || $n % 3 == 0) {
        return false;
    }

 
    return true;
}


echo "Prime Number Check:<br>";
$numbers = array(2, 3, 4, 7, 10, 13,21);

foreach ($numbers as $num) {
    if (is_prime($num)) {
        echo "$num is a Prime number<br>";
    } else {
        echo "$num is NOT a Prime number<br>";
    }
}
?>
