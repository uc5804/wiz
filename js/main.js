$(document).ready(function(){

    // setInterval(function(){
	// 	var $show = $("#slider li.show").index();
	// 	$("#slider li").removeClass("show");
	// 	if($show == 2){  //인덱스 번호가 2
	// 		$("#slider li").eq(0).addClass("show");
	// 	}else{  //인덱스 번호가 0, 1
	// 		$("#slider li").eq($show).next().addClass("show");
	// 	}
	// }, 5000);

	$(function() {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $('#top_btn').fadeIn();
            } else {
                $('#top_btn').fadeOut();
            }
        });
        
        $("#top_btn").click(function() {
            $('html, body').animate({
                scrollTop : 0
            }, 400);
            return false;
        });
	});
	

	$(".s_frame .s_box:eq(3)").nextAll().hide();

	$(function(){
		$(".s_box").slice(0, 8).show(); // .s_box 처음 4개를 선택하여 보여줌
		$("button").click(function(e){ 
			e.preventDefault();
			$(".s_box:hidden").slice(0, 4).show(); // 다음 4개 박스를 보여줌
			if($(".s_box:hidden").length == 0){ //hidden .s_box가 없으면
				$("button").hide(); //버튼을 숨긴다.
			}
		});
	});





});