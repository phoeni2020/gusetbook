<?php
session_start();
require '../includes/paths/admin.php';
require $GLOBALS['includesadmin'] . 'genarlfunctions.php';
require $GLOBALS['coreadmin'] . 'secure.php';
require $GLOBALS ['includesadmin'] . 'products.class.php';
if (!checklog())
    exit('you are not allowed to view this page');
if (isset($_POST['submit'])&&!empty($_POST['title']) && !empty($_POST['description'])&&!empty($_POST['price'])&&!empty($_FILES['image']))
{
    $id = secureinputs($_POST['id']);
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
    if (strlen($title) > 2 && strlen($description)>10)
    {
        if ($size > 100000) {
            $errmsg[] = 'size must be less than 100kb';
        }
        if ($type == 'image/jpeg' || $type == 'image/png') {
            $errmsg[] = 'must be an image';
        }
        $editproduct = new products();
        $newimgname=md5(date('U')).$imgname;
        $res = $editproduct->editproduct($id,$title,$description,$newimgname,$price,$available,$user_id);
        if ($res == true)
        {
            header('Location: http://localhost/level1project/admin/allproducts.php');
            move_uploaded_file($tmpname, '../uploads/'.$newimgname);
        }
        else
        {
            $err = 'error please check your web provider';
        }
    }
    else
    {
        $err = 'title must be more than 2 chars and description more than 10 and price should be number and upload valid image ';
    }
}
$id = (isset($_GET['id']) ? (int) $_GET['id'] : 0);
if($id > 0)
{
    $data = new products();
    $res = $data->getproucts($id);
}
else
{
   echo 'not valid id';
}
include $GLOBALS['tempadminpath'] . 'edit-product.html';

