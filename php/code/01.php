<!DOCTYPE html>
<html lang="zh-TW">
<head>
<meta charset="utf-8"/>
<title>01.php</title>
</head>
<body>
<p>
<?php
   $vNo=$_GET['sNo'];
   $vName=$_GET['sName'];
   $vSum=$_GET['sSum'];  
   if (is_numeric($vSum)){
        echo "學號:$vNo<br>";
        echo "姓名:$vName<br>";
        if ($vSum >= 100)
            echo "學期成績超高標";
        elseif ($vSum>=80 && $vSum<100)
            echo "學期成績高標";       
        elseif ($vSum>=60 && $vSum<80)
            echo "學期成績中標";
        else
            echo "學期成績低標";
   }
   else
    print "學期成績請輸入數字<br>";
?>
</p>
</body>
</html>