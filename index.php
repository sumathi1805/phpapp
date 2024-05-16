<?php
// Include the configuration file
include 'config.php';

// Database connection parameters
$host = $config['db_host'];
$dbname = $config['db_name'];
$username = $config['db_user'];
$password = $config['db_pass'];

// Connect to the database
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Fetch data from the database
try {
    $stmt = $pdo->query('SELECT * FROM users'); // Change 'users' to your table name
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error fetching data: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Sample Application</title>
</head>
<body>
    <h1>Users</h1>
    <ul>
        <?php foreach ($users as $user): ?>
            <li><?php echo $user['name']; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
