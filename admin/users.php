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
                <h4 class="my-1">Users</h4>
            </div>
            <div class="border-top-1 grey-border border-lighten-2 mt-2"></div>
            <div class="grey lighten-3">
                <?php $sql = "SELECT * FROM `users`";
    require "../php/db.php";
    $conn =
          DB::getConnection();
    $result = $conn->query($sql); ?>

                <table>
                    <?php if ($result and ($num = $result->num_rows) > 0) {
        ?>
                    <thead>
                        <tr>
                            <th class="pl-4">#</th>
                            <th><i class="material-icons">account_circle</i></th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Number</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 0; $i <
              $num; $i++) {
            $user = $result->fetch_assoc(); ?>
                        <tr <?=($user['disabled'] ? 'style="opacity: 0.5;background-color: antiquewhite"' : '' )?>>
                            <td class="pl-4">
                                <?=$i+1?>
                            </td>
                            <td>
                                <img src="<?=$user['image']?>" alt="<?=$user['name']?>"
                                    class="materialboxed avatar-icon" />
                            </td>
                            <td>
                                <?=$user['name']?>
                            </td>
                            <td>
                                <?=$user['username']?>
                            </td>
                            <td>
                                <?=$user['email']?>
                            </td>
                            <td>
                                <?=$user['number']?>
                            </td>
                            <td>
                                <div class="pos-rel actions" style="top: -10px;">
                                    <?php if (!$user['disabled']) {
                                            ?>
                                    <div class="pos-abs" style="height:25px;">
                                        <i class="material-icons" style="width: 30px;text-align:center;height:25px;">
                                            <?=($user['active']) ? 'check' : 'close' ?></i>
                                    </div>
                                    <?php
                                        } ?>

                                    <div class="pos-abs">
                                        <?php if (!$user['disabled']) {
                                            ?>
                                        <button
                                            class="transparent btn-flat circle btn-floating tooltipped waves-effect waves-circle waves-dark"
                                            style="margin:-5px -3px;"
                                            onclick="activate(<?=$user['_uid']?>, this, <?=($user['active'] ? '0' : '1')?>)"
                                            data-tooltip="<?=($user['active'] ? 'Deactivate' : 'Activate')?>"><i
                                                class="material-icons <?=($user['active'] ? 'red-text' : 'green-text')?> lh-5">
                                                <?=($user['active']) ? 'close' : 'check' ?></i></i></button>
                                        <?php
                                        } else {
                                            ?>
                                        <button
                                            class="transparent btn-flat circle btn-floating tooltipped waves-effect waves-circle waves-dark"
                                            style="margin:-5px -3px;" onclick="deleteUser(<?=$user['_uid']?>, this)"
                                            data-tooltip="Delete Forever"><i class="material-icons red-text lh-5">
                                                delete_forever</i></button>

                                        <?php
                                        } ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    <?php
        } ?>
                    <?php
    } else {
        ?>
                    <tr>
                        <td colspan="5" class="center-align">No users found</td>
                    </tr>
                    <?php
    } ?>
                </table>
            </div>
        </div>
    </section>

    <?php include "includes/scripts.inc.php"; ?>
    <script src="admin/js/users.js"></script>
</body>

</html>

<?php
} else {
        header("Location: /admin/?redirect_to=".$_SERVER['REDIRECT_URL']);
    } ?>