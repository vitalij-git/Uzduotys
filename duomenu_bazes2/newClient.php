<?php
require_once("connection.php");
require_once("includes.php");
if (!isset($_COOKIE["login"])) {
    header("Location: index.php");
} else {
    echo "Sveikas atvykes " . ($_COOKIE['login']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once("includes.php"); ?>30
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_GET["submit"])) {
        if (isset($_GET["name"]) && isset($_GET["surname"]) && isset($_GET["perks_id"]) && isset($_GET["date"]) && !empty($_GET["name"]) && !empty($_GET["surname"]) && !empty($_GET["perks_id"]) && !empty($_GET["date"])) {
            $name = $_GET["name"];
            $surname = $_GET["sruname"];
            $perks = $_GET["perks_id"];
            $date = $_GET["date"];
            $sql = "INSERT INTO `clients`( `name`, `surname`, `date_joined`, `perks_id`) 
     VALUES ('$name','$surname','$date','$perks')";
            if (mysqli_query($conn, $sql)) {
                $message =  "Vartotojas pridėtas sėkmingai";
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
        <h1>Vartotojo kūrimas</h1>
        <form action="clientsNew.php" method="get">

            <div class="form-group">
                <label for="name">Vardas</label>
                <input class="form-control" type="text" name="name" placeholder="Vardas" />
            </div>
            <div class="form-group">
                <label for="surname">Pavardė</label>
                <input class="form-control" type="text" name="surname" placeholder="Pavarde" />
            </div>
            <div class="form-group">
                <label for="date">Data</label>
                <input class="form-control" type="date" name="date" placeholder="data" />
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
            <a href="clients.php">Klientų sąrašas</a><br>
            <button class="btn btn-primary" type="submit" name="submit">Naujas klientas</button>
        </form>
        <?php if (isset($message)) { ?>
            <div class="alert alert-<?php echo $message_status; ?>" role="alert">
                <?php echo $message; ?>
            </div>
        <?php } ?>
    </div>
</body>

</html>