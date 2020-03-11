<?php
session_start();
require '../includes/paths/admin.php';
require  $GLOBALS['includesadmin'].'genarlfunctions.php';
require  $GLOBALS['coreadmin'].'secure.php';
require  $GLOBALS ['includesadmin'].'users.class.php';
if (checklog())
    exit('you already logged in you wanna log in again !!!');
$err = '';
if(isset($_POST['submit'])&&!empty($_POST['username']) && !empty($_POST['password']))
{
  $username =secureinputs($_POST['username']);
  $password = secureinputs($_POST['password']);

  if (strlen($username) > 5 && strlen($password)>=6)
  {
      $userlog = new users();
      $res = $userlog->login($username,$password);
      @$resno = count($res);
      if ($res > 0)
      {
          $_SESSION['adminlog'] = true;
          $_SESSION['admininfo']=$res[0];
          header( "Location: http://localhost/level1project/admin" );
      }
      else
      {
          $err = 'No user found';
      }
  }
  else
  {
      $err = 'username must be more than 5 chars and password more than 6 ';
  }
}
include$GLOBALS['tempadminpath'].'/login.html';