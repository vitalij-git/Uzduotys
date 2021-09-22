<?php require_once("connection.php"); ?>

<?php


    $sql = "SELECT * FROM user
    WHERE 1
    ORDER BY user.ID DESC
    LIMIT 50
    ";

    $result = $conn->query($sql);
    echo "<table class='table table-striped'>";
    while($user = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>". $user["ID"]. "</td>";
        echo "<td>". $user["name"]. "</td>";
        echo "<td>". $user["surname"]. "</td>";
        echo "<td>". $user["username"]. "</td>";
        echo "<td>" . $user["birthdate"] . "</td>";
        echo "<td>" . $user["email"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    
?>