<?php 
    include_once(__DIR__ . '/../settings/connection.php');

    function getProjects($mysqli) {
        $stmt = $mysqli->prepare('SELECT * FROM projects');
        $stmt->execute();

        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    function getProject($mysqli, $id) {
        $stmt = $mysqli->prepare('SELECT * FROM projects WHERE id = (?)');
        $stmt->bind_param('s', $id);
        $stmt->execute();

        return $stmt->get_result()->fetch_array(MYSQLI_ASSOC);
    }

    function addTransaction($mysqli, $id_project, $id_user, $amount) {
        if ($id_user) {
            $stmt = $mysqli->prepare('INSERT INTO transactions (users_id, projects_id, amount) VALUES (?, ?, ?)');
            $stmt->execute([$id_user, $id_project, $amount]);

            header('Location: success.php');
        } else {
            setcookie('error', 'Terjadi kesalahan', time() + 1);
            header('Location: detail.php?id_project=' . $id_project);
        }
    }
?>