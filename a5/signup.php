<?php
require "./includes/header.inc.php";
require "./includes/footer.inc.php";
require "./styles/signup.css.php"; //include CSS Style Sheet

top_module("Amazorn Sign-up", false);

$error = $_GET['error'];
$userName = $_GET['name'];
$userEmail = $_GET['email'];
?>

<main>
    <section id="signup-section">
        <h2>Amazorn</h2>
        <div class="form-container">
            <h3>Create account</h3>
            <form method="POST" action="includes/signup.inc.php" ">
                
                <div class=" form-group">
                <label for="inputName" class="small"><b>Your name</b></label>
                <input type="text" class="form-control <?php in_array($error, ["invalidname", "emptyname"]) ? print("is-invalid") : "" ?>" 
                id="inputName" name="user_name" value="<?php echo $userName; ?>" placeholder=" name cannot begin with a number">
                <span class="small" style="color: red;">
                    <?php if ($error == "invalidname") {
                        print("Name cannot begin with a number");
                    } elseif ($error == "emptyname") {
                        print("Enter your name");
                    } 
                    ?>
                </span>
        </div>
        <div class="form-group">
            <label for="inputEmail" class="small"><b>Email</b></label>
            <input type="email" class="form-control <?php in_array($error, ["emailtaken", "invalidemail", "emptyemail"]) ? print("is-invalid") : "" ?>" id="inputEmail" name="user_email" value="<?php echo $userEmail; ?>">
            <span class="small" style="color: red;">
                <?php if ($error == "invalidemail") {
                    print("Invalid email");
                } elseif ($error == "emptyemail") {
                    print("Enter your email");
                } elseif ($error == "emailtaken") {
                    print("Email has been used");
                }
                ?>
            </span>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="small"><b>Password</b></label>
            <input type="password" class="form-control <?php in_array($error, ["invalidpassword", "emptypassword"]) ? print("is-invalid") : "" ?>" id="inputPassword" name="user_password" placeholder="At least 6 characters">
            <span class="small" style="color: red;">
                <?php if ($error == "invalidpassword") {
                    print("At least 6 characters");
                } elseif ($error == "emptypassword") {
                    print("Enter your password");
                }
                ?>
            </span>
        </div>
        <button type="submit" class="btn form__btn--primary btn-block" name="submit">Create your Amazorn account</button>
        </form>
        <hr>
        <p>Already have an account? <span><a href="signin.php">Sign-In</a></span></p>
        </div>
    </section>
</main>

<?php
end_module();
?>