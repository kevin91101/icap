<?php include 'header.php'; ?>
<?php
 if (isset($_GET['mode'])){
$mode = $_GET['mode'];

// Data Region
switch ($mode) {
	case "delete":
		$id = $_GET['id'];
		$mode = "browse";
        require 'db_open.php';
        $sql = "delete FROM members where ID='".$id."'"; // 指定SQL查詢字串
     
   //     echo "SQL查詢字串: $sql <br/>";
        // 送出查詢的SQL指令

		if ($result = mysqli_query($link, $sql)) {
			echo "<script>redirectDialog('$ThisFileName','$mode', 'ID: $id 的資料已刪除!');</script>";
		} else {
			echo "<script>redirectDialog('$ThisFileName', '$mode', '刪除失敗');</script>";
		}
		break;

}}
?>				
				<div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-header">
                                    <h2>會員資料管理</h2><Br/>
									 <div class="row">
									<a href="addmember.php" ><button type="button" class="col-lg-2 btn btn-primary btn-flat btn-addon m-b-10 m-l-20"><i class="ti-plus"></i>新增會員 </button></a>
									<div class="basic-form col-lg-8"  style="float:right;">
                                        <form>
                                            
                                            <div class="form-group">
                                                
                                                <div class="input-group input-group-default">
                                                </div>
                                            </div>
                                            
                                            
                                        </form>
                                    </div>
									</div>
                                </div>
                                <?php
                                // 建立MySQL的資料庫連接 
                                            require 'db_open.php';
                                            $sql = "SELECT ID,name,tel,members.cid,cname from members left join city on members.cid=city.cid order by ID asc"; // 指定SQL查詢字串
                                       //     echo "SQL查詢字串: $sql <br/>";
                                            $records_per_page = 3;  // 每一頁顯示的記錄筆數
                                            // 取得URL參數的頁數
                                            if (isset($_GET["page"])) $page = $_GET["page"];
                                            else                       $page = 1;

                                            // 送出查詢的SQL指令

                                            if ( $result = mysqli_query($link, $sql)) { 
                                              
                                                $total_records=mysqli_num_rows($result);  // 取得記錄數
                                                // 計算總頁數
                                                $total_pages = ceil($total_records/$records_per_page);
                                                 // 計算這一頁第1筆記錄的位置
                                                $offset = ($page - 1)*$records_per_page;
                                                mysqli_data_seek($result, $offset);} // 移到此記錄

                                    
                                ?>                                              
								<div class="card-body">
                                    <table class="table table-responsive table-striped m-t-30">
                                        <thead>
                                            <tr style="border-top:1px solid #e7e7e7;">
                                                <th>會員編號</th>
                                                <th>會員姓名</th>
                                                <th>電話號碼</th>
                                                <th>居住地代號</th>
                                                <th>居住地</th>
                                                <th>共<?=$total_records?>筆資料</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            $j=1;
                                            while( $row = mysqli_fetch_assoc($result) and $j <= $records_per_page ){ 
                                                echo "<tr>\n";
                                                echo "<th scope=\"row\">".$row['ID']."</th>\n";
                                                echo "<td>".$row["name"]."</td>\n";
                                                echo "<td>".$row["tel"]."</td>\n";
                                                echo "<td>".$row["cid"]."</td>\n";
                                                echo "<td>".$row["cname"]."</td>\n";
                                                
                                                echo "<td><a href=\"updatemember.php?ID=".$row['ID']."\"><button type=\"button\" class=\"btn btn btn-info btn btn-flat btn-addon btn-sm m-b-5 m-l-5\"><i class=\"ti-pencil-alt\"></i>修改</button></a>\n";
                                                echo "<button type=\"button\" class=\"btn btn btn-default btn btn-flat btn-addon btn-sm m-b-5 m-l-5\" onclick=\"javascript:deleteConfirm('member.php', '".$row["ID"]."')\"><i class=\"ti-trash\"></i>刪除</button></td>";
                                                echo "</tr>"; 
                                                $j++;
                                            }     
                                            mysqli_free_result($result); // 釋放佔用記憶體
                                            mysqli_close($link);  // 關閉資料庫連接
                                            ?>    

                                      <?php
                                      echo "<tr>\n";
                                      echo "<td colspan=6>\n";
                                       if ( $page > 1 )  // 顯示上一頁
                                            {
                                            echo "<a href='member.php?page=".($page-1).
                                                    "' style=\"color: #000\">上一頁</a>| ";}
                                            for ( $i = 1; $i <= $total_pages; $i++ )
                                            if ($i != $page)
                                                echo "<a href=\"member.php?page=".$i."\" style=\"color: #000\";>".
                                                    $i."</a> ";
                                            else
                                                echo $i." ";
                                            if ( $page < $total_pages )  {   // 顯示下一頁
                                            echo "|<a href='member.php?page=".($page+1).
                                                    "' style=\"color: #000\">下一頁</a> ";    
                                                     }       
                                            echo "</td>\n";
                                            echo "</tr>"    ?>                                 
                                        </tbody>
                                    </table>
                 
                                </div>
								
						
								
                            </div>
                        </div><!-- /# column -->
						
<?php include 'footer.php'; ?>