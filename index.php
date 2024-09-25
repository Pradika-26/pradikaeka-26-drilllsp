<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" a href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>LOGIN</h1>
        <form action="dashboard.php" method="post">
        <div class="input-grup">
            <input type="text" name="username" required>
            <label for="username">Username</label>
        </div>
        <div class="input-grup">
            <input type="text" name="password" required>
            <label for="password">password</label>
        </div>
        <button  type="submit" name="login">Submit</button>
    </div>
</body>
</html>