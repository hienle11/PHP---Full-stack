<?php
    include_once "repository.admin.inc.php";

    //this function is to check if a user is admin or not
    function service_admin_isAdmin($user_id) {
        $result = false;
        try {
            $result = repository_admin_isAdmin($user_id);
        }  catch (mysqli_sql_exception $exception) {
            throw new RuntimeException();
        }
        return $result;
    }

    //this function is to set a user to admin
    function service_admin_setAdmin($user_id) {
        try {
            repository_admin_setAdmin($user_id);
        }  catch (mysqli_sql_exception $exception) {
            throw new RuntimeException();
        }
    }

     //this function is to set a user to admin
     function service_admin_unsetAdmin($user_id) {
        try {
            repository_admin_unsetAdmin($user_id);
        }  catch (mysqli_sql_exception $exception) {
            throw new RuntimeException();
        }
    }

?>