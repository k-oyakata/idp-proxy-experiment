<?php
$dbuser=getenv('DBUSER');
$dbpass=getenv('DBPASS');
$dbport=getenv('DBPORT');
$dbname=getenv('DBNAME');
$dbhost=getenv('DBHOST');

$dbuser = 'postgres';
$dbpass = 'password';
$dbport = '15432';
$dbname = 'courseware';
$dbhost = '192.168.99.100';

$dsn = 'pgsql:dbname='. $dbname . ' host=' . $dbhost. ' port=' . $dbport;
$user = $dbuser;
$password = $dbpass;

$dbh = new PDO($dsn, $user, $password);
$now_tm = "___";
$dbh = new PDO($dsn, $user, $password);
$st = $dbh->query("select current_timestamp as now_tm");
while($row = $st->fetch()){
  $now_tm = $row["now_tm"];
  break;
}
$st = null;
$dbh = null;
?>
<html lang="ja">
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-Control" content="no-cache">
<title>tktk</title>
<body>
<h1>now_tm:[<?php echo $now_tm;?>]</h1>
</body>
</html>