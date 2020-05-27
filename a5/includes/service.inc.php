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
            header("Location: ../$table?page={$pageNumber}&size={$pageSize}&result=success");
        } catch (mysqli_sql_exception $exception){
            header("Location: ../$table?page={$pageNumber['page']}&size={$pageSize}&result=fail");
        }
        $results['searchKey'] = $searchKey;
        return $results;
    }

    // this function is to create a new record
    function service_create($table) {
        try {
            repository_save("$table");
            header("Location: ../$table/create?result=success");
        }catch (mysqli_sql_exception $exception) {
            header("Location: ../$table/create?result=fail");
        }
    }

    // this function is to delete a record by id
    function service_deleteById($table, $id) {
        try {
            // delete by id of the record
            repository_deleteById($table, 'category_id', $id);
        } catch (mysqli_sql_exception $exception){
            header("Location: ../${table}/create?result=fail");
        }
    }
?>