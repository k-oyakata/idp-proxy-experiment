<?php
require_once('../simplesamlphp/www/_include.php');

$GOTO = 'https://auth-proxy:441/go';

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

function redirect_by_local_user_session()
{
    @session_start();
    if (isset($_SESSION['username'])) {
        header('Location: ' . $GOTO);
        header('Location: ' . 'https://auth-proxy:441/go');        
        exit;
    }
}

function redirect_by_fed_user_session()
{
    $as = new SimpleSAML_Auth_Simple('default-sp');
    if ($as->isAuthenticated()) {
        header('Location: ' . $GOTO);
        exit;
    }
}


function logout_fed()
{
    $as = new SimpleSAML_Auth_Simple('default-sp');
    if ($as->isAuthenticated()) {
        $as->logout();
    }
}

/**
 * CSRFトークンの生成
 *
 * @return string トークン
 */
function generate_token()
{
    // セッションIDからハッシュを生成
    return hash('sha256', session_id());
}

/**
 * CSRFトークンの検証
 *
 * @param string $token
 * @return bool 検証結果
 */
function validate_token($token)
{
    // 送信されてきた$tokenがこちらで生成したハッシュと一致するか検証
    return $token === generate_token();
}

/**
 * htmlspecialcharsのラッパー関数
 *
 * @param string $str
 * @return string
 */
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
