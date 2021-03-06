<?php
session_start();
if (isset($_SESSION['login']) and $_SESSION['login'] == true) {
    if (isset($_GET['username'])) {
        $sql = "SELECT `name`, `email`, `username`, `number`, `image` FROM `users` WHERE `username`='$_GET[username]'";
        require 'php/db.php';
        $conn = DB::getConnection();
        $result = $conn->query($sql);
        if ($result == true) {
            if ($result->num_rows > 0) {
                if (!isset($_SESSION)) {
                    session_start();
                }
                $u_data = $result->fetch_assoc();
                extract($u_data, EXTR_SKIP);
            } else {
                header("Location: ../4O4");
                return;
            }
        } else {
            header("Location: ../5OO");
            return;
        }
    } else {
        extract($_SESSION, EXTR_SKIP);
    } ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Digital Marketing Company | Web Design Company</title>
    <?php if(isset($_GET['username'])) { ?>
    <base href="../" />
    <?php } ?>
    <?php include "includes/head.inc.php"; ?>
    <!-- <link rel="stylesheet" href="css/settings.css" /> -->
</head>

<body>
    <?php include "layouts/nav.inc.html"; ?>
    <div class="scrollable grey lighten-3">
        <div class="card-panel container mx-auto my-4">
            <div class="center-align mb-4">
                <img src="<?=$image?>" class="avatar-l" />
            </div>
            <h4 class="fw-500 h5 center-align">
                <?=$name?>
            </h4>
            <hr class="short-border" />
            <br />
            <table style="max-width: 500px" class="mx-auto">
                <tr>
                    <td>Name</td>
                    <td>
                        <?=@$name?>
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <?=@$email?>
                    </td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td>
                        <?=@$username?>
                    </td>
                </tr>
                <tr>
                    <td>Number</td>
                    <td>
                        <?=@$number?>
                    </td>
                </tr>
            </table>
        </div>
        <?php include "layouts/footer.inc.html"; ?>
    </div>

    <?php include "includes/scripts.inc.php"; ?>
    <!-- <script src="ui-scripts/profile.js"></script> -->
</body>

</html>

<?php
} else {
        header("Location: https://$_SERVER[SERVER_NAME]/signin?redirect_to=".$_SERVER['REDIRECT_URL']);
    }
?>