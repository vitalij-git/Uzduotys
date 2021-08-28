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
    <?php require_once("includes.php"); ?>
    <title>Document</title>
</head>

<body>
<?php if (isset($_GET["ID"])) {
    $id = $_GET["ID"];
    $sql = "DELETE FROM `user` WHERE ID = $id";
    if (mysqli_query($conn, $sql)) {
        $message = "Vartotojas sekmingai istrintas";
        $message_status = "success";
    } else {
        $message = "Kazkas ivyko negerai";
        $message_status = "danger";
    }
}

?>
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
                    <th scope="col">Slapyvardis</th>
                    <th scope="col">Vardas</th>
                    <th scope="col">Pavarde</th>
                    <th scope="col">Gimimo data</th>
                    <th scope="col">El. paštas</th>
                    <th scope="col">Teises</th>
                    <th scope="col">Veiksmai</th>
                </tr>
            </thead>
            <tbody>
                <?php

                if (isset($_GET["sorting_id"]) && !empty($_GET["sorting_id"])) {
                    $sorting = $_GET["sorting_id"];
                } else {
                    $sorting = "DESC";
                }
                $sql = "SELECT * FROM `user` ORDER BY `ID` $sorting";
                $result = $conn->query($sql);
                while ($user = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $user["ID"] . "</td>";
                    echo "<td>" . $user["username"] . "</td>";
                    echo "<td>" . $user["name"] . "</td>";
                    echo "<td>" . $user["surname"] . "</td>";
                    echo "<td>" . $user["birthdate"] . "</td>";
                    echo "<td>" . $user["email"] . "</td>";
                    echo "<td>" . $user["perks_id"]. "</td>";
                    echo "<td>";
                    echo "<a href='user.php?ID=" . $user["ID"] . "'>Trinti</a><br>";
                    echo "<a href='userEdit.php?ID=" . $user["ID"] . "'>Redaguoti</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

    </div>
</body>

</html>