<?php require_once("connection.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once("includes.php"); ?>
    <title>Document</title>
</head>
<body>
    <div class="container">
    <button id="create"> Create New User </button>
        <div id="alert-space"></div>
        
        <div id="userForm" class="d-none">
            
        
            <input  id="name" class="form-control" placeholder="Įveskita vardą"  value="tom"/>
            <input id="surname" class="form-control" placeholder="Įveskita pavardę" value="tom"/>
            <input id="username" class="form-control" placeholder="Įveskita slapyvardi" value="tom" />
            <input  id="password" class="form-control" placeholder="Įveskita slaptazodi" value="tom" />
            <input id="birthdate" class="form-control" type="date"  />
            <input id="email" class="form-control" placeholder="Įveskita emaila" value="tom"/>
            <button id="createUser">Create</button>
        </div>
    

        <form action="user.php" method="POST">
            <button type="submit" name="submit">Show user</button> 
        </form>




        <button id="show"> Show user AJAX</button>
        <div id="output">
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
        echo "<td>". $user["birthdate"]. "</td>";
        echo "<td>". $user["email"]. "</td>";
        echo "</tr>";
    }
    echo "</table>";
    
    ?>
    </div>
    <script src="script.js"></script>
</body>

</html>