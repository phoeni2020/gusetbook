<?php
session_start();

session_destroy();

echo '<h3>You\'ll be redirected in about 5 secs.</h3>.';

header("refresh:1; url= http://localhost/level1project");