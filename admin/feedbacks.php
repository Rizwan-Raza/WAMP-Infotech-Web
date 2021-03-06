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
        <?php include "includes/sidenav.inc.html";
    include "../includes/functions.inc.php"; ?>

        <div class="col s12 m9 white m-0 p-0" style="height:100vh;overflow:auto">
            <a class="p-2 pb-0 left" href="javascript:toggleNav()"><i class="material-icons">menu</i></a>
            <div class="px-4">
                <h4 class="my-1">Feedbacks</h4>
            </div>
            <div class="border-top-1 grey-border border-lighten-2 mt-2"></div>
            <div class="grey lighten-3">
                <?php $sql = "SELECT `_fid`, `feed`, `name`, `company`, `feeds`.`time`, `approved`, `feeds`.`disabled` FROM `feeds`, `users` WHERE `users`.`_uid`=`feeds`.`_uid`";
    require "../php/db.php";
    $conn = DB::getConnection();
    date_default_timezone_set("Asia/Kolkata");
    $result = $conn->query($sql); ?>


                <table>
                    <?php if ($result and ($num = $result->num_rows) > 0) {
        ?>
                    <thead>
                        <tr>
                            <th class="pl-4">#</th>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Message</th>
                            <th>Time</th>
                            <th>Approved</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 0; $i <
              $num; $i++) {
            $user = $result->fetch_assoc(); ?>
                        <tr <?=($user['disabled'] ? 'style="opacity: 0.5;background-color: antiquewhite"' : '')?>>
                            <td class="pl-4">
                                <?=$i+1?>
                            </td>
                            <td>
                                <?=$user['name']?>
                            </td>
                            <td>
                                <?=$user['company']?>
                            </td>
                            <td>
                                <?php $count = strlen($user['feed']); ?>
                                <?=substr($user['feed'], 0, 50)?>
                                <?php echo $count > 50 ? '... <a href="javascript:openFeed(\''.$user['name'].'\', \''.addslashes($user['feed']).'\')">Read more</a>' : ''; ?>
                            </td>
                            <td>
                                <span class="tooltipped"
                                    data-tooltip="<?=daysUntilToday(date_create($user['time']))?>"><?=date_format(date_create($user['time']), "M jS, Y \a\\t g:i:s A")?></span>
                            </td>
                            <td>
                                <div class="pos-rel actions" style="top: -10px;">
                                    <?php if (!$user['disabled']) {
                ?>
                                    <div class="pos-abs" style="height:25px;">
                                        <i class="material-icons" style="width: 30px;text-align:center;height:25px;">
                                            <?=($user['approved']) ? 'check' : 'close' ?></i>
                                    </div>
                                    <?php
            } ?>

                                    <div class="pos-abs">
                                        <?php if (!$user['disabled']) {
                ?>
                                        <button
                                            class="transparent btn-flat circle btn-floating tooltipped waves-effect waves-circle waves-dark"
                                            style="margin:-5px -3px;"
                                            onclick="approve(<?=$user['_fid']?>, this, <?=($user['approved'] ? '0' : '1')?>)"
                                            data-tooltip="<?=($user['approved'] ? 'Disapprove' : 'Approve')?>"><i
                                                class="material-icons <?=($user['approved'] ? 'red-text' : 'green-text')?> lh-5">
                                                <?=($user['approved']) ? 'close' : 'check' ?></i></button>
                                        <?php
            } else {
                ?>
                                        <button
                                            class="transparent btn-flat circle btn-floating tooltipped waves-effect waves-circle waves-dark"
                                            style="margin:-5px -3px;" onclick="deleteFeed(<?=$user['_fid']?>, this)"
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
                        <td colspan="5" class="center-align">No feedbacks found</td>
                    </tr>
                    <?php
    } ?>
                </table>
            </div>
        </div>
    </section>

    <!-- Modal Structure -->
    <div id="feedModal" class="modal">
        <div class="modal-content">
            <h4>Modal Header</h4>
            <p>A bunch of text</p>
        </div>
        <div class="modal-footer">
            <button class="modal-close waves-effect waves-red btn-flat">Close</button>
        </div>
    </div>

    <?php include "includes/scripts.inc.php"; ?>
    <script src="admin/js/feedbacks.js"></script>
</body>

</html>

<?php
} else {
        header("Location: /admin/?redirect_to=".$_SERVER['REDIRECT_URL']);
    } ?>