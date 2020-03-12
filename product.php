<?php
require 'includes/paths/rootpath.php';
require 'includes/products.class.php';

$id = (isset($_GET['id']) ? (int) $_GET['id'] : 0);
if($id > 0)
{
    $data = new products();
    $res = $data->getproucts($id);
    if($res[0]['available']==1)
    {
      $avaliable = 'available';
    }
    else
    {
        $avaliable = 'not available';
    }
}
else
{
    exit('please enter a valid id');
}

include $GLOBALS['mainhtml'].'header.html';
include $GLOBALS['mainhtml'].'product-info.html';
include $GLOBALS['mainhtml'].'footer.html';