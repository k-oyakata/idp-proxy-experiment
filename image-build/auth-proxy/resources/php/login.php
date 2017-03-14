<?php
require_once __DIR__ . '/const.php';
require_once __DIR__ . '/hub-const.php';
require_once __DIR__ . '/functions.php';


$lifetime = 0;
$path = "/";
session_set_cookie_params($lifetime, $path);
@session_start();

// 事前に生成したユーザごとのパスワードハッシュの配列
$hashes = [
    'oyakata' => '$2y$10$iKem16FEuNIhd1Buhz8Oz.shL.AZHw9IKwvZT9GuTWz7s8P4GgJCK',
    'oyakata2' => '$2y$10$iKem16FEuNIhd1Buhz8Oz.shL.AZHw9IKwvZT9GuTWz7s8P4GgJCK',
    'oyakata3' => '$2y$10$iKem16FEuNIhd1Buhz8Oz.shL.AZHw9IKwvZT9GuTWz7s8P4GgJCK',
]; 

// ユーザから受け取ったユーザ名とパスワード
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');

// POSTメソッドのときのみ実行
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        validate_token(filter_input(INPUT_POST, 'token')) &&
        password_verify(
            $password,
            isset($hashes[$username])
                ? $hashes[$username]
                : '$2y$10$abcdefghijklmnopqrstuv' // dummy hash string for when user doesn't exist
        )
    ) {
        session_regenerate_id(true);
        // Set Session info
        $_SESSION['username'] = $username;

        header("X-Accel-Redirect: /entrance/");
        header("X-Reproxy-URL: ".HUB_URL.'/'.COURSE_NAME."/hub/login");
        header("X-REMOTE-USER: $username");

        exit;
    }
    // 「403 Forbidden」
    http_response_code(403);
}

header('Content-Type: text/html; charset=UTF-8');
?>

<!DOCTYPE html>
<title>ログインページ</title>
<h1>ログインしてください</h1>
<form method="post" action="/php/login.php">
    ユーザ名: <input type="text" name="username" value=""></br>
    パスワード: <input type="password" name="password" value=""></br>
    <input type="hidden" name="token" value="<?=h(generate_token())?>">
    <input type="submit" value="ログイン">
</form>
<?php if (http_response_code() === 403): ?> 
<p style="color: red;">ユーザ名またはパスワードが違います</p>
<?php endif; ?>
<a href="/php/sp.php">Other IdP</a>
