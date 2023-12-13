<!-- /app/views/register.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            text-align: center;
            margin: 50px;
        }

        h1 {
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
            color: #333;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        p {
            margin-top: 15px;
            color: #777;
        }

        a {
            color: #3498db;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .error-message {
            color: #e74c3c;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Welcome to Our Platform</h1>

    <form method="POST" action="/register">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Register</button>
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$registrationSuccess) : ?>
        <p class="error-message">Registration failed. Please try again.</p>
    <?php endif; ?>

    <p>Already have an account? <a href="/login">Login here</a>.</p>
</body>
</html>