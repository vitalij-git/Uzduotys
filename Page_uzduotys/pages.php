<?php require_once("connection.php"); ?>

<?php

$url = $_GET["href"]; 

$sql = "SELECT * FROM pages
WHERE link='$url'";

$result = $conn->query($sql);

if($result->num_rows != 0) {
    $page = mysqli_fetch_array($result);
} else {
    header("Location:404.php");
}

?>
<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page["name"]; ?></title>
    <?php require_once("includes.php"); ?>
</head>
<body>
    <div class="container">
        <?php require_once("design/menu.php"); ?>
        <?php require_once("design/jumbotron.php"); ?>

        <?php showJumbotron($page["name"], $page["summary"]); ?>

        <?php echo $page["content"]; ?>
        <?php echo $page["category_id"]; ?>
     </div>
    
</body>
</html>