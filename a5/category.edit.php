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
            $_SESSION['crud']['update'] = isset($_SESSION['crud']['update']) ? $_SESSION['crud']['update'] : false;

            // display title "UPDATE CATEGORY" if it is update action, otherwise display "CREATE CATEGORY"
            echo ($_SESSION['crud']['update'] ?"<h1>UPDATE CATEGORY</h1>" : "<h1>CREATE CATEGORY</h1>");

            if (isset($_GET['id'])) { // if index is provided, it is an update action
                header("Location: ../categories/process?id={$_GET['id']}&return=result"); // get the record user want to update 
            
            } else if (isset($_SESSION['crud']['id']) &&  ($_SESSION['crud']['id'] != -1)  && $_SESSION['crud']['update']) { // retrieve the record with the updated information
                header("Location: ../categories/process?id={$_SESSION['crud']['id']}&return=process"); // get the record user after updated
            
            } else if (isset($_GET['result']) &&  isset($_SESSION['crud']['id'])) { // display error message if needed
                if ($_GET['result'] == 'fail') {
                    echo "ERROR!<br>";
                }
            }   

            // display messages after record is created or updated
            if (isset($_GET['process'])) {
                if ($_GET['process'] == 'success') {
                    echo ($_SESSION['crud']['update'] ? "Category is updated successfully" :"New category is created successfully");
                } else if ($_GET['process'] == 'fail') {
                    echo "Process has failed! <br> It could be due to following reasons: <br>";
                    echo " *Category name must be unique <br>";
                    echo " *Category name can only contain alphabetical letters, white spaces and digits ";
                }
            }

        ?>
        <table class="table table-bordered" style="background-color: #fff; margin-top: 2rem;">
            <form method="POST", action="../categories/process">
            <tbody>
                <?php 
                    if ($_SESSION['crud']['update']) {   // if it is update action, add id field 
                        echo <<<ID_ROW
                            <tr>
                                <th scope="row">Id</th>
                                <td><input type="text" name="category_id" class="form-control" value={$_SESSION['crud']['category_id']} readonly="readonly"></td>
                            </tr>
                        ID_ROW;
                    }
                ?>
                
                <tr>
                    <th scope="row">Name</th>                                                  
                    <td><input type="text" name="category_name" class="form-control" placeholder="Category Name"
                    value = "<?php echo ($_SESSION['crud']['update'] || isset($_SESSION['crud']['id'])? $_SESSION['crud']['category_name']: "");?>"></td>
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
                            <li onclick="location.href='../categories'" class="btn-custom"><button type="button" class="btn btn-danger text-nowrap">Back  </button></li>
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