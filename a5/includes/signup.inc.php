<?php
// Check if the user click the submit button
if (isset($_POST['submit'])) {
    # Import the database script to use the database connection object
    require "db.inc.php";

    # Get the data from the POST request
    $userName = $_POST["user_name"];
    $userEmail = $_POST["user_email"];
    $userPassword = $_POST["user_password"];

    # Validate the data sent by the form
    if (empty($userName)) {
        // If user name is empty
        header("Location: ../signup.php?error=emptyname&name=" . $userName . "&email=" . $userEmail);
        exit;
    } elseif(empty($userEmail)) {
        // If user email is empty
        header("Location: ../signup.php?error=emptyemail&name=" . $userName . "&email=" . $userEmail);
        exit;
    } elseif(empty($userPassword)) {
        // If password is empty
        header("Location: ../signup.php?error=emptypassword&name=" . $userName . "&email=" . $userEmail);
        exit;
    } elseif (!preg_match("/^[a-zA-Z ]+[0-9]*$/", $userName)) {
        // Name should start with alphabets
        header("Location: ../signup.php?error=invalidusername&email=" . $userEmail);
        exit;
    } elseif (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
        // If the email is not in the right format
        header("Location: ../signup.php?error=invalidemail&name=" . $userName);
        exit;
    } elseif (strlen($userPassword) < 6) {
        // If password length is less than 6
        header("Location: ../signup.php?error=invalidpassword&name=" . $userName . "&email=" . $userEmail);
        exit;
    } else {
        # Create template
        $sql = "SELECT user_email FROM users WHERE user_email = ?";
        # Create prepared statement
        $stmt = mysqli_stmt_init($conn);
        // $stmt2 = mysqli_stmt_init($conn);
        # Check if preparing a SQL statement is success
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            # If not, redirect to the sign up page
            header("Location: ../signup.php?error=sqlerror");
            exit;
        } else {
            // Bind the statement
            mysqli_stmt_bind_param($stmt, "s", $userEmail);
            
            // Execute the prepared statement
            mysqli_stmt_execute($stmt);
            
            // Transfers all the rows of the result set into PHP memory
            mysqli_stmt_store_result($stmt);
            
            // Fetch the total number of rows (entities) returned in the last query
            $rows = mysqli_stmt_num_rows($stmt);
            
            # Check if the username has been used 
            if ($rows > 0) {
                # If yes, redirect to the sign up page
                header("Location: ../signup.php?error=emailtaken&name=" . $userName);
                exit;
            } else {
                
                # If not, insert the new user to database
                # Create template
                $sql = "INSERT INTO users (user_name, user_email, user_password) VALUES (?, ?, ?);";
                # Create prepared statement
                $stmt = mysqli_stmt_init($conn);
                # Check if preparing a SQL statement is success
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    # If not, redirect to the sign up page
                    header("Location: ../signup.php?error=sqlerror");
                    exit;
                } else {
                    $hashed_password = password_hash($userPassword, PASSWORD_BCRYPT);\
                    // Bind the statement
                    mysqli_stmt_bind_param($stmt, "sss", $userName, $userEmail, $hashed_password);
                    // Execute the prepared statement
                    mysqli_stmt_execute($stmt);
                    header("Location: ../index.php?signup=success");
                    exit;
                }
            }
        }
    }
    # Close the prepared statement
    
    // mysqli_stmt_close($stmt);
    // mysqli_stmt_close($stmt2);
    // Close the database connection
    // mysqli_close($conn);
} else {
    header("Location: ../signup.php");
    exit;
}
