<?php
require_once("connection.php");
require_once("includes.php");
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
    <style>
        .header-fullname {
            display: flex;
            justify-content: center;
        }

        .bottom-action {
            margin: 10px;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <?php
    $message_status = "danger";
    $sql = "SELECT `ID`, `username`, `password`, 
           `name`, `surname`, `birthdate`, `email`, `perks_id` FROM `user` WHERE username = '$loginArray[1]'";
    $result = $conn->query($sql);
    while ($user = mysqli_fetch_array($result)) {
        $name = $user["name"];
        $surname = $user["surname"];
        $username = $user["username"];
        $birthdate = $user["birthdate"];
        $email = $user["email"];
        $password = $user["password"];
    }
    if (isset($_POST["change-password"])) {
        if (
            isset($_POST["old-password"]) && isset($_POST["new-password"]) && isset($_POST["repeat-password"]) &&
            !empty($_POST["old-password"]) && !empty($_POST["new-password"]) && !empty($_POST["repeat-password"])
        ) {
            $oldPassword = $_POST["old-password"];
            $newPassword = $_POST["new-password"];
            $repeatPassword = $_POST["repeat-password"];
            if ($oldPassword == $password) {
                if ($newPassword == $repeatPassword) {
                    $sql = " UPDATE `user` SET `password`='$newPassword' WHERE username = '$loginArray[1]' ";
                    $result = $conn->query($sql);
                    if (mysqli_query($conn, $sql)) {
                        $message_status = "success";
                        $message = "Slaptozdois redaguotas sekmingai";
                    } else {
                        $message = "Kazkas ivyko negerai";
                    }
                } else {
                    $message = "nesutampa slaptazodziai";
                }
            } else {
                $message = "blogai ivestas dabartinis slaptazodis";
            }
        }
    }

    if (isset($_POST["change-about-self"])) {
        if (
            isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["date"]) &&
            !empty($_POST["name"]) && !empty($_POST["surname"]) && !empty($_POST["date"])
        ) {
            $newName = $_POST["name"];
            $newSurname = $_POST["surname"];
            $newDate = $_POST["date"];
            $sql = "UPDATE `user` SET `name`='$newName',`surname`='$newSurname',`birthdate`='$newDate' WHERE username = '$loginArray[1]'";
            $result = $conn->query($sql);

            if (mysqli_query($conn, $sql)) {
                $message_status = "success";
                $message = "Informacija atnaujinta sekmingai";
            } else {
                $message = "Kazkas ivyko negerai";
            }
        } else {
            $sql = "UPDATE `user` SET `name`='$name',`surname`='$surname',`birthdate`='$birthdate' WHERE username = '$loginArray[1]'";
            $result = $conn->query($sql);
            if (mysqli_query($conn, $sql)) {
                $message_status = "success";
                $message = "Informacija liko ta pati";
            } else {
                $message = "Kazkas ivyko negerai";
            }
        }
    }

    if (isset($_POST["change-email"])) {

        if (isset($_POST["email"]) && !empty($_POST["email"])) {
            $newEmail = $_POST["email"];
            $sql = "UPDATE `user` SET `email`='$newEmail' WHERE username = '$loginArray[1]'";
            $result = $conn->query($sql);

            if (mysqli_query($conn, $sql)) {
                $message_status = "success";
                $message = "Informacija atnaujinta sekmingai";
            } else {
                $message = "Kazkas ivyko negerai";
            }
        } else {
            $sql = "UPDATE `user` SET `email`='$email' WHERE username = '$loginArray[1]'";
            $result = $conn->query($sql);
            if (mysqli_query($conn, $sql)) {
                $message_status = "success";
                $message = "Informacija liko ta pati";
            } else {
                $message = "Kazkas ivyko negerai";
            }
        }
    }
    if (isset($_POST['upload'])) {
        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];

        $folder = $filename;

        // $sql = "UPDATE INTO image (filename) VALUES ('$filename') WHERE ID=26";
        $sql = "UPDATE `image` SET `Filename`='$filename' WHERE ID=26";
        mysqli_query($conn, $sql);
        if (move_uploaded_file($tempname, $folder)) {
            $message = "Image uploaded successfully";
            $message_status = "success";
            header("location: myAccount.php");
        } else {
            $message = "Failed to upload image";
        }
    }

    ?>
    <div class="container">
        <?php require_once("includes_menu.php"); ?>
        <?php
        if (isset($message)) { ?>
            <div class="alert alert-<?php echo $message_status; ?>" role="alert">
                <?php echo $message; ?>
            </div>
        <?php } ?>
        <h1 class="header-fullname"> Sveiki, <?php echo  $name . " " . $surname; ?>!</h1>
        <form action="myAccount.php" method="post">
            <button class="btn btn-primary bottom-action" name="profile">Profilis</button>
            <button class="btn btn-primary bottom-action" name="change-info">Duomenys</button>
            <button class="btn btn-primary bottom-action" name="change-password-block">Slaptažodžio keitimas </button>
        </form>
        <?php
        if (isset($_POST["profile"])) {
            $profile = 1;
        } else if (isset($_POST["change-info"])) {
            $profile = 2;
        } else if (isset($_POST["change-password-block"])) {
            $profile = 3;
        } else {
            $profile = 1;
        }

        ?>

        <?php if ($profile == 1) { ?>
            <form action="myAccount.php" method="post" enctype="multipart/form-data">
                <div>
                    <label for="formFileLg" class="form-label">Pasirinkti faila</label>
                    <input class="form-control form-control-lg" id="formFileLg" type="file" name="uploadfile">
                    <button type="submit" class="btn btn-primary bottom-action" name="upload" value="">Siusti</button>
                </div>
            </form>

            
        <?php
        }
        ?>

        <?php if ($profile == 2) { ?>
            <h2>Informacijos keitimas
                </h1>
                <form action="myAccount.php" method="post">
                    <div class="mb-3">
                        <label class="form-label">Vardas</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pavarde</label>
                        <input type="text" class="form-control" name="surname" value="<?php echo $surname; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Data</label>
                        <input type="date" class="form-control" name="date" value="<?php echo $birthdate; ?>">
                    </div>
                    <div class="bottom-action">
                        <button type="submit" class="btn btn-primary bottom-action" name="change-about-self">Patvirtinti</button>
                    </div>
                </form>


                <h2>Elektroninio pasto keitimas </h2>

                <form action="myAccount.php" method="post">
                    <div class="mb-3">
                        <label class="form-label">El.pastas</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
                    </div>
                    <div class="bottom-action">
                        <button type="submit" class="btn btn-primary bottom-action" name="change-email">Patvirtinti</button>
                    </div>
                </form>
            <?php } ?>
            <?php if ($profile == 3) { ?>
                <h2>Slaptažodžio keitimas</h1>
                    <form action="myAccount.php" method="post">
                        <div class="mb-3">
                            <label class="form-label">Dabartinis slaptažodis</label>
                            <input type="password" class="form-control" name="old-password">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pakeisti slaptažodį </label>
                            <input type="password" class="form-control" name="new-password">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pakartoti slaptažodį </label>
                            <input type="password" class="form-control" name="repeat-password">
                        </div>
                        <div class="bottom-action">
                            <button type="submit" class="btn btn-primary bottom-action" name="change-password">Patvirtinti</button>
                        </div>
                    </form>
                <?php } ?>


    </div>

</body>

</html>