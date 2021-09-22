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

?>

<body>

    <div class="container">

        <?php require_once("includes_menu.php"); ?>
        <?php if ($loginArray[2] == 1 || $loginArray[2] == 2 || $loginArray[2] == 4) { ?>
            <form action="newClient.php" method="get">
                <button type="submit" class="btn btn-primary">Prideti klienta</button>
            </form>
        <?php } ?>


        <div class="col-lg-6 col-md-3 sorting">
            <h3>Rikiavimas ir filtravimas</h3>
            <form action="clients.php" method="get">
                <select class="form-control" name="sorting-by">
                    <?php
                    $sql = "SELECT * FROM `clients_sorting`";
                    $result = $conn->query($sql);
                    $sorting_column = array();
                    $skaitiklis = 1;
                    while ($sortColumns = mysqli_fetch_array($result)) {
                        if ($skaitiklis == 1) {
                            $numatytoji_reiksme = $sortColumns["ID"];
                        }
                        if (isset($_GET["sorting-by"]) && $_GET["sorting-by"] == $sortColumns["ID"]) {
                            echo "<option value='" . $sortColumns["ID"] . "' selected='true'>" . $sortColumns["sorting_name"] . "</option>";
                        } else {
                            echo "<option value='" . $sortColumns["ID"] . "'>" . $sortColumns["sorting_name"] . "</option>";
                        }
                        $sorting_column[$sortColumns["ID"]] =  $sortColumns["sorting_column"];
                        $skaitiklis++;
                    }
                    ?>
                </select>
                <select class="form-control" name="sorting_id">
                    <?php if ((isset($_GET["sorting_id"]) && $_GET["sorting_id"] == "DESC") || !isset($_GET["sorting_id"])) {  ?>
                        <option value="DESC" selected="true"> Nuo didžiausio iki mažiausio</option>
                        <option value="ASC"> Nuo mažiausio iki didžiausio</option>
                    <?php } else { ?>
                        <option value="DESC"> Nuo didžiausio iki mažiausio</option>
                        <option value="ASC" selected="true"> Nuo mažiausio iki didžiausio</option>
                    <?php } ?>
                </select>
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
        </div>
        <div class="top-action">
            <div>
                <button class="btn btn-primary" name="vykdyti" type="submit">Vykdyti</button>
                </form>

            </div>
            <div>
                <?php if (isset($_GET["filter-id"]) && !empty($_GET["filter-id"]) && $_GET["filter-id"] != "default") { ?>
                    <a class="btn btn-primary" href="clients.php">Išvalyti filtrą</a>
                <?php } ?>
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
                    <th scope="col">Aprašymas</th>
                    <?php if ($loginArray[2] == 1 || $loginArray[2] == 2 || $loginArray[2] == 4) { ?>
                        <th scope="col">Veiksmai</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $clients_count = 30;
                $pagination_url = "";
                if (isset($_GET["page-limit"])) {
                    $page_limit = $_GET["page-limit"] * $clients_count - $clients_count;
                } else {
                    $page_limit = 0;
                }
                if (isset($_GET["filter-id"]) && !empty($_GET["filter-id"])) {
                    $filter = "clients.perks_id =" . $_GET["filter-id"];
                } else {
                    $filter = 1;
                }

                if (isset($_GET["sorting-id"]) && !empty($_GET["sorting-id"])) {
                    $sorting = $_GET["sorting-id"];
                } else {
                    $sorting = "DESC";
                }

                $sql = "SELECT clients.ID, clients.name, clients.surname, 
                clients.date_joined, clients_perks.value,clients.description FROM clients
                LEFT JOIN clients_perks ON clients_perks.name = clients.perks_id  
                Where $filter
                ORDER BY `ID` $sorting
                LIMIT $page_limit , $clients_count ";
                $result = $conn->query($sql);

                // var_dump($result);
                // if ($result->num_rows == 1) {
                // $sql_pages="UPDATE `pages` SET `total_clients`=[value-2] WHERE 1";

                // }
                while ($clients = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $clients["ID"] . "</td>";
                    echo "<td>" . $clients["name"] . "</td>";
                    echo "<td>" . $clients["surname"] . "</td>";
                    echo "<td>" . $clients["date_joined"] . "</td>";
                    echo "<td>" . $clients["value"] . "</td>";
                    echo "<td>" . $clients["description"] . "</td>";
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
            $sql = "SELECT CEILING(COUNT(ID)/30), COUNT(ID) FROM clients ";
            $result = $conn->query($sql);

            if ($result->num_rows == 1) {
                $clients_total_pages = mysqli_fetch_array($result);

                for ($i = 1; $i <= intval($clients_total_pages[0]); $i++) {
                    if(!isset($_GET["page-limit"]) && $i==1) {
                        echo "<a class='btn btn-primary active' href='clients.php?page-limit=$i$pagination_url'>";
                    } else if((isset($_GET["page-limit"]) && $_GET["page-limit"] == $i) )
                    {
                        echo "<a class='btn btn-primary active' href='clients.php?page-limit=$i$pagination_url'>";
                    } else {
                        echo "<a class='btn btn-primary' href='clients.php?page-limit=$i$pagination_url'>";
                    }
                    echo $i;
                    echo " ";
                    echo "</a>";
                }
                // echo "<p>";
                // echo "Is viso puslapiu: ";
                // echo $clients_total_pages[0];
                // echo "</p>";

                // echo "<p>";
                // echo "Is viso klientu: ";
                // echo $clients_total_pages[1];
                // echo "</p>";
            } else {
                echo "Nepavyko suskaiciuoti klientu";
            }
            ?>
        </div>
    </div>


</body>

</html>