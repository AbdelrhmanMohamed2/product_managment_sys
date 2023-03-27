<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= BASE_URL ?>index.php">Product MS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php if (isset($_SESSION['loged'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= BASE_URL ?>index.php">All Products</a>
                    </li>

                    <?php ?>

                    <?php if ($_SESSION['loged']['type'] === 'admin') : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= BASE_URL ?>product/create_product.php">Create Product</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?= BASE_URL ?>user/create_user.php">Create User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= BASE_URL ?>user/all_users.php">All User</a>
                        </li>
                    <?php endif ?>

                    <li class="nav-item">
                        <a class="nav-link text-danger" href="<?= BASE_URL ?>user/logout.php">Logout</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL ?>user/login.php">Login</a>
                    </li>
                <?php endif; ?>




            </ul>

        </div>
    </div>
</nav>