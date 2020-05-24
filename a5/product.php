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