<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    if(isset($_POST['submit']))
        {
            $conn = new mysqli('localhost', 'root', '', 'login');
            $userid = $_SESSION['username'];
            $age = $_POST['age'];
            $dose = $_POST['dose'];
            $pay = $_POST['pay'];
            $ch = $_POST['ch'];
            $pincode = $_POST['pincode'];
            $time = $_POST['time'];
            $sql = "select * from slots where userid='$userid' and dose='$dose';";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            //update database if 2 querys have same dose number
            if($row == NULL)
            {
                $sql = "insert into slots values('$userid', '$age', '$dose', '$pay', '$ch', '$pincode', '$time');";
                $conn->query($sql);
            }
            else
            {
                $sql = "delete from slots where userid='$userid' and dose='$dose';";
                $conn->query($sql);
                $sql = "insert into slots values('$userid', '$age', '$dose', '$pay', '$ch', '$pincode', '$time');";
                $conn->query($sql);
            }
        }
?>
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
            <h3><a href="./index.php">Log Out</a></h3><br><br>
        </div>
    </div>
    <div class="flex-container">
        <div></div>
        <div>
            <h2>Dashboard</h2>
        </div>
        <div>

        </div>
    </div>
    <div class="main">
        <form action="dashboard.php" method="POST" >
            <table>
                <tr>
                    <td>
                        <label>Age Group</label>
                    </td>
                    <td>
                        <label>Dose 1 or 2</label>
                    </td>
                    <td>
                        <label>Payment</label>
                    </td>
                    <td>
                        <label>Vaccine choice</label>
                    </td>
                    <td>
                        <label>Pincode</label>
                    </td>
                    <td>
                        <label>Timing</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <select name="age" id="age" >
                            <option value="Under 18">Under 18</option>
                            <option value="Between 18 and 45" selected>Between 18 and 45</option>
                            <option value="Over 45">Over 45</option>
                        </select>
                    </td>
                    <td>
                        <select name="dose" id="dose">
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </td>
                    <td>
                        <select name="pay" id="pay">
                            <option value="Free">Free</option>
                            <option value="Paid" selected>Paid</option>
                        </select>
                    </td>
                    <td>
                        <select name="ch" id="ch">
                            <option value="Covaccine">Covaccine</option>
                            <option value="Covishield" selected>Covishield</option>
                            <option value="Sputnik V">Sputnik V</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="pincode" id="pincode" value="560036">
                    </td>
                    <td>
                        <select name="time" id="time">
                            <option value="9:00 - 11:00">9:00 - 11:00</option>
                            <option value="11:00 - 13:00">11:00 - 13:00</option>
                            <option value="13:00 - 15:00">13:00 - 15:00</option>
                            <option value="15:00 - 17:00">15:00 - 17:00</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td colspan="6" align="center">
       
                            <input type="submit" value="Book Your Slot" name="submit">
                   
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        <h3><a href="./view.php">Check booked slots</a></h3>

                    </td>
                </tr>

            </table>
        </form>
    </div>
</body>

</html>