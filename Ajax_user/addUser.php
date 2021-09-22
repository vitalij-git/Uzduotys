<?php require_once("connection.php"); ?>

<?php 

$name = $_GET["name"];
$surname = $_GET["surname"];
$username = $_GET["username"];
$birthdate = $_GET["birthdate"];
$email = $_GET["email"];
$password =$_GET["password"];

$sql = "INSERT INTO `user`(`username`, `password`, `name`, `surname`, `birthdate`, `email`, `perks_id`) 
VALUES ('$username','$password','$name','$surname','$birthdate','$email',5)";
if(mysqli_query($conn, $sql)) {

    echo '<div class="alert alert-success" role="alert">';
        echo "Vartotojas".$name." ".$surname." pridėtas sėkmingai";        
    echo '</div>';
} else {
    echo '<div class="alert alert-danger" role="alert">';
        echo "Kazkas ivyko negerai. Uzklausa nesekminga";
    echo '</div>';    
}

?>