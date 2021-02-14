<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>wiz study</title>
    <link rel="shortcut icon" href="img/favicon.png">
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/study.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/pop.css">
    <script src="https://kit.fontawesome.com/09743b710b.js" crossorigin="anonymous"></script>

</head>
<body>
    <header>
        <?php include "./header.php"; ?>
    </header>
    <section>
        <?php include "./main.php"; ?>
    </section>
    <footer>
        <?php include "./footer.php"; ?>
    </footer>

    <div id="dark" class=""></div>
    <div id="popup" class="">
        <span class="close">×</span>
        <div class="pop_cont">
            <img src="./img/wiz_popup.jpg" alt="popupImage">
        </div>
        <button type="button" onclick="todayClosePop();">하루동안 열리지 않기</button>
    </div>

    
    
    <!--팝업창 24시간 동안 보이지 않게하기-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./js/pop.js"></script>
    <script src="./js/main.js"></script>


</body>
</html>