<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puslapiu generavimas</title>
</head>
<body>
    <form action="" method="get">
        <button type="submit" name="submit">Sukurti puslapius</button>
    </form>
    <?php 

    require_once("../connection.php");

    function randomText($n) {
        $text = "";


        for($i = 0; $i < $n ; $i++) {
            $randomNumber = rand();
            $hashedText = md5($randomNumber);
            $text .= $hashedText;
        }
        
        return str_replace("a", " ", $text);

    }

    


    if(isset($_GET["submit"])) {
        for ($i=0; $i<50; $i++) {

            $name = "pavadinimas".$i;
            $link = "nuoroda".$i;
            $content = randomText(100);
            $summary = randomText(1);
            $category_id = rand(1, 4);

            
            $sql = "INSERT INTO `pages`( `name`, `link`, `content`, `summary`, `category_id`) 
            VALUES ('$name','$link','$content','$summary','$category_id')";

            if(mysqli_query($conn, $sql)) {
                echo "page was created";
                echo "<br>";
            } else {
                echo "error";
                echo "<br>";
            }
        }
    }

?>
</body>
</html>