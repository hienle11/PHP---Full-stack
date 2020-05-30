<?php
include "./includes/header.inc.php";
include "./includes/footer.inc.php";
include "./includes/paging.inc.php";
include "./includes/tools.php"; // for debug only
require "./styles/index.css.php"; //include CSS Style Sheet
require "./styles/signin.css.php"; //include CSS Style Sheet
require "./styles/crud.css.php"; //include CSS Style Sheet
session_start();
$pageNumber = (isset($_GET['page']) ? (int)$_GET['page'] : 1);
$pageSize = (isset($_GET['size']) ? (int)$_GET['size'] : 7);
if (!isset($_GET['result'])) {
    header("Location: ../system/products/process?page={$pageNumber}&size={$pageSize}");
} else if ($_GET['result'] == 'success'){
    echo "<h5>Found: ".$_SESSION['crud']['numberOfResults'] . " records</h5>";
} else {
    echo "None records have been found";
}
top_module("Amazorn", true);
?>



<div class="container-fluid">
    <h1>PRODUCT</h1>
    <div class="d-flex justify-content-between">
        <form method='GET' action='products/process' class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" name='searchKey' value='<?php echo $_SESSION['crud']['searchKey']?>' placeholder="Search" aria-label="Search">
            <button class="btn form__btn--primary" type="submit">Search</button>
        </form>
        <button onclick="location.href='products/create'" type="button" class="btn btn-success" style="min-width: 10rem;">Create</button>
    </div>

    
    <?php 
        if (isset($_GET['delete'])) {
            echo ($_GET['delete'] == 'success') ? 'Record is deleted successfully!' : 'Fail to delete the selected record!';
        }
    ?>

    <table class="table table-bordered" style="background-color: #fff; margin-top: 2rem;">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Category Id</th>
            </tr>
        </thead>
        <tbody>
            <?php
                for($i = 0; $i < $pageSize; $i++) {
                    if (isset($_SESSION['crud']['c'.$i])) {
                        echo <<<OUTPUT
                        <form method="POST", action="products/process?page=$pageNumber">
                        <input type=hidden name="searchKey" value={$_SESSION['crud']['searchKey']}>
                        <input type=hidden name="id" value={$_SESSION['crud']['c'.$i]['product_id']}>
                        <tr>
                            <td>{$_SESSION['crud']['c'.$i]['product_id']}</td>
                            <td>{$_SESSION['crud']['c'.$i]['product_name']}</td>
                            <td>{$_SESSION['crud']['c'.$i]['descript']}</td>
                            <td>{$_SESSION['crud']['c'.$i]['price']}</td>
                            <td>{$_SESSION['crud']['c'.$i]['quantity']}</td>
                            <td>{$_SESSION['crud']['c'.$i]['category_id']}</td>
                            <td>
                                <ul class="list-button d-flex">
                                    <li class="btn-custom"><button onclick="location.href='products/update?id={$_SESSION['crud']['c'.$i]['product_id']}'" type="button" class="btn btn-warning">Edit</button></li>
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
        <form class="form-inline my-2 my-lg-0" method='POST' action='products/process'>
            <input class="form-control mr-sm-2" type="search" name='page' placeholder="Type page number" aria-label="Search">
            <button class="btn form__btn--primary" type="submit">Go</button>
        </form>
        <button onclick="location.href='../system'" class="btn btn-danger ml-1" type="submit">Back</button>
    </div>
    <?php 
        paging_module($pageNumber, $pageSize, $_SESSION['crud']['numberOfResults'], 'products/process?');
    ?>

</div>

<?php
end_module(True); // Enable Footer
?>