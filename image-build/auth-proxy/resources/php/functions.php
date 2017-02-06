<?php
require_once('../simplesamlphp/www/_include.php');

define("HUB_URL", "http://web.demo.org:8080");


function is_authenticated_local_user()
{
    @session_start();
    return isset($_SESSION['username']);
}

function is_authenticated_fede_user()
{
    @session_start();
    return isset($_SESSION['username']);
}


function request_by_local_user_session()
{
    @session_start();
    if (isset($_SESSION['username'])) {
        echo get_contents(HUB_URL);
        exit;
    }
}

function request_by_fed_user_session()
{
    $as = new SimpleSAML_Auth_Simple('default-sp');
    if ($as->isAuthenticated()) {
        echo get_contents(HUB_URL);
        exit;
    }
}

/**
 * Get contents from the specified URL.
 */
function get_contents($url)
{
    $context = stream_context_create(array(
        'http' => array('ignore_errors' => true)
    ));
    $result = file_get_contents($url, false, $context);

    return $result;
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
