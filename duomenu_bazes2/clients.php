<?php
require_once("connection.php");
require_once("includes.php");
if (!isset($_COOKIE["login"])) {
    header("Location: index.php");
} else {
    $loginArray = explode("|", $_COOKIE["login"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php if (isset($_GET["ID"])) {
    $id = $_GET["ID"];
    $sql = "DELETE FROM `clients` WHERE ID = $id";
    if (mysqli_query($conn, $sql)) {
        $message = "Klientas sekmingai istrintas";
        $message_status = "success";
    } else {
        $message = "Kazkas ivyko negerai";
        $message_status = "danger";
    }
}

?>

<body>

    <div class="container">
        <?php require_once("includes_menu.php"); ?>
        <?php if (isset($message)) { ?>
            <div class="alert alert-<?php echo $message_status; ?>" role="alert">
                <?php echo $message; ?>
            </div>
        <?php } ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Vardas</th>
                    <th scope="col">Pavardė</th>
                    <th scope="col">Prisijungimo data</th>
                    <th scope="col">Teisės</th>
                    <?php if ($loginArray[2] == 1 || $loginArray[2] == 2 || $loginArray[2] == 4) { ?>
                        <th scope="col">Veiksmai</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_GET["sorting_id"]) && !empty($_GET["sorting_id"])) {
                    $sorting = $_GET["sorting_id"];
                } else {
                    $sorting = "DESC";
                }
                $sql = "SELECT * FROM `clients` ORDER BY `ID` $sorting";
                $result = $conn->query($sql);
                while ($clients = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $clients["ID"] . "</td>";
                    echo "<td>" . $clients["name"] . "</td>";
                    echo "<td>" . $clients["surname"] . "</td>";
                    echo "<td>" . $clients["date_joined"] . "</td>";
                    $perks_id = $clients["perks_id"];
                    $sql = "SELECT * FROM `clients_perks` WHERE name = $perks_id";
                    $result_perks = $conn->query($sql);

                    if ($result_perks->num_rows == 1) {
                        $rights = mysqli_fetch_array($result_perks);
                        echo "<td>";
                        echo $rights["value"];
                        echo "</td>";
                    } else {
                        echo "<td>Nepatvirtintas klientas</td>";
                    }
                    if ($loginArray[2] == 1 || $loginArray[2] == 2 || $loginArray[2] == 4) {
                        echo "<td>";
                        echo "<a href='clients.php?ID=" . $clients["ID"] . "'>Trinti</a><br>";
                        echo "<a href='clientsEdit.php?ID=" . $clients["ID"] . "'>Redaguoti</a>";
                        echo "</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>


</body>

</html>