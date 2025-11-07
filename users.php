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
    <title>User List</title>
</head>
<body>

<h2>User List</h2>

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

</body>
</html>