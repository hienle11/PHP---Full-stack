<?php
include "./includes/header.inc.php";
include "./includes/footer.inc.php";
include "./includes/tools.php";
require "./includes/service.inc.php";
require "./styles/index.css.php"; //include CSS Style Sheet
require "./styles/product.css.php"; //include CSS Style Sheet
top_module("Amazorn", true);
?>

<?php

if (isset($_GET['id'])) {
    try {
        $product = service_findById('products', $_GET['id']);
    } catch (RuntimeException $exception) {
        echo "Product not found";
    }
} else {
    header("Location: home");
}
$product['descript'] = str_replace('/', '<br>', $product['descript']);

?>

<main>
    <div class="container-fluid">
        <div class="row row-custom">
            <div class="col-sm" style="padding: 1rem;">
                <div class="img-container">
                    <img id="product_image" src="images/<?php echo $product['image_uri'] ?>" class="img-fluid img-custom" alt="Responsive image">
                </div>
            </div>
            <div class="col-sm col-md-12 col-lg-7" style="padding: 1rem;">
                <h3 id="product_id" style="display: none;"><?php echo $product['product_id'] ?></h3>
                <h3 id="product_name" style="margin-bottom: 1rem;"><?php echo $product['product_name'] ?></h3>
                <p><?php echo $product['descript'] ?></p>
                <hr>
                <h4>Price: $<span id="product_price"><?php echo $product['price'] ?></span></h4>

                <button id="addCardButton" type="button" class="btn btn-custom" style="margin-top: 2rem;">
                    Add to cart
                </button>
            </div>
        </div>
    </div>
</main>

<?php
require "./scripts/product.script.php";
end_module(True); // Enable Footer
?>