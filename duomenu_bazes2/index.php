<?php 
    require_once("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main_style.css">
    <?php require_once("includes.php"); ?>
    <title>Document</title>
</head>
<body>
    
<?php
       if(isset($_COOKIE["login"])){
        header("Location: clients.php");
    }
    if(isset($_GET["submit"])){
        if(isset($_GET["username"])&&!empty($_GET["username"])&&isset($_GET["password"])&&!empty($_GET["password"])){
            $username=$_GET["username"];
            $password=$_GET["password"];
            $sql= "SELECT * FROM `user` WHERE `username`='$username' AND `password`='$password'";
            $result= $conn->query($sql);
            if($result->num_rows ==1){
                $user_info =mysqli_fetch_array($result);
                $cookie_array=array(
                    $user_info["ID"],
                    $user_info["username"],
                    $user_info["perks_id"]
                );
                $cookie_array=implode("|",$cookie_array);
                setcookie("login", $cookie_array, time()+3600,"/");
                header("location:clients.php");
            }
            else{
                $message= "prisijungimo duomenys neteisingi";
            }
        }
        else{
            $message="Laukeliai yra tusti";
        }
    }


    ?>
<div class="container">
    <h1>Login</h1>
    <form action="index.php" method="get">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Username</label>
        <input type="text" class="form-control"  aria-describedby="emailHelp" name="username">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
      </div>
      <div class="bottom-action">
          <button type="submit" class="btn btn-primary bottom-action" name="submit">Sing in</button>
          <a href="register.php" class="btn btn-primary bottom-action">Sign up</a>
      </div>
    </form>
    
        <?php
        if(isset($message)){
            echo '<div class="alert alert-danger" role="alert">';
            echo $message;
        }
        echo '</div>';
?>
    
</div>

</body>
   
</html>