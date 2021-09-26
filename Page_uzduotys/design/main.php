<?php require_once("../connection.php"); ?>

<?php 

$sql = "SELECT reiksme FROM nustatymai WHERE ID = 1 "; 
$result = $conn->query($sql);
$selected_value = mysqli_fetch_array($result);



?>

<div class="row">


    <?php if ($selected_value[0] == 1) {
        require("sidebar.php");
    } ?>
    
    <?php if($selected_value[0] == 0) { ?>
        <div class="col-lg-12">
    <?php } else {?>
        <div class="col-lg-9">
    <?php } ?>
        <div class="row">
        <?php 

            if(isset($_GET["catID"]) && !empty($_GET["catID"])) { //egzistuoja
                $catID = $_GET["catID"];
                
                $sql = "SELECT puslapiai.pavadinimas, 
                puslapiai.nuoroda, 
                puslapiai.santrauka, 
                kategorijos.pavadinimas AS kategorijos_pavadinimas,
                kategorijos.ID
                FROM puslapiai 
                LEFT JOIN kategorijos
                ON puslapiai.kategorijos_id = kategorijos.ID
                WHERE puslapiai.kategorijos_id = $catID
                ORDER BY puslapiai.ID DESC";    
            } else {
                $sql = "SELECT puslapiai.pavadinimas, 
                puslapiai.nuoroda, 
                puslapiai.santrauka, 
                kategorijos.pavadinimas AS kategorijos_pavadinimas,
                kategorijos.ID
                FROM puslapiai 
                LEFT JOIN kategorijos
                ON puslapiai.kategorijos_id = kategorijos.ID
                ORDER BY puslapiai.ID DESC";
            }

            $result = $conn->query($sql);

            while($pages = mysqli_fetch_array($result)) {
            ?>
            <div class="card col-lg-4" style="width: 18rem;">
                <img class="card-img-top" src="https://media.istockphoto.com/photos/camera-and-lens-zoom-closeup-picture-id1152344841?s=612x612" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $pages["pavadinimas"]; ?></h5>
                    <p class="card-text"><?php echo $pages["santrauka"]; ?></p>
                    <p class="catd-text"><a  href="index.php?catID=<?php echo $pages["ID"] ?>" ><?php echo $pages["kategorijos_pavadinimas"]; ?></a>  </p>
                    <a href="puslapiai.php?href=<?php echo $pages["nuoroda"]; ?>" class="btn btn-primary">Go somewhere</a>
                    
                </div>
            </div>

            <?php } ?>    
        </div>
    </div>
    
    <?php if ($selected_value[0] == 2) {
        require("sidebar.php");
    } ?>
</div>