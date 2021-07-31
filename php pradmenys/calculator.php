<?php
if(isset($_GET["number1"]) && !empty($_GET["number1"]) && isset($_GET["number2"]) && !empty($_GET["number2"])&& isset($_GET["symbol"]) && !empty($_GET["symbol"]) ) {
    $first = $_GET["number1"];
    $second = $_GET["number2"];
    $operator = $_GET["symbol"];
    $results="";
    switch($operator){
        case "+":
        $results= $first+$second;
        break;
        case "-":
        $results= $first-$second;
        break;
        case "*":
        $results= $first*$second;
        break;
        case "/":
        $results= $first/$second;
        break;
    }
    echo "<input disabled='true' value='$results' name='result' />";
    header("location: index.php");
    
    
}
else{
    echo "Kazkas negerai";
}
?>
