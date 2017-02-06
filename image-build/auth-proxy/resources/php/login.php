<?php
require_once __DIR__ . '/functions.php';
@session_start();

// 事前に生成したユーザごとのパスワードハッシュの配列
$hashes = [
    'user' => '$2y$10$iKem16FEuNIhd1Buhz8Oz.shL.AZHw9IKwvZT9GuTWz7s8P4GgJCK',
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
                : '$2y$10$abcdefghijklmnopqrstuv' // ユーザ名が存在しないときだけ極端に速くなるのを防ぐ
        )
    ) {
        // 認証が成功したとき
        // セッションIDの追跡を防ぐ
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

header('Content-Type: text/html; charset=UTF-8');
$path_info = isset($_SERVER[PATH_INFO]) ? $_SERVER[PATH_INFO] : "none";
echo $path_info.'<br>';
?>
<!DOCTYPE html>
<title>ログインページ</title>
<h1>ログインしてください</h1>
<form method="post" action="">
    ユーザ名: <input type="text" name="username" value=""></br>
    パスワード: <input type="password" name="password" value=""></br>
    <input type="hidden" name="token" value="<?=h(gen_token())?>">
    <input type="submit" value="ログイン">
</form>
<?php if (http_response_code() === 403): ?> 
<p style="color: red;">ユーザ名またはパスワードが違います</p>
<?php endif; ?>
<a href="/php/sp.php">Other IdP</a>
