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