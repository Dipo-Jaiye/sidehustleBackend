<!DOCTYPE HTML>
<html>
    <head></head>
    <body>
        <?php
        $num1Err = $num2Err = $operatorErr = "";
        $num1 = $num2 = $operator = $result = "";
        echo "Simple Calculator<br><br>";
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if(empty($_POST["num1"])){
                $num1Err = "required";
            }elseif(empty($_POST["operator"])){
                $operatorErr = "required";
            }elseif(empty($_POST["num2"])){
                $num2Err = "required";
            }else{
                $num1 = $_POST["num1"];
                $num2 = $_POST["num2"];
                $operator = $_POST["operator"];
                switch($operator){
                    case "+": $result = "$num1 $operator $num2 = ".($num1 + $num2);
                    break;
                    case "-": $result = "$num1 $operator $num2 = ".($num1 - $num2);
                    break;
                    case "*": $result = "$num1 $operator $num2 = ".($num1 * $num2);
                    break;
                    case "/": $result = "$num1 $operator $num2 = ".($num1 / $num2);
                    break;
                }
            }
        }?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <input type="text" id="num1" name="num1" pattern="[0-9]+.?[0-9]*"><span class="error"> <?php echo $num1Err;?></span><br><br>
            <input type="radio" id="add" name="operator" value="+">+
            <input type="radio" id="sub" name="operator" value="-">-
            <input type="radio" id="prod" name="operator" value="*">*
            <input type="radio" id="div" name="operator" value="/">/<span class="error"> <?php echo $operatorErr;?></span><br><br>
            <input type="text" id="num2" name="num2" pattern="[0-9]+.?[0-9]*"><span class="error"> <?php echo $num2Err;?></span><br>
            <input type="submit" value="Submit">
        </form>
        <?php
        echo $result;
        ?>
    </body>
</html>

