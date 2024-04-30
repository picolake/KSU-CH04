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

        <div class="pgtit" style="font-size:16pt;">
            個人基本資料
        </div><!-- pgtit End -->

        <form method="POST" action="store_user.php" class="formsty">
            <div class="formtab">
                <li style="font-size:12pt; color:#FF287E; height:20px;">
                    所有欄位皆為必填欄位</li>
                <li class="L">
                    姓名：<input type="text" id="custName" class="chkval" name="custName" size="20"></li>
                <li class="L">
                    電子郵件：<input type="text" id="custEmail" class="chkval chkmail" name="custEmail" size="30"></li>                
                <li class="L">
                    密碼：<input type="password" id="custPassword" class="chkval chkpass" name="custPassword" size="20" minlength="8"></li>
                <li class="L">
                    電話：<input type="text" id="custTel" class="chkval chktel" name="custTel" size="20" minlength="8"></li>
                <li class="L">
                    <input type="radio" id="sex-boy" name="custSex" class="radioCss" value="帥哥">
                    <label for="sex-boy"></label>帥哥、
                    <input type="radio" id="sex-girl" name="custSex" class="radioCss" value="美女" checked>
                    <label for="sex-girl"></label>美女、
                    <input type="radio" id="sex-other" name="custSex" class="radioCss" value="其他">
                    <label for="sex-other"></label>其他
                </li>
                <li style="clear:left">
                    興趣：
                    <input type="checkbox" id="like1" name="like[]" value="逛街" class="ckboxCss">
                    <label class="chkrao" for="like1"></label>逛街、
                    <input type="checkbox" id="like2" name="like[]" value="看電影" class="ckboxCss">
                    <label class="chkrao" for="like2"></label>看電影、
                    <input type="checkbox" id="like3" name="like[]" value="到山上走走" class="ckboxCss">
                    <label class="chkrao" for="like3"></label>到山上走走、
                    <input type="checkbox" id="like4" name="like[]" value="到海邊吹吹風" class="ckboxCss">
                    <label class="chkrao" for="like4"></label>到海邊吹吹風、
                    <input type="checkbox" id="like5" name="like[]" value="宅在家K程式" class="ckboxCss">
                    <label class="chkrao" for="like5"></label>宅在家K程式
                </li>
                <li style="border:none;">
                    <input type="submit" value="送出" id="SendBtn" class="formbtn"></li>
            </div><!-- formtab End -->
            <input type="hidden" name="chklike" value="逛街,看電影,到山上走走,到海邊吹吹風,宅在家K程式">
        </form>

        <!-- 版身內容結束 -->
    </div><!-- body-R End -->
</div><!-- bodyArea End -->
<!-- 版身結束 -->

<?php require("php/layout_footer.php"); ?>