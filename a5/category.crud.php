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
    <h1>CATEGORY</h1>
    <?php
        $pageNumber = (isset($_GET['page']) ? (int)$_GET['page'] : 1);
        $pageSize = (isset($_GET['size']) ? (int)$_GET['size'] : 7);
        if (!isset($_GET['result'])) {
            header("Location: ../system/categories/process?page={$pageNumber}&size={$pageSize}");
        } else if ($_GET['result'] == 'success'){
            echo "<h5>Found: ".$_SESSION['numberOfResults'] . " records</h5>";
        } else {
            echo "None records have been found";
        }
    ?>
    <div class="d-flex justify-content-between">
        <form method='GET' action='categories/process' class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" name='searchKey' value='<?php echo $_SESSION['searchKey']?>' placeholder="Search" aria-label="Search">
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
            <?php
                for($i = 0; $i < $pageSize; $i++) {
                    if (isset($_SESSION['c'.$i])) {
                        echo <<<OUTPUT
                        <form method="POST", action="categories/process">
                        <input type=hidden name="searchKey" value={$_SESSION['searchKey']}>
                        <input type=hidden name="id" value={$_SESSION['c'.$i]['category_id']}>
                        <tr>
                            <td>{$_SESSION['c'.$i]['category_id']}</td>
                            <td>{$_SESSION['c'.$i]['category_name']}</td>
                            <td>
                                <ul class="list-button d-flex">
                                    <li class="btn-custom"><button type="submit" class="btn btn-primary">Read</button></li>
                                    <li class="btn-custom"><button type="button" class="btn btn-warning">Edit</button></li>
                                    <li class="btn-custom"><button name='action' value='Delete' type="submit" class="btn btn-danger">Delete</button></li>
                                </ul>
                            </td>
                        </tr>
                        </form>
                        OUTPUT;
                    } else {
                    break;
                    }
                }
            ?>
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        <form class="form-inline my-2 my-lg-0" method='POST' action='categories/process'>
            <input class="form-control mr-sm-2" type="search" name='page' placeholder="Type page number" aria-label="Search">
            <button class="btn form__btn--primary" type="submit">Go</button>
        </form>
    </div>
    <?php 
        paging_module($pageNumber, $pageSize, $_SESSION['numberOfResults'], 'categories/process');
    ?>

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