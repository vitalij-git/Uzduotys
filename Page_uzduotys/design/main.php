<?php require_once("../connection.php"); ?>

<?php 

// $sql = "SELECT reiksme FROM nustatymai WHERE ID = 1 "; 
// $result = $conn->query($sql);
// $selected_value = mysqli_fetch_array($result);



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

            if(isset($_GET["catID"]) && !empty($_GET["catID"])) { 
                $catID = $_GET["catID"];
                
                $sql = "SELECT pages.name, 
                pages.link, 
                pages.summary, 
                category.name AS category_name,
                category.ID
                FROM pages 
                LEFT JOIN category
                ON pages.category_id = category.ID
                WHERE pages.category_id = $catID
                ORDER BY pages.ID DESC";    
            } else {
                $sql = "SELECT pages.name, 
                pages.link, 
                pages.summary, 
                category.name AS category_name,
                category.ID
                FROM pages 
                LEFT JOIN category
                ON pages.category_id = category.ID
                ORDER BY pages.ID DESC";
            }

            $result = $conn->query($sql);

            while($pages = mysqli_fetch_array($result)) {
            ?>
            <div class="card col-lg-4" style="width: 18rem;">
                <img class="card-img-top" src="https://media.istockphoto.com/photos/camera-and-lens-zoom-closeup-picture-id1152344841?s=612x612" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $pages["name"]; ?></h5>
                    <p class="card-text"><?php echo $pages["summary"]; ?></p>
                    <p class="catd-text"><a  href="index.php?catID=<?php echo $pages["ID"] ?>" ><?php echo $pages["category_name"]; ?></a>  </p>
                    <a href="pages.php?href=<?php echo $pages["link"]; ?>" class="btn btn-primary">Go somewhere</a>
                    
                </div>
            </div>

            <?php } ?>    
        </div>
    </div>
    
    <?php if ($selected_value[0] == 2) {
        require("sidebar.php");
    } ?>
</div>