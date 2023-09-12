<?php require_once 'dbconfig.php' ?>

<?php

session_start();

if (!isset($_POST['username'], $_POST['password'])) {
    exit("Please fill both the username and password!");
}

//codes for log in
if ($stmt = $mysqli->prepare('SELECT id, u_pass,user_type FROM tblregister WHERE username = ?')) { 
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password, $type);
        $stmt->fetch();

//this codes confirming the password in register table, if true it will redirect into disignated location according to your user type
        if ($_POST['password'] === $password) {
            session_regenerate_id();
            $_SESSION['loggedin'] = true;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['username'] = $_POST['username'];

            $_SESSION['id'] = $id;

//if the password is true the if statement about the type user will confirm also ang redirect you to the page were user type is.
            if ($type === 'admin') {
                header('location: admin/addproduct.php');
                if ($type === 'user') {
                    header("location:product.php");
                } else {
                    header("location: admin/addproduct.php");
                }
            } else {
                header("location:index.php");
            }
        } else {
            echo "incorrect password";
        }
    } else {
        echo "incorrect password and username";
    }

    $stmt->close();
}
?>