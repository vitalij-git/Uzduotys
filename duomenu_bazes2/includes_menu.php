<?php
require_once("connection.php");
require_once("includes.php");
if (!isset($_COOKIE["login"])) {
    header("Location: index.php");
} else {
    $loginArray = explode("|", $_COOKIE["login"]);
}
?>
<style>
    nav {
        margin-bottom: 10px;
    }

    @media screen and (min-width: 992px) {
        .navbar-nav-button form {
            position: absolute;
            top: 15%;
            right: 3%;

        }
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="clients.php">Klientai</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse navbar-action" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <?php if ($loginArray[2] == 1 || $loginArray[2] == 4) { ?>
                <a class="nav-item nav-link" href="user.php">Vartojojai </a>
            <?php } ?>
            <a class="nav-item nav-link" href="company.php">Imones</a>
            <a class="nav-item nav-link" href="myAccount.php">Mano paskyra</a>
        </div>
        <div class="navbar-nav-button" class="navbar-nav">
            <form action="clients.php" method="post">
                <button type="submit" class="btn btn-primary" name="logout">Atsijungti</button>
            </form>
        </div>
    </div>
</nav>
<?php
if (isset($_POST["logout"])) {
    setcookie("login", "", time() - 3600, "/");
    header("location:index.php");
}


?>