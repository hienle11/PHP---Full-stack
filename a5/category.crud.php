<?php
include "./includes/header.inc.php";
include "./includes/footer.inc.php";
include "./includes/paging.inc.php";
include "./includes/tools.php"; // for debug only
require "./includes/authorization.php";
require "./styles/index.css.php"; //include CSS Style Sheet
require "./styles/signin.css.php"; //include CSS Style Sheet

validateAuthorization();
$pageNumber = (isset($_GET['page']) ? (int) $_GET['page'] : 1);
$pageSize = (isset($_GET['size']) ? (int) $_GET['size'] : 7);
if (!isset($_GET['result'])) {
    header("Location: ../system/categories/process?page={$pageNumber}&size={$pageSize}");
} 
top_module("Amazorn", true);
require "./styles/crud.css.php"; //include CSS Style Sheet
?>



<div class="container-fluid">
    <h1>CATEGORY</h1>
    <div class="d-flex justify-content-between">
        <form method='GET' action='categories/process' class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" name='searchKey' value='<?php echo $_SESSION['crud']['searchKey'] ?>' placeholder="Search" aria-label="Search">
            <button class="btn form__btn--primary" type="submit">Search</button>
        </form>
        <button onclick="location.href='categories/create'" type="button" class="btn btn-success" style="min-width: 10rem;">Create</button>
    </div>

    <?php
    if ($_GET['result'] == 'success') {
        echo "<h5>Found: " . $_SESSION['crud']['numberOfResults'] . " records</h5>";
    } else {
        echo "None records have been found";
    }
    if (isset($_GET['delete'])) {
        echo ($_GET['delete'] == 'success') ? 'Record is deleted successfully!' : 'Fail to delete the selected record! <br> This category might be used by some products';
    }
    ?>

   

    <table class="table table-bordered" style="background-color: #fff; margin-top: 2rem;">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
            </tr>
        </thead>
        <tbody>
            <?php
            for ($i = 0; $i < $pageSize; $i++) {
                if (isset($_SESSION['crud']['c' . $i])) {
                    echo <<<OUTPUT
                        <form method="POST", action="categories/process?page=$pageNumber">
                        <input type=hidden name="searchKey" value={$_SESSION['crud']['searchKey']}>
                        <input type=hidden name="id" value={$_SESSION['crud']['c' .$i]['category_id']}>
                        <tr>
                            <td>{$_SESSION['crud']['c' .$i]['category_id']}</td>
                            <td>{$_SESSION['crud']['c' .$i]['category_name']}</td>
                            <td>
                                <ul class="list-button d-flex">
                                    <li class="btn-custom"><button onclick="location.href='categories/update?id={$_SESSION['crud']['c' .$i]['category_id']}'" type="button" class="btn btn-warning">Edit</button></li>
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

    <div class="d-flex justify-content-between">
        <form class="form-inline my-2 my-lg-0" method='POST' action='categories/process'>
            <input class="form-control mr-sm-2" type="search" name='page' placeholder="Type page number" aria-label="Search">
            <button class="btn form__btn--primary" type="submit">Go</button>
        </form>
        <button onclick="location.href='../system'" class="btn btn-danger ml-1" type="submit">Back</button>
    </div>

    <?php
    paging_module($pageNumber, $pageSize, $_SESSION['crud']['numberOfResults'], 'categories/process?');
    ?>
</div>

<?php
end_module(True); // Enable Footer
?>