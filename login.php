<?php 
session_start();
include 'header.php';
include 'db/connection.php';
if( isset( $_POST['login'] ) ) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $username_query = "SELECT * FROM user WHERE username = '$username'";
    $query = mysqli_query( $conn, $username_query );
    $username_count = mysqli_num_rows( $query );
    if( $username_count ) {
        $fetch = mysqli_fetch_array( $query );
        $fetch_password = $fetch['password'];
        $_SESSION['mims'] = 'Medicine Inventory Management System';
        if( $password === $fetch_password ) {
            header('Location: http://localhost/medicine-inventory/');
        }
        else {
            echo "Incorrect Username";
        }
    }
}
?>
<body>
    <div class="form-wrapper">
        <div class="login-from">
            <h2 class="signup-text">Medicine Inventory Management System</h2>
            <hr class="register-hr">
            <hr>
            <form action="<?php htmlentities($_SERVER['PHP_SELF'])?>" method="POST" class="mt-4">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control fadeIn" name="username" id="username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control fadeIn" name="password" id="password">
                </div>
                <div class="form-group mt-2">
                    <label for="login"></label>
                    <input type="submit" class="form-control btn btn-success" name="login" id="login" value="LOGIN">
                </div>
            </form>
        </div>
    </div>
</body>
<html>