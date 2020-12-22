<?php
if(!isset($_SESSION)){
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
            <h1 class="text-center">Register Page</h1>
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
            <div class="">
                <label for="password" class="form-label">Re-enter your password</label>
                <input type="password" class="form-control" name="re_password">
                <div class="form-text">Re-enter your password</div>
            </div>
            <input type="submit" class="mt-3 btn btn-outline-dark w-25" value="submit" name="submit_register">
        </form>
    </div>

<?php
include_once 'footer.php';

?>
<?php
require './App/Database/Database.php';
$db = new Database();

var_dump($_POST);
if (!empty($_POST['submit_register'])) {
    if (isset($_POST['email'])) {
        if (isset($_POST['password']) && (isset($_POST['re_password']))) {
            if ($_POST['password'] == $_POST['re_password']) {
                if (strlen($_POST['password']) > 5) {
                    $db->addUser($_POST['email'], password_hash($_POST['password'], PASSWORD_DEFAULT));
                    header('location:index.php');
                } else {
                    "<h1 class='alert alert-danger'>Length must be longer than 5</h1>";
                }
            } else {
                "<h1 class='alert alert-danger'>Password Match...Something went wrong</h1>";
            }
        }
    } else {
        echo "<h1 class='alert alert-danger'>Something went wrong</h1>";
    }
}