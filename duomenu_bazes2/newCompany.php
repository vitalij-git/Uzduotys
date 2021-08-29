<?php
require_once("connection.php");
require_once("includes.php");
if (!isset($_COOKIE["login"])) {
    header("Location: index.php");
} else {
    $loginArray = explode("|",$_COOKIE["login"]);
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
<?php
    if (isset($_GET["submit"])) {
        if (
            isset($_GET["name"]) && isset($_GET["type_id"]) && isset($_GET["description"]) &&
            !empty($_GET["name"]) && !empty($_GET["type_id"]) && !empty($_GET["description"])
        ) {
            $name = $_GET["name"];
            $type_id = $_GET["type_id"];
            $description = $_GET["description"];
            $sql = "INSERT INTO `company`( `name`, `type_id`, `value`) 
        VALUES ('$name','$type_id','$description')";
            if (mysqli_query($conn, $sql)) {
                $message =  "Imone pridėta sėkmingai";
                $message_status = "success";
            } else {
                $message =  "Kazkas ivyko negerai";
                $message_status = "danger";
            }
        } else {
            $message =  "Uzpildykite visus laukelius";
            $message_status = "danger";
        }
    }
    ?>
    
<?php if($loginArray[2]==1){?>
    <?php } ?>
    <div class="container">
        <?php require_once("includes_menu.php"); ?>
        <h1>Prideti imone</h1>
        <form action="newCompany.php" method="get">

            <div class="form-group">
                <label for="name">Pavadinimas</label>
                <input class="form-control" type="text" name="name" placeholder="Pavadinimas" />
            </div>
            <div class="form-group">
                <label for="perks_id">Tipas</label>
                <select class="form-control" name="type_id">
                    <?php
                    $sql = "SELECT * FROM company_type";
                    $result = $conn->query($sql);
                    while ($company_type = mysqli_fetch_array($result)) {
                        echo "<option value='" . $company_type["name"] . "'>";
                        echo $company_type["value"];
                        echo "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="surname">Aprasymas</label>
                <input class="form-control" type="text" name="surname" placeholder="Aprasymas" />
            </div>
            <a href="company.php">Imonės sąrašas</a><br>
            <button class="btn btn-primary" type="submit" name="submit">Prideti</button>
        </form>
        <?php if (isset($message)) { ?>
            <div class="alert alert-<?php echo $message_status; ?>" role="alert">
                <?php echo $message; ?>
            </div>
        <?php } ?>
      
    </div>
    
</body>
</html>