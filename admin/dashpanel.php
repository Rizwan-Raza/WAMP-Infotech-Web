<?php 
if(!isset($_SESSION)) {session_start();}
if (isset($_SESSION['admin']) and $_SESSION['admin'] == true) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Digital Marketing Company | Web Design Company</title>
    <base href="../">
    <?php include "includes/head.inc.php"; ?>
    <!-- <link rel="stylesheet" href="css/signin.css" /> -->
</head>

<body>
    <!-- Page Layout here -->
    <section class="row m-0 p-0">

        <?php include "includes/sidenav.inc.html";
        $sql = "SELECT COUNT(`_qid`) FROM `queries`"; 
        require_once "../php/db.php"; 
        $conn = DB::getConnection(); 
        $result = $conn->query($sql);
        $num_q = $result->fetch_assoc()['COUNT(`_qid`)'];
        
        $sql = "SELECT COUNT(`_uid`) FROM `users`"; 
        $conn = DB::getConnection(); 
        $result = $conn->query($sql);
        $num_u = $result->fetch_assoc()['COUNT(`_uid`)'];

        $sql = "SELECT COUNT(`_sid`) FROM `subscribers`"; 
        $conn = DB::getConnection(); 
        $result = $conn->query($sql);
        $num_s = $result->fetch_assoc()['COUNT(`_sid`)'];

        $sql = "SELECT COUNT(`pay_id`) FROM `payments`"; 
        $conn = DB::getConnection(); 
        $result = $conn->query($sql);
        $num_p = $result->fetch_assoc()['COUNT(`pay_id`)'];
        
        $sql = "SELECT COUNT(`_fid`) FROM `feeds`"; 
        $conn = DB::getConnection(); 
        $result = $conn->query($sql);
        $num_f = $result->fetch_assoc()['COUNT(`_fid`)'];
        
        ?>

        <div class="col s12 m9 white lighten-3 m-0 p-0" style="height:100vh;overflow:auto">
            <a class="p-2 pb-0 left" href="javascript:toggleNav()"><i class="material-icons">menu</i></a>
            <div class="px-4">
                <h4 class="my-1">
                    Welcome!
                </h4>
            </div>
            <div class="border-top-1 grey-border border-lighten-2 my-2"></div>
            <div class="px-4">
                <p>Here, we got some numbers: </p>
                <div class="row">
                    <div class="col s12 m6 l4 xl3">
                        <a href="admin/users" class="waves-effect waves-light w-full">
                            <div class="card bg-primary">
                                <div class="card-content white-text">
                                    <h4 class="fw-500 center-align">
                                        <?=$num_u?>
                                    </h4>
                                </div>
                                <div class="card-action center-align">
                                    Users
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col s12 m6 l4 xl3">
                        <a href="admin/feedbacks" class="waves-effect waves-light w-full">
                            <div class="card bg-primary">
                                <div class="card-content white-text">
                                    <h4 class="fw-500 center-align">
                                        <?=$num_f?>
                                    </h4>
                                </div>
                                <div class="card-action center-align">
                                    Feedbacks
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col s12 m6 l4 xl3">
                        <a href="admin/queries" class="waves-effect waves-light w-full">
                            <div class="card bg-primary">
                                <div class="card-content white-text">
                                    <h4 class="fw-500 center-align">
                                        <?=$num_q?>
                                    </h4>
                                </div>
                                <div class="card-action center-align">
                                    Queries
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col s12 m6 l4 xl3">
                        <a href="admin/payments" class="waves-effect waves-light w-full">
                            <div class="card bg-primary">
                                <div class="card-content white-text">
                                    <h4 class="fw-500 center-align">
                                        <?=$num_p?>
                                    </h4>
                                </div>
                                <div class="card-action center-align">
                                    Payments
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col s12 m6 l4 xl3">
                        <a href="admin/subscribers" class="waves-effect waves-light w-full">
                            <div class="card bg-primary">
                                <div class="card-content white-text">
                                    <h4 class="fw-500 center-align">
                                        <?=$num_s?>
                                    </h4>
                                </div>
                                <div class="card-action center-align">
                                    Subscribers
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include "includes/scripts.inc.php"; ?>
    <!-- <script src="admin/js/common.js"></script> -->
</body>

</html>

<?php } else {
    header("Location: /admin/?redirect_to=".$_SERVER['REDIRECT_URL']);
} ?>