<?php
    include "../includes/service.inc.php";
    include "../includes/data-validation.inc.php";
    session_start();

    $pageNumber = (isset($_GET['page']) ? (int)$_GET['page'] : 1); // if param "page" is not set, set it to 1
    $pageSize = (isset($_GET['size']) ? (int)$_GET['size'] : 7); // if param "size" is not set, set it to 7
    $table = 'categories';

    if(!isset($_POST['action'])) {      // if there is no post action;
        $pageNumber = (isset($_POST['page']) ? (int)$_POST['page']: $pageNumber); // get page from navigation "go" button if exists
        $searchKey = (isset($_GET['searchKey']) ? $_GET['searchKey'] : ""); // get searchKey if exists
        $_SESSION = service_populateData($table, $pageNumber, $pageSize, $searchKey);

    } else if ($_POST['action'] == 'Delete') { // if it is delete action
        service_deleteById($table, $_POST['id']); // delete the record by id
        $_SESSION = service_populateData($table, $pageNumber, $pageSize, $_SESSION['searchKey']); // update data after deleting
    
    } else { // it is create or update action
        $action = $_POST['action'];

        unset($_POST['action']);
        $error = validate_categoryName($_POST['category_name']); // validate the category name
        if ($error == "") {               // if the form is valid, proceed
            if ($action == 'Create') {
                service_create($table, $_POST);
            } else {
                service_update($table, $_POST);
                $_SESSION['c'. $_SESSION['index']] = $_POST; // update the new record to corresponding index chosen
            }
        } else {                        // if the form is not valid output error;
            echo $error;
            $action == 'Create' ? header("Location: ../$table/create?result=fail") : header("Location: ../$table/update?result=fail");
        }
    
    } 


 ?>
