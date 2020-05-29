<?php
    function test_input($data) {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function validate_categoryName($categoryName) {
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

    function validate_productName($productName) {
        $err = "";
        if (empty($productName)) {
			$err = '* Name is required';
		} else {
			$name = test_input($productName);
			if (!preg_match("/^[a-zA-z0-9 ]*$/", $name)) {
                $err = "* Name contains only letters and whitespaces";
            }
        }
        return $err;
    }

    function validate_userName($productName) {
        $err = "";
        if (empty($productName)) {
			$err = '* Name is required';
		} else {
			$name = test_input($productName);
			if (!preg_match("/^[a-zA-z0-9 ]*$/", $name)) {
                $err = "* Name contains only letters and whitespaces";
            }
        }
        return $err;
    }
?>
