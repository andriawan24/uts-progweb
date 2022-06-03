<?php 
    include_once('../settings/connection.php');

    function findUserByEmail($value, $mysqli) {
        $stmt = $mysqli->prepare('SELECT * FROM users WHERE username = (?)');
        $stmt->bind_param('s', $value);
        $stmt->execute();
    
        return $stmt->get_result()->fetch_array(MYSQLI_ASSOC);
      }

    // Function Here
    function register($user, $mysqli) {
        $findUser = findUserByEmail($user['email'], $mysqli);

        if (!$findUser) {
            if (isset($user) && $user) {
                $stmt = $mysqli->prepare('INSERT INTO users (first_name, last_name, username, password, gender) VALUES (?, ?, ?, ?, ?)');
                $stmt->execute([$user['first_name'], $user['last_name'], $user['email'], password_hash($user['password'], PASSWORD_DEFAULT), $user['gender']]);
    
                header('Location: ../login/index.php');
            } else {
                setcookie('error', 'Terjadi kesalahan', time() + 1);
                header('Location: index.php');
            }
        } else {
            setcookie('error', 'Email sudah terdaftar', time() + 1);
            header('Location: index.php');
        }
    }
?>