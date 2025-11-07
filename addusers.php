<?php   
include 'database.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // hash the password

    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);
    $stmt->execute();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
</head>
<body>

<h2>Add New User</h2>
<form method="post">
    <input type="text" name="username" placeholder="Username" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Add User</button>
</form>

<a href="users.php">← Back to user list</a>

</body>
</html>