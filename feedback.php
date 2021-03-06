<?php
session_start();
if (isset($_SESSION['login']) and $_SESSION['login'] == true) {
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Digital Marketing Company | Web Design Company</title>
    <?php include "includes/head.inc.php"; ?>
    <link rel="stylesheet" href="css/feedback.css" />
</head>

<body>
    <?php include "layouts/nav.inc.html";
    include "includes/functions.inc.php"; ?>
    <div class="scrollable">
        <section class="mt-4">
            <div class="container valign-wrapper pt-2">
                <div class="left mr-4"><img class="avatar-l" src="<?=$_SESSION['image']?>" /></div>
                <div class="left">
                    <h4 class="m-0">
                        <?=$_SESSION['name']?>
                    </h4>
                    <p class="mt-1">
                        <?=$_SESSION['email']?>
                    </p>
                    <a href="settings"><i class="material-icons left">edit</i> Complete your profile</a>
                </div>
                <br clear="all" />
            </div>
            <br />
            <div class="border-top-1 grey-border border-lighten-2 mt-4 h-0">
                <div class="container">
                    <a href="#add_feed_modal"
                        class="fw-500 waves-effect waves-light btn-large px-2 pr-3 btn bg-primary modal-trigger"
                        style="top: -30px; border-radius: 32px;"><i class="material-icons left">add</i>
                        ADD NEW</a>
                    <button class="fw-500 waves-effect waves-dark btn-large btn-floating white modal-trigger right"
                        onclick="toggleView(this)" style="top: -30px;"><i
                            class="material-icons left black-text">view_stream</i></button>
                </div>
            </div>
            <div class="grey lighten-3 m-0 pt-4">
                <div class="container">
                    <div class="row py-4 mb-0" style="margin-left: -0.75rem; margin-right: -0.75rem;">
                        <?php
                    $sql = "SELECT `approved`, `feed`, `time`, `_fid`, `company` FROM feeds WHERE `disabled`=0 AND `_uid`=$_SESSION[_uid]";

    require "php/db.php";
    $conn = DB::getConnection();
    $result = $conn->query($sql);
    date_default_timezone_set("Asia/Kolkata");
    if ($result) {
        $num  = $result->num_rows;
        if ($num > 0) {
            for ($i = 0; $i < $num; $i++) {
                $feed = $result->fetch_assoc(); ?>
                        <div class="col s12 m6 pos-rel" id="feed-<?=$feed['_fid']?>">
                            <div class="progress-holder hide">
                                <div class="progress">
                                    <div class="indeterminate bg-primary"></div>
                                </div>
                            </div>
                            <div class="prevent-overlay hide full border-radius-8"></div>
                            <div class="card border-radius-8">
                                <div class="card-content">
                                    <span
                                        class="card-title <?=($feed['approved'] ? 'green-text' : 'yellow-text text-darken-3')?>"
                                        style="font-weight: 500">
                                        <?=($feed['approved'] ? 'Approved' : 'Not approved yet')?></span>
                                    <p class="msg">
                                        <?=$feed['feed']?>
                                    </p>
                                    <p class="align-right right">
                                        - From <b><?=$feed['company']?></b>
                                    </p>
                                </div>
                                <div class="card-action grey-text text-darken-1 border-radius-8">
                                    <span class="tooltipped"
                                        data-tooltip="<?=date_format(date_create($feed['time']), 'M jS, Y \a\\t g:i:s A')?>"><i
                                            class="material-icons left">access_time</i>
                                        <?=daysUntilToday(date_create($feed['time']))?>
                                    </span>
                                    <button
                                        class="transparent btn-flat right circle btn-floating btn-medium tooltipped waves-effect waves-circle waves-dark"
                                        style="margin: -7px 0px" onclick="disableFeed(<?=$feed['_fid']?>, this)"
                                        data-tooltip="Delete"><i
                                            class="material-icons black-text lh-5">delete</i></button>
                                    <button
                                        class="transparent btn-flat right circle btn-floating btn-medium tooltipped waves-effect waves-circle waves-dark"
                                        style="margin: -7px 0px" onclick="editableFeed(<?=$feed['_fid']?>, this)"
                                        data-tooltip="Edit"><i class="material-icons black-text lh-5">edit</i></button>
                                </div>
                            </div>
                        </div>
                        <?php
            }
        } else {
            ?>
                        <p>There's no feed added by you, try one by tapping button above.</p>
                        <?php
        }
    } else {
        ?>
                        <p>Something went wrong, try again. or Call administrator.
                            <?=$conn->error?>
                        </p>
                        <?php
    } ?>
                    </div>
                </div>
            </div>
        </section>
        <?php include "layouts/footer.inc.html"; ?>
    </div>

    <!-- Modal Structure -->
    <div id="add_feed_modal" class="modal bottom-sheet">
        <div class="progress-holder hide border-radius-0">
            <div class="progress">
                <div class="indeterminate bg-primary"></div>
            </div>
        </div>
        <div class="prevent-overlay hide full border-radius-8"></div>

        <div class="modal-content">
            <h4>Add Feedback</h4>
            <br />
            <form id="add-feed" name="add-feed">
                <div class="input-field">
                    <input id="company" type="text" class="validate" name="company" required>
                    <label for="company">Company Name</label>
                </div>
                <div class="input-field">
                    <textarea id="feed_message" class="materialize-textarea" name="message" required></textarea>
                    <label for="feed_message">Your review</label>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="modal-close waves-effect waves-dark btn btn-flat mr-1">Cancel</button>
            <button type="submit" class="waves-effect waves-light btn bg-primary mr-2" form="add-feed">Add</button>
        </div>
    </div>

    <?php include "includes/scripts.inc.php"; ?>
    <script src="ui-scripts/profile.js"></script>
</body>

</html>

<?php
} else {
        header("Location: signin?redirect_to=".$_SERVER['REDIRECT_URL']);
    } ?>