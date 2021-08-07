<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="left-container left-xxl-container">
        <div class="sign-up-block">
            <h1>Sign up</h1>
        </div>
        <div class="text-block">
            <span class="text-decoration">Privay policy</span>
            <span>&</span>
            <span class="text-decoration">terms of service</span>
        </div>
    </div>
    <div class="right-container right-xxl-container">
        <div class="login-form-block">
            <span class="close">x</span>
            <div class="form-block">
                <form action="login.php" method="POST">
                    <div class="input">
                        <label for="username" class="form-text">USERNAME</label>
                        <input type="text" id="fname" name="username" placeholder="Enter your user name" class="form-input">
                    </div>
                    <div class="input">
                        <label for="password" class="form-text">PASSWORD</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password" class="form-input">
                    </div>
                    <div class="right-column-action">
                        <input type="submit" value="Login" name="login-button" class="button-block">
                        <p>or</p>
                       <a href="forgot.php"  class="form-block-sign-in">Forgot password</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
      if(isset($_COOKIE["prisijungti"])){
        header("location:account.php");
    }
    if(isset($_POST["login-button"])){
        $registruotiVartotojai = array(
            array("vardas" => "admin", "slaptazodis" => "admin", "teises" => 1),
            array("vardas" => "admin1", "slaptazodis" => "admin1", "teises" => 3),
            array("vardas" => "admin2", "slaptazodis" => "admin2", "teises" => 3),
            array("vardas" => "admin3", "slaptazodis" => "admin3", "teises" => 2),
            array("vardas" => "admin4", "slaptazodis" => "admin4", "teises" => 2),
            array("vardas" => "admin5", "slaptazodis" => "admin5", "teises" => 2),
            array("vardas" => "admin6", "slaptazodis" => "admin6", "teises" => 2),
            array("vardas" => "admin7", "slaptazodis" => "admin7", "teises" => 2),
            array("vardas" => "admin8", "slaptazodis" => "admin8", "teises" => 2),
            array("vardas" => "admin9", "slaptazodis" => "admin9", "teises" => 2)
        );
        if(isset($_POST["username"]) && !empty($_POST["username"])&&isset($_POST["password"]) && !empty($_POST["password"])){
            $userName = $_POST["username"];
            $password = $_POST["password"];
              
            foreach ($registruotiVartotojai as $elementas) {

                $teisingasDuomuo = false;
                $laikinasVardas="";
                $laikinasTeises="";
                if ($userName == $elementas["vardas"] && $password == $elementas["slaptazodis"]) {
                    $teisingasDuomuo = true;
                    $laikinasVardas=$elementas["vardas"];
                    $laikinasTeises=$elementas["teises"];;
                    break;
                } else {
                }
            }
            if ($teisingasDuomuo == true) {
                echo    $laikinasVardas;
                echo    $laikinasTeises;
                echo "sveiki atvyke";
                setcookie("prisijungti", $laikinasVardas,time() + 3600, "/");
                setcookie("teises", $laikinasTeises,time() + 3600, "/");
                header("Location: account.php");
            } else {
                echo '<script>  alert("isvesti duomenys blogi, bandykite dar karta");   </script>';
            }
        }
        else{
            echo '<script>  alert("iveskite prisijungimo duomenu");   </script>';
        }
        
    }


?>

</body>
</html> 