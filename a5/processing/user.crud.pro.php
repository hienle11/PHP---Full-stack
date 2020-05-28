<?php
    include "../includes/service.inc.php";
    include "../includes/service.admin.inc.php";
    include "../includes/data-validation.inc.php";

    session_start();

    $pageNumber = (isset($_GET['page']) ? (int)$_GET['page'] : 1); // if param "page" is not set, set it to 1
    $pageSize = (isset($_GET['size']) ? (int)$_GET['size'] : 7); // if param "size" is not set, set it to 7
    $table = 'users';

    //////////////////////////////////////////////////////////
    ////////// This part is to determine the action //////////
    //////////////////////////////////////////////////////////

    if(!isset($_POST['action'])) {      // if there is no post action;
        if (isset($_GET['id'])) {      // check if it is a find by id action
            getUserById($table);
        } else {                       // if not, it is a find or search by page action
            populateUsers($table, $pageNumber, $pageSize);
        }
        
    } else if ($_POST['action'] == 'Delete') { // if it is delete action
        deleteUserById($table, $pageNumber, $pageSize);

    } else if ($_POST['action'] == 'Set_Admin') { // if it is a set admin action
        setAdmin($table, $pageNumber, $pageSize);

    } else if ($_POST['action'] == 'Unset_Admin') { // if it is an unset admin action
        unsetAdmin($table, $pageNumber, $pageSize);

    } else { // it is create or update action
        createOrUpdateUser($table);
    } 

    //////////////////////////////////////////////////////////
    //////// functions to perform the CRUD operations ////////
    //////////////////////////////////////////////////////////
    function getUserById($table) {
        try{
            $_SESSION = service_findById($table, $_GET['id']);
            $_SESSION['update'] = true;
          
            header("Location: ../${table}/update?{$_GET['return']}=success");
        } catch (RuntimeException $exception) {
            header("Location: ../${table}/update?{$_GET['return']}=fail");
        }
    }

    function populateUsers($table, $pageNumber, $pageSize) {
        try {
            $pageNumber = (isset($_POST['page']) ? (int)$_POST['page']: $pageNumber); // get page from navigation "go" button if exists
            $searchKey = (isset($_GET['searchKey']) ? $_GET['searchKey'] : ""); // get searchKey if exists
            $_SESSION = service_populateData($table, $pageNumber, $pageSize, $searchKey);   
            header("Location: ../$table?page={$pageNumber}&size={$pageSize}&result=success");
        } catch (RuntimeException $exception) {
            header("Location: ../$table?page={$pageNumber['page']}&size={$pageSize}&result=fail");
        }
    }

    function deleteUserById($table, $pageNumber, $pageSize) {
        try {
            service_deleteById($table, $_POST['id']); // delete the record by id
            $_SESSION = service_populateData($table, $pageNumber, $pageSize, $_SESSION['searchKey']); // update data after deleting
            header("Location: ../${table}?result=success&delete=success&page=$pageNumber");
        }catch (RuntimeException $exception) {
            $_SESSION = service_populateData($table, $pageNumber, $pageSize, $_SESSION['searchKey']); // populate the page again in case delete process is failed
            header("Location: ../${table}?result=success&delete=fail&page=$pageNumber");
        }
    }

    function createOrUpdateUser($table) {
        $action = $_POST['action'];
        unset($_POST['action']);

        $_SESSION = $_POST;
        $_SESSION['id'] = isset($_POST['user_id']) ? $_POST['user_id'] : -1;
        $_SESSION['update'] = ($action == 'Update') ? true: false;

        $error = validate_userName($_POST['user_name']); // validate the user name
        if ($error == "") {               // if the form is valid, proceed
            try {
                ($action == 'Create') ? service_create($table, $_POST) : service_update($table, $_POST);
                header("Location: ../$table/$action?process=success");
            } catch(RuntimeException $exception) {
                $_SESSION['id'] = -1;
                header("Location: ../$table/$action?process=fail");
            }          
        } else {    // if the form is not valid output error;
            $_SESSION['id'] = -1;
            header("Location: ../$table/$action?process=fail");
        }
    }

    function setAdmin($table, $pageNumber, $pageSize) {
        try {
            service_admin_setAdmin($_POST['id']);  // set the user to admin
            $_SESSION = service_populateData($table, $pageNumber, $pageSize, $_SESSION['searchKey']); // update data after the process
            header("Location: ../${table}?result=success&page=$pageNumber");
        }catch (RuntimeException $exception) {
            $_SESSION = service_populateData($table, $pageNumber, $pageSize, $_SESSION['searchKey']); // populate the page again in case the process is failed
            header("Location: ../${table}?result=success&page=$pageNumber");
        }    
    }

    function unsetAdmin($table, $pageNumber, $pageSize) {
        try {
            service_admin_unsetAdmin($_POST['id']);  // set the user to admin
            $_SESSION = service_populateData($table, $pageNumber, $pageSize, $_SESSION['searchKey']); // update data after the process
            header("Location: ../${table}?result=success&page=$pageNumber");
        }catch (RuntimeException $exception) {
            $_SESSION = service_populateData($table, $pageNumber, $pageSize, $_SESSION['searchKey']); // populate the page again in case the process is failed
            header("Location: ../${table}?result=success&page=$pageNumber");
        }    
    }
 ?>
