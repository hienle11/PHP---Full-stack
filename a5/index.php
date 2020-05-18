<?php
include "./includes/header.inc.php";
include "./includes/footer.inc.php";
session_start();
$userName = $_SESSION['user_name'];
top_module("Amazorn", true, $userName);

?>

<main>

</main>

<?php
end_module();
?>