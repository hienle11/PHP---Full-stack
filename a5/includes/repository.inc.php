<?php

    function repository_save($table) {
        require "db.inc.php";
        $queryColumns = ""; // variables to store the String containing fields/columns' names
        $queryValues = "";  // variables to store the String containing corresponding values
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

    function repository_findByPage($table, $offset, $limit) {
        require "db.inc.php";
        
        // variables to store the query results;
        $results = array();

        // query to count total number of records
        $query = "SELECT COUNT(*) FROM " . $table .  ";";
        $results['numberOfResults'] = mysqli_fetch_assoc(mysqli_query($conn, $query))['COUNT(*)'];

        // query to get all the records in the table with paging
        $query = "SELECT * FROM " . $table .  " LIMIT $offset, $limit;";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
                array_push($results, $row);
            }
        }
        return $results; 
    }

    function repository_searchByPage($table, $searchKey, $offset, $limit) {
        require "db.inc.php";

        // query to get the table fields/columns names
        $query = "DESCRIBE " . $table; 
        $result = mysqli_query($conn, $query);
        $queryColumns = ""; // variables to store the String containing fields/columns' names
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $queryColumns .= $row['Field'] . ',';
            }
        }

        // query to get the total results
        $query=  "SELECT COUNT(*) FROM " . $table 
        . " WHERE CONCAT(". substr($queryColumns, 0, -1) . ") LIKE '%". $searchKey ."%';";
        $results['numberOfResults'] = mysqli_fetch_assoc(mysqli_query($conn, $query))['COUNT(*)'];


        $query=  "SELECT * FROM " . $table 
        . " WHERE CONCAT(". substr($queryColumns, 0, -1) . ") LIKE '%". $searchKey ."%' LIMIT $offset, $limit;";
        $result = (mysqli_query($conn, $query));

        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
                array_push($results, $row);
            }
        }
        return $results;
    }

    function repository_deleteById($table, $idColumn, $id) {
        require "db.inc.php";

        // query to get the table fields/columns names
        $query = "DELETE FROM " . $table .  " WHERE ". $idColumn. " = " . (int)$id;
        mysqli_query($conn, $query);
    }
?>
