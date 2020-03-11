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

include $GLOBALS['tempadminpath'].'header.html';
include $GLOBALS['tempadminpath'].'all-products.html';
include $GLOBALS['tempadminpath'].'footer.html';
