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
</head>

<body>
    <?php

    if (isset($_POST["submit"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $repeatpassword = $_POST["repeatpassword"];
        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $birthdate = $_POST["birthdate"];
        $email = $_POST["email"];
        $user_id= $_POST["user_id"];

        $sql = "SELECT * FROM `user` WHERE `username`='$username'";
        $result = $conn->query($sql);
        $message_status = "danger";
        if ($result->num_rows == 1) {
            $message = "toks jau uzimtas";
        } else {
            if ($password == $repeatpassword) {
                $sql = "INSERT INTO `user`( `username`, `password`, `name`, `surname`, `birthdate`, `email`, `perks_id`) 
                VALUES ('$username','$password','$name','$surname','$birthdate','$email',$user_id)";

                if (mysqli_query($conn, $sql)) {
                    $message_status = "success";
                    $message = "Vartotojas sukurtas sekmingai";
                } else {
                    $message = "Kazkas ivyko negerai";
                }
            } else {
                $message = "Slaptazodziai nesutampa";
            }
        }
    }

    ?>
    <div class="container">
        <?php require_once("includes_menu.php"); ?>
        <div class="cointainer-block">
            <h1>Sukurti nauja vartotoja</h1>
            <form action="addUser.php" method="post">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" required="true">
                </div>
                <div class="mb-3">
                    <label class="form-label">Surname</label>
                    <input type="text" class="form-control" name="surname" required="true">
                </div>
                <div class="mb-3">
                    <label for="birthday">Birthdate:</label>
                    <input type="date" id="birthday" class="form-control" name="birthdate" required="true">
                </div>
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" required="true">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" required="true">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Repeat password</label>
                    <input type="password" class="form-control" name="repeatpassword" required="true">
                </div>
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email" required="true">
                <div class="mb-3">
                    <label for="perks_id">Teisės</label>
                    <select class="form-control form-select" name="user_id">
                        <?php
                        $sql = "SELECT * FROM user_perks";
                        $result = $conn->query($sql);
                        while ($userRights = mysqli_fetch_array($result)) {
                            echo "<option value='" . $userRights["name"] . "'>";
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
                    <button type="submit" class="btn btn-primary bottom-action" name="submit">Sukurti</button>
                    <a href="user.php" class="btn btn-primary bottom-action">Vartotojų sąrašas</a><br>
                </div>
            </form>
        </div>



    </div>
</body>

</html>