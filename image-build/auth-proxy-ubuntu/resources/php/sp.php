<?php
require_once('../simplesamlphp/www/_include.php');

#
$as = new SimpleSAML_Auth_Simple('default-sp');
if ($as->isAuthenticated()) {
    header('Location: http://web.demo.org:8080');
} else {
  $as->requireAuth();
  if ($as->isAuthenticated()) {
    header('Location: http://web.demo.org:8080');
  }
}

