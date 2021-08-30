<?php require_once("connection.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main_style.css">
    <?php require_once("includes.php"); ?>
    <title>Document</title>
    <style>
        .hide {
            display: none;
        }
    </style>
</head>

<body>
    <?php

    if (isset($_GET["ID"])) {
        $id = $_GET["ID"];
        $sql = "SELECT * FROM user WHERE ID = $id";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $user = mysqli_fetch_array($result);
        }
    }
    if (isset($_GET["submit"])) {
        if (
            isset($_GET["name"])  && isset($_GET["user-perks"]) && isset($_GET["surname"]) && isset($_GET["email"]) && isset($_GET["birthdate"])
            && !empty($_GET["name"])  && !empty($_GET["user-perks"]) && !empty($_GET["surname"]) && !empty($_GET["email"]) && !empty($_GET["birthdate"])
        ) {

            $id = $_GET["ID"];
            $name = $_GET["name"];
            $surname = $_GET["surname"];
            $birthdate = $_GET["birthdate"];
            $email = $_GET["email"];
            $user_perks = $_GET["user-perks"];
            $result = $conn->query($sql);
            $message_status = "danger";
            $sql = "UPDATE `user` SET `name`='$name',`surname`='$surname',`birthdate`='$birthdate',`email`='$email',`perks_id`='$user_perks' WHERE ID=$id";
            $result = $conn->query($sql);

            if (mysqli_query($conn, $sql)) {
                $message_status = "success";
                $message = "Vartotojas redaguotas sekmingai";
            } else {
                $message = "Kazkas ivyko negerai";
            }
        } else {
            $id = $user["ID"];
            $name = $user["name"];
            $surname = $user["surname"];
            $birthdate = $user["birthdate"];
            $email = $user["email"];
            $user_perks = $user["perks_id"];
            $sql = "UPDATE `user` SET `name`='$name',`surname`='$surname',`birthdate`='$birthdate',`email`='$email',`perks_id`='$user_perks' WHERE ID=$id";
            $result = $conn->query($sql);
            if (mysqli_query($conn, $sql)) {
                $message_status = "success";
                $message = "Vartotojas redaguotas sekmingai1";
            } else {
                $message = "Kazkas ivyko negerai";
            }
        }
    }



    ?>
    <div class="container">
        <?php require_once("includes_menu.php"); ?>
        <div class="cointainer-block">
            <h1>Redaguoti vartotoja</h1>
            <form action="userEdit.php" method="GET">
                <input class="hide" type="text" name="ID" value="<?php echo $user["ID"]; ?>" />
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $user["name"]; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Surname</label>
                    <input type="text" class="form-control" name="surname" value="<?php echo $user["surname"]; ?>">
                </div>
                <div class="mb-3">
                    <label for="birthday">Birthdate:</label>
                    <input type="date" id="birthday" class="form-control" name="birthdate" value="<?php echo $user["birthdate"]; ?>">
                </div>
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" value="<?php echo $user["email"]; ?>">
                <div class="form-group">
                    <label for="user-perks">Teisės</label>
                    <select class="form-control" name="user-perks">
                        <?php
                        $sql = "SELECT * FROM user_perks";
                        $result = $conn->query($sql);
                        while ($userRights = mysqli_fetch_array($result)) {
                            if ($user["perks_id"] == $userRights["name"]) {
                                echo "<option value='" . $userRights["name"] . "' selected='true'>";
                            } else {
                                echo "<option value='" . $userRights["name"] . "'>";
                            }
                            echo $userRights["value"];
                            echo "</option>";
                        }
                        ?>
                    </select>
                </div>
                <?php
                if (isset($message)) { ?>
                    <div class="alert alert-<?php echo $message_status; ?>" role="alert">
                        <?php echo $message; ?>
                    </div>
                <?php } ?>
                <div class="bottom-action">
                    <button type="submit" class="btn btn-primary bottom-action" name="submit">Patvirtinti</button>
                    <a href="user.php" class="btn btn-primary bottom-action">Vartotojų sąrašas</a><br>
                </div>
            </form>
        </div>



    </div>
</body>

</html>