<?php
if (isset($_COOKIE["failedLogin"])) {
    // echo "<script>window.location='../pages/login.php';</script>";
    echo "Failed login. No more login for next 1 minutes";
}
