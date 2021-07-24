<?php
if( isset($_POST["username"]) && !empty($_POST["username"]) && isset($_POST["password"]) && !empty($_POST["password"])){
    $username =$_POST["username"];
    $password =$_POST["password"]; 
    if($username =="admin" && $password==123456){
        header("location: manopaskyra.php");
    }
    else{
        header("location: 404.php");
    }
}
else{
    echo "Ivyko klaida, bandykite dar karta";
}

?>