<?php
session_start();
require_once '../validations/validations.php';
if (!isset($_SESSION['loged']) || $_SESSION['loged']['type'] !== "admin") {
    redirect('login.php');
}
include '../inc/header.php' ?>
<?php include '../inc/nav.php' ?>
<div class="container">
    <div class="row">
        <div class="col-8">

            <h1>Create New User : </h1>
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
            <form method="POST" action="<?= BASE_URL ?>handlers/create_user_handler.php">
                <div class="mb-3">
                    <label for="name" class="form-label">User Name</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>


                <div class="mb-3">
                    <label for="con_password" class="form-label">Confirm Password</label>
                    <input type="password" name="con_password" class="form-control" id="con_password">
                </div>


                <div class="form-check">
                    <input class="form-check-input" type="radio" name="type" value="admin" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Admin
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="type" value="user" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                        User
                    </label>
                </div>


                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</div>
<?php include '../inc/footer.php' ?>