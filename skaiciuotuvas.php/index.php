<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skaiciuotuvas</title>
</head>

<body>

    <form action="skaiciuotuvas.php" method="get">
        <input type="text" name="aritmetika" />
        <button type="submit" name="patvirtinti">Skaiciuoti</button>
    </form>

    <?php

    //setcookie;

    //
    //masyvas, skaicius, tekstas, objektas, kitas sausainiukas

    // setcookie("laikinojiatmintis", 8, time() + 3600 , "/");

    // echo time();
    //$lainojiatmintis = 8


    //Funkcijos, Cookies

    function skaiciavimoFunkcija($simbolis, $aritmetika)
    {
        $duomenuMasyvas = explode($simbolis, $aritmetika);

        // var_dump($duomenuMasyvas);
        $duomenuMasyvas[2] = $simbolis;

        //Kintamuju sukeitimas pasitelkian pagalbini kintamaji
        $pagalbinis = $duomenuMasyvas[2]; // +
        $duomenuMasyvas[2] = $duomenuMasyvas[1];
        $duomenuMasyvas[1] = $pagalbinis;
        if ($simbolis == "+") {
            return $duomenuMasyvas[0] + $duomenuMasyvas[2];
        } else if ($simbolis == "-") {
            return $duomenuMasyvas[0] - $duomenuMasyvas[2];
        } else if ($simbolis == "/") {
            return $duomenuMasyvas[0] / $duomenuMasyvas[2];
        } else if ($simbolis == "*") {
            return $duomenuMasyvas[0] * $duomenuMasyvas[2];
        } else if ($simbolis == "%") {
            return $duomenuMasyvas[0] % $duomenuMasyvas[2];
        }
        return "Veiksmo neimanoma atlikt";
    }

    if (isset($_GET["patvirtinti"])) {
        if (isset($_GET["aritmetika"]) && !empty($_GET["aritmetika"])) {
            $aritmetika = $_GET["aritmetika"];

            // " " - tai yra simbolis
            //Galbut funkcija, kuri leistu ieskoti tam tikru simboliu ir juos panaikinti?
            //str_replace - ji randa mums norima simboli, ir ta surasta simboli pakeisti

            $aritmetika = str_replace(" ", "", $aritmetika);

            $rezultatas = 0;
            $duomenuMasyvas = 0;
            // + 
            // teksta => masyva
            // 4+5 [4, '+', 5]
            // 150 - 3 [1,5,0,"",3]
            // $duomenuMasyvas = str_split($aritmetika, 1) //teksta i masyva i vienodas dalis
            // explode - teksta pavercia i masyva
            // suskaido i masyva pagal delimiter(simboli)

            //Paieska tekstineje eilute: ar yra simbolis + - / *
            //strpos - string position
            // ji iesko ar tekstineje eilute yra kazkoks musu nurodytas simbolis

            $simbolioPozicija = strpos($aritmetika, "+");
            // jeigu jinai neranda simbolio, grazinama false
            // jeigu simbolis yra surastas - grazina simbolio pozicija

            // 4+5 veikia 1
            // 10+5 nebeveikia pozicija? 2
            //patikrinti ne kurioje pozicija yra simbolis? o tiesiog ar musu
            //kintamasis yra !false

            //ar simbolis ir kad simbolis viena karta
            //substr_count - substring count, grazina tik skaiciu
            //skaiciuoja kiek kartu pasikartoja tekstas/simbolis tekstineje eiluteje

            // $simboliuSk = substr_count($tekstas, "+");

            // echo "Pliusu skaicius: ".$pliusuSk;

            if (strpos($aritmetika, "+") != false && substr_count($aritmetika, "+") == 1) {
                $rezultatas = skaiciavimoFunkcija("+", $aritmetika);
            } else if (strpos($aritmetika, "-") != false && substr_count($aritmetika, "-") == 1) {
                $rezultatas = skaiciavimoFunkcija("-", $aritmetika);
            } else if (strpos($aritmetika, "/") != false && substr_count($aritmetika, "/") == 1) {
                $rezultatas = skaiciavimoFunkcija("/", $aritmetika);
            } else if (strpos($aritmetika, "*") != false && substr_count($aritmetika, "*") == 1) {
                $rezultatas = skaiciavimoFunkcija("*", $aritmetika);
            } else if (strpos($aritmetika, "%") != false && substr_count($aritmetika, "%") == 1) {
                $rezultatas = skaiciavimoFunkcija("%", $aritmetika);
            } else {
                $rezultatas = "Veiksmo zenklas neteisingas";
            }

            //PHP echo komanda jeigu true/false kintamaji - 1 arba tuscia eilute
            //var_dump - mes galime isvedineti masyvus
            //var_dump - bet koki kintamaji, kad patikrintume kokio jisai yra tipo

            //isaugodami informacija i cookie, mes dar turim atsiminti ir jo paties reiksme

            if (isset($_COOKIE["aritmetika"]) && isset($_COOKIE["aritmetika"])) {
                setcookie("aritmetika", $_COOKIE["aritmetika"] . "|" . $aritmetika, time() + 3600, "/");
                setcookie("rezultatas", $_COOKIE["rezultatas"] . "|" . $rezultatas, time() + 3600, "/");
            } else {
                setcookie("aritmetika", $aritmetika, time() + 3600, "/");
                setcookie("rezultatas", $rezultatas, time() + 3600, "/");
            }
            if (isset($_COOKIE["aritmetika"]) && isset($_COOKIE["aritmetika"])) {
                echo "<div>";
                echo "Skaiciai is laikinosios atminties:<br>";
                // echo $_COOKIE["aritmetika"]."=";
                // echo $_COOKIE["rezultatas"];
                echo "</div>";
                $aritmetikasMasyvas= explode("|",$_COOKIE["aritmetika"]);
                $rezultatoMasyvas=explode("|",$_COOKIE["rezultatas"]);
                echo "<table>";
                for ($i=0 ; $i<count($aritmetikasMasyvas); $i++){
                    echo "<tr>";
                    echo "<td>";
                        echo $aritmetikasMasyvas[$i];
                    echo "</td>";
                    echo "<td>";
                    echo $rezultatoMasyvas[$i];
                echo "</td>";
                    echo "</tr>";

                }
                echo "</table>";
            }


            echo "<div>";
            echo " <h1> Skaiciavimo rezultatas </h1>";
            echo $aritmetika;
            echo "=";
            echo $rezultatas;
            echo "</div>";
        } else {
            echo "Laukelis tuscias";
        }
    }

    // $_GET["patvirtinti"] = // true arba false reiksmes
    // jei mygtukas buvo paspaustas - true
    //jei ne - false



    // 1. Užduotis "Skaičiuotuvas"

    // Sukurti skaičiuotuvą. 
    // Skaičiuotuve įvedami du skaičiai ir veiksmas ivedamas i ta pati laukeli.
    // Rezultatas išvedamas į div.

    //2. Papildyti Užduotis "Skaičiuotuvas" taip, 
    // kad rezultatas būtų atvaizduojamas tame pačiame lange

    //3. Turi buti matoma skaiciavimo istorija
    //Vieta, kurioje saugoma informacija
    //Duomenu baze
    //Cookies - sausainiukai - Duomenu failas

    //laikinasis duomenu failas, kuris yra saugomas narsykles aplanke ir jis saugo informacija,
    //tam tikra laiko tarpa


    ?>
</body>

</html>