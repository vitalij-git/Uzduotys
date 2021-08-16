<?php require_once("connection.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="klientuforma.php" method="post">
        <input type="text" name="vardas" value="test"/>
        <input type="text" name="pavarde" value="test"/>
        <input type="number" name="teises_id" value="5"/>
        <button type="submit" name="prideti">Prideti</button>
    </form>
</body>
</html>

<?php
    if(isset($_POST["prideti"])){
        if(isset($_POST["vardas"])&& !empty($_POST["vardas"])&&isset($_POST["pavarde"])&& 
        !empty($_POST["pavarde"])&&isset($_POST["teises_id"])&& !empty($_POST["teises_id"])){
            $name=$_POST["vardas"];
            $surname=$_POST["pavarde"];
            $teises_id=$_POST["teises_id"];

            $sql="INSERT INTO klientai(vardas, pavarde, teises_id) VALUES ('$name','$surname',$teises_id)";
        }

        if(mysqli_query($login, $sql)){
           header("location:klientai.php");
        }
        else{
            echo "kazkas ne ok";
        }
        
    }
    



?>