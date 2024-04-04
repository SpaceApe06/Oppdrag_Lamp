<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>LAMP</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div>
            <div id="logg_in_container">  
                <h1>LAMP</h1>   
                <h1 id="logg_in_Title">Logg inn</h1>
                <div id="logg_in">
                    <form method="post" action="log_in.php">

                        <label for="username">Name:</label>
                        <input type="text" id="username" name="username" placeholder="Username" maxlength="20"><br><br>

                        <label for="epost">skriv Epost</label>
                        <input type="text" id="epost" name="epost" placeholder="Epost" maxlength="20"><br><br>

                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" placeholder="Username" maxlength="20"><br><br>

                        <a href="register_page.php">Don't have an account? Sign Up</a>
                        <button id="loginButton" type="submit" >Login</button><br/>
                    </form>
                    <p>CONSPIRACT THEORY: EVEN IS A LLAMA</p>
                </div>
            </div>
        </div>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <script src="" async defer></script>
    </body>
</html>