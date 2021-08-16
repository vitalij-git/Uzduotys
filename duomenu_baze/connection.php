<?php

$data_base_server="localhost";
$data_base_nickname="root";
$data_base_password="";
$data_base_name="klientuvaldymosistema";

$login =mysqli_connect($data_base_server,$data_base_nickname,$data_base_password,$data_base_name);

if($login==false){
    die("Nepavyko prisijungti prie duomenu bazes". mysqli_connect_error());
}
else{
    // echo "Prisijungta sekmingai";
}

?>