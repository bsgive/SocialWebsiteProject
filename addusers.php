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
 <footer>
    <div class="footerText">
      <div class="name"> 
        <p>&copy; 2025 Malik Robinson, Ben Givens. All rights reserved.</p> 
      </div>
      <div class="Links">
        <p><a href="users.php">Edit Users</a></p>
        <p><a href="index.html">Main Page</a></p>
        <p><a href="logout.php">Logout</a></p>
        <p><a href="termsandcons.html">Terms and Conditions</a></p>
        <p><a href="privacy.html">Privacy Policy</a></p>
        <p><a href="cookie.html">Cookie Policy</a></p>  
      </div>
    </div>
  </footer>
</body>
</html>