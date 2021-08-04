<?php
    session_start();
    $userid = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyVaccine</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
    <div class="flex-container">
        <div></div>
        <div>
            <h1>EasyVaccine</h1>
        </div>
        <div>
            <h3><a href="./index.php">Log Out</a></h3>
        </div>
    </div>
    <div class="flex-container">
        <div></div>
        <div>
            <h2>Booked Slots for <?php echo "$userid"; ?></h2>
        </div>
        <div>
        </div>
    </div>
    <div class="main">
            <table>
            <?php
                $conn = new mysqli('localhost', 'root', '', 'login');
                $sql = "select dose from slots where userid='$userid'";
                $result = $conn->query($sql);
                
                while($row = $result->fetch_assoc())
                {
                    //append result from the database to table
                    $doseno = $row['dose'];
                    echo "<tr><td>Dose $doseno</td><td>Booked</td><td><form method='POST' action='delete.php'><input type='submit' name='delete$doseno' value='Delete This'></form></td></tr>";
                }
            ?>
            <tr>
                <td colspan="3">
                <a href="dashboard.php">Go Back To Dashboard</a>
                </td>
            </tr>
            </table>
            <br>
    </div>
</body>

</html>