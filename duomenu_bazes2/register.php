<?php require_once("connection.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <?php require_once("includes.php"); ?>
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_COOKIE["login"])) {
        header("Location: clients.php");
    }
    if (isset($_POST["submit"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $repeatpassword = $_POST["repeatpassword"];
        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $birthdate = $_POST["birthdate"];
        $email = $_POST["email"];

        $sql = "SELECT * FROM `user` WHERE `username`='$username'";
        $result = $conn->query($sql);
        $message_status = "danger";
        if ($result->num_rows == 1) {
            $message = "toks jau uzimtas";
        } else {
            if ($password == $repeatpassword) {
                $sql = "INSERT INTO `user`( `username`, `password`, `name`, `surname`, `birthdate`, `email`, `perks_id`) 
                VALUES ('$username','$password','$name','$surname','$birthdate','$email',0)";

                if (mysqli_query($conn, $sql)) {
                    $message_status = "success";
                    $message = "Vartotojas sukurtas sekmingai";
                }
                else{
                    $message = "Kazkas ivyko negerai";
                }
            } else {
                $message = "Slaptazodziai nesutampa";
            }
        }
    }

    ?>
    <div class="container">
        <h1>Registration</h1>
        <form action="register.php" method="post">
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
                <input type="password" class="form-control"  name="password" required="true">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Repeat password</label>
                <input type="password" class="form-control"  name="repeatpassword" required="true">
            </div>
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email" required="true">

            <?php
            if (isset($message)) { ?>
                <div class="alert alert-<?php echo $message_status; ?>" role="alert">
                <?php echo $message; ?>
            </div>
            <?php } ?>

            <div class="bottom-action">
                <button type="submit" class="btn btn-primary" name="submit">Sign up</button>
                <a href="index.php" class="badge badge-primary">Sign in</a>
            </div>
        </form>

        <?php

        ?>

    </div>
</body>

</html>