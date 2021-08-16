<?php

use Klientas as GlobalKlientas;

require_once("connection.php");
echo '<form action="duomenubazesuplidymas.php" method="post">
 <button type="submit" name="send">send</button>
 </form>';

class Klientas{
    public $name;
    public $surname;
    public $perks;

     function __construct($name, $surname, $perks)
    {
        $this->name=$name;
        $this->surname=$surname;
        $this->perks=$perks;
    }
}

$klientai= array();
for($i=0;$i<200;$i++){
    array_push($klientai, new Klientas("vardas".($i+1),"pavarde".($i+1),rand(1,10)));
    //$sql="INSERT INTO klientai(vardas, pavarde, teises_id) VALUES ('vardas.($i+1)','pavarde.($i+1)',rand(1,10))";
}
// var_dump($klientai);
if(isset($_POST["send"])){
foreach($klientai as $client){
    $name= $client->name;
    $surname =$client->surname;
    $perks= $client->perks;
    $sql="INSERT INTO klientai(vardas, pavarde, teises_id) VALUES ('$name','$surname',$perks)";
    if(mysqli_query($login, $sql)){ 
   }
   else{
       echo "ne";
   }
}


}

?>