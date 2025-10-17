<?php
$level = 3;

switch ($level){
    case 1:
        echo "You are a beginner level user " . $level;
        break;
    case 2:
        echo "You are a intermediate level user " . $level;
        break;
    case 3:
        echo "You are a advanced level user " . $level; 
        break;
    default:
        echo "You are not a valid user ";
}

?>