<?php
if(isset($_GET["graza"]) && !empty($_GET["graza"])) {
   $g= $_GET["graza"];
   $banknotai = array(20, 20, 30, 30, 30);
   $isduotiBanknotai = array(0, 0, 0, 0, 0);
   $monetos = array(50, 50);
   $isduotiMonetos = array(0, 0);
   echo "Graza: ".$g ;
    while ($g >= 100) {
        if ($banknotai[0] === 0) {
            break;
        }
        $g -= 100;
        $banknotai[0]--;
        $isduotiBanknotai[0]++;

    }
    while ($g >= 50) {
        if ($banknotai[1] === 0) {
            break;
        }
        $g -= 50;
        $banknotai[1]--;
        $isduotiBanknotai[1]++;
    }
    while ($g >= 20) {
        if ($banknotai[2] === 0) {
            break;
        }
        $g -= 20;
        $banknotai[2]--;
        $isduotiBanknotai[2]++;
    }
    while ($g >= 10) {
        if ($banknotai[3] === 0) {
            break;
        }
        $g -= 10;
        $banknotai[3]--;
        $isduotiBanknotai[3]++;
    }
    while ($g >= 5) {
        if ($banknotai[4] === 0) {
            break;
        }
        $g -= 5;
        $banknotai[4]--;
        $isduotiBanknotai[4]++;
    }
    while ($g >= 2) {
        if ($monetos[0] === 0) {
            break;
        }
        $g -= 2;
        $monetos[0]--;
        $isduotiMonetos[0]++;
    }
    while ($g >= 1) {
        if ($monetos[1] === 0) {
            break;
        }
       $g-= 1;
        $monetos[1]--;
        $isduotiMonetos[1]++;
    }
    if ($g >= 1) {
       echo "atsiprasome, kasoje yra truksta nominalu, jums grazinti. Prasome kviesti konsultanta";
       echo "<br>";
       echo "jums liko ismoketi " . $g. " euru";
    }
    echo "<br>";
    echo "jums priklauso: <br> 100 nominalu kiekis: ".$isduotiBanknotai[0]. "<br> 50 nominalu kiekis: ".$isduotiBanknotai[1]."<br> 20 nominalu kiekis: " .$isduotiBanknotai[2]."<br> 10 nominalu kiekis: ".$isduotiBanknotai[3]."<br> 5 nominalu kiekis: ".$isduotiBanknotai[4]."<br> 2 nominalu kiekis: ".$isduotiMonetos[0]."<br> 1 nominalu kiekis: ". $isduotiMonetos[1];
    echo "<br>";
    echo "kasoje liko: <br> 100 nominalu kiekis: ".$banknotai[0]. "<br> 50 nominalu kiekis: ".$banknotai[1]."<br> 20 nominalu kiekis: " .$banknotai[2]."<br> 10 nominalu kiekis: ".$banknotai[3]."<br> 5 nominalu kiekis: ".$banknotai[4]."<br> 2 nominalu kiekis: ".$monetos[0]."<br> 1 nominalu kiekis: ". $monetos[1];
    
    // isduotiBanknotai=[0,0,0,0,0]; 
    // isduotiMonetos=[0,0];
    }
?>