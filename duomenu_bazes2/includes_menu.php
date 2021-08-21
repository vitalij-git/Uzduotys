<style>
.navbar-action{
    display: flex;
    justify-content: space-between;
}

</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="clients.php">Klientai</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse navbar-action" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="user.php">Vartojojai </a>
            <a class="nav-item nav-link" href="newClient.php">Prideti klienta</a>
            <a class="nav-item nav-link" href="addUser.php">Prideti vartotoja</a>
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