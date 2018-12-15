<?php
    session_start();
    $_SESSION['login'] = false;
    unset($_SESSION["_uid"]);
    unset($_SESSION["name"]);
    unset($_SESSION["email"]);
    unset($_SESSION["number"]);
    unset($_SESSION["username"]);
    unset($_SESSION["image"]);
    unset($_SESSION["short_name"]);
