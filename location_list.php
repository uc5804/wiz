<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>프로그램 리스트</title>
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
			
		<h2 id="title"><i class="fas fa-caret-right"></i> &nbsp;장소 > 리스트</h2>
<?php
	include "./db_con.php";
	//로그인 한 상태이며 (레벨값이 6 미만인 경우)
	if($userid){
		if($userlevel == 1){
?>
		<ul class="buttons">
			<li><button type="button" onclick="location.href='./location_form.php'">등록하기</button></li>
		</ul>
<?php
		}
	}
?>
		
		<div id="content">
        <!-- <article class="tab">
            <ul class="tab_btn">
                <li><a href="">지역</a></li>
                <li><a href="">장소</a></li>
            </ul>
            <div class="tab_btn">                
                <div class="region_btn">
                    <ul>
                        <li><button type="button" onclick="location.href='./location_list.php?region=강남'">강남</button></li>
                        <li><button type="button" onclick="location.href='./location_list.php?region=잠실'">잠실</button></li>
                        <li><button type="button" onclick="location.href='./location_list.php?region=판교'">판교</button></li>
                        <li><button type="button" onclick="location.href='./location_list.php?region=종로'">종로</button></li>
                        <li><button type="button" onclick="location.href='./location_list.php?region=구로'">구로</button></li>
                    </ul>
                </div>
                <div class="location_btn">
                    <ul>
                        <li><button type="button" onclick="location.href='./location_list.php?s_location=그린램프라이브러리'">그린램프라이브러리</button></li>
                        <li><button type="button" onclick="location.href='./location_list.php?s_location=토즈스터디카페'">토즈스터디카페</button></li>
                        <li><button type="button" onclick="location.href='./location_list.php?s_location=시작스터디카페'">시작스터디카페</button></li>
                        <li><button type="button" onclick="location.href='./location_list.php?s_location=랭스터디카페'">랭스터디카페</button></li>
                        <li><button type="button" onclick="location.href='./location_list.php?regs_locationion=작심스터디카페'">작심스터디카페</button></li>
                    </ul>
                </div>
            </div>
        </article> -->
    </div>


		<!-- 버튼 -->
		<!-- <button type="button" onclick="location.href='./location_list.php?region=강남'">강남</button> -->
		<!-- 위 버튼을 클릭했을 때, 화면상 url 창에 location_list.php?region=지역명 이 되게한다. => $region = $_GET["region"]; -->
		
		
		<!-- <button type="button" onclick="location.href='./location_list.php?s_location=그린램프라이브러리'">그린램프라이브러리</button> -->
		<!-- //위 버튼을 클릭했을 때, 화면상 url 창에 location_list.php?s_location=장소명 이 되게한다. => $location = $_GET["s_location"]; -->
		

		<!-- <button type="button" onclick="location.href='./location_list.php?subject=토익'">토익</button> -->
		<!-- //위 버튼을 클릭했을 때, 화면상 url 창에 location_list.php?subject=과목명 이 되게한다. => $subject = $_GET["subject"]; -->



		<div class="l_frame">
	
<?php
		$region = $_GET["region"];
		$location = $_GET["s_location"];
		// $subject = $_GET["subject"];


	//조건식을 걸어서..


	include "./db_con.php";

	if($region){  //지역에 대한 버튼을 클릭했을 때 진행되는 sort 작업
		$sql = "select * from location where region='$region' order by num desc";
	}elseif($location){
		$sql = "select * from location where s_location='$location' order by num desc";
	}elseif($subject){
		$sql = "select * from location where subject='$subject' order by num desc";
	}else{  //맨 처음 상단의 메뉴를 통해서 접근했을 때
		$sql = "select * from location order by num desc";		
	}
	$result = mysqli_query($con, $sql); 

	$total_record = mysqli_num_rows($result);

	for($i=0; $i<$total_record; $i++){
		mysqli_data_seek($result, $i);
		$row = mysqli_fetch_array($result);
		$num = $row["num"];
		$region = $row["region"];
		$s_location = $row["s_location"];
		$price_hr = $row["price_hr"];
		$price_day = $row["price_day"];
		$price_month = $row["price_month"];
		$etc = $row["etc"];
		$fav = $row["fav"];
		$hit = $row["hit"];
		$file_copied = "./data/".$row["file_copied"];


?>

                    <div class="l_box" onclick="location.href='location_view.php?num=<?=$num?>'">
                    <div class="l_img"><?=$file_copied?></div>
                    
                    <div class="l_info">
                        <div class="l_maintxt">
                        <p class="l_title"><span>[지역]</span> <span><?=$region?></span>
                            </p>
                        <a href="#">＋자세히</a>
                        <p class="l_title"><span>[홍보]</span> <span>신촌역 2분거리</span> </p>
                        <p class="l_brief"><span>[시간권]</span> <span><?=$price_hr?>원/hr</span> </p>
                        </div>
                        <div class="l_etc">
                        <span class="l_recruit"><span>평점 :</span> <span>★★★★☆</span></span> 
                        <span class="fav"><span>♡&nbsp;</span> <span>100</span></span>   <br>                             
                        <span class="r_date"><span>리뷰 :</span><span> 80개</span></span>
                        <span class="l_date"><span>월권 :</span><span> <?=$price_month?>원</span></span>              
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