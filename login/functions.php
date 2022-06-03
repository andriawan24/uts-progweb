<?php 
  include_once('../settings/session.php');

  if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']) {
    header('Location: ../index.php');
  }

  function findUserByEmail($value, $mysqli) {
    $stmt = $mysqli->prepare('SELECT * FROM users WHERE username = (?)');
    $stmt->bind_param('s', $value);
    $stmt->execute();

    return $stmt->get_result()->fetch_array(MYSQLI_ASSOC);
  }

  function attemptLogin($mysqli, $username, $password) {
    $user = findUserByEmail($username, $mysqli);
    if (!$user || !password_verify($password, $user['password'])) {
      setcookie('error', 'Username atau password salah', time() + 1);
      header('Location: index.php');
    } else {
      $_SESSION['is_logged_in'] = true;
      $_SESSION['user_id'] = $user['id'];
      header('Location: ../index.php');
    }
  } 
?>