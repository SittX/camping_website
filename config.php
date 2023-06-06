<?php
// Database configuration
if (!defined("DB_HOST")) define("DB_HOST", "localhost");
if (!defined("DB_USERNAME")) define("DB_USERNAME", "kellot");
if (!defined("DB_PASSWORD")) define("DB_PASSWORD", "kellot");
if (!defined("DB_NAME")) define("DB_NAME", "campsite_db");

// Base path
if(!defined("BASE_PATH")) define("BASE_PATH","/camping_website");

// File paths configuration
// Application/../../....../camping_website
if(!defined("ROOT_PATH")) define("ROOT_PATH",dirname(__FILE__));

// camping_website/models/
if(!defined("MODEL_PATH")) define("MODEL_PATH",ROOT_PATH."/models/");

// camping_website/data/
if(!defined("DATA_PATH")) define("DATA_PATH",ROOT_PATH . "/data/");

// camping_website/classes/DatabaseConnection
if(!defined("DB_CONNECTION")) define("DB_CONNECTION",ROOT_PATH . "/classes/DatabaseConnection.php");

// camping_website/utils/
if(!defined("UTILS_PATH")) define("UTILS_PATH",ROOT_PATH . "/utils/");

// camping_website/inc/
if(!defined("INC_PATH")) define("INC_PATH",ROOT_PATH . "/inc/");

/* HTML and other static resource path.We can't use absolute path to the path */

// camping_website/pages/
if(!defined("PAGES_PATH")) define("PAGES_PATH", "/camping_website/pages/");

// camping_website/templates/
if(!defined("TEMPLATES_PATH")) define("TEMPLATES_PATH", "/camping_website/templates/");

// camping_website/admin/
if(!defined("ADMIN")) define("ADMIN_PATH", "/camping_website/admin/");

// camping_website
if(!defined("STATIC_PATH")) define("STATIC_PATH", "/camping_website/static/");
