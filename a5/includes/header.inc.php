<?php
session_start();

function top_module($pageTitle, $isNav)
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
    <style>
        /* Popup container */
        .popup {
            position: relative;
            display: inline-block;
            cursor: pointer;
        }

        /* The actual popup (appears on top) */
        .popup .popuptext {
            visibility: hidden;
            width: 160px;
            background-color: #111;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 8px 0;
            position: absolute;
            z-index: 1;
            top: 125%;
            left: 50%;
            margin-left: -80px;
        }

        /* Popup arrow */
        .popup .popuptext::after {
            content: "";
            position: absolute;
            bottom: 100%;
            left: 50%;
            margin-right: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: transparent transparent #111 transparent;
        }

        /* Toggle this class when clicking on the popup container (hide and show the popup) */
        .popup .show {
            visibility: visible;
            -webkit-animation: fadeIn 1s;
            animation: fadeIn 1s
        }

        /* Add animation (fade in the popup) */
        @-webkit-keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
    <title>$pageTitle</title>
</head>
OUTPUT;

    $nav = <<<"OUTPUT"
<body>
    <nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #111 !important;">
        <a class="navbar-brand ml-4 mr-5" href="/home">Amazorn</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-around" id="navbarSupportedContent">
            <form action='/category' method='GET' class="form-inline my-2 my-lg-0" style="width: 80%">
                <div class="input-group" style="width: 100%">
                    <div class="input-group-prepend">
                        <button class="btn  dropdown-toggle" style="background-color: #F8F8F8" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filter</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/category?searchKey="">All</a>
                            <a class="dropdown-item" href="/category?searchKey=macbook">MacBook</a>
                            <a class="dropdown-item" href="/category?searchKey=imac">iMac</a>
                            <a class="dropdown-item" href="/category?searchKey=ipad">iPad</a>
                            <a class="dropdown-item" href="/category?searchKey=iphone">iPhone</a>
                        </div>
                    </div>
                    <input class="form-control" name='searchKey' type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn" style="background-color: #F0C14B "  type="submit" id="button-addon2">Search</button>
                    </div>
                </div>
                <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
            </form>

            <ul class="navbar-nav flex-grow-1">
                <li class="nav-item ml-5" >
OUTPUT;
    if (isset($_SESSION['user_name']) && isset($_SESSION['is_admin'])) {
        $signin = <<<"OUTPUT"
        <div class="dropdown">
            <a class="nav-link active" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {$_SESSION['user_name']}
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <a class="dropdown-item" href="/system">Edit System</a>
                <a class="dropdown-item" href="/sign-out">Sign Out</a>
            </div>
        
        
        OUTPUT;
    } elseif (isset($_SESSION['user_name'])) {
        $signin = <<<"OUTPUT"
        <div class="dropdown">
            <a class="nav-link active" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {$_SESSION['user_name']}
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <a class="dropdown-item" href="/sign-out">Sign Out</a>
            </div>
        OUTPUT;
    } else {
        $signin = "<a class='nav-link' href='/sign-in'>Sign in<span class='sr-only'>(current)</span></a>";
    }

    $rest = <<<"OUTPUT"
                </li>
                <li class="nav-item ml-5">
                    <a class="nav-link" href="/cart">Cart</a>
                    <div class="popup">
                        <span class="popuptext" id="myPopup">Product Added</span>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

  
OUTPUT;

    echo $isNav ? ($html . $nav . $signin . $rest) : $html;
}
  