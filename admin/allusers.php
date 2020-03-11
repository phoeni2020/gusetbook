<?php
session_start();
require '../includes/paths/admin.php';
require  $GLOBALS['includesadmin'].'genarlfunctions.php';
require  $GLOBALS ['includesadmin'].'users.class.php';
if(!checklog())
    exit('you are not allowed to view this page');
$data = new users();

$users = $data->getall();
include$GLOBALS['tempadminpath'].'/all-users.html';