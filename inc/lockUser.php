<?php
if (isset($_SESSION["failedLogin"])) {
    echo "Failed login. No more login for next 1 minutes";
}
