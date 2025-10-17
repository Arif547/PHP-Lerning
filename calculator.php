<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //Grab data from form
        $num01 = filter_input(INPUT_POST, "num01", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $num02 = filter_input(INPUT_POST, "num02", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $operator = htmlspecialchars($_POST["operator"]);

        //error handling
        $errors = false;

        if (empty($num01) || empty($num02) || empty($operator)) {
            echo "<p>Both numbers are required.<br></p>";
            $errors = true;
        }

        if (!is_numeric($num01) || !is_numeric($num02)) {
            echo "<p>Both values must be numeric.<br></p>";
            $errors = true;
        }

        //calculate the numbers if no errors
        if (!$errors) {
            $value = 0;

            switch ($operator) {
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
                    if ($num02 == 0) {
                        echo "<p>Cannot divide by zero.<br></p>";
                        $errors = true;
                    } else {
                        $value = $num01 / $num02;
                    }
                    break;
                default:
                    echo "<p>Invalid operator selected.<br></p>";
            }

            echo "<h2 class='calc-result'>The answer is: $value</h2>";
        }

    }
    ?>
</body>

<style>
    .calc-result {
        color: green;
    }
</style>
</html>