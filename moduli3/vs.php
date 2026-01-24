<?php
$var1 = 10;
if ($var1 >0 ) {
    echo"$var1 is bigger than 0 <hr>";
}

$age = 19;
if ($age >18 ) {
    echo" you can vote<hr>";
}
else  {
    echo"you can not vote";
}


$a = 5;
$b = 10;

if ($a > $b) {
    echo "a is bigger than b <hr>";
} else if ($a < $b) {
    echo "b is bigger than a <hr>";
} else {
    echo "a and b are equal <hr>";



}

switch ($age) {
    case ($age >= 0 && $age < 18):
        echo "You are a minor.";
        break;

    case ($age >= 18 && $age < 25):
        echo "You are a young adult";
        break;

    case ($age >= 25 && $age < 65):
        echo "You are middle age.";
        break;

    case ($age >= 65):
        echo "You are a senior.";
        break;

    default:
        echo "Invalid age value.";
    }
    echo "<hr>";
    

$x = 10;

while ($x <= 15) {
    echo $x . "\n";
    $x++;
}
$z=10;
do {
    echo "z is now: $z <hr>";
    $z++;
}while ($z <= 100);


?>




