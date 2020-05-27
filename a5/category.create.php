<?php
include "./includes/header.inc.php";
include "./includes/footer.inc.php";
include "./includes/tools.php"; // for debug only
require "./styles/index.css.php"; //include CSS Style Sheet
require "./styles/create_product.css.php"; //include CSS Style Sheet
session_start();
top_module("Amazorn", true);
?>
<main>
    <div class="container-fluid">
        <h1>CREATE CATEGORY</h1>
        <?php
            if (isset($_GET['result'])) {
                if ($_GET['result'] == 'success') {
                    echo "New category is created successfully";
                } else if ($_GET['result'] == 'fail') {
                    echo "Fail to create new category! <br> It could be due to following reasons: <br>";
                    echo " *Category name must be unique";
                }
            }
        ?>
        <table class="table table-bordered" style="background-color: #fff; margin-top: 2rem;">
            <form method="POST", action="../categories/process">
            <tbody>
                <tr>
                    <th scope="row">Name</th>
                    <td><input type="text" name="category_name" class="form-control" placeholder="Category Name"></td>

                </tr>
            
                <tr>
                    <th scope="row"></th>

                    <td>
                        <ul class="list-button d-flex">
                            <li class="btn-custom"><button type="submit" name="action" value="Create" class="btn btn-primary">Save</button></li>
                            <li onclick="location.href='../categories'" class="btn-custom"><button type="button" class="btn btn-danger text-nowrap">Back  </button></li>
                        </ul>
                    </td>

                </tr>
            </tbody>
            </form>
        </table>
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