<?php
    session_start();
    if (isset($_SESSION['login']) && isset($_SESSION['user_id'])) {
        unset($_SESSION['login']);
        unset($_SESSION['user_id']);
        session_destroy();
    }
    //Redirect to Home page
    header("Location: ../");
?>