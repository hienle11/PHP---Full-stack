<?php


    function repository_admin_isAdmin($user_id) {
        require "db.inc.php";

        //query to check if a user is an admin or not
        $query = "SELECT * FROM admins WHERE user_id = $user_id;"; 
        $result = mysqli_query($conn, $query);

        return mysqli_num_rows($result) > 0;
    }

    function repository_admin_setAdmin($user_id) {
        require "db.inc.php";
        //query to check if a user is an admin or not
        $query = "INSERT INTO admins (user_id) VALUES ($user_id);"; 

        mysqli_query($conn, $query);
    }

    function repository_admin_unsetAdmin($user_id) {
        require "db.inc.php";
        //query to check if a user is an admin or not
        $query = "DELETE FROM admins WHERE user_id = $user_id;"; 

        mysqli_query($conn, $query);
    }

?>
