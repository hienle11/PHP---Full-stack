<?php
include "./includes/header.inc.php";
include "./includes/footer.inc.php";
include "./includes/tools.php"; // for debug only
require "./styles/index.css.php"; //include CSS Style Sheet

top_module("Amazorn", true);

?>

<main>
    <div class="container-fluid">
        <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-interval="10000">
                    <img src="images/Fuji_TallHero_45M_v2_2x._CB432458382_.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-interval="2000">
                    <img src="images/Fuji_TallHero_Computers_2x._CB432469748_.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images/Hero_Currency_EN_2X._CB466692686_.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <!-- <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev" style="top: -30rem !important">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next" style="top: -30rem !important">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a> -->
        </div>

        <div class="row row-category">
            <div class="col-sm d-flex justify-content-center px-lg-2">
                <div class="card" style="width: 22rem; padding: 1rem">
                    <h5 class="card-title">Macbook Pro</h5>
                    <a href="category?searchKey=macbook"><img src="images/mac-category.jpg" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="category?searchKey=macbook" class="card-link">Shop now</a>
                    </div>
                </div>
            </div>
            <div class="col-sm d-flex justify-content-center px-lg-2">
                <div class="card" style="width: 22rem; padding: 1rem">
                    <h5 class="card-title">iMac</h5>
                    <a href="category?searchKey=imac"><img src="images/imac-category.jpg" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="category?searchKey=imac" class="card-link">Shop now</a>
                    </div>
                </div>
            </div>
            <div class="col-sm d-flex justify-content-center px-lg-2">
                <div class="card" style="width: 22rem; padding: 1rem">
                    <h5 class="card-title">iPad</h5>
                    <a href="category?searchKey=ipad"><img src="images/ipad-category.jpg" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="category?searchKey=ipad" class="card-link">Shop now</a>
                    </div>
                </div>
            </div>

            <div class="col-sm d-flex justify-content-center px-lg-2">
                <div class="card" style="width: 22rem; padding: 1rem">
                    <h5 class="card-title">iPhone</h5>
                    <a href="category?searchKey=iphone"><img src="images/iphone-category.jpg" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="category?searchKey=iphone" class="card-link">Shop now</a>
                    </div>
                </div>
            </div>
        </div>



        <section class="best-seller-section">
            <h1>Best Seller</h1>
            <div class="container">
                <div class="row row-custom">
                    <div class="col d-flex justify-content-center col-custom">
                        <div class="card card-custom">
                            <a href="product?id=44"><img src="images/iPhone11-ProMax.jpg" class="card-img-top" alt="..."></a>
                            <h5 class="card-title">iPhone 11 Pro Max (256GB)</h5>
                            <h5>$1500</h5>
                            <div class="card-body">
                                <p class="card-text">Over 1000 iPhone 11 Pro Max (256GB) have been sold in this month. Don't hesitate to get one!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex justify-content-center col-custom">
                        <div class="card card-custom">
                        <a href="product?id=44"><img src="images/iPhone11-Pro.jpg" class="card-img-top" alt="..."></a>
                            <h5 class="card-title">iPhone 11 Pro (256GB)</h5>
                            <h5>$1350</h5>
                            <div class="card-body">
                                <p class="card-text">Over 2500 iPhone 11 Pro (256GB) have been sold in two weeks. It is rated the best smart phone of 2019.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row-custom">
                    <div class="col d-flex justify-content-center col-custom">
                        <div class="card card-custom">
                        <a href="product?id=2"><img src="images/MacBookPro-2019-SpaceGray.jpg" class="card-img-top" alt="..."></a>
                            <h5 class="card-title">MacBook Pro 2019 13-inch</h5>
                            <h5>$1500</h5>
                            <div class="card-body">
                                <p class="card-text">Best product with affordable price for workstation. Thrive your career with the best laptop of the century. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex justify-content-center col-custom">
                        <div class="card card-custom">
                        <a href="category?searchKey=MacBook Pro 2019 16-inch"><img src="images/MacBookPro-2019-Silver.jpg" class="card-img-top" alt="..."></a>
                            <h5 class="card-title">MacBook Pro 2019 16-inch</h5>
                            <h5>$2600 - $2900</h5>
                            <div class="card-body">
                                <p class="card-text">Over 250 MacBook Pro 2019 16-inch have been sold with in a month. It is considered as a perfect laptop for graphic designers. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </div>
</main>

<?php
end_module(True); // Enable Footer
?>