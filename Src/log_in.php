<?php
session_start();
include "DB_connect.php";


if(isset($_POST['username']) && isset($_POST['password']) && ($_POST['epost'])) {

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

$username = validate($_POST['username']);
$password = validate($_POST['password']);
$epost = validate($_POST['epost']);


if(empty($username)) {
    header ("Location: index.php?error=Username is required!");
    exit();
}
else if(empty($password)) {
    header ("Location: index.php?error=Password is required!");
    exit();
} else if(empty($epost)) {
    header ("Location: index.php?error=Epost is required!");
    exit();
}

$hashed_password = hash("sha256", $password);


$sql = "SELECT * FROM Users WHERE username='$username'"; 

$result = mysqli_query($conn, $sql);


if(mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if ($row['username'] === $username && $row['password'] === $hashed_password && ['epost']=== $epost) {
        echo "Logged in";
        $_SESSION['username'] = $row['username'];
        $_SESSION['epost'] = $row['epost'];
        $_SESSION['id'] = $row['userID'];
        $_SESSION['admin'] = $row['admin'];
        header("Location: ticket.php");
        
        exit();
    }
    else{
        header("Location: index.php?error=Something went wrong, check if username, password or email is correct!");    
        exit();
    }
}
else {
    header("Location: index.php?error=Invalid username or password!");
    exit();
}

?>