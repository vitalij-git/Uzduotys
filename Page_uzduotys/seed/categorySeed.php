<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategoriju generavimas</title>
</head>
<body>
    <form action="" method="get">
        <button type="submit" name="submit">Sukurti kategorijas</button>
    </form>
    <?php 

    require_once("../connection.php");

    if(isset($_GET["submit"])) {
        for ($i=0; $i<10; $i++) {

            $name = "name".$i;
            $link = "linkas".$i;
            $description = "description".$i;
            $parent_id = 0;

            $sql= "INSERT INTO `category`(`name`, `link`, `description`, `parent_id`) 
            VALUES ('$name','$link','$description','$parent_id')";
            if(mysqli_query($conn, $sql)) {
                echo "category was created";
                echo "<br>";
            } else {
                echo "error";
                echo "<br>";
            }
        }
    }

?>
</body>
</html>