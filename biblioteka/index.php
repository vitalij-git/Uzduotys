<style>
    .button-block {
        display: flex;
    }
</style>
<?php
echo "<div class='button-block'>";
echo '<form action="index.php" method="get">
 <button type="submit" name="all-category">visos kategorijos</button>
 </form>';
echo '<form action="index.php" method="get">
 <button type="submit" name="fantasy">Fantastika</button>
 </form>';
echo '<form action="index.php" method="get">
 <button type="submit" name="history">Istorija</button>
 </form>';
echo '<form action="index.php" method="get">
 <button type="submit" name="action">Veiksmas</button>
 </form>';
echo '<form action="index.php" method="get">
 <button type="submit" name="finance">Finansai</button>
 </form>';
echo '<form action="index.php" method="get">
 <button type="submit" name="travel">Keliones</button>
 </form>';
echo "</div>";
$library = array(
    array("name" => "Ta-Nehisi", "surname" => "Coates", "category" => "Fantasy", "title" => "The Water Dancer", "price" => "13.58$"),
    array("name" => "Madeline", "surname" => "Miller", "category" => "Fantasy", "title" => "Circe", "price" => "11.99$"),
    array("name" => "Stephenie", "surname" => "Meyer", "category" => "Fantasy", "title" => "Eclipse", "price" => "3.86$"),
    array("name" => "Diana", "surname" => "Gabaldon", "category" => "Fantasy", "title" => "Outlander", "price" => "3.99$"),
    array("name" => "Al", "surname" => "Ries", "category" => "Finance", "title" => "The  Immutable22", "price" => "3.99$"),
    array("name" => "James", "surname" => "McBride", "category" => "History", "title" => "The Color of Water:A", "price" => "3.59$"),
    array("name" => "Richard", "surname" => "Raymond", "category" => "Action", "title" => "A Game of Thrones", "price" => "4.69$"),
    array("name" => "Rick", "surname" => "Riordan", "category" => "Fantasy", "title" => "Percy Jackson and the Olympians", "price" => "4.69$"),
    array("name" => "Richard", "surname" => "Raymond", "category" => "Action", "title" => "A Clash of Kings", "price" => "4.69$"),
    array("name" => "Jeffrey", "surname" => "Gitomer", "category" => "Finance", "title" => "The Sales Bible", "price" => "3.86$"),
    array("name" => "Wes", "surname" => "Moore", "category" => "History", "title" => "The Other Wes Moore", "price" => "3.59$"),
    array("name" => "David", "surname" => "Chilton", "category" => "Finance", "title" => "The Wealthy Barber", "price" => "3.59$"),
    array("name" => "Michael", "surname" => "Easter", "category" => "Travel", "title" => "The Comfort Crisis", "price" => "24.17$"),
    array("name" => "Rick", "surname" => "Riordan", "category" => "Fantasy", "title" => "Percy Jackson and the Olympians", "price" => "4.69$"),
    array("name" => "Stephenie", "surname" => "Meyer", "category" => "Fantasy", "title" => "New Moon", "price" => "3.59$"),
    array("name" => "Jason", "surname" => "Riley", "category" => "History", "title" => "Maverick:A Biography of Thomas Sowell", "price" => "25.77$"),
    array("name" => "Richard", "surname" => "Raymond", "category" => "Action", "title" => "A Dance with Dragons", "price" => "6.29$"),
    array("name" => "Lois", "surname" => "Lowry", "category" => "Fantasy", "title" => "The Giver", "price" => "3.59$"),
    array("name" => "Steve", "surname" => "Martin", "category" => "Finance", "title" => "Yes!:50 Scientifically", "price" => "3.99$"),
    array("name" => "Scott", "surname" => "Keyes", "category" => "Travel", "title" => "Take More Vavations", "price" => "15.38$"),
    array("name" => "Stephenie", "surname" => "Meyer", "category" => "Fantasy", "title" => "Twilight", "price" => "3.59$"),
    array("name" => "Daniel", "surname" => "Barbarisi", "category" => "Travel", "title" => "Chasing the Thrill", "price" => "22.19$"),
    array("name" => "Rick", "surname" => "Riordan", "category" => "Action", "title" => "The last Olympian", "price" => "3.59$"),
    array("name" => "Michael", "surname" => "Crichton", "category" => "Action", "title" => "Jurassic Park", "price" => "3.59$"),
    array("name" => "Carol", "surname" => "Leonning", "category" => "History", "title" => "Zero Fail: The Rise and Fall", "price" => "25.77$"),
    array("name" => "Rick", "surname" => "Riordan", "category" => "Action", "title" => "The Titan's Curse", "price" => "3.59$"),
    array("name" => "Rick", "surname" => "Riordan", "category" => "Action", "title" => "The Sea of Monsters", "price" => "3.59$"),
    array("name" => "Barack", "surname" => "Obama", "category" => "History", "title" => "The Audacity of Hope", "price" => "3.99$"),
    array("name" => "David", "surname" => "McCullough", "category" => "History", "title" => "John Adams", "price" => "4.19$"),
    array("name" => "Aldo", "surname" => "Leopold", "category" => "Travel", "title" => "A Sand County", "price" => "3.99$"),
    array("name" => "David", "surname" => "Chilton", "category" => "Finance", "title" => "The Wealthy Barber", "price" => "3.59$")
);

