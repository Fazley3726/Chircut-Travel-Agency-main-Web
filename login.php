<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "test");

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($connection, "SELECT * FROM users WHERE email='$email'");
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['username'];
        header("Location: home.php");
    } else {
        echo "Invalid email or password.";
    }
}
?>

<form action="login.php" method="post">
  <input type="email" name="email" placeholder="Email" required><br>
  <input type="password" name="password" placeholder="Password" required><br>
  <input type="submit" name="login" value="Sign In">
</form>
