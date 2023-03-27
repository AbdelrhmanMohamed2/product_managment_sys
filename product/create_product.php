<?php
session_start();
require_once '../validations/validations.php';
if (!isset($_SESSION['loged']) || $_SESSION['loged']['type'] !== "admin") {
    redirect('../user/login.php');
}
include '../inc/header.php' ?>
<?php include '../inc/nav.php' ?>
<div class="container">
    <div class="row">
        <div class="col-8">

            <h1>Create New Products: </h1>
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
            <form method="POST" action="<?= BASE_URL ?>handlers/create_product_handler.php" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="product_name" class="form-label">Product Name</label>
                    <input type="text" name="product_name" class="form-control" id="product_name">
                </div>

                <div class="mb-3">
                    <label for="product_price" class="form-label">Product Price</label>
                    <input type="text" name="product_price" class="form-control" id="product_price">
                </div>

                <div class="mb-3">
                    <label for="product_description" class="form-label">Product Description</label>
                    <input type="text" name="product_description" class="form-control" id="product_description">
                </div>

                <div class="mb-3">
                    <label for="product_img" class="form-label">Product Image</label>
                    <input type="file" name="product_img" class="form-control" id="product_img">
                </div>



                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</div>
<?php include '../inc/footer.php' ?>