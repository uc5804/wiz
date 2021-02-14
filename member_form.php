<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>website-회원가입</title>
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/member.css">
    <script src="https://kit.fontawesome.com/09743b710b.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <?php include "./header.php"; ?>
    </header>
    <section>
        

        <div id="main_content">
            <div id="join_box">
                <form name="member_form" action="member_insert.php" method="post">
                <div class="title_outerbox">
                    <h3 class="title"><i class="fas fa-caret-right"></i> &nbsp;회원가입</h3>
                    <ul class="buttons">
                        <li><button type="button" onclick="check_input();">저장하기</button></li>
                        <li><button type="button" onclick="reset_form();">취소하기</button></li>                        
                    </ul>
                    </div>
                    <div class="form id">
                        <div class="label">
                            <label for="id">아이디</label>
                        </div>

                        <div class="input">
                            <input type="text" name="id" id="username">
                        </div>

                        <div class="add_btn">
                            <button type="button" onclick="check_id();">중복체크</button>
                            <!--<button> 태그의 역할을 제한시킬 때는 type="button" form 태그 내부에서는 <button type="submit">-->
                        </div>

                        <!--아이디 중복 체크 버튼을 구성 예정-->
                    </div>

                    <div class="form">
                        <div class="label">
                            <label for="pass">비밀번호</label>
                        </div>
                        <div class="input">
                            <input type="password" name="pass">
                        </div>
                    </div>

                    <div class="form">
                        <div class="label">
                            <label for="pass_confirm">비밀번호 확인</label>
                        </div>
                        <div class="input">
                            <input type="password" name="pass_confirm">
                        </div>
                    </div>

                    <div class="form">
                        <div class="label">
                            <label for="name">이름</label>
                        </div>
                        <div class="input">
                            <input type="text" name="name">
                        </div>
                    </div>

                    <div class="form email">
                        <div class="label">
                            <label for="email1">이메일</label>
                        </div>
                        <div class="input">
                            <input type="text" name="email1">@<input type="text" name="email2">
                        </div>
                    </div>

                    <hr>

                    
                </form>
            </div>
        </div>
    </section>

    <footer>
        <?php include "./footer.php"; ?>
    </footer>


    <script src="./js/member_form.js"></script>
</body>
</html>