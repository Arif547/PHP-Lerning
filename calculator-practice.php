<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <input type="number" step="any" name="num01" placeholder="Enter first number" >
        <br>
        <select name="operator" id="operator">
            <option value="add">+</option>
            <option value="subtract">-</option>
            <option value="multiply">*</option>
            <option value="divide">/</option>
        </select>
        <br>
        <input type="number" step="any" name="num02" placeholder="Enter second number" >
        <br>
        <button type="submit" name="submit" value="submit">Calculate</button>
    </form>

    <?php
    $value = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        $num01 = filter_input(INPUT_POST, "num01", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $num02 = filter_input(INPUT_POST, "num02", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $operator = htmlspecialchars($_POST["operator"]);

        $error = false;

        if (empty($num01) || empty($num02) || empty($operator)){
            echo "<p>Both numbers are required.<br></p>";
            $error = true;
        }

        if (!is_numeric($num01) || !is_numeric($num02)){
            echo "<p>Both values must be numeric.<br></p>";
            $error = true;
        }

        if (!$error){
            switch ($operator){
                case "add":
                    $value = $num01 + $num02;
                    break;
                case "subtract":
                    $value = $num01 - $num02;
                    break;
                case "multiply":
                    $value = $num01 * $num02;
                    break;
                case "divide":
                    $value = $num01 / $num02;
                    break;
            }
        }

        echo "<h3> The answer is: $value </h3>";
    }

    ?>
</body>
</html>