<!DOCTYPE html>
<?php
    session_start();        
if(isset($_POST['login'])) 
        {
            $conn = new mysqli('localhost', 'root', '', 'login');

            $userid = $_POST['userid'];
            $_SESSION['username'] = $userid;
            $pwd = $_POST['password'];
            $sql="select password from logindetails where userid='$userid';";
            $result=$conn->query($sql);
            
            $row = $result->fetch_assoc();

            //edge cases
            if($row == NULL)
            {
                echo "<script>alert('No Such Account Found')</script>";
            }
            else if($row['password']==$pwd)
            //return to dashboard if credentials are right 
            {
                header("Location: dashboard.php");
                exit();
            }
            else
            {
                echo "<script>alert('Wrong Password')</script>";
            }
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
    <h1>EasyVaccine</h1>
    <h3>Log-in</h3>
    <div class="main">
        <form action="index.php" method="POST">

            <table>
                <tr>
                    <td>
                        <label for="userid">User ID</label></td>
                    <td>
                        <input type="text" id="userid" name="userid"></td>
                </tr>
                <tr>
                    <td>
                        <label for="password">Password</label></td>
                    <td>
                        <input type="password" id="password" name="password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <p>Don't have an account? <a href="./signup.php">Sign Up</a> instead</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        
                            <input type="submit" value="Login" name="login">
                        
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>