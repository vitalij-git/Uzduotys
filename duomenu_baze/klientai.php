<style>
table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
}

table td, table th {
  border: 1px solid #ddd;
  padding: 8px;
}

table tr:nth-child(even){background-color: #f2f2f2;}

table tr:hover {background-color: #ddd;}

table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
<?php require_once("connection.php"); 
echo '<form action="klientuforma.php" method="post">
<button type="submit" name="add-new-client">Add new client</button>
</form>';
$sql= "SELECT * FROM `klientai` WHERE 1";
$result = mysqli_query($login, $sql);
echo "<table>";
echo "<tr>";
echo "<th>";
echo "ID";
echo "</th>";
echo "<th>";
echo "Vardas";
echo "</th>";
echo "<th>";
echo "Pavarde";
echo "</th>";
echo "<th>";
echo "Teise";
echo "</th>";
echo "</tr>";
while($klientai =mysqli_fetch_array($result)){
    echo "<tr> <a href='#'>";
    echo "<td>";
    echo $klientai["ID"];
    echo "</td>";
    echo "<td>";
    echo $klientai["vardas"];
    echo "</td>";
    echo "<td>";
    echo $klientai["pavarde"];
    echo "</td>";
    echo "<td>";
    echo $klientai["teises_id"];
    echo "</td>";
    echo "<td>";
    echo "<a href='klientai.php?klientoid=".$klientai["ID"]."'>Redaguoti</a>";
    echo "</td>";
    echo "</a></tr>";
}
echo "</table>";


if(isset($_POST["add-new-client"])){
    header("location: klientuforma.php");
}
if(isset($_POST["klientoid"])){
    echo "klientas";
    // echo "<form action='klientai.php' method='get'>";
    // echo "redaguojame irasa".$_GET["klientoid"];
    // echo "</form>";
}
?>