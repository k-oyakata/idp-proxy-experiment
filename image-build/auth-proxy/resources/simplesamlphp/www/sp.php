<?php
require_once('_include.php');

$as = new SimpleSAML_Auth_Simple('default-sp');
if ($as->isAuthenticated()) {
//header('Location: http://web.demo.org:8080');
/*
echo('<html><body><table>');
foreach($_SERVER as $key=>$value) {
    echo('<tr><td>' . htmlspecialchars($key) . '</td><td>' . htmlspecialchars($value) . '</td></tr>');
  }
  echo('</table></body></html>');
 */
  //$as->logout();
} else {
  $as->requireAuth();
  //$attributes = $as->getAttributes();
  //if ($as->isAuthenticated()) {
    //header('Location: http://web.demo.org:8080');
  //}
  # print_r($attributes);
}

