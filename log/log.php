<?php
// Database connection parameters
$host = 'localhost';
$dbname = 'expense_tracker'; // Replace with your database name
$username = 'root';  // Replace with your database username
$password = '';      // Replace with your database password

// Connect to the database
try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Database connection failed: " . $e->getMessage());
}

// Handle login form submission
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $user = $_POST['username'] ?? '';
  $pass = $_POST['password'] ?? '';

  if (!empty($user) && !empty($pass)) {
    // Check credentials in the database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $user);
    $stmt->execute();
    $userRecord = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($userRecord && $pass === $userRecord['password']) {
      // Successful login - redirect to index.php
      header("Location: ../public_html/index.php");
      exit();
    } else {
      // Invalid credentials
      $message = "Invalid username or password.";
    }
  } else {
    $message = "Please fill in all fields.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f9;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    form {
      width: 100%;
      max-width: 400px;
      padding: 20px;
      background: #ffffff;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    h2 {
      margin-bottom: 20px;
      text-align: center;
      color: #333;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ddd;
      border-radius: 5px;
    }

    button {
      width: 100%;
      padding: 10px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
    }

    button:hover {
      background-color: #0056b3;
    }

    .message {
      margin-top: 20px;
      text-align: center;
      color: #d9534f;
    }
    
    .login-link {
      text-align: center;
      margin-top: 20px;
    }

    .login-link a {
      color: #007bff;
      text-decoration: none;
    }

    .login-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <form method="POST" action="">
    <h2>Login</h2>
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
    <div class="message">
      <?= htmlspecialchars($message) ?>
    </div>
     <!-- Link to login page if the user already has an account -->
    <div class="login-link">
      <p>Already have an account? <a href="signUp.php">Sign UP here</a></p>
    </div>
  </form>
</body>

</html>