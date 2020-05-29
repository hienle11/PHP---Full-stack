<?php
include "./includes/header.inc.php";
include "./includes/footer.inc.php";
include "./includes/tools.php";
require "./styles/index.css.php"; //include CSS Style Sheet
require "./styles/cart.css.php"; //include CSS Style Sheet
session_start();
top_module("Amazorn", true);
?>

<main>
    <div class="container-fluid">
        <div class="row row-custom">
            <div class="col-sm" style="padding: 1rem;">
                <div class="list-container">
                    <ul style="padding: 0;">
                        <li class="item d-flex justify-content-between" style="margin-left: 2rem;">
                            <div class=" img-container">
                                <img src="images/macbook3.png" class="img-fluid img-custom" alt="Responsive image">
                            </div>
                            <div class="d-flex align-items-center" style="margin-right: 2rem;">
                                <strong> Price: $1200</strong>
                            </div>
                        </li>
                        <hr>
                        <li class="item d-flex justify-content-between" style="margin-left: 2rem;">
                            <div class=" img-container">
                                <img src="images/macbook3.png" class="img-fluid img-custom" alt="Responsive image">
                            </div>
                            <div class="d-flex align-items-center" style="margin-right: 2rem;">
                                <strong> Price: $1200</strong>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="col-sm col-md-12 col-lg-4" style="padding: 1rem;">
                <div class="order-container">
                    <h5>Total Cost: $1200</h5>

                    <button type="button" class="btn btn-custom" style="margin-top: 2rem;">
                        Checkout
                    </button>
                </div>

            </div>
        </div>
    </div>
</main>

<?php
end_module(True); // Enable Footer
?>