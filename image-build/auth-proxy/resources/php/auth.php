<?php
require_once __DIR__ . '/functions.php';

# Redirect to JupyterHub if local user was authenticated.
redirect_by_local_user_session();
# Redirect to JupyterHub if Gakunin user was authenticated.
redirect_by_fed_user_session();

# No Authenticated
# Redirect to the Login page
#header('Location: /php/login.php' . $_SERVER[REQUEST_URI]);
header('Location: /php/login.php');
exit;
?>
