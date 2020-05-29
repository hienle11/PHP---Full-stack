<?php
include "./includes/header.inc.php";
include "./includes/footer.inc.php";
include "./includes/paging.inc.php";
include "./includes/service.admin.inc.php";
include "./includes/tools.php"; // for debug only
require "./styles/index.css.php"; //include CSS Style Sheet
require "./styles/signin.css.php"; //include CSS Style Sheet
require "./styles/crud.css.php"; //include CSS Style Sheet
session_start();
top_module("Amazorn", true);
?>



<div class="container-fluid">
    <h1>USER</h1>
    <?php
        $pageNumber = (isset($_GET['page']) ? (int)$_GET['page'] : 1);
        $pageSize = (isset($_GET['size']) ? (int)$_GET['size'] : 7);
        if (!isset($_GET['result'])) {
            header("Location: ../system/users/process?page={$pageNumber}&size={$pageSize}");
        } else if ($_GET['result'] == 'success'){
            echo "<h5>Found: ".$_SESSION['numberOfResults'] . " records</h5>";
        } else {
            echo "None records have been found";
        }
    ?>
    <div class="d-flex justify-content-between">
        <form method='GET' action='users/process' class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" name='searchKey' value='<?php echo $_SESSION['searchKey']?>' placeholder="Search" aria-label="Search">
            <button class="btn form__btn--primary" type="submit">Search</button>
        </form>
        <button onclick="location.href='users/create'" type="button" class="btn btn-success" style="min-width: 10rem;">Create</button>
    </div>

    
    <?php 
        if (isset($_GET['delete'])) {
            echo ($_GET['delete'] == 'success') ? 'Record is deleted successfully!' : 'Fail to delete the selected record! <br> *An admin cannot be deleted';
        }
    ?>

    <table class="table table-bordered" style="background-color: #fff; margin-top: 2rem;">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
            </tr>
        </thead>
        <tbody>
            <?php
                for($i = 0; $i < $pageSize; $i++) {
                    if (isset($_SESSION['c'.$i])) {

                        // process the toggle role button
                        $role = service_admin_isAdmin($_SESSION['c'.$i]['user_id']) ? 'Admin' : 'Anonymous' ;
                        $toggleRoleButton = ($role == 'Admin') ? 
                        "<li class='btn-custom'><button name='action' value='Unset_Admin' type='submit' class='btn btn-primary'>Unset Admin</button></li>" : 
                        "<li class='btn-custom'><button name='action' value='Set_Admin' type='submit' class='btn btn-success'>Set Admin</button></li>";
                        
                        echo <<<OUTPUT
                        <form method="POST", action="users/process?page=$pageNumber">
                        <input type=hidden name="searchKey" value={$_SESSION['searchKey']}>
                        <input type=hidden name="id" value={$_SESSION['c'.$i]['user_id']}>
                        <tr>
                            <td>{$_SESSION['c'.$i]['user_id']}</td>
                            <td>{$_SESSION['c'.$i]['user_name']}</td>
                            <td>{$_SESSION['c'.$i]['user_email']}</td>
                            <td>$role </td>
                            <td>
                                <ul class="list-button d-flex">
                                    $toggleRoleButton
                                    <li class="btn-custom"><button onclick="location.href='users/update?id={$_SESSION['c'.$i]['user_id']}'" type="button" class="btn btn-warning">Edit User</button></li>
                                    <li class="btn-custom"><button name='action' value='Delete' type="submit" class="btn btn-danger">Delete User</button></li>
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
        <form class="form-inline my-2 my-lg-0" method='POST' action='users/process'>
            <input class="form-control mr-sm-2" type="search" name='page' placeholder="Type page number" aria-label="Search">
            <button class="btn form__btn--primary" type="submit">Go</button>
        </form>
        <button onclick="location.href='../system'" class="btn btn-danger ml-1" type="submit">Back</button>
    </div>
    <?php 
        paging_module($pageNumber, $pageSize, $_SESSION['numberOfResults'], 'users/process');
    ?>

</div>

<?php
end_module(True); // Enable Footer
?>