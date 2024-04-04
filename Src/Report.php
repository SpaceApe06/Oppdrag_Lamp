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

    if(empty($issue)) {
        header ("Location: ticket.php?error=Title is required!");
        exit();
    }
    else if(empty($info)) {
        header ("Location: ticket.php?error=Information is required!");
        exit();
    }

    // Insert user data into the database
    $query = "INSERT INTO Tickets (issue, info) VALUES ('$issue', '$info')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: ticket.php?success=Ticket has been sent");
        exit();
    } else {
        echo "Something went wrong";
    }
}
// if(isset($_POST['ticket']) && isset($_POST['info'])) {

//     function validate($data) {
//         $data = trim($data);
//         $data = stripslashes($data);
//         $data = htmlspecialchars($data);
//         return $data;
//     }
// }

// $ticket = validate($_POST['ticket']);
// $info = validate($_POST['info']);


// $Tresult = mysqli_query($conn, $sql);

?>