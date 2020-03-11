<?php
session_start();
require '../includes/paths/admin.php';
require  $GLOBALS['includesadmin'].'genarlfunctions.php';
require  $GLOBALS ['includesadmin'].'users.class.php';
if(!checklog())
    exit('you are not allowed to view this page');
if(isset($_GET['id']))
{
    $id = (int)$_GET['id'];
    $data = new users();
    $users = $data->delete($id,'id');
    $users = 'done' ? header("Location: http://localhost/level1project/admin/allusers.php"): $res = 'error';
}