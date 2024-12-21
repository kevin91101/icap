<?php include 'header.php';
    include 'db_open.php';
    if (isset($_GET['ID'])) {
        $id = $_GET['ID'];
        $sql = "SELECT * from members where ID = '$id'";
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $tel = $row['tel'];
        $cid = $row['cid']; 
    }
    if(isset($_POST['mid'])){
        $id = $_POST['mid'];
        $name = $_POST['mname'];
        $tel = $_POST['mtel'];
        $cid = $_POST['cid'];
        // echo $id, $name, $tel;
        $sql = "UPDATE members SET name = '$name', tel = '$tel', cid ='$cid' where ID = '$id'";
        if (mysqli_query($link, $sql)) {
            echo "<script>alert('修改成功');</script>";
        }else
        echo "<script>alert('修改失敗');</script>";
    }
?>
<div class="col-lg-12">
                        <div class="card alert">
                            <div class="card-header">
                                <h2>修改會員資料</h2><Br/>
                                 <div class="row">
                                
                                
                                </div>
                            </div>
                            
                            <div class="card-body">
                                <div class="horizontal-form">
                                    <form method="post" enctype="multipart/form-data" action="updatemember.php" class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">會員編號：</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="mid" class="form-control" value="<?=$id?>" placeholder="會員編號" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">會員名稱：</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="mname" value="<?=$name?>"  class="form-control" placeholder="會員名稱">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">電話號碼：</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="mtel" value="<?=$tel?>"  class="form-control" placeholder="電話號碼">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">居住地：</label>
                                            <div class="col-sm-10">
                                                <?php
                                                include 'db_open.php';
                                                $sql = "select * from city order by cid";
                                                $result=mysqli_query($link, $sql)
                                                ?>
                                                <select size="1" name="cid" class="form-control" >
                                                    <?php 
                                                    while ($row2 = mysqli_fetch_assoc($result)){
                                                        if($cid == $row2['cid']) {
                                                            echo "<option value=\"".$row2['cid']."\" selected>".$row2['cname']."</option>";
                                                        }
                                                        else{
                                                            echo "<option value=\"".$row2['cid']."\">".$row2['cname']."</option>";
                                                        }
                                                    }
                                                    ?>     
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5"><i class="ti-check"></i>確認</button>
                                                <a href="member.php"><button type="button" class="btn btn-default btn-flat btn-addon m-b-10 m-l-5"><i class="ti-close"></i>離開</button></a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                     </div>
<?php include 'footer.php'; ?>