


		<div id="main_content">
		<div class="title_outerbox">
		<h2 class="title"><i class="fas fa-edit"></i>&nbsp;스터디 찾기<span><a href="./study_list.php">＋더보기</a></span></h2>
		</div>
			<div class="study">				
				<div class="s_frame">
<?php





	include "./db_con.php";
	$sql = "select * from study order by num desc";


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
	<div id="view_more_btn"><button><i class="fas fa-caret-down"></i> more</button></div>

			</div>
			</div>
	
	<div class="bottom_content">
			<div class="notice">
				<h2><i class="fas fa-edit"></i>공지사항 <span><a href="./board_list.php">＋더보기</a></span></h2>
				<ul>
				<li>
					<span class="field1"><a>제목</a></span>
					<!--최신글 5개만을 보여주기 때문에 border_list.php에서 페이저의 위치는 1번 페이지(최근 업로드 5개만 해당)  ==>  page=1 -->
					<span class="field2">이름</span>
					<span class="field3">등록일</span>
				</li>
<?php
	include "./db_con.php";
	$sql = "select * from board order by num desc limit 5";
	//게시판으로부터 모든 데이터 베이스를 가져오되 역순으로 5개(행 데이터)만 가져온다.
	$result = mysqli_query($con, $sql);
	//$row = mysqli_fetch_array($result);
	//var_dump($row);
	//var_dump($result);

	//맨 처음 DB 내에 아무것도 없을 때
	if(!$result){
		echo "<li>현재, 등록된 게시글이 존재하지 않습니다.</li>";
	}else{  //게시글이 하나라도 존재한다면
		/*
		반복문의 종류 : while, do~while, for, for~in, forEach

		초기값;
		while(조건식){
			실행문;
			증감식;
		}
		*/
		//배열 데이터가 존재한다면 반복문을 실행해라
		while($row = mysqli_fetch_array($result)){
			//var_dump($row);
			$num = $row["num"];  //상세페이지로 접근
			$title = $row["title"];

			$name = $row["name"];
			//2020-12-14 (12:46)
			$regist_day = substr($row["regist_day"], 0, 10);  
			//substr(문자열을 가진 변수, 처음 시작하는 인덱스번호, 인덱스 번호로부터 몇개를 자를 것인가를 지정)
			
?>
					
					<li>
						<span class="field1"><a href="./board_view.php?num=<?=$num?>&page=1"><i class="fas fa-chevron-right"></i> &nbsp; <?=$title?></a></span>
						<!--최신글 5개만을 보여주기 때문에 border_list.php에서 페이저의 위치는 1번 페이지(최근 업로드 5개만 해당)  ==>  page=1 -->
						<span class="field2"><?=$name?></span>
						<span class="field3"><?=$regist_day?></span>
					</li>
<?php
		}
	}
?>


				</ul>
			</div>

			<div class="member_rank">
				<h2><i class="fas fa-edit"></i>열심멤버</h2>
				<ul>
				<li>
					<span class="mem1">순위</span>
					<span class="mem2">이름</span>
					<span class="mem3">아이디</span>
					<span class="mem4">포인트</span>
				</li>
<?php
	$rank = 1;
	$sql = "select * from members order by point desc limit 5";
	$result = mysqli_query($con, $sql);

	if(!$result){  //등록된 회원이 없는 상태
		echo "<li>등록된 회원이 없습니다.</li>";
	}else{  //등록된 회원이 있는 상태
		while($row = mysqli_fetch_array($result)){
			$name = $row["name"];
			$id = $row["id"];
			$point = $row["point"];
?>
					
					<li>
						<span class="mem1"><?=$rank?></span>
						<span class="mem2"><?=$name?></span>
						<span class="mem3"><?=$id?></span>
						<span class="mem4"><?=$point?></span>
					</li>
<?php
			$rank++;
		}
	}
?>
				</ul>
			</div>
</div>

			
		</div>
		
		<div id="top_btn">
			<img src="./img/olaf.png" width="60px" height="auto">
			<p>TOP</p>
		</div>


		
		



