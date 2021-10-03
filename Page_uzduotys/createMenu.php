<?php require("connection.php"); ?>
<?php require("function.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require("includes.php"); ?>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <?php require("design/menu.php"); ?>
        <?php require("design/jumbotron.php"); ?>
        <?php showJumbotron("Create menu", "Create your own menu"); ?>

        <form action="createMenu" method="get">
            <input type="radio" name="menuType" value="1" checked="true">Pasirinktine nuoroda
            <input type="radio" name="menuType" value="2"> Nuoroda i kategorija
            <input type="radio" name="menuType" value="3"> Nuoroda i puslapi
            <input type="submit" name="submit" value="Create">
        </form>



        <?php
        if (isset($_GET["menuType"])) {
            $menuType = $_GET["menuType"];
            switch ($menuType) {
                case 1: ?>
                    <h2>Pasirinktine nuoroda </h2>
                    <form class="form-control" action="createMenu.php" method="get">
                        <input type="hidden" name="menuType" value="1">
                        <input class="form-control" type="text" name="name">
                        <input class="form-control" type="text" name="link">
                        <!-- <input class="form-control" type="text" name="target" > -->
                        <input type="radio" name="target" value="_blank"> Atsidarys kitame lange</br>
                        <input type="radio" name="target" value="_self"> Atsidarys tame pačiame</br></br>
                        <input class="form-control" type="text" name="alt">
                        <input class="btn btn-primary" type="submit" name="create" value="Create">
                        <?php if (isset($_GET["create"])) {
                            $name = $_GET["name"];
                            $link = $_GET["link"];
                            $target = $_GET["target"];
                            $alt = $_GET["alt"];
                            $sql = "INSERT INTO `menu`( `name`, `link`, `target`, `alt`) 
                             VALUES ('$name','$link','$target','$alt')";

                            if (mysqli_query($conn, $sql)) {
                                echo "Menu point was created";
                                echo "<br>";
                            } else {
                                echo "error";
                                echo "<br>";
                            }
                        }
                        ?>
                    </form>
                <?php break;
                case 2: ?>
                    <h2>Nuoroda i kategorija </h2>
                    <form action="createMenu.php" method="get">
                        <input type="hidden" name="menuType" value="<?php echo $menuType; ?>">
                        <select name="categories">
                            <?php
                            $sql = "SELECT `ID`, `name` FROM `category`";
                            $result = $conn->query($sql);
                            while ($categories = mysqli_fetch_array($result)) {
                                $id = $categories["ID"];
                                $name = $categories["name"];

                                echo "<option value='$id'>$name</option>";
                            }
                            ?>
                        </select><br>
                        <input type="radio" name="target" value="_self" checked="true"> Atsidarys tame pačiame</br>
                        <input type="radio" name="target" value="_blank"> Atsidarys kitame lange</br>

                        <input class="form-control" type="text" name="alt" placeholder="Įveskite nuorodos aprašymą">
                        <input class="btn btn-primary" type="submit" name="create" value="Create">
                        <?php
                        if (isset($_GET["create"])) {
                            $category_id = $_GET["categories"];
                            $sql = "SELECT `name` FROM `category` WHERE `ID` = $category_id";
                            $result = $conn->query($sql);
                            $category = mysqli_fetch_array($result);
                            $name = $category["name"];
                            $target = $_GET["target"];
                            $alt = $_GET["alt"];

                            $link = "index.php?catID=" . $category_id;

                            $sql = "INSERT INTO `menu`(`name`, `link`, `target`, `alt`) 
                            VALUES ('$name','$link','$target','$alt')";

                            if (mysqli_query($conn, $sql)) {
                                echo "Menu point was created";
                                echo "<br>";
                            } else {
                                echo "error";
                                echo "<br>";
                            }
                        }
                        ?>
                    </form>
                <?php break;
                case 3: ?>
                    <h2>Nuoroda i puslapi</h2>
                    <form action="createMenu.php" method="get">
                        <input type="hidden" name="menuType" value="<?php echo $menuType; ?>">
                        <select name="pages">
                            <?php
                            $sql = "SELECT  `name`, `link` FROM `pages`";
                            $result = $conn->query($sql);
                            while ($pages = mysqli_fetch_array($result)) {
                                $link = $pages["link"];
                                $name = $pages["name"];

                                echo "<option value='$link'>$name</option>";
                            }

                            ?>
                        </select><br>
                        <input type="radio" name="target" value="_self" checked="true"> Atsidarys tame pačiame</br>
                        <input type="radio" name="target" value="_blank"> Atsidarys kitame lange</br>

                        <input class="form-control" type="text" name="alt" placeholder="Įveskite nuorodos aprašymą">
                        <input class="btn btn-primary" type="submit" name="create" value="Create">
                    </form>
                    <?php if (isset($_GET["create"])) {
                        $pages_href = $_GET["pages"];
                        $sql = "SELECT `name` FROM `pages` WHERE `link` = '$pages_href'";
                        $result = $conn->query($sql);

                        $page = mysqli_fetch_array($result);
                        $name = $page["name"];

                        $target = $_GET["target"];
                        $alt = $_GET["alt"];

                        $link = "pages.php?href=" . $pages_href;

                        $sql = "INSERT INTO `menu`(`name`, `link`, `target`, `alt`) 
                        VALUES ('$name','$link','$target','$alt')";
                        if (mysqli_query($conn, $sql)) {
                            echo "Menu point was created";
                            echo "<br>";
                        } else {
                            echo "error";
                            echo "<br>";
                        }
                    }
                    ?>
                <?php break;
            }
        }

        ?>
    </div>
</body>

</html>