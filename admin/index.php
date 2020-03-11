<?php
session_start();
require '../includes/paths/admin.php';
require  $GLOBALS['includesadmin'].'genarlfunctions.php';
require  $GLOBALS ['includesadmin'].'users.class.php';


include$GLOBALS['tempadminpath'].'/index.html';