<?php 


if(isset($_COOKIE['prisijungti']) && isset($_COOKIE['teises']))
{
    //$_COOKIE['teises']) == 3
    echo "Sveikas atvykes ".($_COOKIE['prisijungti']); 
    echo '<form action="account.php" method="post">';
    echo '<button type="submit" name="atsijungti">Atsijungti</button>';
    echo '</form>';
    if(isset($_POST["atsijungti"])){
        setcookie("prisijungti", "",time() - 3600, "/");
        setcookie("teises", "",time() - 3600, "/");
        header("location:index.php");
    }
} else {
   
    header("location:index.php");
}

?>
