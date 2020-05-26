<?php
    include "../includes/crud-operations.inc.php";
    include "../includes/data-validation.inc.php";
    session_start();

    if(!isset($_POST['action'])) {
        $result = findByPage("categories", 0, 2);
        session_unset();
        $_SESSION['0']['category_id'] = $result[0]['category_id'];
        $_SESSION['0']['category_name'] = $result[0]['category_name'];
        $_SESSION['1']['category_id'] = $result[1]['category_id'];
        $_SESSION['1']['category_name'] = $result[1]['category_name'];
        $_SESSION['category_name'] = $result[1]['category_name'];  
        print_r($_SESSION);
        // header("Location: ../categories/test");
        // header("Location: ../category?result=success");
    } else if ($_POST['action'] == 'Create') {                                  // if action is "create", create a new category

        $error = validate_categoryName(); // validate the category name
        unset($_POST['action']);
        if ($error == "") {               // if the form is valid, proceed
            try {
                create("categories");
                header("Location: ../category/create?result=success");
            }catch (mysqli_sql_exception $exception) {
                header("Location: ../category/create?result=fail");
            }
        } else {                        // if the form is not valid output error;
            echo $error;
        }
    }
?>
<form method='GET' action="test">
    <button type="submit" class="btn btn-success" style="min-width: 10rem;">Create</button>
</form>
