<?php
require "./includes/header.inc.php";
require "./includes/footer.inc.php";
require "./styles/signin.css.php"; //include CSS Style Sheet

top_module("Amazorn Sign-in", false);

$error ="";
$userEmail = "";
if (isset($_GET['error'])) {
    $error = $_GET['error'];
}

if (isset($_GET['email'])) {
    $userEmail = $_GET['email'];
}


?>

<main>
    <section id="signin-section">
        <h2>Amazorn</h2>
        <div class="form-container">
            <h3>Sign-In</h3>
            <form method="POST" action="includes/signin.inc.php">
                <div class="form-group">
                    <label for="inputEmail" class="small"><b>Email</b></label>
                    <input type="email" class="form-control <?php in_array($error, ["nouser", "invalidemail", "emptyemail"]) ? print("isinvalid") : "" ?>" 
                    id="inputEmail" name="user_email" value="<?php echo $userEmail; ?>">
                    <span class="small" style="color: red;">
                        <?php if ($error == "invalidemail") {
                            print("Invalid email");
                        } elseif ($error == "emptyemail") {
                            print("Enter your email");
                        } elseif ($error == "nouser") {
                            print("Email hasn't been registered");
                        }
                        ?>
                    </span>
                </div>

                <div class="form-group">
                    <label for="inputPassword" class="small"><b>Password</b></label>
                    <input type="password" class="form-control <?php in_array($error, ["wrongpassword", "emptypassword"]) ? print("isinvalid") : "" ?>" id="inputPassword" name="user_password">
                    <span class="small" style="color: red;">
                        <?php if ($error == "emptypassword") {
                            print("Enter your password");
                        } elseif ($error == "wrongpassword") {
                            print("Wrong password");
                        }
                        ?>
                    </span>
                </div>
                <button type="submit" class="btn form__btn--primary btn-block" name="submit">Sign-in</button>
            </form>
        </div>
        <div class="divider">
            <h6>New to Amazorn?</h6>
        </div>
        <button type="submit" class="btn btn-sm form__btn--secondary btn-block"><a href="sign-up">Create your Amazorn account?</a></button>
    </section>
</main>

<?php
end_module(); 
?>