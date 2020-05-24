<?php
session_start();
// helper function to print dât and shape-structure of data
function preShow($arr, $returnAsString = false)
{
    $ret  = '<pre>' . print_r($arr, true) . '</pre>';

    if ($returnAsString)

        return $ret;

    else

        echo $ret;
}
// helper function to print the current's file source code
function printMyCode()
{

    $lines = file($_SERVER['SCRIPT_FILENAME']);

    echo "<pre class='mycode'><ol>";

    foreach ($lines as $line)

        echo '<li>' . rtrim(htmlentities($line)) . '</li>';

    echo '</ol></pre>';
}

// helper function to convert multiple dimensional array to javascript ojbect
function php2js($arr, $arrName)
{

    $lineEnd = "";

    echo "<script>\n";

    echo "/* Generated with A4's php2js() function */";

    echo "  var $arrName = " . json_encode($arr, JSON_PRETTY_PRINT);

    echo "</script>\n\n";
}

// this function to handle reset button in a form
if (isset($_POST['session-reset'])) {

    foreach ($_SESSION as $something => &$whatever) {

        unset($whatever);
    }
}
