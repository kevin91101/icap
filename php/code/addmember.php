<?php include 'header.php';
if (isset($_POST['mid'])) {
    $id = $_POST['mid'];
    $name = $_POST['mname'];
    $tel = $_POST['mtel'];
    $cid = $_POST['cid'];
    include 'db_open.php';
    $sql = "insert into members(ID, name, tel, cid) values ('$id', '$name', '$tel', '$cid')";
    if(mysqli_query($link, $sql)) 
        echo "<script>alert('新增成功')</script>";
    else
        echo "<script>alert('新增失敗')</script>";
}
?>
                    <div class="col-12">
                        <div class="card alert">
                            <div class="card-header">
                                <h2>新增會員</h2>
                                <br>
                                <div class="row"></div>
                            </div>
                            <div class="card-body">
                                <div class="horizontal-form">
                                    <form method="post" enctype="multipart/form-data" action="addmember.php" class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">會員編號：</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="mid" class="form-control" placeholder="會員編號">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">會員名稱：</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="mname" class="form-control" placeholder="會員名稱">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">會員手機：</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="mtel" class="form-control" placeholder="會員手機">
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
                                                    while ($row = mysqli_fetch_assoc($result)){
                                                    echo "<option value=\"".$row['cid']."\">".$row['cname']."</option>";
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
<? include 'footer.php' ?>