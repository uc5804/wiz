function check_input(){
	if(!document.board_form.title.value){
		alert("게시판 제목을 작성하세요");
		document.board_form.title.focus();
		return;
	}
	if(!document.board_form.content.value){
		alert("게시판 내용을 작성하세요");
		document.board_form.content.focus();
		return;
	}
	//첨부파일은 사용자의 선택에 의해서 존재할 수도 있고 없을 수도 있음(필수사항 아님)

	document.board_form.submit();
}

$(document).ready(function(){
	var $cur_selState = $("select").attr("state");
	if($cur_selState == "일반 게시글"){
		$("select option").removeAttr("selected");
		$("select option:eq(0)").attr("selected", "selected");
		// $("select option:eq(0)").prop("selected", true);
		// $("select option:eq(1)").prop("selected", false);
	}else if($cur_selState == "공지 게시글"){
		$("select option").removeAttr("selected");
		$("select option:eq(1)").attr("selected", "selected");
		// $("select option:eq(0)").prop("selected", false);
		// $("select option:eq(1)").prop("selected", true);
	}
});