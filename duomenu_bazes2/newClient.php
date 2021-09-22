<?php
require_once("connection.php");
require_once("includes.php");
if (!isset($_COOKIE["login"])) {
    header("Location: index.php");
} else {
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once("includes.php"); ?>
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_GET["submit"])) {
        if (isset($_GET["name"]) && isset($_GET["surname"]) 
        && !empty($_GET["name"]) && !empty($_GET["surname"])  ) {
            $name = $_GET["name"];
            $surname = $_GET["surname"];
            $perks = intval($_GET["perks_id"]);
            $getdate =getdate();
            $year = $getdate["year"];
            $mon = $getdate["mon"];
            $day= $getdate["mday"];
            if($mon<10){
                $mon="0".$mon;
            }
            if($day<10){
                $day="0".$day;
            }
           
            $date = $year.'-'.$mon.'-'.$day; 
            $description = $_GET["description"];
            $sql = "INSERT INTO `clients`( `name`, `surname`, `date_joined`, `perks_id`, `description`) 
     VALUES ('$name','$surname','$date','$perks','$description')";
            if (mysqli_query($conn, $sql)) {
                $message =  "KLientas pridėtas sėkmingai";
                $message_status = "success";
            } else {
                $message =  "Kazkas ivyko negerai";
                $message_status = "danger";
            }
        } else {
            $message =  "Uzpildykite visus laukelius";
            $message_status = "danger";
           
        }
    }

    ?>
    <div class="container">
        <?php require_once("includes_menu.php"); ?>
        <h1>Kliento kūrimas</h1>
        <form action="newClient.php" method="get">

            <div class="form-group">
                <label for="name">Vardas</label>
                <input class="form-control" type="text" name="name" placeholder="Vardas" />
            </div>
            <div class="form-group">
                <label for="surname">Pavardė</label>
                <input class="form-control" type="text" name="surname" placeholder="Pavarde" />
            </div>
            <div class="form-group">
                <label for="perks_id">Teisės</label>
                <select class="form-control" name="perks_id">
                    <?php
                    $sql = "SELECT * FROM clients_perks";
                    $result = $conn->query($sql);
                    while ($clientRights = mysqli_fetch_array($result)) {
                        echo "<option value='" . $clientRights["name"] . "'>";
                        echo $clientRights["value"];
                        echo "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <textarea class="form-control" id ="description" name="description"></textarea>
                </div>
            </div>
            <div class="btn-action">
                <button class="btn btn-primary " type="submit" name="submit">Naujas klientas</button>
                <a href="clients.php" class="btn btn-primary">Klientų sąrašas</a><br>
            </div>
        </form>
        <?php if (isset($message)) { ?>
            <div class="alert alert-<?php echo $message_status; ?>" role="alert">
                <?php echo $message; ?>
            </div>
        <?php } ?>
    </div>
</body>
</html>