<?php
if (!checklog('adminlog') || !checklog('creatorlog'))
    exit('you are not allowed to view this page');