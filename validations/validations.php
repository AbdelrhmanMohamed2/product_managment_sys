<?php

// ############# check method #############
function check_method($method)
{
    return $_SERVER['REQUEST_METHOD'] === $method;
}
// #######################################


// ############# sanatize #############
function sanatize($input)
{
    return trim(htmlentities(htmlspecialchars($input)));
}
// #######################################


// ############# sanatize #############
function maxInput($input, $char_num)
{
    return strlen($input) > $char_num;
}
// #######################################

// ############# sanatize #############
function minInput($input, $char_num)
{
    return strlen($input) < $char_num;
}
// #######################################

// ############# redirection #############
function redirect($to)
{
    header("location:$to");
    die;
}
// #######################################