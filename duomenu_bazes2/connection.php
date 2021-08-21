<?php

$data_base_server="localhost";
$data_base_nickname="root";
$data_base_password="";
$data_base_name="clientsdatabase";

$conn =mysqli_connect($data_base_server,$data_base_nickname,$data_base_password,$data_base_name);

if($conn==false){
    die("Nepavyko prisijungti prie duomenu bazes". mysqli_connect_error());
}
else{
     
}

?>