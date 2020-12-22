<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<?php
include_once 'header.php';
require_once 'home.php';
include_once 'footer.php';
?>
