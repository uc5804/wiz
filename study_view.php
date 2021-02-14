<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>프로그램 상세 페이지</title>
	<link rel="stylesheet" href="./css/common.css">
	<link rel="stylesheet" href="./css/main.css">
  <link rel="stylesheet" href="./css/study.css">

  <script src="https://kit.fontawesome.com/09743b710b.js" crossorigin="anonymous"></script>

</head>
<body>
	<header>
		<?php include "./header.php" ?>
	</header>

	

<?php
	

	//http://localhost/website/study_view.php?num=3
	$num = $_GET["num"];

	include "./db_con.php";
	$sql = "select * from study where num='$num'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);

		//mysqli_data_seek($result, $i);
		//$row = mysqli_fetch_array($result);
    //$num = $row["num"];
    
		$id = $row["id"];
		$subject = $row["subject"];
		$summary = $row["summary"];
		$mem_num = $row["mem_num"];
		$close_day = $row["close_day"];
		$start_day = $row["start_day"];		
		$regist_day = $row["regist_day"];		
		$region = $row["region"];		
		$s_location = $row["s_location"];		
		$detail = $row["detail"];		
		$fav = $row["fav"];
		$hit = $row["hit"];
		$file_copied = "./data/".$row["file_copied"];

	 $new_hit = $hit + 1;
	$sql = "update study set hit='$new_hit' where num='$num'";
	mysqli_query($con, $sql);
?>

	<section>
  <div class="title_outerbox">
  <h2 id="study_title"><i class="fas fa-edit"></i>&nbsp;프로그램 > 상세보기</h2>
  <ul class="buttons">
					<li><button type="button" onclick="location.href='./study_list.php?page=<?=$page?>'">목록</button></li>
<?php
		//세션의 $userid 존재 -> 로그인 상태
		//세션의 $userid와 게시글의 고유번호를 통해 받아온 DB 내의 id가 동일하다면 게시글의 작성자는 로그인 한 사람과 동일인물
		if($userid == $id){
?>
					<li><button type="button" onclick="location.href='./study_modify_form.php?num=<?=$num?>&page=<?=$page?>'">수정</button></li>
					<li><button type="button" onclick="location.href='./study_delete.php?num=<?=$num?>&page=<?=$page?>'">삭제</button></li>
<?php
		}
		//세션의 $userid 존재 -> 로그인 상태
		if($userid){
?>
					<li><button type="button" onclick="location.href='./study_form.php'">작성하기</button></li>
<?php
		}
?>

    </ul> 
  </div>

	<div id="view">
        <div id="registered_form">
            <div class="bar_box"><div class="bar"></div></div>
            
            <div class="file">
                <div class="paper">
                    <h4 class="title">스터디 소개 기본 양식</h4>
                    <div class="content">
                        <ul>
                            <li><p><span><i class="far fa-bookmark"></i> 리더 : </span> <span><?=$userid?></span></p></li>
                            <li><p><span><i class="far fa-bookmark"></i> 과목 : </span><span><?=$subject?></span></p></li>
                            <li><p><span><i class="far fa-bookmark"></i> 요약 : </span><span><?=$summary?></span></p></li>
                            <li><p><span><i class="far fa-bookmark"></i> 지역 : </span><span><?=$region?></span> </p></li>
                            <li><p><span><i class="far fa-bookmark"></i> 장소 : </span><span><?=$s_location?></span></p></li>
                            <li><p><span><i class="far fa-bookmark"></i> 모집인원 : </span><span><?=$mem_num?></span></p></li>
                            <li><p><span><i class="far fa-bookmark"></i> 스터디 등록일 : </span><span><?=$regist_day?></span></p></li>
                            <li><p><span><i class="far fa-bookmark"></i> 모집 마감일 : </span><span><?=$close_day?></span></p></li>
                            <li><p><span><i class="far fa-bookmark"></i> 스터디 시작일 : </span><span><?=$start_day?></span></p></li>
                            <li><p><span><i class="far fa-bookmark"></i> 상세 규칙 : </span><span><?=$detail?></span></p></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="arrow">
                <span><i class="fas fa-chevron-right"></i></span>
            </div>
        </div>

        
        <div class="s_box">
            <div class="s_img" style="background-image:url(<?=$file_copied?>);"></div>
            
            <div class="s_info">
              <div class="s_maintxt">
                <p class="s_title">[<?=$subject?>] <span><?=$summary?></span>
                   </p>
                <!-- <a href="#">＋자세히</a> -->
                <p class="s_title">[<?=$region?>] <span><?=$s_location?></span> </p>
                <p class="s_brief">[소개] <span><?=$summary?></span> </p>
              </div>
              <div class="s_etc">
                <span class="s_recruit">모집중:<?=$mem_num?></span> 
                <span class="fav">♡&nbsp; <span>100</span></span>   <br>                             
                <span class="r_date">마감일 : <?=$close_day?></span>
                <span class="s_date">시작일 : <?=$start_day?></span>
                 
              </div>
              <div class="button">
                  <button>관심등록</button>
                  <button>참여신청</button>
              </div>
            </div>
          </div>
               
    </div>
    

  </section>

  <div class="frame">
			<div id="map"></div>
			<div id="map-info" >
				<h3 id="title">[<?=$region?>]</h3>
				<span id="title"><?=$s_location?></span>
				<!-- <p id="address"></p> -->
			</div>
	</div>



	<footer>
		<?php include "./footer.php"; ?>
	</footer>	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCMOwJdqgkxI6MQb4E95pSSBF1TABF5pZA&callback=initMap"></script>
  <script src="js/study_view.js"></script>  
  


</body>
</html>