<?php
function prepareAndExecuteQuery($connection, $query, $types, ...$params): mysqli_stmt
{
    $stmt = $connection->prepare($query);
    $stmt->bind_param($types, ...$params);

    if (!$stmt->execute()) {
        throw new mysqli_sql_exception("Error during the SQL statement execution.");
    }

    return $stmt;
}

function fetchList($connection, $query, $mapper)
{
    $stmt = $connection->prepare($query);

    if (!$stmt->execute()) {
        throw new mysqli_sql_exception("Error executing the given sql statement.");
    }

    $mysqli_result = $stmt->get_result();
    $dataList = [];
    while ($row = $mysqli_result->fetch_assoc()) {
        $data = $mapper($row);
        $dataList[] = $data;
    }
    $stmt->close();
    return $dataList;
}
