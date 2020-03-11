<?php
session_start();
require '../includes/paths/admin.php';
require  $GLOBALS['includesadmin'].'genarlfunctions.php';
require  $GLOBALS['coreadmin'].'secure.php';
require  $GLOBALS ['includesadmin'].'products.class.php';
if (!checklog())
    exit('you are not allowed to view this page');
if(isset($_POST['submit'])&&!empty($_POST['title']) && !empty($_POST['description'])&&!empty($_POST['price'])&&!empty($_FILES['image'])) {
    $errmsg = array();
    $title = secureinputs($_POST['title']);
    $description = secureinputs($_POST['description']);
    $price = secureinputs($_POST['price']);
    $available = secureinputs($_POST['available']);
    $imgname = $_FILES['image']['name']; // TODO: secure image
    $tmpname = $_FILES['image']['tmp_name'];
    $error = $_FILES['image']['error'];
    $size = $_FILES['image']['size'];
    $type = $_FILES['image']['type'];
    $user_id = $_SESSION['admininfo']['id'];
    if ($error > 0) {

    }
    if ($size > 100000) {
        $errmsg[] = 'size must be less than 100kb';
    }
    if ($type == 'image/jpeg' || $type == 'image/png') {
        $errmsg[] = 'must be an image';

    }
    $newimgname=md5(date('U')).$imgname;
    $addprodouct = new products();
    $res = $addprodouct->addproduct($title,$description,$newimgname,$price,$available,$user_id);
    if ($res == true)
    {
        $msgsuc='Product added successfully...';
        move_uploaded_file($tmpname,'../uploads/'.$newimgname);
    }
    else
    {
        $err='error wihle adding product';
    }
}
include $GLOBALS['tempadminpath'].'add-product.html';
