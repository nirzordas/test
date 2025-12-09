<?php

echo "For loop (1 to 20, stopping after 5):<br>";
for ($i = 1; $i <= 20; $i++) {
    echo $i . " ";
  
}

echo "<br><br>";

echo "While loop (even numbers from 1 to 20):<br>";
$num = 1;
while ($num <= 20) {
    if ($num % 2 == 0) {
        echo $num . " ";
    }
    $num++;
}

echo "<br><br>";


$fruits = array(
    "apple" => "red",
    "banana" => "yellow",
    "grape" => "purple",
    "orange" => "orange"
);


echo "Fruits and their colors:<br>";
foreach ($fruits as $fruit => $color) {
    echo "Fruit: $fruit, Color: $color<br>";
}
?>
