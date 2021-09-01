<?php
require_once("connection.php");

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
    <?php require_once("includes.php"); ?>
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
if (isset($_GET["page-limit"])) {
    $page_limit = $_GET["page-limit"] * 15 - 15;
} else {
    $page_limit = 0;
}

?>

<body>
    
    <div class="container">

        <?php require_once("includes_menu.php"); ?>
        <?php if ($loginArray[2] == 1 || $loginArray[2] == 2 || $loginArray[2] == 4) { ?>
            <form action="newClient.php" method="get">
                <button type="submit" class="btn btn-primary">Prideti klienta</button>
            </form>
        <?php } ?>
        <div class="sorting-filter">
            <div class="col-lg-6 col-md-3 sorting">
                <h3>Rikiavimas</h3>
                <form action="clients.php" method="get">
                    <div class="form-group ">
                        <select class="form-control" name="sorting-id">
                            <option value="DESC"> Nuo didžiausio iki mažiausio</option>
                            <option value="ASC"> Nuo mažiausio iki didžiausio</option>
                        </select>
                        <button class="btn btn-primary" name="sorting-submit" type="submit-sorting">Rikiuoti</button>
                    </div>
                </form>
            </div>
            <div class="sorting"> 
                <h3>Filtravimas</h3>
                <form action="clients.php" method="get">
                    <select class="form-control" name="filter-id">
                        <?php if (isset($_GET["filter-id"]) && !empty($_GET["filter-id"]) && $_GET["filter-id"] != "default") { ?>
                            <option value="default">Rodyti visus</option>
                        <?php } else { ?>
                            <option value="default" selected="true">Rodyti visus</option>
                        <?php } ?>
                        <?php
                        $sql = "SELECT * FROM clients_perks";
                        $result = $conn->query($sql);
                        while ($clientRights = mysqli_fetch_array($result)) {
                            if (isset($_GET["filter-id"]) && $_GET["filter-id"] == $clientRights["name"]) {
                                echo "<option value='" . $clientRights["name"] . "' selected='true'>";
                            } else {
                                echo "<option value='" . $clientRights["name"] . "'>";
                            }
                            echo $clientRights["value"];
                            echo "</option>";
                        }
                        ?>
                    </select>
                    <button class="btn btn-primary" name="filtruoti" type="submit">Filtruoti</button>
                </form>
            </div>
        </div>
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
                 if(isset($_GET["filter-id"]) && !empty($_GET["filter-id"]) && $_GET["filter-id"] != "default") {
                    $filter = "clients.perks_id =" .$_GET["filter-id"];
                } else {
                    $filter = 1;
                }

                if (isset($_GET["sorting-id"]) && !empty($_GET["sorting-id"])) {
                    $sorting = $_GET["sorting-id"];
                  
                } else {
                    $sorting = "DESC";
                }

                $sql = "SELECT clients.ID, clients.name, clients.surname, clients.date_joined, clients_perks.value FROM clients
                LEFT JOIN clients_perks ON clients_perks.name = clients.perks_id  
                Where $filter
                ORDER BY `ID` $sorting
                LIMIT $page_limit , 15";
                $result = $conn->query($sql);
                while ($clients = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $clients["ID"] . "</td>";
                    echo "<td>" . $clients["name"] . "</td>";
                    echo "<td>" . $clients["surname"] . "</td>";
                    echo "<td>" . $clients["date_joined"] . "</td>";
                    echo "<td>" . $clients["value"] . "</td>";
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
        <div class="pages">
            <?php
            $sql = "SELECT CEILING(COUNT(ID)/15), COUNT(ID) FROM clients";
            $result = $conn->query($sql);
            if ($result->num_rows == 1) {
                $clients_total_pages = mysqli_fetch_array($result);

                for ($i = 1; $i <= intval($clients_total_pages[0]); $i++) {
                    echo "<a href='clients.php?page-limit=$i'>";
                    echo $i;
                    echo " ";
                    echo "</a>";
                }
            } else {
                echo "Nepavyko suskaiciuoti klientu";
            }
            ?>
        </div>
    </div>


</body>

</html>