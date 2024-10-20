<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user']['email']) && $_SESSION['user']['email'] !== 'admin@gmail.com') {
    header("Location: login.php");
    exit();
}

include 'database.php'; // Include your database connection file

// Handle user deletion
if (isset($_GET['delete'])) {
    $userId = intval($_GET['delete']);

    // Fetch the user's certificate file
    $stmt = $conn->prepare("SELECT certificate FROM userslist WHERE id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $certificateFile = $user['certificate'];

        $filePath = "sertificates/" . $certificateFile;
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Delete the user from the database
        $stmt = $conn->prepare("DELETE FROM userslist WHERE id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();



        $_SESSION['success'] = "User deleted successfully!";
    } else {
        $_SESSION['error'] = "User not found!";
    }
}

// Fetch all users
$stmt = $conn->prepare("SELECT * FROM userslist");
$stmt->execute();
$result = $stmt->get_result();
$users = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">User List</h2>
        <div class="text-end mb-3">
            <!-- Right-aligned button container -->
            <a href="register.php" class="btn btn-primary py-2">Register New User</a> <!-- Bootstrap button -->
        </div>
        <?php
        if (isset($_SESSION['error'])) {
            echo "<div class='alert alert-danger'>{$_SESSION['error']}</div>";
            unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
            echo "<div class='alert alert-success'>{$_SESSION['success']}</div>";
            unset($_SESSION['success']);
        }
        ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Certificate</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                <?php
                    // Skip admin user
                    if ($user['email'] == 'admin@gmail.com') {
                        continue;
                    }
                    ?>
                <tr>
                    <td><?php echo htmlspecialchars($user['id']); ?></td>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                    <td><?php echo htmlspecialchars($user['password']); ?></td>
                    <td>
                        <a href="sertificates/<?php echo htmlspecialchars($user['certificate']); ?>"
                            target="_blank">View Certificate</a>
                    </td>
                    <td>
                        <a href="users.php?delete=<?php echo htmlspecialchars($user['id']); ?>" class="btn btn-danger"
                            onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>