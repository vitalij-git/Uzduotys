
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
    <style>
        .hide{
            display: none;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_GET["ID"])) {
        $id = $_GET["ID"];
        $sql = "SELECT * FROM clients WHERE ID = $id";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $client = mysqli_fetch_array($result);
        }
    }
    if (isset($_GET["submit"])) {
        if (
            isset($_GET["name"]) && isset($_GET["surname"]) && isset($_GET["perks_id"])
            && !empty($_GET["name"]) && !empty($_GET["surname"]) && !empty($_GET["perks_id"])
        ) {
            $id = $_GET["ID"];
            $name = $_GET["name"];
            $surname = $_GET["surname"];
            $perks = intval($_GET["perks_id"]);
            $sql = "UPDATE `clients` SET `name`='$name',`surname`='$surname',`perks_id`='$perks' WHERE ID = $id";
            if (mysqli_query($conn, $sql)) {
                $message =  "Klientas atnaujintas";
                $message_status = "success";
            } else {
                $message =  "Kazkas ivyko negerai";
                $message_status = "danger";
            }
        } else {
            $id =$client["ID"];
            $name = $client["name"];
            $surname = $client["surname"];
            $perks = intval($client["perks_id"]);
            $sql = "UPDATE `clients` SET `name`='$name',`surname`='$surname',`perks_id`='$perks' WHERE ID = $id";
            if (mysqli_query($conn, $sql)) {
                $message =  "Klientas atnaujintas";
                $message_status = "success";
            } else {
                $message =  "Kazkas ivyko negerai";
                $message_status = "danger";
            }
           
        }
    }





    ?>
    <div class="container">
        <?php require_once("includes_menu.php"); ?>
        <h1>KLiento redagavimas</h1>
        <form action="clientsEdit.php" method="get">
        <input class="hide" type="text" name="ID" value ="<?php echo $client["ID"]; ?>" />
            <div class="form-group">
                <label for="name">Vardas</label>
                <input class="form-control" type="text" name="name" value="<?php echo $client["name"]; ?>" />
            </div>
            <div class="form-group">
                <label for="surname">Pavardė</label>
                <input class="form-control" type="text" name="surname" value="<?php echo $client["surname"]; ?>" />
            </div>
            <div class="form-group">
                <label for="perks_id">Teisės</label>
                <select class="form-control" name="perks_id">
                    <?php
                    $sql = "SELECT * FROM clients_perks";
                    $result = $conn->query($sql);
                    while ($clientRights = mysqli_fetch_array($result)) {
                        if ($client["perks_id"] == $clientRights["name"]) {
                            echo "<option value='" . $clientRights["name"] . "' selected='true'>";
                        } else {
                            echo "<option value='" . $clientRights["name"] . "'>";
                        }
                        echo $clientRights["value"];
                        echo "</option>";
                    }
                    ?>
                </select>
            </div>
            <a href="clients.php">Klientų sąrašas</a><br>
            <button class="btn btn-primary" type="submit" name="submit">Patvirtinti</button>
        </form>
        <?php if (isset($message)) { ?>
            <div class="alert alert-<?php echo $message_status; ?>" role="alert">
                <?php echo $message; ?>
            </div>
        <?php } ?>
    </div>
</body>

</html>