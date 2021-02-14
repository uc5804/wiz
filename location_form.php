<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>프로그램 등록</title>
	<link rel="stylesheet" href="./css/common.css">
	<link rel="stylesheet" href="./css/main.css">
	<link rel="stylesheet" href="./css/study.css">
   <link rel="stylesheet" href="./css/location.css">
   <script src="https://kit.fontawesome.com/09743b710b.js" crossorigin="anonymous"></script>
</head>
<body>
	<header>
		<?php include "./header.php" ?>
	</header>

	<section>
         <div id="location_box">
            <h2 id="location_title">장소 > 등록하기</h2>
            <form name="location_form" action="location_insert.php?userid=<?=$userid?>" method="post" enctype="multipart/form-data">
               <ul id="location_form">
                
                  <li class="location">
                     <div>
                        <label for="region">지역 : </label>
                     </div>
                     <div>
                        <input type="text" name="region" id="region">
                     </div>
                  </li>
                  <li>
                     <!-- &nbsp;~&nbsp; -->
                     <div>
                        <label for="s_location">장소 : </label>
                     </div>
                     <div>
                        <input type="text" name="s_location" id="s_location">
                     </div>
                   </li>
                   
                   <li>
                     <div class="label">
                        <label for="upfile">대표 이미지 : </label>
                     </div>
                     <div class="input">
                        <input type="file" class="upload" name="upfile">
                     </div>
                  </li>
                  <li>
                        <div class="label">
                           <label for="price_hr">시간권 : </label>
                        </div>
                        <div class="input">
                           <input type="text" name="price_hr" placeholder="시간권 이용 금액을 입력하세요">
                        </div>
                  </li>
                  <li>
                        <div class="label">
                           <label for="price_day">일권 : </label>
                        </div>
                        <div class="input">
                           <input type="text" name="price_day" placeholder="일권 이용 금액을 입력하세요">
                        </div>
                  </li>
                  <li>
                        <div class="label"> 
                           <label for="price_month">월권 : </label>
                        </div>
                        <div class="input">
                           <input type="text" name="price_month" placeholder="월권 이용 금액을 입력하세요">
                        </div>
                  </li>
                  
                  <li>
                        <div class="etc">
                           <label for="etc">내용 : </label>
                        </div>
                        <div class="input">
                           <input type="text" name="etc" placeholder="홍보글을 작성하세요 ex)커피 제공">
                        </div>
                  </li>          
               </ul>
               <ul class="buttons">
                  <li><button type="button" onclick="check_input();">등록하기</button></li>
                  <li><button type="button" onclick="location.href='./location_list.php'">목록보기</button></li>
               </ul>
            </form>

           
         </div>
   </section>

	<footer>
			<?php include "./footer.php"; ?>
	</footer>

	<script src="./js/location.js"></script>
</body>
</html>