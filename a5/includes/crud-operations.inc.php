<?php

    function create($table) {
        require "db.inc.php";
        $queryColumns = "";
        $queryValues = "";
        // get all the fields and corressponding values of those fields
        foreach ($_POST as $column => $value) {
            $queryColumns .= $column . ",";
            $queryValues .= "'" . $value . "',";
        }

        // substr() is used to delete character "," at the end of those two strings;
        $query = "INSERT INTO " . $table . "(" . substr($queryColumns, 0, -1) . ") VALUES (" . substr($queryValues, 0, -1) . ");";
        echo "query = " . $query . "=end <br>";
        mysqli_query($conn, $query);
    }

    function findByPage($table, $offset, $limit) {
        require "db.inc.php";
        $query = "SELECT * FROM " . $table .  " LIMIT $offset, $limit;";
        $result = mysqli_query($conn, $query);

        $countQuery = "SELECT * FROM " . $table .  ";";
        $countResult = mysqli_num_rows(mysqli_query($conn, $countQuery));
        $results = array();
        $results['numberOfResults'] = $countResult;
        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
                array_push($results, $row);
            }
        }
        return $results; 
    }
?>
