<?php
    include_once('settings/connection.php');

    function getProjects($mysqli) {
        $stmt = $mysqli->prepare('SELECT * FROM projects');
        $stmt->execute();

        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
?>