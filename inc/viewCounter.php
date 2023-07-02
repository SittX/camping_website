<?php
function getIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

function resetIP()
{
    $db = new DatabaseConnection();
    $connection = $db->getConnection();

    $currentDay = date("d");
    $result = $connection->query("SELECT DAY(date) FROM User_logs LIMIT 1;");

    if($result->num_rows >= 1){
        $dbCurrentDay = $result->fetch_assoc()["date"];
        if ($dbCurrentDay != $currentDay) {
            $truncateQuery = "TRUNCATE TABLE User_logs";
            $connection->query($truncateQuery);
        }
    }

}

function saveIP($ip): void
{
    $db = new DatabaseConnection();
    $connection = $db->getConnection();

    // Check if the table is empty
    $result = $connection->query("SELECT COUNT(ip_address) AS total FROM User_logs");
    $totalRows = $result->fetch_assoc()["total"];
    if ($totalRows == 0) {
        resetIP();
    }

    // Check if the IP address already exists
    $stmt = prepareAndExecuteQuery($connection, "SELECT ip_address FROM User_logs WHERE ip_address = ?", "s", $ip);
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        $insertQuery = "INSERT INTO User_logs (ip_address) VALUES (?)";
        prepareAndExecuteQuery($connection, $insertQuery, "s", $ip);
    }
}


$ip = getIpAddr();
saveIP($ip);






