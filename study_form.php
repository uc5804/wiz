<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>프로그램 등록</title>
	<link rel="stylesheet" href="./css/common.css">
	<link rel="stylesheet" href="./css/main.css">
	<link rel="stylesheet" href="./css/study.css">
</head>
<body>
	<header>
		<?php include "./header.php" ?>
	</header>

	<section>
         <div id="study_box">
         <div class="title_outerbox">
            <h2 id="study_title">스터디 > 등록하기</h2>
            <ul class="buttons">
                  <li><button type="button" onclick="check_input();">등록하기</button></li>
                  <li><button type="button" onclick="location.href='./study_list.php'">목록보기</button></li>
               </ul>
               </div>
            <form name="study_form" action="study_insert.php" method="post" enctype="multipart/form-data">
               <ul id="study_form">
                  
                  <li class="leader">
                        <div class="label">
                           <label for="">리더 : </label>
                        </div>
                        <div class="input">
                           <p><?=$userid?>aa</p>
                        </div>
                  </li>
                  <li class="date">
                     <div>
                        <label for="close_day">모집마감</label>
                     </div>
                     <div>
                        <input type="date" name="close_day" id="close_day">
                     </div>
                     <!-- &nbsp;~&nbsp; -->
                     <div>
                        <label for="start_day">시작일</label>
                     </div>
                     <div>
                        <input type="date" name="start_day" id="start_day">
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
                           <label for="mem_num">스터디 인원 : </label>
                        </div>
                        <div class="input">
                           <input type="text" name="mem_num" placeholder="최대 모집 인원을 입력하세요">
                        </div>
                  </li>
                  <li>
                        <div class="label">
                           <label for="subject">과목 : </label>
                        </div>
                        <div class="input">
                           <input type="text" name="subject" placeholder="메인 과목을 입력하세요">
                        </div>
                  </li>
               
                  <li>
                        <div class="label">
                           <label for="region">지역 : </label>
                        </div>
                        <div class="input">
                           <input type="text" name="region" placeholder="도시 또는 지역구를 입력하세요">
                        </div>
                  </li>
                  <li>
                        <div class="label">
                           <label for="s_location">장소 : </label>
                        </div>
                        <div class="input">
                           <input type="text" name="s_location" placeholder="구체적인 장소를 입력하세요">
                        </div>
                  </li>
                  <li>
                        <div class="label">
                           <label for="summary">내용 : </label>
                        </div>
                        <div class="input">
                           <input type="text" name="summary" placeholder="목표를 작성하세요">
                        </div>
                  </li>
                  <li>
                        <div class="label">
                           <label for="introduce">소개글 : </label>
                        </div>
                        <div class="input">
                           <input type="text" name="introduce" placeholder="스터디 소개글을 적어주세요">
                        </div>
                  </li>
                  
               
                  <li class="detail">
                        <div class="label">
                           <label for="detail">세부규칙 : </label>
                        </div>
                        <div class="input">
                           <textarea name="detail" placeholder="스터디 내용 및 규칙을 상세히 적어주세요"></textarea>
                        </div>
                         <!-- 디파짓 : 
                               벌금 : 
                               규칙 : 
                               목표 :
                               상세 내용 :  -->
                  </li>           
               </ul>

            </form>
         </div>
   </section>

	<footer>
			<?php include "./footer.php"; ?>
	</footer>

	<script src="./js/study.js"></script>
</body>
</html>