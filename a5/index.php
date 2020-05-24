<?php
include "./includes/header.inc.php";
include "./includes/footer.inc.php";
include "./includes/tools.php";
require "./styles/index.css.php"; //include CSS Style Sheet
session_start();
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
            <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev" style="top: -30rem !important">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next" style="top: -30rem !important">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="row row-category">
            <div class="col-sm d-flex justify-content-center px-lg-2">
                <div class="card" style="width: 22rem; padding: 1rem">
                    <h5 class="card-title">iPhones & iPads</h5>
                    <img src="images/category.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="card-link">Shop now</a>
                    </div>
                </div>
            </div>
            <div class="col-sm d-flex justify-content-center px-lg-2">
                <div class="card" style="width: 22rem; padding: 1rem">
                    <h5 class="card-title">Macs</h5>
                    <img src="images/category.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="card-link">Shop now</a>
                    </div>
                </div>
            </div>
            <div class="col-sm d-flex justify-content-center px-lg-2">
                <div class="card" style="width: 22rem; padding: 1rem">
                    <h5 class="card-title">Macbooks</h5>
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
        <div class="amazorn-deal">
            <h1>Amazorn Deal</h1>
            <div class="row row-sale" `>
                <div class="col d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img src="images/macbook.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img src="images/macbook.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img src="images/macbook.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img src="images/macbook.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img src="images/macbook.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-sale" `>
                <div class="col d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img src="images/macbook.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img src="images/macbook.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img src="images/macbook.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img src="images/macbook.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img src="images/macbook.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

<footer>
    <div>
        Phone: +84 123456789 <br>
        Contact Email: cinemax@gmail.com <br>
        Address: 130 Tran Nguyen Han, Nha Trang, Khanh Hoa, Vietnam <br>
        <a href="https://github.com/s3695516/wp.git" style="color: yellow" target="_blank">Git Hub Repo Link - Click Here
            </Cick> </a>
    </div>
    <hr style="border-color: #F0C14B; margin: 20px 0px;">
    <div>
        &copy;
        <script>
            document.write(new Date().getFullYear());
        </script>
        Group 2: Le Quang Hien - s3695516 and Dang Ba Minh - s3685119. Last modified
        <?= date("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.
    </div>
    <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web
        Programming course at RMIT University in Melbourne, Australia.
    </div>

</footer>



<?php
end_module();
?>