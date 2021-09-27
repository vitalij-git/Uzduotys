<?php require("connection.php"); ?>
<?php require("function.php"); ?>
<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <?php require("includes.php"); ?>
</head>
<body>
<div class="container">
        <?php require("design/menu.php"); ?>
        <?php require("design/jumbotron.php"); ?>
        <?php showJumbotron("Admin", "Admin page"); ?>
        

        <h2>Sidebar atvaizdavimas </h2>
        <form action="admin.php">
            <?php
                $sql = "SELECT value FROM settings WHERE ID = 1 "; 
                $result = $conn->query($sql);

                $selected_value = mysqli_fetch_array($result);


                $checked = array(0,0,0);
                
                if($selected_value[0] == 0) {
                    $checked[0] = "checked";
                } else if ($selected_value[0] == 1) {
                    $checked[1] = "checked";
                } else if ($selected_value[0] == 2) {
                    $checked[2] = "checked";
                }  


            
            ?>
            <input type="radio" name="sidebar" value="0" <?php echo $checked[0]; ?>/> Sidebar neatvaizduojamas </br>
            <input type="radio" name="sidebar" value="1" <?php echo $checked[1]; ?>/> Sidebar kaireje </br>
            <input type="radio" name="sidebar" value="2" <?php echo $checked[2]; ?>/> Sidebar desineje </br>
            <input class="btn btn-primary" type="submit" name="submit" value="Išsaugoti">
        </form>
        
        <?php
        if(isset($_GET["submit"])) {
            
            $sidebar = $_GET["sidebar"];

            $sql = "UPDATE `settings` SET `value`='$sidebar' WHERE ID = 1";
            $result = $conn->query($sql);

            if($result) {
                echo "Nustatymas pakeistas sėkmingai";
                // Redirect("admin.php");
                // header("Location: admin.php");
                echo "<script type='text/javascript'>window.top.location='admin.php';</script>";
            } else {
                echo "Kažkas įvyko negerai";
            }
        
        }

        ?>

        <h2> Kategoriju atvaizdavimas </h2>
        <form action="admin.php" method="get">
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Pavadinimas</th>
                    <th>Aprasymas</th>
                    <th>Rodyti</th>
                </tr>
            <?php
            $sql = "SELECT * FROM category"; 
            $result = $conn->query($sql);

            while($category = mysqli_fetch_array($result)) {
                $categoryID = $category["ID"];
                echo "<tr>";
                    echo "<td>".$category["ID"]."</td>";
                    echo "<td>".$category["name"]."</td>";
                    echo "<td>".$category["description"]."</td>";

                    if($category["show"] == 0) {
                        echo "<td>
                            <input type='checkbox' value='$categoryID' name='category[]'/> 
                        </td>";
                    } else {
                        echo "<td><input type='checkbox' value='$categoryID' name='category[]' checked='true'/> 
                        </td>";
                        
                    }

                    
                echo "</tr>";

            }
            
            ?>
            </table>
            <input type="submit" name="submit1" value="Išsaugoti"/>
        </form>

        <?php 
        if(isset($_GET["submit1"])) {

            $reiksmes = $_GET["category"];
            var_dump($reiksmes);


            $sql = "UPDATE `category` SET `show`= 0";
            $result = $conn->query($sql);

            foreach ($reiksmes as $reiksme) {
                $sql = "UPDATE `category` SET `show`= 1 WHERE ID=$reiksme";
                $result = $conn->query($sql);
            }

            // header("Location: admin.php");
            echo "<script type='text/javascript'>window.top.location='admin.php';</script>";

        }
        
        ?>
    </div>
</body>
</html>