<?php
include "./includes/header.inc.php";
include "./includes/footer.inc.php";
include "./includes/tools.php";
require "./styles/index.css.php"; //include CSS Style Sheet
require "./styles/product.css.php"; //include CSS Style Sheet
session_start();
top_module("Amazorn", true);
?>

<main>
    <div class="container-fluid">
        <div class="row row-custom">
            <div class="col-sm" style="padding: 1rem;">
                <div class="img-container">
                    <img src="images/macbook3.png" class="img-fluid img-custom" alt="Responsive image">
                </div>
            </div>
            <div class="col-sm col-md-12 col-lg-7" style="padding: 1rem;">
                <h3 style="margin-bottom: 1rem;">MacBook Pro 13.3-inch 1.4Ghz 256GB (Silver)</h3>
                <p>1.4GHz quad‑core 8th‑generation Intel Core i5 processor, Turbo Boost up to 3.9GHz <br>

                    8GB 2133MHz LPDDR3 memory <br>

                    256GB SSD Storage <br>

                    Intel Iris Plus Graphics 645 <br>

                    2 x ports ThunderBolt 3 <br>

                    Touch Bar, Touch ID, Magic Keyboard
                </p>
                <hr>
                <h4>Price: $1200</h4>

                <button type="button" class="btn btn-custom" style="margin-top: 2rem;">
                    Add to cart
                </button>
            </div>
        </div>
    </div>
</main>

<?php
end_module(True); // Enable Footer
?> 