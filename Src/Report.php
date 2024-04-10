<?php
session_start();
include "DB_connect.php";

function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $issue = validate($_POST["issue"]);
    $info = validate($_POST["info"]);
    $userID = $_SESSION["userID"];
    $status = "0";

    if(empty($issue)) {
        header ("Location: ticket.php?error=Title is required!");
        exit();
    }
    else if(empty($info)) {
        header ("Location: ticket.php?error=Information is required!");
        exit();
    }

    // Insert user data into the database
    $query = "INSERT INTO Tickets (issue, info, userID, status) VALUES ('$issue', '$info', '$userID', '$status')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: ticket.php?success=Ticket has been sent");
        exit();
    } else {
        echo "Something went wrong";
    }
}

?>