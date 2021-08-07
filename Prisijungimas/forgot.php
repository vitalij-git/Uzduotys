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
        <div class="forgot-form-block">
            <span class="close">x</span>
            <div class="form-block">
                <form action="signup.php">
                    <div class="input">
                        <label for="email" class="form-text">E-MAIL</label>
                        <input type="email" id="email" name="email" placeholder="Enter your E-mail" class="form-input">
                    </div>
                    <div class="right-column-action">
                        <input type="submit" value="Remind" class="button-block">
                        <p>or</p>
                        <a href="signup.php" class="form-block-sign-in">Sign up</a>
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