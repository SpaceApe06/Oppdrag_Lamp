<?php
session_start(); // Start the session
include ("DB_connect.php");

if(isset($_SESSION['admin']) && $_SESSION['admin']) {
    // Admin-specific features here
    echo "velkommen SEÑOR eller SEÑORITA admin, You have additional cool stuff.";
} else {
    // Normal user features here
    echo "Velkommen, ønsker du å skrive en ticket?";
}
?>

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
            <div id="Ticket_container">  
                <h1>LAMP Ticket</h1>   
                <h1 id="Report">Send Ticket</h1>
                <div id="Report">
                    <form action="post" action="/report.php">
                        <label for="tittel">Hva er problemet</label>
                        <input type="text" id="ticketTittel" name="Problem" placeholder="Tittel" maxlength="20"><br><br>
                        <label for="info">Skriv om problemet og gi mest mulig nødvendig informasjon </label>
                        <input type="text" id="ticketInfo" name="info" placeholder="Problem" maxlength="20"><br><br>
                        <button id="ticketButton" type="submit" >Send Ticket</button><br/>
                    </form>
                    <a id="logOut" href="log_out.php">Log Out</a>       
                </div>
            </div>
        </div>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <script src="" async defer></script>
    </body>
</html>