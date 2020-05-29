<?php


include "./styles/category.css.php";

require "./includes/header.inc.php";

require "./includes/footer.inc.php";

top_module("Amazorn Sign-in", True);
?>

<main>
    <div class="container mt-5" style="max-width: 1379px;">
        <img src="./images/Macbook_Pro/Banner-MacBookPro-2020.jpg" class="img-fluid" alt="Responsive image">
        <h1>MacBook Pro 2020</h1>
        <div class="row margin-center">
            <div class="col-sm col-custom">
                <div class="card margin-center card-custom">
                    <img src="./images/Macbook_Pro/MacBookPro-16inch-Silver.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm col-custom ">
                <div class="card margin-center card-custom">
                    <img src="./images/Macbook_Pro/MacBookPro-16inch-SpaceGray.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                    </div>
                </div>
            </div>
            <div class="col-sm col-custom ">
                <div class="card margin-center card-custom">
                    <img src="./images/Macbook_Pro/MacBookPro-2019-Silver.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
        </div>


</main>

<?php
end_module(True); // Enable Footer
?>