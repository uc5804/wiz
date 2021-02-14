<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>프로그램 리스트</title>
	<link rel="stylesheet" href="./css/common.css">
	<link rel="stylesheet" href="./css/main.css">
	<link rel="stylesheet" href="./css/study.css">


</head>
<body>
	<header>
		<?php include "./header.php" ?>
	</header>
	
    <section>
		<div class="title_button_outerbox">
		<h2 id="title"><i class="fas fa-caret-right"></i>프로그램 > 리스트</h2>
<?php
	include "./db_con.php";
	//로그인 한 상태이며 (레벨값이 6 미만인 경우)
	if($userid){
//		if($userlevel < 6){
?>
		<ul class="buttons">
			<li><button type="button" onclick="location.href='./study_form.php'">등록하기</button></li>
		</ul>
<?php
//		}
	}
?>
		</div>
		
		<div id="content">
        <article class="tab">
            <ul class="tab_btn tab_top">
                <li class="active"><a href="">과목</a></li>
                <li><a href="">지역</a></li>
                <li><a href="">장소</a></li>
            </ul>
            <div class="tab_btn">
                <div class="subject_btn active">
                    <ul>
                        <li><button type="button" onclick="location.href='./study_list.php?subject=토익'">토익</button></li>
                        <li><button type="button" onclick="location.href='./study_list.php?subject=취업'">취업</button></li>
                        <li><button type="button" onclick="location.href='./study_list.php?subject=개발'">개발</button></li>
                        <li><button type="button" onclick="location.href='./study_list.php?subject=공기업'">공기업</button></li>
                        <li><button type="button" onclick="location.href='./study_list.php?subject=임용'">임용</button></li>
                    </ul>
                </div>
                <div class="region_btn">
                    <ul>
                        <li><button type="button" onclick="location.href='./study_list.php?region=강남'">강남</button></li>
                        <li><button type="button" onclick="location.href='./study_list.php?region=잠실'">잠실</button></li>
                        <li><button type="button" onclick="location.href='./study_list.php?region=판교'">판교</button></li>
                        <li><button type="button" onclick="location.href='./study_list.php?region=종로'">종로</button></li>
                        <li><button type="button" onclick="location.href='./study_list.php?region=구로'">구로</button></li>
                    </ul>
                </div>
                <div class="location_btn">
                    <ul>
                        <li><button type="button" onclick="location.href='./study_list.php?s_location=그린램프라이브러리'">그린램프라이브러리</button></li>
                        <li><button type="button" onclick="location.href='./study_list.php?s_location=토즈스터디카페'">토즈스터디카페</button></li>
                        <li><button type="button" onclick="location.href='./study_list.php?s_location=시작스터디카페'">시작스터디카페</button></li>
                        <li><button type="button" onclick="location.href='./study_list.php?s_location=랭스터디카페'">랭스터디카페</button></li>
                        <li><button type="button" onclick="location.href='./study_list.php?regs_locationion=작심스터디카페'">작심스터디카페</button></li>
                    </ul>
                </div>
            </div>
        </article>
    </div>


		<!-- 버튼 -->
		<!-- <button type="button" onclick="location.href='./study_list.php?region=강남'">강남</button> -->
		<!-- 위 버튼을 클릭했을 때, 화면상 url 창에 study_list.php?region=지역명 이 되게한다. => $region = $_GET["region"]; -->
		
		
		<!-- <button type="button" onclick="location.href='./study_list.php?s_location=그린램프라이브러리'">그린램프라이브러리</button> -->
		<!-- //위 버튼을 클릭했을 때, 화면상 url 창에 study_list.php?s_location=장소명 이 되게한다. => $location = $_GET["s_location"]; -->
		

		<!-- <button type="button" onclick="location.href='./study_list.php?subject=토익'">토익</button> -->
		<!-- //위 버튼을 클릭했을 때, 화면상 url 창에 study_list.php?subject=과목명 이 되게한다. => $subject = $_GET["subject"]; -->



		<div class="s_frame">
	
<?php
		$region = $_GET["region"];
		$location = $_GET["s_location"];
		$subject = $_GET["subject"];


	//조건식을 걸어서..


	include "./db_con.php";

	if($region){  //지역에 대한 버튼을 클릭했을 때 진행되는 sort 작업
		$sql = "select * from study where region='$region' order by num desc";
	}elseif($location){
		$sql = "select * from study where s_location='$location' order by num desc";
	}elseif($subject){
		$sql = "select * from study where subject='$subject' order by num desc";
	}else{  //맨 처음 상단의 메뉴를 통해서 접근했을 때
		$sql = "select * from study order by num desc";		
	}
	$result = mysqli_query($con, $sql); 

	$total_record = mysqli_num_rows($result);

	for($i=0; $i<$total_record; $i++){
		mysqli_data_seek($result, $i);
		$row = mysqli_fetch_array($result);
		$num = $row["num"];
		$subject = $row["subject"];
		$region = $row["region"];
		$s_location = $row["s_location"];
		$summary = $row["summary"];
		$introduce = $row["introduce"];
		$mem_num = $row["mem_num"];
		$close_day = $row["close_day"];
		$start_day = $row["start_day"];		
		$fav = $row["fav"];
		$file_copied = "./data/".$row["file_copied"];
?>
					<div class="s_box" onclick="location.href='study_view.php?num=<?=$num?>'">
					<div class="s_img">
						<img src="<?=$file_copied?>" alt="<?=$subject?>">
					</div>
					
					<div class="s_info">
						<div class="s_maintxt">
						<p class="s_title"><span>[<?=$subject?>]</span> <span><?=$summary?></span>
							</p>
						<a href="#" onclick="location.href='study_view.php?num=<?=$num?>'">＋자세히</a>
						<p class="s_title"><span>[<?=$region?>]</span> <span><?=$s_location?></span> </p>
						<p class="s_brief"><span>[소개]</span> <span><?=$introduce?></span> </p>
						</div>
						<div class="s_etc">
						<span class="s_recruit">모집중:<?=$mem_num?></span> 
						<span class="fav">♡&nbsp; <span>100</span></span>   <br>                             
						<span class="c_date">마감일 : <?=$close_day?></span>
						<span class="s_date">시작일 : <?=$start_day?></span>
						
						</div>
					</div>
					</div>


<?php
	}
?>
				</div>
			</section>

			<!-- </div> -->
	</section>

	<footer>
			<?php include "./footer.php"; ?>
	</footer>		

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/study_list.js"></script>	
</body>
</html>