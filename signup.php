<?php 
session_start();
if (!isset($_SESSION['login']) or $_SESSION['login'] != true) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign up | Web Design Company</title>
    <meta name="description"
        content="New Delhi based digital marketing agency pushing boundaries in the creative field of web development and help in growing brands to the next level." />

    <meta name="keywords"
        content="wamp signup, signup wamp, signup wamp infotech, wamp infotech signup, wamp create account, digital marketing agency, web development company" />

    <meta itemprop="url" content="https://www.wampinfotech.com/signup" />
    <meta property="og:url" content="https://www.wampinfotech.com/signup" />
    <meta itemprop="headline" content="Sign up | Web Design Company" />
    <meta property="og:title" content="Sign up | Web Design Company" />
    <meta property="og:description"
        content="New Delhi based digital marketing agency pushing boundaries in the creative field of web development and help in growing brands to the next level." />
    <meta name="twitter:site" content="https://www.wampinfotech.com/signup">
    <meta name="twitter:card" content="https://www.wampinfotech.com/images/banner1.jpg">
    <meta name="twitter:title" content="Sign up | Web Design Company">
    <meta name="twitter:description"
        content="New Delhi based digital marketing agency pushing boundaries in the creative field of web development and help in growing brands to the next level.">


    <?php include "includes/head.inc.php"; ?>
    <link rel="stylesheet" href="css/signin.css" />
</head>

<body>
    <?php include "layouts/nav.inc.html"; ?>
    <div class="scrollable grey lighten-3">
        <section class="back">
            <section class="panel" id="signup">
                <div class="progress-holder hide" id="progress">
                    <div class="progress">
                        <div class="indeterminate bg-primary"></div>
                    </div>
                </div>
                <div class="prevent-overlay hide full border-radius-8"></div>
                <div class="card-panel">
                    <h5 class="mb-4 fw-500">Create your WAMP Account</h5>
                    <form action="">
                        <div class="input-field"><input type="text" class="validate" name="name" id="s_name" required>
                            <label for="s_name">
                                Name
                            </label>
                        </div>
                        <div class="input-field"><input type="email" class="validate" name="email" id="s_email"
                                required>
                            <label for="s_email">
                                Email
                            </label>
                        </div>
                        <div class="input-field"><input type="tel" class="validate" name="number" id="s_number" required
                                minlength="10" maxlength="12">
                            <label for="s_number">
                                Number
                            </label>
                        </div>
                        <div class="input-field"><input type="password" class="validate" name="password" id="s_password"
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                                required>
                            <label for="s_password">
                                Password
                            </label>
                            <button type="button" onclick="passVisibility(this, '#s_password')"
                                class="transparent btn-flat circle btn-floating tooltipped right waves-effect waves-circle waves-dark"
                                data-tooltip="Show Password">
                                <i class="material-icons grey-text text-darken-3"
                                    style="vertical-align: middle">visibility_off</i></button>
                            <div class="helper-text">Must contain at least one number, one uppercase and lowercase
                                letter, and at least 8</div>
                        </div>
                        <div class="input-field"><input type="password" class="validate" name="r_password"
                                id="s_rpassword" minlength="6" required>
                            <label for="s_rpassword">
                                Re-Type Password
                            </label>
                        </div>
                        <br />
                        <button type="submit" class="btn bg-primary white-text right">Sign up</button>
                    </form>
                    <button onclick="window.location.href='signin'+window.location.search"
                        class="btn text-primary white waves-effect waves-primary btn-flat ml--1">Sign
                        in instead</button>
                    <br clear="both" />
                </div>
            </section>
        </section>
        <?php include "layouts/footer.inc.html"; ?>
    </div>

    <?php include "includes/scripts.inc.php"; ?>
    <script src="ui-scripts/signup.js"></script>
</body>

</html>


<?php } else {
    header("Location: dashboard");
} ?>