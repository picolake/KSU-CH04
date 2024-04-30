<!-- edit_product.php -->
<?php require("php/layout_head.php"); ?>

<!-- 版身開始 -->
<div class="bodyArea">
    <div class="body-L">
        <!-- 選單開始 -->
        <?php require("php/layout_sel.php"); ?>
        <!-- 選單結束 -->
    </div><!-- body-L End -->
    <div class="body-R">
        <!-- 版身內容開始 -->
        <?php
        require("php/cmsdb.php");
        if (!isset($_GET['id'])){
            echo "未輸入產品id";
            $conn->close(); 
            exit;
        } else { 
            $id = $_GET['id'];
            // 查詢產品資料表，取得產品資料
            $sql = "SELECT * FROM products WHERE id = '{$id}'"; 
        }
        $result = $conn->query($sql); 
        $row = $result->fetch_assoc();
        $product_name = $row["name"];
        $category_id = $row["category_id"];
        $model_year = $row["model_year"];
        $list_price = $row["list_price"];
        $product_pic = $row["picture"] ? $row["picture"] : "";  
        $conn->close();
        ?> 
        <!-- 顯示編輯產品表單 -->
        <div class="pgtit" style="font-size:16pt;">
            產品資料
        </div><!-- pgtit End -->

        <form method="POST" action="update_product.php" enctype="multipart/form-data" class="formsty">
            <div class="formtab">
                <li class="L">
                    id：<input type="text" id="productID" name="product_id" size="20" 
                        value="<?php echo $id; ?>" readonly></li>
                <li style="clear:left">
                    品名：<input type="text" id="productName" class="chkval" name="product_name" 
                        value="<?php echo $product_name; ?>" size="80"></li>                
                <li class="L">
                <label for="category">產品類別:</label>
                <select id="category" name="category_id">
                    <option value="1"<?php if ($category_id == 1) echo ' selected'; ?>>電腦</option>
                    <option value="2"<?php if ($category_id == 2) echo ' selected'; ?>>手機</option>
                    <option value="3"<?php if ($category_id == 3) echo ' selected'; ?>>週邊設備</option>
                </select>
                <li class="L">
                    出品年份：<input type="text" id="modelYear" class="chkval chkolnynum" name="model_year" 
                    value="<?php echo $model_year; ?>" size="5"></li>
                <li class="L">
                    建議售價：<input type="text" id="listPrice" class="chkval chknum" name="list_price" 
                    value="<?php echo $list_price; ?>" size="20"></li>
                <?php 
                /* 判斷是否有圖片檔名，若沒有，載入預設圖片 */
                if ($product_pic=="") {
                    $img = "images/noimg-200-a.png";
                }
                else {
                    $img = "../productimg/".$product_pic;
                }
                ?>
                <li style="clear:left">
                    圖片：
                    <input type="file" name="pic" size="30">
                    <input type="hidden" name="oldpic" value="<?php echo $product_pic; ?>">
                </li>
                <img src="<?php echo $img; ?>" style="width:150px;height:150px;">
                <li style="border:none;">
                    <input type="submit" value="更新" id="SendBtn" class="formbtn"></li>
            </div><!-- formtab End -->
        </form>
        <!-- 版身內容結束 -->
    </div><!-- body-R End -->
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
require("php/layout_footer.php");
?>
