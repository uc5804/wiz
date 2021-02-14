<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>메시지 보내기 - 송신 양식</title>
	<link rel="stylesheet" href="./css/common.css">
	<link rel="stylesheet" href="./css/message.css">
	<script src="https://kit.fontawesome.com/09743b710b.js" crossorigin="anonymous"></script>
</head>
<body>
	<header>
		<?php include "./header.php";?>
	</header>
<?php
	if(!$userid){
		echo ("
			<script>
				alert('로그인 후 이용 바랍니다.');
				location.href='./login_form.php';
			</script>
		");
		exit;
	}
?>
	<section>
		


		<div id="message_box">
			<div class="title_outerbox">
				<h2 class="title"><i class="fas fa-caret-right"></i> &nbsp;메시지 보내기</h2>
				<ul class="buttons">
						<li><button type="button" onclick="location.href='message_box.php?mode=rv'">수신함</button></li>	
						<li><button type="button" onclick="location.href='message_box.php?mode=send'">송신함</button></li>
				</ul>
			</div>
				<form name="message_form" action="message_insert.php?send_id=<?=$userid?>" method="post">
						<div id="write_msg">
								<ul>
										<li>
												<div class="label">
														<label for="id">보내는 사람</label>
												</div>
												<div class="input">
														<p><?=$userid?></p>
												</div>
										</li>
										<li>
												<div class="label">
														<label for="rv_id">받는 사람(아이디)</label>
												</div>
												<div class="input">
														<input type="text" name="rv_id">
												</div>
										</li>
										<li>
												<div class="label">
														<label for="title">제목</label>
												</div>
												<div class="input">
														<input type="text" name="title">
												</div>
										</li>
										<li>
												<div class="label">
														<label for="content">내용</label>
												</div>
												<div class="input">
														<textarea name="content" cols="" rows=""></textarea>
												</div>
										</li>
								</ul>
								
						</div>
						
				</form>
				<button class="send_btn" type="button" onclick="check_input();">메시지 보내기</button>
		</div>
  </section>
	<footer>
			<?php include "./footer.php"; ?>
	</footer>

	<script src="./js/message.js"></script>
</body>
</html>