<?php
include "./includes/header.inc.php";
include "./includes/footer.inc.php";
include "./includes/paging.inc.php";
include "./includes/tools.php"; // for debug only
require "./styles/index.css.php"; //include CSS Style Sheet
require "./styles/signin.css.php"; //include CSS Style Sheet
require "./styles/crud.css.php"; //include CSS Style Sheet
session_start();
top_module("Amazorn", true);
?>



<div class="container-fluid">
    <h1>SYSTEM EDITOR</h1> 
    <br><button onclick="location.href='system/categories'" type="button" class="btn btn-warning" style="min-width: 10rem;">Edit Categories</button>
    <br><br><button onclick="location.href='system/products'" type="button" class="btn btn-warning" style="min-width: 10rem;">Edit Products</button>
    <br><br><button onclick="location.href='system/users'" type="button" class="btn btn-danger" style="min-width: 10rem;">Edit Users</button>

</div>

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