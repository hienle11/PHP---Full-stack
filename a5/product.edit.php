<?php
include "./includes/header.inc.php";
include "./includes/footer.inc.php";
include "./includes/tools.php"; // for debug only
require "./includes/authorization.php";
require "./styles/index.css.php"; //include CSS Style Sheet
require "./styles/edit.css.php"; //include CSS Style Sheet
validateAuthorization();
$_SESSION['crud']['update'] = isset($_SESSION['crud']['update']) ? $_SESSION['crud']['update'] : false;



if (isset($_GET['id'])) { // if index is provided, it is an update action
    header("Location: ../products/process?id={$_GET['id']}&return=result"); // get the record user want to update 

} else if (isset($_SESSION['crud']['id']) &&  ($_SESSION['crud']['id'] != -1)  && $_SESSION['crud']['update']) { // retrieve the record with the updated information
    header("Location: ../products/process?id={$_SESSION['crud']['id']}&return=process"); // get the record user after updated

} else if (isset($_GET['result']) &&  isset($_SESSION['crud']['id'])) { // display error message if needed
    if ($_GET['result'] == 'fail') {
        echo "ERROR!<br>";
    }
}
top_module("Amazorn", true);
?>
<main>
    <div class="container-fluid">
        <?php

        // display title "UPDATE PRODUCT" if it is update action, otherwise display "CREATE PRODUCT"
        echo ($_SESSION['crud']['update'] ? "<h1>UPDATE PRODUCT</h1>" : "<h1>CREATE PRODUCT</h1>");
        
        // display messages after record is created or updated
        if (isset($_GET['process'])) {
            if ($_GET['process'] == 'success') {
                echo ($_SESSION['crud']['update'] ? "Product is updated successfully" : "New product is created successfully");
            } else if ($_GET['process'] == 'fail') {
                echo "Process has failed! <br> It could be due to following reasons: <br>";
                echo " *Product name must be unique <br>";
                echo " *Product name can only contain alphabetical letters, white spaces and digits <br>";
                echo " *Price contains real numbers only <br>";
                echo " *Quantity contains integers only <br>";
                echo " *All fields must be entered";
            }
        }

        ?>
        <table class="table table-bordered" style="background-color: #fff; margin-top: 2rem;">
            <form method="POST" action="../products/process" enctype="multipart/form-data">
                <tbody>
                    <?php
                    if ($_SESSION['crud']['update']) {   // if it is update action, add id field 
                        echo <<<ID_ROW
                            <tr>
                                <th scope="row">Id</th>
                                <td><input type="text" name="product_id" class="form-control" value={$_SESSION['crud']['product_id']} readonly="readonly"></td>
                            </tr>
                        ID_ROW;
                    }
                    ?>

                    <tr>
                        <th scope="row">Name</th>
                        <td><input type="text" name="product_name" class="form-control" placeholder="Product Name" value="<?php echo ($_SESSION['crud']['update'] || isset($_SESSION['crud']['id']) ? $_SESSION['crud']['product_name'] : ""); ?>"></td>
                    </tr>

                    <tr>
                        <th scope="row">Description</th>
                        <td><input type="text" name="descript" class="form-control" placeholder="Product Description" value="<?php echo ($_SESSION['crud']['update'] || isset($_SESSION['crud']['id']) ? $_SESSION['crud']['descript'] : ""); ?>"></td>
                    </tr>

                    <tr>
                        <th scope="row">Price</th>
                        <td><input type="text" name="price" class="form-control" placeholder="Product Price" value="<?php echo ($_SESSION['crud']['update'] || isset($_SESSION['crud']['id']) ? $_SESSION['crud']['price'] : ""); ?>"></td>
                    </tr>

                    <tr>
                        <th scope="row">Quantity</th>
                        <td><input type="text" name="quantity" class="form-control" placeholder="Product Quantity" value="<?php echo ($_SESSION['crud']['update'] || isset($_SESSION['crud']['id']) ? $_SESSION['crud']['quantity'] : ""); ?>"></td>
                    </tr>

                    <tr>
                        <th scope="row">Category Id</th>
                        <td><input type="text" name="category_id" class="form-control" placeholder="Category Id" value="<?php echo ($_SESSION['crud']['update'] || isset($_SESSION['crud']['id']) ? $_SESSION['crud']['category_id'] : ""); ?>"></td>
                    </tr>

                    <tr>
                        <th scope="row">Image</th>
                        <td>
                            <div style="min-height: 252px; max-width: 252px; border: 1px solid black"><img style="height: 250px" alt='Responsive image' src='../../images/<?php echo (($_SESSION['crud']['update'] || isset($_SESSION['crud']['id']) && isset($_SESSION['crud']['image_uri'])) ? $_SESSION['crud']['image_uri'] : "default.png"); ?>'></div>
                            <input style="border: none" type="file" name="image" value='../../images/<?php echo (($_SESSION['crud']['update'] || isset($_SESSION['crud']['id']) && isset($_SESSION['crud']['image_uri'])) ? $_SESSION['crud']['image_uri'] : "default.png"); ?>' class="form-control">
                        </td>
                    </tr>

                    <tr>
                        <th scope="row"></th>

                        <td>
                            <ul class="list-button d-flex">
                                <?php
                                if ($_SESSION['crud']['update']) {   // if it is update action display update button
                                    echo <<<UPDATE_BUTTON
                                        <li class="btn-custom"><button type="submit" name="action" value="Update" class="btn btn-warning">Update</button></li>
                                    UPDATE_BUTTON;
                                } else {                    // if not, which means create action, display create button
                                    echo <<<CREATE_BUTTON
                                        <li class="btn-custom"><button type="submit" name="action" value="Create" class="btn btn-success">Create</button></li>
                                    CREATE_BUTTON;
                                }
                                ?>
                                <li onclick="location.href='../products'" class="btn-custom"><button type="button" class="btn btn-danger text-nowrap">Back </button></li>
                            </ul>
                        </td>

                    </tr>
                </tbody>
            </form>
        </table>

    </div>
</main>

<?php
end_module(True); // Enable Footer
?>