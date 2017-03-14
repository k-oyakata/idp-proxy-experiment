<?php
require_once __DIR__ . '/hub-const.php';
require_once __DIR__ . '/const.php';
require_once __DIR__ . '/../simplesamlphp/www/_include.php';

$SESSION_NAME = session_name();

/*
function session_start()
{
    session_set_cookie_params($lifetime);
    @session_start();
}
*/

function request_by_local_user_session()
{
    @session_start();

    if (isset($_SESSION['username'])) {
        header("X-Accel-Redirect: /entrance/");
        header("X-Reproxy-URL: ".HUB_URL.$_SERVER['HTTP_X_REPROXY_URI']);
        exit;
    }
}


/**
 * Logout from the federation
 */
function logout_fed()
{
    $as = new SimpleSAML_Auth_Simple('default-sp');
    if ($as->isAuthenticated()) {
        $as->logout();
    }
}

/**
 * Generate CSRF token based on th session id.
 *
 * @return string  generated token
 */
function generate_token()
{
    return hash('sha256', session_id());
}

/**
 * Validate CSRF token
 *
 * @param string $token  CSRF token
 * @return bool  result of validation
 */
function validate_token($token)
{
    return $token === generate_token();
}

/**
 * Wraper function of the 'htmlspecialchars'
 *
 * @param string $str  source string
 * @return string  entity string
 */
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

function get_username_from_mail_address($mail_address)
{
    $result = "";

    // Convert to lower and remove characters except alphabetic
    $wk = explode("@", $mail_address);
    $local_part = strtolower($wk[0]);
    $result = preg_replace('/[^a-zA-Z]/', '', $local_part);    
    // Add top 6bytes of hash string
    $hash = substr(md5($mail_address), 0, 6);
    $result .= $hash;

    return $result;
}
