<?php
    $var = 7;

// if($var > 5){
//     echo "The variable is greater than 5";
// } elseif($var == 3){
//     echo "The variable is equal to 3";
// } else {
//     echo "The variable is less than 5";
// }

if ($var % 2 == 0 && $var % 3 == 0) {
    echo  $var . " is divisible by 2 and 3";
}
elseif ($var % 2 == 0) {
    echo  $var . " is divisible by 2";
} elseif ($var % 3 == 0) {
    echo  $var . " is divisible by 3";
} else {
    echo  $var . " is not divisible by 2 or 3";
    echo "<br>";
    echo $var % 2;
    echo "<br>";
    echo $var % 3;
}

?>

