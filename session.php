<?php

if (!isset($_SESSION['loggedin'])) {
  echo "<script>
        alert('you must login first or create an account if you have not, to access all features!');
        window.location.href='login.php';
        </script>";

}

?>

 