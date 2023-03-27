<?php

session_start();
include '../validations/validations.php';

if (isset($_SESSION['loged'])) {
    redirect('../index.php');
}

include '../inc/header.php';
include '../data/product/products_functions.php';

?>
<?php include '../inc/nav.php' ?>
<div class="container">
    <div class="row">
        <div class="col-8">

            <h1>Login Page </h1>
            <hr>
            <?php
            if (isset($_SESSION['errors'])) :
                foreach ($_SESSION['errors'] as $error) :
            ?>
                    <div class="alert alert-danger"> <?php echo $error ?>
                    </div>


            <?php
                endforeach;
                unset($_SESSION['errors']);
            endif;
            ?>


            <?php
            if (isset($_SESSION['success'])) :
                foreach ($_SESSION['success'] as $success) :
            ?>
                    <div class="alert alert-success"> <?php echo $success ?>
                    </div>


            <?php
                endforeach;
                unset($_SESSION['success']);
            endif;
            ?>
            <form method="POST" action="<?= BASE_URL ?>handlers/login_handler.php" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="user_email" class="form-label">User Email</label>
                    <input type="email" name="user_email" class="form-control" id="user_email">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>




                <button type="submit" class="btn btn-primary">Login</button>
            </form>

        </div>
    </div>
</div>
<?php include '../inc/footer.php' ?>