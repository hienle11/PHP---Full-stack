<?php
    include "../includes/service.inc.php";
    include "../includes/data-validation.inc.php";
    session_start();

    $pageNumber = (isset($_GET['page']) ? (int)$_GET['page'] : 1); // if param "page" is not set, set it to 1
    $pageSize = (isset($_GET['size']) ? (int)$_GET['size'] : 7); // if param "size" is not set, set it to 7
    $table = 'products';

    if(!isset($_POST['action'])) {      // if there is no post action;
        if (isset($_GET['id'])) {      // check if it is a find by id action
            getProductById($table);
        } else {                       // if not, it is a find or search by page action
            populateProducts($table, $pageNumber, $pageSize);
        }
        
    } else if ($_POST['action'] == 'Delete') { // if it is delete action
        deleteProductById($table, $pageNumber, $pageSize);

    } else { // it is create or update action
        createOrUpdateProduct($table);
    } 

    function getProductById($table) {
        try{
            $_SESSION = service_findById($table, $_GET['id']);
            $_SESSION['update'] = true;
          
            header("Location: ../${table}/update?{$_GET['return']}=success");
        } catch (RuntimeException $exception) {
            header("Location: ../${table}/update?{$_GET['return']}=fail");
        }
    }

    function populateProducts($table, $pageNumber, $pageSize) {
        try {
            $pageNumber = (isset($_POST['page']) ? (int)$_POST['page']: $pageNumber); // get page from navigation "go" button if exists
            $searchKey = (isset($_GET['searchKey']) ? $_GET['searchKey'] : ""); // get searchKey if exists
            $_SESSION = service_populateData($table, $pageNumber, $pageSize, $searchKey);   
            header("Location: ../$table?page={$pageNumber}&size={$pageSize}&result=success");
        } catch (RuntimeException $exception) {
            header("Location: ../$table?page={$pageNumber['page']}&size={$pageSize}&result=fail");
        }
    }

    function deleteProductById($table, $pageNumber, $pageSize) {
        try {
            service_deleteById($table, $_POST['id']); // delete the record by id
            $_SESSION = service_populateData($table, $pageNumber, $pageSize, $_SESSION['searchKey']); // update data after deleting
            header("Location: ../${table}?result=success&delete=success&page=$pageNumber");
        }catch (RuntimeException $exception) {
            $_SESSION = service_populateData($table, $pageNumber, $pageSize, $_SESSION['searchKey']); // populate the page again in case delete process is failed
            header("Location: ../${table}?result=success&delete=fail&page=$pageNumber");
        }
    }

    function createOrUpdateProduct($table) {
        $action = $_POST['action'];
        unset($_POST['action']);
        $currentImageURI = $_SESSION['image_uri'];
        $_SESSION = $_POST;
        $_SESSION['id'] = isset($_POST['product_id']) ? $_POST['product_id'] : -1;
        $_SESSION['update'] = ($action == 'Update') ? true: false;

        $error = validate_productName($_POST['product_name']); // validate the category name
        if ($error == "") {               // if the form is valid, proceed
            try {
                $_POST['image_uri'] = uploadImage(); // get the image uri
                if ($_POST['image_uri'] == 0) {      // if there is no image uploaded
                    $_POST['image_uri'] = $currentImageURI; // used the current image on update action
                } else if ($_POST['image_uri'] < 0){        // if the uploaded image is not valid
                    $_SESSION['image_uri'] = $currentImageURI; // used the current image on update action
                    $_SESSION['id'] = -1;
                    header("Location: ../$table/$action?process=fail"); // redirect with fail message
                    exit();
                }
                if ($_POST['image_uri'] == "") {
                    unset($_POST['image_uri']);     // if the user is not provide image on update, unset image_uri to make it null 
                    $_SESSION['default.png'];       // display default URL 
                }  else {
                    $_SESSION['image_uri'] = $_POST['image_uri']; // display updated URL
                }

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

    
    function uploadImage() {

        if(isset($_FILES['image'])) {

            $file = $_FILES['image']; // get the image uploaded
            $fileExt = explode('.', $file['name']); // get the file extension
            $fileExt = strtolower(end($fileExt));  // convert it to lowercase
            $allowed = array('jpg', 'jpeg', 'png'); // list contains valid file extensions
            if ($fileExt != null) {
                if (in_array($fileExt, $allowed)) {
                    if ($file['error'] === 0 ) {
                        if ($file['size'] < 1000000) {
                            $file['id'] = uniqid('', true) . "." . $fileExt;
                            $savedFile = '../images/' . $file['id'];
                            move_uploaded_file($file['tmp_name'], $savedFile);
                            return $file['id'];    
                        } else {
                            return -4;
                        }
                    } else {
                        return -3;
                    }
                
                } else {
                    return -2;
                }

            } else {
                return 0;
            }
            
        } else {
            return -1;
        }
    }
 ?>
