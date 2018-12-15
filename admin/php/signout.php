<?php
    session_start();
    $_SESSION['admin'] = false;
    unset($_SESSION["_aid"]);
    unset($_SESSION["a_name"]);
    // echo "Done";
