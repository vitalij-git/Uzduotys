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
    <style>
        .btn-status {
            margin-bottom: 10px;
        }
    </style>
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
        <form action="addUser.php" method="get">
            <button type="submit" class="btn btn-primary">Prideti vartotoja</button>
        </form>
        <?php if ($loginArray[2] == 1) {
            $sql = "SELECT `ID`, `value` FROM `registration_status` WHERE 1";
            $result = $conn->query($sql);
            if ($result->num_rows == 1) {
                $user = mysqli_fetch_array($result);
                if ($user["value"] == 1) {?>
                            <form action="user.php" method="post">
                            <button type="submit" class="btn btn-success btn-status" name="register-status">Išjungti registracijos forma</button>
                            </form>
                    <?php
                    if (isset($_POST["register-status"])) {
                        $sql = "UPDATE `registration_status` SET `value`=0 WHERE 1";
                        if (mysqli_query($conn, $sql)) {      
                            header("Location: user.php");
                        } else {
                            $message = "Kazkas ivyko negerai";
                            $message_status = "danger";
                        }
                    }
                } else { ?>
                    <form action="user.php" method="post">
                        <button type="submit" class="btn btn-danger btn-status" name="register-status">Įjungti registracijos forma</button>
                    </form>
        <?php
                    if (isset($_POST["register-status"])) {
                        $sql = "UPDATE `registration_status` SET `value`=1 WHERE 1";
                        if (mysqli_query($conn, $sql)) {
                            header("Location: user.php");

                        } else {
                            $message = "Kazkas ivyko negerai";
                            $message_status = "danger";
                        }
                    }
                }
            }
        } ?>
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
                $sql = "SELECT user.ID, user.username, user.name, user.surname, user.birthdate, user.email, user_perks.value FROM user
                LEFT JOIN user_perks ON user_perks.name = user.perks_id  
                Where 1
                ORDER BY `ID` $sorting";
                $result = $conn->query($sql);
                while ($user = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $user["ID"] . "</td>";
                    echo "<td>" . $user["username"] . "</td>";
                    echo "<td>" . $user["name"] . "</td>";
                    echo "<td>" . $user["surname"] . "</td>";
                    echo "<td>" . $user["birthdate"] . "</td>";
                    echo "<td>" . $user["email"] . "</td>";
                    echo "<td>" . $user["value"] . "</td>";
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