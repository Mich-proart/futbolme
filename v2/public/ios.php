<?php

var_dump($_SERVER['HTTP_USER_AGENT']);

if(strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'],'iPad')) { echo "iPhone or iPad";}

else { echo "Other, non-iOS device"; }
?>