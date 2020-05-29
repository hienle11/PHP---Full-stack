<?php
function test_input($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function validate_categoryName($categoryName)
{
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

function validate_productName($productName)
{
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

function validate_userName($productName)
{
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


function validate_cardNumber($cardNumber)
{
    $err = "";
    if (empty($cardNumber)) {
        $err = '* Card Number is required';
    } else {
        $cardNumber = test_input($cardNumber);
        if (strlen($cardNumber) != 16) {
            $err = "* Card number requires 16 digits";
        } elseif (!preg_match("/^[0-9]*$/", $cardNumber)) {
            $err = "* Card number contains only numbers";
        }
    }
    return $err;
}


function validate_cvvNumber($cvvNumber)
{
    $err = "";
    if (empty($cvvNumber)) {
        $err = '* CVV Number is required';
    } else {
        $cvvNumber = test_input($cvvNumber);
        if (strlen($cvvNumber) != 3) {
            $err = "* Card number requires 3 digits";
        } elseif (!preg_match("/^[0-9]*$/", $cvvNumber)) {
            $err = "* Card number contains only numbers";
        }
    }
    return $err;
}

function validate_card_expDate($expDate) {
    $err = "";
    if (empty($expDate)) {
        $err = '* Expiry date is required';
    } else {
        $currentMonth = (int) date("m");
        $currentYear = (int) date("Y");
        $expiryYear = (int) substr($expDate, 0, 4);
        $expiryMonth = (int) substr($expDate, 5, 2);
        if (($currentYear > $expiryYear) || ($currentYear == $expiryYear && $currentMonth == 12)
            || ($currentYear == $expiryYear && $currentMonth >= $expiryMonth)
        ) {
            $err= "* Expiry must be at least one month after";
        }
    }
    return $err;
}
