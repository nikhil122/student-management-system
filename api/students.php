<?php
include "../config/db.php";

header("Content-Type: application/json");

$result = $conn->query("SELECT * FROM students");

$data = [];

while ($row = $result->fetch_assoc()) {
     $data[] = $row;
}

echo json_encode($data);