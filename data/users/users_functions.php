<?php
const PRODUCTS_FILE = __DIR__ . "/users.json";


// ############# encode #############
function encode($all_u)
{
    $all_u = json_encode($all_u);
    file_put_contents(PRODUCTS_FILE, $all_u);
}
// #######################################



// ############# get All users #############
function getAllUsers()
{
    $all_users = file_get_contents(PRODUCTS_FILE);
    $all_users = json_decode($all_users, true);
    return $all_users;
}
// #######################################




// ############# get One User #############
function getOneUser($id)
{
    $all_users = getAllUsers();
    foreach ($all_users as $user) {
        if ($user['id'] == $id) {
            return $user;
        }
    }
    return false;
}
// #######################################


// ############# Login #############
function login($email, $password)
{
    $all_users = getAllUsers();
    foreach ($all_users as $user) {
        if ($user['email'] == $email && $user['password'] == $password) {
            return $user;
        }
    }
    return false;
}
// #######################################


// ############# create User #############
function createUser($u_name, $u_email, $u_password, $u_type)
{
    $new_user = ['name' => $u_name, 'email' => $u_email, 'password' => $u_password, 'type' => $u_type];

    $all_users = getAllUsers();
    $last_user = end($all_users);
    $new_user['id'] = $last_user['id'] + 1;

    $all_users[] = $new_user;
    encode($all_users);
}
// #######################################



// ############# delete  User #############
function deleteUser($id)
{
    $all_users = getAllUsers();


    foreach ($all_users as $key => $user) {
        if ($user['id'] == $id) {
            unset($all_users[$key]);
            break;
        }
    }
    encode($all_users);
}
// #######################################




// ############# update USer #############
function updateUser($u_id, $u_name, $u_email, $u_password)
{
    $all_users = getAllUsers();

    foreach ($all_users as $key => &$user) {
        if ($user['id'] == $u_id) {

            $user['name'] = $u_name;
            $user['email'] = $u_email;

            $user['password'] = ($u_password === '') ?  $user['password'] : $u_password;

            break;
        }
    }

    encode($all_users);
}
// #######################################
