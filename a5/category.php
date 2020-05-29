<?php
include "./styles/category.css.php";
include "./includes/paging.inc.php";
require "./includes/service.inc.php";
require "./includes/header.inc.php";
require "./includes/footer.inc.php";
top_module("Amazorn Sign-in", True);


?>

<!-- filter module is here -->
<?php

    $filterResults = array();
    $pageNumber = (isset($_GET['page']) ? (int)$_GET['page'] : 1);
    $pageSize = (isset($_GET['size']) ? (int)$_GET['size'] : 9);
    $searchKey = (isset($_GET['searchKey']) ? $_GET['searchKey'] : ""); // get searchKey if exists

    try {
        $filterResults = service_populateData('products', $pageNumber, $pageSize, $searchKey);   
    } catch (RuntimeException $exception) {
        echo "No records have been found";
    }


    // convert description 

?>


<main>
    <div class="container mt-5" style="max-width: 1379px;">
        <img src="./images/Macbook_Pro/Banner-MacBookPro-2020.jpg" class="img-fluid" alt="Responsive image">
        <h1>MacBook Pro 2020</h1>

            <?php
                for($i = 0; $i < $pageSize; $i++) {
                    if (isset($filterResults['c'.$i])) {
                        echo $i % 3 == 0  ?  "<div class='row margin-center'>" : "";
                        $filterResults['c'.$i]['descript'] = str_replace('/', '<br>', $filterResults['c'.$i]['descript']);
                        echo <<< PRODUCT
                            <div class="col-sm col-custom">
                                <div class="card margin-center card-custom">
                                    <img src="images/{$filterResults['c'.$i]['image_uri']}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{$filterResults['c'.$i]['product_name']}</h5>
                                        <p class="card-text">{$filterResults['c'.$i]['descript']}</p>
                                        <h5>\${$filterResults['c'.$i]['price']}</h5>
                                    </div>
                                </div>
                            </div>
                        PRODUCT;
    
                        echo $i % 3 == 2 ?  "</div>" : "";
                    }
                }
            ?>
</main>

<?php
paging_module($pageNumber, $pageSize, $filterResults['numberOfResults'], 'category');
end_module(True); // Enable Footer
?>