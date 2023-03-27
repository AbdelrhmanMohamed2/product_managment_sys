<?php
session_start();
include '../inc/header.php';
require_once '../validations/validations.php';
require_once '../data/users/users_functions.php';
if (!isset($_GET['id']) || !isset($_SESSION['loged']) || $_SESSION['loged']['type'] !== "admin") {

    redirect('../index.php');
}


$user = getOneUser($_GET['id']) ? getOneUser($_GET['id']) : redirect('all_users.php');
?>
<?php include '../inc/nav.php' ?>
<div class="container">
    <div class="row">
        <div class="col-8">

            <h1>Edit User : <?= $user['name'] ?>: </h1>
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


            <form method="POST" action="<?= BASE_URL ?>handlers/update_user_handler.php">
                <div class="mb-3">
                    <input type="text" hidden value="<?= $_GET['id'] ?>" name="id">
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Change Name</label>
                    <input type="text" value="<?= $user['name'] ?>" name="name" class="form-control" id="name">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Change Email</label>
                    <input type="email" value="<?= $user['email'] ?>" name="email" class="form-control" id="email">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Change Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>

                <div class="mb-3">
                    <label for="con_password" class="form-label">Confirm Password</label>
                    <input type="password" name="con_password" class="form-control" id="con_password">
                </div>




                <button type="submit" class="btn btn-primary">edit</button>
            </form>
        </div>
    </div>
</div>
<?php include '../inc/footer.php' ?>