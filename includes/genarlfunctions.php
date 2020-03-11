<?php
function checklog($seesion)
{
    if(isset($_SESSION[$seesion]))
    {
        return true;
    }
    elseif (isset($_SESSION['creatorlog']))
    {
        return true;
    }
    return false;
}