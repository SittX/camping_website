<?php

function fetchRecord($connection, $prepareStatement, $types, ...$params,)
{
    $stmt = $connection->prepare($prepareStatement);

    if (!$stmt) {
        throw new mysqli_sql_exception("Error during query preparation: " . $connection->error);
    }

    $stmt->bind_param($types, ...$params);
    if ($stmt->execute_query()) {
        throw new mysqli_sql_exception("Error during the SQL statement execution.");
    }

    $result = $stmt->get_result();

    return $result->fetch_assoc();
}

function prepareAndExecuteQuery($connection, $prepareStatement, $types, ...$params): mysqli_stmt
{
    $stmt = $connection->prepare($prepareStatement);
    if (!$stmt) {
        throw new mysqli_sql_exception("Error during query preparation: " . $connection->error);
    }

    $stmt->bind_param($types, ...$params);
    if (!$stmt->execute()) {
        throw new mysqli_sql_exception("Error during the SQL statement execution.");
    }

    return $stmt;
}

function executeQuery($connection, $query)
{
    $stmt = $connection->prepare($query);
    $stmt->execute();
}
