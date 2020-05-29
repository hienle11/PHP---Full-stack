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
                    <img src="images/category.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="card-link">Shop now</a>
                    </div>
                </div>
            </div>
            <div class="col-sm d-flex justify-content-center px-lg-2">
                <div class="card" style="width: 22rem; padding: 1rem">
                    <h5 class="card-title">Macbook Air</h5>
                    <img src="images/category.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="card-link">Shop now</a>
                    </div>
                </div>
            </div>
            <div class="col-sm d-flex justify-content-center px-lg-2">
                <div class="card" style="width: 22rem; padding: 1rem">
                    <h5 class="card-title">iMac</h5>
                    <img src="images/category.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="card-link">Shop now</a>
                    </div>
                </div>
            </div>

            <div class="col-sm d-flex justify-content-center px-lg-2">
                <div class="card" style="width: 22rem; padding: 1rem">
                    <h5 class="card-title">Accessories</h5>
                    <img src="images/category.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="card-link">Shop now</a>
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
                            <img src="images/Thumbnails/Thumnail-iPhone.jpg" class="card-img-top" alt="...">
                            <h5 class="card-title">iPhone 11</h5>
                            <div class="card-body">
                                <p class="card-text">iPhone 11, iPhone 11 Pro and Pro Max.
                                    They are available for your experience at Amazorn</p>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex justify-content-center col-custom">
                        <div class="card card-custom">
                            <img src="images/Thumbnails/Thumnail-iPad.jpg" class="card-img-top" alt="...">
                            <h5 class="card-title">iPad Pro</h5>
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row-custom">
                    <div class="col d-flex justify-content-center col-custom">
                        <div class="card card-custom">
                            <img src="images/Thumbnails/Thumnail-AppleWatch.jpg" class="card-img-top" alt="...">
                            <h5 class="card-title">Apple Watch</h5>
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex justify-content-center col-custom">
                        <div class="card card-custom">
                            <img src="images/Thumbnails/Thumnail-Airpods2.jpg" class="card-img-top" alt="...">
                            <h5 class="card-title">AirPods 2</h5>
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
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