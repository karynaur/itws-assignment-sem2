<!DOCTYPE html>
<?php
    if(isset($_POST['signup']))// onclick button of name "signup"
        {
            //make connection to `login` database
            $conn = new mysqli('localhost', 'root', '', 'login');
            $userid = $_POST['userid'];
            $ph = $_POST['ph'];
            $email = $_POST['email'];
            $pwd = $_POST['password'];
            
            //make the query
            $sql = "insert into logindetails(userid, email, phone, password) values('$userid', '$email', '$ph', '$pwd');";
            $conn->query($sql);
            
            //return to login
            header("Location: index.php");
            exit();
        }
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyVaccine</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
    <script>
        function check(){
            if
        }
    </script>

    <h1>EasyVaccine</h1>
    <h3>Sign-Up</h3>
    <div class="main">
        <form action="signup.php" method="POST">
            <table>
                <tr>
                    <td>
                        <label for="userid">User ID</label></td>
                    <td>
                        <input type="text" name="userid" required></td>
                </tr>
                <tr>
                    <td>
                        <label for="email">Email</label></td>
                    <td>
                        <input type="email"  name="email" required></td>
                </tr>
                <tr>
                    <td>
                        <label for="ph">Phone Number</label></td>
                    <td>
                        <input type="text"  name="ph" required></td>
                </tr>
                <tr>
                    <td>
                        <label for="password">Password</label></td>
                    <td>
                        <input type="password" name="password" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <p>Already have an account? <a href="./index.php">Log in</a> instead</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="Creat an Account" name="signup">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>