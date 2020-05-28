<?php
include "./includes/header.inc.php";
include "./includes/footer.inc.php";
include "./includes/tools.php"; // for debug only
require "./styles/index.css.php"; //include CSS Style Sheet
require "./styles/edit.css.php"; //include CSS Style Sheet
session_start();
top_module("Amazorn", true);
?>
<main>
    <div class="container-fluid">
        <?php
            $_SESSION['update'] = isset($_SESSION['update']) ? $_SESSION['update'] : false;

            // display title "UPDATE PRODUCT" if it is update action, otherwise display "CREATE PRODUCT"
            echo ($_SESSION['update'] ?"<h1>UPDATE PRODUCT</h1>" : "<h1>CREATE PRODUCT</h1>");

            if (isset($_GET['id'])) { // if index is provided, it is an update action
                header("Location: ../products/process?id={$_GET['id']}&return=result"); // get the record user want to update 
            
            } else if (isset($_SESSION['id']) &&  ($_SESSION['id'] != -1)  && $_SESSION['update']) { // retrieve the record with the updated information
                header("Location: ../products/process?id={$_SESSION['id']}&return=process"); // get the record user after updated
            
            } else if (isset($_GET['result']) &&  isset($_SESSION['id'])) { // display error message if needed
                if ($_GET['result'] == 'fail') {
                    echo "ERROR!<br>";
                }
            }   

            // display messages after record is created or updated
            if (isset($_GET['process'])) {
                if ($_GET['process'] == 'success') {
                    echo ($_SESSION['update'] ? "Product is updated successfully" :"New product is created successfully");
                } else if ($_GET['process'] == 'fail') {
                    echo "Process has failed! <br> It could be due to following reasons: <br>";
                    echo " *Product name must be unique <br>";
                    echo " *Product name can only contain alphabetical letters, white spaces and digits ";
                }
            }

        ?>
        <table class="table table-bordered" style="background-color: #fff; margin-top: 2rem;">
            <form method="POST", action="../products/process">
            <tbody>
                <?php 
                    if ($_SESSION['update']) {   // if it is update action, add id field 
                        echo <<<ID_ROW
                            <tr>
                                <th scope="row">Id</th>
                                <td><input type="text" name="product_id" class="form-control" value={$_SESSION['product_id']} readonly="readonly"></td>
                            </tr>
                        ID_ROW;
                    }
                ?>
                
                <tr>
                    <th scope="row">Name</th>                                                  
                    <td><input type="text" name="product_name" class="form-control" placeholder="Product Name"
                    value = "<?php echo ($_SESSION['update'] || isset($_SESSION['id'])? $_SESSION['product_name']: "");?>"></td>
                </tr>
            
                <tr>
                    <th scope="row">Description</th>                                                  
                    <td><input type="text" name="descript" class="form-control" placeholder="Product Description"
                    value = "<?php echo ($_SESSION['update'] || isset($_SESSION['id'])? $_SESSION['descript']: "");?>"></td>
                </tr>

                <tr>
                    <th scope="row">Price</th>                                                  
                    <td><input type="text" name="price" class="form-control" placeholder="Product Price"
                    value = "<?php echo ($_SESSION['update'] || isset($_SESSION['id'])? $_SESSION['price']: "");?>"></td>
                </tr>

                <tr>
                    <th scope="row">Quantity</th>                                                  
                    <td><input type="text" name="quantity" class="form-control" placeholder="Product Quantity"
                    value = "<?php echo ($_SESSION['update'] || isset($_SESSION['id'])? $_SESSION['quantity']: "");?>"></td>
                </tr>

                <tr>
                    <th scope="row">Category Id</th>                                                  
                    <td><input type="text" name="category_id" class="form-control" placeholder="Category Id"
                    value = "<?php echo ($_SESSION['update'] || isset($_SESSION['id'])? $_SESSION['category_id']: "");?>"></td>
                </tr>

                <tr>
                    <th scope="row"></th>

                    <td>
                        <ul class="list-button d-flex">
                            <?php 
                                if ($_SESSION['update']) {   // if it is update action display update button
                                    echo <<<UPDATE_BUTTON
                                        <li class="btn-custom"><button type="submit" name="action" value="Update" class="btn btn-warning">Update</button></li>
                                    UPDATE_BUTTON;
                                } else {                    // if not, which means create action, display create button
                                    echo <<<CREATE_BUTTON
                                        <li class="btn-custom"><button type="submit" name="action" value="Create" class="btn btn-success">Create</button></li>
                                    CREATE_BUTTON;
                                }
                            ?>    
                            <li onclick="location.href='../products'" class="btn-custom"><button type="button" class="btn btn-danger text-nowrap">Back  </button></li>
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