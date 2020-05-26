<?php
    function test_input($data) {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function isPostRequest() {
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            return true;
        } else {
            return false;
        }
    }

    function validate_categoryName() {
        $categoryName = $_POST['category_name'];
        $err = "";
        if (empty($categoryName)) {
			$err = '* Name is required';
		} else {
			$name = test_input($categoryName);
			if (!preg_match("/^[a-zA-z0-9 ]*$/", $name)) {
                $err = "* Name contains only letters and whitespaces";
            }
        }
        return $err;
    }


?>
