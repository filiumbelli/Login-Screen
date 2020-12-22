<?php
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['user_id'])):
    echo "redirected";

    header('location:index.php');
    ?>
<?php
endif ?>
<?php
include_once 'header.php';
?>
<div class="container mt-5 w-50">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <h1 class="text-center">Login Page</h1>
        <div class="">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" name="email">
            <div class="form-text">Your email</div>
        </div>
        <div class="">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
            <div class="form-text">Your password</div>
        </div>
        <input type="submit" class="mt-3 btn btn-outline-dark w-25" value="submit" name="submit_login">
    </form>
</div>
<?php
include_once 'footer.php';

?>

<?php

require './App/Database/Database.php';
$db = new Database();

if (isset($_POST['submit_login'])) {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $user = $db->findUser($email);
        if (!isset($user['password'])) {
            header('location:register.php');
        }
        $isValid = password_verify($_POST['password'], $user['password']);
        echo $isValid;

        if (isset($email) && $isValid) {
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['user_id'] = uniqid();
            header('location:index.php');
        } else {
            echo "<p class='alert alert-danger'>Password is incorrect!</p>";
        }
    } else {
        echo "<p>Email or Password is empty</p>";
    }

}
?>
