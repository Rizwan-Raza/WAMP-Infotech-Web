<?php
session_start();
if (!isset($_SESSION['admin']) or $_SESSION['admin'] != true) {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Digital Marketing Company | Web Design Company</title>
        <base href="../" />
        <?php include "includes/head.inc.php"; ?>
        <link rel="stylesheet" href="admin/css/admin.css" />
    </head>

    <body>
        <div class="scrollable grey lighten-3">
            <section class="back">
                <section class="panel border-radius-8" id="a_signin">
                    <div class="progress-holder hide" id="progress">
                        <div class="progress">
                            <div class="indeterminate bg-primary"></div>
                        </div>
                    </div>
                    <div class="prevent-overlay hide full border-radius-8"></div>
                    <div class="card-panel border-radius-8">
                        <h5 class="fw-600">Sign in</h5>
                        <br />
                        <form>
                            <div class="input-field"><input type="text" class="validate" id="a_username" name="username" required>
                                <label for="a_username">
                                    Username
                                </label>
                            </div>
                            <div class="input-field">
                                <input type="password" class="validate" id="a_password" name="password" required>
                                <label for="a_password">
                                    Password
                                </label>
                                <button type="button" onclick="passVisibility(this, '#a_password')" class="transparent btn-flat circle btn-floating tooltipped right waves-effect waves-circle waves-dark" data-tooltip="Show Password" style="margin-top: -45px;">
                                    <i class="material-icons grey-text text-darken-3" style="vertical-align: middle">visibility_off</i></button>
                            </div>
                            <label>
                                <input type="checkbox" name="remember_me" />
                                <span>Remember me</span>
                            </label>
                            <br /><br /><br />
                            <button type="submit" class="btn bg-primary waves-effect waves-light white-text right text-capitalize">Sign
                                in</button>
                        </form>
                        <a href="/" class="btn text-primary btn-flat white waves-effect waves-primary fw-500 ml--1 text-capitalize">View Website</a>
                        <br clear="both" />
                    </div>
                </section>
            </section>
        </div>

        <?php include "includes/scripts.inc.php"; ?>
        <!-- <script src="admin/js/common.js"></script> -->
    </body>

    </html>


<?php } else {
    require "dashpanel.php";
} ?>