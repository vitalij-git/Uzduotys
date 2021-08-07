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
        <br>
    </div>
    <div>
        <form action="index.php">
            <input type="text" name="id" value="naujas_id" />
            <input type="text" name="vardas" value="naujas_vardas" />
            <input type="text" name="pavarde" value="naujas_pavarde" />
            <input type="text" name="asmens_kodas" value="naujas_asmens_kodas" />
            <input type="text" name="prisinungimo_data" value="naujas_prisinungimo_data" />
            <input type="text" name="adresas" value="naujas_adresas" />
            <input type="text" name="elpastas" value="naujas_elpastas" />
            <button type="submit" name="button">send</button>
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
                echo $elements[$i] . $i . "</div>";
            }
        }
    }
    if (isset($_GET["sendElement"])) {
        addElementToCookie();
    }

    if (isset($_GET["send"])) {
        $id = $_GET["id"];
        $vardas = $_GET["vardas"];
        $pavarde = $_GET["pavarde"];
        $asmens_kodas = $_GET["asmens_kodas"];
        $prisijungimo_data = $_GET["prisijungimo_data"];
        $adresas = $_GET["adresas"];
        $elpastas = $_GET["elpastas"];
        $klientai_tekstas = $_COOKIE["klientai"] ."|";//.$id,$vardas,$pavarde,$asmens_kodas,$prisijungimo_data,$adresas,$elpastas;
        echo $klientai_tekstas;
        setcookie("klientai", $klientai_tekstas, time() + 3600, "/");
    }
    if (!isset($_COOKIE["klientai"])) {
        $klientai = array();
        for ($i = 0; $i <10; $i++) {
            $klientas = array(
                "id" => $i,
                "vardas" => "vardas" . $i,
                "pavarde" => "pavarde" . $i,
                "asmens_kodas" => rand(3, 4) . rand(00, 99) . rand(1, 12) . rand(1, 31) . rand(0, 9999),
                "prisinungimo_data" => rand(1950, 2021) . "-" . rand(1, 12) . "-" . rand(1, 31),
                "adresas" => "adresas" . $i,
                "elpastas" => "pastas" . $i . "@pastas.lt"
            );
            array_push($klientai, $klientas);
            
        }
    } else {
        $klientai = $_COOKIE["klientai"];
        $klientai = explode("|", $klientai);
        for ($i = 0; $i < count($klientai); $i++) {
            $klientai[$i] = explode(",", $klientai[$i]);
        }
    }
    echo "<table>";
    foreach ($klientai as $eilute) {
        echo "<tr>";
        foreach ($eilute as $stulpelis) {
            echo "<td>";
            echo $stulpelis;
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    for ($i = 0; $i < count($klientai); $i++) {
        $klientai[$i] = implode(",", $klientai[$i]);
    }
    $klientai_tekstas = implode("|", $klientai);
    setcookie("klientai", $klientai_tekstas, time() + 3600, "/");
    echo $klientai_tekstas;
    ?>
</body>

</html>