<?php
include "config/db.php";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

  $stmt = $conn->prepare("INSERT INTO students (name, email, course) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $course);
$stmt->execute();

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Student</title>
<style>
body {
    font-family: Arial;
    background: #f4f6f9;
}

.container {
    width: 400px;
    margin: 80px auto;
    background: white;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

h2 {
    text-align: center;
}

input {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border-radius: 5px;
    border: 1px solid #ccc;
}

button {
    width: 100%;
    padding: 10px;
    background: #28a745;
    color: white;
    border: none;
    border-radius: 5px;
}

button:hover {
    background: #218838;
}

a {
    display: block;
    margin-top: 10px;
    text-align: center;
}
</style>
</head>

<body>

<div class="container">
    <h2>Add Student</h2>

    <form method="POST">
        <input type="text" name="name" placeholder="Enter Name" required>
        <input type="email" name="email" placeholder="Enter Email" required>
        <input type="text" name="course" placeholder="Enter Course" required>
        <button name="submit">Add Student</button>
    </form>

    <a href="index.php">← Back</a>
</div>

</body>
</html>