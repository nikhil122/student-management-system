<?php
session_start();
include "config/db.php";

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}

$result = $conn->query("SELECT * FROM students");
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<style>
body {
    font-family: Arial;
    background: #f4f6f9;
}

.container {
    width: 80%;
    margin: 40px auto;
}

h2 {
    text-align: center;
}

.top-bar {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}

a {
    text-decoration: none;
    padding: 8px 12px;
    background: #007bff;
    color: white;
    border-radius: 5px;
}

a.logout {
    background: red;
}

table {
    width: 100%;
    border-collapse: collapse;
    background: white;
}

th, td {
    padding: 12px;
    border: 1px solid #ddd;
    text-align: center;
}

th {
    background: #007bff;
    color: white;
}
a.edit {
    background: orange;
}

a.delete {
    background: red;
}
</style>
</head>

<body>

<div class="container">
    <h2>Student Dashboard</h2>

    <div class="top-bar">
        <a href="add.php">+ Add Student</a>
        <a href="logout.php" class="logout">Logout</a>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Course</th>
            <th>Action</th>
        </tr>

        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['course']; ?></td>
            <td>
    <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
    <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Delete?')">Delete</a>
</td>
        </tr>
        <?php } ?>

    </table>
</div>

</body>
</html>