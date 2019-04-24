<?php if(!isset($_SESSION)) {session_start();} if (isset($_SESSION['admin']) and
$_SESSION['admin'] == true) { ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Digital Marketing Company | Web Design Company</title>
    <base href="../" />
    <?php include "includes/head.inc.php"; ?>
</head>

<body>
    <!-- Page Layout here -->
    <section class="row m-0 p-0">
        <?php include "includes/sidenav.inc.html";
        include "../includes/functions.inc.php"; ?>

        <div class="col s12 m9 white m-0 p-0" style="height:100vh;overflow:auto">
            <a class="p-2 pb-0 left" href="javascript:toggleNav()"><i class="material-icons">menu</i></a>
            <div class="px-4">
                <h4 class="my-1">Payments</h4>
            </div>
            <div class="border-top-1 grey-border border-lighten-2 mt-2"></div>
            <div class="grey lighten-3">
                <?php $sql = "SELECT * FROM `payments`"; require "../php/db.php";
                 $conn = DB::getConnection();
                 date_default_timezone_set("Asia/Kolkata");
                 $result = $conn->query($sql);?>


                <table>
                    <?php if($result and ($num = $result->num_rows) > 0) {?>
                    <thead>
                        <tr>
                            <th class="pl-4">#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Purpose</th>
                            <th>Phone</th>
                            <th>Amount</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($i = 0; $i <
              $num; $i++) { $user = $result->fetch_assoc();?>
                        <tr>
                            <td class="pl-4" onclick="M.toast({html: `<?=$user['insta_payment_id']?>`})">
                                <?=$i+1?>
                            </td>
                            <td>
                                <?=$user['name']?>
                            </td>
                            <td>
                                <?=$user['email']?>
                            </td>
                            <td>
                                <?=$user['purpose']?>
                            </td>
                            <td>
                                <?=$user['phone']?>
                            </td>
                            <td>
                                &#8377; <?=$user['amount']?>
                            </td>
                            <td class="tooltipped"
                                data-tooltip="<?=date_format(date_create($user['time']), "M jS, Y \a\\t g:i:s A")?>">
                                <!-- <?=$user['time']?> -->
                                <?=daysUntilToday(date_create($user['time']))?>
                                <!-- <?=date_format(date_create(), "M jS, Y \a\\t g:i:s A")?> -->
                            </td>
                        </tr>
                    </tbody>
                    <?php } ?>
                    <?php } else { ?>
                    <tr>
                        <td colspan="5" class="center-align">No Payments found</td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </section>

    <?php include "includes/scripts.inc.php"; ?>
    <!-- <script src="admin/js/common.js"></script> -->
</body>

</html>

<?php } else { header("Location: /admin/?redirect_to=".$_SERVER['REDIRECT_URL']); } ?>