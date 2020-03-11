<?php
session_start();
require '../includes/paths/admin.php';
require  $GLOBALS['includesadmin'].'genarlfunctions.php';
require  $GLOBALS['coreadmin'].'secure.php';
require  $GLOBALS ['includesadmin'].'users.class.php';
if(!checklog())
    exit('you are not allowed to view this page');
if(isset($_POST['submit'])&&!empty($_POST['username']) && !empty($_POST['password'])&&!empty($_POST['email']))
{
    $username = secureinputs($_POST['username']);
    $password = secureinputs($_POST['password']);
    $email = secureinputs($_POST['email']);
    $confirm = secureinputs($_POST['conpassword']);
    if (strlen($username) > 5 && strlen($password)>=6 && $password === $confirm)
    {
        $adduser = new users();
        $res = $adduser->adduser($username,$password,$email);
        if ($res == 'done')
        {
            $msg='User added successfully...';
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

include $GLOBALS['tempadminpath'].'header.html';
include$GLOBALS['tempadminpath'].'add-user.html';
include $GLOBALS['tempadminpath'].'footer.html';

