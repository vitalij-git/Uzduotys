<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
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
        <div>
            <span class="close">x</span>
            <div class="form-block">
                <form action="signup.php">
                    <div class="input">
                        <label for="username" class="form-text">USERNAME</label>
                        <input type="text" id="fname" name="username" placeholder="Enter your user name" class="form-input">
                    </div>
                    <div class="input">
                        <label for="email" class="form-text">E-MAIL</label>
                        <input type="email" id="email" name="email" placeholder="Enter your E-mail" class="form-input">
                    </div>
                    <div class="input">
                        <label for="password" class="form-text">PASSWORD</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password" class="form-input">
                    </div>
                    <div class="input">
                        <label for="password" class="form-text"> REPEAT PASSWORD</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password" class="form-input">
                    </div>
                    <div class="right-column-action">
                        <input type="submit" value="Get started" class="button-block">
                        <p>or</p>
                        <a href="login.php" class="form-block-sign-in">Sign in</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
 if(isset($_COOKIE["prisijungti"])){
    header("location:account.php");
}
    ?>
</body>
</html> 