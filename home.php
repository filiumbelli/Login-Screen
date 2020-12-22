<div class="row">
    <div class="col-md-3 ">
        <h1 class="title mt-5">Home Page</h1>
    </div>

    <div class="col-md-3 offset-6 mt-5">
        <?php
        if(!isset($_SESSION['user_id'])):
        ?>
        <a class="lead" href="register.php">Register</a>
        <a href="login.php" class="lead">Login</a>
        <?php
        endif;
        ?>
    </div>
</div>
<div class="row mt-5">
    <div class="col-lg-4">
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto, mollitia.</p>
    </div>
    <div class="col-lg-4">
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto, mollitia.</p>
    </div>
    <div class="col-lg-4">
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto, mollitia.</p>
    </div>
</div>