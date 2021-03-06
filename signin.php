<?php 
session_start();
if (!isset($_SESSION['login']) or $_SESSION['login'] != true) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign in | Web Design Company</title>
    <meta name="description"
        content="New Delhi based digital marketing agency pushing boundaries in the creative field of web development and help in growing brands to the next level." />

    <meta name="keywords"
        content="wamp signin, signin wamp, signin wamp infotech, wamp infotech signin, digital marketing agency, web development company, digital marketing company" />

    <meta itemprop="url" content="https://www.wampinfotech.com/signin" />
    <meta property="og:url" content="https://www.wampinfotech.com/signin" />
    <meta itemprop="headline" content="Sign in | Web Design Company" />
    <meta property="og:title" content="Sign in | Web Design Company" />
    <meta property="og:description"
        content="New Delhi based digital marketing agency pushing boundaries in the creative field of web development and help in growing brands to the next level." />
    <meta name="twitter:site" content="https://www.wampinfotech.com/signin">
    <meta name="twitter:card" content="https://www.wampinfotech.com/images/banner1.jpg">
    <meta name="twitter:title" content="Sign in | Web Design Company">
    <meta name="twitter:description"
        content="New Delhi based digital marketing agency pushing boundaries in the creative field of web development and help in growing brands to the next level.">

    <?php include "includes/head.inc.php"; ?>
    <link rel="stylesheet" href="css/signin.css" />
</head>

<body>
    <?php include "layouts/nav.inc.html"; ?>
    <div class="scrollable grey lighten-3">
        <section class="back">
            <section class="panel" id="panel-holder">
                <div class="progress-holder hide" id="progress">
                    <div class="progress">
                        <div class="indeterminate bg-primary"></div>
                    </div>
                </div>
                <div class="prevent-overlay hide full border-radius-8"></div>
                <div class="card-panel" id="signin">
                    <h4 class="center-align fw-600">Sign in</h4>
                    <hr class="short-border" />
                    <br />
                    <form>
                        <div class="input-field"><input type="text" class="validate" id="l_email" name="email" required>
                            <label for="l_email">
                                Email or Username
                            </label>
                        </div>
                        <div class="input-field">
                            <input type="password" class="validate" id="l_password" name="password" required>
                            <label for="l_password">
                                Password
                            </label>
                            <button type="button" onclick="passVisibility(this, '#l_password')"
                                class="transparent btn-flat circle btn-floating tooltipped right waves-effect waves-circle waves-dark"
                                data-tooltip="Show Password">
                                <i class="material-icons grey-text text-darken-3"
                                    style="vertical-align: middle">visibility_off</i></button>
                        </div>
                        <label>
                            <input type="checkbox" name="remember_me" />
                            <span>Remember me</span>
                        </label>
                        <a href="javascript:togglePanels()" class="align-right right text-primary fw-500">Forgot
                            Password?</a>
                        <br /><br /><br />
                        <button type="submit" class="btn bg-primary waves-effect waves-light white-text right">Sign
                            in</button>
                    </form>
                    <button onclick="window.location.href='signup'+window.location.search"
                        class="btn text-primary btn-flat white waves-effect waves-primary fw-500 ml--1">Create
                        account</button>
                    <br clear="both" />
                </div>
                <div class="card-panel hide" id="forgot-p">
                    <h4 class="center-align fw-600">Account recovery</h4>
                    <hr class="short-border" />
                    <br />
                    <form>
                        <div class="input-field"><input type="email" class="validate" id="fp_email" name="email"
                                required>
                            <label for="fp_email">
                                Email
                            </label>
                        </div>
                        <button type="submit"
                            class="btn bg-primary waves-effect waves-light white-text right">Send</button>

                    </form>
                    <button onclick="togglePanels()"
                        class="btn text-primary btn-flat white waves-effect waves-primary fw-500 ml--1">Sign in
                        instead</button>
                    <br clear="both" />
                </div>
            </section>
        </section>
        <?php include "layouts/footer.inc.html"; ?>
    </div>

    <?php include "includes/scripts.inc.php"; ?>
    <script src="ui-scripts/signin.js"></script>
</body>

</html>


<?php } else {
    header("Location: dashboard");
} ?>