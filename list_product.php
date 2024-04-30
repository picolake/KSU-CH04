<!-- list_product.php -->
<?php require("php/layout_head.php"); ?>

<!-- 版身開始 -->
<div class="bodyArea">
    <!-- 版身內容開始 -->
    <?php
    require("php/cmsdb.php");
    if (!isset($_GET['cat'])){
        $sql = "SELECT * FROM products ORDER BY model_year DESC"; 
    } else { 
        $sql = "SELECT * FROM products WHERE category_id = '{$_GET["cat"]}' ORDER BY model_year DESC"; 
    }
    $result = $conn->query($sql); 
    ?>
    <table class="tab2">
    <!-- 表格標題 -->
        <tr class="tab2tit">
    <?php
        // 取得所有欄位的欄位資訊
        while ($fieldinfo = $result -> fetch_field()) {
            echo "<th>".$fieldinfo -> name."</th>";
        }
    ?>
            <th width="50">修改</th>
            <th width="50">刪除</th>
        </tr>
    <!-- 列出產品資料表內容開始 -->
    <?php
    if ($result->num_rows > 0) {
        // 每筆記錄的輸出資料
        while ( $row = $result->fetch_row() ) {
            $num_fields = count($row);
            echo "<tr>";
            // 列出各欄位值
            for ($i = 0; $i < $num_fields; $i++) {
                if (in_array(substr($row[$i], -4), [".jgp", ".png", ".gif"])){ // 圖片欄
                    $img = "../productimg/".$row[$i];
                    echo '<td><img src="'.$img.'" width="50" height="50"></td>';
                }
                else            
                    echo '<td>'.$row[$i].'</td>';
            }
            echo "<td><a title='修改' class='btn-vi' href='edit_product.php?id=".$row[0]."'>修改</a></td>";
            echo "<td><a title='刪除' class='btn-del' onclick='alertDel({$row[0]});MsgYesNoOn();'>刪除</a></td>";
            echo "</tr>";
        }
    }
    $conn->close();
    ?>
    <!-- 列出產品資料表內容結束 -->
    </table>
    <!-- 版身內容結束 -->
</div><!-- bodyArea End -->
<!-- 版身結束 -->

<?php 
### 訊息視窗 ###
if ($_GET['Msg']==1) { 
    echo "
    <script>
    $(document).ready(function(){ 
        MsgAlertOn(); 
        $('.MsgTxt').text('資料已完成新增。'); 
    });
    </script>";  
}
if ($_GET['Msg']==2) { 
    echo "
    <script>
    $(document).ready(function(){ 
        MsgAlertOn(); 
        $('.MsgTxt').text('指定的資料已刪除。'); 
    });
    </script>";  
}
require("php/layout_footer.php"); 
?>