<?php
require_once __DIR__ . '/functions.php';

request_by_temporary_user_login();
# Request to the JupyterHub if local user was authenticated.
request_by_temporary_user_session();
# Request to the JupyterHub if Gakunin user was authenticated.
request_by_fed_user_session();

# No Authenticated
# Redirect to the Login page
//header('Location: /php/login.php'); 
echo get_contents('https://127.0.0.1/php/login.php');
exit;
?>
