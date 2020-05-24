<?php

function top_module($pageTitle, $isNav, $userName = null)
{
    $html = <<<"OUTPUT"
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <title>$pageTitle</title>
</head>
OUTPUT;

    $nav = <<<"OUTPUT"
<body style="background-color: #EAEDED;">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #111 !important;">
        <a class="navbar-brand ml-4 mr-5" href="index.php">Amazorn</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse flex-grow-1 d-flex justify-content-around" id="navbarSupportedContent">
            <form class="form-inline my-2 my-lg-0 ml-5 mr-5" style="width: 60%">
                <div class="input-group" style="width: 100%">
                    <div class="input-group-prepend">
                        <button class="btn  dropdown-toggle" style="background-color: #F8F8F8" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">All Departments</a>
                            <a class="dropdown-item" href="#">Arts & Crafts</a>
                            <a class="dropdown-item" href="#">Automotive</a>
                            <a class="dropdown-item" href="#">Books</a>
                        </div>
                    </div>
                    <input class="form-control " type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn" style="background-color: #F0C14B "  type="button" id="button-addon2">Search</button>
                    </div>
                </div>
                <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
            </form>

            <ul class="navbar-nav flex-grow-1">
                <li class="nav-item ml-5">
OUTPUT;
    if ($userName) {
        $signin = <<<"OUTPUT"
        <div class="dropdown">
            <a class="nav-link" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                $userName
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <a class="dropdown-item" href="setting.php">Account Settings</a>
                <a class="dropdown-item" href="includes/signout.inc.php">Sign Out</a>
            </div>
        
        
        OUTPUT;
    } else {
        $signin = "<a class='nav-link' href='signin.php'>Sign in<span class='sr-only'>(current)</span></a>";
    }

    $rest = <<<"OUTPUT"
                </li>
                <li class="nav-item ml-5">
                    <a class="nav-link" href="#">Cart</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="sub-nav">
        <div class="nav-left">
        </div>
        <div class="nav-right">
        </div>
    </div>
OUTPUT;

    echo $isNav ? ($html . $nav . $signin . $rest) : $html;
}
