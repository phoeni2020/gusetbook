<?php
function checklog()
{
    if(isset($_SESSION['adminlog']))
    {
        return true;
    }
    return false;
}