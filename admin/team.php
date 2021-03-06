<?php if (!isset($_SESSION)) {
    session_start();
} if (isset($_SESSION['admin']) and
$_SESSION['admin'] == true) {
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Digital Marketing Company | Web Design Company</title>
    <base href="../" />
    <?php include "includes/head.inc.php"; ?>
    <link rel="stylesheet" href="admin/css/users.css" />
</head>

<body>
    <!-- Page Layout here -->
    <section class="row m-0 p-0">
        <?php include "includes/sidenav.inc.html" ?>

        <div class="col s12 m9 white m-0 p-0" style="height:100vh;overflow:auto">
            <a class="p-2 pb-0 left" href="javascript:toggleNav()"><i class="material-icons">menu</i></a>
            <div class="px-4">
                <h4 class="my-1">Team <button
                        class="btn-flat btn-floating white waves-effect waves-dark right align-right"
                        onclick="openRequests()"><i class="material-icons black-text">inbox</i></button></h4>
            </div>
            <div class="border-top-1 grey-border border-lighten-2 mt-2"></div>
            <div class="grey lighten-3">
                <table>
                    <thead>
                        <tr>
                            <th class="pl-4">#</th>
                            <th><i class="material-icons">account_circle</i></th>
                            <th>Username</th>
                            <th>R. Leaves</th>
                            <th>Online Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="5">
                                <div class="w-full" style="display: flex;height: 100px;justify-content: center;">
                                    <div class="preloader-wrapper active" style="align-self:center">
                                        <div class="spinner-layer spinner-blue-only"
                                            style="left: 50%;margin-left: -25px;">
                                            <div class="circle-clipper left">
                                                <div class="circle"></div>
                                            </div>
                                            <div class="gap-patch">
                                                <div class="circle"></div>
                                            </div>
                                            <div class="circle-clipper right">
                                                <div class="circle"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="fixed-action-btn">
            <a class="btn-floating btn-large bg-primary waves-effect waves-light modal-trigger" href="#addModal">
                <i class="large material-icons">person_add</i>
            </a>
        </div>

        <div id="requestModal" class="modal border-radius-8">
            <div class="progress-holder hide">
                <div class="progress">
                    <div class="indeterminate bg-primary"></div>
                </div>
            </div>
            <div class="prevent-overlay hide full border-radius-8"></div>
            <div class="modal-content">
                <h4>Member Requests</h4>
                <table>
                    <thead>
                        <tr>
                            <th class="pl-4">#</th>
                            <th>Email</th>
                            <th>Time</th>
                            <th><i class="material-icons">more_horiz</i></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="addModal" class="modal border-radius-8">
            <div class="progress-holder hide">
                <div class="progress">
                    <div class="indeterminate bg-primary"></div>
                </div>
            </div>
            <div class="prevent-overlay hide full border-radius-8"></div>
            <div class="modal-content">
                <h4>Add new member</h4>
                <br />
                <form onsubmit="userAddAction(event)">
                    <div class="input-field w-full">
                        <input id="username" name="username" type="text" class="validate">
                        <label for="username">Username</label>
                    </div>
                    <div class="input-field w-full">
                        <input id="email" name="email" type="email" class="validate">
                        <label for="email">Email</label>
                    </div>
                    <div class="input-field w-full">
                        <input id="password" name="password" type="password" class="validate">
                        <label for="password">Password</label>
                    </div>
                    <div class="input-field w-full">
                        <input id="cpassword" name="cpassword" type="password" class="validate">
                        <label for="cpassword">Confirm Password</label>
                    </div>
                    <button class="btn waves-effect waves-light bg-primary my-4 right align-right">Add</button>
                </form>
            </div>
        </div>

    </section>


    <?php include "includes/scripts.inc.php"; ?>
    <script src="https://www.gstatic.com/firebasejs/5.9.0/firebase.js"></script>
    <script src="admin/js/team.js"></script>
</body>

</html>

<?php
} else {
        header("Location: /admin/?redirect_to=".$_SERVER['REDIRECT_URL']);
    } ?>