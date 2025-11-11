<?php
include 'database.php';
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM users WHERE id = $id");
    //header("Location: index.php");
    //exit();
}

$result = $conn->query("SELECT * FROM users");
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
        <h1>User List</h1>
        <ul>
            <?php while($row = $result->fetch_assoc()): ?>
                <li>
                    <?= htmlspecialchars($row['username']) ?>
                    <a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Delete this user?')">
                        <button class="delete-btn">Delete</button>
                    </a>
                </li>
            <?php endwhile; ?>
        </ul>

        <form action="addusers.php" method="get">
            <button class="add-btn">Add New User</button>
        </form>
      </div>
    </div>
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