<?php
require_once(dirname(__DIR__)."/config.php");
require_once(INC_PATH . "header.php");

if(!SessionManager::checkAdmin()){
    header("Location: " . TEMPLATES_PATH . "accessDenied.php");
}
?>
<h1>You are allowed to view this page.</h1>
<?php
include(INC_PATH. "footer.php") ?>