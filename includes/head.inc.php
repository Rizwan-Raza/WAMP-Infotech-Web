<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<!-- favicons -->
<link rel="apple-touch-icon" sizes="57x57" href="images/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="images/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="images/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="images/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="images/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="images/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="images/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="images/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-icon-180x180.png">
<<<<<<< HEAD
<link rel="icon" type="image/png" sizes="192x192" href="images/favicon/android-icon-192x192.png">
=======
<link rel="icon" type="image/png" sizes="192x192"  href="images/favicon/android-icon-192x192.png">
>>>>>>> 8e23e2ed528adde9ef439fc3c4741a993be59076
<link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="images/favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
<link rel="manifest" href="manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="images/favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<<<<<<< HEAD
<meta name="thumbnail" content="https://www.wampinfotech.com/images/wamp-logo.png" />


<meta itemprop="thumbnailUrl" content="https://www.wampinfotech.com/images/wamp-logo.png" />
<meta property="og:site_name" content="WAMP Infotech" />

<meta property="og:image" content="https://www.wampinfotech.com/images/wamp-logo.png" />
<meta property="og:image:secure_url" content="https://www.wampinfotech.com/images/wamp-logo.png" />
<meta property="og:image:type" content="image/png" />
<meta property="og:image:width" content="512" />
<meta property="og:image:height" content="512" />
<meta property="og:image:alt" content="Hand joining in a radial form" />
<meta property="og:type" content="website">
<meta property="og:video" content="https://youtu.be/WL44vPIqkds" />
<meta property="og:video:secure_url" content="https://youtu.be/WL44vPIqkds" />
<meta property="og:video:width" content="480" />
<meta property="og:video:height" content="320" />

<meta name="twitter:image" content="https://www.wampinfotech.com/images/wamp-logo.png">

<meta name="image" content="https://www.wampinfotech.com/images/wamp-logo.png">

<link rel="image_src" href="https://www.wampinfotech.com/images/wamp-logo.png" />

=======
>>>>>>> 8e23e2ed528adde9ef439fc3c4741a993be59076
<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="css/helper-classes.css" />
<<<<<<< HEAD
<link rel="stylesheet" href="css/common.css" />

<?php
error_reporting(0);
if (isset($_COOKIE["user_id"])) {
    require "../php/rem-me.php";
}

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['visited']) or !$_SESSION['visited']) {
    $sql = "INSERT INTO `visitors`(`ip_addr`, `user_agent`,`time`) VALUES('$_SERVER[REMOTE_ADDR]', '$_SERVER[HTTP_USER_AGENT]', CONVERT_TZ(CURRENT_TIMESTAMP, '+00:00', '+05:30'))";
    
    require_once "php/db.php";
    $conn = DB::getConnection();
    $result = $conn->query($sql);
    if ($result) {
        $_SESSION['visited'] = true;
    // echo "<RexT />";
    } else {
        // echo"<Rex>".$conn->error."</Rex>";
    }
}

?>
=======
<link rel="stylesheet" href="css/common.css" />
>>>>>>> 8e23e2ed528adde9ef439fc3c4741a993be59076
