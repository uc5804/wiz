<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>프로그램 상세 페이지</title>
	<link rel="stylesheet" href="./css/common.css">
	<link rel="stylesheet" href="./css/main.css">
    <!-- <link rel="stylesheet" href="./css/study.css"> -->
    <link rel="stylesheet" href="./css/location.css">

  <script src="https://kit.fontawesome.com/09743b710b.js" crossorigin="anonymous"></script>

</head>
<body>
	<header>
		<?php include "./header.php" ?>
	</header>

	

<?php
	

	//http://localhost/website/location_view.php?num=3
	$num = $_GET["num"];

	include "./db_con.php";
	$sql = "select * from location where num='$num'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);

		//mysqli_data_seek($result, $i);
		//$row = mysqli_fetch_array($result);
    //$num = $row["num"];
    
		$id = $row["id"];
		$region = $row["region"];
		$s_location = $row["s_location"];
		$mem_price_monthnum = $row["price_month"];
		$price_day = $row["price_day"];
		$price_hr = $row["price_hr"];		
		$etc = $row["etc"];		
		$fav = $row["fav"];		
		$hit = $row["hit"];		
		$file_copied = $row["file_copied"];		

        $new_hit = $hit + 1;
        $sql = "update location set hit='$new_hit' where num='$num'";
        mysqli_query($con, $sql);
?>

	<section>
        <div class="title">
        <h2 id="location_title"><i class="fas fa-caret-right"></i>&nbsp;장소 > 상세보기</h2>
        <ul class="buttons">
					<li><button type="button" onclick="location.href='./location_list.php?page=<?=$page?>'">목록</button></li>
<?php
		//세션의 $userid 존재 -> 로그인 상태
		//세션의 $userid와 게시글의 고유번호를 통해 받아온 DB 내의 id가 동일하다면 게시글의 작성자는 로그인 한 사람과 동일인물
		if($userid == $id){
?>
					<li><button type="button" onclick="location.href='./location_modify_form.php?num=<?=$num?>&page=<?=$page?>'">수정</button></li>
					<li><button type="button" onclick="location.href='./location_delete.php?num=<?=$num?>&page=<?=$page?>'">삭제</button></li>
<?php
		}
		//세션의 $userid 존재 -> 로그인 상태
		if($userid){
?>
					<li><button type="button" onclick="location.href='./location_form.php'">작성하기</button></li>
<?php
		}
?>

    </ul> 
  </div>

	<div id="view">
        <div id="location_information">
            <div class="bar_box"><div class="bar"></div></div>
            
            <div class="file">
                <div class="paper">
                    <h4 class="title">[<?=$region?>]&nbsp;<?=$s_location?></h4>
                    <div class="content">
                        <ul>
                            <li><p><span><i class="far fa-check-square"></i> 평점 : </span> <span>★★★★☆</span></p></li>
                            <li><p><span><i class="far fa-check-square"></i> 지역 : </span> <span><?=$region?></span></p></li>
                            <li><p><span><i class="far fa-check-square"></i> 장소 : </span> <span><?=$s_location?></span></p></li>
                            <li><p><span><i class="far fa-check-square"></i> [시간권] : </span><span><?=$price_hr?>&nbsp;원</span></p></li>
                            <li><p><span><i class="far fa-check-square"></i> [일권] : </span><span><?=$price_day?>&nbsp;원</span></p></li>
                            <li><p><span><i class="far fa-check-square"></i> [월권] : </span><span><?=$price_month?>&nbsp;원</span></p></li>
                            <li><p><span><i class="far fa-check-square"></i> 리뷰 : </span> <span>10</span></p></li>
                            <li><p><span><i class="far fa-check-square"></i> 홍보 : </span> <span><?=$etc?></span></p></li>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="arrow">
                <span><i class="fas fa-chevron-right"></i></span>
            </div>

        </div>

        

        <div class="frame">
            <div id="map"></div>
            <div id="map-info" >
                <h3 id="title">[<?=$region?>]</h3>
                <span id="title"><?=$s_location?></span>
                <!-- <p id="address"></p> -->
            </div>
        </div>    
    </div>


    </section>
    <section id="cont2">
        <div class="title">
        <h2 id="location_title"><i class="fas fa-caret-right"></i>&nbsp;장소 > <?=$s_location?> 전경</h2>
        <content id="location_photo">
            <ul>
                <li><span></span><p>휴게실</p></li>
                <li><span></span><p>휴게실</p></li>
                <li><span></span><p>휴게실</p></li>
                <li><span></span><p>휴게실</p></li>
            </ul>
        </content>
    </section>

    <section id="cont3">
    <div class="title">
        <h2 id="location_title"><i class="fas fa-caret-right"></i>&nbsp;장소 > <?=$s_location?> 장소 리뷰</h2>

    
    <?php 
//http://kge.or.kr/wiz/location_view.php?num=3
$num=$_GET["num"];


include "./db_con.php";

?>



        <form action="review_insert.php?num=<?=$num?>" method="post">
            <ul id="review_form">
            <li class="star">
            <div>

                <label for="star_rel">평점 및 리뷰 : </label>
            </div>
            <div>
                <div>
                    <span rel="1"><i class="fas fa-star"></i></span>
                    <span rel="2"><i class="fas fa-star"></i></span>
                    <span rel="3"><i class="fas fa-star"></i></span>
                    <span rel="4"><i class="fas fa-star"></i></span>
                    <span rel="5"><i class="fas fa-star"></i></span>
                </div>
                
                <input type="hidden" name="star_rel" id="star_rel" value="">
            </div>
            </li>
            <li>
                <div>
                    <label for="review"></label>
                </div>
                <div>
                    <input type="text" name="review" id="review" required>
                </div>
            </li>
            </ul>
            <button>입력</button>
        </form>

        <div id="review_list">
            <ul>
                <li>
                    <div>
                        <span>이용자리뷰</span>
                        <span class="star"></span>
                        <span class="star_rel"></span>
                        <p>리뷰내용</p>
                        <span class="register_day">등록날짜</span>
                    </div>
                </li>
            </ul>
        </div>
    </section>

	<footer>
		<?php include "./footer.php"; ?>
	</footer>	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCMOwJdqgkxI6MQb4E95pSSBF1TABF5pZA&callback=initMap"></script>
  <script src="js/study_view.js"></script>  
  


</body>
</html>