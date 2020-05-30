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
        <?php
            switch ($searchKey) {
                case 'macbook':
                echo <<< HEADER
                    <img src="./images/macbook.jpg" class="img-fluid" alt="Responsive image">
                    <h1>MacBook Pro</h1>
                HEADER; break;

                case 'imac':
                    echo <<< HEADER
                        <img src="./images/imac-big.jpeg" class="img-fluid" alt="Responsive image">
                        <h1>iMac</h1>
                    HEADER; break;

                case 'ipad':
                echo <<< HEADER
                    <img src="./images/ipad.jpg" class="img-fluid" alt="Responsive image">
                    <h1>iPad Pro</h1>
                HEADER; break;

                case 'iphone':
                echo <<< HEADER
                    <img src="./images/iphone.jpg" class="img-fluid" alt="Responsive image">
                    <h1>iPhone 11</h1>
                HEADER; break;
                
                default:
                    echo "<h5>No products have been found with the given search key. Please try again!</h5>";
            } 
           

            for($i = 0; $i < $pageSize; $i++) {
                if (isset($filterResults['c'.$i])) {
                    echo $i % 3 == 0  ?  "<div class='row margin-center'>" : "";
                    $filterResults['c'.$i]['descript'] = str_replace('/', '<br>', $filterResults['c'.$i]['descript']);
                    echo <<< PRODUCT
                        <div class="col-sm col-custom">
                            <div class="card margin-center card-custom">
                                <a href='product?id={$filterResults['c'.$i]['product_id']}'><img src="images/{$filterResults['c'.$i]['image_uri']}" class="card-img-top" alt="..."></a>
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
    </div>
</main>

<?php
$pageURL = "category?searchKey={$_GET['searchKey']}&";
paging_module($pageNumber, $pageSize, $filterResults['numberOfResults'], $pageURL);
end_module(True); // Enable Footer
?>