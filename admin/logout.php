<?php 
# session must be started atleast once
session_start();
#session detroy func will remove all session data
session_destroy();
#if a specific session you like to remove then use
#unset($_SESSION['user']);
header('location:index.php');

?>