<!DOCTYPe html>
<html>
    <head>
    <?php include("tools.php") ?>
    </head>
    <body>
        <?php
            if (empty($_SESSION)) {
                header("Location: index.php");
            } else {
                saveBooking();
                session_unset();
            }
            
            echo "GET: ";
            preShow($_GET);
            echo "POST: ";
            preShow($_POST);  
            echo "SESSION: ";   
            preShow($_SESSION);
            echo "PAGE CODE: ";   
            printMyCode()
        ?>

    </body>
</html>