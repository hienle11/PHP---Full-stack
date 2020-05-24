<?php

echo "<pre>" . print_r($_POST, true) . "</pre>";

// Check if the user click the submit button
if (isset($_POST['submit'])) {
    # Import the database script to use the database connection object
    require "db.inc.php";

    # Get the data from the POST request
    $userEmail = $_POST["user_email"];
    $userPassword = $_POST["user_password"];

    # Validate the data sent by the form
    if (empty($userEmail)) {
        // If user email is empty
        header("Location: ../signin.php?error=emptyemail&email=" . $userEmail);
        exit;
    } elseif (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
        // If the email is not in the right format
        header("Location: ../signin.php?error=invalidemail");
        exit;
    } elseif (empty($userPassword)) {
        // If password is empty
        header("Location: ../signin.php?error=emptypassword&email=" . $userEmail);
        exit;
    } else {
        # Create template
        $sql = "SELECT * FROM users WHERE user_email = ?";
        # Create prepared statement
        $stmt = mysqli_stmt_init($conn);
        // $stmt2 = mysqli_stmt_init($conn);
        # Check if preparing a SQL statement is success
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            # If not, redirect to the sign up page
            header("Location: ../signin.php?error=sqlerror");
            exit;
        } else {
            // Bind the statement
            mysqli_stmt_bind_param($stmt, "s", $userEmail);

            // Execute the prepared statement
            mysqli_stmt_execute($stmt);

            // Get result from the query
            $result = mysqli_stmt_get_result($stmt);

            // Get the first row
            if ($row = mysqli_fetch_assoc($result)) {
                // Check password
                $passwordCheck = password_verify($userPassword, $row['user_password']);
                if ($passwordCheck) {
                    session_start();
                    // Store the user information to the current session
                    $_SESSION['user_email'] = $userEmail;
                    $_SESSION['user_name'] = $row['user_name'];

                    // Check authorization (is admin or not)
                    # Create template
                    $sql = "SELECT * FROM Admins WHERE user_id = ?";
                    # Create prepared statement
                    $stmt = mysqli_stmt_init($conn);

                    if (mysqli_stmt_prepare($stmt, $sql)) {
                        // Bind the statement
                        mysqli_stmt_bind_param($stmt, "i", $row['user_id']);

                        // Execute the prepared statement
                        mysqli_stmt_execute($stmt);

                        // Get result from the query
                        $result = mysqli_stmt_get_result($stmt);

                        $row = mysqli_fetch_assoc($result);

                        $_SESSION['is_admin'] = $row['user_id'];
                    }

                    header("Location: ../index.php?signin=success");
                    exit;
                } else {
                    header("Location: ../signin.php?error=wrongpassword&email=" . $userEmail);
                    exit;
                }
            } else {
                header("Location: ../signin.php?error=nouser");
                exit;
            }
        }
    }
    // Close the prepared statement
    // mysqli_stmt_close($stmt);
    // mysqli_stmt_close($stmt2);
    // Close the database connection
    // mysqli_close($conn);
} else {
    header("Location: ../signin.php");
    exit;
}
