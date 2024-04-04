<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="Logg_inn_container"> 
            <h2>Register</h2>
            <div id="Logg_inn">
                <form action="register.php" method="post">
                    <div id=brukernavnPassord>
                        <label for="username">Name:</label>
                        <input type="text" name="username" required>
                    </div>
                    <div id=brukernavnPassord>
                        <label for="epost">Epost:</label>
                        <input type="text" name="epost" required>
                    </div>
                    <div id=brukernavnPassord>
                        <label for="password">Password:</label>
                        <input type="password" name="password" required>
                    </div>
                    <div id=brukernavnPassord>
                        <label for="confirm_password">Confirm Password:</label>
                        <input type="password" name="confirm_password" required>
                    </div>
                    <button type="submit" id="loginButton" >Register</button>
                </form>
            </div>
            <p>Already have an account? <a href="index.php">Login here</a></p>
        </div>
    </body>
</html>
