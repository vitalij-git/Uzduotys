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
    if (isset($_POST["submit"])) {
        if (
            isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["perks_id"]) && isset($_POST["birthdate"]) && isset($_POST["email"])
            && !empty($_POST["name"]) && !empty($_POST["surname"]) && !empty($_POST["perks_id"]) && !empty($_POST["birthdate"]) && !empty($_POST["email"])
        ) {

            $id = $_POST["ID"];
            $username = $_POST["username"];
            $name = $_POST["name"];
            $surname = $_POST["surname"];
            $birthdate = $_POST["birthdate"];
            $email = $_POST["email"];
            $user_perks = $_POST["user-perks"];
            $result = $conn->query($sql);
            $message_status = "danger";
            if ($result->num_rows == 1) {
                $message = "toks jau uzimtas";
            } else {
                $sql = "UPDATE `user` SET `username`='$username',`name`='$name',`surname`='$surname',`birthdate`='$birthdate',`email`='$email',`perks_id`='$user_perks' WHERE ID=$id";
                $result = $conn->query($sql);

                if (mysqli_query($conn, $sql)) {
                    $message_status = "success";
                    $message = "Vartotojas redaguotas sekmingai";
                } else {
                    $message = "Kazkas ivyko negerai";
                }
            }
        }
        else{
            // $id = $user["ID"];
            // $username = $user["username"];
            // $name = $user["name"];
            // $surname = $user["surname"];
            // $birthdate = $user["birthdate"];
            // $email = $user["email"];
            // $user_perks = $user["user-perks"];
            // $sql = "UPDATE `user` SET `username`='$username',`name`='$name',`surname`='$surname',`birthdate`='$birthdate',`email`='$email',`perks_id`='$user_perks' WHERE ID=$id";
            // $result = $conn->query($sql);
            if (mysqli_query($conn, $sql)) {
                $message_status = "success";
                $message = "Vartotojas redaguotas sekmingai";
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
            <form action="userEdit.php" method="post">
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
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" value="<?php echo $user["username"]; ?>">
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
                                echo "<option value='" . $clientRights["name"] . "'>";
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
                    <a href="user.php">Vartotojų sąrašas</a><br>
                </div>
            </form>
        </div>



    </div>
</body>

</html>