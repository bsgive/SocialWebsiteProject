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
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>Student Social | Edit Users</title>
      <link rel="stylesheet" href="stylesheets.css" />
  </head>

  <body class="addUsers">
    <div class = "addusers">

      <div class ="adding">      
        <h1>Add New User</h1>
        <form method="post">
          <div class="row">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
          </div>
          <div class = "buts">
            <button type="submit">Add User</button>
            <a class = "subbut" href="users.php">← Back to user list</a>
          </div>
        </form>

      <div>
    <div>

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