$category = "";
if (isset($_GET["all-category"])) {
    drawAllCategoryTable($library);
} else if (isset($_GET["fantasy"])) {
    $category = "Fantasy";
    drawTable($category, $library);
} else if (isset($_GET["history"])) {
    $category = "History";
    drawTable($category, $library);
} else if (isset($_GET["action"])) {
    $category = "Action";
    drawTable($category, $library);
} else if (isset($_GET["finance"])) {
    $category = "Finance";
    drawTable($category, $library);
} else if (isset($_GET["travel"])) {
    $category = "Travel";
    drawTable($category, $library);
} else {
    drawAllCategoryTable($library);
}
function drawTable($category, $library)
{
    $index = 1;
    echo "<table>";
    echo "<tr>";
    echo "<th>";
    echo "Nr.";
    echo "</th>";
    echo "<th>";
    echo "name";
    echo "</th>";
    echo "<th>";
    echo "surname";
    echo "</th>";
    echo "<th>";
    echo "category";
    echo "</th>";
    echo "<th>";
    echo "title";
    echo "</th>";
    echo "<th>";
    echo "price";
    echo "</tr>";
    foreach ($library as $element) {
        if ($element["category"] == $category) {
            echo "<tr>";
            echo "<td>";
            echo $index;
            echo "</td>";
            echo "<td>";
            echo $element["name"];
            echo "</td>";
            echo "<td>";
            echo $element["surname"];
            echo "</td>";
            echo "<td>";
            echo $element["category"];
            echo "</td>";
            echo "<td>";
            echo $element["title"];
            echo "</td>";
            echo "<td>";
            echo $element["price"];
            echo "</td>";
            echo "</tr>";
        }
        $index++;
    }
    echo "</table>";
}
function drawAllCategoryTable($library)
{
    $index = 1;
    echo "<table>";
    echo "<tr>";
    echo "<th>";
    echo "Nr.";
    echo "</th>";
    echo "<th>";
    echo "name";
    echo "</th>";
    echo "<th>";
    echo "surname";
    echo "</th>";
    echo "<th>";
    echo "category";
    echo "</th>";
    echo "<th>";
    echo "title";
    echo "</th>";
    echo "<th>";
    echo "price";
    echo "</tr>";
    foreach ($library as $element) {
        echo "<tr>";
        echo "<td>";
        echo $index;
        echo "</td>";
        echo "<td>";
        echo $element["name"];
        echo "</td>";
        echo "<td>";
        echo $element["surname"];
        echo "</td>";
        echo "<td>";
        echo $element["category"];
        echo "</td>";
        echo "<td>";
        echo $element["title"];
        echo "</td>";
        echo "<td>";
        echo $element["price"];
        echo "</td>";
        echo "</tr>";
        $index++;
    }
    

    echo "</table>";
}

?>