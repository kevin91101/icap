<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "members";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn) {
        die("連線錯誤!" . mysqli_connect_error());
    }

    $sql = "SELECT * FROM user ORDER BY ID DESC";
    $result = mysqli_query($conn, $sql);

    $mydata = array();
    while($row = mysqli_fetch_assoc($result)) {
        $mydata[] = $row;
    }

    echo json_encode($mydata);
    mysqli_close($conn);
?>