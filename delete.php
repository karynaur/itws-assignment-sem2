<?php
    //to delete a query
    session_start();
    if(isset($_POST['delete1']))
    {
        $userid = $_SESSION['username'];
        $conn = new mysqli('localhost', 'root', '', 'login');
        $sql = "delete from slots where userid='$userid' and dose='1';";
        $conn->query($sql);
        header("Location: view.php");
        exit();
    }
    if(isset($_POST['delete2']))
    {
        $userid = $_SESSION['username'];
        $conn = new mysqli('localhost', 'root', '', 'login');
        $sql = "delete from slots where userid='$userid' and dose='2';";
        $conn->query($sql);
        header("Location: view.php");
        exit();
    }
?>