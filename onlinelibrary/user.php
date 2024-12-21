<?php
if (!file_exists('db_connect.php')) {
    die("File db_connect.php không tồn tại!");
}
include('db_connect.php'); 
if (!isset($conn)) {
    die("Biến \$conn chưa được khởi tạo.");
}

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if (!$result) {
    die("Lỗi truy vấn: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User table</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="wrapper">
    <div class="header">
        <img src="images/header.jpg" width="100%" height="200px" alt="Header Image">
    </div>
    <div class="menu">
        <ul class="listmenu">
            <li><a href="index.php">Home</a></li>
            <li><a href="book.php">Book</a></li>
            <li><a href="loanhistory.php">Loan History</a></li>
            <li><a href="user.php">User</a></li>
        </ul>
    </div>
    <div class="main">
        <?php if ($result->num_rows > 0): ?>
            <table border="1">
                <tr>
                    <th>User Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Role</th>
                </tr>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['userId']) ?></td>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['password']) ?></td>
                    <td><?= htmlspecialchars($row['role']) ?></td>
                </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>No data found in the users table.</p>
        <?php endif; ?>
    </div>
    <div class="footer">
    </div>
</div>

</body>
</html>
