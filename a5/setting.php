<?php
include "./includes/header.inc.php";
include "./includes/footer.inc.php";
include "./includes/paging.inc.php";
include "./includes/tools.php"; // for debug only
require "./styles/index.css.php"; //include CSS Style Sheet
require "./styles/signin.css.php"; //include CSS Style Sheet
require "./styles/crud.css.php"; //include CSS Style Sheet
session_start();
top_module("Amazorn", true);
?>

<div class="container-fluid">
    <h1>SYSTEM EDITOR</h1> 
    <br><button onclick="location.href='system/categories'" type="button" class="btn btn-warning" style="min-width: 10rem;">Edit Categories</button>
    <br><br><button onclick="location.href='system/products'" type="button" class="btn btn-warning" style="min-width: 10rem;">Edit Products</button>
    <br><br><button onclick="location.href='system/users'" type="button" class="btn btn-danger" style="min-width: 10rem;">Edit Users</button>
</div>

<?php
end_module(True); // Enable Footer
?>