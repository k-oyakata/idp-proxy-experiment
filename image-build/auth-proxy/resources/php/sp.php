<?php
require_once __DIR__ . '/const.php';
require_once __DIR__ . '/hub-const.php';
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/../simplesamlphp/www/_include.php';

@session_start();

$as = new SimpleSAML_Auth_Simple('default-sp');
if (! $as->isAuthenticated()) {
    $as->requireAuth();
}
$attributes = $as->getAttributes();
$mail_address = $attributes[GF_ATTRIBUTES['mail']][0];
// Set Session info
session_regenerate_id(true);
$username = get_username_from_mail_address($mail_address);
$_SESSION['username'] = $username;

header("X-Accel-Redirect: /entrance/");
header("X-Reproxy-URL: ".HUB_URL.'/'.COURSE_NAME."/hub/login");
header("X-REMOTE-USER: $username");

exit;
