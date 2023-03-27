<?php

session_start();
include '../validations/validations.php';

if (!isset($_SESSION['loged']) || $_SESSION['loged']['type'] !== "admin") {
    redirect('login.php');
}

include '../inc/header.php';
include '../data/users/users_functions.php';

$users = getAllUsers();
?>
<?php include '../inc/nav.php' ?>
<div class="container">
    <div class="row">
        <div class="col-12">

            <h1>Home </h1>
            <h3>All Users : </h3>
            <hr>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">user name</th>
                        <th scope="col">user email</th>
                        <th scope="col">user type</th>
                        <th scope="col">options</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <th scope="row"><?= $user['id'] ?></th>
                            <td><?= $user['name'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><?= $user['type'] ?></td>

                            <td>
                                <a href="edit_user.php?id=<?= $user['id'] ?>" class=" btn btn-info ">edite</a>
                                <a href="delete_user.php?id=<?= $user['id'] ?>" class="btn btn-danger">delete</a>
                            </td>

                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>

        </div>
    </div>
</div>
<?php include '../inc/footer.php' ?>