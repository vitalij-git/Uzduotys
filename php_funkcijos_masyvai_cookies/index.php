<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <form action="index.php" method="get">
            <input type="text" name="massive">
            <button type="submit" name="send">send</button>
        </form>
    </div>
    <div>
        <br>
        <form action="index.php" method="get">
            <button type="submit" name="sendElement">Sukurti elementa</button>
        </form>
    </div>
    <?php
    function masyvoPildymas()
    {
        $massive = array();
        if (isset($_GET["massive"]) && !empty($_GET["massive"])) {
            $number = $_GET["massive"];
            if (isset($_COOKIE["massive"])) {
                setcookie("massive", $_COOKIE["massive"] . "," . $number, time() + 3600, "/");
            } else {
                setcookie("massive", $number, time() + 3600, "/");
            }
            if (isset($_COOKIE["massive"])) {
                $massive = explode(",", $_COOKIE["massive"]);
                var_dump($massive);
            }
        }
    }
    if (isset($_GET["send"])) {
        masyvoPildymas();
    }

  
    function createElement()
    {
        return "<div class='elementas'>Elementas";
    }
    function addElementToCookie()
    {
        if (isset($_COOKIE["elementas"])) {
            setcookie("elementas", $_COOKIE["elementas"] . "," . createElement(), time() + 3600, "/");
        } else {
            setcookie("elementas", createElement(), time() + 3600, "/");
        }
        if (isset($_COOKIE["elementas"])) {
            $elements = explode(",", $_COOKIE["elementas"]);
            for ($i = 0; $i < count($elements); $i++) {
                echo $elements[$i].$i."</div>";
               
            }
        }
    }
    if (isset($_GET["sendElement"])) {
        addElementToCookie();
    }




    ?>
</body>

</html>