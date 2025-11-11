<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: forms.php");
    exit();
}
include 'database.php';

//save post if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_text'])) {
    $submittedText = trim($_POST['user_text']);
    if ($submittedText !== '') {
        $safeText = htmlspecialchars($submittedText);
        $username = $_SESSION['user'];

        $stmt = $conn->prepare("INSERT INTO posts (username, content) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $safeText);
        $stmt->execute();
    }
}

//get all posts
$allPosts = [];
$result = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $allPosts[] = "[" . $row['created_at'] . "] " . htmlspecialchars($row['username']) . ": " . htmlspecialchars($row['content']);
    }
}
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Student Social | Home Page</title>
  <link rel="stylesheet" href="stylesheets.css" /> 
</head>
<body>
  <div class="container">
  <div class="left2">

  <h1>Welcome,  <span class="highlight2"><?php echo htmlspecialchars($_SESSION['user']); ?></span>!</h1>
  <p>You are logged in.</p>

  <p>Tell us what's on your mind:</p>
  <form action="home.php" method="POST">
      <label for="user_text">Start Posting:</label><br>
      <textarea id="user_text" name="user_text" rows="5" cols="40"></textarea><br>
      <input type="submit" value="Submit">
  </form>
</div>
  <div class="right2">
  <h2><span class="highlight2">Timeline:</span></h2>
  <?php
  if (!empty($allPosts)) {
      $allPosts = array_reverse($allPosts);  //show newest posts first
      foreach ($allPosts as $post) {
          echo "<p>" . htmlspecialchars($post) . "</p>";
      }
  } else {
      echo "<p>No posts yet. Be the first to post something!</p>";
  }
  ?>
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
 