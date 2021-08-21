<?php require_once("connection.php");

echo '<form action="generateClients.php" method="get">
 <button type="submit" name="generate">Pildyti</button>
 </form>';


class Klientas
{
    public $name;
    public $surname;
    public $perks;
    public $date_joined;

    function __construct($name, $surname, $perks, $date_joined)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->perks = $perks;
        $this->date_joined = $date_joined;
    }
}

$klientai = array();
for ($i = 0; $i < 200; $i++) {
    array_push($klientai, new Klientas("vardas" . ($i + 1), "pavarde" . ($i + 1), rand(0, 4), getdate()));
    //$sql="INSERT INTO klientai(vardas, pavarde, teises_id) VALUES ('vardas.($i+1)','pavarde.($i+1)',rand(1,10))";
}
if (isset($_GET["generate"])) {
    foreach ($klientai as $client) {
        $name = $client->name;
        $surname = $client->surname;
        $perks = $client->perks;
        $date_joined = $client->date_joined;
        $year = $date_joined["year"];
        $mon =$date_joined["mon"];
        $day= $date_joined["mday"];
        if($mon<10){
            $mon="0".$mon;
        }
        if($day<10){
            $day="0".$day;
        }
        $date = $year.':'.$mon.':'.$day;
        $sql = "INSERT INTO `clients`( `name`, `surname`, `date_joined`, `perks_id`) VALUES 
                ('$name','$surname','$date','$perks')";
        if (mysqli_query($conn, $sql)) {
                echo "Klientas pridetas";
        } else {
            echo "ne";
        }
    }
}
