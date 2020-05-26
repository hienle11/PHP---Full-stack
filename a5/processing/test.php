<?php 
    include "../includes/tools.php"; // for debug only
    session_start();
    echo "sessionid=". session_id() . "<br>";
    print_r($_SESSION);
?>
