<?php
require 'includes/paths/rootpath.php';
require 'includes/products.class.php';

$data = new products();

$res = $data->getallproducts('order by `id` ASC LIMIT 3');

include $GLOBALS['mainhtml'].'header.html';
include $GLOBALS['mainhtml'].'index.html';
include $GLOBALS['mainhtml'].'footer.html';
