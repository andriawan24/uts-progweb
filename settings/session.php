<?php
    include_once('connection.php');

    session_start();

    $is_logged_in = false;
    $user = null;
    if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']) {
        $is_logged_in = true;

        $stmt = $mysqli->prepare('SELECT * FROM users WHERE id = (?)');
        $userId = $_SESSION['user_id'];
        $stmt->bind_param('s', $userId);
        $stmt->execute();
        $res = $stmt->get_result();
        $user = $res->fetch_array(MYSQLI_ASSOC);
    }
?>