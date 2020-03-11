<?php
session_start();
require '../includes/paths/admin.php';
require $GLOBALS['includesadmin'] . 'genarlfunctions.php';
require $GLOBALS['coreadmin'] . 'secure.php';
require $GLOBALS ['includesadmin'] . 'products.class.php';
if (!checklog('adminlog') || !checklog('creatorlog'))
    exit('you are not allowed to view this page');
$data = new products();
$products = $data->getallproducts();
if(isset($_GET['id']))
{
    $id = (int)$_GET['id'];
    $data = new products();
    $users = $data->deleteproduct($id,'id');
    $users = 'done' ? header("Location: http://localhost/level1project/admin/allproducts.php"): $res = 'error';
}