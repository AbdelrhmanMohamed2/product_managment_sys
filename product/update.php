<?php
session_start();
include '../inc/header.php';
require_once '../validations/validations.php';
require_once '../data/product/products_functions.php';
if (!isset($_GET['id']) || !isset($_SESSION['loged']) || $_SESSION['loged']['type'] !== "admin") {
    redirect('../index.php');
}


$product = getOneProduct($_GET['id']) ? getOneProduct($_GET['id']) : redirect('../index.php');
?>
<?php include '../inc/nav.php' ?>
<div class="container">
    <div class="row">
        <div class="col-8">

            <h1>Edit Product : <?= $product['product_name'] ?>: </h1>
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


            <form method="POST" action="<?= BASE_URL ?>handlers/update_product_handler.php" enctype="multipart/form-data">
                <div class="mb-3">
                    <input type="text" hidden value="<?= $_GET['id'] ?>" name="product_id">
                </div>

                <div class="mb-3">
                    <label for="product_name" class="form-label">Change Product Name</label>
                    <input type="text" value="<?= $product['product_name'] ?>" name="product_name" class="form-control" id="product_name">
                </div>

                <div class="mb-3">
                    <label for="product_price" class="form-label">Change Product Price</label>
                    <input type="text" value="<?= $product['product_price'] ?>" name="product_price" class="form-control" id="product_price">
                </div>

                <div class="mb-3">
                    <label for="product_description" class="form-label">Change Product Description</label>
                    <input type="text" value="<?= $product['product_description'] ?>" name="product_description" class="form-control" id="product_description">
                </div>

                <div class="mb-3">
                    <label for="product_img" class="form-label">Change Product Image</label>
                    <input type="file" name="product_img" class="form-control" id="product_img">
                </div>



                <button type="submit" class="btn btn-primary">edit</button>
            </form>
        </div>
    </div>
</div>
<?php include '../inc/footer.php' ?>