
<?php
if(isset($_POST["color"]) && !empty($_POST["color"])){
    $bacgroundColor = $_POST["color"];
    echo $bacgroundColor;
}
else{
    echo "ivyko klaida";
}

?>
<style>
    body{
        background-color: <?php echo $bacgroundColor ?>;
    }
</style>