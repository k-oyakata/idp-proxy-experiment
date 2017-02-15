<?php
require_once('../simplesamlphp/www/_include.php');

define("HUB_URL", "http://192.168.33.88:8000");

function is_authenticated_temporary_user()
{
    @session_start();
    return isset($_SESSION['username']);
}

function is_authenticated_fede_user()
{
    @session_start();
    return isset($_SESSION['username']);
}

function request_by_temporary_user_session()
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

function request_by_temporary_user_login()
{
    @session_start();

    $hashes = [
        'user' => '$2y$10$iKem16FEuNIhd1Buhz8Oz.shL.AZHw9IKwvZT9GuTWz7s8P4GgJCK',
    ]; 

    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (
            validate_token(filter_input(INPUT_POST, 'token')) &&
            password_verify(
                $password,
                isset($hashes[$username])
                    ? $hashes[$username]
                    : '$2y$10$abcdefghijklmnopqrstuv' // ユーザ名が存在しないときだけ極端に速くなるのを防ぐ
            )
        ) {
            echo 'OK<br>';
            session_regenerate_id(true);
            // Set Session info
            $_SESSION['username'] = $username;
            // Go to JupyterHub
            echo get_contents(HUB_URL);
            exit;
        }
        // 「403 Forbidden」
        http_response_code(403);
    }
}

/**
 * Get contents from the specified URL.
 */
function get_contents($url, $method='GET', $request_headers=array(), $post_data=array())
{
    $headers = "";
    foreach ($request_headers as $name => $value) {
        $headers .= "$name: $value\r\n";
    }
    $data = http_build_query($post_data);

    $context = stream_context_create(array(
        'http' => array(
            //'method' => $_SERVER['REQUEST_METHOD'],
            'method' => $method,
            'ignore_errors' => true,
            'header' => $headers,
            'content' => $data,
        ),
        'ssl' => array(
            'verify_peer'=>false,
            'verify_peer_name'=>false,
        ),
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
