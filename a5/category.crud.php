<?php
include "./includes/header.inc.php";
include "./includes/footer.inc.php";
include "./includes/tools.php"; // for debug only
require "./styles/index.css.php"; //include CSS Style Sheet
require "./styles/signin.css.php"; //include CSS Style Sheet
require "./styles/search.css.php"; //include CSS Style Sheet
session_start();
top_module("Amazorn", true);
?>



<div class="container-fluid">
    <h1>CATEGORY</h1>
    <?php
        if (!isset($_GET['result'])) {
            header("Location: ../system/categories/process");
        } else if ($_GET['result'] == 'success'){
            echo "<h5>Found: ".$_SESSION['numberOfResults'] . " records</h5>";
        } else {
            echo "None records have been found";
        }
    ?>
    <div class="d-flex justify-content-between">
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn form__btn--primary" type="submit">Search</button>
        </form>
        <button onclick="location.href='categories/create'" type="button" class="btn btn-success" style="min-width: 10rem;">Create</button>
    </div>

    <table class="table table-bordered" style="background-color: #fff; margin-top: 2rem;">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <!-- <th scope="col">Category</th> -->
            </tr>
        </thead>
        <tbody>
            <form method="GET", action="product">
            <tr>
                <td><?php echo $_SESSION['c0']['category_id']; ?></td>
                <td><?php echo $_SESSION['c0']['category_name']; ?></td>
                <td>
                    <ul class="list-button d-flex">
                        <li class="btn-custom"><button type="submit" class="btn btn-primary">Read</button></li>
                        <li class="btn-custom"><button type="button" class="btn btn-warning">Edit</button></li>
                        <li class="btn-custom"><button type="button" class="btn btn-danger">Delete</button></li>
                    </ul>
                </td>
            </tr>
            </form>
            
            <form method="GET", action="product">
            <tr>
                <td><?php echo $_SESSION['c1']['category_id']; ?></td>
                <td><?php echo $_SESSION['c1']['category_name']; ?></td>
                <td>
                    <ul class="list-button d-flex">
                        <li class="btn-custom"><button type="submit" class="btn btn-primary">Read</button></li>
                        <li class="btn-custom"><button type="button" class="btn btn-warning">Edit</button></li>
                        <li class="btn-custom"><button type="button" class="btn btn-danger">Delete</button></li>
                    </ul>
                </td>
            </tr>
            </form>

            <form method="GET", action="product">
            <tr>
                <td><?php echo $_SESSION['c2']['category_id']; ?></td>
                <td><?php echo $_SESSION['c2']['category_name']; ?></td>
                <td>
                    <ul class="list-button d-flex">
                        <li class="btn-custom"><button type="submit" class="btn btn-primary">Read</button></li>
                        <li class="btn-custom"><button type="button" class="btn btn-warning">Edit</button></li>
                        <li class="btn-custom"><button type="button" class="btn btn-danger">Delete</button></li>
                    </ul>
                </td>
            </tr>
            </form>

            <form method="GET", action="product">
            <tr>
                <td><?php echo $_SESSION['c3']['category_id']; ?></td>
                <td><?php echo $_SESSION['c3']['category_name']; ?></td>
                <td>
                    <ul class="list-button d-flex">
                        <li class="btn-custom"><button type="submit" class="btn btn-primary">Read</button></li>
                        <li class="btn-custom"><button type="button" class="btn btn-warning">Edit</button></li>
                        <li class="btn-custom"><button type="button" class="btn btn-danger">Delete</button></li>
                    </ul>
                </td>
            </tr>
            </form>
            <form method="GET", action="product">
            <tr>
                <td><?php echo $_SESSION['c4']['category_id']; ?></td>
                <td><?php echo $_SESSION['c4']['category_name']; ?></td>
                <td>
                    <ul class="list-button d-flex">
                        <li class="btn-custom"><button type="submit" class="btn btn-primary">Read</button></li>
                        <li class="btn-custom"><button type="button" class="btn btn-warning">Edit</button></li>
                        <li class="btn-custom"><button type="button" class="btn btn-danger">Delete</button></li>
                    </ul>
                </td>
            </tr>
            </form>
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Type page number" aria-label="Search">
            <button class="btn form__btn--primary" type="submit">Go</button>
        </form>
    </div>

    <div class="pagination">
        <a href="#">&laquo;</a>
        <a href="#">1</a>";
        
        
        <a href="#">&raquo;</a>
    </div>

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