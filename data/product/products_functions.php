<?php
const PRODUCTS_FILE = __DIR__ . "/products.json";


// ############# encode #############
function encode($all_p)
{
    $all_p = json_encode($all_p);
    file_put_contents(PRODUCTS_FILE, $all_p);
}
// #######################################


// ############# getAllProducts #############
function getAllProducts()
{
    $all_products = file_get_contents(PRODUCTS_FILE);
    $all_products = json_decode($all_products, true);
    return $all_products;
}
// #######################################


// ############# get One Product #############
function getOneProduct($id)
{
    $all_products = getAllProducts();
    foreach ($all_products as $product) {
        if ($product['id'] == $id) {
            return $product;
        }
    }
    return false;
}
// #######################################


// ############# createProduct #############
function createProduct($p_name, $p_price, $p_discription, $p_img_path)
{
    $new_product = ['product_name' => $p_name, 'product_price' => $p_price, 'product_description' => $p_discription, 'img_path' => $p_img_path];

    $all_products = getAllProducts();
    $last_product = end($all_products);
    $new_product['id'] = $last_product['id'] + 1;

    $all_products[] = $new_product;
    encode($all_products);
}
// #######################################


// ############# delete  User #############
function deleteProduct($id)
{
    $all_products = getAllProducts();


    foreach ($all_products as $key => $product) {
        if ($product['id'] == $id) {
            unset($all_products[$key]);
            break;
        }
    }
    encode($all_products);
}
// #######################################


// ############# updateProduct #############
function updateProduct($p_id, $p_name, $p_price, $p_discription, $p_img)
{
    $all_products = getAllProducts();

    foreach ($all_products as $key => &$product) {
        if ($product['id'] == $p_id) {

            $product['product_name'] = $p_name;
            $product['product_price'] = $p_price;
            $product['product_description'] = $p_discription;

            $product['img_path'] = ($p_img === '') ?  $product['img_path'] : $p_img;

            break;
        }
    }

    encode($all_products);
}
// #######################################