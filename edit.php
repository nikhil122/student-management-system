<?php
include "config/db.php";

$id = $_GET['id'];

$result = $conn->query("SELECT * FROM students WHERE id=$id");
$row = $result->fetch_assoc();

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $conn->query("UPDATE students SET name='$name', email='$email', course='$course' WHERE id=$id");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Student</title>
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
}

input {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
}

button {
    width: 100%;
    padding: 10px;
    background: orange;
    color: white;
    border: none;
}
</style>
</head>

<body>

<div class="container">
<h2>Edit Student</h2>

<form method="POST">
    <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
    <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
    <input type="text" name="course" value="<?php echo $row['course']; ?>" required>
    <button name="update">Update</button>
</form>

</div>

</body>
</html>