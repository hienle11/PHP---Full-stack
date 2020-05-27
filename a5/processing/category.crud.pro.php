<?php
    include "../includes/crud-operations.inc.php";
    include "../includes/data-validation.inc.php";
    session_start();

    if(!isset($_POST['action'])) {
        $_SESSION = findByPage("categories", 0, 5);
        foreach ($_SESSION as $id => $value) {
            $_SESSION['c'. $id] = $value;
        }
        header("Location: ../categories?result=success");
    } else if ($_POST['action'] == 'Create') {                                  // if action is "create", create a new category

        $error = validate_categoryName(); // validate the category name
        unset($_POST['action']);
        if ($error == "") {               // if the form is valid, proceed
            try {
                create("categories");
                header("Location: ../categories/create?result=success");
            }catch (mysqli_sql_exception $exception) {
                header("Location: ../categories/create?result=fail");
            }
        } else {                        // if the form is not valid output error;
            echo $error;
        }
    }
?>
<form method='GET' action="test">
    <button type="submit" class="btn btn-success" style="min-width: 10rem;">Create</button>
</form>
