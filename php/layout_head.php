<!DOCTYPE html>
<html lang="zh-TW">

<head>
	<title>PHP全能網頁設計師</title>
	<meta charset="utf-8">
	<meta name="keywords" content="網頁關鍵字">
	<meta name="description" content="網頁大網">
	<link rel="stylesheet" href="css/layout.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/layout.js"></script>
</head>

<body>

	<!-- 版頭開始 -->
	<div class="headArea">
		<div class="head-L">
			<a title="PHP全能網頁設計師" href="./"><img src="images/logo.png"></a>
		</div><!-- head-L end -->
		<div class="head-R">
			<form action="find.php" method="GET">
				<input type="text" name="keyword" size="30">
				<input type="submit" value="送出" name="keywordSend">
			</form>
		</div><!-- head-R end -->
	</div><!-- headArea End -->
	<!-- 版頭結束 -->

	<!-- 按鈕列開始 -->
	<div class="navbar">
		<a title="關於我們" class="btn1" href="about.php">關於我們</a>
		<!-- 子選單開始 -->
		<div class="dropdown">
			<button class="dropbtn">產品介紹
				<i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-content">
				<?php 
					require("php/cmsdb.php");
					$sql = "SELECT * FROM categories ORDER BY id"; 
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						// 每筆記錄的輸出資料
						while($row = $result->fetch_assoc()) {
							echo '<a href="list_product.php?cat='.$row["id"].'">'.$row["name"].'</a>';
						}
					} else {
						echo '<a href="list_product.php">產品類別</a>';
					}
					$conn->close();
				?>
			</div>
		</div>
		<!-- 子選單結束 -->
		<a title="產品QA" class="btn1" href="qalist.php">產品QA</a>
		<a title="最新消息" class="btn1" href="news.php">最新消息</a>
		<a title="加入會員" class="btn1" href="member.php">加入會員</a>
		<a title="聯絡我們" class="btn1" href="contact.php">聯絡我們</a>
        <a title="登入" class="btn1" href="login.php">登入</a>
        <!-- 後台管理子選單開始 -->
        <div class="dropdown">
            <button class="dropbtn">後台管理
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="new_product.php">新增產品</a>
                <a href="new_category.php">新增產品類別</a>
            </div>
        </div>
        <!-- 後台管理子選單結束 -->
	</div><!-- navbar End -->
	<!-- 按鈕列結束 -->