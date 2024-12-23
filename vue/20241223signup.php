<?php
    //input: {"username" : "xxx", "password" : "xxx", "email" : "xxx", "interest" : "xxx"}
    $data = file_get_contents("php://input", "r");
    // echo $data;
    $mydata = array();
    $mydata = json_decode($data, true);// 將字串轉成陣列
    // echo $mydata['username'];
    // echo $mydata['password'];
    // echo $mydata['email'];
    // echo $mydata['interest'];

    if(isset($mydata['username']) && isset($mydata['password']) && isset($mydata['email']) && isset($mydata['interest'])) {//password
        if($mydata['username'] != "" && $mydata['password'] != "" && $mydata['email'] != "" && $mydata['interest'] != "") {
            $p_username = $mydata['username'];
            $p_password = $mydata['password'];
            $p_email = $mydata['email'];
            $p_interest = $mydata['interest'];

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "members";

            $conn = mysqli_connect($servername, $username, $password, $dbname);
            if(!$conn) {
                die("連線錯誤!" . mysqli_connect_error());
            }

            //insert data

            $sql = "INSERT INTO user(Username, Password, Email, Interest) VALUES('$p_username', '$p_password', '$p_email', '$p_interest')";
            if(mysqli_query($conn, $sql)) {
                //新增成功
                echo '{"state" : true, "message" : "新增成功"}';
            }else {
                //新增失敗
                echo '{"state" : false, "message" : "新增失敗"}';
            }
            mysqli_close($conn);
        }else {
            echo '{"state" : false, "message" : "輸入格式錯誤1"}';
        }
    }else {
        echo '{"state" : false, "message" : "輸入格式錯誤2"}';
    }
?>