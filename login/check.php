<?php
 
require_once '../functions/init.php';
 
if (!isLoggedIn())
{
    header('Location: form-login.php');
}

?>