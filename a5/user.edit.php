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

            // display title "UPDATE USER" if it is update action, otherwise display "CREATE USER"
            echo ($_SESSION['crud']['update'] ?"<h1>UPDATE USER</h1>" : "<h1>CREATE USER</h1>");

            if (isset($_GET['id'])) { // if index is provided, it is an update action
                header("Location: ../users/process?id={$_GET['id']}&return=result"); // get the record user want to update 
            
            } else if (isset($_SESSION['crud']['id']) &&  ($_SESSION['crud']['id'] != -1)  && $_SESSION['crud']['update']) { // retrieve the record with the updated information
                header("Location: ../users/process?id={$_SESSION['crud']['id']}&return=process"); // get the record user after updated
            
            } else if (isset($_GET['result']) &&  isset($_SESSION['crud']['id'])) { // display error message if needed
                if ($_GET['result'] == 'fail') {
                    echo "ERROR!<br>";
                }
            }   

            // display messages after record is created or updated
            if (isset($_GET['process'])) {
                if ($_GET['process'] == 'success') {
                    echo ($_SESSION['crud']['update'] ? "User is updated successfully" :"New user is created successfully");
                } else if ($_GET['process'] == 'fail') {
                    echo "Process has failed! <br> It could be due to following reasons: <br>";
                    echo " *User name must be unique <br>";
                    echo " *User name can only contain alphabetical letters, white spaces and digits ";
                }
            }

        ?>
        <table class="table table-bordered" style="background-color: #fff; margin-top: 2rem;">
            <form method="POST", action="../users/process">
            <tbody>
                <?php 
                    if ($_SESSION['crud']['update']) {   // if it is update action, add id field 
                        echo <<<ID_ROW
                            <tr>
                                <th scope="row">Id</th>
                                <td><input type="text" name="user_id" class="form-control" value={$_SESSION['crud']['user_id']} readonly="readonly"></td>
                            </tr>
                        ID_ROW;
                    }
                ?>
                
                <tr>
                    <th scope="row">Name</th>                                                  
                    <td><input type="text" name="user_name" class="form-control" placeholder="User Name"
                    value = "<?php echo ($_SESSION['crud']['update'] || isset($_SESSION['crud']['id'])? $_SESSION['crud']['user_name']: "");?>"></td>
                </tr>

                <tr>
                    <th scope="row">Password</th>                                                  
                    <td><input type="password" name="user_password" class="form-control" placeholder="Password"
                    value = "<?php echo ($_SESSION['crud']['update'] || isset($_SESSION['crud']['id'])? $_SESSION['crud']['user_password']: "");?>"></td>
                </tr>
               
                <tr>
                    <th scope="row">Email</th>                                                  
                    <td><input type="email" name="user_email" class="form-control" placeholder="User Email"
                    value = "<?php echo ($_SESSION['crud']['update'] || isset($_SESSION['crud']['id'])? $_SESSION['crud']['user_email']: "");?>"></td>
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
                            <li onclick="location.href='../users'" class="btn-custom"><button type="button" class="btn btn-danger text-nowrap">Back  </button></li>
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