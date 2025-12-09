<?php

$stringVar = "Hello PHP!";
$intVar = 25;
$floatVar = 12.5;
$boolVar = true;


$addition = $intVar + $floatVar;
$subtraction = $intVar - $floatVar;
$multiplication = $intVar * $floatVar;
$division = $intVar / $floatVar;


echo "Addition: $addition <br>";
echo "Subtraction: $subtraction <br>";
echo "Multiplication: $multiplication <br>";
echo "Division: $division <br><br>";


$num1 = 10;
$num2 = 20;

echo "Sum using echo: " . ($num1 + $num2) . "<br>";
print "Sum using print: " . ($num1 + $num2) . "<br><br>";


echo "<h3>Using var_dump()</h3>";
var_dump($stringVar);
echo "<br>";
var_dump($intVar);
echo "<br>";
var_dump($floatVar);
echo "<br>";
var_dump($boolVar);
echo "<br>";
?>
