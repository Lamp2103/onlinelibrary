<?php
if (!file_exists('db_connect.php')) {
    die("File db_connect.php không tồn tại!");
}
include('db_connect.php'); 
if (!isset($conn)) {
    die("Biến \$conn chưa được khởi tạo.");
}

$sql = "SELECT * FROM activity";
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
    <title>Books Table</title>
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
                    <th>Type</th>
                    <th>Loan date</th>
                    <th>Return date</th>
                    <th>Book ID</th>
                    <th>User ID</th>
                    <th>Status</th>
                </tr>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['type']) ?></td>
                    <td><?= htmlspecialchars($row['loandate']) ?></td>
                    <td><?= htmlspecialchars($row['returndate']) ?></td>
                    <td><?= htmlspecialchars($row['bookId']) ?></td>
                    <td><?= htmlspecialchars($row['userId']) ?></td>
                    <td><?= htmlspecialchars($row['status']) ?></td>
                </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>No data found in loan history.</p>
        <?php endif; ?>
    </div>
    <div class="footer">
    </div>
</div>

</body>
</html>
