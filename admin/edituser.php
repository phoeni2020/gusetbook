<?php
session_start();
require '../includes/paths/admin.php';
require  $GLOBALS['includesadmin'].'genarlfunctions.php';
require  $GLOBALS['coreadmin'].'secure.php';
require  $GLOBALS ['includesadmin'].'users.class.php';
if(!checklog())
exit('you are not allowed to view this page');
if (isset($_POST) && count($_POST) > 0)
{
    $username = secureinputs($_POST['username']);
    $password = secureinputs($_POST['password']);
    $email = secureinputs($_POST['email']);
    $confirm = secureinputs($_POST['conpassword']);
    $id = secureinputs($_POST['id']);
    if (strlen($username) > 5 && strlen($password)>=6 && $password === $confirm)
    {
        $adduser = new users();
        $res = $adduser->updateuser($id,$username,$password,$email);
        if ($res == true)
        {
            header('Location: http://localhost/level1project/admin/allusers.php');
        }
        else
        {
            $err = 'error please check your web provider';
        }
    }
    else
    {
        $err = 'username must be more than 5 chars and password more than 6 and password should match with confirmpassword ';
    }
}
$id = (isset($_GET['id']) ? (int)$_GET['id'] : 0);
if($id > 0)
{
    $cond = array('*', array('id' => $id));
    $data = new users();
    $res = $data->search($cond);
}
else
{
    $err = 'not valid id';
}
include $GLOBALS['tempadminpath'].'header.html';
include$GLOBALS['tempadminpath'].'edit-user.html';
include $GLOBALS['tempadminpath'].'footer.html';
