<?php

session_start();
include 'validations/validations.php';

if (!isset($_SESSION['loged'])) {
    redirect('user/login.php');
}

include 'inc/header.php';
include 'data/product/products_functions.php';

$products = getAllProducts();
?>
<?php include 'inc/nav.php' ?>
<div class="container">
    <div class="row">
        <div class="col-12">

            <h1>Home </h1>
            <h3>All Products: </h3>
            <hr>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">product name</th>
                        <th scope="col">product price</th>
                        <th scope="col">product discription</th>
                        <th scope="col">product img</th>
                        <th scope="col">options</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product) : ?>
                        <tr>
                            <th scope="row"><?= $product['id'] ?></th>
                            <td><?= $product['product_name'] ?></td>
                            <td><?= $product['product_price'] ?></td>
                            <td><?= $product['product_description'] ?></td>
                            <td><img width="200" src="<?= "data/product/imges/" . $product['img_path'] ?>" alt=""> </td>
                            <td>
                                <a href="product/update.php?id=<?= $product['id'] ?>" class=" btn btn-info">edite</a>
                                <a href="product/delete.php?id=<?= $product['id'] ?>" class="btn btn-danger">delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>

        </div>
    </div>
</div>
<?php include 'inc/footer.php' ?>