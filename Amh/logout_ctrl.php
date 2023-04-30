<?php

session_destroy();
$last = -10 + time();

setcookie(logged, date("F js - g:i a"), $last);

header('location:login.php');


?> 