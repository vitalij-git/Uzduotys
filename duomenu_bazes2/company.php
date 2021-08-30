<?php
require_once("connection.php");
require_once("includes.php");
if (!isset($_COOKIE["login"])) {
    header("Location: index.php");
} else {
    $loginArray = explode("|",$_COOKIE["login"]);
    mysqli_set_charset($conn,"utf8");
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
<body>
<?php if($loginArray[2]==1 || $loginArray[2]==2 || $loginArray[2]==4){?>
    <div class="container">
        <?php require_once("includes_menu.php"); ?>
        <form action="newCompany.php" method="get">
            <button type="submit" class="btn btn-primary" >Prideti imone</button>
        </form>
        <?php } ?>
        <?php if (isset($message)) { ?>
            <div class="alert alert-<?php echo $message_status; ?>" role="alert">
                <?php echo $message; ?>
            </div>
        <?php } ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Pavadinimas</th>
                    <th scope="col">Tipas</th>
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
                $sql = "SELECT company.ID, company.name, company_type.value FROM company
                LEFT JOIN company_type ON company_type.ID = company.type_id  
                Where 1 
                ORDER BY `ID` $sorting";
                $result = $conn->query($sql);
                while ($company = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $company["ID"] . "</td>";
                    echo "<td>" . $company["name"] . "</td>";
                    echo "<td>" . $company["value"] . "</td>";
                    if ($loginArray[2] == 1 || $loginArray[2] == 2 || $loginArray[2] == 4) {
                        echo "<td>";
                        echo "<a href='company.php?ID=" . $company["ID"] . "'>Trinti</a><br>";
                        echo "<a href='companyEdit.php?ID=" . $company["ID"] . "'>Redaguoti</a>";
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