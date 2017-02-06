<?php
require_once __DIR__ . '/functions.php';

# Request to the JupyterHub if local user was authenticated.
request_by_local_user_session();
# Request to the JupyterHub if Gakunin user was authenticated.
request_by_fed_user_session();

# No Authenticated
# Redirect to the Login page
#header('Location: /php/login.php' . $_SERVER[REQUEST_URI]);
header('Location: /php/login.php');
exit;
?>
