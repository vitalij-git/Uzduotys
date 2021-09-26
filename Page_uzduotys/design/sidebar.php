<div class="col-lg-3 sidebar">
        <h3>Šoninė juosta/Sidebar</h3>
    <?php

function categoryTree ($parent_id = 0, $category_tree_massive = '') {

    require("../connection.php"); 

    if(!is_array($category_tree_massive )) {
        $category_tree_massive  = array();
    }

    $sql = "SELECT * FROM category WHERE parent_id = $parent_id AND rodyti = 1"; 
    
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        $category_tree_massive [] = "<ul>";
        while($category = mysqli_fetch_array($result)) {
            $categoryID = $category["ID"];
            $sql1 = "SELECT COUNT(ID) AS total_inscriptions FROM `pages` WHERE category_id = $categoryID ";
            $result1 = $conn->query($sql1);
            $totalPages = mysqli_fetch_array($result1);
            $category_tree_massive [] = "<li>";
            $category_tree_massive[] = "<a href='index.php?catID=".$categoryID."'>";
            $category_tree_massive[] = $category["name"]." (".$totalPages["total_inscriptions"].")" ;
            $category_tree_massive[] = "</a>";
            $category_tree_massive[] = "</li>";
            $category_tree_massive = categoryTree($category["ID"], $category_tree_massive); 
        }
        $category_tree_massive[] = "</ul>";
    }
    


    return $category_tree_massive; 
}

$categories = categoryTree();

foreach($categories as $category) {
    echo $category;
}

    ?>

    </div>