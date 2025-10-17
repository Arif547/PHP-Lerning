<?php
    $var = 22;
    
    // while ($var <= 10){
    //     echo "The variable is $var <br>";
    //     $var++;
    // }

// do while loop example 
// the code inside the do block will be executed at least once
// even if the condition is false
// because the condition is checked after the code block is executed
// in while loop the condition is checked before the code block is executed

    do{
       echo "The variable is $var <br>";
        $var++; 
    }
    while ($var <= 20);

?>