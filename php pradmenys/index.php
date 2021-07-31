<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Skaiciuotuvas</h2>
    <form action="calculator.php" method="get">
    <input type="text" name="number1" value="5">
    <input type="text" name="symbol" value="+">
    <input type="text" name="number2" value="7">
    <button type="submit">Patvirtinti</button>
    <!-- <input class='disabled'  value='<?php echo $result?>' />"; -->
    </form>
    <br>
    <h2>Trupmenu skaiciuotuvas</h2>
    <form action="trupmenos.php" method="get">
    <input type="text" name="a1" value="5">
    /
    <input type="text" name="a2" value="5">
    <input type="text" name="operator" >
    <input type="text" name="b1" value="7">
    /
    <input type="text" name="b2" value="7">
    <button type="submit">Patvirtinti</button>
    </form>
    <br>
    <h2>Prisijungti</h2>
    <form action="login.php" method="post">
    <input type="text" name="username">
    <input type="text" name="password">
    <button type="submit">Patvirtinti</button>
    </form>
    <br>
    <h2>Nuspalvinti</h2>
    <form action="background.php" method="post">
    <input type="text" name="color">
    <button >Patvirtinti</button>
    </form>
    <br>
    <h2>Logotipas</h2>
    <form action="logotipas">
        <button type="submit">Tikrinti</button>
    </form>
    <br>
    <h2>Graza</h2>
    <form action="graza.php" method="get">
        <input type="text" name="graza">
        <button type="submit">Patvirtinti</button>
    </form>
</body>
</html>