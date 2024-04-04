<?php
session_start(); // Start the session
include ("DB_connect.php");

if(isset($_GET['success'])) {
    echo $_GET['success'] . "<br>";
}

if(isset($_SESSION['admin']) && $_SESSION['admin']) {
    // Admin-specific features here
    echo "velkommen SEÑOR eller SEÑORITA admin, You have additional cool stuff.";

    // Prepare SQL query to select all tickets and join with Users table on userID
    $sql = "SELECT Tickets.*, Users.username, Users.Email FROM Tickets JOIN Users ON Tickets.userID = Users.userID";
    $result = mysqli_query($conn, $sql);

    // Fetch the result as an associative array
    $tickets = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Loop through the array and display each ticket
    echo "<div id='adminTickets'>";
    foreach($tickets as $ticket) {
        echo "<div class='ticket'>";
        echo "<h2>" . $ticket['ticket'] . "</h2>";
        echo "<p>Sender: " . $ticket['username'] . " (" . $ticket['Email'] . ")</p>";
        echo "<p>" . $ticket['info'] . "</p>";
        echo "</div>";
    }
    echo "</div>";
} else {
    // Normal user features here
    echo "Velkommen, ønsker du å skrive en ticket?";

    // Check if the user is logged in before trying to access $_SESSION['userID']
    if (isset($_SESSION['userID'])) {
        // Get the userID of the currently logged in user
        $currentUserID = $_SESSION['userID'];

        // Prepare SQL query to select all tickets where userID is the currently logged in user
        $sql = "SELECT Tickets.*, Users.username, Users.Email FROM Tickets JOIN Users ON Tickets.userID = Users.userID WHERE Tickets.userID = '$currentUserID'";
        $result = mysqli_query($conn, $sql);

        // Fetch the result as an associative array
        $tickets = mysqli_fetch_all($result, MYSQLI_ASSOC);

        // Loop through the array and display each ticket
        echo "<div id='userTickets'>";
        foreach($tickets as $ticket) {
            echo "<div class='ticket'>";
            echo "<h2>" . $ticket['ticket'] . "</h2>";
            echo "<p>Sender: " . $ticket['username'] . " (" . $ticket['Email'] . ")</p>";
            echo "<p>" . $ticket['info'] . "</p>";
            echo "</div>";
        }
        echo "</div>";
    } else {
        echo "You are not logged in.";
    }
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
                <div id="Report_Container">

                    <form method="post" action="report.php">
                        <label for="tittel">Hva er problemet</label> <br>
                        <input type="text" id="issue" name="issue" placeholder="Tittel" maxlength="20"><br><br>
                        <label for="info">Skriv om problemet og gi mest mulig nødvendig informasjon </label> <br>
                        <input type="text" id="info" name="info" placeholder="Problem" maxlength="20"><br><br>
                        <button id="ticketButton" type="submit" >Send Ticket</button><br/>
                    </form>

                    <div id="ticketListe">
                        <h1>Tickets Status</h1>
                        <p>Status på alle ticketsene du har sendt</p>

                    </div>
                    <div id="adminListe"> 
                        <h1>Tickets mottat</h1>
                        <p>Liste over Tickets Sendt</p>


                    </div>
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