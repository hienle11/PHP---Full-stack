<?php
    include "../includes/repository.inc.php";

    // this function is to get all records needed from database
    function service_populateData($table, $pageNumber, $pageSize, $searchKey) {
        $results = array();
        try {
            if(isset($searchKey) && !empty($searchKey)) { // if there is  a searchKey, perform the search
                $results = repository_searchByPage("$table", $searchKey, ($pageNumber - 1) * $pageSize, $pageSize);
            } else {    // if there is no searchKey, find normally
                $results = repository_findByPage("$table", ($pageNumber - 1) * $pageSize, $pageSize);
            }
            foreach ($results as $id => $value) { // making variables names valid by adding a letter in front
                $results['c'. $id] = $value;
            }
        } catch (mysqli_sql_exception $exception){
            throw new RuntimeException();
        }
        $results['searchKey'] = $searchKey;
        return $results;
    }

    // this function is to create a new record
    function service_create($table, $record) {
        try {
            repository_save($table, $record);
        }catch (mysqli_sql_exception $exception) {
            throw new RuntimeException();
        }
    }

    // this function is to update a new record 
    function service_update($table, $record) {
        try {
            repository_update($table, $record);
        }catch (mysqli_sql_exception $exception) {
            throw new RuntimeException();
        }
    }

    // this function is to delete a record by id
    function service_deleteById($table, $id) {
        try {
            // delete by id of the record
            repository_deleteById($table, $id);
        } catch (mysqli_sql_exception $exception){
            throw new RuntimeException();
        }
    }

    // this function is to find a record by id
    function service_findById($table, $id) {
        $result = array();

        try {
            // delete by id of the record
            $result = repository_findById($table, $id);
        } catch (mysqli_sql_exception $exception){
            throw new RuntimeException();
        }

        return $result;
    }
?>