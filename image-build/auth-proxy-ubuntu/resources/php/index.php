<?php
require_once __DIR__ . '/functions.php';
@session_start();

header('Content-Type: text/html; charset=UTF-8');
?>

<!DOCTYPE html>
<title>Server Information</title>
<a href="/logout.php?token=<?=h(generate_token())?>">ログアウト</a>
<hr>

<h1>$_SERVER</h1>
<table border=1>
<?php
foreach($_SERVER as $key=>$value) {
  echo('<tr><td>' . htmlspecialchars($key) . '</td><td>' . htmlspecialchars($value) . '</td></tr>');
}
?>
</table>
<hr>
<h1>$_SESSION</h1>
<table border=1>
<?php
foreach($_SESSION as $key=>$value) {
  echo('<tr><td>' . htmlspecialchars($key) . '</td><td>' . htmlspecialchars($value) . '</td></tr>');
}
?>
</table>