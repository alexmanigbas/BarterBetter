<?php

$is_invalid = false; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $mysqi = require __DIR__ . "/database.php";

    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                    $mysqli->real_escape_string($_POST["email"]));

    $result = $mysqli -> query($sql);

    $user = $result->fetch_assoc();

    if ($user) {

        if (password_verify($_POST["password"], $user["password_hash"])){
            
            session_start();
            
            session_regenerate_id();
            $_SESSION["user_id"] = $user["id"];

            header("Location: index.php");
            exit;
        }
    }

    $is_invalid = true;

}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="stylesheet" href="./src/main.css">
</head>
<body>
    <div class="container">
    <h1>Login</h1>

    <?php if ($is_invalid): ?>
        <em>Invalid Login </em>
    <?php endif; ?>

    <form class="form" method="post">
        <label for="email">email</label>
        <input type="email" class="form__input" name="email" id ="email"
                value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">

        <label for="password">password</label>
        <input type="password" class="form__input"  name="password" id ="password">
        <p class="form__text">
                <a href="#" class="form__link">Forgot your password?</a>
            </p>
            <p class="form__text">
                <a class="form__link" href="signup.html" id="linkCreateAccount">Don't have an account? Create account</a>
            </p>
        <button>Log in</button>

    </form>
</body>
</html>