<?php
    require_once "service.admin.inc.php";
    
    function validateAuthorization () {
        if (!(isset($_SESSION['user_name']) && isset($_SESSION['is_admin']))){
            header("Location: home");
        } 
    }
    
?>