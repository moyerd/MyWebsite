<?php
session_start();
require_once 'model/dbconnectcrashcourse.php';
require_once 'model/dbconnectmoyusers.php';
require_once 'model/usersSQL.php';
require_once 'model/productsSQL.php';
require_once 'model/vendorsSQL.php';
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_products';
    }
}
else if ($action == 'show_create_page') {
    include 'view/createAccForm.php';
    exit();
}
else if ($action == 'acc_create') {
    include 'view/createAccVal.php';
    if ($errormsguserid != "" || $errormsgname != "" || $errormsgpassword != ""){
        include "view/createAccForm.php";
        exit();
    }
    else {
        insert_user($user_id,$name,$password,$acc_type);
        header("Location: index.php");
    }
}
if (!isset($_SESSION['is_valid'])){
    $action = 'acc_login';
}
if ($action == 'list_products') {
    $results = get_all_products();
    include 'view/productsTable.php' ;
    exit();
}
else if ($action == 'show_deleteconfirm'){
    $prod_id = filter_input(INPUT_POST, 'prod_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $prod_name = filter_input(INPUT_POST, 'prod_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    include 'view/deleteForm.php';
    exit();
}
else if ($action == 'delete_product') {
    $prod_id = filter_input(INPUT_POST, 'prod_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    delete_product($prod_id);
    header('Location: index.php');
}
else if ($action == 'show_add_form') {
    $vendors = get_all_vendors();
    include 'view/insertForm.php';
    exit();
}
else if ($action == 'add_product') {
    include 'view/validation.php';
    if ($errormsgprodid != "" || $errormsgprodn != "" || $errormsgprodprice != "" || $errormsgproddesc != ""){
        $vendors = get_all_vendors();
        include "view/insertForm.php";
        exit();
    }
    else {
        insert_product($prod_id,$vend_id,$prod_name,$prod_price,$prod_desc);
        header("Location: index.php");
    }
}
else if ($action == 'show_update_form') {
    $prod_id = filter_input(INPUT_POST, 'prod_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $vendors = get_all_vendors();
    $results = get_product($prod_id);
    $product_id = $results['prod_id'];
    $vendor_id = $results['vend_id'];
    $product_name = $results['prod_name'];
    $product_price = $results['prod_price'];
    $product_description = $results['prod_desc'];
    include 'view/updateForm.php';
    exit();
}
else if ($action == 'update_product') {
    include 'view/validation.php';
    if ($errormsgprodid != "" || $errormsgprodn != "" || $errormsgprodprice != "" || $errormsgproddesc != ""){
        $vendors = get_all_vendors();
        $results = get_product($prod_id);
        include "view/updateForm.php";
        exit();
    }
    else {
        update_product($prod_id,$vend_id,$prod_name,$prod_price,$prod_desc);
        header("Location: index.php");
    }
}
else if ($action == 'show_login') {
    include 'view/loginForm.php';
    exit();
}
else if ($action == 'acc_login'){
    $login_user_id = filter_input(INPUT_POST, 'txtUserIDlogin');
    $login_password = filter_input(INPUT_POST, 'txtPasswordlogin');
    if (is_valid_login($login_user_id,$login_password)){
        $_SESSION['is_valid'] = true;
        $userresults = get_user_info($login_user_id);
        $_SESSION['userid'] = $userresults['userid'];
        $_SESSION['name'] = $userresults['name'];
        $_SESSION['account_type'] = $userresults['account_type'];
        $results = get_all_products();
        include 'view/productsTable.php';
        exit();
    } else{
        $errormsglogin = "<span class='error'> *Invalid User ID or Password </span>";
        include 'view/loginForm.php';
        exit();
    }
}
else if ($action == 'acc_logout'){
    $_SESSION = array();            // Clear all session data
    session_destroy();              // Clean up the session ID
    include 'view/loginForm.php';
    exit();
}
else if ($action == 'show_filter_form') {
    $vendors = get_all_vendors();
    include 'view/filterForm.php';
    exit();
}
else if ($action == 'filter_product') {
            $prodName = filter_input(INPUT_POST, 'prodName');
            $vendID = filter_input(INPUT_POST, 'vendID');
            $prodPrice = filter_input(INPUT_POST, 'prodPrice');
            $symbol = filter_input(INPUT_POST, 'symbol');
            
            if ($prodName) {
                $results = firstLetter($prodName);
                include 'view/productsTable.php';
                exit();
            }
            else if ($prodPrice){
                if ($symbol == "LT") {
                    $results = lessThan($prodPrice);
                    include 'view/productsTable.php';
                    exit();
                }
                else if ($symbol == "GT") {
                    $results = greaterThan($prodPrice);
                    include 'view/productsTable.php';
                    exit();
                } 
            }
            else if ($vendID) {
                $results = vendorSelect($vendID);
                include 'view/productsTable.php';
                exit();
            }
            else {
                $results = sqlSelect();
                include 'view/productsTable.php';
                exit();
            }
}
?>