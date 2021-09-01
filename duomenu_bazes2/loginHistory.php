<?php
require_once("connection.php");
require_once("includes.php");
if (!isset($_COOKIE["login"])) {
    header("Location: index.php");
} else {
    mysqli_set_charset($conn,"utf8");
    $loginArray = explode("|",$_COOKIE["login"]);
}   
?>
<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

    ?>
    

    <div class="container">
        <?php require_once("includes_menu.php"); ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Slapyvardis</th>
                    <th scope="col">Teises</th>
                    <th scope="col">Prisijungimo data</th>
                </tr>
            </thead>
            <tbody>
                <?php

              
                $sql = "SELECT login_history.ID, login_history.username, user_perks.value, login_history.date  FROM login_history
                LEFT JOIN user_perks ON user_perks.name =  login_history.user_perks_id  
                Where 1";
                $result = $conn->query($sql);
                while ($user = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $user["ID"] . "</td>";
                    echo "<td>" . $user["username"] . "</td>";
                    echo "<td>" . $user["value"] . "</td>";
                    echo "<td>" . $user["date"] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    
</body>
</html>