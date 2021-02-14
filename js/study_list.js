$(document).ready(function(){
	$(".tab_btn div ul li button").click(function(){
		var $index = $(this).closest("li").index();
		$(".tab_btn> div ul li button").removeClass("active");
		$(this).addClass("active");
		$(".tab_btn> div ul li").removeClass("active");
		$(".tab_btn> div ul li").eq($index).find("button").addClass("active");
		return false;
    });
    
    // $(".tab_btn>div ul li button").click(function(){

    //     $(".tab_btn>div ul li button").removeClass("active");
    //     $(this).addClass("active");
     
	
	// 	return false;
	// })
	
	$(".tab_top > li").click(function(){
		let $index = $(this).index();
		$(".tab_top > li").removeClass("active");
		$(this).addClass("active");

		$(".tab_btn div").removeClass("active");
		$(".tab_btn div").eq($index).addClass("active");

		return false;
	});

});