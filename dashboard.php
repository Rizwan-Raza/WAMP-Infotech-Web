<?php 
session_start();
if (isset($_SESSION['login']) and $_SESSION['login'] == true) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Digital Marketing Company | Web Design Company</title>
    <?php include "includes/head.inc.php"; ?>
    <!-- <link rel="stylesheet" href="css/signin.css" /> -->
</head>

<body>
    <?php include "layouts/nav.inc.html"; ?>
    <div class="scrollable">
        <section class="my-4">
            <div class="container valign-wrapper pt-2">
                <div class="left mr-4"><img class="avatar-l" src="<?=$_SESSION['image']?>" /></div>
                <div class="left">
                    <h4 class="m-0">
                        <?=$_SESSION['name']?>
                    </h4>
                    <p class="mt-1">
                        <?=$_SESSION['email']?>
                    </p>
                    <?php if ($_SESSION['image'] == "images/users/pikachu_dummy.png" or $_SESSION['username'] ==  str_replace("@", "_", substr($_SESSION['email'], 0, strrpos($_SESSION['email'], ".")))) { ?>
                    <a href="settings"><i class="material-icons left">edit</i> Complete your profile</a>
                    <?php } ?>
                </div>
                <br clear="all">
            </div>
            <div class="border-top-1 grey-border border-lighten-2 my-4"></div>
            <div class="container">
                <?php 
                $sql = "SELECT COUNT(`_fid`) FROM `feeds` WHERE `_uid`=$_SESSION[_uid]"; 
                require_once "php/db.php"; 
                $result = DB::getConnection()->query($sql);
                $num_t = $result->fetch_assoc()['COUNT(`_fid`)'];

                $sql = "SELECT COUNT(`_fid`) FROM `feeds` WHERE `_uid`=$_SESSION[_uid] AND `approved`=1"; 
                require_once "php/db.php"; 
                $result = DB::getConnection()->query($sql);
                $num_a = $result->fetch_assoc()['COUNT(`_fid`)'];
                ?>
                <div class="row">
                    <div class="col s12 m6 l4 xl3">
                        <a href="feedback">
                            <div class="card bg-primary">
                                <div class="card-content white-text">
                                    <h4 class="fw-500 center-align">
                                        <?=$num_t?>
                                    </h4>
                                </div>
                                <div class="card-action center-align">
                                    Total Feeds
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col s12 m6 l4 xl3">
                        <a href="feedback">
                            <div class="card bg-primary">
                                <div class="card-content white-text">
                                    <h4 class="fw-500 center-align">
                                        <?=$num_a?>
                                    </h4>
                                </div>
                                <div class="card-action center-align">
                                    Approved Feeds
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col s12 m6 l4 xl3">
                        <a href="feedback">
                            <div class="card bg-primary">
                                <div class="card-content white-text">
                                    <h4 class="fw-500 center-align">
                                        <?=$num_t - $num_a?>
                                    </h4>
                                </div>
                                <div class="card-action center-align">
                                    Unapproved Feeds
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <?php include "layouts/footer.inc.html"; ?>
    </div>

    <?php include "includes/scripts.inc.php"; ?>
    <script src="ui-scripts/profile.js"></script>
</body>

</html>

<?php } else {
    header("Location: signin?redirect_to=".$_SERVER['REDIRECT_URL']);
} ?>