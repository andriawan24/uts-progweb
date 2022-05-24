<?php
    include_once('../settings/connection.php');
    include_once('../settings/session.php');
    $_SESSION['is_logged_in'] = false;
    header('Location: ../index.php');